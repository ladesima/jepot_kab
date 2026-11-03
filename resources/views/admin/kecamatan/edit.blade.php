@extends('layouts.admin')
@section('title', 'Edit Data Kecamatan')
@section('content')
<div class="container mx-auto p-6 max-w-xl">

    <h1 class="text-2xl font-bold mb-6">Edit Kecamatan</h1>

    <form action="{{ route('admin.kecamatan.update',$kecamatan->id) }}"
          method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nama Kecamatan</label>
            <input type="text" name="nama_kecamatan"
                   value="{{ $kecamatan->nama_kecamatan }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <div class="flex gap-3">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>

            <a href="{{ route('admin.kecamatan.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>

</div>
@endsection
