<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: #4a5568;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-gray-100">

<div class="flex h-screen bg-gray-800 text-white">

    @include('layouts.aside')

    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- HEADER -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center">
            <button id="menu-toggle" class="md:hidden text-gray-600">
                <i class="fas fa-bars text-2xl"></i>
            </button>

            <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>

            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Admin</span>
                <img class="h-10 w-10 rounded-full object-cover"
                     src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123"
                     alt="Admin Avatar">
            </div>
        </header>

        <!-- MAIN -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            <div class="container mx-auto">

                <!-- Welcome -->
                <div class="mb-8">
                    <h3 class="text-3xl font-bold text-gray-800">
                        Selamat Datang Kembali, Admin!
                    </h3>
                    <p class="text-gray-500">
                        Berikut adalah ringkasan singkat dari website Anda.
                    </p>
                </div>

                <!-- ================= MONITORING KONTEN ================= -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Total Berita -->
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                        <p class="text-sm text-gray-500">Total Berita</p>
                        <div class="flex items-center justify-between mt-2">
                            <p class="text-3xl font-bold text-gray-800">{{ $totalBerita }}</p>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-newspaper text-blue-600"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Artikel -->
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                        <p class="text-sm text-gray-500">Total Artikel</p>
                        <div class="flex items-center justify-between mt-2">
                            <p class="text-3xl font-bold text-gray-800">{{ $totalArtikel }}</p>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-pen-alt text-green-600"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Galeri -->
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                        <p class="text-sm text-gray-500">Total Galeri</p>
                        <div class="flex items-center justify-between mt-2">
                            <p class="text-3xl font-bold text-gray-800">{{ $totalGaleri }}</p>
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <i class="fas fa-images text-yellow-600"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Pejabat -->
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                        <p class="text-sm text-gray-500">Jumlah Pejabat</p>
                        <div class="flex items-center justify-between mt-2">
                            <p class="text-3xl font-bold text-gray-800">{{ $totalPejabat }}</p>
                            <div class="bg-red-100 p-3 rounded-full">
                                <i class="fas fa-users text-red-600"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ================= MONITORING WILAYAH ================= -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

    <!-- Total OPD -->
    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
        <p class="text-sm text-gray-500">Total OPD / Dinas</p>
        <div class="flex items-center justify-between mt-2">
            <p class="text-3xl font-bold text-gray-800">{{ $totalOpd }}</p>
            <div class="bg-purple-100 p-3 rounded-full">
                <i class="fas fa-building text-purple-600"></i>
            </div>
        </div>
    </div>

    <!-- Total Kecamatan -->
    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
        <p class="text-sm text-gray-500">Total Kecamatan</p>
        <div class="flex items-center justify-between mt-2">
            <p class="text-3xl font-bold text-gray-800">{{ $totalKecamatan }}</p>
            <div class="bg-indigo-100 p-3 rounded-full">
                <i class="fas fa-map text-indigo-600"></i>
            </div>
        </div>
    </div>

    <!-- Total Desa -->
    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
        <p class="text-sm text-gray-500">Total Desa</p>
        <div class="flex items-center justify-between mt-2">
            <p class="text-3xl font-bold text-gray-800">{{ $totalDesa }}</p>
            <div class="bg-teal-100 p-3 rounded-full">
                <i class="fas fa-home text-teal-600"></i>
            </div>
        </div>
    </div>

</div>

                <!-- ================= BERITA & AKSI ================= -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">

                    <!-- Berita Terbaru -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-xl font-bold text-gray-800 mb-4">Berita Terbaru</h4>

                        <ul class="space-y-4">
                            @foreach ($beritaTerbaru as $berita)
                                <li class="flex items-center justify-between">
                                    <p class="text-gray-700">
                                        {{ Str::limit($berita->judul, 50) }}
                                    </p>
                                    <span class="text-xs text-gray-400">
                                        {{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Aksi Cepat -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h4>

                        <div class="flex flex-col space-y-3">

                            <a href="{{ route('admin.tambah-berita') }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg text-center transition">
                                <i class="fas fa-plus mr-2"></i>Tambah Berita
                            </a>

                            <a href="{{ route('admin.tambah-artikel') }}"
                               class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg text-center transition">
                                <i class="fas fa-plus mr-2"></i>Tambah Artikel
                            </a>

                            <a href="{{ route('admin.album.store') }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-4 rounded-lg text-center transition">
                                <i class="fas fa-plus mr-2"></i>Tambah Galeri
                            </a>

                        </div>
                    </div>

                </div>

            </div>
        </main>

    </div>
</div>

<!-- Overlay -->
<div id="sidebar-overlay"
     class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 md:hidden"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const closeSidebar = document.getElementById('close-sidebar');

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }

    menuToggle?.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleSidebar();
    });

    overlay?.addEventListener('click', toggleSidebar);
    closeSidebar?.addEventListener('click', toggleSidebar);
});
</script>

</body>
</html>