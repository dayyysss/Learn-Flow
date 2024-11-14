<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'course_id', 'file', 'ttd'
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');

    }
}
