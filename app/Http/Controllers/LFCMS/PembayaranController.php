<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use App\Models\CourseRegistration;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function pembayaranCMS()
    {
        $pembayaran = CourseRegistration::paginate(5);

        return view('lfcms.pages.pembayaran.pembayaran', compact('pembayaran'));
    }

}
