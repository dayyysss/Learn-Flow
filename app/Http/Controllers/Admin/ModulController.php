<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Modul;
use App\Models\ModulProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ModulController extends Controller
{

    public function showModulAdmin($courseSlug, $modulSlug)
    {
        // Mengambil data course berdasarkan slug
        $course = Course::where('slug', $courseSlug)->firstOrFail();

        // Mengambil data modul berdasarkan slug
        $modul = Modul::with('bab.course')->where('slug', $modulSlug)->firstOrFail();

        // Mengambil data bab yang terkait dengan modul
        $bab = $course->babs()->with(['moduls', 'quiz'])->get();

        // Mendapatkan data kontak dan logo
        $contactData = $this->getContactsLogo();

        // Mendapatkan user yang sedang login
        $user = auth()->user();

        // Mencari apakah user sudah terdaftar di course ini
        $courseRegistration = CourseRegistration::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        // Jika sudah terdaftar, cari atau buat data progress modul
        if ($courseRegistration) {
            $modulProgress = ModulProgress::firstOrCreate(
                [
                    'course_registrations_id' => $courseRegistration->id,
                    'modul_id' => $modul->id
                ],
                [
                    'status' => 'proses',
                    'progress' => 0 // Nilai default untuk progress, bisa disesuaikan
                ]
            );

            // Update status modul terakhir yang dilihat menjadi 'selesai'
            $lastModulProgress = ModulProgress::where('course_registrations_id', $courseRegistration->id)
                ->where('modul_id', $modul->id)
                ->first();
        }

        // Mengambil assignment berdasarkan modul dan user yang sedang login
        $assignment = Assignment::where('modul_id', $modul->id)
            ->where('user_id', $user->id)
            ->first();


        // Cari modul sebelumnya di bab yang sama
        $previousModul = Modul::where('bab_id', $modul->bab_id)
            ->where('id', '<', $modul->id)
            ->orderBy('id', 'desc')
            ->first();

        // Jika modul sebelumnya tidak ditemukan, cari dari bab sebelumnya
        if (!$previousModul) {
            $previousBab = $course->babs()->where('id', '<', $modul->bab_id)
                ->orderBy('id', 'desc')
                ->first();

            if ($previousBab) {
                $previousModul = $previousBab->moduls()->orderBy('id', 'desc')->first();
            }
        }

        // Cari modul berikutnya di bab yang sama
        $nextModul = Modul::where('bab_id', $modul->bab_id)
            ->where('id', '>', $modul->id)
            ->orderBy('id', 'asc')
            ->first();

        // Jika modul berikutnya tidak ditemukan, cari dari bab berikutnya
        if (!$nextModul) {
            $nextBab = $course->babs()->where('id', '>', $modul->bab_id)
                ->orderBy('id', 'asc')
                ->first();

            if ($nextBab) {
                $nextModul = $nextBab->moduls()->orderBy('id', 'asc')->first();
            }
        }

        $assignments = Assignment::where('modul_id', $modul->id)->get();


        // Mengirim data ke view
        return view('dashboard.pages.lesson-admin._modul_content', compact(
            'course',
            'modul',
            'bab',
            'previousModul',
            'nextModul',
            'assignment', // Menambahkan assignment ke dalam view
            'assignments'
        ));
    }

    public function store(Request $request)
    {

        // Menambahkan log untuk melihat data yang diterima
        Log::info('Data request diterima: ', $request->all());

        // Validasi input
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'materi' => 'nullable|string',
                'video' => 'nullable', // Tidak perlu memvalidasi URL atau file di sini
                'file' => 'nullable|file',
            ]);
            Log::info('Validasi berhasil');
        } catch (\Exception $e) {
            Log::error('Validasi gagal: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat validasi.');
        }

        // Menangani video
        if ($request->has('video')) {
            try {
                $video = $request->input('video');
                // Cek jika video adalah URL (misalnya YouTube)
                if (filter_var($video, FILTER_VALIDATE_URL)) {
                    $videoPath = $video; // Jika URL valid, simpan langsung
                    Log::info('Video URL valid: ' . $videoPath);
                } elseif ($request->hasFile('video')) {
                    // Jika video berupa file yang diunggah
                    $videoPath = $request->file('video')->store('moduls/videos', 'public');
                    Log::info('Video file berhasil disimpan: ' . $videoPath);
                } else {
                    $videoPath = null;
                    Log::info('Tidak ada video yang diunggah atau URL yang valid');
                }
            } catch (\Exception $e) {
                Log::error('Gagal menangani video: ' . $e->getMessage());
                return back()->with('error', 'Gagal menangani video: ' . $e->getMessage());
            }
        } else {
            $videoPath = null;
            Log::info('Tidak ada video yang diterima');
        }

        // Menyimpan file jika ada
        if ($request->hasFile('file')) {
            try {
                $filePath = $request->file('file')->store('modul_files', 'public');
                Log::info('File berhasil disimpan: ' . $filePath);
            } catch (\Exception $e) {
                Log::error('Gagal menyimpan file: ' . $e->getMessage());
                return back()->with('error', 'Gagal menyimpan file: ' . $e->getMessage());
            }
        } else {
            $filePath = null;
            Log::info('Tidak ada file yang diunggah');
        }

        // Membuat instance Modul dan menyimpannya
        try {
            $modul = new Modul();
            $modul->name = $request->name;
            $modul->materi = $request->materi;
            $modul->video = $videoPath; // Menyimpan path video
            $modul->file = $filePath;
            $modul->bab_id = $request->bab_id;
            $modul->task = $request->has('task') ? 1 : 0; // Menyimpan nilai task
            $modul->save();
            Log::info('Modul berhasil disimpan: ', $modul->toArray());
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan modul: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan modul: ' . $e->getMessage());
        }

        // Mengembalikan respon atau redirect
        Log::info('Modul berhasil ditambahkan');
        return redirect()->back()->with('success', 'Modul berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // Menambahkan log untuk melihat data yang diterima
        Log::info('Data request diterima untuk update: ', $request->all());

        // Validasi input
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'materi' => 'nullable|string',
                'video' => 'nullable',
                'file' => 'nullable|file',
            ]);
            Log::info('Validasi berhasil');
        } catch (\Exception $e) {
            Log::error('Validasi gagal: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat validasi.');
        }

        // Mencari modul yang akan diperbarui
        $modul = Modul::find($id);
        if (!$modul) {
            Log::error('Modul tidak ditemukan dengan ID: ' . $id);
            return back()->with('error', 'Modul tidak ditemukan.');
        }

        // Menangani video
        if ($request->has('video')) {
            try {
                $video = $request->input('video');
                if (filter_var($video, FILTER_VALIDATE_URL)) {
                    $videoPath = $video; // Jika URL valid, simpan langsung
                    Log::info('Video URL valid: ' . $videoPath);
                } elseif ($request->hasFile('video')) {
                    // Hapus video lama jika ada
                    if ($modul->video && Storage::disk('public')->exists($modul->video)) {
                        Storage::disk('public')->delete($modul->video);
                        Log::info('Video lama dihapus: ' . $modul->video);
                    }
                    // Simpan video baru
                    $videoPath = $request->file('video')->store('moduls/videos', 'public');
                    Log::info('Video file berhasil diperbarui: ' . $videoPath);
                } else {
                    $videoPath = $modul->video; // Pertahankan video lama jika tidak ada perubahan
                    Log::info('Tidak ada perubahan pada video');
                }
            } catch (\Exception $e) {
                Log::error('Gagal menangani video: ' . $e->getMessage());
                return back()->with('error', 'Gagal menangani video: ' . $e->getMessage());
            }
        } else {
            $videoPath = $modul->video;
        }

        // Menyimpan file jika ada perubahan
        if ($request->hasFile('file')) {
            try {
                // Hapus file lama jika ada
                if ($modul->file && Storage::disk('public')->exists($modul->file)) {
                    Storage::disk('public')->delete($modul->file);
                    Log::info('File lama dihapus: ' . $modul->file);
                }
                // Simpan file baru
                $filePath = $request->file('file')->store('modul_files', 'public');
                Log::info('File berhasil diperbarui: ' . $filePath);
            } catch (\Exception $e) {
                Log::error('Gagal menyimpan file: ' . $e->getMessage());
                return back()->with('error', 'Gagal menyimpan file: ' . $e->getMessage());
            }
        } else {
            $filePath = $modul->file;
        }

        // Update data modul
        try {
            $modul->name = $request->name;
            $modul->materi = $request->materi;
            $modul->video = $videoPath;
            $modul->file = $filePath;
            $modul->bab_id = $request->bab_id;
            $modul->task = $request->has('task') ? 1 : 0;
            $modul->save();
            Log::info('Modul berhasil diperbarui: ', $modul->toArray());
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui modul: ' . $e->getMessage());
            return back()->with('error', 'Gagal memperbarui modul: ' . $e->getMessage());
        }

        // Mengembalikan respon atau redirect
        Log::info('Modul berhasil diperbarui');
        return redirect()->back()->with('success', 'Modul berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            // Cari modul berdasarkan ID
            $modul = Modul::find($id);

            if (!$modul) {
                return response()->json(['error' => 'Modul tidak ditemukan'], 404);
            }

            // Hapus file jika ada
            if ($modul->file) {
                Storage::disk('public')->delete($modul->file);
            }

            // Hapus video jika berupa file (bukan URL)
            if ($modul->video && Storage::disk('public')->exists($modul->video)) {
                Storage::disk('public')->delete($modul->video);
            }

            // Hapus modul dari database
            $modul->delete();

            return response()->json(['success' => 'Modul berhasil dihapus']);
        } catch (\Exception $e) {
            Log::error('Gagal menghapus modul: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal menghapus modul'], 500);
        }
    }
}
