<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::withCount('desas')
                        ->orderBy('nama_kecamatan')
                        ->get();

        return view('admin.kecamatan.index', compact('kecamatans'));
    }

    public function create()
    {
        return view('admin.kecamatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
            'email' => 'nullable|email',
        ]);

        Kecamatan::create([
            'nama_kecamatan' => $request->nama_kecamatan,
            'kepala_camat'   => $request->kepala_camat,
            'alamat'         => $request->alamat,
            'email'          => $request->email,
            'website'        => $request->website,
            'telepon'        => $request->telepon,
        ]);

        return redirect()->route('admin.kecamatan.index')
            ->with('success', 'Kecamatan berhasil ditambahkan');
    }

    public function edit(Kecamatan $kecamatan)
    {
        return view('admin.kecamatan.edit', compact('kecamatan'));
    }

    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
            'email' => 'nullable|email',
        ]);

        $kecamatan->update([
            'nama_kecamatan' => $request->nama_kecamatan,
            'kepala_camat'   => $request->kepala_camat,
            'alamat'         => $request->alamat,
            'email'          => $request->email,
            'website'        => $request->website,
            'telepon'        => $request->telepon,
        ]);

        return redirect()->route('admin.kecamatan.index')
            ->with('success', 'Kecamatan berhasil diperbarui.');
    }

    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();

        return redirect()->route('admin.kecamatan.index')
            ->with('success', 'Kecamatan berhasil dihapus.');
    }
}