<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{

    public function index(){
        return view('dashboard.pages.lesson');
    }
    public function store(Request $request)
{
    $request->validate([
        'content' => 'required',
        'files' => 'nullable|array', // Validasi untuk beberapa file
        'files.*' => 'file|mimes:pdf,doc,docx', // Validasi tiap file
        'links' => 'nullable|array', // Validasi untuk beberapa link
        'links.*' => 'url', // Validasi tiap link
    ]);

    $assignment = new Assignment();
    $assignment->user_id = auth()->id(); // Ambil ID pengguna yang login
    $assignment->modul_id = $request->modul_id;
    $assignment->content = $request->content;

    // Menyimpan file dan link dalam array
    $tasks = [];

    // Menyimpan file jika ada
    if ($request->has('files')) {
        foreach ($request->file('files') as $file) {
            $filePath = $file->store('assignments', 'public');
            $tasks[] = ['file' => $filePath];
        }
    }

    // Menyimpan link jika ada
    if ($request->has('links')) {
        foreach ($request->links as $link) {
            $tasks[] = ['link' => $link];
        }
    }

    // Menyimpan data task dalam bentuk array
    $assignment->task = json_encode(['tasks' => $tasks]);

    $assignment->save();

    return redirect()->route('assignments.index')->with('success', 'Assignments submitted!');
}

}
