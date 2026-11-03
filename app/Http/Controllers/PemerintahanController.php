<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\Request;

class PemerintahanController extends Controller
{
    public function index()
    {
        $opds = Opd::orderBy('nama_opd')->get();

        return view('user.pemerintahan', compact('opds'));
    }
}
