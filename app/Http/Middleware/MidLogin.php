<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MidLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda Belum Login');
        }

        // Jika tidak ada role yang ditentukan, lanjutkan (akses untuk semua role yang login)
        if (empty($roles)) {
            return $next($request);
        }

        // Cek apakah role user sesuai dengan yang diizinkan
        $userRole = Auth::user()->role;
        
        if (!in_array($userRole, $roles)) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }

        return $next($request);
    }
}