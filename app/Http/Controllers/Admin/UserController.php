<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function instrukturDetail()
{
    // Ambil instruktur ID dari session atau konteks lain
    $instrukturId = session('instruktur_id');
    
    // Cari instruktur berdasarkan ID
    $instruktur = User::find($instrukturId);

    // Jika instruktur tidak ditemukan, kembalikan error atau redirect
    if (!$instruktur) {
        return redirect()->back()->with('error', 'Instruktur tidak ditemukan.');
    }

    return view('landing.pages.instructor.instructor-detail', compact('instruktur'));
}

public function index()
{
    $user = User::paginate(10);

    return view('lfcms.pages.user.administrator', compact('user'));
}

}
                