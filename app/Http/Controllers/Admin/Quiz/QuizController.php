<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Bab;
use App\Models\Quiz;
use DateTime;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('questions', 'quizResults')->get();
        return view('dashboard.pages.quizzes.index', compact('quizzes'));
    }

    public function show($id)
    {
        $quiz = Quiz::with(['questions.options', 'quizResults'])->findOrFail($id);
        return view('dashboard.pages.quizzes.show', compact('quiz'));
    }

    public function create(): View
    {
        $babs = Bab::all(); // Mengambil semua bab yang ada
        return view('dashboard.pages.quizzes.create', compact('babs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bab_id' => 'required|exists:babs,id',
            'start_time' => 'required', // Updated for AM/PM format
            'end_time' => 'required|after:start_time', // Updated for AM/PM format
        ]);

        // Generate slug
        $slug = Str::slug($request->name);
        $count = Quiz::where('slug', 'like', $slug . '%')->count();
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;

        try {
            Quiz::create([
                'name' => $request->name,
                'slug' => $slug,
                'bab_id' => $request->bab_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Could not insert data: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('quiz.index')->with('success', 'Quiz created successfully.');
    }

    public function edit(int $id): View
    {
        $quiz = Quiz::findOrFail($id);
        $babs = Bab::all();
        return view('dashboard.pages.quizzes.edit', compact('quiz', 'babs'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $quiz = Quiz::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'bab_id' => 'required|exists:babs,id',
            'start_time' => 'nullable', // Adjusted for time format
            'end_time' => 'nullable|after:start_time', // Adjusted for time format
        ]);

        // Generate slug
        $slug = Str::slug($request->name);
        $count = Quiz::where('slug', 'like', $slug . '%')->where('id', '!=', $id)->count(); // Avoid conflict with current quiz
        $slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;

        try {
            // Update the quiz
            $quiz->update([
                'name' => $request->name,
                'slug' => $slug, // Use the generated slug here
                'bab_id' => $request->bab_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Could not update data: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully.');
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

        return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully');
    }
}
