@extends('layouts.app')

@section('content')

<style>
/* Scroll Reveal Base */
.reveal {
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}

/* Delay Stagger */
.reveal.delay-1 { transition-delay: 0.1s; }
.reveal.delay-2 { transition-delay: 0.2s; }
.reveal.delay-3 { transition-delay: 0.3s; }
.reveal.delay-4 { transition-delay: 0.4s; }

/* Timeline Line */
.timeline-line {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 3px;
    background: linear-gradient(to bottom, #3b82f6, #60a5fa);
}
</style>

<main class="bg-gradient-to-b from-slate-50 via-white to-slate-100 min-h-screen">

    {{-- HERO --}}
    <section class="pt-28 pb-20 text-center reveal">
        <div class="container mx-auto px-6 max-w-4xl">
            <h1 class="text-5xl font-extrabold text-slate-800 tracking-tight">
                Profil Bupati
            </h1>
            <p class="mt-4 text-gray-500 text-lg">
                Kabupaten Jeneponto • Periode 2025 – 2030
            </p>
        </div>
    </section>

    {{-- PROFILE CARD --}}
    <section class="container mx-auto px-6 pb-24">
        <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl p-14 reveal">

            <div class="grid lg:grid-cols-2 gap-20 items-center">

                {{-- FOTO --}}
                <div class="relative flex justify-center reveal delay-1">

                    <div class="absolute w-80 h-80 bg-blue-500/20 blur-3xl rounded-full -z-10"></div>

                    <img src="{{ upload_asset($bupati->foto, 'kepala-daerah') }}"
                        class="rounded-3xl shadow-2xl w-80 h-[500px] object-cover transition duration-500 hover:scale-105">
                </div>

                {{-- INFORMASI --}}
                <div class="reveal delay-2">

                    <h2 class="text-3xl font-bold text-slate-800">
                        {{ $bupati->nama }}
                    </h2>

                    <p class="text-blue-600 font-semibold mt-2 text-lg">
                        {{ $bupati->jabatan }}
                    </p>

                    <div class="mt-12 space-y-8">

                        <div class="flex justify-between border-b pb-4">
                            <span class="text-gray-500">Tempat / Tanggal Lahir</span>
                            <span class="font-semibold text-slate-800 text-right">
                                {{ $bupati->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($bupati->tanggal_lahir)->translatedFormat('d F Y') }}
                            </span>
                        </div>

                        <div class="flex justify-between border-b pb-4">
                            <span class="text-gray-500">Agama</span>
                            <span class="font-semibold text-slate-800">
                                {{ $bupati->agama }}
                            </span>
                        </div>

                        <div class="flex justify-between border-b pb-4">
                            <span class="text-gray-500">Alamat</span>
                            <span class="font-semibold text-slate-800 text-right">
                                {{ $bupati->alamat }}
                            </span>
                        </div>

                        <div class="flex justify-between border-b pb-4">
                            <span class="text-gray-500">Nama Istri</span>
                            <span class="font-semibold text-slate-800">
                                {{ $bupati->nama_istri ?? '-' }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Jumlah Anak</span>
                            <span class="font-semibold text-slate-800">
                                {{ $bupati->anak ?? '-' }}
                            </span>
                        </div>

                    </div>

                    @if(!empty($bupati->file_lhkpn))
                        <div class="mt-8 pt-6 border-t border-gray-100 flex items-center">
                            <a href="{{ upload_asset($bupati->file_lhkpn, 'lhkpn') }}" target="_blank" download
                               class="inline-flex items-center gap-3 px-6 py-3.5 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-semibold rounded-2xl shadow-lg shadow-red-500/25 transition duration-300 transform hover:-translate-y-0.5">
                                <i class="fas fa-file-pdf text-xl"></i>
                                <span>Unduh Dokumen LHKPN</span>
                                <i class="fas fa-arrow-down text-sm opacity-80"></i>
                            </a>
                        </div>
                    @endif

                </div>

            </div>

        </div>

        {{-- TIMELINE --}}
        <div class="mt-32 text-center reveal">
            <h3 class="text-3xl font-bold text-slate-800">
                Riwayat Jabatan
            </h3>
        </div>

        <div class="mt-20 max-w-4xl mx-auto relative">

            <div class="timeline-line h-full"></div>

            <div class="space-y-20 relative">

                {{-- ITEM 1 --}}
                <div class="relative flex justify-start reveal delay-1">
                    <div class="w-1/2 pr-10 text-right">
                        <p class="font-semibold text-slate-800 text-lg">
                            Anggota DPRD Jeneponto
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            2008 – 2014
                        </p>
                    </div>
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-blue-600 rounded-full shadow-lg"></div>
                </div>

                {{-- ITEM 2 --}}
                <div class="relative flex justify-end reveal delay-2">
                    <div class="w-1/2 pl-10 text-left">
                        <p class="font-semibold text-slate-800 text-lg">
                            Wakil Ketua DPRD Jeneponto
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            2014 – 2018
                        </p>
                    </div>
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-blue-600 rounded-full shadow-lg"></div>
                </div>

                {{-- ITEM 3 --}}
                <div class="relative flex justify-start reveal delay-3">
                    <div class="w-1/2 pr-10 text-right">
                        <p class="font-semibold text-slate-800 text-lg">
                            Wakil Bupati Jeneponto
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            2018 – 2023
                        </p>
                    </div>
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-blue-600 rounded-full shadow-lg"></div>
                </div>

            </div>

        </div>

    </section>

</main>
@endsection
<script>
document.addEventListener("DOMContentLoaded", function () {

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

</body>

</html>
