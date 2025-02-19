<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'first_name',
        'last_name',
        'role_id',
        'publik_name',
        'profesi',
        'bio',
        'no_telp',
        'sosial_media'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function courseRegistrations()
    {
        return $this->hasMany(CourseRegistration::class);
    }

    public function courses_instruktur()
    {
        return $this->hasMany(Course::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }

    public function hasRolesTo($roles)
    {
        // Pastikan $roles adalah array
        $roles = is_array($roles) ? $roles : [$roles];

        // Periksa apakah pengguna memiliki salah satu dari peran tersebut
        return $this->role()->whereIn('name', $roles)->exists();
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'user_id');
    }
   

}
