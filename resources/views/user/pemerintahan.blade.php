<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepala OPD - Pemerintah Kabupaten Jeneponto</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/theme-dark-light.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interactive-animations.css') }}">
    <script src="{{ asset('js/interactive-animations.js') }}" defer></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

@include('layouts.navbar')

<main class="py-16">

<div class="container mx-auto px-6 max-w-7xl">

    <!-- JUDUL -->
    <div class="text-center reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold uppercase tracking-wider mb-3">
            Pemerintah Kabupaten Jeneponto
        </span>
        <h1 class="text-3xl md:text-4xl font-bold text-slate-800">
            Daftar Kepala OPD (Organisasi Perangkat Daerah)
        </h1>

        <p class="mt-3 text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
            Informasi pimpinan perangkat daerah, badan, dinas, dan unit kerja di lingkungan Pemerintah Kabupaten Jeneponto.
        </p>
    </div>

    <!-- SEARCH -->
    <div class="mt-8 flex justify-center reveal">
        <div class="relative w-full md:w-1/2">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" id="search"
                placeholder="Cari nama OPD, kepala dinas, atau riwayat jabatan..."
                class="w-full pl-11 pr-5 py-3.5 rounded-2xl border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm">
        </div>
    </div>

    @php use Illuminate\Support\Str; @endphp

    <!-- GRID OPD -->
    <div id="opdList" class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse ($opds->sortBy('nama_opd') as $opd)

            @php
                $hasWebsite = !empty($opd->website) && $opd->website !== '#';
                $link = $hasWebsite
                        ? (Str::startsWith($opd->website, ['http://','https://']) ? $opd->website : 'https://' . $opd->website)
                        : null;
                $domain = $link ? parse_url($link, PHP_URL_HOST) : null;
            @endphp

            <!-- CARD -->
            <div class="opd-card bg-white rounded-2xl shadow-md p-6 hover:shadow-2xl hover:-translate-y-2 transition duration-300 border border-gray-100 flex flex-col justify-between reveal">

                <div>
                    <!-- ICON & BADGE -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-13 h-13 w-12 h-12 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 text-xl shadow-inner">
                            <i class="fas fa-building"></i>
                        </div>
                        @if($hasWebsite)
                            <span class="text-xs px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-medium flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Online
                            </span>
                        @endif
                    </div>

                    <!-- NAMA OPD -->
                    <h3 class="font-bold text-lg text-slate-800 leading-snug mb-2">
                        {{ $opd->nama_opd }}
                    </h3>

                    <!-- KEPALA DINAS / OPD -->
                    <div class="mt-3 p-3 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">Kepala / Pimpinan:</span>
                        <p class="font-bold text-blue-700 text-sm mt-0.5">
                            {{ $opd->kepala_dinas }}
                        </p>
                    </div>

                    <!-- ALAMAT KANTOR -->
                    @if(!empty($opd->alamat))
                        <div class="mt-3 flex items-start gap-2 text-xs text-slate-600 bg-slate-50/70 p-2.5 rounded-xl border border-slate-100">
                            <i class="fas fa-map-marker-alt text-rose-500 mt-0.5 shrink-0"></i>
                            <span class="leading-relaxed">{{ $opd->alamat }}</span>
                        </div>
                    @endif

                    <!-- RIWAYAT JABATAN -->
                    @if(!empty($opd->riwayat_jabatan))
                        <div class="mt-4 pt-3 border-t border-gray-100">
                            <span class="text-xs font-semibold text-slate-600 flex items-center gap-1.5 mb-1.5">
                                <i class="fas fa-history text-teal-600"></i> Riwayat Jabatan:
                            </span>
                            <ul class="text-xs text-gray-600 space-y-1 pl-4 list-disc">
                                @foreach(explode("\n", str_replace(["\r", "~"], ['', ''], $opd->riwayat_jabatan)) as $item)
                                    @if(trim($item))
                                        <li>{{ trim($item) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- FOOTER / LINK WEBSITE -->
                @if($hasWebsite && $link)
                    <div class="mt-5 pt-3 border-t border-gray-100">
                        <a href="{{ $link }}" target="_blank"
                           class="inline-flex items-center gap-2 text-xs font-semibold text-blue-600 hover:text-blue-800 transition">
                            <i class="fas fa-globe"></i>
                            <span class="truncate">{{ $domain ?? 'Kunjungi Website' }}</span>
                            <i class="fas fa-external-link-alt text-[10px]"></i>
                        </a>
                    </div>
                @endif

            </div>

        @empty
            <div class="col-span-3 text-center text-gray-500 py-12">
                <i class="fas fa-folder-open text-4xl text-gray-300 mb-3 block"></i>
                Data Kepala OPD belum tersedia.
            </div>
        @endforelse

    </div>

</div>

</main>

@include('layouts.footer')

<!-- SEARCH SCRIPT -->
<script>
document.getElementById('search').addEventListener('keyup', function() {
    let keyword = this.value.toLowerCase();
    let cards = document.querySelectorAll('.opd-card');

    cards.forEach(card => {
        let text = card.innerText.toLowerCase();
        card.style.display = text.includes(keyword) ? 'flex' : 'none';
    });
});
</script>

</body>
</html>
