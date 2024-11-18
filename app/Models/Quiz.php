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

    // Ganti menjadi `questions` untuk menunjukkan relasi jamak
    public function questions()
    {
        return $this->hasMany(Question::class);
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

        // Event triggered when a new quiz is being created
        static::creating(function ($quiz) {
            // Generate initial slug from quiz name
            $baseSlug = \Str::slug($quiz->name);
            // Check for existing slugs with the same base pattern
            $existingSlugCount = self::where('slug', 'like', $baseSlug . '%')->count();
            // If a similar slug exists, append a number to make it unique
            $quiz->slug = $existingSlugCount > 0 ? "{$baseSlug}-" . ($existingSlugCount + 1) : $baseSlug;
        });

        // Event triggered when an existing quiz is being updated
        static::updating(function ($quiz) {
            // Generate initial slug from quiz name
            $baseSlug = \Str::slug($quiz->name);
            // Check for existing slugs with the same base pattern,
            // excluding the current quiz being updated
            $existingSlugCount = self::where('slug', 'like', $baseSlug . '%')->where('id', '<>', $quiz->id)->count();
            // If a similar slug exists, append a number to make it unique
            $quiz->slug = $existingSlugCount > 0 ? "{$baseSlug}-" . ($existingSlugCount + 1) : $baseSlug;
        });

    }
}
