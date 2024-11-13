<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'judul',
        'user_id',
        'slug',
        'deskripsi_singkat',
        'deskripsi',
        'category_id',
        'publis_date',
        'keyword',
        'tag',
        'author',
        'visitor',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(CategoryArtikel::class);
    }
}
