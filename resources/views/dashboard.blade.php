<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskominfo Jeneponto</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
    <style>
/* ========================= */
/* SMOOTH SCROLL REVEAL     */
/* ========================= */

.reveal {
    opacity: 0;
    transform: translateY(60px);
    transition: opacity 1s cubic-bezier(0.16,1,0.3,1),
                transform 1s cubic-bezier(0.16,1,0.3,1);
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}
</style>
<style>
/* =============================== */
/* PER-CARD SMOOTH REVEAL SYSTEM  */
/* =============================== */

.reveal-card {
    opacity: 0;
    transform: translateY(60px) scale(0.96);
    transition: opacity 0.9s cubic-bezier(0.16,1,0.3,1),
                transform 0.9s cubic-bezier(0.16,1,0.3,1);
}

.reveal-card.active {
    opacity: 1;
    transform: translateY(0) scale(1);
}
</style>
</head>

<body class="bg-gray-50 text-gray-800">

    @include('layouts.navbar')

    <main>
        <section class="py-12 md:py-20 bg-gray-100">
           <div class="container mx-auto px-6">

    <div class="swiper hero-slider relative rounded-xl shadow-lg overflow-hidden">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
               <div class="swiper-slide">
    <div
        class="relative min-h-[70vh] bg-cover bg-center text-white
               flex items-center justify-start"
        style="background-image: url('{{ upload_asset($slider->image_path, 'slider') }}')"

        <!-- overlay -->
        <div class="absolute inset-0 bg-black/45"></div>

        <!-- konten -->
        <div class="relative z-10 w-full">
            <div class="container mx-auto px-12">
                <div class="max-w-lg text-left">

                    <h1 class="text-3xl md:text-5xl font-extrabold leading-tight tracking-tight">
                        {{ $slider->title }}
                    </h1>


                    <a href="{{ $slider->button_link }}"
                       class="inline-flex items-center mt-7 px-7 py-3 rounded-md
                              {{ $slider->button_color_class }}
                              bg-opacity-70 hover:bg-opacity-100
                              backdrop-blur-sm
                              font-semibold transition-all duration-300">
                        {{ $slider->button_text }}
                    </a>

                </div>
            </div>
        </div>

    </div>
</div>


            @endforeach
        </div>

        <div class="swiper-button-next text-white"></div>
        <div class="swiper-button-prev text-white"></div>
        <div class="swiper-pagination"></div>
    </div>

</div>


        <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-4 md:grid-cols-7 gap-8 text-center">

            <!-- Layanan Publik (sementara ke dashboard) -->
            <a href="{{ route('dashboard') }}"
               class="group flex flex-col items-center">
                <div
                    class="bg-blue-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-blue-600 group-hover:scale-110">
                    <i class="fa fa-info-circle text-4xl text-blue-600 group-hover:text-white"></i>
                </div>
                <h3 class="font-semibold text-gray-700 text-lg">
                    Layanan Publik
                </h3>
            </a>

            <!-- Pengumuman (sementara ke berita) -->
            <a href="{{ route('user.pengumuman') }}"
               class="group flex flex-col items-center">
                <div
                    class="bg-blue-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-blue-600 group-hover:scale-110">
                    <i class="fa fa-bullhorn text-4xl text-blue-600 group-hover:text-white"></i>
                </div>
                <h3 class="font-semibold text-gray-700 text-lg">
                    Pengumuman
                </h3>
            </a>

            <!-- Berita -->
            <a href="{{ route('user.berita') }}"
               class="group flex flex-col items-center">
                <div
                    class="bg-blue-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-blue-600 group-hover:scale-110">
                    <i class="fa fa-newspaper text-4xl text-blue-600 group-hover:text-white"></i>
                </div>
                <h3 class="font-semibold text-gray-700 text-lg">
                    Berita Terkini
                </h3>
            </a>

            <!-- Statistik -->
            <a href="{{ route('user.data-statistik') }}"
               class="group flex flex-col items-center">
                <div
                    class="bg-blue-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-blue-600 group-hover:scale-110">
                    <i class="fa fa-chart-bar text-4xl text-blue-600 group-hover:text-white"></i>
                </div>
                <h3 class="font-semibold text-gray-700 text-lg">
                    Data & Statistik
                </h3>
            </a>

            <!-- Status Laporan (Penghargaan) -->
            <a href="{{ route('user.penghargaan') }}"
               class="group flex flex-col items-center">
                <div
                    class="bg-green-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-green-500 group-hover:scale-110">
                    <i class="fa fa-check-circle text-4xl text-green-500 group-hover:text-white"></i>
                </div>
                <h3 class="font-semibold text-gray-700 text-lg">
                    Status Laporan
                </h3>
            </a>
                          <!-- IPKD -->
