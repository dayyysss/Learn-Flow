<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Bab;
use App\Models\Page;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Modul;
use App\Models\Client;
use App\Models\Course;
use App\Models\Artikel;
use App\Models\Feedback;
use App\Models\Certificate;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryCourse;
use App\Models\LFCMS\MenuList;
use App\Models\CategoryArtikel;
use App\Models\CourseRegistration;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\LFCMS\Administrator;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\ModulProgress;
use App\Models\WebsiteConfiguration;
use Illuminate\Support\Facades\Storage;
use App\Providers\CourseFeedbackService;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Validator;

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
        $course = Course::where('publish_date', '<=', Carbon::now())
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs'])
            ->get();
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


        return view('dashboard.pages.courses.index', compact('course', 'course_draft', 'course_terjadwal', 'categories', 'instrukturs'));
    }


    public function create()
    {
        $instruktur = User::where('role_id', 1)->get();
        $categories = CategoryCourse::all();
        // Ambil semua data kategori layanan dan muat relasi user
        $course = Course::with('users', 'categories')->get();
        return view('dashboard.pages.courses.create', compact('course', 'categories', 'instruktur'));
    }

    public function store(Request $request)
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
            'redirect_url' => route('courses.index')
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
                    $videoPath = null;

                    // Cek apakah video berupa URL YouTube atau file
                    if (isset($modul['video'])) {
                        if (filter_var($modul['video'], FILTER_VALIDATE_URL)) {
                            // Jika video berupa URL YouTube, simpan URL langsung
                            $videoPath = $modul['video'];
                        } elseif (is_object($modul['video'])) {
                            // Jika video berupa file yang diunggah, simpan file tersebut
                            $videoPath = $modul['video']->store('moduls/videos', 'public');
                        }
                    }

                    // Simpan file jika ada
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
        return view('landing.pages.course.course-detail', array_merge(
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


    public function showModul($courseSlug, $modulSlug)
    {
        $course = Course::where('slug', $courseSlug)->firstOrFail();
        $modul = Modul::with('bab.course')->where('slug', $modulSlug)->firstOrFail();
        $bab = $course->babs()->with(['moduls', 'quiz'])->get();
        $contactData = $this->getContactsLogo();

        $user = auth()->user();
        $courseRegistration = CourseRegistration::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        // Jika sudah terdaftar, cari atau buat data progress modul
        if ($courseRegistration) {
            $modulProgress = ModulProgress::firstOrCreate(
                [
                    'course_registrations_id' => $courseRegistration->id,
                    'modul_id' => $modul->id
                ],
                [
                    'status' => 'proses',
                    'progress' => 0 // Nilai default untuk progress, bisa disesuaikan
                ]
            );

            // Update status modul terakhir yang dilihat menjadi 'selesai'
            $lastModulProgress = ModulProgress::where('course_registrations_id', $courseRegistration->id)
                ->where('modul_id', $modul->id)
                ->first();
        }

        // Mengambil assignment berdasarkan modul dan user yang sedang login
        $assignment = Assignment::where('modul_id', $modul->id)
            ->where('user_id', $user->id)
            ->first();


        // Cari modul sebelumnya di bab yang sama
        $previousModul = Modul::where('bab_id', $modul->bab_id)
            ->where('id', '<', $modul->id)
            ->orderBy('id', 'desc')
            ->first();

        // Jika modul sebelumnya tidak ditemukan, cari dari bab sebelumnya
        if (!$previousModul) {
            $previousBab = $course->babs()->where('id', '<', $modul->bab_id)
                ->orderBy('id', 'desc')
                ->first();

            if ($previousBab) {
                $previousModul = $previousBab->moduls()->orderBy('id', 'desc')->first();
            }
        }

        // Cari modul berikutnya di bab yang sama
        $nextModul = Modul::where('bab_id', $modul->bab_id)
            ->where('id', '>', $modul->id)
            ->orderBy('id', 'asc')
            ->first();
        // Jika modul berikutnya tidak ditemukan, cari dari bab berikutnya
        if (!$nextModul) {
            $nextBab = $course->babs()->where('id', '>', $modul->bab_id)
                ->orderBy('id', 'asc')
                ->first();
            if ($nextBab) {
                $nextModul = $nextBab->moduls()->orderBy('id', 'asc')->first();
            }
        }

        $assignments = Assignment::where('modul_id', $modul->id)->get();

        $modul_progress = ModulProgress::where('modul_id', $modul->id)->first(); // Menyesuaikan dengan modul_id yang relevan

        if ($modul_progress) {
            $course_registration = $modul_progress->courseRegistration; // Ambil data CourseRegistration terkait
            $status = $course_registration ? $course_registration->status : null; // Ambil status jika ada
        }


        $isLastModul = !$nextModul; // True jika tidak ada modul berikutnya
        // Mengirim data ke view
        return view('dashboard.pages.lesson._modul_content', compact(
            'course',
            'modul',
            'bab',
            'previousModul',
            'nextModul',
            'assignment', // Menambahkan assignment ke dalam view
            'assignments',
            'modul_progress',
            'status',
            'isLastModul',
            'courseRegistration'
        ));
    }

    public function updateModulStatus(Request $request)
    {
        $modulId = $request->input('modulId');
        $user = auth()->user();

        $courseRegistration = CourseRegistration::where('user_id', $user->id)->first();

        if ($courseRegistration) {
            // Cari progress modul berdasarkan modul ID dan course_registrations_id
            $modulProgress = ModulProgress::where('modul_id', $modulId)
                ->where('course_registrations_id', $courseRegistration->id)
                ->first();

            if ($modulProgress && $modulProgress->status === 'proses') {
                // Perbarui status menjadi selesai
                $modulProgress->update(['status' => 'selesai']);
            }
        }

        return response()->json(['success' => true]);
    }





    public function showQuiz($courseSlug, $quizSlug)
    {
        $course = Course::where('slug', $courseSlug)->firstOrFail();
        $modul = Quiz::with('bab.course')->where('slug', $quizSlug)->firstOrFail();
        $bab = $course->babs()->with(['moduls', 'quiz'])->get();
        $contactData = $this->getContactsLogo();

        // Cari modul sebelumnya
        $previousModul = Modul::where('bab_id', $modul->bab_id)
            ->where('id', '<', $modul->id)
            ->orderBy('id', 'desc')
            ->first();

        // Cari modul berikutnya
        $nextModul = Modul::where('bab_id', $modul->bab_id)
            ->where('id', '>', $modul->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('dashboard.pages.lesson._quiz_content', compact('course', 'modul', 'bab', 'previousModul', 'nextModul'));
    }


    public function showBab($slug)
    {
        // Mencari Course berdasarkan slug
        $course = Course::where('slug', $slug)->firstOrFail();

        // Mengambil semua Bab yang terkait dengan Course ini beserta Modul dan Quiznya
        $bab = $course->babs()->with(['moduls', 'quiz'])->get();

        // Mengirim data course dan bab ke view
        return view('dashboard.pages.lesson.lesson', compact('course', 'bab'));
    }


    public function myCourses()
    {
        // Ambil instruktur yang sedang login
        $instrukturId = auth()->user()->id;

        // Ambil course yang instruktur_id-nya sama dengan ID instruktur yang sedang login
        $courses_publik = Course::where('instruktur_id', $instrukturId)
            ->where('publish_date', '<=', Carbon::now())
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs']) // Eager loading relasi yang diperlukan
            ->get();
        $courses_draft = Course::where('instruktur_id', $instrukturId)
            ->where('status', 'draft')
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs']) // Eager loading relasi yang diperlukan
            ->get();
        $courses_terjadwal = Course::where('instruktur_id', $instrukturId)
            ->where('publish_date', '>', Carbon::now())
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs']) // Eager loading relasi yang diperlukan
            ->get();

        // Kembalikan ke tampilan atau API response
        return view('dashboard.pages.my-course.index', compact('courses_publik', 'courses_draft', 'courses_terjadwal'));
    }

    // public function printCertificate($registrationId)
    // {
    //     // Mengambil informasi pendaftaran kursus
    //     $courseRegistration = CourseRegistration::with(['user', 'course'])
    //         ->where('id', $registrationId)
    //         ->first();

    //     if (!$courseRegistration) {
    //         return redirect()->back()->with('error', 'Pendaftaran tidak ditemukan.');
    //     }

    //     // Mengambil sertifikat yang sesuai dengan kursus
    //     $certificate = Certificate::where('course_id', $courseRegistration->course_id)->first();

    //     if (!$certificate) {
    //         return redirect()->back()->with('error', 'Sertifikat tidak ditemukan.');
    //     }

    //     // Parsing tanda tangan, pastikan ini menjadi array
    //     $ttd = json_decode($certificate->ttd, true);

    //     if (!is_array($ttd)) {
    //         $ttd = [];
    //     }

    //     // Data untuk view
    //     $data = [
    //         'nama_pendaftar'  => $courseRegistration->user->name,
    //         'nama_kursus'     => $courseRegistration->course->name,
    //         'kode_seri_kursus'=> $courseRegistration->course->kode_seri,
    //         'file_sertifikat' => $certificate->file,
    //         'ttd'             => $ttd,
    //         'backgroundImage' => $certificate->background_image // Pastikan ini sudah ada dalam tabel Certificate
    //     ];

    //     // Menggunakan DomPDF untuk generate PDF
    //     $pdf = PDF::loadView('certificate.template', $data);

    //     // Menyimpan PDF
    //     return $pdf->download('sertifikat.pdf');
    // }

    public function myEnrolledCourses()
    {
        // Ambil ID siswa yang sedang login
        $studentId = auth()->user()->id;

        // Cari kursus yang sudah didaftarkan oleh siswa yang sedang login
        $enrolledCourses = CourseRegistration::where('user_id', $studentId)
            ->with(['course.users', 'course.categories', 'course.babs.moduls', 'course.instrukturs']) // Eager loading relasi yang diperlukan
            ->get()
            ->pluck('course');

        // Kembalikan ke tampilan atau API response
        return view('dashboard.pages.enrolled-courses.index', compact('enrolledCourses'));
    }

    public function getContactsLogo()
    {
        // Ambil data kontak dari konfigurasi website
        $websiteConfig = WebsiteConfiguration::first();
        // $contacts = json_decode($websiteConfig->informasi_kontak, true);
        // $socialMedia = json_decode($websiteConfig->informasi_sosial_media, true);
        $pagesDeskripsi = Page::with('users')->find(3);

        // Ambil logo dan favicon
        // $favicon = Logo::where('type', 'favicon')->first();
        // $logoDark = Logo::where('type', 'gelap')->first();
        // $logoBright = Logo::where('type', 'terang')->first();

        $latestArticles = Artikel::orderBy('created_at', 'desc')->take(3)->get();
        $configuration = WebsiteConfiguration::first();

        return [
            // 'contacts' => $contacts,
            // 'socialMedia' => $socialMedia,
            'websiteConfig' => $websiteConfig,
            'pagesDeskripsi' => $pagesDeskripsi,
            'latestArticles' => $latestArticles,
            'configuration' => $configuration,
            // 'favicon' => $favicon,
            // 'logoDark' => $logoDark,
            // 'logoBright' => $logoBright,
        ];
    }

    public function showModulAdmin($courseSlug, $modulSlug)
    {
        // Mengambil data course berdasarkan slug
        $course = Course::where('slug', $courseSlug)->firstOrFail();

        // Mengambil data modul berdasarkan slug
        $modul = Modul::with('bab.course')->where('slug', $modulSlug)->firstOrFail();

        // Mengambil data bab yang terkait dengan modul
        $bab = $course->babs()->with(['moduls', 'quiz'])->get();

        // Mendapatkan data kontak dan logo
        $contactData = $this->getContactsLogo();

        // Mendapatkan user yang sedang login
        $user = auth()->user();

        // Mencari apakah user sudah terdaftar di course ini
        $courseRegistration = CourseRegistration::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        // Jika sudah terdaftar, cari atau buat data progress modul
        $modulProgress = null;
        $lastModulProgress = null;
        if ($courseRegistration) {
            $modulProgress = ModulProgress::firstOrCreate(
                [
                    'course_registrations_id' => $courseRegistration->id,
                    'modul_id' => $modul->id
                ],
                [
                    'status' => 'proses',
                    'progress' => 0 // Nilai default untuk progress
                ]
            );

            // Update status modul terakhir yang dilihat menjadi 'selesai'
            $lastModulProgress = ModulProgress::where('course_registrations_id', $courseRegistration->id)
                ->where('modul_id', $modul->id)
                ->first();
        }

        // Mengambil assignment berdasarkan modul dan user yang sedang login
        $assignment = Assignment::where('modul_id', $modul->id)
            ->where('user_id', $user->id)
            ->first();

        // Cari modul sebelumnya di bab yang sama
        $previousModul = Modul::where('bab_id', $modul->bab_id)
            ->where('id', '<', $modul->id)
            ->orderBy('id', 'desc')
            ->first();

        // Jika modul sebelumnya tidak ditemukan, cari dari bab sebelumnya
        if (!$previousModul) {
            $previousBab = $course->babs()->where('id', '<', $modul->bab_id)
                ->orderBy('id', 'desc')
                ->first();

            if ($previousBab) {
                $previousModul = $previousBab->moduls()->orderBy('id', 'desc')->first();
            }
        }

        // Cari modul berikutnya di bab yang sama
        $nextModul = Modul::where('bab_id', $modul->bab_id)
            ->where('id', '>', $modul->id)
            ->orderBy('id', 'asc')
            ->first();

        // Jika modul berikutnya tidak ditemukan, cari dari bab berikutnya
        if (!$nextModul) {
            $nextBab = $course->babs()->where('id', '>', $modul->bab_id)
                ->orderBy('id', 'asc')
                ->first();

            if ($nextBab) {
                $nextModul = $nextBab->moduls()->orderBy('id', 'asc')->first();
            }
        }

        // Mengambil semua assignments untuk modul ini
        $assignments = Assignment::with('user')->where('modul_id', $modul->id)->get();

        // Mengirim data ke view
        return view('dashboard.pages.lesson-admin._modul_content', compact(
            'course',
            'modul',
            'bab',
            'previousModul',
            'nextModul',
            'assignment', // Menambahkan assignment spesifik user
            'assignments' // Semua assignments untuk modul ini
        ));
    }

    public function showCourseRegistration($course_slug)
    {
        // Ambil ID user yang sedang login
        $userId = auth()->user()->id;

        // Ambil data course_registration yang sesuai dengan user dan course_slug
        $courseRegistration = CourseRegistration::where('user_id', $userId)
            ->whereHas('course', function ($query) use ($course_slug) {
                $query->where('slug', $course_slug);
            })
            ->with(['course', 'course.babs', 'course.babs.moduls', 'course.babs.moduls.modul_progress']) // Eager load relasi dengan course
            ->first(); // Mengambil hanya satu data

        if (!$courseRegistration) {
            abort(404, 'Course tidak ditemukan atau Anda tidak terdaftar pada course ini.');
        }

        $lastAccessedModul = null;
        $nextProsesModul = null;

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

        // Hitung progress per BAB
        $babsProgress = $courseRegistration->course->babs->map(function ($bab) use ($courseRegistration) {
            // Hitung jumlah total modul dan jumlah modul selesai
            $totalModul = $bab->moduls->count();
            $completedModul = $bab->moduls->filter(function ($modul) use ($courseRegistration) {
                return ModulProgress::where('course_registrations_id', $courseRegistration->id)
                    ->where('modul_id', $modul->id)
                    ->where('status', 'selesai')
                    ->exists();
            })->count();

            // Hitung progress per BAB
            $progress = $totalModul > 0 ? ($completedModul / $totalModul) * 100 : 0;

            return [
                'bab' => $bab,
                'progress' => round($progress, 2)
            ];
        });

        // Ambil modul pertama yang perlu dipelajari
        $firstModul = $courseRegistration->course->babs->flatMap(function ($bab) {
            return $bab->moduls;
        })->sortBy('id')->first();

        // $modul_status = Modul::with('modul_progress')->get();
        // Kirim data ke view
        return view(
            'dashboard.pages.enrolled-courses.detail',
            compact(
                'courseRegistration',
                'firstModul',
                'lastAccessedModul',
                'nextProsesModul',
                'babsProgress', // Kirim data progress per BAB ke view
                // 'modul_status'
            )
        );
    }
}
