<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $desas = Desa::with('kecamatan')
                    ->orderBy('nama_desa')
                    ->get();

        return view('admin.desa.index', compact('desas'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::orderBy('nama_kecamatan')->get();
        return view('admin.desa.create', compact('kecamatans'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_desa' => 'required|string|max:255',
        'email' => 'nullable|email',
    ]);

    Desa::create([
        'nama_desa' => $request->nama_desa,
        'kepala_desa' => $request->kepala_desa,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'website' => $request->website,
        'telepon' => $request->telepon,
        'kecamatan_id' => $request->kecamatan_id,
    ]);

    return redirect()->route('admin.desa.index')
        ->with('success', 'Desa berhasil ditambahkan.');
}
    public function edit(Desa $desa)
    {
        $kecamatans = Kecamatan::orderBy('nama_kecamatan')->get();
        return view('admin.desa.edit', compact('desa','kecamatans'));
    }

    public function update(Request $request, Desa $desa)
{
    $request->validate([
        'nama_desa' => 'required|string|max:255',
        'email' => 'nullable|email',
    ]);

    $desa->update([
        'nama_desa' => $request->nama_desa,
        'kepala_desa' => $request->kepala_desa,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'website' => $request->website,
        'telepon' => $request->telepon,
        'kecamatan_id' => $request->kecamatan_id,
    ]);

    return redirect()->route('admin.desa.index')
        ->with('success', 'Desa berhasil diperbarui.');
}

    public function destroy(Desa $desa)
    {
        $desa->delete();

        return back()->with('success', 'Desa berhasil dihapus.');
    }
}
