<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

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
    $user = User::with('roles')->paginate(10);
    $role = Role::all();

    return view('lfcms.pages.user.administrator.administrator', compact('user', 'role'));
}

public function create()
{
    $roles = Role::all(); // Mengambil semua role dari database
    return view('admin.administrator.create', compact('roles'));
}

public function store(Request $request)
{
// Validasi input
Validator::make($request->all(), [
    'first_name' => ['required', 'string', 'max:255'],
    'last_name' => ['required', 'string', 'max:255'],
    'name' => ['required', 'string', 'max:255'],
    'email' => [
        'required',
        'string',
        'email',
        'max:255',
        Rule::unique(User::class),
    ],
    'password' => ['required'],
    'password_confirmation' => ['required', 'same:password'], // Menambahkan konfirmasi password
    'roles' => ['required', 'array'], // Validasi roles
    'roles.*' => ['exists:roles,name'], // Pastikan roles yang dipilih valid
])->validate();

// Set default image path
$defaultImagePath = 'profile_images/default.png';

// Buat pengguna baru dengan gambar default
$user = User::create([
    'first_name' => $request['first_name'],
    'last_name' => $request['last_name'],
    'name' => $request['name'],
    'email' => $request['email'],
    'password' => Hash::make($request['password_regist']),
    'image' => $defaultImagePath, // Set gambar default
]);

// Tetapkan role setelah user dibuat
$user->assignRole($request['roles']); // Mengassign role yang dipilih

// Tandai email sebagai terverifikasi jika diminta
// if ($request->has('verify_email')) {
//     $user->markEmailAsVerified();

//     try {
//         Mail::to($user->email)->send(new UserRegistered($user, $password));
//         \Log::info('Email berhasil dikirim ke: ' . $user->email);
//     } catch (\Exception $e) {
//         \Log::error('Gagal mengirim email: ' . $e->getMessage());
//     }
// }



return response()->json([
    'status' => 'success',
    'message' => 'Pengguna berhasil ditambahkan!',
    'redirect_url' => route('users.index') // URL tujuan
]);
}
}
