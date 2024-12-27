<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryCourse;
use App\Models\CategoryArtikel;
use App\Models\Course;
use App\Models\Page;
use App\Models\Artikel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class LandingPageController extends Controller
{
    public function index()
    {
        $hero = Page::with('users')->where('status', 'publik')->find(1);
        $about = Page::with('users')->where('status', 'publik')->find(2);

        $artikel = Artikel::where('status', '1')->orderBy('created_at', 'desc')->take(3)->get();

        return view('landing-page', compact('hero', 'about', 'artikel'));
    }

    public function about()
    {
        return view('landing.pages.about.about');
    }

    public function course()
    {

        $categories = CategoryCourse::all();
        $instrukturs = CategoryCourse::all();
        
        // Lakukan eager loading relasi 'category_courses'
        $course = Course::where('publish_date', '<=', Carbon::now())
        ->with(['users', 'categories', 'babs.moduls', 'instrukturs'])->paginate(10);

        $commonData = $this->loadCommonData();
        
        return view('landing.pages.course.course', array_merge(
            ['course' => $course, 'categories' => $categories, 'instrukturs' => $instrukturs],
            $commonData, 
        ));
    }

    public function zoomWebinar()
    {
        return view('landing.pages.zoom-webinars.zoom');
    }

    public function event()
    {
        return view('landing.pages.events.event');
    }

    public function artikel()
    {
        $artikel = Artikel::where('status', '1')->orderBy('created_at', 'desc')->take(3)->get();

        $category = CategoryArtikel::all();

        return view('landing.pages.blog.blog', compact('artikel', 'category'));
    }

    // Fungsi menampilkan berdasarkan kategori artikel
    public function showCategory($name)
    {
        $category = CategoryArtikel::all();
        $categories = CategoryArtikel::where('name', $name)->firstOrFail();
        $artikel = Artikel::where('category_id', $categories->id)
            ->orderBy('created_at', 'desc')
            ->paginate(3);

    
        return view('landing.pages.blog.blog', compact('artikel', 'categories', 'category'));
    }

    // Fungsi pencarian artikel
    public function search(Request $request)
    {
        $search = $request->input('search');
        $artikel = Artikel::where('status', '1')
            ->where(function ($query) use ($search) {
                $query->where('keyword', 'LIKE', "%{$search}%")
                    ->orWhere('judul', 'LIKE', "%{$search}%")
                    ->orWhere('deskripsi', 'LIKE', "%{$search}%");
            })
            ->paginate(3);
    
        return view('landing.pages.blog.blog', compact('artikel', 'search'));
    }

    public function contact()
    {
        return view('landing.pages.contact.contact');
    }

    public function instructor()
    {
        return view('landing.pages.instructor.instructor');
    }
    
    private function loadCommonData()
{
    // Ambil kategori dan hitung jumlah kursus yang terkait
    $categories = CategoryCourse::withCount(['courses' => function ($query) {
        // Menyesuaikan kolom yang digunakan untuk relasi
        $query->whereColumn('courses.categories_id', 'category_courses.id');
    }])
    ->orderBy('courses_count', 'desc') // Urutkan berdasarkan jumlah kursus
    ->get();

    // Ambil tag populer berdasarkan kursus
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

    // Kembalikan data kategori dan tag populer
    return compact('categories', 'popularTags');
}



}
