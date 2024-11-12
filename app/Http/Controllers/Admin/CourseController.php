<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index()
    {
        // Ambil semua data kategori layanan dan muat relasi user
        $course = Course::with('users')->get();
        return view('dashboard.pages.course.index', compact('course'));
    }  

    public function create()
    {
        // Ambil semua data kategori layanan dan muat relasi user
        $course = Course::with('users', 'category_courses')->get();
        return view('dashboard.pages.courses.create', compact('course'));
    } 

    public function store(Request $request)
    {
        // Validasi data yang diperlukan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:category_courses,id', // Pastikan tabel dan kolomnya benar
            'deskripsi' => 'nullable|string',
            'intruktur_id' => 'nullable|exists:users,id', // Periksa relasi 'instructors' atau tabel yang relevan
            'harga' => 'nullable|numeric',
            'harga_diskon' => 'nullable|numeric',
            'tanggal_mulai' => 'nullable|date',
            'tags' => 'nullable|string',
            'informasi_lain' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Contoh validasi file gambar
            'video' => 'nullable|url',
            'course_type' => 'nullable|string',
            'status' => 'nullable|in:draft,publik', // Sesuaikan dengan status yang valid
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Generate slug
        $slug = Str::slug($request->name);
        $count = Course::where('slug', 'like', $slug . '%')->count();
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    
        // Simpan file thumbnail jika ada
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('courses', 'public');
        }
    
        // Simpan data ke database
        Course::create([
            'user_id' => auth()->user()->id, // ID pengguna yang sedang login
            'name' => $request->name,
            'categories_id' => $request->categories_id,
            'deskripsi' => $request->deskripsi,
            'intruktur_id' => $request->intruktur_id,
            'harga' => $request->harga,
            'harga_diskon' => $request->harga_diskon,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tags' => $request->tags,
            'informasi_lain' => $request->informasi_lain,
            'thumbnail' => $thumbnailPath, // Simpan path file thumbnail
            'video' => $request->video,
            'course_type' => $request->course_type,
            'status' => $request->status,
            'slug' => $slug,
        ]);
    
        // Kembalikan respon JSON sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Kursus berhasil dibuat.',
            'redirect_url' => route('dashboard.pages.course.index')
        ]);
    }
    
}
