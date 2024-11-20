<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCMSController extends Controller
{
    public function index()
    {
        return view('lfcms.pages.dashboard.index');
    }
}
