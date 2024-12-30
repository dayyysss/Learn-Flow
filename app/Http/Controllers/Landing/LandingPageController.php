<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryCourse;
use App\Models\CategoryArtikel;
use App\Models\Course;
use App\Models\Page;
use App\Models\Artikel;
use App\Models\Client;
use App\Models\Testimonial;
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
        $testimonial = Testimonial::where('status', 'publik')->orderBy('created_at', 'desc')->take(2)->get();
        $klien = Client::where('status', 'publik')->get();
        $commonData = $this->loadCommonData();

        return view('landing-page', array_merge(compact('hero', 'about', 'artikel', 'klien', 'testimonial'), $commonData));
    }

    public function about()
    {
        $testimonial = Testimonial::where('status', 'publik')->get();
        $klien = Client::where('status', 'publik')->orderBy('created_at', 'desc')->take(9)->get();

        return view('landing.pages.about.about', compact('testimonial', 'klien'));
    }

    public function course(Request $request)
    {
        // Mengambil semua kategori dengan jumlah kursus terkait
        $categories = CategoryCourse::withCount('courses')->get();
        $instrukturs = CategoryCourse::all();
        
        // Ambil parameter kategori, tag, skill_level, dan search dari permintaan
        $selectedCategory = $request->get('category');
        $selectedTag = $request->get('tag');
        $selectedSkillLevel = $request->get('skill_level');
        $searchQuery = $request->get('search'); // Menambahkan pencarian
    
        // Query kursus dengan filter kategori, tag, skill_level, dan pencarian
        $courseQuery = Course::where('publish_date', '<=', Carbon::now())
            ->with(['users', 'categories', 'babs.moduls', 'instrukturs']);
        
        if ($selectedCategory) {
            $courseQuery->whereHas('categories', function ($query) use ($selectedCategory) {
                $query->where('slug', $selectedCategory);
            });
        }
        
        if ($selectedTag) {
            $courseQuery->where('tags', 'like', '%' . $selectedTag . '%');
        }
        
        if ($selectedSkillLevel) {
            $courseQuery->where('tingkatan', $selectedSkillLevel);
        }
    
        if ($searchQuery) {
            $courseQuery->where(function($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%') // Pencarian berdasarkan judul
                      ->orWhere('deskripsi', 'like', '%' . $searchQuery . '%'); // Pencarian berdasarkan deskripsi
            });
        }
    
        // Paginasi hasil kursus
        $course = $courseQuery->paginate(10);
    
        // Menambahkan parameter pencarian pada URL pagination
        $course->appends([
            'search' => $searchQuery,
            'category' => $selectedCategory,
            'tag' => $selectedTag,
            'skill_level' => $selectedSkillLevel,
        ]);
    
        // Data umum lainnya
        $commonData = $this->loadCommonData();
        
        return view('landing.pages.course.course', array_merge(
            [
                'course' => $course,
                'categories' => $categories,
                'instrukturs' => $instrukturs,
                'selectedCategory' => $selectedCategory,
                'selectedTag' => $selectedTag,
                'selectedSkillLevel' => $selectedSkillLevel,
                'searchQuery' => $searchQuery, // Menyertakan query pencarian
            ],
            $commonData
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
        $artikel = Artikel::where('status', '1')->orderBy('created_at', 'desc')->paginate(3);
        $category = CategoryArtikel::all();
        $commonData = $this->loadCommonData();
    
        return view('landing.pages.blog.blog', array_merge(compact('artikel', 'category'),$commonData));
    }
    
    public function showCategory($name)
    {
        $category = CategoryArtikel::all();
        $categories = CategoryArtikel::where('name', $name)->firstOrFail();
        $commonData = $this->loadCommonData();
        $artikel = Artikel::where('category_id', $categories->id)
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('landing.pages.blog.blog', array_merge(compact('artikel', 'categories', 'category'),$commonData));
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');
        $category = CategoryArtikel::all();
        $commonData = $this->loadCommonData();
        $artikel = Artikel::where('status', '1')
            ->where(function ($query) use ($search) {
                $query->where('keyword', 'LIKE', "%{$search}%")
                    ->orWhere('judul', 'LIKE', "%{$search}%")
                    ->orWhere('deskripsi', 'LIKE', "%{$search}%");
            })
            ->paginate(3);
        
        return view('landing.pages.blog.blog', array_merge(compact('artikel', 'search', 'category'),$commonData));
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
        $latestArticles = Artikel::orderBy('created_at', 'desc')->take(3)->get();
        $categoriesArtikel = CategoryArtikel::orderBy('created_at', 'desc')->get();
        $recentPosts = Artikel::where('status', '1')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
        // Ambil kategori dan hitung jumlah kursus yang terkait
        $categories = CategoryCourse::withCount(['courses' => function ($query) {
            // Filter kursus dengan publish_date yang sudah terlewat
            $query->where('publish_date', '<=', now());
        }])
        ->orderBy('courses_count', 'desc') // Urutkan berdasarkan jumlah kursus
        ->get();
    
        // Ambil tag populer berdasarkan kursus dengan publish_date yang sudah terlewat
        $popularTags = DB::table('courses')
            ->whereNotNull('tags') // Pastikan tags tidak null
            ->where('publish_date', '<=', now()) // Filter kursus dengan publish_date yang sudah terlewat
            ->pluck('tags') // Ambil kolom tags
            ->flatMap(function ($tagsString) {
                // Pecah string tags menjadi array
                return explode(',', $tagsString);
            })
            ->map(fn($tag) => trim($tag)) // Hilangkan spasi pada setiap tag
            ->filter() // Hilangkan nilai kosong
            ->countBy() // Hitung jumlah kemunculan setiap tag
            ->sortDesc() // Urutkan berdasarkan jumlah kemunculan
            ->take(10); // Ambil 10 tag teratas

        $popularTagsArtikel = DB::table('artikel')
            ->whereNotNull('tag')
            ->pluck('tag')
            ->flatMap(function ($tagsString) {
                return explode(',', $tagsString);
            })
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->countBy()
            ->sortDesc()
            ->take(10);
        
        // Kembalikan data kategori dan tag populer
        return compact('categories', 'popularTags', 'categoriesArtikel', 'recentPosts', 'popularTagsArtikel');
    }
}
