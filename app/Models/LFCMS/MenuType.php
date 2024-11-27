<?php

namespace App\Models\LFCMS;

use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function menuLists()
    {
        return $this->hasMany(MenuList::class);
    }
}
