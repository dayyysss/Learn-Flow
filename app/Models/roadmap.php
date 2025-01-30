<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roadmap extends Model
{
    protected $fillable = [
        'course_id',
        'categoryCourse_id',
        'order',
        'name',
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function categories()
    {
        return $this->belongsTo(CategoryCourse::class, 'categories_id');
    }
}
