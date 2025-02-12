<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\CategoryCourse;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\ModulProgress;
use App\Models\User;
use App\Providers\CourseFeedbackService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    protected $courseFeedbackService;

    public function __construct(CourseFeedbackService $courseFeedbackService)
    {
        $this->courseFeedbackService = $courseFeedbackService;
    }

    public function index()
    {
        // Ambil semua data kategori layanan dan muat relasi user
        $categories = CategoryCourse::all();
        $instrukturs = CategoryCourse::all();

        // Lakukan eager loading relasi 'category_courses'
        $course = Course::with(['users', 'categories', 'babs.moduls', 'instrukturs'])
            ->paginate(10);
        $course_draft = Course::where('status', 'draft')->with(['users', 'categories', 'babs.moduls', 'instrukturs'])->get();

        // Mengambil kursus dengan status 'terjadwal' dan publish_date yang belum sama atau lebih dari waktu sekarang
        $course_terjadwal = Course::where('publish_date', '>', Carbon::now())
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs'])
            ->get();

        // Ambil feedback untuk kursus
        $feedbacks = Feedback::selectRaw('course_id, AVG(rating) as average_rating, COUNT(*) as total_feedbacks')
            ->groupBy('course_id')
            ->get();

        // Hitung rating dan feedback untuk setiap kursus menggunakan service
        $courses = $this->courseFeedbackService->calculateFeedbacks($course, $feedbacks);


        return view('lfcms.pages.kursus.index', compact('course', 'course_draft', 'course_terjadwal', 'categories', 'instrukturs'));
    }


    public function create()
    {
        $instruktur = User::where('role_id', 1)->get();
        $categories = CategoryCourse::all();
        // Ambil semua data kategori layanan dan muat relasi user
        $course = Course::with('users', 'categories')->get();
        return view('lfcms.pages.kursus.create', compact('course', 'categories', 'instruktur'));
    }

    public function store(Request $request)
    {

        // dd(request()->all());
        // Validasi data yang diperlukan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:category_courses,id',
            'deskripsi' => 'nullable|string',
            'instruktur_id' => 'nullable|exists:users,id',
            'harga' => 'nullable',
            'harga_diskon' => 'nullable',
            'tanggal_mulai' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:255',
            'status' => 'nullable|in:draft,publik,terjadwal',
            'tingkatan' => 'nullable',
            'kode_seri' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_file' => 'nullable|file|mimes:mp4,mov,avi|max:50000',
            'video_url' => 'nullable|url',
            'berbayar' => 'nullable|in:true,false',
            'publish_date' => 'nullable',
            // Validasi untuk banyak file TTD
            'certificate_ttd.*' => 'nullable|file|mimes:jpg,png|max:1024',
            // Validasi untuk Bab dan Modul
            // 'bab.*.name' => 'nullable|string',
            // 'bab.*.moduls.*.name' => 'nullable|string',
            // 'bab.*.moduls.*.materi' => 'nullable|string',
            // 'bab.*.moduls.*.video' => 'nullable',
            // 'bab.*.moduls.*.file' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
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
        $harga_diskon = is_numeric($harga_diskon) ? (float) $harga_diskon : 0;

        // Set publish_date otomatis jika status "publik"
        if ($request->status === 'publik' && empty($request->publish_date)) {
            $request->merge(['publish_date' => now()]);
        }

        // Create course
        $course = Course::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'categories_id' => $request->categories_id,
            'deskripsi' => $request->deskripsi,
            'instruktur_id' => $request->instruktur_id,
            'harga' => $harga,
            'harga_diskon' => $harga_diskon,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tags' => $request->tags,
            'kode_seri' => $request->kode_seri,
            'thumbnail' => $request->file('thumbnail') ? $request->file('thumbnail')->store('courses', 'public') : null,
            'video' => $videoPath,
            'status' => $request->status,
            'tingkatan' => $request->tingkatan,
            'berbayar' => $request->berbayar,
            'publish_date' => $request->publish_date,
            'slug' => Str::slug($request->name),
        ]);

        // Create certificate
        $this->createCertificate($course->id, $request);



        return response()->json([
            'status' => 'success',
            'message' => 'Course, certificate, and related bab and moduls successfully created.',
            'redirect_url' => route('kursus.index')
        ]);
    }


    private function createCertificate($courseId, $request)
    {
        // Memeriksa apakah ada data yang diperlukan untuk sertifikat
        if (!$request->hasFile('certificate_file') && !$request->hasFile('certificate_ttd')) {
            return; // Tidak melakukan apa-apa jika tidak ada data yang diisi
        }

        $ttdFiles = [];

        // Simpan tanda tangan yang diunggah
        if ($request->hasFile('certificate_ttd')) {
            foreach ($request->file('certificate_ttd') as $ttdFile) {
                // Simpan file tanda tangan dan tambahkan path ke array
                $ttdFiles[] = $ttdFile->store('certificates/signatures', 'public');
            }
        }

        // Buat sertifikat dan simpan array tanda tangan sebagai JSON jika ada file sertifikat
        return Certificate::create([
            'course_id' => $courseId,
            'file' => $request->file('certificate_file')
                ? $request->file('certificate_file')->store('certificates', 'public')
                : null,
            'ttd' => $ttdFiles ? json_encode($ttdFiles) : null, // Menyimpan array tanda tangan sebagai JSON jika ada
        ]);
    }

    public function show($slug)
    {
        // Cari course berdasarkan slug dan lakukan eager loading pada relasi yang diperlukan
        $course = Course::with(['users', 'categories', 'babs.moduls', 'instrukturs', 'certificate', 'babs.quiz', 'courseRegistrations'])
            ->where('slug', $slug)
            ->firstOrFail();

        $lastAccessedModul = null;
        $nextProsesModul = null;

        if (auth()->check()) {
            $user = auth()->user();
            $courseRegistration = $course->courseRegistrations->firstWhere('user_id', $user->id);

            if ($courseRegistration) {
                $lastAccessedModul = ModulProgress::where('course_registrations_id', $courseRegistration->id)
                    ->where('status', 'selesai')
                    ->orderBy('updated_at', 'desc')
                    ->first();

                $nextProsesModul = ModulProgress::where('course_registrations_id', $courseRegistration->id)
                    ->where('status', 'proses')
                    ->orderBy('updated_at', 'desc')
                    ->first();
            }
        }

        $firstModul = $course->babs->flatMap(function ($bab) {
            return $bab->moduls;
        })->sortBy('id')->first();

        // Ambil data feedback
        $feedbacks = Feedback::where('course_id', $course->id)->get();

        // Hitung total feedback dan rata-rata rating
        $total_feedbacks = $feedbacks->count();
        $average_rating = $total_feedbacks > 0 ? $feedbacks->avg('rating') : 0;

        // Set hasil yang dihitung ke dalam objek course
        $course->average_rating = $average_rating;
        $course->total_feedbacks = $total_feedbacks;

        $thumbnailUrl = $this->getVideoThumbnail($course->video);
        $commonData = $this->loadCommonData();

        // Perhitungan diskon
        $hargaAsli = $course->harga;
        $hargaDiskon = $course->harga_diskon;

        // Hitung persentase diskon
        if ($hargaAsli > 0 && $hargaDiskon >= 0) {
            $persentaseDiskon = (($hargaDiskon / $hargaAsli)) * 100;
        } else {
            $persentaseDiskon = 0;
        }

        $relatedCourses = Course::where('instruktur_id', $course->instruktur_id)
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs', 'certificate', 'babs.quiz', 'courseRegistrations'])
            ->where('id', '!=', $course->id) // Pastikan tidak termasuk course yang sedang dilihat
            ->orderBy('created_at', 'desc')
            ->take(5) // Misalnya tampilkan 5 course terkait
            ->get();

        // Kirimkan data course ke tampilan show bersama dengan data umum
        return view('lfcms.pages.kursus.detail', array_merge(
            [
                'course' => $course,
                'thumbnailUrl' => $thumbnailUrl,
                'persentaseDiskon' => $persentaseDiskon,
                'relatedCourses' => $relatedCourses,
                'courseRegistrations' => $course->courseRegistrations,
                'firstModul' => $firstModul,
                'lastAccessedModul' => $lastAccessedModul,
                'nextProsesModul' => $nextProsesModul,
                'feedbacks' => $feedbacks
            ],
            $commonData
        ));
    }

    private function loadCommonData()
    {
        $categories = CategoryCourse::orderBy('created_at', 'desc')->get();

        $popularTags = DB::table('courses')
            ->whereNotNull('tags')
            ->pluck('tags')
            ->flatMap(function ($tagsString) {
                return explode(',', $tagsString);
            })
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->countBy()
            ->sortDesc()
            ->take(10);

        $recentPostsCourse = Course::orderBy('created_at', 'desc')->take(3)->get();

        return compact('categories', 'popularTags', 'recentPostsCourse');
    }

    public function getVideoThumbnail($videoUrl)
    {
        // Default thumbnail jika bukan YouTube atau file video
        $thumbnailUrl = asset('assets/images/blog/blog_7.png');

        // Cek apakah URL dari YouTube
        $isYouTube = strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false;

        if ($isYouTube) {
            // Ekstrak ID video dari URL YouTube
            parse_str(parse_url($videoUrl, PHP_URL_QUERY), $videoParams);
            $videoId = $videoParams['v'] ?? null;
            if (!$videoId) {
                // Cek jika menggunakan format short URL (https://youtu.be/VIDEO_ID)
                $videoId = basename(parse_url($videoUrl, PHP_URL_PATH));
            }

            if ($videoId) {
                // URL Thumbnail dari YouTube
                $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
            }
        } elseif (Storage::disk('public')->exists($videoUrl)) {
            // Jika video adalah file yang di-upload, buat thumbnail default
            $thumbnailUrl = asset('storage/' . $videoUrl . '.jpg'); // Asumsi Anda membuat thumbnail dengan ekstensi .jpg
        }

        return $thumbnailUrl;
    }


    public function edit($id)
    {
        // Cari course berdasarkan ID atau gagal jika tidak ditemukan
        $course = Course::with('users', 'categories')->findOrFail($id);
    
        // Ambil instruktur dengan role_id = 1
        $instruktur = User::where('role_id', 1)->get();
    
        // Ambil semua kategori kursus
        $categories = CategoryCourse::all();
    
        // Kirim data ke view
        return view('lfcms.pages.kursus.edit', compact('course', 'categories', 'instruktur'));
    }
    

    public function update(Request $request, $id)
    {
        // Validasi data yang diperlukan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:category_courses,id',
            'deskripsi' => 'nullable|string',
            'instruktur_id' => 'nullable|exists:users,id',
            'harga' => 'nullable',
            'harga_diskon' => 'nullable',
            'tanggal_mulai' => 'nullable|date',
            'tags' => 'nullable|string',
            'status' => 'nullable|in:draft,publik,terjadwal',
            'tingkatan' => 'nullable',
            'kode_seri' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_file' => 'nullable|file|mimes:mp4,mov,avi|max:50000',
            'video_url' => 'nullable|url',
            'berbayar' => 'nullable|in:true,false',
            'publish_date' => 'nullable',
            'certificate_ttd.*' => 'nullable|file|mimes:jpg,png|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $course = Course::findOrFail($id);

        // Generate slug jika nama berubah
        if ($course->name !== $request->name) {
            $slug = Str::slug($request->name);
            $count = Course::where('slug', 'like', $slug . '%')->count();
            $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        } else {
            $slug = $course->slug;
        }

        // Video file or URL validation
        $videoPath = $request->hasFile('video_file')
            ? $request->file('video_file')->store('courses/videos', 'public')
            : $request->video_url;

        if (!$videoPath && !$course->video) {
            return redirect()->back()->withErrors(['video' => 'Please upload a video file or provide a video URL.'])->withInput();
        }

        // Menghapus simbol 'Rp' dan format lainnya, hanya menyisakan angka
        $harga = str_replace(['Rp', '.', ','], '', $request->harga);
        $harga = is_numeric($harga) ? (float) $harga : $course->harga;

        $harga_diskon = str_replace(['Rp', '.', ','], '', $request->harga_diskon);
        $harga_diskon = is_numeric($harga_diskon) ? (float) $harga_diskon : $course->harga_diskon;

        // Set publish_date otomatis jika status "publik"
        if ($request->status === 'publik' && empty($request->publish_date)) {
            $request->merge(['publish_date' => now()]);
        }

        // Update course
        $course->update([
            'name' => $request->name,
            'categories_id' => $request->categories_id,
            'deskripsi' => $request->deskripsi,
            'instruktur_id' => $request->instruktur_id,
            'harga' => $harga,
            'harga_diskon' => $harga_diskon,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tags' => $request->tags,
            'kode_seri' => $request->kode_seri,
            'thumbnail' => $request->file('thumbnail') ? $request->file('thumbnail')->store('courses', 'public') : $course->thumbnail,
            'video' => $videoPath ?: $course->video,
            'status' => $request->status,
            'tingkatan' => $request->tingkatan,
            'berbayar' => $request->berbayar,
            'publish_date' => $request->publish_date ?: $course->publish_date,
            'slug' => $slug,
        ]);

        // Update certificate
        $this->updateCertificate($course->id, $request);

        return response()->json([
            'status' => 'success',
            'message' => 'Course, certificate, and related data successfully updated.',
            'redirect_url' => route('kursus.index')
        ]);
    }

    private function updateCertificate($courseId, $request)
    {
        $certificate = Certificate::where('course_id', $courseId)->first();

        $ttdFiles = [];

        // Simpan tanda tangan yang diunggah
        if ($request->hasFile('certificate_ttd')) {
            foreach ($request->file('certificate_ttd') as $ttdFile) {
                $ttdFiles[] = $ttdFile->store('certificates/signatures', 'public');
            }
        }

        if ($certificate) {
            $certificate->update([
                'file' => $request->file('certificate_file')
                    ? $request->file('certificate_file')->store('certificates', 'public')
                    : $certificate->file,
                'ttd' => $ttdFiles ? json_encode($ttdFiles) : $certificate->ttd,
            ]);
        } else {
            Certificate::create([
                'course_id' => $courseId,
                'file' => $request->file('certificate_file')
                    ? $request->file('certificate_file')->store('certificates', 'public')
                    : null,
                'ttd' => $ttdFiles ? json_encode($ttdFiles) : null,
            ]);
        }
    }
}
