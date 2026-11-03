<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\McspDocument;
use Illuminate\Support\Facades\File;

class MCSPAdminController extends Controller
{
    public function index()
    {
        $data = McspDocument::latest()->get();
        return view('admin.mcsp.index', compact('data'));
    }

    public function create()
    {
        return view('admin.mcsp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_dokumen'  => 'required|string|max:255',
            'tahun'          => 'required|integer|digits:4',
            'tanggal_upload' => 'required|date',
            'file'           => 'required|file|mimes:pdf,jpg,jpeg,png,webp|max:102400',
        ], [
            'judul_dokumen.required' => 'Judul dokumen wajib diisi.',
            'tahun.required'         => 'Tahun dokumen wajib diisi.',
            'tanggal_upload.required'=> 'Tanggal upload wajib diisi.',
            'file.required'          => 'File dokumen wajib diunggah.',
            'file.mimes'             => 'Format file harus berupa PDF, JPG, JPEG, PNG, atau WEBP.',
            'file.max'               => 'Ukuran file maksimal adalah 100 MB.',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $destinationPath = public_path('uploads/mcsp');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);

        McspDocument::create([
            'judul_dokumen'  => $request->judul_dokumen,
            'tahun'          => $request->tahun,
            'tanggal_upload' => $request->tanggal_upload,
            'file'           => $filename,
        ]);

        return redirect()->route('admin.mcsp')->with('success', 'Dokumen MCSP berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = McspDocument::findOrFail($id);
        return view('admin.mcsp.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_dokumen'  => 'required|string|max:255',
            'tahun'          => 'required|integer|digits:4',
            'tanggal_upload' => 'required|date',
            'file'           => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:102400',
        ], [
            'judul_dokumen.required' => 'Judul dokumen wajib diisi.',
            'tahun.required'         => 'Tahun dokumen wajib diisi.',
            'tanggal_upload.required'=> 'Tanggal upload wajib diisi.',
            'file.mimes'             => 'Format file harus berupa PDF, JPG, JPEG, PNG, atau WEBP.',
            'file.max'               => 'Ukuran file maksimal adalah 100 MB.',
        ]);

        $data = McspDocument::findOrFail($id);

        $data->judul_dokumen = $request->judul_dokumen;
        $data->tahun = $request->tahun;
        $data->tanggal_upload = $request->tanggal_upload;

        if ($request->hasFile('file')) {
            $oldPath = public_path('uploads/mcsp/' . $data->file);
            if ($data->file && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $file = $request->file('file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('uploads/mcsp');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $data->file = $filename;
        }

        $data->save();

        return redirect()->route('admin.mcsp')->with('success', 'Dokumen MCSP berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = McspDocument::findOrFail($id);

        $path = public_path('uploads/mcsp/' . $data->file);
        if ($data->file && File::exists($path)) {
            File::delete($path);
        }

        $data->delete();

        return redirect()->route('admin.mcsp')->with('success', 'Dokumen MCSP berhasil dihapus!');
    }
}