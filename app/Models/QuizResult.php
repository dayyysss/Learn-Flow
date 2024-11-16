<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score_amount',
        'date_quiz',
        'completed_at',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Tambahkan relasi ke jawaban (answers)
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
