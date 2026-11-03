<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'file'    => 'required|mimes:pdf|max:10000',
            'tanggal' => 'required|date'
        ]);

        $file = $request->file('file');
        $filename = time().'_'.uniqid().'.pdf';

        $destinationPath = public_path('uploads/pengumuman');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);

        Pengumuman::create([
            'judul'   => $request->judul,
            'file'    => $filename,
            'tanggal' => $request->tanggal,
            'views'   => 0
        ]);

        return redirect()->route('admin.pengumuman')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'tanggal' => 'required|date',
            'file'    => 'nullable|mimes:pdf|max:10000'
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        $data = [
            'judul'   => $request->judul,
            'tanggal' => $request->tanggal
        ];

        if ($request->hasFile('file')) {

            // Hapus file lama
            $oldPath = public_path('uploads/pengumuman/'.$pengumuman->file);
            if ($pengumuman->file && file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('file');
            $filename = time().'_'.uniqid().'.pdf';

            $destinationPath = public_path('uploads/pengumuman');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $data['file'] = $filename;
        }

        $pengumuman->update($data);

        return redirect()->route('admin.pengumuman')
            ->with('success', 'Pengumuman berhasil diupdate');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $filePath = public_path('uploads/pengumuman/'.$pengumuman->file);

        if ($pengumuman->file && file_exists($filePath)) {
            unlink($filePath);
        }

        $pengumuman->delete();

        return redirect()->route('admin.pengumuman')
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}