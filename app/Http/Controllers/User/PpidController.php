<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ppid;

class PpidController extends Controller
{
    public function index()
    {
        $ppids = Ppid::orderBy('id', 'asc')->get();
        return view('user.ppid', compact('ppids'));
    }
}
