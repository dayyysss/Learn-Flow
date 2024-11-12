<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        // Ambil semua data kategori layanan dan muat relasi user
        $categories = CategoryCourse::with('users')->get();
        return view('dashboard.pages.kategori-kursus.index', compact('categories'));
    }  
}
