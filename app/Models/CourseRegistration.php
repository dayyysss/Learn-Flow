<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'registration_date',
        'order_date',
        'method_pembayaran',
        'harga',
        'registration_status',
        'order_id',
        'snap_token',
        'progress',
        // 'certificate_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function modulProgress()
    {
        return $this->hasMany(ModulProgress::class, 'course_registrations_id');
    }

    public function updateProgress()
    {
        $totalModuls = $this->course->moduls()->count(); // Total modul dalam kursus
        $completedModuls = $this->modulProgress()->where('status', 'selesai')->count(); // Modul selesai

        $progress = $totalModuls > 0 ? round(($completedModuls / $totalModuls) * 100) : 0;

        // Simpan progres ke database
        $this->update(['progress' => $progress]);
    }

    protected static function booted()
    {
        static::creating(function ($courseRegistration) {
            // Ambil kode_seri dari relasi course
            $kodeSeri = $courseRegistration->course->kode_seri;

            // Buat kode acak (6 karakter alfanumerik)
            $randomCode = strtoupper(substr(md5(uniqid()), 0, 6));

            // Gabungkan kode_seri dan kode acak untuk certificate_id
            $courseRegistration->certificate_id = "{$kodeSeri}{$randomCode}";
        });
    }

}
