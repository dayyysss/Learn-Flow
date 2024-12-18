<?php

namespace App\Http\Controllers\LFCMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardCMSController extends Controller
{
    public function indexCMS()
    {
        $user = auth()->user();

        return view('lfcms.pages.dashboard.index', compact('user'));
    }

    public function penggunaCMS()
    {
        return view('lfcms.pages.user.user');
    }
    
    public function administratorCMS()
    {
        return view('lfcms.pages.user.administrator');
    }

    public function klienCMS()
    {
        return view('lfcms.pages.klien.index');
    }

    public function halamanCMS()
    {
        return view('lfcms.pages.halaman.index');
    }

    public function kontakCMS()
    {
        return view('lfcms.pages.kontak.index');
    }

    public function artikelCMS()
    {
        return view('lfcms.pages.artikel.index');
    }
    
    public function kategoriartikelCMS()
    {
        return view('lfcms.pages.artikel.kategori.index');
    }

    public function pembayaranCMS()
    {
        return view('lfcms.pages.pembayaran.pembayaran');
    }

    public function historypembayaranCMS()
    {
        return view('lfcms.pages.pembayaran.pembayaran-history');
    }

    public function pengaturanCMS()
    {
        return view('lfcms.pages.pengaturan.index  ');
    }

    public function testimonialCMS()
    {
        return view('lfcms.pages.testimonial.index');
    }
}
