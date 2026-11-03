@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-100 dark:bg-slate-900 text-slate-800 dark:text-slate-100 py-8 px-4 sm:px-6 lg:px-8 transition-colors duration-200">
    <div class="max-w-7xl mx-auto space-y-8">

        <!-- ================= HERO HEADER BANNER ================= -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-teal-800 via-teal-900 to-slate-900 dark:from-slate-900 dark:via-teal-950 dark:to-slate-900 border border-teal-500/30 p-6 md:p-8 shadow-xl dark:shadow-2xl text-white">
            <div class="absolute -right-10 -top-10 w-72 h-72 bg-teal-400/15 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -left-10 -bottom-10 w-72 h-72 bg-emerald-400/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div class="flex items-start md:items-center space-x-4">
                    <img src="{{ asset('images/new_logo.png') }}" alt="Logo Jeneponto" class="h-16 w-16 md:h-20 md:w-20 object-contain drop-shadow-md">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-500/20 border border-teal-400/30 text-teal-300 text-xs font-semibold mb-2">
                            <i class="fas fa-file-signature text-teal-400"></i>
                            E-SURAT TUGAS & SPD
                        </div>
                        <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                            Penerbitan Surat Tugas Online
                        </h1>
                        <p class="text-sm md:text-base text-slate-200 dark:text-slate-300 mt-1">
                            Sistem Administrasi & Otomasi Penerbitan Surat Tugas & SPD — <span class="text-teal-300 font-medium">Sekretariat Daerah Kabupaten Jeneponto</span>
                        </p>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <div class="bg-white/10 dark:bg-slate-800/80 border border-white/20 dark:border-teal-500/20 rounded-xl p-3 text-center backdrop-blur-sm shadow-sm">
                        <span class="block text-2xl font-bold text-teal-300 dark:text-teal-400">{{ $totalSt }}</span>
                        <span class="text-xs text-slate-200 dark:text-slate-400">Total ST</span>
                    </div>
                    <div class="bg-white/10 dark:bg-slate-800/80 border border-white/20 dark:border-teal-500/20 rounded-xl p-3 text-center backdrop-blur-sm shadow-sm">
                        <span class="block text-2xl font-bold text-emerald-300 dark:text-emerald-400">{{ $totalSpd }}</span>
                        <span class="text-xs text-slate-200 dark:text-slate-400">SPD Terbit</span>
                    </div>
                    <div class="bg-white/10 dark:bg-slate-800/80 border border-white/20 dark:border-teal-500/20 rounded-xl p-3 text-center backdrop-blur-sm shadow-sm">
                        <span class="block text-2xl font-bold text-cyan-300 dark:text-cyan-400">{{ $totalPegawai }}</span>
                        <span class="text-xs text-slate-200 dark:text-slate-400">Pegawai Pemohon</span>
                    </div>
                    <div class="bg-white/10 dark:bg-slate-800/80 border border-white/20 dark:border-teal-500/20 rounded-xl p-3 text-center backdrop-blur-sm shadow-sm">
                        <span class="block text-2xl font-bold text-amber-300 dark:text-amber-400">{{ $totalPenerimaUnik }}</span>
                        <span class="text-xs text-slate-200 dark:text-slate-400">Total Penugasan</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= FLASH MESSAGES ================= -->
        @if(session('success'))
        <div class="rounded-xl bg-emerald-50 dark:bg-emerald-950/80 border border-emerald-300 dark:border-emerald-500/40 p-4 flex items-center justify-between text-emerald-800 dark:text-emerald-200 shadow-sm">
            <div class="flex items-center space-x-3">
                <i class="fas fa-check-circle text-emerald-600 dark:text-emerald-400 text-xl"></i>
                <span class="font-medium text-sm md:text-base">{{ session('success') }}</span>
            </div>
            @if(session('latest_id'))
            <div class="flex items-center space-x-2">
                <a href="{{ route('user.surat-tugas.cetak-st', session('latest_id')) }}" target="_blank" class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold rounded-lg transition shadow-sm">
                    <i class="fas fa-print mr-1"></i> Cetak ST
                </a>
                <a href="{{ route('user.surat-tugas.cetak-spd', session('latest_id')) }}" target="_blank" class="px-3 py-1.5 bg-teal-600 hover:bg-teal-500 text-white text-xs font-semibold rounded-lg transition shadow-sm">
                    <i class="fas fa-print mr-1"></i> Cetak SPD
                </a>
            </div>
            @endif
        </div>
        @endif

        @if($errors->any())
        <div class="rounded-xl bg-rose-50 dark:bg-rose-950/80 border border-rose-300 dark:border-rose-500/40 p-4 text-rose-800 dark:text-rose-200 shadow-sm">
            <div class="flex items-center space-x-2 font-bold mb-1">
                <i class="fas fa-exclamation-triangle text-rose-600 dark:text-rose-400"></i>
                <span>Terdapat kesalahan pengisian form:</span>
            </div>
            <ul class="list-disc list-inside text-xs space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- ================= MAIN TAB BUTTONS ================= -->
        <div class="flex flex-wrap items-center gap-3 border-b border-slate-300 dark:border-slate-700 pb-4">
            <button type="button" onclick="switchTab('buat')" id="tab-btn-buat"
                class="tab-btn px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 flex items-center gap-2 bg-teal-600 text-white shadow-lg shadow-teal-600/30">
                <i class="fas fa-pen-to-square"></i>
                Buat Surat Tugas
            </button>
            <button type="button" onclick="switchTab('riwayat')" id="tab-btn-riwayat"
                class="tab-btn px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 flex items-center gap-2 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-slate-900 dark:hover:text-white border border-slate-300 dark:border-slate-700 shadow-sm">
                <i class="fas fa-table-list"></i>
                Riwayat Penerbitan
                <span class="px-2 py-0.5 rounded-full text-xs bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 font-bold">{{ $totalSt }}</span>
            </button>
            <button type="button" onclick="switchTab('panduan')" id="tab-btn-panduan"
                class="tab-btn px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 flex items-center gap-2 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-slate-900 dark:hover:text-white border border-slate-300 dark:border-slate-700 shadow-sm">
                <i class="fas fa-circle-info"></i>
                Panduan & Format
            </button>
        </div>

        <!-- ================= TAB 1: FORM BUAT SURAT TUGAS ================= -->
        <div id="tab-content-buat" class="tab-pane space-y-6">
            <form action="{{ route('user.surat-tugas.store') }}" method="POST" id="stForm">
                @csrf

                <!-- STEP 1: DASAR PELAKSANAAN -->
                <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700/80 rounded-2xl p-6 shadow-md dark:shadow-xl mb-6">
                    <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">
                        <div class="w-8 h-8 rounded-lg bg-teal-50 dark:bg-teal-500/20 text-teal-700 dark:text-teal-400 border border-teal-200 dark:border-transparent flex items-center justify-center font-bold text-sm">
                            1
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900 dark:text-white">Dasar Pelaksanaan Tugas</h2>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Rujukan surat undangan, nota dinas, DPA, atau disposisi pimpinan</p>
                        </div>
                    </div>

                    <!-- Quick Chips Dasar -->
                    <div class="mb-3">
                        <span class="text-xs text-slate-500 dark:text-slate-400 font-medium mr-2">Template Cepat:</span>
                        <div class="inline-flex flex-wrap gap-2 mt-1.5">
                            <button type="button" onclick="appendDasar('1. Surat Undangan Kepala Dinas Perumahan dan Kawasan Permukiman Provinsi Sulawesi Selatan Nomor: 005/124/Disperkim Tanggal 20 September 2026 Perihal: Rapat Koordinasi Program Perumahan Tahun 2026.\n2. Disposisi Sekretaris Daerah Kabupaten Jeneponto.')"
                                class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-slate-700 text-teal-800 dark:text-teal-300 hover:bg-teal-50 dark:hover:bg-teal-900/50 hover:text-teal-900 border border-slate-300 dark:border-slate-600 transition">
                                + Undangan Resmi Provinsi
                            </button>
                            <button type="button" onclick="appendDasar('1. Dokumen Pelaksanaan Anggaran (DPA) Sekretariat Daerah Kabupaten Jeneponto Tahun Anggaran 2026.\n2. Disposisi Pimpinan Sekretaris Daerah Kabupaten Jeneponto.')"
                                class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-slate-700 text-teal-800 dark:text-teal-300 hover:bg-teal-50 dark:hover:bg-teal-900/50 hover:text-teal-900 border border-slate-300 dark:border-slate-600 transition">
                                + DPA SKPD 2026
                            </button>
                            <button type="button" onclick="appendDasar('1. Surat Perintah Tugas Bupati Jeneponto.\n2. Disposisi Asisten Pemerintahan dan Kesejahteraan Rakyat Setda Kab. Jeneponto.')"
                                class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-slate-700 text-teal-800 dark:text-teal-300 hover:bg-teal-50 dark:hover:bg-teal-900/50 hover:text-teal-900 border border-slate-300 dark:border-slate-600 transition">
                                + Disposisi Asisten
                            </button>
                            <button type="button" onclick="appendDasar('1. Keputusan Bupati Jeneponto Nomor: 188.45/112/2026 tentang Tim Koordinasi Kegiatan Terpadu Daerah.\n2. Jadwal Pelaksanaan Lapangan Bagian Perekonomian Setda.')"
                                class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-slate-700 text-teal-800 dark:text-teal-300 hover:bg-teal-50 dark:hover:bg-teal-900/50 hover:text-teal-900 border border-slate-300 dark:border-slate-600 transition">
                                + Keputusan Bupati
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                Dasar Surat Tugas <span class="text-rose-500">*</span>
                            </label>
                            <textarea name="dasar_surat" id="dasar_surat" rows="3" required
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500"
                                placeholder="Contoh:&#10;1. Dokumen Pelaksanaan Anggaran (DPA) Sekretariat Daerah Kabupaten Jeneponto Tahun Anggaran {{ date('Y') }}.&#10;2. Disposisi Sekretaris Daerah Kabupaten Jeneponto."></textarea>
                        </div>

                        <div class="space-y-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                    Tanggal Surat Diterbitkan <span class="text-rose-500">*</span>
                                </label>
                                <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ date('Y-m-d') }}" required
                                    class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1 flex items-center justify-between">
                                    <span>Nomor Surat Tugas</span>
                                    <span class="text-[10px] text-teal-600 dark:text-teal-400 font-medium normal-case flex items-center gap-1"><i class="fas fa-lock text-[9px]"></i> Otomatis Berurutan</span>
                                </label>
                                <div class="relative">
                                    <input type="text" name="nomor_st" id="nomor_st" value="{{ $nextNomorSt }}" readonly
                                        class="w-full bg-slate-100 dark:bg-slate-900/80 border border-slate-300 dark:border-slate-700 rounded-xl pl-4 pr-9 py-2 text-sm text-teal-700 dark:text-teal-400 font-mono font-bold cursor-not-allowed select-none focus:outline-none">
                                    <i class="fas fa-lock absolute right-3.5 top-3 text-slate-400 text-xs"></i>
                                </div>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Nomor dokumen otomatis dibuat berurutan (090/xxx/ST)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: MAKSUD, WAKTU & TEMPAT -->
                <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700/80 rounded-2xl p-6 shadow-md dark:shadow-xl mb-6">
                    <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">
                        <div class="w-8 h-8 rounded-lg bg-teal-50 dark:bg-teal-500/20 text-teal-700 dark:text-teal-400 border border-teal-200 dark:border-transparent flex items-center justify-center font-bold text-sm">
                            2
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900 dark:text-white">Maksud, Waktu & Tempat Pelaksanaan</h2>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Rincian kegiatan yang akan dilaksanakan oleh pegawai bersangkutan</p>
                        </div>
                    </div>

                    <!-- Quick Chips Maksud -->
                    <div class="mb-3">
                        <span class="text-xs text-slate-500 dark:text-slate-400 font-medium mr-2">Pilihan Cepat Maksud:</span>
                        <div class="inline-flex flex-wrap gap-2 mt-1.5">
                            <button type="button" onclick="setMaksud('Mengikuti Rapat Koordinasi dan Sinkronisasi Program Kegiatan Prioritas Daerah Tingkat Provinsi Sulawesi Selatan.')"
                                class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-slate-700 text-teal-800 dark:text-teal-300 hover:bg-teal-50 dark:hover:bg-teal-900/50 hover:text-teal-900 border border-slate-300 dark:border-slate-600 transition">
                                + Rapat Koordinasi
                            </button>
                            <button type="button" onclick="setMaksud('Melakukan Konsultasi dan Koordinasi Teknis terkait Tata Kelola Administrasi Pemerintahan dan Kepegawaian.')"
                                class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-slate-700 text-teal-800 dark:text-teal-300 hover:bg-teal-50 dark:hover:bg-teal-900/50 hover:text-teal-900 border border-slate-300 dark:border-slate-600 transition">
                                + Konsultasi Teknis
                            </button>
                            <button type="button" onclick="setMaksud('Mengikuti Bimbingan Teknis (Bimtek) Peningkatan Kapasitas Aparatur Sipil Negara.')"
                                class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-slate-700 text-teal-800 dark:text-teal-300 hover:bg-teal-50 dark:hover:bg-teal-900/50 hover:text-teal-900 border border-slate-300 dark:border-slate-600 transition">
                                + Bimtek / Workshop
                            </button>
                            <button type="button" onclick="setMaksud('Melaksanakan Monitoring, Evaluasi, dan Pengawasan Lapangan Kegiatan Pembangunan Daerah.')"
                                class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-slate-700 text-teal-800 dark:text-teal-300 hover:bg-teal-50 dark:hover:bg-teal-900/50 hover:text-teal-900 border border-slate-300 dark:border-slate-600 transition">
                                + Monitoring & Evaluasi
                            </button>
                            <button type="button" onclick="setMaksud('Melakukan Studi Komparasi / Studi Tiru Peningkatan Pelayanan Publik.')"
                                class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-slate-700 text-teal-800 dark:text-teal-300 hover:bg-teal-50 dark:hover:bg-teal-900/50 hover:text-teal-900 border border-slate-300 dark:border-slate-600 transition">
                                + Studi Tiru
                            </button>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                Maksud & Uraian Tugas <span class="text-rose-500">*</span>
                            </label>
                            <textarea name="maksud_tugas" id="maksud_tugas" rows="3" required
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500"
                                placeholder="Contoh: Mengikuti Rapat Koordinasi dan Sinkronisasi Program Prioritas Daerah Tingkat Provinsi Sulawesi Selatan di Makassar..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                    Tanggal Mulai <span class="text-rose-500">*</span>
                                </label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ date('Y-m-d') }}" required
                                    class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                    Tanggal Selesai <span class="text-rose-500">*</span>
                                </label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ date('Y-m-d', strtotime('+2 days')) }}" required
                                    class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                    Durasi Pelaksanaan
                                </label>
                                <div class="flex items-center space-x-2 bg-slate-100 dark:bg-slate-900/70 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2">
                                    <i class="fas fa-clock text-teal-600 dark:text-teal-400"></i>
                                    <span id="durasi_badge" class="text-sm font-bold text-teal-700 dark:text-teal-300">3 Hari</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tempat Tujuan & Quick chips -->
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <label class="text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">
                                    Tempat / Lokasi Tujuan <span class="text-rose-500">*</span>
                                </label>
                                <span class="text-xs text-slate-500 dark:text-slate-400">Pilih cepat:</span>
                            </div>
                            <div class="flex flex-wrap gap-1.5 mb-2">
                                <button type="button" onclick="setTempat('Makassar, Sulawesi Selatan')" class="px-2 py-0.5 text-xs rounded bg-slate-100 dark:bg-slate-700 hover:bg-teal-100 dark:hover:bg-teal-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-transparent">📍 Makassar</button>
                                <button type="button" onclick="setTempat('Kabupaten Bantaeng')" class="px-2 py-0.5 text-xs rounded bg-slate-100 dark:bg-slate-700 hover:bg-teal-100 dark:hover:bg-teal-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-transparent">📍 Bantaeng</button>
                                <button type="button" onclick="setTempat('Kabupaten Bulukumba')" class="px-2 py-0.5 text-xs rounded bg-slate-100 dark:bg-slate-700 hover:bg-teal-100 dark:hover:bg-teal-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-transparent">📍 Bulukumba</button>
                                <button type="button" onclick="setTempat('Kabupaten Gowa')" class="px-2 py-0.5 text-xs rounded bg-slate-100 dark:bg-slate-700 hover:bg-teal-100 dark:hover:bg-teal-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-transparent">📍 Gowa</button>
                                <button type="button" onclick="setTempat('Jakarta Pusat, DKI Jakarta')" class="px-2 py-0.5 text-xs rounded bg-slate-100 dark:bg-slate-700 hover:bg-teal-100 dark:hover:bg-teal-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-transparent">📍 Jakarta</button>
                                <button type="button" onclick="setTempat('Kecamatan Binamu, Jeneponto')" class="px-2 py-0.5 text-xs rounded bg-slate-100 dark:bg-slate-700 hover:bg-teal-100 dark:hover:bg-teal-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-transparent">📍 Kec. Binamu</button>
                                <button type="button" onclick="setTempat('Kecamatan Bangkala, Jeneponto')" class="px-2 py-0.5 text-xs rounded bg-slate-100 dark:bg-slate-700 hover:bg-teal-100 dark:hover:bg-teal-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-transparent">📍 Kec. Bangkala</button>
                            </div>
                            <input type="text" name="tempat_tujuan" id="tempat_tujuan" value="" required
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-teal-500"
                                placeholder="Contoh: Makassar, Sulawesi Selatan">
                        </div>

                        <!-- Live UNTUK Preview Box -->
                        <div class="p-4 rounded-xl bg-teal-50 dark:bg-teal-950/40 border border-teal-200 dark:border-teal-500/30">
                            <div class="flex items-center space-x-2 text-teal-800 dark:text-teal-400 font-bold text-xs uppercase mb-2">
                                <i class="fas fa-eye"></i>
                                <span>Preview Klausul &quot;UNTUK:&quot; Pada Surat Tugas</span>
                            </div>
                            <div class="text-xs text-slate-700 dark:text-slate-300 space-y-1 pl-2">
                                <p><span class="font-bold text-teal-700 dark:text-teal-300">1.</span> <span id="preview_maksud" class="italic text-slate-400">[Belum diisi - masukkan uraian tugas di atas]</span></p>
                                <p><span class="font-bold text-teal-700 dark:text-teal-300">2.</span> Lamanya penugasan selama <strong id="preview_durasi" class="text-teal-800 dark:text-teal-300">3 hari</strong>, terhitung mulai tanggal <strong id="preview_tanggal" class="text-teal-800 dark:text-teal-300">Senin s.d. Rabu, 22 s.d. 24 September 2026</strong>.</p>
                                <p><span class="font-bold text-teal-700 dark:text-teal-300">3.</span> Tempat Pelaksanaan: <strong id="preview_tempat" class="text-teal-800 dark:text-teal-300 italic text-slate-400">[Belum diisi - masukkan lokasi tujuan]</strong>.</p>
                                <p><span class="font-bold text-teal-700 dark:text-teal-300">4.</span> Melaksanakan tugas ini dengan penuh tanggung jawab dan menyampaikan laporan hasil pelaksanaan tugas kepada pejabat yang berwenang setelah selesai.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: PEGAWAI YANG DITUGASKAN -->
                <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700/80 rounded-2xl p-6 shadow-md dark:shadow-xl mb-6">
                    <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">
                        <div class="w-8 h-8 rounded-lg bg-teal-50 dark:bg-teal-500/20 text-teal-700 dark:text-teal-400 border border-teal-200 dark:border-transparent flex items-center justify-center font-bold text-sm">
                            3
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900 dark:text-white">Pegawai yang Ditugaskan (Kepada)</h2>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Pilih dari database kepegawaian atau isi data secara manual</p>
                        </div>
                    </div>

                    <!-- Autocomplete Search Pegawai -->
                    <div class="relative mb-4">
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                            Cari Cepat Pegawai (Ketik Nama / NIP / Jabatan)
                        </label>
                        <div class="relative">
                            <input type="text" id="pegawai_search_input" autocomplete="off"
                                placeholder="Ketik nama atau NIP untuk mencari pegawai..."
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-teal-300 dark:border-teal-500/50 rounded-xl pl-10 pr-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500">
                            <i class="fas fa-search absolute left-3.5 top-3.5 text-teal-600 dark:text-teal-400"></i>
                        </div>
                        <!-- Dropdown list results -->
                        <div id="pegawai_dropdown" class="hidden absolute left-0 right-0 top-full mt-1 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl shadow-2xl z-30 max-h-60 overflow-y-auto divide-y divide-slate-100 dark:divide-slate-800">
                            <!-- Injected by JS -->
                        </div>
                    </div>

                    <input type="hidden" name="pegawai_id" id="pegawai_id" value="">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                Nama Lengkap & Gelar <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="nama_pegawai" id="nama_pegawai" required
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500"
                                placeholder="Contoh: Dr. H. Muh. Arifin Nur, S.Sos., M.Si.">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                NIP Pegawai
                            </label>
                            <input type="text" name="nip_pegawai" id="nip_pegawai"
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500"
                                placeholder="Contoh: 19780512 200502 1 003 (atau - jika Non-ASN)">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                Pangkat / Golongan Ruang
                            </label>
                            <input type="text" name="pangkat_golongan" id="pangkat_golongan"
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500"
                                placeholder="Contoh: Pembina Utama Muda (IV/c)">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                Jabatan <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="jabatan_pegawai" id="jabatan_pegawai" required
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500"
                                placeholder="Contoh: Kepala Bagian Organisasi dan Tata Laksana">
                        </div>
                    </div>
                </div>

                <!-- STEP 4: PEJABAT PENANDATANGAN -->
                <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700/80 rounded-2xl p-6 shadow-md dark:shadow-xl mb-6">
                    <div class="flex items-center space-x-3 mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">
                        <div class="w-8 h-8 rounded-lg bg-teal-50 dark:bg-teal-500/20 text-teal-700 dark:text-teal-400 border border-teal-200 dark:border-transparent flex items-center justify-center font-bold text-sm">
                            4
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900 dark:text-white">Pejabat Penandatangan & Otorisasi</h2>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Pejabat yang berwenang menandatangani Surat Tugas & SPD</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                            Pilih Pejabat Penandatangan
                        </label>
                        <select id="select_pejabat" onchange="applyPejabatPreset(this.value)"
                            class="w-full bg-slate-50 dark:bg-slate-900/90 border border-teal-300 dark:border-teal-500/50 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500">
                            <option value="setda">a.n. BUPATI JENEPONTO - SEKRETARIS DAERAH KABUPATEN JENEPONTO</option>
                            <option value="asisten1">a.n. SEKRETARIS DAERAH - ASISTEN PEMERINTAHAN DAN KESRA (ASISTEN I)</option>
                            <option value="asisten2">a.n. SEKRETARIS DAERAH - ASISTEN PEREKONOMIAN DAN PEMBANGUNAN (ASISTEN II)</option>
                            <option value="asisten3">a.n. SEKRETARIS DAERAH - ASISTEN ADMINISTRASI UMUM (ASISTEN III)</option>
                            <option value="custom">-- Input Kustom / Manual --</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                Jabatan Penandatangan (Atas Nama) <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="pejabat_jabatan" id="pejabat_jabatan" required
                                value="a.n. BUPATI JENEPONTO&#10;SEKRETARIS DAERAH KABUPATEN JENEPONTO"
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                Nama Pejabat <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="pejabat_nama" id="pejabat_nama" required
                                value="H. MUHAMMAD ARIFIN NUR, S.H., M.H."
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                NIP Pejabat
                            </label>
                            <input type="text" name="pejabat_nip" id="pejabat_nip"
                                value="19680315 199403 1 008"
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                Pangkat / Golongan Pejabat
                            </label>
                            <input type="text" name="pejabat_pangkat" id="pejabat_pangkat"
                                value="Pembina Utama Madya (IV/d)"
                                class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500">
                        </div>
                    </div>
                </div>

                <!-- STEP 5: PENERBITAN SPD -->
                <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700/80 rounded-2xl p-6 shadow-md dark:shadow-xl mb-6">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-200 dark:border-slate-700 mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-lg bg-teal-50 dark:bg-teal-500/20 text-teal-700 dark:text-teal-400 border border-teal-200 dark:border-transparent flex items-center justify-center font-bold text-sm">
                                5
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Surat Perjalanan Dinas (SPD)</h2>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Opsi untuk menerbitkan lembar SPD sekaligus</p>
                            </div>
                        </div>

                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="terbitkan_spd" id="terbitkan_spd" value="1" checked onchange="toggleSpdFields(this.checked)" class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-300 dark:bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-teal-600"></div>
                            <span class="ml-3 text-xs font-semibold text-teal-700 dark:text-teal-300 hidden sm:inline">Terbitkan SPD</span>
                        </label>
                    </div>

                    <div id="spd_fields" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1 flex items-center justify-between">
                                    <span>Nomor SPD</span>
                                    <span class="text-[10px] text-teal-600 dark:text-teal-400 font-medium normal-case flex items-center gap-1"><i class="fas fa-lock text-[9px]"></i> Otomatis Berurutan</span>
                                </label>
                                <div class="relative">
                                    <input type="text" name="nomor_spd" id="nomor_spd" value="{{ $nextNomorSpd }}" readonly
                                        class="w-full bg-slate-100 dark:bg-slate-900/80 border border-slate-300 dark:border-slate-700 rounded-xl pl-4 pr-9 py-2 text-sm text-teal-700 dark:text-teal-400 font-mono font-bold cursor-not-allowed select-none focus:outline-none">
                                    <i class="fas fa-lock absolute right-3.5 top-3 text-slate-400 text-xs"></i>
                                </div>
                                <span class="text-[10px] text-slate-500 dark:text-slate-400">Nomor SPD otomatis menyesuaikan urutan Surat Tugas</span>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">
                                    Alat Angkut yang Digunakan
                                </label>
                                <select name="alat_angkut" id="alat_angkut"
                                    class="w-full bg-slate-50 dark:bg-slate-900/90 border border-slate-300 dark:border-slate-700 rounded-xl px-4 py-2 text-sm text-slate-900 dark:text-slate-100 focus:outline-none focus:border-teal-500">
                                    <option value="Kendaraan Dinas / Operasional">Kendaraan Dinas / Operasional</option>
                                    <option value="Kendaraan Pribadi / Sewa">Kendaraan Pribadi / Sewa</option>
                                    <option value="Angkutan Umum / Bus">Angkutan Umum / Bus</option>
                                    <option value="Pesawat Udara">Pesawat Udara</option>
                                    <option value="Kapal Laut / Penyeberangan">Kapal Laut / Penyeberangan</option>
                                </select>
                            </div>
                        </div>

                        <div class="p-3 bg-slate-50 dark:bg-slate-900/60 rounded-xl border border-slate-200 dark:border-slate-700/60 text-xs text-slate-600 dark:text-slate-400">
                            <span class="font-bold text-slate-800 dark:text-slate-300"><i class="fas fa-info-circle text-teal-600 dark:text-teal-400 mr-1"></i> Pembebanan Anggaran:</span>
                            DPA Sekretariat Daerah Kabupaten Jeneponto Tahun Anggaran {{ date('Y') }}.
                        </div>
                    </div>
                </div>

                <!-- FORM ACTIONS -->
                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-slate-300 dark:border-slate-800">
                    <button type="reset" class="px-5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-transparent text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 text-sm font-semibold transition shadow-sm">
                        <i class="fas fa-rotate-left mr-1"></i> Reset Form
                    </button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 text-white font-bold text-sm shadow-lg shadow-teal-600/30 transition flex items-center gap-2">
                        <i class="fas fa-paper-plane"></i>
                        Terbitkan & Simpan Surat Tugas
                    </button>
                </div>

            </form>
        </div>

        <!-- ================= TAB 2: RIWAYAT PENERBITAN ================= -->
        <div id="tab-content-riwayat" class="tab-pane hidden space-y-6">
            <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700/80 rounded-2xl p-6 shadow-md dark:shadow-xl">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900 dark:text-white">Riwayat Penerbitan Surat Tugas</h2>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Daftar arsip dokumen surat tugas dan SPD yang telah diterbitkan</p>
                    </div>

                    <!-- Search Input in History -->
                    <form action="{{ route('user.surat-tugas') }}" method="GET" class="flex items-center gap-2">
                        <input type="hidden" name="tab" value="riwayat">
                        <div class="relative">
                            <input type="text" name="q" value="{{ $search }}" placeholder="Cari nomor ST, nama, tujuan..."
                                class="w-64 md:w-80 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-xl pl-9 pr-4 py-2 text-xs text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:border-teal-500">
                            <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 text-xs"></i>
                        </div>
                        <button type="submit" class="px-3 py-2 bg-teal-600 hover:bg-teal-500 text-white rounded-xl text-xs font-semibold transition shadow-sm">
                            Cari
                        </button>
                        @if($search)
                        <a href="{{ route('user.surat-tugas', ['tab' => 'riwayat']) }}" class="px-2.5 py-2 bg-slate-200 dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-300 rounded-xl text-xs font-semibold transition">
                            Reset
                        </a>
                        @endif
                    </form>
                </div>

                <!-- History Table -->
                <div class="overflow-x-auto rounded-xl border border-slate-200 dark:border-slate-700">
                    <table class="w-full text-left text-xs text-slate-700 dark:text-slate-300">
                        <thead class="bg-slate-100 dark:bg-slate-900/90 text-slate-700 dark:text-slate-400 uppercase font-semibold text-[11px] tracking-wider border-b border-slate-200 dark:border-slate-700">
                            <tr>
                                <th class="px-4 py-3 text-center w-12">No</th>
                                <th class="px-4 py-3">Nomor Dokumen</th>
                                <th class="px-4 py-3">Pegawai Ditugaskan</th>
                                <th class="px-4 py-3">Maksud & Tempat</th>
                                <th class="px-4 py-3">Waktu & Durasi</th>
                                <th class="px-4 py-3">Penandatangan</th>
                                <th class="px-4 py-3 text-center">Aksi Dokumen</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-800/80 bg-white dark:bg-slate-900/40">
                            @forelse($suratTugasList as $index => $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/60 transition">
                                <td class="px-4 py-3 text-center text-slate-500 dark:text-slate-400 font-mono">
                                    {{ $suratTugasList->firstItem() + $index }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-bold text-teal-700 dark:text-teal-300 font-mono">{{ $item->nomor_st }}</div>
                                    @if($item->terbitkan_spd && $item->nomor_spd)
                                    <div class="text-[10px] text-emerald-700 dark:text-emerald-400 font-mono mt-0.5">SPD: {{ $item->nomor_spd }}</div>
                                    @endif
                                    <div class="text-[10px] text-slate-500 dark:text-slate-400 mt-1">
                                        <i class="far fa-calendar-alt mr-1"></i>{{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-semibold text-slate-900 dark:text-white">{{ $item->nama_pegawai }}</div>
                                    <div class="text-[10px] text-slate-500 dark:text-slate-400">NIP: {{ $item->nip_pegawai ?? '-' }}</div>
                                    <div class="text-[10px] text-slate-500 dark:text-slate-400">{{ $item->jabatan_pegawai }}</div>
                                </td>
                                <td class="px-4 py-3 max-w-xs">
                                    <div class="line-clamp-2 text-slate-800 dark:text-slate-200" title="{{ $item->maksud_tugas }}">{{ $item->maksud_tugas }}</div>
                                    <div class="text-[11px] text-teal-700 dark:text-teal-400 mt-1 font-medium">
                                        <i class="fas fa-location-dot mr-1"></i>{{ $item->tempat_tujuan }}
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-block px-2 py-0.5 rounded bg-teal-50 dark:bg-teal-950 text-teal-700 dark:text-teal-300 border border-teal-200 dark:border-teal-800/60 font-semibold text-[10px] mb-1">
                                        {{ $item->durasi_hari }} Hari
                                    </span>
                                    <div class="text-[10px] text-slate-500 dark:text-slate-400">
                                        {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M') }} - {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-medium text-slate-800 dark:text-slate-200">{{ $item->pejabat_nama }}</div>
                                    <div class="text-[10px] text-slate-500 dark:text-slate-400 line-clamp-1">{{ $item->pejabat_jabatan }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-col sm:flex-row items-center justify-center gap-1.5">
                                        <!-- ST Actions -->
                                        <a href="{{ route('user.surat-tugas.export-doc', ['id' => $item->id, 'type' => 'st']) }}"
                                            class="w-full sm:w-auto px-2.5 py-1 rounded bg-blue-600 hover:bg-blue-700 text-white font-medium text-[10px] flex items-center justify-center gap-1 shadow-sm"
                                            title="Download Word Surat Tugas">
                                            <i class="fas fa-file-word"></i> ST Doc
                                        </a>
                                        <a href="{{ route('user.surat-tugas.cetak-st', $item->id) }}" target="_blank"
                                            class="w-full sm:w-auto px-2.5 py-1 rounded bg-teal-600 hover:bg-teal-700 text-white font-medium text-[10px] flex items-center justify-center gap-1 shadow-sm"
                                            title="Cetak PDF Surat Tugas">
                                            <i class="fas fa-print"></i> ST PDF
                                        </a>

                                        <!-- SPD Actions -->
                                        @if($item->terbitkan_spd)
                                        <a href="{{ route('user.surat-tugas.export-doc', ['id' => $item->id, 'type' => 'spd']) }}"
                                            class="w-full sm:w-auto px-2.5 py-1 rounded bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-[10px] flex items-center justify-center gap-1 shadow-sm"
                                            title="Download Word SPD">
                                            <i class="fas fa-file-word"></i> SPD Doc
                                        </a>
                                        <a href="{{ route('user.surat-tugas.cetak-spd', $item->id) }}" target="_blank"
                                            class="w-full sm:w-auto px-2.5 py-1 rounded bg-emerald-700 hover:bg-emerald-800 text-white font-medium text-[10px] flex items-center justify-center gap-1 shadow-sm"
                                            title="Cetak PDF SPD">
                                            <i class="fas fa-print"></i> SPD PDF
                                        </a>
                                        @endif

                                        <!-- Delete -->
                                        <form action="{{ route('user.surat-tugas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip surat tugas ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 rounded text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/60 hover:text-rose-700" title="Hapus">
                                                <i class="fas fa-trash-can text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-slate-400 dark:text-slate-500">
                                    <i class="fas fa-folder-open text-4xl mb-3 text-slate-300 dark:text-slate-600 block"></i>
                                    <span>Belum ada riwayat penerbitan surat tugas.</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $suratTugasList->links() }}
                </div>
            </div>
        </div>

        <!-- ================= TAB 3: PANDUAN & FORMAT ================= -->
        <div id="tab-content-panduan" class="tab-pane hidden space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Card 1 -->
                <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700 rounded-2xl p-6 shadow-md dark:shadow-xl">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-teal-50 dark:bg-teal-500/20 text-teal-700 dark:text-teal-400 border border-teal-200 dark:border-transparent flex items-center justify-center text-lg">
                            <i class="fas fa-scale-balanced"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-white text-base">Dasar Hukum & Tata Naskah</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Regulasi & Pedoman Resmi</p>
                        </div>
                    </div>
                    <ul class="text-xs text-slate-600 dark:text-slate-300 space-y-2.5">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-teal-600 dark:text-teal-400 mt-0.5"></i>
                            <span>Permendagri No. 1 Tahun 2023 tentang Tata Naskah Dinas di Lingkungan Pemerintah Daerah.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-teal-600 dark:text-teal-400 mt-0.5"></i>
                            <span>Peraturan Bupati Jeneponto tentang Pedoman Perjalanan Dinas Jabatan Dalam dan Luar Daerah.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-teal-600 dark:text-teal-400 mt-0.5"></i>
                            <span>Penggunaan Kop Resmi Sekretariat Daerah Kabupaten Jeneponto dengan logo resmi daerah.</span>
                        </li>
                    </ul>
                </div>

                <!-- Card 2 -->
                <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700 rounded-2xl p-6 shadow-md dark:shadow-xl">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-transparent flex items-center justify-center text-lg">
                            <i class="fas fa-route"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-white text-base">Alur Penerbitan E-ST & SPD</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Tahapan Pembuatan Dokumen</p>
                        </div>
                    </div>
                    <ol class="text-xs text-slate-600 dark:text-slate-300 space-y-2.5">
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 dark:text-emerald-400">1.</span>
                            <span><strong>Input Dasar & Maksud:</strong> Masukkan nomor surat rujukan atau disposisi dan tujuan penugasan.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 dark:text-emerald-400">2.</span>
                            <span><strong>Pilih Pegawai:</strong> Manfaatkan fitur pencarian autocomplete untuk mengisi otomatis identitas pegawai.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 dark:text-emerald-400">3.</span>
                            <span><strong>Pilih Penandatangan:</strong> Tentukan pejabat penandatangan (Sekda atau Para Asisten).</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 dark:text-emerald-400">4.</span>
                            <span><strong>Generate Dokumen:</strong> Dokumen langsung siap dicetak (PDF) atau diunduh format Microsoft Word (.doc).</span>
                        </li>
                    </ol>
                </div>

                <!-- Card 3 -->
                <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700 rounded-2xl p-6 shadow-md dark:shadow-xl">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-cyan-50 dark:bg-cyan-500/20 text-cyan-700 dark:text-cyan-400 border border-cyan-200 dark:border-transparent flex items-center justify-center text-lg">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-white text-base">Ketentuan Waktu & Pelaporan</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Kewajiban Setelah Pelaksanaan Tugas</p>
                        </div>
                    </div>
                    <ul class="text-xs text-slate-600 dark:text-slate-300 space-y-2.5">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-info-circle text-cyan-600 dark:text-cyan-400 mt-0.5"></i>
                            <span>Durasi hari pelaksanaan dihitung inklusif sejak hari keberangkatan hingga hari kembali.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-info-circle text-cyan-600 dark:text-cyan-400 mt-0.5"></i>
                            <span>Laporan pelaksanaan tugas wajib disampaikan kepada pejabat pemberi tugas selambat-lambatnya <strong>3 (tiga) hari kerja</strong> setelah pelaksanaan.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-info-circle text-cyan-600 dark:text-cyan-400 mt-0.5"></i>
                            <span>SPPD rampung beserta bukti kuitansi transportasi & akomodasi diserahkan ke Bendahara Pengeluaran Setda.</span>
                        </li>
                    </ul>
                </div>

                <!-- Card 4 -->
                <div class="bg-white dark:bg-slate-800/90 border border-slate-200 dark:border-slate-700 rounded-2xl p-6 shadow-md dark:shadow-xl">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-transparent flex items-center justify-center text-lg">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-white text-base">Layanan Bantuan & Dukungan Teknis</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Bagian Umum & IT Command Center</p>
                        </div>
                    </div>
                    <div class="text-xs text-slate-600 dark:text-slate-300 space-y-2">
                        <p>Jika mengalami kendala penomoran atau membutuhkan perubahan pejabat otorisasi khusus:</p>
                        <div class="p-3 bg-slate-50 dark:bg-slate-900/80 rounded-xl border border-slate-200 dark:border-slate-700 space-y-1.5 font-mono text-slate-700 dark:text-slate-300">
                            <div><i class="fas fa-building text-amber-600 dark:text-amber-400 mr-2"></i>Bagian Umum & Kepegawaian Setda Jeneponto</div>
                            <div><i class="fas fa-location-dot text-amber-600 dark:text-amber-400 mr-2"></i>Kantor Bupati Jeneponto Lt. 2</div>
                            <div><i class="fas fa-phone text-amber-600 dark:text-amber-400 mr-2"></i>(0419) 21001 &bull; Ext: 104</div>
                            <div><i class="fas fa-envelope text-amber-600 dark:text-amber-400 mr-2"></i>setda@jenepontokab.go.id</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script>
    // Tab switching
    function switchTab(tabName) {
        document.querySelectorAll('.tab-pane').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('bg-teal-600', 'text-white', 'shadow-lg', 'shadow-teal-600/30');
            el.classList.add('bg-white', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300', 'border', 'border-slate-300', 'dark:border-slate-700');
        });

        const activePane = document.getElementById('tab-content-' + tabName);
        const activeBtn = document.getElementById('tab-btn-' + tabName);
        if (activePane) activePane.classList.remove('hidden');
        if (activeBtn) {
            activeBtn.classList.remove('bg-white', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300', 'border', 'border-slate-300', 'dark:border-slate-700');
            activeBtn.classList.add('bg-teal-600', 'text-white', 'shadow-lg', 'shadow-teal-600/30');
        }
    }

    // Check initial tab from URL
    const initialTab = "{{ $tab }}";
    if (initialTab && ['buat', 'riwayat', 'panduan'].includes(initialTab)) {
        switchTab(initialTab);
    }

    // Append dasar template
    function appendDasar(text) {
        const textarea = document.getElementById('dasar_surat');
        if (textarea.value.trim() === '') {
            textarea.value = text;
        } else {
            textarea.value += '\n' + text;
        }
    }

    // Set maksud template
    function setMaksud(text) {
        const textarea = document.getElementById('maksud_tugas');
        textarea.value = text;
        updateLivePreview();
    }

    // Set tempat tujuan
    function setTempat(text) {
        const input = document.getElementById('tempat_tujuan');
        input.value = text;
        updateLivePreview();
    }

    // Toggle SPD Fields
    function toggleSpdFields(checked) {
        const spdFields = document.getElementById('spd_fields');
        if (checked) {
            spdFields.classList.remove('hidden');
        } else {
            spdFields.classList.add('hidden');
        }
    }

    // Pejabat Presets
    const pejabatPresets = {
        setda: {
            jabatan: "a.n. BUPATI JENEPONTO\nSEKRETARIS DAERAH KABUPATEN JENEPONTO",
            nama: "H. MUHAMMAD ARIFIN NUR, S.H., M.H.",
            nip: "19680315 199403 1 008",
            pangkat: "Pembina Utama Madya (IV/d)"
        },
        asisten1: {
            jabatan: "a.n. SEKRETARIS DAERAH KABUPATEN JENEPONTO\nASISTEN PEMERINTAHAN DAN KESRA",
            nama: "MUSTAKBIRIN, S.Sos., M.AP.",
            nip: "19720418 199803 1 007",
            pangkat: "Pembina Utama Muda (IV/c)"
        },
        asisten2: {
            jabatan: "a.n. SEKRETARIS DAERAH KABUPATEN JENEPONTO\nASISTEN PEREKONOMIAN DAN PEMBANGUNAN",
            nama: "IR. H. NUR ALIM, M.Si.",
            nip: "19700812 199602 1 003",
            pangkat: "Pembina Utama Muda (IV/c)"
        },
        asisten3: {
            jabatan: "a.n. SEKRETARIS DAERAH KABUPATEN JENEPONTO\nASISTEN ADMINISTRASI UMUM",
            nama: "DRS. H. BASIR B., M.Pd.",
            nip: "19691120 199501 1 002",
            pangkat: "Pembina Utama Muda (IV/c)"
        }
    };

    function applyPejabatPreset(key) {
        if (pejabatPresets[key]) {
            const data = pejabatPresets[key];
            document.getElementById('pejabat_jabatan').value = data.jabatan;
            document.getElementById('pejabat_nama').value = data.nama;
            document.getElementById('pejabat_nip').value = data.nip;
            document.getElementById('pejabat_pangkat').value = data.pangkat;
        }
    }

    // Live Date, Day Name & Duration calculation
    const hariIndo = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const bulanIndo = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    function updateLivePreview() {
        const tglMulaiVal = document.getElementById('tanggal_mulai').value;
        const tglSelesaiVal = document.getElementById('tanggal_selesai').value;
        const maksudVal = document.getElementById('maksud_tugas').value;
        const tempatVal = document.getElementById('tempat_tujuan').value;

        if (tglMulaiVal && tglSelesaiVal) {
            const d1 = new Date(tglMulaiVal);
            const d2 = new Date(tglSelesaiVal);

            const diffTime = d2.getTime() - d1.getTime();
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
            const validDays = diffDays > 0 ? diffDays : 1;

            document.getElementById('durasi_badge').textContent = validDays + ' Hari';
            document.getElementById('preview_durasi').textContent = validDays + ' hari';

            let tglFormatted = '';
            if (tglMulaiVal === tglSelesaiVal) {
                tglFormatted = `${hariIndo[d1.getDay()]}, ${d1.getDate()} ${bulanIndo[d1.getMonth()]} ${d1.getFullYear()}`;
            } else if (d1.getMonth() === d2.getMonth() && d1.getFullYear() === d2.getFullYear()) {
                tglFormatted = `${hariIndo[d1.getDay()]} s.d. ${hariIndo[d2.getDay()]}, ${d1.getDate()} s.d. ${d2.getDate()} ${bulanIndo[d1.getMonth()]} ${d1.getFullYear()}`;
            } else {
                tglFormatted = `${hariIndo[d1.getDay()]} (${d1.getDate()} ${bulanIndo[d1.getMonth()]} ${d1.getFullYear()}) s.d. ${hariIndo[d2.getDay()]} (${d2.getDate()} ${bulanIndo[d2.getMonth()]} ${d2.getFullYear()})`;
            }

            document.getElementById('preview_tanggal').textContent = tglFormatted;
        }

        if (maksudVal && maksudVal.trim() !== '') {
            document.getElementById('preview_maksud').textContent = maksudVal;
            document.getElementById('preview_maksud').classList.remove('italic', 'text-slate-400');
        } else {
            document.getElementById('preview_maksud').textContent = '[Belum diisi - masukkan uraian tugas di atas]';
            document.getElementById('preview_maksud').classList.add('italic', 'text-slate-400');
        }

        if (tempatVal && tempatVal.trim() !== '') {
            document.getElementById('preview_tempat').textContent = tempatVal;
            document.getElementById('preview_tempat').classList.remove('italic', 'text-slate-400');
        } else {
            document.getElementById('preview_tempat').textContent = '[Belum diisi - masukkan lokasi tujuan]';
            document.getElementById('preview_tempat').classList.add('italic', 'text-slate-400');
        }
    }

    document.getElementById('tanggal_mulai').addEventListener('change', updateLivePreview);
    document.getElementById('tanggal_selesai').addEventListener('change', updateLivePreview);
    document.getElementById('maksud_tugas').addEventListener('input', updateLivePreview);
    document.getElementById('tempat_tujuan').addEventListener('input', updateLivePreview);

    // Initial preview trigger
    updateLivePreview();

    // Autocomplete Pegawai Search
    const searchInput = document.getElementById('pegawai_search_input');
    const dropdown = document.getElementById('pegawai_dropdown');

    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const q = this.value.trim();
        if (q.length < 2) {
            dropdown.innerHTML = '';
            dropdown.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`{{ route('user.surat-tugas.search-pegawai') }}?q=${encodeURIComponent(q)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        dropdown.innerHTML = `<div class="p-3 text-xs text-slate-500 dark:text-slate-400">Pegawai tidak ditemukan. Anda dapat mengisi form di bawah secara manual.</div>`;
                    } else {
                        let html = '';
                        data.forEach(peg => {
                            html += `
                                <div class="p-3 hover:bg-slate-100 dark:hover:bg-slate-800 cursor-pointer transition flex items-center justify-between"
                                     onclick='selectPegawai(${JSON.stringify(peg)})'>
                                    <div>
                                        <div class="font-semibold text-slate-900 dark:text-white text-xs">${peg.nama}</div>
                                        <div class="text-[11px] text-slate-500 dark:text-slate-400">${peg.jabatan || '-'}</div>
                                    </div>
                                    <span class="text-[10px] px-2 py-0.5 rounded bg-teal-50 dark:bg-teal-950 text-teal-700 dark:text-teal-400 border border-teal-200 dark:border-teal-800 font-mono">${peg.nip || 'Non-ASN'}</span>
                                </div>
                            `;
                        });
                        dropdown.innerHTML = html;
                    }
                    dropdown.classList.remove('hidden');
                })
                .catch(err => console.error(err));
        }, 250);
    });

    function selectPegawai(peg) {
        document.getElementById('pegawai_id').value = peg.id || '';
        document.getElementById('nama_pegawai').value = peg.nama || '';
        document.getElementById('nip_pegawai').value = peg.nip || '';
        document.getElementById('jabatan_pegawai').value = peg.jabatan || '';
        dropdown.classList.add('hidden');
        searchInput.value = peg.nama;
    }

    // Close dropdown on outer click
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
@endpush
@endsection
