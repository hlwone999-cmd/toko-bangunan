<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Simple session-based admin authentication.
     * In production, replace with Laravel Breeze/Jetstream/Sanctum.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('admin_authenticated')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
