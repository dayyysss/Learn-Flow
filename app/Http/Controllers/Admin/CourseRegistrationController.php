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
        $registrations = CourseRegistration::with(['user', 'course'])->get();
        return view('dashboard.pages.order-history.index', compact('registrations'));
    }

    public function enrolledCourses()
    {
        $registrations = CourseRegistration::with(['user', 'course'])->get();
        return view('dashboard.pages.enrolled-courses.index', compact('registrations'));
    }

    public function create()
    {
        // Ambil semua item cart untuk user yang sedang login
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('course')  // Pastikan relasi 'course' sudah didefinisikan di model Cart
            ->get();

        // Kirim data cartItems ke tampilan
        return view('dashboard.pages.enrolled-courses.create', compact('cartItems'));
    }

    public function showPaymentPage($snapToken)
    {
        $transaction = CourseRegistration::where('snap_token', $snapToken)->first();

        if (!$transaction) {
            abort(404);
        }

        if ($transaction->registration_status === 'confirmed') {
            // Jika pembayaran sudah berhasil
            return redirect('/course');
        }

        // Jika belum berhasil
        return view('dashboard.pages.enrolled-courses.payment', ['snapToken' => $snapToken]);
    }


    public function store(Request $request)
    {
        $course = Course::findOrFail($request->course_id);

        // Set konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$clientKey = config('services.midtrans.client_key');

        // Persiapkan data transaksi untuk Midtrans
        $transaction = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . Str::uuid()->toString(),
                'gross_amount' => $course->harga,
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
            'harga' => $course->harga,
            'registration_status' => 'Menunggu',
            'snap_token' => $snapToken,
            'order_id' => $transaction['transaction_details']['order_id'],
        ]);

        // Redirect ke halaman pembayaran
        return redirect()->route('payment.page', ['snapToken' => $snapToken]);
    }


    public function updateMethod(Request $request)
    {
        $request->validate([
            'method_pembayaran' => 'required|string',
            'order_id' => 'required|string',
        ]);

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);

        $registration = CourseRegistration::where('order_id', $request->order_id)->first();

        if ($registration) {
            // transaction status dari Midtrans
            try {
                $status = Transaction::status($request->order_id); // Fetch transaction status by order_id

                if (is_array($status)) {
                    $transactionStatus = $status['transaction_status'] ?? 'unknown'; // Get status from array
                } else {
                    $transactionStatus = $status->transaction_status ?? 'unknown'; // Get status from object
                }

                // Map Midtrans status to registration status
                $registration_status = $this->mapMidtransStatusToRegistrationStatus($transactionStatus);

                // Update payment method dan registration status
                $registration->update([
                    'method_pembayaran' => ucfirst($request->method_pembayaran),
                    'registration_status' => $registration_status, // Update registration status
                ]);

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
