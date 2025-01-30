<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\roadmap;
use Illuminate\Http\Request;

class RoadmapController extends Controller
{

    public function index(Request $request)
{
    $categories = CategoryCourse::all();

    // Defaultkan kategori yang dipilih jika tidak ada di request
    $selectedCategoryId = $request->input('category_id', $categories->first()->id ?? null);

    if ($request->ajax()) {
        // Ambil roadmap berdasarkan kategori yang dipilih
        $roadmaps = Roadmap::whereHas('courses', function ($query) use ($selectedCategoryId) {
            $query->where('categories_id', $selectedCategoryId);
        })->get();

        // Kirim data roadmap dan kategori yang dipilih dalam format JSON
        return response()->json([
            'roadmaps' => $roadmaps,
            'selectedCategoryId' => $selectedCategoryId
        ]);
    }

    // Ambil semua course jika bukan permintaan AJAX
    $courses = Course::all();

    return view('lfcms.pages.roadmap.index', compact('courses', 'categories', 'selectedCategoryId'));
}

    



    public function create()
    {
        $courses = Course::all();
        $categories = CategoryCourse::all();
        return view('roadmaps.create', compact('courses', 'categories'));
    }

    /**
     * Menyimpan roadmap baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'categoryCourse_id' => 'required|exists:category_courses,id',
            'order' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
        ]);

        roadmap::create([
            'course_id' => $request->course_id,
            'categoryCourse_id' => $request->categoryCourse_id,
            'order' => $request->order,
            'name' => $request->name,
        ]);

        return redirect()->route('roadmaps.index')->with('success', 'Roadmap berhasil ditambahkan.');
    }
}
