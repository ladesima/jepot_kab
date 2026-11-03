@extends('layouts.app')
@section('meta_tags')
    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $pengumuman->judul }}">
    <meta property="og:description" content="Baca pengumuman: {{ $pengumuman->judul }}">
    <meta property="og:image" content="{{ asset('images/new_logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $pengumuman->judul }}">
    <meta property="twitter:description" content="Baca pengumuman: {{ $pengumuman->judul }}">
    <meta property="twitter:image" content="{{ asset('images/new_logo.png') }}">
@endsection
@section('content')

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- ================= LEFT CONTENT ================= -->
            <div class="lg:col-span-2">

                <div class="bg-white rounded-2xl shadow-lg p-8">

                    {{-- Judul --}}
                    <h1 class="text-2xl font-bold mb-2">
                        {{ $pengumuman->judul }}
                    </h1>

                    <p class="text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d F Y') }}
                        • {{ $pengumuman->views }} dilihat
                    </p>

                    <div class="mt-4">
                        <a href="{{ upload_asset($pengumuman->file, 'pengumuman') }}" 
                           download
                           class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                            Download PDF
                        </a>
                    </div>

                    <!-- PREVIEW PDF -->
                    <div class="mt-6 border rounded-lg shadow overflow-hidden">
                        <iframe 
    src="{{ upload_asset($pengumuman->file, 'pengumuman') }}"
    width="100%" 
    height="750"
                            class="bg-gray-200">
                        </iframe>
                    </div>

                    {{-- Deskripsi --}}
                    @if($pengumuman->deskripsi)
                        <div class="mt-10 prose max-w-none">
                            {!! $pengumuman->deskripsi !!}
                        </div>
                    @endif

                </div>

            </div>

            <!-- ================= RIGHT SIDEBAR ================= -->
            <div>

                <!-- Search -->
                <div class="bg-white rounded-xl shadow p-5 mb-6">
                    <h3 class="font-semibold text-gray-700 mb-3">Search</h3>

                    <form action="{{ route('user.pengumuman') }}" method="GET" class="flex">
                        <input type="text" 
                               name="keyword"
                               placeholder="Search..."
                               class="w-full border rounded-l-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <button class="bg-blue-600 text-white px-4 rounded-r-lg">
                            🔍
                        </button>
                    </form>
                </div>

                <!-- Recent Berita -->
                <div class="bg-white rounded-xl shadow p-5">
                    <h3 class="font-semibold text-gray-700 mb-4">Berita Terbaru</h3>

                    @foreach($recentBerita as $item)
                        <a href="{{ route('berita.show', $item->id) }}"
                           class="block mb-4 group">

                            <p class="text-sm font-medium text-gray-800 group-hover:text-blue-600 leading-snug">
                                {{ \Illuminate\Support\Str::limit($item->judul, 60) }}
                            </p>

                            <span class="text-xs text-gray-400">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </span>
                        </a>
                    @endforeach

                </div>

            </div>

        </div>

    </div>
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
</section>

@endsection