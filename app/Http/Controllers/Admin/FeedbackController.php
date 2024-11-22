<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user', 'course')->get();
        return view('feedbacks.index', compact('feedbacks'));
    }

    // Create: Form untuk tambah feedback
    public function create()
    {
        $courses = Course::all();
        return view('feedbacks.create', compact('courses'));
    }

    // Store: Simpan feedback baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'rating' => 'required|numeric|min:0|max:5',
            'komentar' => 'required|string|max:500',
        ]);

        Feedback::create($request->all());
        return redirect()->route('feedbacks.index')->with('success', 'Feedback berhasil ditambahkan.');
    }

    // Edit: Form untuk edit feedback
    public function edit(Feedback $feedback)
    {
        $courses = Course::all();
        return view('feedbacks.edit', compact('feedback', 'courses'));
    }

    // Update: Simpan perubahan feedback
    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'rating' => 'required|numeric|min:0|max:5',
            'komentar' => 'required|string|max:500',
        ]);

        $feedback->update($request->all());
        return redirect()->route('feedbacks.index')->with('success', 'Feedback berhasil diperbarui.');
    }

    // Destroy: Hapus feedback
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('feedbacks.index')->with('success', 'Feedback berhasil dihapus.');
    }
}
