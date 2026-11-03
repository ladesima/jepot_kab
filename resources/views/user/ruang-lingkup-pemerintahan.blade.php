<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Lingkup Pemerintahan - Pemerintah Kabupaten Jeneponto</title>

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

<body class="bg-gray-50 text-gray-800">

@include('layouts.navbar')

<main class="py-12">

<div class="container mx-auto px-4 sm:px-6 max-w-6xl">

    <!-- BREADCRUMB & TITLE -->
    <div class="text-center mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold uppercase tracking-wider mb-3">
            Profil Daerah
        </span>
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight">
            Ruang Lingkup Pemerintahan
        </h1>
        <p class="text-base md:text-lg text-gray-500 max-w-2xl mx-auto mt-2">
            Pemerintah Kabupaten Jeneponto, Provinsi Sulawesi Selatan
        </p>
    </div>

    <!-- MAIN GRID CARDS -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        <!-- KARTU 1: WILAYAH 11 KECAMATAN (Col 12 / Col 7) -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 reveal">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 rounded-2xl bg-blue-600/10 text-blue-600 flex items-center justify-center text-xl shrink-0">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Kedudukan & Wilayah Kerja</h2>
                    <p class="text-sm text-gray-500">Kabupaten Jeneponto, Sulawesi Selatan</p>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 mb-6 text-sm text-slate-700 leading-relaxed">
                Pemerintah Kabupaten Jeneponto berkedudukan di <strong>Kabupaten Jeneponto, Provinsi Sulawesi Selatan</strong>, dengan ruang lingkup wilayah administrasi mencakup <strong>11 Kecamatan</strong>:
            </div>

            <!-- GRID 11 KECAMATAN -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @php
                    $kecamatans = [
                        ['no' => 1, 'nama' => 'Kecamatan Arungkeke'],
                        ['no' => 2, 'nama' => 'Kecamatan Bangkala'],
                        ['no' => 3, 'nama' => 'Kecamatan Bangkala Barat'],
                        ['no' => 4, 'nama' => 'Kecamatan Batang'],
                        ['no' => 5, 'nama' => 'Kecamatan Binamu'],
                        ['no' => 6, 'nama' => 'Kecamatan Bontoramba'],
                        ['no' => 7, 'nama' => 'Kecamatan Kelara'],
                        ['no' => 8, 'nama' => 'Kecamatan Rumbia'],
                        ['no' => 9, 'nama' => 'Kecamatan Tamalatea'],
                        ['no' => 10, 'nama' => 'Kecamatan Tarowang'],
                        ['no' => 11, 'nama' => 'Kecamatan Turatea'],
                    ];
                @endphp

                @foreach($kecamatans as $item)
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white border border-gray-100 shadow-sm hover:border-blue-400 hover:shadow-md transition">
                        <span class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 font-bold text-xs flex items-center justify-center shrink-0">
                            {{ $item['no'] }}
                        </span>
                        <span class="text-sm font-semibold text-slate-700">
                            {{ $item['nama'] }}
                        </span>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 pt-5 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                <span>Informasi wilayah kecamatan & desa</span>
                <a href="{{ route('kecamatan.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold inline-flex items-center gap-1.5">
                    Lihat Kecamatan & Desa <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>

        <!-- KOLOM KANAN: SEKRETARIAT DAERAH & PPID UTAMA (Col 12 / Col 5) -->
        <div class="lg:col-span-5 space-y-8">

            <!-- KARTU 2: SEKRETARIAT DAERAH -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 reveal">
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">Sekretariat Daerah</h2>
                        <p class="text-sm text-gray-500">Pusat Pemerintahan Daerah</p>
                    </div>
                </div>

                <div class="p-4 rounded-2xl bg-amber-50/60 border border-amber-200/60 text-sm text-slate-700 leading-relaxed mb-4">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-amber-600 mt-1 shrink-0"></i>
                        <div>
                            <strong class="text-slate-800 block mb-1">Alamat Kantor:</strong>
                            Jl. Lanto Daeng Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu (kawasan Bontosunggu), Kabupaten Jeneponto, Sulawesi Selatan 92311.
                        </div>
                    </div>
                </div>

                <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                    <span>Pejabat Sekretaris Daerah</span>
                    <a href="{{ route('user.sekretaris-daerah') }}" class="text-amber-600 hover:text-amber-700 font-semibold inline-flex items-center gap-1.5">
                        Profil Sekda <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- KARTU 3: PPID UTAMA KABUPATEN JENEPONTO -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 reveal">
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-600/10 text-emerald-600 flex items-center justify-center text-xl shrink-0">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">PPID Utama</h2>
                        <p class="text-sm text-gray-500">Keterbukaan Informasi Publik</p>
                    </div>
                </div>

                <div class="text-sm text-slate-600 leading-relaxed mb-4 space-y-3">
                    <p>
                        <strong>Pejabat Pengelola Informasi dan Dokumentasi (PPID) Utama</strong> Kabupaten Jeneponto berkedudukan di bawah <strong>Dinas Komunikasi, Informatika, dan Statistik</strong> Kabupaten Jeneponto.
                    </p>
                    <p class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-700 leading-relaxed">
                        <i class="fas fa-info-circle text-blue-500 mr-1.5"></i>
                        PPID Utama melekat pada bidang kehumasan / informasi komunikasi publik di Dinas Komunikasi, Informatika, dan Statistik Kabupaten Jeneponto.
                    </p>
                </div>

                <div class="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-200/60 text-sm text-slate-700 leading-relaxed mb-4">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-emerald-600 mt-1 shrink-0"></i>
                        <div>
                            <strong class="text-slate-800 block mb-1">Sekretariat PPID Utama:</strong>
                            Jl. Lanto Dg. Pasewang No. 08, Bontosungguh, Kecamatan Binamu, Kabupaten Jeneponto, Sulawesi Selatan, Kode Pos 92311.
                        </div>
                    </div>
                </div>

                <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                    <span>Layanan Informasi PPID</span>
                    <a href="{{ Route::has('user.ppid') ? route('user.ppid') : url('/ppid') }}" class="text-emerald-600 hover:text-emerald-700 font-semibold inline-flex items-center gap-1.5">
                        Portal PPID <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>

</div>

</main>

@include('layouts.footer')

</body>
</html>
