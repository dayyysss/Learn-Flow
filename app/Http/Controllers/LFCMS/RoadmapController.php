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
    $courses = Course::all();
    $categories = CategoryCourse::all();

    // Ambil kategori yang dipilih dari request, jika tidak ada pilih kategori pertama
    $selectedCategoryId = $request->input('category_id', $categories->first()->id ?? null);

    // Ambil roadmap yang sesuai dengan categoryCourse_id dari course yang dipilih
    $roadmaps = Roadmap::whereHas('courses', function ($query) use ($selectedCategoryId) {
        $query->where('categories_id', $selectedCategoryId);
    })->get();

    return view('lfcms.pages.roadmap.index', compact('courses', 'categories', 'roadmaps', 'selectedCategoryId'));
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
