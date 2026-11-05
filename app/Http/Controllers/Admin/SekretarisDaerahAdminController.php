<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SekretarisDaerah;
use Illuminate\Support\Facades\Storage;

class SekretarisDaerahAdminController extends Controller
{
    /**
     * Tampilkan form Sekda (1 data saja)
     */
    public function index()
    {
        $sekda = SekretarisDaerah::first();

        return view('admin.sekretaris-daerah.index', compact('sekda'));
    }

    /**
     * Simpan data pertama kali
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable',
            'riwayat_jabatan' => 'nullable',
            'sambutan' => 'nullable',
            'foto' => 'nullable|image|max:2048',
            'file_lhkpn' => 'nullable|mimes:pdf|max:25600',
        ], [
            'file_lhkpn.mimes' => 'Dokumen LHKPN harus berformat PDF.',
            'file_lhkpn.max' => 'Ukuran dokumen LHKPN maksimal 25MB.',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . \Illuminate\Support\Str::random(12) . '.' . $ext;
            $dest = public_path('uploads/sekda');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $data['foto'] = $filename;
        }

        if ($request->hasFile('file_lhkpn')) {
            $file = $request->file('file_lhkpn');
            $filename = time() . '_lhkpn_' . \Illuminate\Support\Str::random(12) . '.pdf';
            $dest = public_path('uploads/lhkpn');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $data['file_lhkpn'] = $filename;
        }

        SekretarisDaerah::create($data);

        return redirect()
            ->route('admin.sekretaris-daerah')
            ->with('success', 'Data Sekretaris Daerah berhasil disimpan');
    }

    /**
     * Update data Sekda
     */
    public function update(Request $request, $id)
    {
        $sekda = SekretarisDaerah::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable',
            'riwayat_jabatan' => 'nullable',
            'sambutan' => 'nullable',
            'foto' => 'nullable|image|max:2048',
            'file_lhkpn' => 'nullable|mimes:pdf|max:25600',
        ], [
            'file_lhkpn.mimes' => 'Dokumen LHKPN harus berformat PDF.',
            'file_lhkpn.max' => 'Ukuran dokumen LHKPN maksimal 25MB.',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . \Illuminate\Support\Str::random(12) . '.' . $ext;
            $dest = public_path('uploads/sekda');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }

            // Hapus foto lama jika ada
            if ($sekda->foto) {
                $oldFileName = basename($sekda->foto);
                $oldFile = public_path('uploads/sekda/' . $oldFileName);
                if (file_exists($oldFile) && is_file($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $file->move($dest, $filename);
            $data['foto'] = $filename;
        }

        if ($request->hasFile('file_lhkpn')) {
            $file = $request->file('file_lhkpn');
            $filename = time() . '_lhkpn_' . \Illuminate\Support\Str::random(12) . '.pdf';
            $dest = public_path('uploads/lhkpn');
            if (!file_exists($dest)) {
                mkdir($dest, 0755, true);
            }

            // Hapus file LHKPN lama jika ada
            if ($sekda->file_lhkpn) {
                $oldFileName = basename($sekda->file_lhkpn);
                $oldFile = public_path('uploads/lhkpn/' . $oldFileName);
                if (file_exists($oldFile) && is_file($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $file->move($dest, $filename);
            $data['file_lhkpn'] = $filename;
        }

        $sekda->update($data);

        return redirect()
            ->route('admin.sekretaris-daerah')
            ->with('success', 'Data Sekretaris Daerah berhasil diperbarui');
    }
}
