<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use App\Models\Course;
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



    public function store(Request $request)
    {
        // Pendaftaran untuk satu kursus
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'method_pembayaran' => 'nullable|string',
        ]);

        $course = Course::findOrFail($request->course_id);

        $registration = CourseRegistration::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->course_id,
            'registration_date' => now(),
            'order_date' => now(),
            'method_pembayaran' => $request->method_pembayaran,
            'harga' => $course->harga,
            'registration_status' => 'Menunggu',
        ]);

        return redirect()->route('course-registrations.show', $registration->id)
            ->with('success', 'Pendaftaran kursus berhasil.');
    }

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
