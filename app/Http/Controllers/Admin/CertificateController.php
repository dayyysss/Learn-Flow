<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        return view('landing.pages.course.certificate');
    }
}
