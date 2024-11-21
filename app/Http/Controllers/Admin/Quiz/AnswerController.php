<?php

namespace App\Http\Controllers\Admin\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    // Menampilkan semua jawaban berdasarkan user
    public function index($userId)
    {
        // Mengambil semua jawaban yang diberikan oleh user
        $answers = Answer::where('user_id', $userId)->get();

        return view('answers.index', compact('answers'));
    }
}