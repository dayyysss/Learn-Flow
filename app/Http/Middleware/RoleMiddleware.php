<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $roles)
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            return $this->redirectToLogin($request);
        }

        // Ambil role user yang sedang login
        $userRoleName = auth()->user()->getRoleNames(); // Sesuaikan jika pakai spatie/role

        Log::info('RoleMiddleware Debug', [
            'user_id' => auth()->id(),
            'user_role_names' => $userRoleName,
            'required_roles' => $roles,
        ]);

        // Pisahkan role berdasarkan '|'
        $rolesArray = explode('|', $roles);

        // Jika user tidak memiliki salah satu role yang diperbolehkan, redirect ke 403
        if (!$userRoleName->intersect($rolesArray)->count()) {
            return redirect('/403');
        }

        return $next($request);
    }

    /**
     * Redirect user ke halaman login yang sesuai berdasarkan role
     */
    private function redirectToLogin(Request $request)
    {
        // Tentukan route login berdasarkan prefix URL atau session
        if ($request->is('lfcms*')) {
            return redirect('/LFCMS/login'); // Login khusus Superadmin
        }

        return redirect('/login'); // Login default untuk user biasa
    }
}

