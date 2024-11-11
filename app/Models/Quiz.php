<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'bab_id',
        'start_time',
        'end_time',
    ];

    public function bab()
    {
        return $this->belongsTo(Bab::class);
    }

    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }
}
