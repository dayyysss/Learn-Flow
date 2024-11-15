<?php

namespace App\Http\Controllers;

use App\Models\CategoryCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing-page');
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
        $course = Course::with(['users', 'categories', 'babs.moduls', 'instrukturs'])->get();
        
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
}
