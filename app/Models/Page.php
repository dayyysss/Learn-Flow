<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'status',
        'keyword',
        'image',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function boot()
    {
        parent::boot();
    
        static::creating(function ($pages) {
            $slug = \Str::slug($pages->judul);
            $count = self::where('slug', 'like', $slug . '%')->count();
            $pages->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        });
    
        static::updating(function ($pages) {
            $slug = \Str::slug($pages->judul);
            $count = self::where('slug', 'like', $slug . '%')->where('id', '<>', $pages->id)->count();
            $pages->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        });
    }
}
