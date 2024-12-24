<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryCourse;
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

    public function blog()
    {
        return view('landing.pages.blog.blog');
    }

    public function contact()
    {
        return view('landing.pages.contact.contact');
    }

    public function instructor()
    {
        return view('landing.pages.instructor.instructor');
    }
}
