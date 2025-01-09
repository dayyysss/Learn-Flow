<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'course_id',
        'bab_id',
        'start_time',
        'end_time',
        'description',
    ];

    public function bab()
    {
        return $this->belongsTo(Bab::class, 'bab_id');
    }

    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }

    // Ganti menjadi `questions` untuk menunjukkan relasi jamak
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($quiz) {
            // Menghapus semua pertanyaan, opsi, dan jawaban yang terkait
            $quiz->questions()->each(function ($question) {
                $question->options()->delete();
                $question->answers()->delete();
                $question->delete();
            });

            // Menghapus semua hasil kuis terkait
            $quiz->quizResults()->delete();
        });

        static::creating(function ($quiz) {
            $slug = \Str::slug($quiz->name);
            $count = self::where('slug', 'like', $slug . '%')->count();
            $quiz->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        });

        static::updating(function ($quiz) {
            $slug = \Str::slug($quiz->name);
            $count = self::where('slug', 'like', $slug . '%')->where('id', '<>', $quiz->id)->count();
            $quiz->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        });
    }

    protected static function slug()
    {
        parent::slug();

        static::creating(function ($quiz) {
            $quiz->slug = Str::slug($quiz->name);
        });
    }
}
