@extends('layouts.admin')
@section('title', 'Isi Data OPD')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah OPD</h1>

    <form action="{{ route('opd.store') }}" method="POST" class="space-y-4">
        @csrf

        <input type="text" name="nama_opd" placeholder="Nama OPD"
               class="w-full border p-3 rounded" required>

        <input type="text" name="kepala_dinas" placeholder="Kepala Dinas/Bagian"
               class="w-full border p-3 rounded" required>

        <textarea name="alamat" rows="2" placeholder="Alamat Kantor (contoh: Jl. Lanto Dg. Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu)"
                  class="w-full border p-3 rounded"></textarea>

        <input type="text" name="website" placeholder="Website"
               class="w-full border p-3 rounded">

        <textarea name="riwayat_jabatan" rows="4" placeholder="Riwayat Jabatan (opsional, contoh: ~ Jabatan 1 ~ Jabatan 2)"
                  class="w-full border p-3 rounded"></textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
