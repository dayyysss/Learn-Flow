<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $userRoleName = auth()->user()->getRoleNames();

        Log::info('RoleMiddleware Debug', [
            'user_id' => auth()->id(),
            'user_role_names' => $userRoleName,
            'required_roles' => $roles,
        ]);

        $roles = explode('|', implode('|', $roles));

        // Jika tidak ada peran yang cocok, tampilkan 403
        if (!$userRoleName->intersect($roles)->count()) {
            return response()->view('errors.403');
        }

        return $next($request);
    }
}
