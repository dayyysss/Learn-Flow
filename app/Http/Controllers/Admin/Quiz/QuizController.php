<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Bab;
use App\Models\Quiz;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('questions', 'quizResults')->get();
        return view('quizzes.index', compact('quizzes'));
    }

    public function show($id)
    {
        $quiz = Quiz::with(['questions.options', 'quizResults'])->findOrFail($id);
        return view('quizzes.show', compact('quiz'));
    }

    public function create(): View
    {
        $babs = Bab::all(); // Mengambil semua bab yang ada
        return view('quizzes.create', compact('babs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:quizzes,slug',
            'bab_id' => 'required|exists:babs,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $quiz = Quiz::create($request->only(['name', 'slug', 'bab_id', 'start_time', 'end_time']));

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function edit(int $id): View
    {
        $quiz = Quiz::findOrFail($id);
        $babs = Bab::all();
        return view('quizzes.edit', compact('quiz', 'babs'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $quiz = Quiz::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:quizzes,slug,' . $quiz->id,
            'bab_id' => 'required|exists:babs,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $quiz->update($request->only(['name', 'slug', 'bab_id', 'start_time', 'end_time']));

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    // Hanya superadmin dan instructor yang bisa menghapus quiz
    public function destroy($id)
    {
        if (!auth()->user()->hasRole(['superadmin', 'instructor'])) {
            abort(403, 'Unauthorized action.');
        }

        // Temukan Quiz berdasarkan ID
        $quiz = Quiz::findOrFail($id);

        // Hapus Quiz (cascading deletion akan bekerja di sini)
        $quiz->delete();

        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully');
    }
}
