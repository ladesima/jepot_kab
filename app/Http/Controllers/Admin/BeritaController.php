<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::with('kategori')->get();
        return view('admin.berita', compact('data'));
    }

    public function create()
    {
        $kategori = KategoriBerita::all();
        return view('admin.tambah-berita', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id'     => 'required|exists:kategori_berita,id',
            'judul'           => 'required|string|max:255',
            'tanggal_kejadian'=> 'required|date',
            'isi_berita'      => 'required|string',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // Upload ke public/uploads/berita
        if ($request->hasFile('foto')) {

            $file = $request->file('foto');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/berita');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $validated['foto'] = $filename;
        }

        Berita::create($validated);

        return redirect()->route('admin.berita')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        $kategori = KategoriBerita::all();
        return view('admin.edit-berita', compact('berita', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id'      => 'required|exists:kategori_berita,id',
            'judul'            => 'required|string|max:255',
            'tanggal_kejadian' => 'required|date',
            'isi_berita'       => 'required|string',
            'foto'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120'
        ]);

        $berita = Berita::findOrFail($id);

        $berita->kategori_id = $request->kategori_id;
        $berita->judul = $request->judul;
        $berita->tanggal_kejadian = $request->tanggal_kejadian;
        $berita->isi_berita = $request->isi_berita;

        if ($request->hasFile('foto')) {

            // Hapus foto lama
            $oldPath = public_path('uploads/berita/'.$berita->foto);
            if ($berita->foto && file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('foto');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/berita');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $berita->foto = $filename;
        }

        $berita->save();

        return redirect()->route('admin.berita')
            ->with('success', 'Data berita berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file gambar
        $path = public_path('uploads/berita/'.$berita->foto);

        if ($berita->foto && file_exists($path)) {
            unlink($path);
        }

        $berita->delete();

        return redirect()->route('admin.berita')
            ->with('success', 'Data berita berhasil dihapus!');
    }
}