@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-6">Edit Pengumuman</h2>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Validation --}}
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Judul</label>
            <input type="text" 
                   name="judul"
                   value="{{ old('judul', $pengumuman->judul) }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        {{-- Tanggal --}}
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Tanggal</label>
            <input type="date" 
                   name="tanggal"
                   value="{{ old('tanggal', $pengumuman->tanggal) }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        {{-- File Lama --}}
        @if($pengumuman->file)
        <div class="mb-5">
            <label class="block mb-2 font-semibold">File Saat Ini</label>

            <a href="{{ upload_asset($pengumuman->file, 'pengumuman') }}" 
               target="_blank"
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">
               Lihat PDF
            </a>
        </div>
        @endif

        {{-- Upload File Baru --}}
        <div class="mb-6">
            <label class="block mb-2 font-semibold">
                Upload File Baru (Opsional)
            </label>

            <input type="file" 
                   name="file"
                   accept="application/pdf"
                   class="w-full border rounded-lg px-4 py-2">
        </div>

        {{-- Tombol --}}
        <div class="flex gap-4">
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Update
            </button>

            <a href="{{ route('admin.pengumuman') }}"
               class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection