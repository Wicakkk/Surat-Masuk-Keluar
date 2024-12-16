<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cekBagian
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah bagian_id pengguna berada dalam rentang yang diizinkan (2-10)
        $allowedBagianIds = range(2, 10); // ID bagian dari 2 hingga 10

        if (!in_array($user->bagian_id, $allowedBagianIds)) {
            return redirect()->route('view-login')->with('toast_error', 'Akses Ditolak: Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
