<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitor_count extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'total_visitors',
    ];
}
