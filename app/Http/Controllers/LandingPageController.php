<?php

namespace App\Http\Controllers;

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
        return view('landing.pages.course.course');
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
