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
    
    public function administratorCMS()
    {
        return view('lfcms.pages.user.administrator');
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
    
    public function kategoriartikelCMS()
    {
        return view('lfcms.pages.artikel.kategori.kategori');
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
        return view('lfcms.pages.pengaturan.pengaturan  ');
    }

    public function testimonialCMS()
    {
        return view('lfcms.pages.testimonial.testimonial');
    }
}
