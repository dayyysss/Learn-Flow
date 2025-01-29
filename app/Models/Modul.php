<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'materi',
        'video',
        'file',
        'bab_id', // Jika ada field lain yang perlu diisi massal, tambahkan di sini
        'task'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $slug = \Str::slug($course->name);
            $count = self::where('slug', 'like', $slug . '%')->count();
            $course->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        });

        static::updating(function ($course) {
            $slug = \Str::slug($course->name);
            $count = self::where('slug', 'like', $slug . '%')->where('id', '<>', $course->id)->count();
            $course->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        });
    }

    public function bab()
    {
        return $this->belongsTo(Bab::class, 'bab_id');
    }
    public function modul_progress()
    {
        return $this->hasOne(ModulProgress::class, 'modul_id');
    }


}
