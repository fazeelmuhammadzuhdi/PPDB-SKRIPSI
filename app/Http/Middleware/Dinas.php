<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Dinas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->akses == 'Admin Dinas' || $request->user()->akses == 'Admin Sekolah' || $request->user()->akses == 'Kepala Dinas') {
            return $next($request);
        }
        abort(403, 'Akses Khusus Admin Dinas Pendidikan');

        return $next($request);
    }
}
