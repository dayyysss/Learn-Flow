<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    public function index()
    {
        $quizResults = QuizResult::with('user', 'quiz', 'answers')->get();
        return view('dashboard.pages.quizresult.index', compact('quizResults'));
    }

    public function show($id)
    {
        $quizResult = QuizResult::with(['user', 'quiz.questions', 'answers'])->findOrFail($id);
        return view('dashboard.pages.quizresult.show', compact('quizResult'));
    }

    public function submitQuiz(Request $request, $quizId)
    {
        $userId = auth()->id();

        // Ambil quiz terkait
        $quiz = Quiz::findOrFail($quizId);

        // Ambil semua jawaban user untuk quiz tertentu
        $answers = Answer::where('quiz_id', $quizId)->where('user_id', $userId)->get();

        // Hitung total skor berdasarkan jawaban benar
        $totalScore = $answers->sum(function ($answer) {
            return $answer->is_correct ? $answer->question->score : 0;
        });

        // Ambil waktu saat ini sebagai waktu selesai kuis
        $endTime = now();

        // Ambil waktu mulai kuis (dari tabel `quizzes`)
        $startTime = $quiz->start_time ? now()->setTimeFromTimeString($quiz->start_time) : now();

        // Hitung lama pengerjaan dalam menit
        $durationInMinutes = $startTime->diffInMinutes($endTime);

        // Simpan hasil kuis ke tabel QuizResult
        $quizResult = QuizResult::create([
            'user_id' => $userId,
            'quiz_id' => $quizId,
            'score_amount' => $totalScore,
            'date_quiz' => now()->format('d-m-Y'), // Tanggal dan waktu saat kuis dilakukan
            'completed_at' => $durationInMinutes, // Lama pengerjaan dalam menit
            'status' => $totalScore >= 75 ? 'lulus' : 'tidak lulus', // Lulus jika >= 75
        ]);

        return redirect()->route('quizResults.index', $quizResult->id)->with('success', 'Quiz submitted successfully!');
    }
}
