<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'user_id', 'modul_id','content', 'task', 'nilai'

    ];

    public function users(){
        $this->belongsTo(User::class, 'user_id');
    }
    public function moduls(){
        $this->belongsTo(Modul::class, 'modul_id');
    }

}
