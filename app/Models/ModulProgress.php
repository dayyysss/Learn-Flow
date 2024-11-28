<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_registrations_id',
        'modul_id',
        'status',
    ];

    public function courseRegistration()
    {
        return $this->belongsTo(CourseRegistration::class, 'course_registrations_id');
    }

    public function modul()
    {
        return $this->belongsTo(Modul::class, 'modul_id');
    }
}
