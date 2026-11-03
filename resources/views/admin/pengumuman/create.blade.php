@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-2xl shadow-lg p-6 max-w-3xl mx-auto">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Tambah Pengumuman
        </h2>

        <a href="{{ route('admin.pengumuman') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            ← Kembali
        </a>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.pengumuman.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="space-y-5">

        @csrf

        <!-- Judul -->
        <div>
            <label class="block mb-2 font-semibold">Judul</label>
            <input type="text" 
                   name="judul"
                   value="{{ old('judul') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                   required>

            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- File PDF -->
        <div>
            <label class="block mb-2 font-semibold">Upload File PDF</label>
            <input type="file" 
                   name="file"
                   accept="application/pdf"
                   class="w-full border rounded-lg px-4 py-2">

            @error('file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tanggal -->
        <div>
            <label class="block mb-2 font-semibold">Tanggal</label>
            <input type="date" 
                   name="tanggal"
                   value="{{ old('tanggal') }}"
                   class="w-full border rounded-lg px-4 py-2"
                   required>

            @error('tanggal')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <div class="pt-4">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow">
                💾 Simpan
            </button>
        </div>

    </form>

</div>

@endsection