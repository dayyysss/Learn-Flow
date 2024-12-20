<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah user sedang login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Ambil nama role user yang sedang login
        $userRoleName = auth()->user()->getRoleNames(); // Mengembalikan koleksi role

        // Periksa apakah role user ada dalam array $roles
        if (!$userRoleName->intersect($roles)->count()) {
            return response()->view('errors.403'); // Menggunakan response()->view untuk menghindari masalah
        }

        return $next($request);
    }
}
