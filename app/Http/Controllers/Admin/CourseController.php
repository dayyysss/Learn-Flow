<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Bab;
use App\Models\CategoryCourse;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index()
    {
        // Ambil semua data kategori layanan dan muat relasi user
        $categories = CategoryCourse::all();
        
        // Lakukan eager loading relasi 'category_courses'
        $course = Course::with(['users', 'categories', 'babs.moduls'])->get();
        
        return view('dashboard.pages.courses.index', compact('course', 'categories'));
    }
    

    public function create()
    {
        $instruktur = User::get();
        $categories = CategoryCourse::all();
        // Ambil semua data kategori layanan dan muat relasi user
        $course = Course::with('users', 'category_courses')->get();
        return view('dashboard.pages.courses.create', compact('course', 'categories', 'instruktur'));
    } 

    public function store(Request $request)
    {
    // Validasi data yang diperlukan
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'categories_id' => 'required|exists:category_courses,id',
        'deskripsi' => 'nullable|string',
        'intruktur_id' => 'nullable|exists:users,id',
        'harga' => 'nullable',
        'harga_diskon' => 'nullable',
        'tanggal_mulai' => 'nullable|date',
        'tags' => 'nullable|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'video_file' => 'nullable|file|mimes:mp4,mov,avi|max:50000',
        'video_url' => 'nullable|url',
        'berbayar' => 'nullable|in:true,false',
        // Validasi untuk banyak file TTD
        'certificate_ttd.*' => 'nullable|file|mimes:jpg,png|max:1024',
        // Validasi untuk Bab dan Modul
        'bab.*.name' => 'required|string',
        'bab.*.moduls.*.name' => 'required|string',
        'bab.*.moduls.*.materi' => 'nullable|string',
        'bab.*.moduls.*.video' => 'nullable|file|mimes:mp4,mov,avi|max:50000',
        'bab.*.moduls.*.file' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

        // Generate slug
        $slug = Str::slug($request->name);
        $count = Course::where('slug', 'like', $slug . '%')->count();
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    
    // Video file or URL validation
    $videoPath = $request->hasFile('video_file')
        ? $request->file('video_file')->store('courses/videos', 'public')
        : $request->video_url;

    if (!$videoPath) {
        return redirect()->back()->withErrors(['video' => 'Please upload a video file or provide a video URL.'])->withInput();
    }

    // Menghapus simbol 'Rp' dan format lainnya, hanya menyisakan angka
    $harga = str_replace(['Rp', '.', ','], '', $request->harga);

    // Pastikan harga adalah angka
    $harga = is_numeric($harga) ? (float) $harga : 0;

    // Menghapus simbol 'Rp' dan format lainnya, hanya menyisakan angka
    $harga_diskon = str_replace(['Rp', '.', ','], '', $request->harga_diskon);

    // Pastikan harga adalah angka
    $harga_diskon = is_numeric($harga_diskon) ? (float) $harga : 0;



    // Create course
    $course = Course::create([
        'user_id' => auth()->user()->id,
        'name' => $request->name,
        'categories_id' => $request->categories_id,
        'deskripsi' => $request->deskripsi,
        'intruktur_id' => $request->intruktur_id,
        'harga' => $harga,
        'harga_diskon' => $harga_diskon,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tags' => $request->tags,
        'thumbnail' => $request->file('thumbnail') ? $request->file('thumbnail')->store('courses', 'public') : null,
        'video' => $videoPath,
        'berbayar' => $request->berbayar,
        'slug' => Str::slug($request->name),
    ]);

    // Create certificate
    $this->createCertificate($course->id, $request);

    // Create Bab and Moduls
    $this->createBabAndModules($course->id, $request->bab);

    return response()->json([
        'status' => 'success',
        'message' => 'Course, certificate, and related bab and moduls successfully created.',
        'redirect_url' => route('courses.index')
    ]);
    }


    private function createCertificate($courseId, $request)
{
    $ttdFiles = [];

    // Simpan tanda tangan yang diunggah
    if ($request->hasFile('certificate_ttd')) {
        foreach ($request->file('certificate_ttd') as $ttdFile) {
            // Simpan file tanda tangan dan tambahkan path ke array
            $ttdFiles[] = $ttdFile->store('certificates/signatures', 'public');
        }
    }

    // Buat sertifikat dan simpan array tanda tangan sebagai JSON
    return Certificate::create([
        'course_id' => $courseId,
        'file' => $request->file('certificate_file')
            ? $request->file('certificate_file')->store('certificates', 'public')
            : null,
        'ttd' => json_encode($ttdFiles), // Menyimpan array tanda tangan sebagai JSON
    ]);
}


    private function createBabAndModules($courseId, $babData)
{
    foreach ($babData as $bab) {
        // Buat bab untuk course
        $newBab = Bab::create([
            'course_id' => $courseId,
            'name' => $bab['name'],
            'slug' => Str::slug($bab['name']),
        ]);

        // Cek apakah ada modul dalam bab
        if (isset($bab['moduls'])) {
            foreach ($bab['moduls'] as $modul) {
                // Simpan video dan file untuk modul jika ada
                $videoPath = isset($modul['video']) ? $modul['video']->store('moduls/videos', 'public') : null;
                $filePath = isset($modul['file']) ? $modul['file']->store('moduls/files', 'public') : null;

                // Buat modul untuk bab
                $newBab->moduls()->create([
                    'name' => $modul['name'],
                    'slug' => Str::slug($modul['name']),
                    'materi' => $modul['materi'] ?? null,
                    'video' => $videoPath,
                    'file' => $filePath,
                ]);
            }
        }
    }
}


public function preview(Request $request)
{
    // Dapatkan data dari request
    $data = $request->all();

    // Render tampilan pratinjau
    $previewHtml = view('courses.preview', compact('data'))->render();

    return response()->json(['previewHtml' => $previewHtml]);
}
    
}
