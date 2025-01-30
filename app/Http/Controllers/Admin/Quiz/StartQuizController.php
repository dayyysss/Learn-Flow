<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Start_quiz;
use Illuminate\Http\Request;

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
}