<a href="{{ route('ipk') }}"
class="group flex flex-col items-center">
<div class="bg-orange-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-orange-500 group-hover:scale-110">
<i class="fa fa-file-invoice text-4xl text-orange-500 group-hover:text-white"></i>
</div>
<h3 class="font-semibold text-gray-700 text-lg">
Indeks Pengelolaan Keuangan Daerah (IPKD)
</h3>
</a>

<!-- MCSP -->
<a href="{{ route('mcsp') }}"
class="group flex flex-col items-center">
<div class="bg-red-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-red-500 group-hover:scale-110">
<i class="fa fa-shield-halved text-4xl text-red-500 group-hover:text-white"></i>
</div>
<h3 class="font-semibold text-gray-700 text-lg">
MCSP-KOPSURGAH KPK
</h3>
</a>
        </div>
    </div>
</section>
<section id="portal-aplikasi" class="py-20 bg-gradient-to-b from-slate-500 to-slate-900">
    <div class="container mx-auto px-6">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-white">Portal Pemerintahan</h2>
            <p class="text-lg text-white/80 mt-2">
                Akses cepat ke seluruh aplikasi Kabupaten Jeneponto
            </p>
        </div>

        @php
        $apps = [
            ['nama' => 'ppid', 'url' => 'https://ppid.jenepontokab.go.id'],
            ['nama' => 'rsudlantodgpasewang', 'url' => 'https://rsudlantodgpasewang.jenepontokab.go.id'],
            ['nama' => 'siga', 'url' => 'https://siga.jenepontokab.go.id'],
            ['nama' => 'silopus', 'url' => 'https://silopus.jenepontokab.go.id'],
            ['nama' => 'sipekerja', 'url' => 'https://sipekerja.jenepontokab.go.id'],
            ['nama' => 'tatapemerintahan', 'url' => 'https://tatapemerintahan.jenepontokab.go.id'],
            ['nama' => 'skuter', 'url' => 'https://skuter.jenepontokab.go.id'],
            ['nama' => 'sitappa', 'url' => 'https://sitappa.jenepontokab.go.id'],
            ['nama' => 'sirena', 'url' => 'https://sirena.jenepontokab.go.id'],
            ['nama' => 'sipiara', 'url' => 'https://sipiara.jenepontokab.go.id'],
            ['nama' => 'sipekerja-data', 'url' => 'https://sipekerja-data.jenepontokab.go.id'],
            ['nama' => 'bappeda-monev', 'url' => 'https://bappeda-monev.jenepontokab.go.id'],
            ['nama' => 'daengsuda', 'url' => 'https://daengsuda.jenepontokab.go.id'],
            ['nama' => 'disdikbud', 'url' => 'https://disdikbud.jenepontokab.go.id'],
            ['nama' => 'dispusip', 'url' => 'https://dispusip.jenepontokab.go.id'],
            ['nama' => 'Dinas Kesehatan', 'url' => 'https://dinkesjenepontokab.org/'],
        ];

        function getIconClass($key){
            $key = strtolower($key);

            if(str_contains($key,'ppid')){
                return 'fa-bullhorn';
            }
            elseif(str_contains($key,'rsud')){
                return 'fa-hospital';
            }
            elseif(str_contains($key,'kesehatan') || str_contains($key,'dinkes')){
                return 'fa-heartbeat';
            }
            elseif(str_contains($key,'dik') || str_contains($key,'pus')){
                return 'fa-graduation-cap';
            }
            elseif(str_contains($key,'data') || str_contains($key,'monev') || str_contains($key,'rena') || str_contains($key,'appa')){
                return 'fa-chart-line';
            }
            elseif(str_contains($key,'tata') || str_contains($key,'skuter') || str_contains($key,'sipiara') || str_contains($key,'daeng')){
                return 'fa-building';
            }

            return 'fa-globe';
        }
        @endphp


        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach($apps as $app)
                <a href="{{ $app['url'] }}" target="_blank"
                   class="group bg-white/10 backdrop-blur rounded-xl p-6 text-center text-white hover:bg-white/20 transition">

                    <div class="mb-4">
                        <i class="fa-solid {{ getIconClass($app['nama']) }} text-4xl"></i>
                    </div>

                    <p class="text-sm font-semibold break-all">
                        {{ $app['nama'] }}
                    </p>
                </a>
            @endforeach
        </div>

    </div>
