<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\CourseRegistration;
use Illuminate\Http\Request;

class HistoryPembayaranController extends Controller
{
    public function historypembayaranCMS()
    {
        $history = CourseRegistration::where('registration_status', 'confirmed')->paginate(5);

        $totalConfirmed = CourseRegistration::where('registration_status', 'confirmed')->count();

        return view('lfcms.pages.pembayaran.pembayaran-history', compact('history', 'totalConfirmed'));
    }
}
