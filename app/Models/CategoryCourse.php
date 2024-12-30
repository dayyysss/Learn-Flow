<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    protected $fillable = [
        'user_id', 'name', 'slug', 'status'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class,  'categories_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function boot()
{
    parent::boot();

    static::creating(function ($categories) {
        $slug = \Str::slug($categories->name);
        $count = self::where('slug', 'like', $slug . '%')->count();
        $categories->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    });

    static::updating(function ($categories) {
        $slug = \Str::slug($categories->name);
        $count = self::where('slug', 'like', $slug . '%')->where('id', '<>', $categories->id)->count();
        $categories->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    });
}
}
