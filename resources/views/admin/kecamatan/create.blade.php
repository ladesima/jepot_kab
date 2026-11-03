@extends('layouts.admin')
@section('title', 'Isi Data Kecamatan')
@section('content')

<div class="p-6">

    <h2 class="text-2xl font-bold mb-6">Tambah Kecamatan</h2>

    <form action="{{ route('admin.kecamatan.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Nama Kecamatan</label>
            <input type="text" name="nama_kecamatan"
                class="w-full border rounded-lg px-4 py-2"
                required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Alamat</label>
            <textarea name="alamat"
                class="w-full border rounded-lg px-4 py-2"></textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email"
                class="w-full border rounded-lg px-4 py-2">
        </div>

        <div>
            <label class="block font-semibold mb-1">Website</label>
            <input type="text" name="website"
                placeholder="contoh: pesanggaran.jenepontokab.go.id"
                class="w-full border rounded-lg px-4 py-2">
        </div>

        <div>
            <label class="block font-semibold mb-1">Telepon</label>
            <input type="text" name="telepon"
                class="w-full border rounded-lg px-4 py-2">
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.kecamatan.index') }}"
               class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                Kembali
            </a>

            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Simpan
            </button>
        </div>

    </form>

</div>

@endsection