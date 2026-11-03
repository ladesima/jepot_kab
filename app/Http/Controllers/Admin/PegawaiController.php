<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data pegawai, diurutkan berdasarkan kolom 'urutan'
        $pegawais = Pegawai::with('parent')->orderBy('urutan')->get();
        return view('admin.struktur', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua pegawai untuk pilihan atasan
        $pegawais = Pegawai::all();
        return view('admin.tambah-pegawai', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'nip' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:pegawais,id',
            'urutan' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . \Illuminate\Support\Str::random(12) . '.' . $ext;
            $dest = public_path('uploads/foto_pegawai');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $data['foto'] = $filename;
        }


        Pegawai::create($data);

        return redirect()->route('admin.struktur')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        // Mengambil semua pegawai untuk pilihan atasan, kecuali dirinya sendiri
        $pegawais = Pegawai::where('id', '!=', $pegawai->id)->get();
        return view('admin.edit-pegawai', compact('pegawai', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'nip' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:pegawais,id',
            'urutan' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . \Illuminate\Support\Str::random(12) . '.' . $ext;
            $dest = public_path('uploads/foto_pegawai');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }

            // Hapus foto lama jika ada
            if ($pegawai->foto) {
                $oldFileName = basename($pegawai->foto);
                $oldFile = public_path('uploads/foto_pegawai/' . $oldFileName);
                if (file_exists($oldFile) && is_file($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $file->move($dest, $filename);
            $data['foto'] = $filename;
        }

        $pegawai->update($data);

        return redirect()->route('admin.struktur')->with('success', 'Data pegawai berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        // Hapus foto jika ada
        if ($pegawai->foto) {
            $filename = basename($pegawai->foto);
            $filePath = public_path('uploads/foto_pegawai/' . $filename);
            if (file_exists($filePath) && is_file($filePath)) {
                @unlink($filePath);
            }
            if (Storage::disk('public')->exists($pegawai->foto)) {
                Storage::disk('public')->delete($pegawai->foto);
            }
        }
        
        $pegawai->delete();

        return redirect()->route('admin.struktur')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
