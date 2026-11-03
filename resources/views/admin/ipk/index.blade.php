@extends('layouts.admin')

@section('content')
<div class="p-6">

    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Manajemen Dokumen IPK
            </h1>
            <p class="text-sm text-gray-500 mt-1">Kelola data dokumen Indeks Pengelolaan Keuangan Daerah</p>
        </div>

        <a href="{{ route('admin.ipk.create') }}"
            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2.5 rounded-xl shadow transition">
            <i class="fas fa-plus"></i>
            <span>Tambah Dokumen</span>
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-emerald-600"></i>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <div class="bg-white shadow rounded-2xl overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-700 border-b border-gray-200 uppercase text-xs">
                    <tr>
                        <th class="p-4 w-16 text-center">No</th>
                        <th class="p-4">Dokumen</th>
                        <th class="p-4 text-center">Tahun</th>
                        <th class="p-4">Tanggal Upload</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse($data as $i => $d)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-center font-medium text-gray-500">
                                {{ $i + 1 }}
                            </td>
                            <td class="p-4 font-semibold text-gray-800">
                                {{ $d->judul_dokumen }}
                            </td>
                            <td class="p-4 text-center font-medium">
                                <span class="px-2.5 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-semibold">
                                    {{ $d->tahun }}
                                </span>
                            </td>
                            <td class="p-4 text-gray-600">
                                {{ \Carbon\Carbon::parse($d->tanggal_upload)->format('d-m-Y') }}
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Tombol Preview -->
                                    <a href="{{ route('ipk.show', $d->id) }}" target="_blank"
                                        class="px-2.5 py-1.5 bg-emerald-50 text-emerald-700 hover:bg-emerald-100 rounded-lg text-xs font-semibold transition"
                                        title="Pratinjau Halaman Dokumen">
                                        <i class="fas fa-eye mr-1"></i> Lihat
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.ipk.edit', $d->id) }}"
                                        class="px-2.5 py-1.5 bg-yellow-50 text-yellow-700 hover:bg-yellow-100 rounded-lg text-xs font-semibold transition"
                                        title="Edit Dokumen">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('admin.ipk.delete', $d->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2.5 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-lg text-xs font-semibold transition"
                                            title="Hapus Dokumen">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-8 text-gray-400">
                                <i class="fas fa-folder-open text-4xl mb-2 text-gray-300 block"></i>
                                Belum ada data dokumen IPK yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
