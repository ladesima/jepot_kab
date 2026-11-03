<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi - Kabupaten Jeneponto</title>

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

<body class="bg-white text-gray-800">

    @include('./layouts.navbar')
    <main>
        <section class="bg-gray-100 py-6">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-slate-800">Visi dan Misi</h1>
                <nav class="text-sm font-medium">
                    <a href="#" class="text-blue-600 hover:underline">Pemerintahan</a>
                    <span class="mx-2 text-gray-500">/</span>
                    <span class="text-gray-500">Visi dan Misi</span>
                </nav>
            </div>
        </section>

        <section class="container mx-auto px-6 py-16">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-16">
                    <h2 class="text-4xl font-bold text-slate-800 mb-4">Visi</h2>
                    <p class="text-lg text-gray-600">JENEPONTO BAHAGIA 2030</p>
                    <p class="text-red-600 font-semibold mt-2 text-lg">Berkelanjutan, Tangguh, Berdayasaing, Religius, Inklusif dan Melaju.</p>
                </div>

                <div>
                    <h2 class="text-4xl font-bold text-slate-800 mb-8">Misi</h2>
                    <ol class="text-left text-lg text-gray-700 space-y-4 max-w-3xl mx-auto">
                        <li class="flex">
                            <span class="mr-3 font-semibold">1.</span>
                            <span>Mengakselerasi Peningkatan Kualitas Hidup Masyarakat Secara Inklusif.</span>
                        </li>
                        <li class="flex">
                            <span class="mr-3 font-semibold">2.</span>
                            <span>Mengakselerasi Penguatan Ekonomi Daerah Berbasis Potensi Strategik secara transformative, Inovatif, Produktif dan Berkelanjutan.</span>
                        </li>
                        <li class="flex">
                            <span class="mr-3 font-semibold">3.</span>
                            <span>MMengakselerasi Penguatan Kolaborasi dan Tata Kelola Pemerintahan yang Berintegritas dan Melayani.</span>
                        </li>
                        <li class="flex">
                            <span class="mr-3 font-semibold">4.</span>
                            <span>Meningkatkan Pembangunan Infrastruktur yang Berkualitas dan Berwawasan Lingkungan.</span>
                        </li>
                        <li class="flex">
                            <span class="mr-3 font-semibold">5.</span>
                            <span>Memperkuat Ketahanan Sosial Budaya dan Kualitas Lingkungan Hidup</span>
                        </li>
                        <li class="flex">
                            <span class="mr-3 font-semibold">6.</span>
                            <span>Meningkatkan Keamanan, Ketentraman, Ketertiban dan religiusitas Kehidupan Masyarakat.</span>
                        </li>
                        <li class="flex">
                            <span class="mr-3 font-semibold">7.</span>
                            <span>Meningkatkan Sinergitas Pembangunan Wilayah dan Daya saing Daerah</span>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-slate-800 text-white pt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <div class="col-span-1 lg:col-span-1">
                    <h3 class="text-xl font-bold mb-4">Diskominfo</h3>
                    <p class="text-gray-400 text-sm">Jl. Lanto Dg. Pasewang No. 8, Jeneponto</p>
                    <p class="text-gray-400 text-sm">diskominfo@jenepontokab.go.id</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Navigasi</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">> Beranda</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">>
                                Pemerintahan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">> Profil</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">> Berita</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">> Galeri</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Layanan</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">> Kinerja</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">>
                                Transparansi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">>
                                Perencanaan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">> Layanan
                                Public</a></li>
                    </ul>
                </div>
                <div class="text-2xl font-bold">
                    PPID JENEPONTO
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-6 text-center text-xs text-gray-500">
                <p>© Copyright Kab. Jeneponto. All Rights Reserved</p>
                <p>Designed by DISKOMINFO</p>
            </div>
        </div>
    </footer>

    <button
        class="fixed bottom-8 right-8 bg-purple-600 hover:bg-purple-700 text-white w-14 h-14 rounded-full shadow-lg flex items-center justify-center transition-all">
        <i class="fas fa-comment-dots fa-2x"></i>
    </button>
    <button
        class="fixed bottom-28 right-8 bg-blue-600 hover:bg-blue-700 text-white w-14 h-14 rounded-full shadow-lg flex items-center justify-center transition-all">
        <i class="fas fa-robot fa-2x"></i>
    </button>

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
