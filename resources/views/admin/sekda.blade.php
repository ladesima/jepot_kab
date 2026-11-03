@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Sekretaris Daerah</h1>

@if($sekda)
    <p><strong>Nama:</strong> {{ $sekda->nama }}</p>
@else
    <a href="{{ route('admin.tambah-sekretaris-daerah') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        Tambah Sekretaris Daerah
    </a>
@endif
@endsection
