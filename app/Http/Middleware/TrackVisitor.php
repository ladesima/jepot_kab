<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\VisitorStat;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Jangan hit endpoint statistik sendiri
        if (!$request->is('visitor-stats')) {

            VisitorStat::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        return $next($request);
    }
}
