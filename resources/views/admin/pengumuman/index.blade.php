@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-2xl shadow-lg p-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Pengumuman
        </h2>

        <a href="{{ route('admin.pengumuman.create') }}"
           class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 
                  text-white px-4 py-2 rounded-lg shadow transition duration-200">
            <i class="fas fa-plus"></i>
            Tambah
        </a>
    </div>

    <!-- Search -->
    <form method="GET" class="mb-6 flex flex-col md:flex-row gap-3">
        <input type="text" 
               name="judul" 
               value="{{ request('judul') }}"
               placeholder="Cari Judul..."
               class="w-full md:w-64 border border-gray-300 rounded-lg px-4 py-2 
                      focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 
                   rounded-lg shadow transition duration-200">
            <i class="fas fa-search mr-1"></i> Cari
        </button>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">

            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="py-3 px-4">Judul</th>
                    <th class="px-4">Tanggal</th>
                    <th class="px-4">Views</th>
                    <th class="px-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">

                @forelse ($pengumuman as $item)
                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="py-3 px-4 font-medium">
                        {{ $item->judul }}
                    </td>

                    <td class="px-4">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </td>

                    <td class="px-4">
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 
                                     rounded-full text-xs font-semibold">
                            {{ $item->views }}
                        </span>
                    </td>

                    <td class="px-4">
                        <div class="flex items-center justify-center gap-3">

                            <!-- EDIT -->
                            <a href="{{ route('admin.pengumuman.edit', $item->id) }}"
                               title="Edit"
                               class="w-9 h-9 flex items-center justify-center 
                                      rounded-lg bg-yellow-100 text-yellow-600 
                                      hover:bg-yellow-500 hover:text-white 
                                      transition duration-200 shadow-sm">

                                <i class="fas fa-pen text-sm"></i>
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('admin.pengumuman.delete', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    title="Hapus"
                                    class="w-9 h-9 flex items-center justify-center 
                                           rounded-lg bg-red-100 text-red-600 
                                           hover:bg-red-600 hover:text-white 
                                           transition duration-200 shadow-sm">

                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500">
                        Belum ada data pengumuman.
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $pengumuman->links() }}
    </div>

</div>

@endsection