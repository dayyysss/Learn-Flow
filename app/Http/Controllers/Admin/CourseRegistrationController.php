<?php

namespace App\Http\Controllers\Admin;

use Midtrans\Snap;
use App\Models\Cart;
use App\Models\User;
use Midtrans\Config;
use App\Models\Course;
use Midtrans\Transaction;
use Midtrans\Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseRegistration;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CourseRegistrationController extends Controller
{
    public function orderHistory()
    {
        // Ambil user ID dari pengguna yang sedang login
        $userId = auth()->user()->id;

        // Filter pendaftaran berdasarkan user ID
        $registrations = CourseRegistration::with(['user', 'course'])
            ->where('user_id', $userId)
            ->paginate(10);

        return view('dashboard.pages.order-history.index', compact('registrations'));
    }

    public function create()
    {
        // Ambil semua item cart untuk user yang sedang login
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('course')
            ->get();

        // Kirim data cartItems ke tampilan
        return view('dashboard.pages.enrolled-courses.create', compact('cartItems'));
    }

    public function showPaymentPage(Request $request)
    {
        $snapToken = $request->snapToken;

        // Ambil semua registrasi kursus yang terkait dengan snapToken
        $registrations = CourseRegistration::where('snap_token', $snapToken)->get();

        // Tentukan apakah ini pembelian satu kursus atau lebih
        if ($registrations->count() == 1) {
            $isSinglePurchase = true;
            $totalHarga = $registrations->first()->harga;
        } else {
            $isSinglePurchase = false;
            $totalHarga = $registrations->sum('harga');
        }

        // Hitung harga akhir untuk setiap kursus
        foreach ($registrations as $registration) {
            $course = $registration->course;

            // Tentukan harga akhir setelah diskon untuk masing-masing kursus
            $registration->hargaAkhir = (!empty($course->harga_diskon) && is_numeric($course->harga_diskon))
                ? $course->harga - $course->harga_diskon
                : $course->harga;
        }

        // Hitung total harga akhir untuk semua kursus setelah diskon
        $totalHargaAkhir = $registrations->sum('hargaAkhir');

        return view('dashboard.pages.enrolled-courses.payment', compact('registrations', 'totalHarga', 'totalHargaAkhir', 'snapToken', 'isSinglePurchase'));
    }

    public function generateSnapToken(Request $request)
    {
        $user = auth()->user();

        // Ambil kursus yang masih dalam status "Menunggu"
        $registrations = CourseRegistration::where('user_id', $user->id)
            ->where('registration_status', 'Menunggu')
            ->get();

        if ($registrations->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'Tidak ada kursus yang perlu dibayar.']);
        }

        // Pastikan harga yang diambil adalah harga terbaru setelah diskon
        $totalHargaAkhir = $registrations->sum('harga'); // Ambil harga dari database

        $orderId = 'ORDER-' . str::uuid()->toString();

        // Debugging: Cek apakah harga yang dikirim sudah benar
        \Log::info("Total Harga yang dikirim ke Midtrans: " . $totalHargaAkhir);

        // Set konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');

        // Buat transaksi baru untuk Midtrans
        $transaction = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalHargaAkhir,  // Gunakan harga terbaru dari database
            ],
            'customer_details' => [
                'first_name' => $user->first_name,
                'email' => $user->email,
                'phone' => $user->phone_number,
            ]
        ];

        // Generate Snap Token
        $snapToken = Snap::getSnapToken($transaction);

        // Simpan Snap Token di database agar bisa dipakai kembali
        foreach ($registrations as $registration) {
            $registration->update(['snap_token' => $snapToken]);
            $registration->update(['order_id' => $orderId]);
        }

        return response()->json(['status' => 'success', 'snap_token' => $snapToken, 'order_id' => $orderId]);
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login atau daftar terlebih dahulu.');
        }

        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $course = Course::findOrFail($request->course_id);

        // Cek apakah user sudah beli kursus ini
        $existingRegistration = CourseRegistration::where('user_id', auth()->id())
            ->where('course_id', $course->id)
            ->where('registration_status', 'confirmed')
            ->first();

        if ($existingRegistration) {
            return redirect()->route('course')->with('info', 'Anda sudah membeli kursus ini.');
        }

        // Hitung harga akhir
        $hargaAkhir = (!empty($course->harga_diskon) && is_numeric($course->harga_diskon))
            ? $course->harga - $course->harga_diskon
            : $course->harga;

        // Simpan data tanpa Snap Token
        $registration = CourseRegistration::create([
            'user_id' => auth()->id(),
            'course_id' => $request->course_id,
            'registration_date' => now(),
            'order_date' => now(),
            'method_pembayaran' => 'Midtrans',
            'harga' => $hargaAkhir,
            'registration_status' => 'Menunggu',
            'snap_token' => null,
            'order_id' => 'ORDER-' . Str::uuid()->toString(),
        ]);

        return response()->json([
            'status' => 'success',
            'redirect_url' => route('payment.page'),
        ]);
    }

    public function updateMethod(Request $request)
    {
        $request->validate([
            'method_pembayaran' => 'required|string',
            'order_id' => 'required|string',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$clientKey = config('services.midtrans.client_key');

        Log::info('Request updateMethod:', $request->all());

        // Ambil semua pendaftaran berdasarkan order_id
        $registrations = CourseRegistration::where('order_id', $request->order_id)->get();

        if ($registrations->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'Order tidak ditemukan']);
        }

        try {
            // Ambil status transaksi dari Midtrans
            $status = Transaction::status($request->order_id);
            $transactionStatus = is_array($status)
                ? ($status['transaction_status'] ?? 'unknown')
                : ($status->transaction_status ?? 'unknown');

            if ($transactionStatus == 'unknown') {
                return response()->json(['status' => 'error', 'message' => 'Status transaksi tidak diketahui']);
            }

            $registration_status = $this->mapMidtransStatusToRegistrationStatus($transactionStatus);

            if ($registration_status === 'confirmed') {
                foreach ($registrations as $registration) {
                    if ($registration->registration_status !== 'confirmed') {
                        $registration->update([
                            'method_pembayaran' => ucfirst($request->method_pembayaran),
                            'registration_status' => $registration_status,
                        ]);
                    }
                }
            }

            // Ambil cart user
            $cart = Cart::where('user_id', auth()->user()->id)->first();
            $cartItems = $cart ? json_decode($cart->cart_items, true) : [];

            // Ambil daftar course_id dari registrasi order_id ini
            $registeredCourseIds = $registrations->pluck('course_id')->toArray();

            // Cek apakah semua course di order_id ini berasal dari cart
            $isFromCart = !empty($cartItems) && empty(array_diff($registeredCourseIds, array_column($cartItems, 'course_id')));

            // Jika pembelian berasal dari cart, kosongkan cart setelah pembayaran berhasil
            if ($isFromCart) {
                $cart->cart_items = json_encode([]);
                $cart->save();
            }

            if ($registration_status === 'confirmed') {
                $firstCourse = $registrations->first()->course;
                return response()->json([
                    'status' => 'redirect',
                    'url' => route('course.detail', ['slug' => $firstCourse->slug]),
                ]);
            }

            return response()->json([
                'status' => 'success',
                'method_pembayaran' => ucfirst($request->method_pembayaran),
                'registration_status' => $registration_status,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil status transaksi: ' . $e->getMessage(),
            ]);
        }
    }


    private function mapMidtransStatusToRegistrationStatus($midtransStatus)
    {
        // Map Midtrans status to registration status
        switch ($midtransStatus) {
            case 'capture':
            case 'settlement':
                return 'confirmed';
            case 'pending':
                return 'waiting';
            case 'deny':
            case 'expired':
            case 'cancel':
                return 'failed';
            default:
                return 'unknown';
        }
    }

    public function storeFromCart(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (!auth()->check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Silakan login atau daftar terlebih dahulu untuk melanjutkan.',
            ], 401);
        }

        // Ambil data cart pengguna
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        if (!$cart || empty($cart->cart_items)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Keranjang Anda kosong.',
            ], 400);
        }

        // Dekode cart_items
        $cartItems = is_string($cart->cart_items) ? json_decode($cart->cart_items, true) : $cart->cart_items;

        // Validasi apakah cartItems adalah array
        if (!is_array($cartItems)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data keranjang tidak valid.',
            ], 400);
        }

        // Hitung total harga untuk semua kursus dalam keranjang
        $totalHarga = 0;
        $courses = [];
        foreach ($cartItems as $item) {
            if (!isset($item['course_id'], $item['total_price'])) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data kursus tidak lengkap di keranjang.',
                ], 400);
            }

            $course = Course::find($item['course_id']);
            if ($course) {
                $courses[] = $course;
                $totalHarga += $item['total_price'];
            }
        }

        // Pastikan ada kursus dalam transaksi
        if (empty($courses)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak ada kursus valid dalam keranjang.',
            ], 400);
        }

        // Set konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$clientKey = config('services.midtrans.client_key');

        // Generate satu order_id untuk semua kursus
        $orderId = 'ORDER-' . Str::uuid()->toString();

        // Persiapkan data transaksi untuk Midtrans
        $transaction = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalHarga, // Total semua harga kursus
            ],
            'customer_details' => [
                'first_name' => auth()->user()->first_name,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone_number,
            ]
        ];

        // Generate Snap Token (satu untuk semua kursus dalam transaksi)
        $snapToken = Snap::getSnapToken($transaction);

        // Simpan entri terpisah untuk setiap kursus di CourseRegistration
        foreach ($courses as $course) {
            CourseRegistration::create([
                'user_id' => auth()->user()->id,
                'course_id' => $course->id,
                'registration_date' => now(),
                'order_date' => now(),
                'method_pembayaran' => 'Midtrans',
                'harga' => $course->harga,
                'registration_status' => 'Menunggu',
                'snap_token' => $snapToken,  // Sama untuk semua kursus
                'order_id' => $orderId,  // Sama untuk semua kursus
            ]);
        }

        // **Jangan hapus keranjang langsung setelah checkout!**
        // Tunggu hingga pembayaran dikonfirmasi di Webhook Midtrans

        return response()->json([
            'status' => 'success',
            'message' => 'Checkout berhasil! Pendaftaran kursus telah dibuat.',
            'redirect_url' => route('payment.page', ['snapToken' => $snapToken]), // Redirect ke pembayaran
            'order_id' => $orderId, // Kirim order_id untuk referensi
        ]);
    }




    public function show($id)
    {
        $registration = CourseRegistration::with('user', 'course')->findOrFail($id);
        return view('dashboard.pages.enrolled-courses.show', compact('registration'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'registration_status' => 'required|in:Menunggu,Diproses,Berhasil,Gagal,Dibatalkan,Refund',
        ]);

        $registration = CourseRegistration::findOrFail($id);
        $registration->update([
            'registration_status' => $request->registration_status,
        ]);

        return redirect()->route('course-registrations.show', $id)
            ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
