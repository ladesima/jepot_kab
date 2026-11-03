<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppid;
use Illuminate\Http\Request;

class PpidAdminController extends Controller
{
    public function index()
    {
        $ppids = Ppid::orderBy('id', 'asc')->get();
        return view('admin.ppid.index', compact('ppids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'badan_publik'  => 'required|string|max:255',
            'alamat'        => 'required|string',
            'ruang_lingkup' => 'required|string',
        ]);

        Ppid::create($request->only('badan_publik', 'alamat', 'ruang_lingkup'));

        return redirect()->route('admin.ppid.index')
            ->with('success', 'Data PPID berhasil ditambahkan.');
    }

    public function update(Request $request, Ppid $ppid)
    {
        $request->validate([
            'badan_publik'  => 'required|string|max:255',
            'alamat'        => 'required|string',
            'ruang_lingkup' => 'required|string',
        ]);

        $ppid->update($request->only('badan_publik', 'alamat', 'ruang_lingkup'));

        return redirect()->route('admin.ppid.index')
            ->with('success', 'Data PPID berhasil diperbarui.');
    }

    public function destroy(Ppid $ppid)
    {
        $ppid->delete();

        return redirect()->route('admin.ppid.index')
            ->with('success', 'Data PPID berhasil dihapus.');
    }
}
