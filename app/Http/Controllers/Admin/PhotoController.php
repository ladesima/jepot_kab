<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Upload foto ke album
     */
    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albums,id',
            'path.*'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $destinationPath = public_path('uploads/galeri');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        foreach ($request->file('path') as $file) {

            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            $file->move($destinationPath, $filename);

            Photo::create([
                'album_id'   => $request->album_id,
                'path'       => $filename,
                'description'=> null,
                'is_cover'   => false
            ]);
        }

        return back()->with('success', 'Foto berhasil diunggah!');
    }

    /**
     * Update deskripsi foto
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'description' => 'nullable|string|max:500'
        ]);

        $photo->update([
            'description' => $request->description
        ]);

        return back()->with('success', 'Deskripsi berhasil diperbarui!');
    }

    /**
     * Hapus foto
     */
    public function destroy(Photo $photo)
    {
        $filePath = public_path('uploads/galeri/'.$photo->path);

        if ($photo->path && file_exists($filePath)) {
            unlink($filePath);
        }

        $photo->delete();

        return back()->with('success', 'Foto berhasil dihapus!');
    }

    /**
     * Set foto sebagai cover album
     */
    public function setCover(Photo $photo)
    {
        Photo::where('album_id', $photo->album_id)
            ->update(['is_cover' => false]);

        $photo->update(['is_cover' => true]);

        return back()->with('success', 'Foto ini sekarang menjadi sampul album!');
    }
}