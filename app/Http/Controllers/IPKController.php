<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IpkDocument;
class IPKController extends Controller
{
    public function index(Request $request)
    {
        $query = IpkDocument::query();

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        $data = $query->latest()->get();

        return view('user.ipk.index', compact('data'));
    }

    public function show($id)
    {
        $dokumen = IpkDocument::findOrFail($id);

        $dokumenLainnya = IpkDocument::where('id', '!=', $id)
            ->latest()
            ->take(5)
            ->get();

        $recentBerita = \App\Models\Berita::latest()
            ->take(5)
            ->get();

        return view('user.ipk.detail', compact('dokumen', 'dokumenLainnya', 'recentBerita'));
    }

    public function file($id)
    {
        $doc = IpkDocument::findOrFail($id);
        $filename = basename($doc->file);
        $path = public_path('uploads/ipk/' . $filename);

        abort_unless(file_exists($path) && is_file($path), 404, 'Dokumen IPK tidak ditemukan.');

        $mimeType = mime_content_type($path) ?: 'application/pdf';

        return response()->file($path, [
            'Content-Type'        => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }

    public function download($id)
    {
        $doc = IpkDocument::findOrFail($id);
        $filename = basename($doc->file);
        $path = public_path('uploads/ipk/' . $filename);

        abort_unless(file_exists($path) && is_file($path), 404, 'Dokumen IPK tidak ditemukan.');

        $extension = pathinfo($filename, PATHINFO_EXTENSION) ?: 'pdf';
        $downloadName = preg_replace('/[^a-zA-Z0-9_\-\. ]/', '_', $doc->judul_dokumen) . '.' . $extension;

        return response()->download($path, $downloadName);
    }
}
