@extends('layouts.app')

@section('content')

<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">

        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-800">
                Pengumuman
            </h1>

            <p class="text-gray-500 mt-2">
                Informasi resmi dan dokumen publik terbaru.
            </p>
        </div>

        {{-- FILTER --}}
        <form method="GET" class="flex flex-wrap gap-4 mb-8">

            <input
                type="text"
                name="keyword"
                placeholder="Cari pengumuman..."
                value="{{ request('keyword') }}"
                class="px-4 py-2 rounded-lg border w-64 focus:ring-2 focus:ring-blue-400"
            >

            <select
                name="tahun"
                class="px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-400"
            >
                <option value="">Semua Tahun</option>

                @for ($year = date('Y'); $year >= 2020; $year--)
                    <option
                        value="{{ $year }}"
                        {{ request('tahun') == $year ? 'selected' : '' }}
                    >
                        {{ $year }}
                    </option>
                @endfor
            </select>

            <button
                type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700"
            >
                Cari
            </button>

        </form>

        {{-- DAFTAR PENGUMUMAN --}}
        <div class="space-y-4">

            @forelse ($pengumuman as $item)

                <a
                    href="{{ route('user.detail-pengumuman', [
                        'slug' => $item->slug,
                    ]) }}"
                    class="group flex justify-between items-center bg-white p-6 rounded-xl shadow hover:shadow-lg transition duration-300"
                >

                    <div>
                        <h3 class="font-semibold text-lg text-gray-800 group-hover:text-blue-600 transition-colors">
                            {{ $item->judul }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-2">
                            {{ optional($item->tanggal)->translatedFormat('d F Y') }}
                        </p>
                    </div>

                    <div class="flex items-center gap-6 text-gray-400 text-sm">

                        <span class="flex items-center gap-2">
                            <i class="fas fa-eye"></i>
                            {{ number_format($item->views ?? 0) }}
                        </span>

                        <i class="fas fa-chevron-right text-blue-500 group-hover:translate-x-1 transition"></i>

                    </div>

                </a>

            @empty

                <div class="bg-white p-16 rounded-xl shadow text-center text-gray-400">
                    <i class="fas fa-file-pdf text-4xl mb-4"></i>

                    <p class="text-lg">
                        Belum ada pengumuman tersedia.
                    </p>
                </div>

            @endforelse

        </div>

        <div class="mt-10">
            {{ $pengumuman->withQueryString()->links() }}
        </div>

    </div>
</section>

@endsection