<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer_quiz extends Model
{
    protected $table = 'answer_quiz';

    protected $fillable = [
        'start_quiz_id',
        'question_id',
        'option_id',
        'is_correct',
    ];

    public function startQuiz()
    {
        return $this->hasMany(Start_quiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
