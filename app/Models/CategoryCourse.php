<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
