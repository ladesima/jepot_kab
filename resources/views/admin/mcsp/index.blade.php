@extends('layouts.admin')

@section('content')

<div class="p-6">

<h1 class="text-2xl font-bold mb-6">
Manajemen MCSP KPK
</h1>

<a href="{{ route('admin.mcsp.create') }}"
class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
+ Tambah Dokumen
</a>

<div class="overflow-x-auto">

<table class="w-full mt-6 border border-gray-200 rounded-lg overflow-hidden">

<thead class="bg-gray-100">

<tr class="text-left">

<th class="p-3 border">No</th>

<th class="p-3 border">Dokumen</th>

<th class="p-3 border">Tahun</th>

<th class="p-3 border">Tanggal Upload</th>

<th class="p-3 border text-center">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($data as $i => $d)

<tr class="hover:bg-gray-50">

<td class="p-3 border">
{{ $i+1 }}
</td>

<td class="p-3 border">
{{ $d->judul_dokumen }}
</td>

<td class="p-3 border">
{{ $d->tahun }}
</td>

<td class="p-3 border">
{{ \Carbon\Carbon::parse($d->tanggal_upload)->format('d-m-Y') }}
</td>

<td class="p-3 border flex gap-4 justify-center">

<a href="{{ route('admin.mcsp.edit',$d->id) }}"
class="text-blue-600 hover:text-blue-800">
Edit
</a>

<form action="{{ route('admin.mcsp.delete',$d->id) }}"
method="POST"
onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">

@csrf
@method('DELETE')

<button class="text-red-600 hover:text-red-800">
Hapus
</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="5" class="text-center p-6 text-gray-500">
Belum ada data dokumen MCSP
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection