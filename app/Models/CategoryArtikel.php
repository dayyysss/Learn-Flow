<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryArtikel extends Model
{

    protected $table = 'category_artikel';

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'category_id');
    }

}
