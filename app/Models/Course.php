<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'user_id', 'name','slug','categories_id','deskripsi','intruktur_id','harga','harga_diskon','tanggal_mulai','tags','informasi_lain','thumbnail','video','course_type','status','rating','rating_count'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'instruktur_id');
    }

    public function category_courses()
    {
        return $this->belongsTo(CategoryCourse::class);
    }

}
