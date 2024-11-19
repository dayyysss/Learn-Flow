<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SettingController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login
        return view('dashboard.pages.settings.index', compact('user'));
    }
    
    public function edit()
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login

        return view('dashboard.pages.setings.index', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();
    
        try {
            // Validasi input
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'first_name' => ['nullable', 'string', 'max:255'],
                'last_name' => ['nullable', 'string', 'max:255'],
                'publik_name' => ['nullable', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
                // 'image' => ['nullable', 'image'], // Validasi untuk gambar opsional
                'profesi' => ['nullable'],
                'bio' => ['nullable'],
                'no_telp' => ['nullable'],
                // 'sosial_media' => ['nullable'],
                // 'password' => ['nullable', 'min:8'], // Password opsional
            ]);
        } catch (ValidationException $e) {
            // Mengembalikan error validasi
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        }
    
        try {
            // Update nama dan email
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'publik_name' => $validatedData['publik_name'],
                'profesi' => $validatedData['profesi'],
                'bio' => $validatedData['bio'],
                // 'sosial_media' => $validatedData['sosial_media'],
                'no_telp' => $validatedData['no_telp'],
            ]);
    
            // Jika password diisi, perbarui password
            // if (!empty($validatedData['password'])) {
            //     $user->update(['password' => Hash::make($validatedData['password'])]);
            // }
    
            // Update gambar jika disediakan
            // if ($request->hasFile('image')) {
            //     $imagePath = $request->file('image')->store('profile_images', 'public');
            //     $user->update(['image' => $imagePath]);
            // }
    
            return response()->json([
                'status' => 'success',
                'message' => 'Profil pengguna berhasil diperbarui.',
                'redirect_url' => route('settings.edit')
            ]);
        } catch (\Exception $e) {
            // Menangani error yang terjadi saat update
            Log::error("Gagal memperbarui profil pengguna", ['error' => $e->getMessage()]);
    
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memperbarui profil.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }
}
