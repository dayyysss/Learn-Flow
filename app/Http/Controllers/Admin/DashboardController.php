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
    public function indexUser()
    {
        
        return view('dashboard.layouts.layouts', compact('user'));
    }

    public function myProfile()
    {
        return view('dashboard.pages.my-profile.index');
    }

    public function message()
    {
        return view('dashboard.pages.message.index');
    }

    public function coursesCreate()
    {
        return view('dashboard.pages.courses.create');
    }

    public function reviews()
    {
        return view('dashboard.pages.reviews.index');
    }

    public function settings()
    {
        return view('dashboard.pages.settings.index');
    }

    public function orderHistory()
    {
        return view('dashboard.pages.order-history.index');
    }

    public function assignments()
    {
        return view('dashboard.pages.assignments.index');
    }

    public function announcements()
    {
        return view('dashboard.pages.announcements.index');
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
