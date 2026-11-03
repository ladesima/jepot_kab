<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\VisitorStat;

class VisitorCounter
{
    public function handle(Request $request, Closure $next)
    {
        // ❌ Jangan hitung route statistik
        if ($request->is('visitor-stats')) {
            return $next($request);
        }

        // 🔐 Kalau sudah dihitung dalam sesi ini → STOP
        if (session()->has('visitor_counted')) {
            return $next($request);
        }

        // ✅ Simpan ke database
        VisitorStat::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // 🔒 Tandai sudah dihitung
        session(['visitor_counted' => true]);

        return $next($request);
    }
}
