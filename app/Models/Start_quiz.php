<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Start_quiz extends Model
{
    protected $table = 'start_quiz';

    protected $fillable = [
        'quiz_id',
        'waktu_akhir',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function answerQuiz()
    {
        return $this->hasMany(Answer_quiz::class);
    }
}
