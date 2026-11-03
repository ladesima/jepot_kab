@extends('layouts.app')

@section('content')

<main class="py-16 bg-gray-100 min-h-screen">

<div class="container mx-auto px-6 max-w-7xl">

    <!-- JUDUL -->
    <div class="text-center">
        <h1 class="text-3xl md:text-4xl font-bold">
            Portal Kecamatan Kabupaten Jeneponto
        </h1>

        <p class="mt-2 text-lg text-gray-600">
            Akses daftar desa/kelurahan di setiap kecamatan
        </p>
    </div>

    <!-- SEARCH -->
    <div class="mt-8 flex justify-center">
        <input type="text" id="search"
            placeholder="Cari kecamatan..."
            class="w-full md:w-1/2 px-5 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none">
    </div>

    <!-- GRID -->
    <div id="kecamatanList"
         class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse ($kecamatans as $kecamatan)

        <div class="kecamatan-card bg-white rounded-2xl shadow-md p-6 hover:shadow-2xl hover:-translate-y-2 transition duration-300">

    <!-- ICON -->
    <div class="w-14 h-14 flex items-center justify-center rounded-full bg-green-100 mb-4">
        <span class="text-2xl">🏘️</span>
    </div>

    <!-- NAMA -->
    <h3 class="font-bold text-lg text-gray-800">
        Kecamatan {{ $kecamatan->nama_kecamatan }}
    </h3>

    <!-- KEPALA CAMAT -->
    @if($kecamatan->kepala_camat)
        <p class="text-sm text-gray-600 mt-2">
            👤 Camat:
            <span class="font-semibold text-green-600">
                {{ $kecamatan->kepala_camat }}
            </span>
        </p>
    @endif
    @if(!empty($kecamatan->riwayat_jabatan))
        <div class="mt-2 text-xs text-gray-500 bg-gray-50 p-2.5 rounded-lg border border-gray-100">
            <span class="font-semibold text-gray-600 block mb-0.5">Riwayat Jabatan:</span>
            <span>{{ $kecamatan->riwayat_jabatan }}</span>
        </div>
    @endif

    <!-- ALAMAT -->
    @if($kecamatan->alamat)
        <p class="text-sm text-gray-600 mt-1">
            📍 {{ $kecamatan->alamat }}
        </p>
    @endif

    <!-- EMAIL -->
    @if($kecamatan->email)
        <p class="text-sm text-gray-600 mt-1">
            ✉ {{ $kecamatan->email }}
        </p>
    @endif

    <!-- WEBSITE -->
    @if($kecamatan->website)
        @php
            $link = Str::startsWith($kecamatan->website, ['http://','https://'])
                    ? $kecamatan->website
                    : 'https://' . $kecamatan->website;
        @endphp

        <a href="{{ $link }}" target="_blank"
           class="text-sm text-blue-600 hover:underline mt-1 block">
            🌐 Kunjungi Website
        </a>
    @endif

    <!-- JUMLAH DESA -->
    <p class="text-sm text-gray-600 mt-3">
        Jumlah Desa/Kelurahan:
        <span class="font-semibold text-blue-600">
            {{ $kecamatan->desas_count }}
        </span>
    </p>

    <!-- BUTTON -->
    <div class="mt-5">
        <a href="{{ route('kecamatan.show', $kecamatan->id) }}"
           class="inline-block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Lihat Daftar Desa
        </a>
    </div>

</div>

        @empty
            <div class="col-span-3 text-center text-gray-500">
                Data Kecamatan belum tersedia.
            </div>
        @endforelse

    </div>

</div>

</main>

    @endsection

@push('scripts')
<script>
document.getElementById('search').addEventListener('keyup', function() {
    let keyword = this.value.toLowerCase();
    let cards = document.querySelectorAll('.kecamatan-card');

    cards.forEach(card => {
        let text = card.innerText.toLowerCase();
        card.style.display = text.includes(keyword) ? 'block' : 'none';
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
@endpush
