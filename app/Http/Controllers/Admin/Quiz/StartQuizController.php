<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Answer_quiz;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Start_quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StartQuizController extends Controller
{
    public function index($id)
    {
        $data['quizzes'] = Quiz::with('questions.options')->find($id);

        $startQuiz = Start_quiz::where('quiz_id', $id)->first();

        if (!$startQuiz) {
            Start_quiz::create([
                'quiz_id' => $id,
                'waktu_akhir' => now()->addMinute($data['quizzes']->waktu),
            ]);
        }

        $data['start_quiz'] = $startQuiz;

        // echo '<pre>';
        // echo print_r($quizzes->questions->options);
        // echo '</pre>';
        // $question = Question::where('quiz_id', $id)->get();
        return view('dashboard.pages.lesson.quiz', $data);
    }

    public function submitQuiz(Request $request)
    {
        $request->validate([
            'start_quiz_id' => 'required|exists:start_quiz,id',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.option_id' => 'required|exists:options,id',
        ]);

        $userId = Auth::id();
        $quizId = $request->start_quiz_id;
        dd($quizId);

        foreach ($request->answers as $answer) {
            $option = Option::where('id', $answer['option_id'])->first();
            $isCorrect = $option ? $option->is_correct : false; // Ambil status jawaban dari database

            Answer_quiz::create([
                'user_id' => $userId,
                'start_quiz_id' => $quizId,
                'question_id' => $answer['question_id'],
                'option_id' => $answer['option_id'],
                'is_correct' => $isCorrect,
            ]);
        }

        return response()->json(['message' => 'Quiz answers saved successfully'], 200);
    }
}
