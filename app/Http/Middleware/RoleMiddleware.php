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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah sudah login
        if (!auth()->check()) {
            abort(403, 'Akses ditolak. Anda belum login.');
        }

        // Cek apakah role cocok
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'Akses ditolak. Anda tidak memiliki hak akses.');
        }

        return $next($request);
    }
}
