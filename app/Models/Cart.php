<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'cart_items',
    ];

    protected $casts = [
        'cart_items' => 'array',  // Mengubah kolom cart_data menjadi array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
