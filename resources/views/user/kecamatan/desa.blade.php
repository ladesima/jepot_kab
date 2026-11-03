@extends('layouts.app')

@section('content')

<main class="py-16 bg-gray-100 min-h-screen">

<div class="container mx-auto px-6 max-w-7xl">

    <!-- HEADER -->
    <div class="text-center">
        <h1 class="text-3xl md:text-4xl font-bold">
            Daftar Desa / Kelurahan
        </h1>

        <p class="mt-2 text-lg text-gray-600">
            Kecamatan {{ $kecamatan->nama_kecamatan }}
        </p>

        <p class="mt-1 text-sm text-gray-500">
            Total Desa: {{ $kecamatan->desas->count() }}
        </p>
    </div>

    <!-- SEARCH -->
    <div class="mt-8 flex justify-center">
        <input type="text" id="search"
            placeholder="Cari desa..."
            class="w-full md:w-1/2 px-5 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none">
    </div>

    <!-- GRID DESA -->
    <div id="desaList" class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse ($kecamatan->desas->sortBy('nama_desa') as $desa)

            @php
                $link = $desa->website
                    ? (Str::startsWith($desa->website, ['http://','https://'])
                        ? $desa->website
                        : 'https://' . $desa->website)
                    : null;

                $domain = $link ? parse_url($link, PHP_URL_HOST) : null;
            @endphp

            <!-- CARD -->
            <div class="desa-card bg-white rounded-2xl shadow-md p-6 hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <!-- ICON -->
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-green-100 mb-4">
                    <span class="text-2xl">🏡</span>
                </div>

                <!-- NAMA DESA -->
                <h3 class="font-bold text-lg text-gray-800">
                    {{ $desa->nama_desa }}
                </h3>

                <!-- KEPALA DESA -->
                @if($desa->kepala_desa)
                <p class="text-sm text-gray-600 mt-2">
                    👤 Kepala Desa:
                    <span class="font-semibold text-green-600">
                        {{ $desa->kepala_desa }}
                    </span>
                </p>
                @endif

                <!-- ALAMAT -->
                @if($desa->alamat)
                <p class="text-sm text-gray-600 mt-1">
                    📍 {{ $desa->alamat }}
                </p>
                @endif

                <!-- EMAIL -->
                @if($desa->email)
                <p class="text-sm text-gray-600 mt-1">
                    ✉ {{ $desa->email }}
                </p>
                @endif

                <!-- TELEPON -->
                @if($desa->telepon)
                <p class="text-sm text-gray-600 mt-1">
                    📞 {{ $desa->telepon }}
                </p>
                @endif

                <!-- WEBSITE -->
                @if($link)
                <div class="mt-3 text-sm text-blue-700 font-semibold">
                    🌐 {{ $domain }}
                </div>

                <a href="{{ $link }}" target="_blank"
                   class="mt-3 inline-block text-sm text-white bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                   Kunjungi Website
                </a>
                @endif

            </div>

        @empty
            <div class="col-span-3 text-center text-gray-500">
                Data desa belum tersedia.
            </div>
        @endforelse

    </div>

    <!-- BACK BUTTON -->
    <div class="mt-12 text-center">
        <a href="{{ route('kecamatan.index') }}"
           class="inline-block bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
           ← Kembali ke Daftar Kecamatan
        </a>
    </div>

</div>

</main>

@endsection

@push('scripts')
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
<!-- SEARCH SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');

    searchInput.addEventListener('keyup', function() {
        let keyword = this.value.toLowerCase();
        let cards = document.querySelectorAll('.desa-card');

        cards.forEach(card => {
            let text = card.innerText.toLowerCase();
            card.style.display = text.includes(keyword) ? 'block' : 'none';
        });
    });
});
</script>

@endpush