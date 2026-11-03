<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('photos')->latest()->get();
        return view('admin.album', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        Album::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->nama) . '-' . uniqid()
        ]);

        return back()->with('success', 'Album baru berhasil dibuat.');
    }

    public function show(Album $album)
    {
        $album->load('photos');
        return view('admin.galeri', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $album->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->nama) . '-' . uniqid()
        ]);

        return back()->with('success', 'Album berhasil diperbarui.');
    }

    public function destroy(Album $album)
    {
        // Hapus semua file foto dalam album
        foreach ($album->photos as $photo) {

            $filePath = public_path('uploads/galeri/'.$photo->path);

            if ($photo->path && file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Hapus album (foto ikut terhapus karena cascade)
        $album->delete();

        return back()->with('success', 'Album berhasil dihapus.');
    }
}