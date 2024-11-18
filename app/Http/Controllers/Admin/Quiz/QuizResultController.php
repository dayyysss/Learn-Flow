<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    public function index()
    {
        $quizResults = QuizResult::with('user', 'quiz', 'answers')->get();
        return view('quizResults.index', compact('quizResults'));
    }

    public function show($id)
    {
        $quizResult = QuizResult::with(['user', 'quiz.questions', 'answers'])->findOrFail($id);
        return view('quizResults.show', compact('quizResult'));
    }

    // Fungsi untuk memperbarui status kelulusan setelah kuis selesai
    public function updateStatus($id)
    {
        $quizResult = QuizResult::findOrFail($id);

        // Ambil skor minimal untuk lulus, misalnya 75
        $passingScore = 75;

        // Periksa apakah skor pengguna memenuhi syarat kelulusan
        if ($quizResult->score_amount >= $passingScore) {
            $quizResult->status = 'lulus';
        } else {
            $quizResult->status = 'tidak lulus';
        }

        // Simpan status yang diperbarui
        $quizResult->save();

        return redirect()->route('quizResults.show', $id)->with('success', 'Status updated successfully');
    }
}