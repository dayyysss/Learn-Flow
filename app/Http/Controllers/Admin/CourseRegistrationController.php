<?php

namespace App\Http\Controllers\Admin;

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

    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('dashboard.pages.enrolled-courses.create', compact('course'));
    }

    public function store(Request $request)
    {
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
