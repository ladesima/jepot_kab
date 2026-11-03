<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::all();
        return view('admin.artikel', compact('data'));
    }

    public function create()
    {
        return view('admin.tambah-artikel');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'   => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi'     => 'required|string',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/artikel');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $validatedData['gambar'] = $filename;
        }

        Artikel::create($validatedData);

        return redirect()->route('admin.artikel')
            ->with('success', 'Artikel baru berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.edit-artikel', compact('artikel'));
    }

    public function update(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);

        $validatedData = $request->validate([
            'judul'   => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi'     => 'required|string',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            $oldPath = public_path('uploads/artikel/'.$artikel->gambar);
            if ($artikel->gambar && file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('gambar');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/artikel');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $validatedData['gambar'] = $filename;
        }

        $artikel->update($validatedData);

        return redirect()->route('admin.artikel')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        // Hapus file gambar
        $path = public_path('uploads/artikel/'.$artikel->gambar);

        if ($artikel->gambar && file_exists($path)) {
            unlink($path);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel')
            ->with('success', 'Artikel berhasil dihapus');
    }
}