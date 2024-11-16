<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    public function store(Request $request)
    {
        // Validasi email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Kirimkan link reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Cek jika pengiriman link berhasil
        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', 'We have emailed your password reset link!');
        }

        return back()->withErrors(['email' => 'We could not find a user with that email address.']);
    }
}
