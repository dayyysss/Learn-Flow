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

    public function showPaymentPage($snapToken)
    {
        // Retrieve the course registration using the snap token
        $transaction = CourseRegistration::where('snap_token', $snapToken)->first();

        if (!$transaction) {
            abort(404, 'Transaksi tidak ditemukan.');
        }

        $course = $transaction->course;

        // Tentukan harga akhir setelah diskon (harga asli - harga diskon)
        $hargaAkhir = (!empty($course->harga_diskon) && is_numeric($course->harga_diskon))
            ? $course->harga - $course->harga_diskon
            : $course->harga;

        return view('dashboard.pages.enrolled-courses.payment', [
            'snapToken' => $snapToken,
            'course' => $course,
            'hargaAkhir' => $hargaAkhir,
        ]);
    }


    public function store(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login atau daftar terlebih dahulu untuk melanjutkan.');
        }

        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Ambil data kursus
        $course = Course::findOrFail($request->course_id);

        // Cek apakah pengguna sudah pernah membeli kursus ini dengan status confirmed
        $existingRegistration = CourseRegistration::where('user_id', auth()->user()->id)
            ->where('course_id', $course->id)
            ->where('registration_status', 'confirmed')
            ->first();

        if ($existingRegistration) {
            return redirect()->route('course')->with('info', 'Anda sudah membeli kursus ini.');
        }

        // Tentukan harga akhir berdasarkan diskon
        $hargaAkhir = (!empty($course->harga_diskon) && is_numeric($course->harga_diskon))
            ? $course->harga - $course->harga_diskon
            : $course->harga;

        // Set konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$clientKey = config('services.midtrans.client_key');

        // Persiapkan data transaksi untuk Midtrans
        $transaction = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . Str::uuid()->toString(),
                'gross_amount' => $hargaAkhir,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->first_name,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone_number,
            ]
        ];

        // Generate Snap Token
        $snapToken = Snap::getSnapToken($transaction);

        // Simpan data transaksi
        $registration = CourseRegistration::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->course_id,
            'registration_date' => now(),
            'order_date' => now(),
            'method_pembayaran' => 'Midtrans',
            'harga' => $hargaAkhir,
            'registration_status' => 'Menunggu',
            'snap_token' => $snapToken,
            'order_id' => $transaction['transaction_details']['order_id'],
        ]);

        // Redirect ke halaman pembayaran
        return response()->json([
            'status' => 'success',
            'redirect_url' => route('payment.page', ['snapToken' => $snapToken]),
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

        $registration = CourseRegistration::where('order_id', $request->order_id)->first();

        if ($registration) {
            try {
                // Ambil status transaksi dari Midtrans
                $status = Transaction::status($request->order_id);

                // Ambil status transaksi dari response
                $transactionStatus = is_array($status)
                    ? ($status['transaction_status'] ?? 'unknown')
                    : ($status->transaction_status ?? 'unknown');

                // Jika status tidak valid atau tidak sesuai, hentikan proses
                if ($transactionStatus == 'unknown') {
                    return response()->json(['status' => 'error', 'message' => 'Status transaksi tidak diketahui']);
                }

                // Konversi status Midtrans ke status registrasi
                $registration_status = $this->mapMidtransStatusToRegistrationStatus($transactionStatus);

                // Pastikan hanya status yang valid yang dapat mengubah status registrasi
                if ($registration_status === 'confirmed' && $registration->registration_status !== 'confirmed') {
                    // Update data pendaftaran dengan status baru
                    $registration->update([
                        'method_pembayaran' => ucfirst($request->method_pembayaran),
                        'registration_status' => $registration_status,
                    ]);
                }

                // Jika sudah confirmed, redirect langsung ke halaman kursus
                if ($registration_status === 'confirmed') {
                    return response()->json([
                        'status' => 'redirect',
                        'url' => route('course'),
                    ]);
                }

                // Berikan respons sukses jika status belum confirmed
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

        return response()->json(['status' => 'error', 'message' => 'Order tidak ditemukan']);
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

        // Debugging log
        \Log::info('Cart Items:', ['cart_items' => $cartItems]);

        $snapTokens = []; // Array untuk menyimpan semua snapToken
        foreach ($cartItems as $item) {
            if (!isset($item['course_id'], $item['total_price'])) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data kursus tidak lengkap di keranjang.',
                ], 400);
            }

            // Ambil data kursus
            $course = Course::find($item['course_id']);
            if (!$course) {
                continue; // Skip jika kursus tidak ditemukan
            }

            // Tentukan harga akhir berdasarkan data keranjang
            $hargaAkhir = $item['total_price'];

            // Set konfigurasi Midtrans
            Config::$serverKey = config('services.midtrans.server_key');
            Config::$isProduction = config('services.midtrans.is_production');
            Config::$clientKey = config('services.midtrans.client_key');

            // Persiapkan data transaksi untuk Midtrans
            $transaction = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . Str::uuid()->toString(),
                    'gross_amount' => $hargaAkhir,
                ],
                'customer_details' => [
                    'first_name' => auth()->user()->first_name,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone_number,
                ]
            ];

            // Generate Snap Token
            $snapToken = Snap::getSnapToken($transaction);
            $snapTokens[] = $snapToken;

            // Simpan data registrasi
            CourseRegistration::create([
                'user_id' => auth()->user()->id,
                'course_id' => $item['course_id'],
                'registration_date' => now(),
                'order_date' => now(),
                'method_pembayaran' => 'Midtrans',
                'harga' => $hargaAkhir,
                'registration_status' => 'Menunggu',
                'snap_token' => $snapToken,
                'order_id' => $transaction['transaction_details']['order_id'],
            ]);
        }

        // Hapus keranjang setelah checkout berhasil
        $cart->delete();

        // Redirect ke halaman pembayaran menggunakan snapToken pertama
        return response()->json([
            'status' => 'success',
            'message' => 'Checkout berhasil! Pendaftaran kursus telah dibuat.',
            'redirect_url' => route('payment.page', ['snapToken' => $snapTokens[0]]), // Gunakan snapToken pertama
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
