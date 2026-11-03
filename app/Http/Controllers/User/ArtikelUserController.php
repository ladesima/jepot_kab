<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelUserController extends Controller
{
    public function index()
    {
        // Ambil data, urutkan berdasarkan 'tanggal' terbaru, dan bagi per halaman.
        $artikels = Artikel::latest('tanggal')->paginate(6); // 6 artikel per halaman

        return view('user.artikel', ['artikels' => $artikels]);
    }

   public function show(Artikel $artikel)
{
    $artikel->increment('views');

    $artikelTerbaru = Artikel::latest('tanggal')
        ->where('id', '!=', $artikel->id)
        ->take(5)
        ->get();

    return view('user.detail-artikel', [
        'artikel' => $artikel,
        'artikelTerbaru' => $artikelTerbaru,
    ]);
}
}
