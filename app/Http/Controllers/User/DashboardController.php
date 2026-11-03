<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Album;
use App\Models\Pegawai;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil 6 berita terbaru
        $beritas = Berita::with('kategori')
            ->latest()
            ->take(6)
            ->get();

        // Ambil 3 album terbaru
        $albums = Album::with('cover', 'photos')
            ->latest()
            ->take(3)
            ->get();

        /**
         * ✅ STRUKTUR ORGANISASI (DINAMIS SESUAI ADMIN)
         * Ambil semua pimpinan (parent_id = null)
         * lalu load children secara berurutan
         */
        $struktur = Pegawai::whereNull('parent_id')
            ->with([
                'children' => function ($query) {
                    $query->orderBy('urutan', 'asc')
                          ->with('children'); // level selanjutnya
                }
            ])
            ->orderBy('urutan', 'asc')
            ->get();

        // Ambil slider aktif
        $sliders = Slider::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('dashboard', compact(
            'beritas',
            'albums',
            'struktur',
            'sliders'
        ));
    }
}
