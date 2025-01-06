<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
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
