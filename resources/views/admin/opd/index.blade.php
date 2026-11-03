@extends('layouts.admin')
@section('title', 'Data OPD')
@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="container mx-auto p-6">

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data OPD</h1>
        <a href="{{ route('opd.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full bg-white shadow rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nama OPD</th>
                    <th class="p-3 text-left">Kepala Dinas</th>
                    <th class="p-3 text-left">Alamat</th>
                    <th class="p-3 text-left">Website</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($opds as $opd)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 font-semibold">{{ $opd->nama_opd }}</td>

                    <td class="p-3">{{ $opd->kepala_dinas }}</td>

                    <td class="p-3 text-sm text-gray-600">{{ $opd->alamat ?? '-' }}</td>

                    <!-- WEBSITE -->
                    <td class="p-3">
                        @if($opd->website)
                            @php
                                $link = Str::startsWith($opd->website, ['http://','https://'])
                                        ? $opd->website
                                        : 'https://' . $opd->website;
                            @endphp

                            <a href="{{ $link }}" target="_blank"
                               class="text-blue-600 hover:underline text-sm">
                               Kunjungi Website
                            </a>
                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </td>

                    <!-- AKSI -->
                    <td class="p-3 text-center">
                        <div class="flex gap-2 justify-center">

                            <a href="{{ route('opd.edit', $opd->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                               Edit
                            </a>

                            <form action="{{ route('opd.destroy', $opd->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500">
                        Data OPD belum tersedia.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
