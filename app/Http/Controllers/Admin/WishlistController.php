<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('course')
            ->where('user_id', auth()->id())
            ->get();

        return response()->json([
            'success' => true,
            'data' => $wishlists,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        Wishlist::create([
            'user_id' => Auth()->user()->id,
            'course_id' => $request->course_id,
        ]);

        return response()->json(['message' => 'Wishlist berhasil ditambahkan.']);
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('id', $id)
            ->firstOrFail();

        $wishlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course removed from wishlist.',
        ]);
    }
}
