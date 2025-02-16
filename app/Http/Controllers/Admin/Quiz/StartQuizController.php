<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Answer_quiz;
use App\Models\Option;
use App\Models\Quiz;
use App\Models\Start_quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StartQuizController extends Controller
{
    public function index($slug)
    {
        // Ambil quiz berdasarkan slug
        $quiz = Quiz::with(['questions.options', 'course', 'babs.quiz'])->where('slug', $slug)->firstOrFail();

        // Pastikan quiz ditemukan
        if (!$quiz) {
            return redirect()->back()->with('error', 'Quiz tidak ditemukan');
        }

        // Ambil atau buat startQuiz berdasarkan quiz_id
        $startQuiz = Start_quiz::where('quiz_id', $quiz->id)->first();

        if (!$startQuiz) {
            $startQuiz = Start_quiz::create([
                'quiz_id' => $quiz->id,
                'waktu_akhir' => now()->addMinutes($quiz->waktu),
            ]);
        }

        return view('dashboard.pages.lesson.quiz', [
            'quizzes' => $quiz,
            'start_quiz' => $startQuiz,
            'course' => $quiz->course, // Pastikan relasi 'course' sudah dimuat
            'firstModul' => $quiz->babs->quiz->first() ?? null, // Ambil modul pertama jika ada
        ]);
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
        $startQuizId = $request->start_quiz_id;

        foreach ($request->answers as $answer) {
            $correctAnswer = Option::where('id', $answer['option_id'])->value('correct_answer');
            $isCorrect = $correctAnswer === $answer['selected'] ? 1 : 0; // Ambil status jawaban dari database

            Answer_quiz::create([
                'user_id' => $userId,
                'start_quiz_id' => $startQuizId,
                'question_id' => $answer['question_id'],
                'option_id' => $answer['option_id'],
                'is_correct' => $isCorrect,
            ]);
        }

        return response()->json(['message' => 'Quiz answers saved successfully'], 200);
    }
}
