<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'option_id',
        'quiz_result_id', // Tambahkan `quiz_result_id` untuk referensi ke QuizResult
        'correct_answer',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    // Relasi ke QuizResult untuk sesi hasil kuis
    public function quizResult()
    {
        return $this->belongsTo(QuizResult::class);
    }

}
