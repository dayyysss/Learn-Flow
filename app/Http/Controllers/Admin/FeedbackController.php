<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function reviews()
    {
        $userRole = auth()->user()->role_id;

        $receivedReviews = collect();
        $givenReviews = collect();
        $courses = collect();
        $instructors = User::where('role_id', 3)->get();

        // If the user is a student (role_id == 2)
        if ($userRole == 2) {
            // Fetch courses purchased by the student with 'confirmed' registration status
            $courses = Course::whereHas('courseRegistrations', function ($query) {
                $query->where('user_id', auth()->id())  // Filter by the logged-in user
                    ->where('registration_status', 'confirmed') // Only confirmed courses
                    ->where('progress', 100);
            })->get();

            // Fetch reviews given by the student
            $givenReviews = Feedback::with('course')
                ->where('user_id', auth()->id())
                ->orderBy('created_at', 'desc') // Sort by date (newest first)
                ->get();
        }
        // If the user is an instructor (role_id == 3)
        elseif ($userRole == 3) {
            // Fetch reviews received for courses taught by the instructor
            $receivedReviews = Feedback::with(['user', 'course'])
                ->whereHas('course', function ($query) {
                    $query->where('instruktur_id', auth()->id());
                })
                ->orderBy('created_at', 'desc')
                ->get();

            // Calculate the total number of reviewers per course
            foreach ($receivedReviews as $review) {
                $review->total_reviewers = Feedback::where('user_id', $review->user_id)->count(); // Count total reviews for the course
            }
        }

        // Return the view with the filtered reviews and course list
        return view('dashboard.pages.reviews.index', compact('receivedReviews', 'givenReviews', 'courses', 'instructors'));
    }

    // Controller
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'komentar' => 'required|string|max:100',
            'course_id' => 'required|exists:courses,id',
        ]);

        try {
            $userId = auth()->id();
            $courseId = $request->input('course_id');

            // Cek apakah pengguna sudah membeli kursus ini dan statusnya "confirmed"
            $hasPurchased = \App\Models\CourseRegistration::where('user_id', $userId)
                ->where('course_id', $courseId)
                ->where('registration_status', 'confirmed')
                ->exists();

            if (!$hasPurchased) {
                return redirect()->back()->with('error', 'Anda hanya dapat memberikan ulasan untuk kursus yang telah dibeli.');
            }

            // Cek apakah pengguna sudah memberikan ulasan untuk kursus ini
            if (Feedback::where('user_id', $userId)->where('course_id', $courseId)->exists()) {
                return redirect()->back()->with('error', 'Anda sudah memberikan ulasan untuk kursus ini.');
            }

            $course = Course::findOrFail($courseId);

            Feedback::create([
                'user_id' => $userId,
                'course_id' => $courseId,
                'rating' => $request->input('rating'),
                'komentar' => $request->input('komentar'),
                'instruktur_id' => $course->instruktur_id ?? null, // Gunakan instruktur dari course
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, ulasan gagal ditambahkan.');
        }
    }



    // Dapatkan semua ulasan berdasarkan kursus
    public function indexByCourse($courseId)
    {
        $feedbacks = Feedback::where('course_id', $courseId)->get();

        return response()->json($feedbacks);
    }

    // Update ulasan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'rating' => 'numeric|min:0|max:5',
            'komentar' => 'nullable|string',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->update($validated);

        return response()->json([
            'message' => 'Feedback updated successfully!',
            'feedback' => $feedback, // Mengembalikan data yang sudah diperbarui
        ]);
    }


    // Hapus ulasan
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return response()->json(['message' => 'Feedback deleted successfully!']);
    }
}
