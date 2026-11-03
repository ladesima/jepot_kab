<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SekretarisDaerah;

class SekretarisDaerahController extends Controller
{
    public function index()
    {
        $sekda = SekretarisDaerah::first(); // ambil 1 data

        return view('user.sekretaris-daerah', compact('sekda'));
    }
}
