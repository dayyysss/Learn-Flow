<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OptionController extends Controller
{
    public function create($slug)
    {
        // Cari quiz berdasarkan slug
        $quiz = Quiz::with('questions')->where('slug', $slug)->firstOrFail();

        // Return view dengan quiz terkait
        return view('dashboard.pages.quizzes.option.create', compact('quiz'));
    }

    public function store(Request $request, int $questionId): RedirectResponse
    {
        $request->validate([
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'option_e' => 'required|string|max:255',
            'correct_answer' => 'required|string|in:A,B,C,D,E',
            'score' => 'required|integer',
        ]);

        $question = Question::findOrFail($questionId);
        $question->options()->create($request->only(['option_a', 'option_b', 'option_c', 'option_d', 'option_e', 'correct_answer', 'score']));

        return redirect()->route('questions.show', $questionId)->with('success', 'Options added successfully.');
    }

    public function edit(int $id): View
    {
        $option = Option::findOrFail($id);
        return view('options.edit', compact('option'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $option = Option::findOrFail($id);

        $request->validate([
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'option_e' => 'required|string|max:255',
            'correct_answer' => 'required|string|in:A,B,C,D,E',
            'score' => 'required|integer',
        ]);

        $option->update($request->only(['option_a', 'option_b', 'option_c', 'option_d', 'option_e', 'correct_answer', 'score']));

        return redirect()->route('questions.show', $option->question_id)->with('success', 'Option updated successfully.');
    }

    public function destroy($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();
        return redirect()->route('options.index')->with('success', 'Option deleted successfully.');
    }
}
