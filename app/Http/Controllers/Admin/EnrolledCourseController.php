<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\ModulProgress;
use App\Models\CourseRegistration;
use App\Http\Controllers\Controller;

class EnrolledCourseController extends Controller
{
    public function enrolledCourses()
    {
        $enrolledcourses = CourseRegistration::with(['user', 'course'])
            ->where('user_id', auth()->user()->id)
            ->where('registration_status', 'confirmed')
            ->get();

        // Ambil data feedback berdasarkan course_id yang terdaftar
        $courseIds = $enrolledcourses->pluck('course.id')->toArray();
        $feedbacks = Feedback::selectRaw('course_id, AVG(rating) as average_rating, COUNT(*) as total_feedbacks')
            ->whereIn('course_id', $courseIds)
            ->groupBy('course_id')
            ->get();

        // Gabungkan feedback ke dalam setiap course yang terdaftar
        $feedbacks = $feedbacks->keyBy('course_id');

        foreach ($enrolledcourses as $registration) {
            $course = $registration->course;

            // Ambil feedback untuk setiap course
            $feedback = $feedbacks->get($course->id);

            if ($feedback) {
                // Set nilai rating dan total feedbacks pada setiap course
                $course->average_rating = (float) $feedback->average_rating;
                $course->total_feedbacks = (int) $feedback->total_feedbacks;
            } else {
                // Default jika tidak ada feedback untuk course
                $course->average_rating = 0;
                $course->total_feedbacks = 0;
            }

            // Update progress jika perlu
            $registration->updateProgress();
        }

        return view('dashboard.pages.enrolled-courses.index', compact('enrolledcourses'));
    }

    public function completeModule($registrationId, $moduleId)
    {
        $modulProgress = ModulProgress::where('course_registrations_id', $registrationId)
            ->where('modul_id', $moduleId)
            ->first();

        if ($modulProgress) {
            $modulProgress->update(['status' => 'selesai']); // Tandai modul selesai

            // Perbarui progres kursus
            $registration = CourseRegistration::find($registrationId);
            $registration->updateProgress();
        }

        return back()->with('success', 'Modul berhasil diselesaikan!');
    }

    public function showCourses()
    {
        $userId = auth()->id(); // Ambil user yang sedang login

        // Ambil kursus yang sudah terdaftar (konfirmasi)
        $enrolledCourses = CourseRegistration::where('user_id', $userId)
            ->where('registration_status', 'confirmed')
            ->get();

        // Kursus aktif, progress < 100
        $activeCourses = $enrolledCourses->where('progress', '<', 100);

        // Kursus selesai, progress = 100
        $completedCourses = $enrolledCourses->where('progress', 100);

        return view('dashboard.pages.enrolled-courses.index', compact('activeCourses', 'completedCourses'));
    }



    public function activeCourses()
    {
        // Menampilkan semua kursus yang statusnya 'active'
        $registrations = CourseRegistration::with(['user', 'course'])
            ->where('registration_status', 'active')
            ->paginate(10);

        return view('dashboard.pages.enrolled-courses.index', compact('registrations'));
    }

    public function completedCourses()
    {
        // Menampilkan semua kursus yang statusnya 'completed'
        $registrations = CourseRegistration::with(['user', 'course'])
            ->where('registration_status', 'completed')
            ->paginate(10);

        return view('dashboard.pages.enrolled-courses.index', compact('registrations'));
    }

}
