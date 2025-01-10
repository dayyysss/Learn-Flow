<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{

    public function create($slug)
    {
        $quizzes = Quiz::with('questions')->where('slug', $slug)->firstOrFail(); // Pastikan relasi ada dan benar
        return view('dashboard.pages.quizzes.question.create', compact('quizzes'));
    }

    public function store(Request $request, string $slug)
    {
        // Validasi input pertanyaan dan skor
        $request->validate([
            'question' => 'required|string|max:255',
            'score' => 'required|integer',
        ]);

        // Cari quiz berdasarkan slug
        $quiz = Quiz::where('slug', $slug)->firstOrFail();

        // Tambahkan pertanyaan ke quiz
        $quiz->questions()->create($request->only(['question', 'score']));

        return redirect()->route('quiz.show', $quiz->slug)->with('success', 'Question added successfully.');
    }

    public function edit(string $slug, int $id)
    {
        $quiz = Quiz::where('slug', $slug)->firstOrFail();
        $question = $quiz->questions()->findOrFail($id);

        return view('questions.edit', compact('question', 'quiz'));
    }

    public function update(Request $request, string $slug, int $id)
    {
        $quiz = Quiz::where('slug', $slug)->firstOrFail();
        $question = $quiz->questions()->findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:255',
            'score' => 'required|integer',
        ]);

        $question->update($request->only(['question', 'score']));

        return redirect()->route('quiz.show', $quiz->slug)->with('success', 'Question updated successfully.');
    }

    public function destroy(string $slug, int $id)
    {
        $quiz = Quiz::where('slug', $slug)->firstOrFail();
        $question = $quiz->questions()->findOrFail($id);

        $question->delete();

        return redirect()->route('quiz.show', $quiz->slug)->with('success', 'Question deleted successfully.');
    }
}
