@extends('layouts.admin')
@section('title', 'Isi Data Desa')
@section('content')

<div class="p-6 max-w-3xl">

    <h2 class="text-2xl font-bold mb-6">Tambah Desa / Kelurahan</h2>

    <form action="{{ route('admin.desa.store') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Nama Desa -->
        <div>
            <label class="block font-semibold mb-1">
                Nama Desa / Kelurahan <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   name="nama_desa"
                   value="{{ old('nama_desa') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                   placeholder="Contoh: Desa Bontosunggu"
                   required>
        </div>

        <!-- Kepala Desa -->
        <div>
            <label class="block font-semibold mb-1">
                Kepala Desa
            </label>
            <input type="text"
                   name="kepala_desa"
                   value="{{ old('kepala_desa') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                   placeholder="Nama Kepala Desa">
        </div>

        <!-- Alamat -->
        <div>
            <label class="block font-semibold mb-1">
                Alamat
            </label>
            <textarea name="alamat"
                      class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                      placeholder="Alamat lengkap desa">{{ old('alamat') }}</textarea>
        </div>

        <!-- Email -->
        <div>
            <label class="block font-semibold mb-1">
                Email
            </label>
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                   placeholder="contoh: desa@email.go.id">
        </div>

        <!-- Telepon -->
        <div>
            <label class="block font-semibold mb-1">
                Telepon
            </label>
            <input type="text"
                   name="telepon"
                   value="{{ old('telepon') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                   placeholder="Nomor telepon desa">
        </div>

        <!-- Website -->
        <div>
            <label class="block font-semibold mb-1">
                Website Desa
            </label>
            <input type="text"
                   name="website"
                   value="{{ old('website') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                   placeholder="contoh: bontosunggu.jenepontokab.go.id">
            <p class="text-xs text-gray-500 mt-1">
                Opsional. Tanpa http/https juga bisa.
            </p>
        </div>

        <!-- Pilih Kecamatan -->
        <div>
            <label class="block font-semibold mb-1">
                Pilih Kecamatan <span class="text-red-500">*</span>
            </label>
            <select name="kecamatan_id"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="">-- Pilih Kecamatan --</option>
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}"
                        {{ old('kecamatan_id') == $kecamatan->id ? 'selected' : '' }}>
                        {{ $kecamatan->nama_kecamatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex gap-3 pt-2">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                Simpan
            </button>

            <a href="{{ route('admin.desa.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
               Batal
            </a>
        </div>

    </form>

</div>

@endsection