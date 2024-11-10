<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
{
    Validator::make($input, [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique(User::class),
        ],
        'password' => $this->passwordRules(),
        'password_confirmation' => ['required', 'same:password'], // Menambahkan konfirmasi password
        'roles' => ['required', 'array'], // Validasi roles
        'roles.*' => ['exists:roles,name'], // Pastikan roles yang dipilih valid
    ])->validate();

    $defaultImagePath = 'profile_images/default.png';

    // Membuat user baru
    $user = User::create([
        'first_name' => $input['first_name'],
        'last_name' => $input['last_name'],
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'image' => $defaultImagePath, // Set gambar default
    ]);

    // Assign role setelah user berhasil dibuat
    $user->assignRole($input['roles']); // Mengassign role yang dipilih

    return $user; // Mengembalikan user yang sudah dibuat
}

}