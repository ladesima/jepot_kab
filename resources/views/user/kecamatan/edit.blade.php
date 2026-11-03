@extends('layouts.admin')

@section('title', 'Edit Kecamatan')

@section('content')

<div class="max-w-3xl">

    <h2 class="text-2xl font-bold mb-6">Edit Kecamatan</h2>

    <form action="{{ route('admin.kecamatan.update', $kecamatan->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Nama Kecamatan -->
        <div>
            <label class="block font-semibold mb-1">Nama Kecamatan</label>
            <input type="text" name="nama_kecamatan"
                value="{{ old('nama_kecamatan', $kecamatan->nama_kecamatan) }}"
                class="w-full border rounded-lg px-4 py-2"
                required>
        </div>

        <!-- Kepala Camat -->
        <div>
            <label class="block font-semibold mb-1">Nama Kepala Camat</label>
            <input type="text" name="kepala_camat"
                value="{{ old('kepala_camat', $kecamatan->kepala_camat) }}"
                class="w-full border rounded-lg px-4 py-2">
        </div>

        <!-- Alamat -->
        <div>
            <label class="block font-semibold mb-1">Alamat</label>
            <textarea name="alamat"
                class="w-full border rounded-lg px-4 py-2">{{ old('alamat', $kecamatan->alamat) }}</textarea>
        </div>

        <!-- Email -->
        <div>
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email"
                value="{{ old('email', $kecamatan->email) }}"
                class="w-full border rounded-lg px-4 py-2">
        </div>

        <!-- Website -->
        <div>
            <label class="block font-semibold mb-1">Website</label>
            <input type="text" name="website"
                value="{{ old('website', $kecamatan->website) }}"
                class="w-full border rounded-lg px-4 py-2">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Update
            </button>

            <a href="{{ route('admin.kecamatan.index') }}"
               class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection