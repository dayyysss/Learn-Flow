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
        $registrations = CourseRegistration::with(['user', 'course'])->paginate(10);

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
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);

        $registration = CourseRegistration::where('order_id', $request->order_id)->first();

        if ($registration) {
            try {
                // Ambil status transaksi dari Midtrans
                $status = Transaction::status($request->order_id);

                // Ambil status transaksi dari response
                $transactionStatus = is_array($status)
                    ? ($status['transaction_status'] ?? 'unknown')
                    : ($status->transaction_status ?? 'unknown');

                // Konversi status Midtrans ke status registrasi
                $registration_status = $this->mapMidtransStatusToRegistrationStatus($transactionStatus);

                // Update data pendaftaran
                $registration->update([
                    'method_pembayaran' => ucfirst($request->method_pembayaran),
                    'registration_status' => $registration_status,
                ]);

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


    // public function paymentNotification(Request $request)
    // {
    //     // Set konfigurasi Midtrans
    //     Config::$serverKey = config('services.midtrans.server_key');
    //     Config::$isProduction = config('services.midtrans.is_production');
    //     Config::$clientKey = config('services.midtrans.client_key');

    //     // Ambil data notifikasi dari Midtrans
    //     $notif = new Notification();

    //     // Ambil status pembayaran dan informasi lainnya
    //     $transactionStatus = $notif->transaction_status;
    //     $paymentType = $notif->payment_type;
    //     $orderId = $notif->order_id;

    //     // Cari data pendaftaran berdasarkan order_id
    //     $registration = CourseRegistration::where('order_id', $orderId)->first();

    //     if ($registration) {
    //         // Update status berdasarkan notifikasi yang diterima dari Midtrans
    //         if ($transactionStatus == 'success') {
    //             $registration->update([
    //                 'method_pembayaran' => $paymentType, // Mengambil metode pembayaran (gopay, bank transfer, dll.)
    //                 'registration_status' => 'Berhasil',
    //             ]);
    //         } elseif ($transactionStatus == 'pending') {
    //             $registration->update([
    //                 'method_pembayaran' => $paymentType,
    //                 'registration_status' => 'Pending',
    //             ]);
    //         } elseif ($transactionStatus == 'failed') {
    //             $registration->update([
    //                 'method_pembayaran' => $paymentType,
    //                 'registration_status' => 'Gagal',
    //             ]);
    //         }

    //         return response()->json(['status' => 'success']);
    //     }

    //     return response()->json(['status' => 'error', 'message' => 'Order tidak ditemukan']);
    // }


    public function storeFromCart(Request $request)
    {
        // Ambil item yang ada di cart untuk user yang sedang login
        $cartItems = Cart::where('user_id', auth()->id())->get();

        $methodPembayaran = $request->input('method_pembayaran');
        $now = now();

        foreach ($cartItems as $cartItem) {
            // Ambil harga dari cart item, misalnya diambil dari kolom 'harga' di tabel cart_items
            $formattedHarga = (float) str_replace(['.', ','], '', $cartItem->harga);

            // Buat registrasi course dari data cart
            CourseRegistration::create([
                'user_id' => Auth()->user()->id,
                'course_id' => $cartItem->course_id,
                'name' => $cartItem->course->name, // Misalkan relasi antara cart_items dan courses
                'harga' => $formattedHarga,
                'method_pembayaran' => $methodPembayaran,
                'registration_status' => 'Menunggu',
                'registrations_date' => $now,
                'order_date' => $now,
            ]);
        }

        // Setelah pendaftaran berhasil, hapus cart items yang sudah diproses
        Cart::where('user_id', auth()->id())->delete();

        return response()->json(['message' => 'Pendaftaran berhasil']);
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
