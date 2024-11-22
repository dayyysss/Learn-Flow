<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCMSController extends Controller
{
    public function indexCMS()
    {
        return view('lfcms.pages.dashboard.index');
    }

    public function penggunaCMS()
    {
        return view('lfcms.pages.user.user');
    }

    public function klienCMS()
    {
        return view('lfcms.pages.klien.klien');
    }

    public function halamanCMS()
    {
        return view('lfcms.pages.halaman.halaman');
    }

    public function kontakCMS()
    {
        return view('lfcms.pages.kontak.kontak');
    }

    public function artikelCMS()
    {
        return view('lfcms.pages.artikel.artikel');
    }

    public function pembayaranCMS()
    {
        return view('lfcms.pages.pembayaran.pembayaran');
    }

    
    public function pengaturanCMS()
    {
        return view('lfcms.pages.pengaturan.pengaturan  ');
    }
}
