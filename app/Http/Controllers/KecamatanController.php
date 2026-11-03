<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function index()
    {
        // pakai withCount supaya tidak N+1 query
        $kecamatans = Kecamatan::withCount('desas')
                        ->orderBy('nama_kecamatan')
                        ->get();

        return view('user.kecamatan.index', compact('kecamatans'));
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::with('desas')
                        ->findOrFail($id);

        return view('user.kecamatan.desa', compact('kecamatan'));
    }
}
