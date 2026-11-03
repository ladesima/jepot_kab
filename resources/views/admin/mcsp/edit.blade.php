@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">

<h1 class="text-2xl font-bold mb-6">
Edit Dokumen MCSP
</h1>

<form action="{{ route('admin.mcsp.update',$data->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="mb-4">
<label class="block font-semibold mb-2">
Judul Dokumen
</label>

<input type="text"
name="judul_dokumen"
value="{{ $data->judul_dokumen }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label class="block font-semibold mb-2">
Tahun
</label>

<input type="number"
name="tahun"
value="{{ $data->tahun }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label class="block font-semibold mb-2">
Tanggal Upload
</label>

<input type="date"
name="tanggal_upload"
value="{{ $data->tanggal_upload }}"
class="w-full border rounded p-2">
</div>

<div class="mb-4">
<label class="block font-semibold mb-2">
Ganti File
</label>

<input type="file"
name="file"
class="w-full border rounded p-2">
</div>

<button
class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">

Update

</button>

</form>

</div>

@endsection