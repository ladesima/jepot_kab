<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik - Kabupaten Jeneponto</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    @include('layouts.navbar')

    <main>
        <section class="bg-white py-6 border-b">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-slate-800">Data Statistik</h1>
                <nav class="text-sm font-medium">
                    <a href="#" class="hover:underline text-blue-600">Profil Daerah</a>
                    <span class="mx-2 text-gray-500">/</span>
                    <span class="text-gray-700">Data Statistik</span>
                </nav>
            </div>
        </section>

        <section class="container mx-auto px-6 py-12 md:py-16">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
                    <div class="bg-blue-100 p-4 rounded-full">
                        <i class="fas fa-users text-3xl text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Jumlah Penduduk</p>
                        <p class="text-2xl font-bold text-slate-800">415.789 Jiwa</p>
                        <p class="text-xs text-gray-400">Data BPS 2024</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
                    <div class="bg-green-100 p-4 rounded-full">
                        <i class="fas fa-chart-line text-3xl text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Pertumbuhan Ekonomi</p>
                        <p class="text-2xl font-bold text-slate-800">4.85%</p>
                        <p class="text-xs text-gray-400">Tahun 2024</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
                    <div class="bg-yellow-100 p-4 rounded-full">
                        <i class="fas fa-graduation-cap text-3xl text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Indeks Pembangunan Manusia</p>
                        <p class="text-2xl font-bold text-slate-800">65.30</p>
                        <p class="text-xs text-gray-400">Poin (Kategori Sedang)</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-user-friends text-3xl text-blue-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Demografi</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Kepadatan Penduduk</span>
                            <span class="font-bold">555 Jiwa/km²</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Laki-laki</span>
                            <span class="font-bold">207.150 Jiwa</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Perempuan</span>
                            <span class="font-bold">208.639 Jiwa</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Kepala Keluarga</span>
                            <span class="font-bold">110.530 KK</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-school text-3xl text-yellow-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Pendidikan</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Angka Melek Huruf</span>
                            <span class="font-bold">96.7%</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Jumlah Sekolah (SD/MI)</span>
                            <span class="font-bold">350 Unit</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Jumlah Sekolah (SMP/MTs)</span>
                            <span class="font-bold">85 Unit</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Sekolah (SMA/SMK/MA)</span>
                            <span class="font-bold">42 Unit</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-heartbeat text-3xl text-red-500 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Kesehatan</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Angka Harapan Hidup</span>
                            <span class="font-bold">69.5 Tahun</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Jumlah Rumah Sakit</span>
                            <span class="font-bold">2 Unit</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Jumlah Puskesmas</span>
                            <span class="font-bold">16 Unit</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Tenaga Medis</span>
                            <span class="font-bold">850 Orang</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-seedling text-3xl text-green-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Ekonomi & Pertanian</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">PDRB (Atas Dasar Harga Berlaku)</span>
                            <span class="font-bold">12,5 Triliun Rupiah</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Produksi Garam</span>
                            <span class="font-bold">120.000 Ton/Tahun</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Produksi Jagung</span>
                            <span class="font-bold">180.000 Ton/Tahun</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tingkat Pengangguran Terbuka</span>
                            <span class="font-bold">5.2%</span>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>


    @include('layouts.footer')



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
