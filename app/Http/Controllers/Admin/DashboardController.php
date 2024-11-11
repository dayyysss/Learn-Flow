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

    public function myProfile()
    {
        return view('dashboard.pages.my-profile.index');
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

    public function quizAttempts()
    {
        return view('dashboard.pages.quiz.index');
    }

    public function settings()
    {
        return view('dashboard.pages.settings.index');
    }

    public function orderHistory()
    {
        return view('dashboard.pages.order-history.index');
    }

    public function myCourse()
    {
        return view('dashboard.pages.my-course.index');
    }

    public function assignments()
    {
        return view('dashboard.pages.assignments.index');
    }

    public function announcements()
    {
        return view('dashboard.pages.announcements.index');
    }

    public function enrolledCourses()
    {
        return view('dashboard.pages.enrolled-courses.index');
    }

    public function wishlist()
    {
        return view('dashboard.pages.wishlist.index');
    }

    public function cart()
    {
        return view('dashboard.pages.cart.index');
    }

    public function checkout()
    {
        return view('dashboard.pages.checkout.index');
    }
}
