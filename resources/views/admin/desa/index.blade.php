@extends('layouts.admin')
@section('title', 'Data Desa')
@section('content')
<div class="container mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Data Desa</h1>
        <a href="{{ route('admin.desa.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Tambah Desa
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Nama Desa</th>
                    <th class="p-3">Kecamatan</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($desas as $desa)
                <tr class="border-t">
                    <td class="p-3 font-semibold">
                        {{ $desa->nama_desa }}
                    </td>
                    <td class="p-3">
                        {{ $desa->kecamatan->nama_kecamatan }}
                    </td>
                    <td class="p-3 text-center flex gap-2 justify-center">
                        <a href="{{ route('admin.desa.edit',$desa->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded">
                           Edit
                        </a>

                        <form action="{{ route('admin.desa.destroy',$desa->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
