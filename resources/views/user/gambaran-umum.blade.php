<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gambaran Umum - Diskominfo Kabupaten Jeneponto</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/theme-dark-light.css') }}">
    <link rel="stylesheet" href="{{ asset('css/interactive-animations.css') }}">
    <script src="{{ asset('js/interactive-animations.js') }}" defer></script>

    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    @include('layouts.navbar');
    <main>

    <!-- HEADER -->
    <section class="bg-white py-6 border-b">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-slate-800">Geografi Kabupaten Jeneponto</h1>
            <nav class="text-sm font-medium">
                <span class="text-gray-700">Profil</span>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-blue-600">Geografi</span>
            </nav>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="container mx-auto px-6 py-12">

        <!-- TAB -->
        <div class="mb-10 flex flex-wrap gap-2 sm:gap-4 border-b">
            <button onclick="showTab('geografi')" id="tab-geografi"
                class="px-5 py-2.5 font-semibold text-blue-600 border-b-2 border-blue-600 transition">
                Geografi
            </button>
            <button onclick="showTab('geologi')" id="tab-geologi"
                class="px-5 py-2.5 font-semibold text-gray-500 hover:text-blue-600 transition">
                Geologi & Jenis Tanah
            </button>
            <button onclick="showTab('pemerintahan')" id="tab-pemerintahan"
                class="px-5 py-2.5 font-semibold text-gray-500 hover:text-blue-600 transition">
                Ruang Lingkup Pemerintahan
            </button>
        </div>

        <!-- ================= TAB GEOGRAFI ================= -->
        <div id="content-geografi" class="space-y-6">

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                <h3 class="font-bold text-lg text-slate-700 mb-3">Luas Wilayah</h3>
                <p class="text-gray-700 leading-relaxed">
                    Luas wilayah Kabupaten Jeneponto tercatat <strong>749,79 km²</strong>
                    yang meliputi 11 Kecamatan. Terletak antara 5°16’13” – 5°39’34”
                    Lintang Selatan dan 12°40’19” – 12°7’31” Bujur Timur.
                    Berbatasan dengan Kabupaten Gowa dan Takalar di Utara,
                    Kabupaten Bantaeng di Timur, Kabupaten Takalar di Barat,
                    dan Laut Flores di Selatan.
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                <h3 class="font-bold text-lg text-slate-700 mb-3">Panjang Garis Pantai</h3>
                <p class="text-gray-700">Sekitar <strong>114 km</strong>.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                <h3 class="font-bold text-lg text-slate-700 mb-3">Letak Geografis</h3>
                <p class="text-gray-700">
                    5°16’13” – 5°39’35” Lintang Selatan / South Latitude<br>
                    12°40’19” – 119°56’44,9” Bujur Timur / East Longitude
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                <h3 class="font-bold text-lg text-slate-700 mb-3">Perairan</h3>
                <p class="text-gray-700 leading-relaxed">
                    Kabupaten Jeneponto memiliki beberapa sungai (hidrologi)
                    seperti Kelara, Tino, dan Poko Bulo yang telah berfungsi
                    untuk mengairi sebagian lahan persawahan.
                    Wilayah Selatan berbatasan langsung dengan Laut Flores.
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                <h3 class="font-bold text-lg text-slate-700 mb-3">Batas Wilayah</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Utara – Kabupaten Gowa dan Takalar</li>
                    <li>Timur – Kabupaten Bantaeng</li>
                    <li>Barat – Kabupaten Takalar</li>
                    <li>Selatan – Laut Flores</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                <h3 class="font-bold text-lg text-slate-700 mb-3">Topografi</h3>
                <p class="text-gray-700 leading-relaxed">
                    Wilayah Utara terdiri dari dataran tinggi (500–1400 mdpl),
                    bagian tengah 100–500 mdpl, dan bagian Selatan 0–150 mdpl.
                    Sebagian wilayah Barat berupa pegunungan dengan kemiringan
                    rata-rata di atas 40°.
                </p>
            </div>

        </div>

        <!-- ================= TAB GEOLOGI ================= -->
        <div id="content-geologi" class="hidden space-y-6">

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                <h3 class="font-bold text-lg text-slate-700 mb-3">Struktur Geologi</h3>
                <p class="text-gray-700 leading-relaxed">
                    Struktur geologi Kabupaten Jeneponto didominasi oleh
                    dataran tinggi di bagian Utara, dataran menengah di tengah,
                    dan dataran rendah di Selatan.
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
                <h3 class="font-bold text-lg text-slate-700 mb-3">Jenis Tanah</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Tanah Alluvial – Kecamatan Bangkala, Binamu, Tamalatea</li>
                    <li>Tanah Grumosol – Tamalatea, Binamu, Bangkala, Batang</li>
                    <li>Tanah Mediteran – Bangkala, Batang, Kelara, Binamu</li>
                    <li>Tanah Latosol – Bangkala, Tamalatea, Kelara</li>
                    <li>Tanah Andosol – Kelara</li>
                    <li>Tanah Regosol – Beberapa kecamatan lainnya</li>
                </ul>
            </div>

        </div>

        <!-- ================= TAB RUANG LINGKUP PEMERINTAHAN ================= -->
        <div id="content-pemerintahan" class="hidden space-y-6">

            <!-- KEDUDUKAN & 11 KECAMATAN -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3 class="font-bold text-xl text-slate-800">Kedudukan & Wilayah Kerja</h3>
                </div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Pemerintah Kabupaten Jeneponto Berkedudukan di <strong>Kabupaten Jeneponto, Provinsi Sulawesi Selatan</strong>, dengan wilayah <strong>11 Kecamatan</strong>:
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    @php
                        $listKec = [
                            'Kecamatan Arungkeke', 'Kecamatan Bangkala', 'Kecamatan Bangkala Barat',
                            'Kecamatan Batang', 'Kecamatan Binamu', 'Kecamatan Bontoramba',
                            'Kecamatan Kelara', 'Kecamatan Rumbia', 'Kecamatan Tamalatea',
                            'Kecamatan Tarowang', 'Kecamatan Turatea'
                        ];
                    @endphp
                    @foreach($listKec as $index => $namaKec)
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 border border-slate-200/80">
                            <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center shrink-0">
                                {{ $index + 1 }}
                            </span>
                            <span class="text-sm font-semibold text-slate-700">
                                {{ $namaKec }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- SEKRETARIAT DAERAH & PPID UTAMA -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- SEKRETARIAT DAERAH -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-lg">
                                <i class="fas fa-landmark"></i>
                            </div>
                            <h3 class="font-bold text-xl text-slate-800">Sekretariat Daerah</h3>
                        </div>
                        <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-200/60 text-sm text-slate-700 leading-relaxed mb-4">
                            <div class="flex items-start gap-2.5">
                                <i class="fas fa-map-marker-alt text-amber-600 mt-1 shrink-0"></i>
                                <div>
                                    <strong class="text-slate-800 block mb-1">Alamat Kantor:</strong>
                                    Jl. Lanto Daeng Pasewang No. 34, Kelurahan Empoang, Kecamatan Binamu (kawasan Bontosunggu), Kabupaten Jeneponto, Sulawesi Selatan 92311.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 border-t border-gray-100 text-right">
                        <a href="{{ route('user.sekretaris-daerah') }}" class="text-sm font-semibold text-amber-600 hover:text-amber-700 inline-flex items-center gap-1.5">
                            Lihat Profil Sekda <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- PPID UTAMA -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-lg">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <h3 class="font-bold text-xl text-slate-800">PPID Utama Kabupaten Jeneponto</h3>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed mb-3">
                            Pejabat Pengelola Informasi dan Dokumentasi (PPID) Utama Kabupaten Jeneponto berkedudukan di bawah <strong>Dinas Komunikasi, Informatika, dan Statistik Kabupaten Jeneponto</strong>.
                        </p>
                        <p class="text-xs text-gray-600 bg-slate-50 p-3 rounded-lg border border-slate-200 mb-4 leading-relaxed">
                            <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                            PPID Utama melekat pada bidang kehumasan / informasi komunikasi publik di Dinas Komunikasi, Informatika, dan Statistik Kabupaten Jeneponto.
                        </p>
                        <div class="p-4 rounded-xl bg-emerald-50/70 border border-emerald-200/60 text-sm text-slate-700 leading-relaxed mb-4">
                            <div class="flex items-start gap-2.5">
                                <i class="fas fa-map-marker-alt text-emerald-600 mt-1 shrink-0"></i>
                                <div>
                                    <strong class="text-slate-800 block mb-1">Sekretariat PPID Utama:</strong>
                                    Jl. Lanto Dg. Pasewang No. 08, Bontosungguh, Kecamatan Binamu, Kabupaten Jeneponto, Sulawesi Selatan, Kode Pos 92311.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 border-t border-gray-100 text-right">
                        <a href="{{ Route::has('user.ppid') ? route('user.ppid') : url('/ppid') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 inline-flex items-center gap-1.5">
                            Portal Layanan PPID <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </section>

</main>

    @include('layouts.footer');
<script>
function showTab(tab) {
    const tabs = ['geografi', 'geologi', 'pemerintahan'];
    tabs.forEach(t => {
        const contentEl = document.getElementById('content-' + t);
        const tabEl = document.getElementById('tab-' + t);
        if (contentEl) contentEl.classList.add('hidden');
        if (tabEl) tabEl.classList.remove('border-b-2', 'border-blue-600', 'text-blue-600');
        if (tabEl) tabEl.classList.add('text-gray-500');
    });

    const activeContent = document.getElementById('content-' + tab);
    const activeTab = document.getElementById('tab-' + tab);
    if (activeContent) activeContent.classList.remove('hidden');
    if (activeTab) {
        activeTab.classList.remove('text-gray-500');
        activeTab.classList.add('border-b-2', 'border-blue-600', 'text-blue-600');
    }
}
</script>

    <script>
        // Menunggu hingga seluruh dokumen HTML selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {

            // Mengambil semua tombol yang akan memicu dropdown
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(event) {
                    // Menghentikan event agar tidak langsung ditangkap oleh 'window'
                    event.stopPropagation();

                    // Menemukan menu dropdown yang sesuai (elemen saudara berikutnya)
                    const dropdownMenu = this.nextElementSibling;

                    // Menutup semua dropdown lain yang mungkin sedang terbuka
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        if (menu !== dropdownMenu) {
                            menu.classList.add('hidden');
                        }
                    });

                    // Membuka atau menutup dropdown yang diklik
                    dropdownMenu.classList.toggle('hidden');
                });
            });

            // 3. Logika untuk Submenu (nested dropdown)
            const submenuToggles = document.querySelectorAll('.submenu-toggle');

            submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', function(event) {
                    // Cegah link berpindah halaman saat diklik
                    event.preventDefault();
                    event.stopPropagation();

                    const submenu = this.nextElementSibling;

                    // Tutup semua submenu lain pada level yang sama
                    const parentMenu = this.closest('.dropdown-menu');
                    parentMenu.querySelectorAll('.submenu').forEach(s => {
                        if (s !== submenu) {
                            s.classList.add('hidden');
                        }
                    });

                    submenu.classList.toggle('hidden');
                });
            });

            window.addEventListener('click', function() {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            });
        });
    </script>

    <script>
        // Toggle menu pada mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>
