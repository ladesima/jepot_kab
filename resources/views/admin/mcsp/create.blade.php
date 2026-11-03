@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">

<h1 class="text-2xl font-bold mb-6">
Tambah Dokumen MCSP
</h1>

<form action="{{ route('admin.mcsp.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="mb-4">
<label class="block font-semibold mb-2">
Judul Dokumen
</label>

<input type="text"
name="judul_dokumen"
class="w-full border rounded p-2"
required>
</div>

<div class="mb-4">
<label class="block font-semibold mb-2">
Tahun
</label>

<input type="number"
name="tahun"
class="w-full border rounded p-2"
required>
</div>

<div class="mb-4">
<label class="block font-semibold mb-2">
Tanggal Upload
</label>

<input type="date"
name="tanggal_upload"
class="w-full border rounded p-2"
required>
</div>

<div class="mb-6">
<label class="block font-semibold mb-2">
File PDF
</label>

<input type="file"
name="file"
class="w-full border rounded p-2"
required>
</div>

<button
class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">

Simpan

</button>

</form>

</div>

@endsection