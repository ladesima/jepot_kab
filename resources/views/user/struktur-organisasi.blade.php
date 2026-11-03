<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - Pemerintah Kabupaten Jeneponto</title>

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

        /* Custom Org Chart Tree Connectors */
        .tree-line-v {
            width: 2.5px;
            background-color: #64748b;
            margin: 0 auto;
        }

        .tree-line-h {
            height: 2.5px;
            background-color: #64748b;
        }

        .chart-box-primary {
            background: linear-gradient(135deg, #5b9bd5, #41719c);
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 0.05em;
            box-shadow: 0 8px 20px -4px rgba(65, 113, 156, 0.35);
            transition: all 0.3s ease;
        }

        .chart-box-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 25px -4px rgba(65, 113, 156, 0.5);
        }

        .chart-box-sub {
            background: linear-gradient(135deg, #5b9bd5, #41719c);
            color: #ffffff;
            font-weight: 700;
            box-shadow: 0 6px 16px -3px rgba(65, 113, 156, 0.3);
            transition: all 0.3s ease;
        }

        .chart-box-sub:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px -3px rgba(65, 113, 156, 0.45);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

@include('layouts.navbar')

<main class="py-14">

<div class="container mx-auto px-4 sm:px-6 max-w-7xl">

    <!-- HEADER / BREADCRUMB -->
    <div class="text-center mb-12 reveal">
        <span class="inline-block px-4 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold uppercase tracking-wider mb-3">
            Pemerintah Kabupaten Jeneponto
        </span>
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight uppercase">
            Struktur Perangkat Daerah
        </h1>
        <p class="text-xl md:text-2xl font-bold text-slate-700 tracking-wide mt-1 uppercase">
            Pemerintah Kabupaten Jeneponto
        </p>
        <p class="text-sm md:text-base text-gray-500 max-w-2xl mx-auto mt-3">
            Bagan tata hubungan kerja dan hierarki organisasi perangkat daerah di lingkungan Pemerintah Kabupaten Jeneponto.
        </p>
    </div>

    <!-- ORGANOGRAM CHART CONTAINER -->
    <div class="bg-white rounded-3xl shadow-xl p-6 sm:p-10 md:p-12 border border-gray-100 reveal overflow-x-auto">

        <div class="min-w-[850px] max-w-6xl mx-auto">

            <!-- LEVEL 1: BUPATI -->
            <div class="flex justify-center">
                <a href="{{ route('user.bupati') }}"
                   class="chart-box-primary w-full max-w-md py-4 px-6 rounded-xl text-center text-base md:text-lg uppercase block">
                    Bupati Kabupaten Jeneponto
                </a>
            </div>

            <!-- CONNECTOR LEVEL 1 -> 2 -->
            <div class="tree-line-v h-7"></div>

            <!-- LEVEL 2: WAKIL BUPATI -->
            <div class="flex justify-center">
                <a href="{{ route('user.wakil-bupati') }}"
                   class="chart-box-primary w-full max-w-md py-4 px-6 rounded-xl text-center text-base md:text-lg uppercase block">
                    Wakil Bupati Kabupaten Jeneponto
                </a>
            </div>

            <!-- CONNECTOR LEVEL 2 -> 3 (Stem Down) -->
            <div class="tree-line-v h-8"></div>

            <!-- BRANCH LINE FOR LEVEL 3 -->
            <div class="relative w-5/6 mx-auto">
                <div class="tree-line-h w-full"></div>
                <!-- 3 Drop Lines to Level 3 Boxes -->
                <div class="absolute -top-0 left-0 w-[2.5px] h-7 bg-slate-500"></div>
                <div class="absolute -top-0 left-1/2 -translate-x-1/2 w-[2.5px] h-7 bg-slate-500"></div>
                <div class="absolute -top-0 right-0 w-[2.5px] h-7 bg-slate-500"></div>
            </div>

            <!-- LEVEL 3: INSPEKTORAT, SEKDA, SEKWAN -->
            <div class="pt-7 grid grid-cols-3 gap-6 w-full max-w-5xl mx-auto">

                <!-- INSPEKTORAT DAERAH -->
                <div class="flex justify-center">
                    <div class="chart-box-sub w-full py-3.5 px-4 rounded-xl text-center text-sm md:text-base uppercase flex items-center justify-center">
                        Inspektorat Daerah
                    </div>
                </div>

                <!-- SEKRETARIAT DAERAH -->
                <div class="flex justify-center">
                    <a href="{{ route('user.sekretaris-daerah') }}"
                       class="chart-box-sub w-full py-3.5 px-4 rounded-xl text-center text-sm md:text-base uppercase flex items-center justify-center hover:opacity-95">
                        Sekretariat Daerah
                    </a>
                </div>

                <!-- SEKRETARIAT DPRD -->
                <div class="flex justify-center">
                    <div class="chart-box-sub w-full py-3.5 px-4 rounded-xl text-center text-sm md:text-base uppercase flex items-center justify-center">
                        Sekretariat DPRD
                    </div>
                </div>

            </div>

            <!-- CONNECTOR LEVEL 3 -> LEVEL 4 (Branching to 3 Columns) -->
            <div class="pt-6 pb-6">
                <div class="tree-line-v h-8"></div>
                <div class="relative w-full">
                    <div class="tree-line-h w-full"></div>
                    <!-- 3 Drop Lines to the 3 columns -->
                    <div class="absolute -top-0 left-[16.6%] w-[2.5px] h-7 bg-slate-500"></div>
                    <div class="absolute -top-0 left-1/2 -translate-x-1/2 w-[2.5px] h-7 bg-slate-500"></div>
                    <div class="absolute -top-0 right-[16.6%] w-[2.5px] h-7 bg-slate-500"></div>
                </div>
            </div>

            <!-- LEVEL 4: BADAN, DINAS, KECAMATAN -->
            <div class="pt-5 grid grid-cols-12 gap-6 items-start">

                <!-- ================= 1. BADAN (Col 1 - 3 cols) ================= -->
                <div class="col-span-3 flex flex-col rounded-2xl shadow-sm border border-slate-200 overflow-hidden bg-white hover:shadow-md transition">
                    <!-- HEADER -->
                    <div class="chart-box-sub py-3 px-4 text-center text-base uppercase font-bold tracking-wider">
                        Badan
                    </div>
                    <!-- CONTENT -->
                    <div class="p-5 bg-slate-50/70 text-slate-700 text-xs md:text-[13px] leading-relaxed flex-grow">
                        <ol class="space-y-3 pl-1 list-none">
                            <li class="flex items-start gap-2">
                                <span class="font-bold text-slate-500 min-w-[14px]">1.</span>
                                <span>Badan Perencanaan Pembangunan, Riset dan Inovasi Daerah</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold text-slate-500 min-w-[14px]">2.</span>
                                <span>Badan Keuangan dan Aset Daerah</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold text-slate-500 min-w-[14px]">3.</span>
                                <span>Badan Pendapatan Daerah</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold text-slate-500 min-w-[14px]">4.</span>
                                <span>Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold text-slate-500 min-w-[14px]">5.</span>
                                <span>Badan Penanggulangan Bencana Daerah</span>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- ================= 2. DINAS (Col 2 - 6 cols) ================= -->
                <div class="col-span-6 flex flex-col rounded-2xl shadow-sm border border-slate-200 overflow-hidden bg-white hover:shadow-md transition">
                    <!-- HEADER -->
                    <div class="chart-box-sub py-3 px-4 text-center text-base uppercase font-bold tracking-wider">
                        Dinas
                    </div>
                    <!-- CONTENT (2 Sub-Columns) -->
                    <div class="p-5 bg-slate-50/70 text-slate-700 text-xs md:text-[13px] leading-relaxed flex-grow">
                        <div class="grid grid-cols-2 gap-4">

                            <!-- Sub-Col 1 (1 - 11) -->
                            <ol class="space-y-2.5 list-none">
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">1.</span>
                                    <span>Dinas Pendidikan dan Kebudayaan</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">2.</span>
                                    <span>Dinas Kesehatan</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">3.</span>
                                    <span>Dinas Pekerjaan Umum dan Penataan Ruang</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">4.</span>
                                    <span>Dinas Perumahan Rakyat dan Kawasan Permukiman dan Pertanahan</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">5.</span>
                                    <span>Dinas Polisi Pamong Praja</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">6.</span>
                                    <span>Dinas Pemadam Kebakaran dan Penyelamatan</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">7.</span>
                                    <span>Dinas Sosial</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">8.</span>
                                    <span>Dinas Tenaga Kerja & Transmigrasi</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">9.</span>
                                    <span>Dinas Pengendalian Penduduk dan Keluarga Berencana</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">10.</span>
                                    <span>Dinas Ketahanan Pangan</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">11.</span>
                                    <span>Dinas Lingkungan Hidup</span>
                                </li>
                            </ol>

                            <!-- Sub-Col 2 (12 - 22) -->
                            <ol class="space-y-2.5 list-none">
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">12.</span>
                                    <span>Dinas Kependudukan dan Pencatatan Sipil</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">13.</span>
                                    <span>Dinas Pemberdayaan Masyarakat dan Desa</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">14.</span>
                                    <span>Dinas Perhubungan</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">15.</span>
                                    <span>Dinas Komunikasi, Informatika dan Statistik</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">16.</span>
                                    <span>Dinas Koperasi, Usaha Kecil, dan Menengah</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">17.</span>
                                    <span>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">18.</span>
                                    <span>Dinas Kepemudaan dan Olahraga</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">19.</span>
                                    <span>Dinas Perpustakaan dan Kearsipan</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">20.</span>
                                    <span>Dinas Kelautan dan Perikanan</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">21.</span>
                                    <span>Dinas Pariwisata</span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="font-bold text-slate-500 min-w-[18px]">22.</span>
                                    <span>Dinas Pertanian</span>
                                </li>
                            </ol>

                        </div>
                    </div>
                </div>

                <!-- ================= 3. KECAMATAN (Col 3 - 3 cols) ================= -->
                <div class="col-span-3 flex flex-col rounded-2xl shadow-sm border border-slate-200 overflow-hidden bg-white hover:shadow-md transition">
                    <!-- HEADER -->
                    <div class="chart-box-sub py-3 px-4 text-center text-base uppercase font-bold tracking-wider">
                        Kecamatan
                    </div>
                    <!-- CONTENT -->
                    <div class="p-5 bg-slate-50/70 text-slate-700 text-xs md:text-[13px] leading-relaxed flex-grow">
                        <ol class="space-y-2.5 pl-1 list-none">
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">1.</span>
                                <span>Kecamatan Arungkeke</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">2.</span>
                                <span>Kecamatan Bangkala</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">3.</span>
                                <span>Kecamatan Bangkala Barat</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">4.</span>
                                <span>Kecamatan Batang</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">5.</span>
                                <span>Kecamatan Binamu</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">6.</span>
                                <span>Kecamatan Bontoramba</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">7.</span>
                                <span>Kecamatan Kelara</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">8.</span>
                                <span>Kecamatan Rumbia</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">9.</span>
                                <span>Kecamatan Tamalatea</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">10.</span>
                                <span>Kecamatan Tarowang</span>
                            </li>
                            <li class="flex items-start gap-1.5">
                                <span class="font-bold text-slate-500 min-w-[18px]">11.</span>
                                <span>Kecamatan Turatea</span>
                            </li>
                        </ol>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

</main>

@include('layouts.footer')

</body>
</html>
