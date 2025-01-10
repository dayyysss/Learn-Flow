<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssignmentController extends Controller
{

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'content' => 'nullable',
            'files' => 'nullable|array',
            'files.*' => 'file|mimes:pdf,doc,docx,png,jpg,jpeg',
            'modul_id' => 'required|exists:moduls,id',
        ]);

        // Cek apakah user sudah mengirim assignment untuk modul ini
        $existingAssignment = Assignment::where('user_id', auth()->id())
            ->where('modul_id', $validated['modul_id'])
            ->first();

        if ($existingAssignment) {
            return response()->json(['message' => 'Anda sudah mengirimkan tugas untuk modul ini.'], 403);
        }

        try {
            $assignment = new Assignment();
            $assignment->user_id = auth()->id();
            $assignment->modul_id = $validated['modul_id'];
            $assignment->content = $validated['content'];

            // Simpan file jika ada
            $tasks = [];
            if ($request->has('files')) {
                foreach ($request->file('files') as $file) {
                    $filePath = $file->store('assignments', 'public');
                    $tasks[] = ['file' => $filePath];
                }
            }

            $assignment->task = json_encode(['tasks' => $tasks]);
            $assignment->save();

            return response()->json(['message' => 'Tugas berhasil dikirim!'], 200);
        } catch (\Exception $e) {
            Log::error('Error saving assignment', ['exception' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi kesalahan saat mengirim tugas.'], 500);
        }
    }

    public function cancel(Request $request, $id)
{
    $validated = $request->validate([
        'modul_id' => 'required|exists:moduls,id',
    ]);

    // Validasi assignment berdasarkan user_id, modul_id, dan id assignment
    $assignment = Assignment::where('id', $id)
        ->where('user_id', auth()->id())
        ->where('modul_id', $validated['modul_id'])
        ->first();

    if (!$assignment) {
        return response()->json(['message' => 'Tugas tidak ditemukan atau Anda tidak memiliki izin.'], 404);
    }

    try {
        // Hapus file terkait jika diperlukan
        $tasks = json_decode($assignment->task, true);
        if ($tasks && isset($tasks['tasks'])) {
            foreach ($tasks['tasks'] as $task) {
                if (file_exists(storage_path('app/public/' . $task['file']))) {
                    unlink(storage_path('app/public/' . $task['file']));
                }
            }
        }

        // Hapus assignment
        $assignment->delete();
        return response()->json(['message' => 'Pengiriman tugas berhasil dibatalkan.'], 200);
    } catch (\Exception $e) {
        Log::error('Error canceling assignment', ['exception' => $e->getMessage()]);
        return response()->json(['message' => 'Terjadi kesalahan saat membatalkan pengiriman tugas.'], 500);
    }
}

public function show($id)
{
    $assignment = Assignment::find($id);

    if (!$assignment) {
        return response()->json(['message' => 'Assignment not found'], 404);
    }

    // Cek apakah file JSON tersedia
    $fileData = json_decode($assignment->file_url, true);
    
    // Jika file_url berupa JSON, ambil file-nya
    $fileUrl = isset($fileData['tasks'][0]['file']) ? asset($fileData['tasks'][0]['file']) : '#';

    return response()->json([
        'user_name' => $assignment->user->name ?? 'Tidak Diketahui',
        'user_profesi' => $assignment->user->profesi ?? 'Tidak Diketahui',
        'user_image' => $assignment->user->image ?? '/assets/images/blog/default-image.png',
        'materi' => $assignment->materi,
        'created_at' => $assignment->created_at->format('d M Y, H:i'),
        'nilai' => $assignment->nilai ?? '(belum dinilai)',
        'file_url' => $fileUrl
    ]);
}

public function grade(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'grade' => 'required|integer|min:0|max:100',
    ]);

    // Temukan assignment berdasarkan ID
    $assignment = Assignment::findOrFail($id);

    // Update nilai assignment
    $assignment->update([
        'nilai' => $request->grade,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Grade updated successfully!');
}


}
