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
            'instructor_rating' => 'nullable|numeric|min:1|max:5',
            'instructor_komentar' => 'nullable|string|max:100',
            'course_id' => 'required|exists:courses,id',
        ]);

        try {
            // Menyimpan review baru
            $feedback = new Feedback();
            $feedback->user_id = auth()->id();
            $feedback->course_id = $request->input('course_id');
            $feedback->rating = $request->input('rating');
            $feedback->komentar = $request->input('komentar');
            $feedback->instructor_rating = $request->input('instructor_rating');
            $feedback->instructor_komentar = $request->input('instructor_komentar');
            $feedback->save();

            // Mengirimkan respon JSON dengan status sukses
            return response()->json([
                'success' => true,
                'message' => 'Ulasan berhasil ditambahkan!'
            ]);
        } catch (\Exception $e) {
            // Jika terjadi error, mengirimkan respon JSON dengan status gagal
            return response()->json([
                'success' => false,
                'message' => 'Ulasan gagal ditambahkan.'
            ]);
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
