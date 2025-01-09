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

    public function create(int $quizId): View
    {
        $quiz = Quiz::findOrFail($quizId);
        return view('dashboard.pages.quizzes.question.create', compact('quiz'));
    }

    public function store(Request $request, int $quizId): RedirectResponse
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'score' => 'required|integer',
        ]);

        $quiz = Quiz::findOrFail($quizId);
        $quiz->questions()->create($request->only(['question', 'score']));

        return redirect()->route('quiz.show', $quizId)->with('success', 'Question added successfully.');
    }

    public function edit(int $id): View
    {
        $question = Question::findOrFail($id);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $question = Question::findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:255',
            'score' => 'required|integer',
        ]);

        $question->update($request->only(['question', 'score']));

        return redirect()->route('quiz.show', $question->quiz_id)->with('success', 'Question updated successfully.');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }
}
