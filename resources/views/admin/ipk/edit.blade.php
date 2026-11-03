@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-2xl p-6 sm:p-8">

    <div class="flex items-center justify-between pb-4 mb-6 border-b">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Edit Dokumen IPK
            </h1>
            <p class="text-xs text-gray-500 mt-1">Ubah informasi atau ganti file dokumen IPK</p>
        </div>
        <a href="{{ route('admin.ipk') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.ipk.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <label class="block font-semibold text-gray-700 text-sm mb-2">
                Judul Dokumen <span class="text-red-500">*</span>
            </label>
            <input type="text"
                name="judul_dokumen"
                value="{{ old('judul_dokumen', $data->judul_dokumen) }}"
                class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('judul_dokumen') border-red-500 @enderror"
                placeholder="Masukkan judul dokumen"
                required>
            @error('judul_dokumen')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
            <div>
                <label class="block font-semibold text-gray-700 text-sm mb-2">
                    Tahun <span class="text-red-500">*</span>
                </label>
                <input type="number"
                    name="tahun"
                    value="{{ old('tahun', $data->tahun) }}"
                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tahun') border-red-500 @enderror"
                    placeholder="Contoh: 2024"
                    required>
                @error('tahun')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold text-gray-700 text-sm mb-2">
                    Tanggal Upload <span class="text-red-500">*</span>
                </label>
                <input type="date"
                    name="tanggal_upload"
                    value="{{ old('tanggal_upload', $data->tanggal_upload) }}"
                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tanggal_upload') border-red-500 @enderror"
                    required>
                @error('tanggal_upload')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-gray-700 text-sm mb-2">
                File Dokumen (PDF/Gambar)
            </label>
            
            @if($data->file)
                <div class="mb-3 p-3 bg-blue-50 border border-blue-200 rounded-xl flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2 truncate">
                        <i class="fas fa-file-alt text-blue-600"></i>
                        <span class="text-gray-700 font-medium truncate">File saat ini: {{ $data->file }}</span>
                    </div>
                    <a href="{{ upload_asset($data->file, 'ipk') }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-semibold text-xs whitespace-nowrap ml-3">
                        <i class="fas fa-external-link-alt mr-1"></i> Lihat File
                    </a>
                </div>
            @endif

            <input type="file"
                name="file"
                class="w-full border border-gray-300 rounded-xl p-2.5 bg-gray-50 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('file') border-red-500 @enderror">
            <p class="text-xs text-gray-500 mt-1.5">
                Biarkan kosong jika tidak ingin mengganti file. Format didukung: PDF, JPG, PNG, WEBP (Maks: 100 MB).
            </p>
            @error('file')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t">
            <a href="{{ route('admin.ipk') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow transition">
                <i class="fas fa-save mr-1"></i> Simpan Perubahan
            </button>
        </div>

    </form>

</div>
@endsection
