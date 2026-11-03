<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\Request;

class OpdController extends Controller
{
    public function index()
    {
        $opds = Opd::orderBy('nama_opd')->get();
        return view('admin.opd.index', compact('opds'));
    }

    public function create()
    {
        return view('admin.opd.create');
    }

    public function store(Request $request)
    {
        Opd::create($request->all());
        return redirect()->route('opd.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Opd $opd)
    {
        return view('admin.opd.edit', compact('opd'));
    }

    public function update(Request $request, Opd $opd)
    {
        $opd->update($request->all());
        return redirect()->route('opd.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Opd $opd)
    {
        $opd->delete();
        return redirect()->route('opd.index')->with('success', 'Data berhasil dihapus');
    }
}
