<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskominfo Jeneponto</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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
</head>

<body class="bg-gray-50 text-gray-800">

    @include('layouts.navbar')

    <main>
        <section class="py-12 md:py-20 bg-gray-100">
            <div class="container mx-auto px-6">

                <div class="swiper hero-slider relative rounded-xl shadow-lg overflow-hidden">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="relative min-h-[70vh] bg-cover bg-center text-white flex items-center justify-center text-center"
                                style="background-image: url('{{ asset('images/banner1.png') }}')">
                                <div class="absolute inset-0 bg-black/60"></div>
                                <div class="container mx-auto px-6 relative z-10">
                                    <div class="max-w-3xl mx-auto">
                                        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">Budidaya Tambak
                                            Garam</h1>
                                        <p class="mt-4 text-lg md:text-xl font-light">"Ingat garam, ingat Jeneponto".
                                            Potensi besar dalam menunjang swasembada garam.</p>
                                        <a href="#berita"
                                            class="mt-8 inline-block px-10 py-3 bg-blue-600 hover:bg-blue-700 rounded-md font-bold transition-all duration-300">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="relative min-h-[70vh] bg-cover bg-center text-white flex items-center justify-center text-center"
                                style="background-image: url({{ asset('images/banner2.png') }})">
                                <div class="absolute inset-0 bg-black/60"></div>
                                <div class="container mx-auto px-6 relative z-10">
                                    <div class="max-w-3xl mx-auto">
                                        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">Inovasi Teknologi
                                            Pertanian</h1>
                                        <p class="mt-4 text-lg md:text-xl font-light">Menerapkan teknologi modern untuk
                                            hasil panen yang lebih berkualitas.</p>
                                        <a href="#galeri"
                                            class="mt-8 inline-block px-10 py-3 bg-green-600 hover:bg-green-700 rounded-md font-bold transition-all duration-300">
                                            Lihat Galeri
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="relative min-h-[70vh] bg-cover bg-center text-white flex items-center justify-center text-center"
                                style="background-image: url({{ asset('images/banner3.png') }})">
                                <div class="absolute inset-0 bg-black/60"></div>
                                <div class="container mx-auto px-6 relative z-10">
                                    <div class="max-w-3xl mx-auto">
                                        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">Potensi Ekonomi
                                            Lokal</h1>
                                        <p class="mt-4 text-lg md:text-xl font-light">Mendorong kesejahteraan masyarakat
                                            melalui sektor pergaraman.</p>
                                        <a href="#"
                                            class="mt-8 inline-block px-10 py-3 bg-yellow-500 hover:bg-yellow-600 rounded-md font-bold transition-all duration-300 text-gray-900">
                                            Hubungi Kami
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next text-white"></div>
                    <div class="swiper-button-prev text-white"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>


        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-8 text-center">
                    <div class="group flex flex-col items-center">
                        <div
                            class="bg-blue-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-blue-600 group-hover:scale-110">
                            <i
                                class="fa fa-info-circle text-4xl text-blue-600 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <h3 class="font-semibold text-gray-700 text-lg">Layanan Publik</h3>
                    </div>
                    <div class="group flex flex-col items-center">
                        <div
                            class="bg-blue-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-blue-600 group-hover:scale-110">
                            <i
                                class="fa fa-bullhorn text-4xl text-blue-600 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <h3 class="font-semibold text-gray-700 text-lg">Pengumuman</h3>
                    </div>
                    <div class="group flex flex-col items-center">
                        <div
                            class="bg-blue-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-blue-600 group-hover:scale-110">
                            <i
                                class="fa fa-newspaper text-4xl text-blue-600 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <h3 class="font-semibold text-gray-700 text-lg">Berita Terkini</h3>
                    </div>
                    <div class="group flex flex-col items-center">
                        <div
                            class="bg-blue-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-blue-600 group-hover:scale-110">
                            <i
                                class="fa fa-chart-bar text-4xl text-blue-600 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <h3 class="font-semibold text-gray-700 text-lg">Data & Statistik</h3>
                    </div>
                    <div class="group flex flex-col items-center">
                        <div
                            class="bg-green-100 rounded-full p-5 mb-4 transition-all duration-300 group-hover:bg-green-500 group-hover:scale-110">
                            <i
                                class="fa fa-check-circle text-4xl text-green-500 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <h3 class="font-semibold text-gray-700 text-lg">Status Laporan</h3>
                    </div>
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
                                <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
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
                                <p class="text-gray-500 text-sm">
                                    {{ \Carbon\Carbon::parse($berita->tanggal_kejadian)->translatedFormat('l, d F Y') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="galeri" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800">Galeri Album</h2>
                    <p class="text-lg text-gray-500 mt-2">Lihat dokumentasi kegiatan melalui album.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($albums as $album)
                        <a href="{{ route('album.show', $album->id) }}"
                            class="group relative rounded-xl shadow-lg overflow-hidden cursor-pointer">
                            <img src="{{ $album->cover ? asset('storage/' . $album->cover->path) : 'https://via.placeholder.com/600x400.png?text=No+Cover' }}"
                                alt="Thumbnail {{ $album->nama }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all duration-300 flex items-center justify-center">
                                <i
                                    class="fas fa-images text-7xl text-white/80 transform group-hover:scale-110 transition-transform duration-300"></i>
                            </div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <h3 class="text-white font-bold text-lg">{{ $album->nama }}</h3>
                                <p class="text-white text-sm">{{ $album->photos->count() }} foto</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-slate-900 text-gray-300 pt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <div class="col-span-1 md:col-span-2 lg:col-span-1">
                    <h3 class="text-xl font-bold text-white mb-4">Tentang Kami</h3>
                    <p class="text-gray-400">Portal resmi informasi budidaya dan pengembangan sektor garam di Kabupaten
                        Jeneponto.</p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Navigasi</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-white transition-colors">Profil Daerah</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Semua Berita</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Galeri Lengkap</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Regulasi & Dokumen</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">PPID</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-white transition-colors">Profil PPID</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Layanan Informasi</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pengajuan Keberatan</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Kontak Kami</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start"><i class="fas fa-map-marker-alt mr-3 mt-1 text-white"></i>Jl.
                            Poros, Jeneponto, Sulawesi Selatan</li>
                        <li class="flex items-start"><i class="fas fa-phone mr-3 mt-1 text-white"></i>(0419) 123-456
                        </li>
                        <li class="flex items-start"><i
                                class="fas fa-envelope mr-3 mt-1 text-white"></i>info@jeneponto.go.id</li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-800 pt-6 text-center text-sm text-gray-500">
                <p>&copy; 2025 Hak Cipta Dilindungi. Pemerintah Kabupaten Jeneponto.</p>
            </div>
        </div>
    </footer>


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
