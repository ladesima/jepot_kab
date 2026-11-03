<?php

namespace App\Http\Controllers;

use App\Models\VisitorStat;
use Carbon\Carbon;

class VisitorController extends Controller
{
    public function stats()
    {
        return response()->json([
            'total' => VisitorStat::count(),
            'today' => VisitorStat::whereDate('created_at', Carbon::today())->count(),
            'week'  => VisitorStat::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count(),
            'month' => VisitorStat::whereMonth('created_at', Carbon::now()->month)->count(),
            'year'  => VisitorStat::whereYear('created_at', Carbon::now()->year)->count(),
        ]);
    }
}