</section>


        <section id="berita" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800">Berita & Informasi Daerah</h2>
                    <p class="text-lg text-gray-500 mt-2">Ikuti perkembangan terbaru dari program dan kegiatan kami.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($beritas as $berita)
                        <a href="{{ route('berita.show', $berita->id) }}"
                            class="group block bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="overflow-hidden rounded-t-xl h-56">
                                <img src="{{ upload_asset($berita->foto, 'berita') }}" 
     class="w-full h-48 object-cover">
                            </div>
                            <div class="p-6">
                                {{-- Kategori berita --}}
                                <p class="text-blue-600 text-sm font-semibold mb-2">
                                    {{ $berita->kategori->nama_kategori }}
                                </p>

                                {{-- Judul berita --}}
                                <h3 class="font-bold text-xl mb-3 text-gray-800 leading-snug group-hover:text-blue-700">
                                    {{ $berita->judul }}
                                </h3>

                                {{-- Tanggal berita --}}
                                <div class="flex items-center justify-between mt-4 text-sm text-gray-500">

    <span>
        {{ \Carbon\Carbon::parse($berita->tanggal_kejadian)->translatedFormat('l, d F Y') }}
    </span>

    <span class="flex items-center gap-2 bg-gray-100 px-3 py-1 rounded-full text-xs text-gray-600">
        <i class="fas fa-eye text-gray-400"></i>
        {{ number_format($berita->views) }}
    </span>

</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

    @foreach ($albums as $album)
        <a href="{{ route('album.show', $album->id) }}"
           class="group relative h-[380px] rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">

            {{-- IMAGE --}}
            @php
    $cover = $album->photos->first();
@endphp

@if($cover)
    <img src="{{ upload_asset($cover->path, 'galeri') }}"
         alt="{{ $album->nama }}"
         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
@else
    <img src="https://via.placeholder.com/600x400"
         class="absolute inset-0 w-full h-full object-cover">
@endif

            {{-- OVERLAY --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent pointer-events-none" style="background-color: transparent !important;"></div>

            {{-- ICON CENTER --}}
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="bg-white/20 backdrop-blur-md p-4 rounded-full opacity-80 group-hover:scale-110 transition">
                    <i class="fas fa-images text-white text-2xl"></i>
                </div>
            </div>

            {{-- BOTTOM INFO --}}
            <div class="absolute bottom-0 left-0 w-full p-6 text-white">

                <h3 class="text-xl font-semibold mb-2 leading-snug">
                    {{ $album->nama }}
                </h3>

                <div class="flex items-center justify-between text-sm text-white/90">

                    <span>
                        {{ $album->photos->count() }} foto
                    </span>

                    <span class="flex items-center gap-2 bg-white/20 px-3 py-1 rounded-full text-xs">
                        <i class="fas fa-eye"></i>
                        {{ number_format($album->views) }}
                    </span>

                </div>

            </div>

        </a>
    @endforeach

</div>

        
    </main>

    @include('layouts.footer')
<script>
document.addEventListener("DOMContentLoaded", function () {

    // Target semua card yang ada
    const cards = document.querySelectorAll(
        "#portal-aplikasi a, " + 
        "#berita a, " + 
        "#galeri a, " +
        "section.py-20.bg-white .grid a"
    );

    // Tambahkan class reveal-card otomatis
    cards.forEach((card, index) => {
        card.classList.add("reveal-card");
        card.style.transitionDelay = (index % 5) * 0.1 + "s"; 
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
            }
        });
    }, {
        threshold: 0.15
    });

    document.querySelectorAll(".reveal-card").forEach(card => {
        observer.observe(card);
    });

});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    // Pilih section besar saja (tidak ganggu struktur)
    const sections = document.querySelectorAll("main > section");

    // Tambahkan class reveal otomatis
    sections.forEach(section => {
        section.classList.add("reveal");
    });

    const reveals = document.querySelectorAll(".reveal");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
            }
        });
    }, {
        threshold: 0.15
    });

    reveals.forEach(reveal => {
        observer.observe(reveal);
    });

});
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.hero-slider', {
            // Opsi untuk membuat slider berputar terus menerus
            loop: true,

            // Opsi untuk efek transisi (bisa 'slide' atau 'fade')
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },

            // Opsi untuk gambar bergeser otomatis
            autoplay: {
                delay: 5000, // Waktu dalam milidetik (5 detik)
                disableOnInteraction: false, // Terus berjalan meskipun di-klik
            },

            // Paginasi (titik-titik navigasi)
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // Tombol navigasi (panah kiri dan kanan)
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>


</body>

</html>
