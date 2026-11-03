@extends('layouts.admin')
@section('title', 'Edit Data OPD')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit OPD</h1>

    <form action="{{ route('opd.update', $opd->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold mb-1">Nama OPD</label>
            <input type="text" name="nama_opd" value="{{ $opd->nama_opd }}"
                   class="w-full border p-3 rounded" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Kepala Dinas / Badan / Kantor</label>
            <input type="text" name="kepala_dinas" value="{{ $opd->kepala_dinas }}"
                   class="w-full border p-3 rounded" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Alamat Kantor</label>
            <textarea name="alamat" rows="2" placeholder="Alamat kantor..."
                      class="w-full border p-3 rounded">{{ $opd->alamat }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Website Resmi (Opsional)</label>
            <input type="text" name="website" value="{{ $opd->website }}"
                   class="w-full border p-3 rounded">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Riwayat Jabatan (Opsional)</label>
            <textarea name="riwayat_jabatan" rows="4" placeholder="Riwayat jabatan..."
                      class="w-full border p-3 rounded">{{ $opd->riwayat_jabatan }}</textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
