<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseRegistration;
use App\Models\Modul;
use App\Models\ModulProgress;
use Illuminate\Http\Request;

class ModulProgressController extends Controller
{
    /**
     * Perbarui status progres modul berdasarkan modul_id.
     */
    public function updateModulProgress(Request $request, $modul_id)
    {
        $user = auth()->user();

        // Temukan progres berdasarkan modul dan user
        $progress = ModulProgress::where('modul_id', $modul_id)
            ->whereHas('courseRegistration', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->first();

        if (!$progress) {
            // Jika progres tidak ditemukan, buat baru
            $progress = ModulProgress::create([
                'modul_id' => $modul_id,
                'course_registrations_id' => CourseRegistration::where('user_id', $user->id)->first()->id,
                'status' => 'proses',
                'progress' => 0,
            ]);
        }

        return response()->json(['message' => 'Modul progress initialized.']);
    }

    /**
     * Perbarui progres modul berdasarkan scroll progress.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'modul_id' => 'required|exists:moduls,id',
            'progress' => 'required|integer|min:0|max:100',
        ]);

        $user = auth()->user();

        // Perbarui atau buat progress modul
        $progress = ModulProgress::updateOrCreate(
            [
                'modul_id' => $validated['modul_id'],
                'course_registrations_id' => CourseRegistration::where('user_id', $user->id)->first()->id,
            ],
            [
                'progress' => $validated['progress'],
                'status' => $validated['progress'] == 100 ? 'selesai' : 'proses',
            ]
        );

        return response()->json([
            'message' => 'Progress updated successfully.',
            'progress' => $progress->progress,
            'status' => $progress->status,
        ]);
    }
}
