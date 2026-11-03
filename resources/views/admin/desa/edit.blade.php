@extends('layouts.admin')
@section('title', 'Edit Data Desa')
@section('content')
<div class="container mx-auto p-6 max-w-xl">

    <h1 class="text-2xl font-bold mb-6">Edit Desa</h1>

    <form action="{{ route('admin.desa.update',$desa->id) }}"
          method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nama Desa -->
        <div>
            <label class="block font-medium">Nama Desa</label>
            <input type="text"
                   name="nama_desa"
                   value="{{ old('nama_desa', $desa->nama_desa) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <!-- Kepala Desa -->
        <div>
            <label class="block font-medium">Kepala Desa</label>
            <input type="text"
                   name="kepala_desa"
                   value="{{ old('kepala_desa', $desa->kepala_desa) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Alamat -->
        <div>
            <label class="block font-medium">Alamat</label>
            <textarea name="alamat"
                      class="w-full border rounded px-3 py-2">{{ old('alamat', $desa->alamat) }}</textarea>
        </div>

        <!-- Email -->
        <div>
            <label class="block font-medium">Email</label>
            <input type="email"
                   name="email"
                   value="{{ old('email', $desa->email) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Telepon -->
        <div>
            <label class="block font-medium">Telepon</label>
            <input type="text"
                   name="telepon"
                   value="{{ old('telepon', $desa->telepon) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Website -->
        <div>
            <label class="block font-medium">Website</label>
            <input type="text"
                   name="website"
                   value="{{ old('website', $desa->website) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Pilih Kecamatan -->
        <div>
            <label class="block font-medium">Pilih Kecamatan</label>
            <select name="kecamatan_id"
                    class="w-full border rounded px-3 py-2"
                    required>
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}"
                        {{ old('kecamatan_id', $desa->kecamatan_id) == $kecamatan->id ? 'selected' : '' }}>
                        {{ $kecamatan->nama_kecamatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex gap-3">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>

            <a href="{{ route('admin.desa.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Batal
            </a>
        </div>

    </form>

</div>
@endsection
