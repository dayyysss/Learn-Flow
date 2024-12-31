<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
  protected $table = 'feedbacks';
  protected $fillable = ['user_id', 'course_id', 'rating', 'komentar', 'instructor_komentar', 'instructor_rating'];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }


  public function course()
  {
    return $this->belongsTo(Course::class);
  }
}
