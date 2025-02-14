<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bab extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
        
    }
    public function quiz()
    {
        return $this->hasMany(Quiz::class);
        
    }

    public function moduls()
    {
        return $this->hasMany(Modul::class);

    }

    public function startQuiz()
    {
        return $this->hasMany(Start_quiz::class);
    }
}
