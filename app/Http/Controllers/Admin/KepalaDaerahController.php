<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KepalaDaerah;
use Illuminate\Support\Facades\Storage;

class KepalaDaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KepalaDaerah::all();
        return view('admin.kepala-daerah', compact('data'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = KepalaDaerah::findOrFail($id);
        return view('admin.edit-kepala-daerah', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nama_istri' => 'nullable|string|max:255',
            'anak' => 'nullable|string|max:255',
            'riwayat_jabatan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'file_lhkpn' => 'nullable|mimes:pdf|max:25600', // Maksimal 25MB PDF
        ], [
            // Pesan error custom
            'nama.required' => 'Nama wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'foto.image' => 'File harus berupa gambar (jpg, jpeg, png, webp).',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
            'file_lhkpn.mimes' => 'Dokumen LHKPN harus berformat PDF.',
            'file_lhkpn.max' => 'Ukuran dokumen LHKPN maksimal 25MB.',
        ]);

        $kepalaDaerah = KepalaDaerah::findOrFail($id);

        // Upload Foto ke public/uploads/kepala-daerah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . \Illuminate\Support\Str::random(12) . '.' . $ext;
            $destinationPath = public_path('uploads/kepala-daerah');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Hapus foto lama jika ada
            if ($kepalaDaerah->foto) {
                $oldFileName = basename($kepalaDaerah->foto);
                $oldFile = public_path('uploads/kepala-daerah/' . $oldFileName);
                if (file_exists($oldFile) && is_file($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $file->move($destinationPath, $filename);
            $kepalaDaerah->foto = $filename;
        }

        // Upload Dokumen LHKPN (PDF) ke public/uploads/lhkpn
        if ($request->hasFile('file_lhkpn')) {
            $file = $request->file('file_lhkpn');
            $filename = time() . '_lhkpn_' . \Illuminate\Support\Str::random(12) . '.pdf';
            $destinationPath = public_path('uploads/lhkpn');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Hapus file LHKPN lama jika ada
            if ($kepalaDaerah->file_lhkpn) {
                $oldFileName = basename($kepalaDaerah->file_lhkpn);
                $oldFile = public_path('uploads/lhkpn/' . $oldFileName);
                if (file_exists($oldFile) && is_file($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $file->move($destinationPath, $filename);
            $kepalaDaerah->file_lhkpn = $filename;
        }

        $kepalaDaerah->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'nama_istri' => $request->nama_istri,
            'anak' => $request->anak,
            'riwayat_jabatan' => $request->riwayat_jabatan,
        ]);

        return redirect()->route('admin.kepala-daerah')->with('success', 'Data berhasil diupdate');
    }

}
