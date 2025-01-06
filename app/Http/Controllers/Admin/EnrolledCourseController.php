<?php

namespace App\Http\Controllers\Admin;

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

        foreach ($enrolledcourses as $registration) {
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
    
        // Periksa apakah semua modul dalam kursus sudah selesai
        $enrolledCourses->each(function($courseRegistration) {
            $course = $courseRegistration->course;
    
            // Memeriksa apakah semua modul telah selesai
            $allModulsCompleted = $course->moduls->every(function($modul) use ($courseRegistration) {
                return $modul->modulProgresses->where('course_registrations_id', $courseRegistration->id)
                                                ->first()
                                                ->status === 'selesai';
            });
    
            // Menambahkan status untuk dapat mengunduh sertifikat
            $courseRegistration->can_download_certificate = $allModulsCompleted;
        });
    
        // Pisahkan kursus yang aktif dan yang sudah selesai
        $activeCourses = $enrolledCourses->where('progress', '<', 100);
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
