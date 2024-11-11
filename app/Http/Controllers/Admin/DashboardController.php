<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.dashboard.index');
    }

    public function profile()
    {
        return view('dashboard.pages.profile.index');
    }

    public function message()
    {
        return view('dashboard.pages.message.index');
    }

    public function courses()
    {
        return view('dashboard.pages.courses.index');
    }

    public function reviews()
    {
        return view('dashboard.pages.reviews.index');
    }

    public function quiz()
    {
        return view('dashboard.pages.quiz.index');
    }

    public function settings()
    {
        return view('dashboard.pages.settings.index');
    }
}
