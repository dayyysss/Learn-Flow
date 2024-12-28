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
        $klien = Client::where('status', 'publik')->get();

        return view('landing-page', compact('hero', 'about', 'artikel', 'klien'));
    }

    public function about()
    {
        return view('landing.pages.about.about');
    }

    public function course()
    {

        $categories = CategoryCourse::all();
        $instrukturs = CategoryCourse::all();
        $course = Course::where('publish_date', '<=', Carbon::now())
        ->with(['users', 'categories', 'babs.moduls', 'instrukturs'])->get();
        
        return view('landing.pages.course.course', compact('course', 'categories', 'instrukturs'));
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
    
        return view('landing.pages.blog.blog', array_merge(compact('artikel', 'category'),$commonData
        ));
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
        $categories = CategoryArtikel::orderBy('created_at', 'desc')->get();
        $recentPosts = Artikel::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    
        $popularTags = DB::table('artikel')
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
    
        // Hapus variable yang tidak digunakan
        return compact('categories', 'popularTags', 'recentPosts');
    }
}
