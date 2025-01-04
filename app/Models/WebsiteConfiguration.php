<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteConfiguration extends Model
{
    protected $fillable = [
        'nama_perusahaan',
        'nama_domain',
        'judul_website',
        'meta_deskripsi',
        'meta_kata_kunci',
        'alamat',
        'informasi_kontak',
        'informasi_sosial_media',
    ];
}
