<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  $levels
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        $user = $request->user();

        // Jika pengguna adalah superadmin, beri akses penuh
        if ($user->level === 'superadmin') {
            return $next($request);
        }

        if (in_array($user->level, $levels)) {
            return $next($request);
        }

        // Jika tidak sesuai, arahkan kembali
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
