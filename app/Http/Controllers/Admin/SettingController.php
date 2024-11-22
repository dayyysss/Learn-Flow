<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
            'name' => ['nullable', 'string', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'publik_name' => ['nullable', 'string', 'max:255'],
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'image' => ['nullable', 'image'], // Validasi untuk gambar opsional
            'profesi' => ['nullable'],
            'bio' => ['nullable'],
            'no_telp' => ['nullable'],
            'sosial_media' => ['nullable'],
            'password' => ['nullable', 'min:8'], // Password opsional
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
        // Update data hanya jika disediakan, simpan data sebelumnya jika tidak ada perubahan
        $user->update([
            'name' => $validatedData['name'] ?? $user->name,
            'email' => $validatedData['email'] ?? $user->email,
            'first_name' => $validatedData['first_name'] ?? $user->first_name,
            'last_name' => $validatedData['last_name'] ?? $user->last_name,
            'publik_name' => $validatedData['publik_name'] ?? $user->publik_name,
            'profesi' => $validatedData['profesi'] ?? $user->profesi,
            'bio' => $validatedData['bio'] ?? $user->bio,
            // 'sosial_media' => $validatedData['sosial_media'] ?? $user->sosial_media,
            'no_telp' => $validatedData['no_telp'] ?? $user->no_telp,
        ]);

        // Jika password diisi, perbarui password
        if (!empty($validatedData['password'])) {
            $user->update(['password' => Hash::make($validatedData['password'])]);
        }

        // Update gambar jika disediakan
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $user->update(['image' => $imagePath]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Profil pengguna berhasil diperbarui.',
            'redirect_url' => route('settings.index')
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

public function  updatePassword(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = auth()->user();

        try {
            // Validasi input
            $validatedData = $request->validate([
                'current_password' => ['required'], // Kata sandi saat ini harus diisi
                'password' => ['required', 'min:8', 'confirmed'], // Kata sandi baru harus diisi dan dikonfirmasi
            ]);

            // Cek apakah kata sandi saat ini cocok
            if (!Hash::check($validatedData['current_password'], $user->password)) {
                // Jika tidak cocok, lemparkan error
                throw ValidationException::withMessages([
                    'current_password' => 'Kata sandi saat ini tidak sesuai.',
                ]);
            }

            // Jika kata sandi cocok, perbarui kata sandi baru
            $user->update([
                'password' => Hash::make($validatedData['password']),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Kata sandi berhasil diperbarui.',
                'redirect_url' => route('settings.index'),
            ]);
        } catch (ValidationException $e) {
            // Mengembalikan error validasi
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Menangani error yang terjadi saat update
            Log::error("Gagal memperbarui kata sandi", ['error' => $e->getMessage()]);

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memperbarui kata sandi.',
                'error_detail' => $e->getMessage()
            ], 500);
        }
    }

    public function updateSocialMedia(Request $request)
{
    // Validasi input dari form
    $validatedData = $request->validate([
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'website' => 'nullable|url',
        'github' => 'nullable|url',
    ]);

    // Ambil user yang sedang login
    $user = auth()->user();

    // Update field sosial_media dengan data baru dalam format JSON
    $user->update([
        'sosial_media' => json_encode([
            'facebook' => $validatedData['facebook'],
            'twitter' => $validatedData['twitter'],
            'linkedin' => $validatedData['linkedin'],
            'website' => $validatedData['website'],
            'github' => $validatedData['github'],
        ]),
    ]);

    // Mengembalikan response sukses
    return redirect()->back()->with('success', 'Social media updated successfully.');
}




}
