<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModulProgress extends Model
{
    protected $fillable = [
        'course_registrations_id', 'modul_id', 'status'
    ];

    public function course_registration()
    {
        return $this->belongsTo(CourseRegistration::class, 'course_registrations_id');
    }
    public function moduls()
    {
        return $this->belongsTo(Modul::class, 'modul_id');
    }


}
