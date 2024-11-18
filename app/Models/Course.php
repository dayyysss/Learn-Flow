<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'user_id', 'name','slug','categories_id','deskripsi','intruktur_id','harga','harga_diskon','tanggal_mulai','tags','thumbnail','video','berbayar','rating','rating_count','kode_seri'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function instrukturs()
    {
        return $this->belongsTo(User::class, 'intruktur_id');
    }

    public function babs()
    {
        return $this->hasMany(Bab::class);
    }

    public function categories()
    {
        return $this->belongsTo(CategoryCourse::class, 'categories_id');
    }

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
    public function courseRegistrations()
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function certificate()
    {
        return $this->hasMany(Certificate::class);

    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

}
