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
        
    }
}
