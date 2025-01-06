<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Providers\CourseFeedbackService;

class WishlistController extends Controller
{
    protected $courseFeedbackService;

    public function __construct(CourseFeedbackService $courseFeedbackService)
    {
        $this->courseFeedbackService = $courseFeedbackService;
    }

    public function index()
    {
        $wishlists = Wishlist::with([
            'course',
            'course.categories',
            'course.instrukturs',
            'course.babs.moduls',
        ])
            ->where('user_id', auth()->id())
            ->get();

        // Ambil semua course_id dari wishlist
        $courseIds = $wishlists->pluck('course.id')->toArray();

        // Ambil feedback berdasarkan course_id
        $feedbacks = Feedback::selectRaw('course_id, AVG(rating) as average_rating, COUNT(*) as total_feedbacks')
            ->whereIn('course_id', $courseIds)
            ->groupBy('course_id')
            ->get();

        // Cek apakah feedback ada, jika tidak tambahkan nilai default
        $feedbacks = $feedbacks->keyBy('course_id');

        // Gabungkan hasil feedback ke dalam wishlist
        foreach ($wishlists as $wishlist) {
            $course = $wishlist->course;

            // Pastikan feedback untuk course ada
            $feedback = $feedbacks->get($course->id);

            if ($feedback) {
                // Set nilai rating dan feedback jika ada
                $course->average_rating = $feedback->average_rating;
                $course->total_feedbacks = $feedback->total_feedbacks;
            } else {
                // Default jika tidak ada feedback untuk course
                $course->average_rating = 0;
                $course->total_feedbacks = 0;
            }
        }

        return view('dashboard.pages.wishlist.index', compact('wishlists'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $existingWishlist = Wishlist::where('user_id', auth()->id())
            ->where('course_id', $request->course_id)
            ->first();

        if ($existingWishlist) {
            return response()->json(['message' => 'Kursus ini sudah ada di wishlist Anda.']);
        }

        Wishlist::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->course_id,
        ]);

        return response()->json(['message' => 'Kursus berhasil tersimpan di wishlist.']);
    }


    public function destroy($id)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        $wishlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kursus dihapus dari wishlist.',
        ]);
    }

    public function check(Request $request)
    {
        $courseIds = $request->input('course_ids', []); // Ambil array course_id dari request body
        $userId = $request->input('user_id');

        $wishlists = Wishlist::where('user_id', $userId)
            ->whereIn('course_id', $courseIds)
            ->pluck('id', 'course_id'); // Mengembalikan array [course_id => wishlist_id]

        $response = [];
        foreach ($courseIds as $courseId) {
            $response[] = [
                'course_id' => $courseId,
                'exists' => isset($wishlists[$courseId]),
                'wishlist_id' => $wishlists[$courseId] ?? null,
            ];
        }

        return response()->json($response);
    }
}
