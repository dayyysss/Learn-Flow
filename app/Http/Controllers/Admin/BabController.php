<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bab;
use App\Models\Course;
use App\Models\Modul;
use Illuminate\Http\Request;

class BabController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.modul.create');
    }

    public function showDetail($slug)
    {
        // Temukan Course berdasarkan slug
        $course = Course::where('slug', $slug)->firstOrFail();
    
        // Ambil bab yang terkait dengan course
        $babs = $course->babs()->with('moduls')->get();
    
        // Kirim data course dan babs ke view
        return view('dashboard.pages.modul.create', compact('course', 'babs'));
    }
    


// Fungsi untuk menyimpan bab baru
public function store(Request $request)
{
    // Validasi data input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'course_id' => 'required|exists:courses,id', // Memastikan course_id sesuai dengan ID yang ada di tabel courses
    ]);

    // Membuat slug berdasarkan nama
    $slug = \Str::slug($validatedData['name']);

    // Menyimpan data ke dalam database
    $bab = Bab::create([
        'name' => $validatedData['name'],
        'slug' => $slug,
        'course_id' => $validatedData['course_id'],
    ]);

    // Mengembalikan respons sukses
    return response()->json([
        'message' => 'Bab berhasil ditambahkan.',
        'data' => $bab,
    ], 201);
}

}
