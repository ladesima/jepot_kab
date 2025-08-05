<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gambaran Umum - Kabupaten Jeneponto</title>

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

    @include('layouts.navbar');

    <main>
        <section class="bg-white py-6 border-b">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-slate-800">Gambaran Umum</h1>
                <nav class="text-sm font-medium">
                    <a href="#" class="hover:underline text-blue-600">Profil Daerah</a>
                    <span class="mx-2 text-gray-500">/</span>
                    <span class="text-gray-700">Gambaran Umum</span>
                </nav>
            </div>
        </section>

        <section class="container mx-auto px-6 py-12 md:py-16">
            <div class="bg-white p-6 md:p-10 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold text-slate-800 border-b-2 border-blue-500 pb-3 mb-8">Geografi, Geologi dan
                    Jenis Tanah</h2>

                <div class="space-y-8 text-base">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Luas wilayah</div>
                        <div class="w-full md:w-3/4 text-gray-700">Luas Wilayah Kabupaten Jeneponto tercatat 749,79 km²
                            yang meliputi 11 Kecamatan. Kabupaten Jeneponto terletak antara 5°16'13" - 5°39'34" Lintang
                            Selatan dan 112°40'19" - 12°7'13" Bujur Timur. Berbatasan dengan Kabupaten Gowa dan Takalar,
                            di sebelah Utara; Kabupaten Bantaeng di sebelah Timur; Kabupaten Takalar sebelah Barat dan
                            Laut Flores di sebelah Selatan.</div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Panjang garis pantai</div>
                        <div class="w-full md:w-3/4 text-gray-700">sekitar 114 km</div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Letak geografis</div>
                        <div class="w-full md:w-3/4 text-gray-700">
                            <p>5°16'13" - 5°39'34" Lintang Selatan / South Latitude</p>
                            <p>12°40'19" - 119°44,18' Bujur Timur / East Longitude</p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Perairan</div>
                        <div class="w-full md:w-3/4 text-gray-700">Kabupaten Jeneponto memiliki beberapa sungai
                            (Hidrologi) yang sebagian telah dibendung yaitu Kelara, Tina, Poko bulu yang telah berfungsi
                            untuk mengairi sebagaian lahan persawahan. Daerah bagian selatan memiliki perairan laut
                            (Flores) dengan panjang pantai berkisar 114 km.</div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Batas wilayah</div>
                        <div class="w-full md:w-3/4 text-gray-700">
                            <p>Sebelah Utara - Kabupaten Gowa dan Takalar</p>
                            <p>Sebelah Timur - Kabupaten Bantaeng</p>
                            <p>Sebelah Barat - Kabupaten Takalar</p>
                            <p>Sebelah Selatan - Laut Flores</p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/4 font-bold text-slate-600 mb-2 md:mb-0">Topografi</div>
                        <div class="w-full md:w-3/4 text-gray-700 leading-relaxed">Topografi Kabupaten Jeneponto pada
                            bagian Utara terdiri dari dataran tinggi dengan ketinggian 500 sampai dengan 1400 meter
                            diatas permukaan laut, bagian tengah dengan ketinggian 100 sampai dengan 500 meter dan
                            bagian selatan terdiri dataran rendah dengan ketinggian 0 sampai dengan 100 meter diatas
                            permukaan laut. Bagian barat dan utara pada umumnya merupakan pegunungan, dan bagian selatan
                            sebagian besar merupakan dataran rendah. Tingkat kemiringan rata-rata pada wilayah bagian
                            barat dan utara 40%, dengan rata-rata curah hujan lebih tinggi dibanding dengan bagian
                            wilayah lainnya.</div>
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
