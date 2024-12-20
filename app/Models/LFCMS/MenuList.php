<?php

namespace App\Models\LFCMS;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class MenuList extends Model
{
    protected $fillable = [
        'name', 'slug', 'url', 'ikon', 'menutype_id', 'create', 'index', 'update', 'delete', 'parent_id', 'order'
    ];

    public static function boot()
{
    parent::boot();

    static::creating(function ($menulists) {
        // Buat slug berdasarkan menutype_id 1 dan 2
        if (in_array($menulists->menutype_id, [1, 2])) {
            $slug = \Str::slug($menulists->name);
            $count = self::where('slug', 'like', $slug . '%')->count();
            $menulists->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        } else {
            // Gunakan angka bertambah dan tambahkan huruf acak untuk slug jika bukan menutype 1 atau 2
            $count = self::count();
            $randomLetter = chr(rand(65, 90)); // Huruf acak dari A-Z
            $menulists->slug = ($count + 1) . $randomLetter;
        }
    });
    
    static::updating(function ($menulists) {
        // Update slug saat memperbarui data untuk menutype_id 1 dan 2
        if (in_array($menulists->menutype_id, [1, 2])) {
            $slug = \Str::slug($menulists->name);
            $count = self::where('slug', 'like', $slug . '%')->where('id', '<>', $menulists->id)->count();
            $menulists->slug = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        } else {
            // Gunakan angka bertambah dan huruf acak untuk slug jika bukan menutype 1 atau 2
            $count = self::count();
            $randomLetter = chr(rand(65, 90)); // Huruf acak dari A-Z
            $menulists->slug = ($count + 1) . $randomLetter;
        }
    });
    
}


    public function parent()
    {
        return $this->belongsTo(MenuList::class, 'parent_id');
    }

    // Relasi untuk mendapatkan semua child menu
    public function children()
    {
        return $this->hasMany(MenuList::class, 'parent_id');
    }
    
    public function createPermission()
    {
        return $this->belongsTo(Permission::class, 'create');
    }

    public function indexPermission()
    {
        return $this->belongsTo(Permission::class, 'index');
    }

    public function updatePermission()
    {
        return $this->belongsTo(Permission::class, 'update');
    }

    public function deletePermission()
    {
        return $this->belongsTo(Permission::class, 'delete');
    }

    public function menuTypes()
    {
        return $this->belongsTo(MenuType::class, 'menutype_id');
    }
}
