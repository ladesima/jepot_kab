<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;

class AlbumUserController extends Controller
{
    public function albums()
    {
        $albums = Album::latest()->paginate(10);
        return view('user.galeri', compact('albums'));
    }

    public function show($id)
    {
        // Ambil album beserta foto-fotonya
        $album = Album::with('photos')->findOrFail($id);

        // Tambah views (1x per session)
        if (!session()->has('album_viewed_' . $album->id)) {
            $album->increment('views');
            session()->put('album_viewed_' . $album->id, true);
        }

        return view('user.detail-album', compact('album'));
    }
}