<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Daftar pengumuman
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $query = Pengumuman::query();

        if ($request->filled('keyword')) {
            $query->where(
                'judul',
                'like',
                '%' . $request->keyword . '%'
            );
        }

        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $pengumuman = $query
            ->latest()
            ->paginate(10);

        return view('user.pengumuman', compact('pengumuman'));
    }

    /*
    |--------------------------------------------------------------------------
    | Detail berdasarkan slug judul
    |--------------------------------------------------------------------------
    */
    public function show(string $slug)
    {
        $pengumuman = Pengumuman::query()
            ->get()
            ->first(function (Pengumuman $item) use ($slug) {
                return $item->slug === $slug;
            });

        abort_if(
            !$pengumuman,
            404,
            'Pengumuman tidak ditemukan.'
        );

        $pengumuman->increment('views');
        $pengumuman->refresh();

        $recentBerita = Berita::query()
            ->latest()
            ->take(5)
            ->get();

        return view('user.detail-pengumuman', compact(
            'pengumuman',
            'recentBerita'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Redirect URL lama berbasis ID
    |--------------------------------------------------------------------------
    | /pengumuman/9 diarahkan menjadi /judul-pengumuman
    */
    public function redirectOldUrl(int $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return redirect()->route(
            'user.detail-pengumuman',
            [
                'slug' => $pengumuman->slug,
            ],
            301
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Preview PDF
    |--------------------------------------------------------------------------
    */
    public function preview(int $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        abort_if(
            empty($pengumuman->file),
            404,
            'File pengumuman tidak tersedia.'
        );

        $filename = basename($pengumuman->file);
        $uploadPath = public_path('uploads/pengumuman/' . $filename);

        if (file_exists($uploadPath) && is_file($uploadPath)) {
            return response()->file($uploadPath, [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
            ]);
        }

        $filePath = ltrim($pengumuman->file, '/');
        if (Storage::disk('public')->exists($filePath)) {
            return response()->file(
                Storage::disk('public')->path($filePath),
                [
                    'Content-Type'        => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="' . $filename . '"',
                ]
            );
        }

        abort(404, 'File pengumuman tidak ditemukan.');
    }
}