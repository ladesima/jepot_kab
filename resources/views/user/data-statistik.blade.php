<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik - Diskominfo Kabupaten Jeneponto</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <h1 class="text-3xl font-bold text-slate-800">Data Statistik Diskominfo</h1>
                <nav class="text-sm font-medium">
                    <a href="#" class="hover:underline text-blue-600">Beranda</a>
                    <span class="mx-2 text-gray-500">/</span>
                    <span class="text-gray-700">Data Statistik</span>
                </nav>
            </div>
        </section>

        <section class="container mx-auto px-6 py-12 md:py-16">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
                    <div class="bg-blue-100 p-4 rounded-full"><i class="fas fa-wifi text-3xl text-blue-600"></i></div>
                    <div>
                        <p class="text-gray-500 text-sm">{{ $summary['wifi_points']->title }}</p>
                        <p class="text-2xl font-bold text-slate-800">{{ $summary['wifi_points']->value }}
                            {{ $summary['wifi_points']->unit }}</p>
                        <p class="text-xs text-gray-400">{{ $summary['wifi_points']->notes }}</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
                    <div class="bg-green-100 p-4 rounded-full"><i class="fas fa-server text-3xl text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">{{ $summary['data_centers']->title }}</p>
                        <p class="text-2xl font-bold text-slate-800">{{ $summary['data_centers']->value }}
                            {{ $summary['data_centers']->unit }}</p>
                        <p class="text-xs text-gray-400">{{ $summary['data_centers']->notes }}</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
                    <div class="bg-yellow-100 p-4 rounded-full"><i class="fas fa-bullhorn text-3xl text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">{{ $summary['public_info_requests']->title }}</p>
                        <p class="text-2xl font-bold text-slate-800">{{ $summary['public_info_requests']->value }}
                            {{ $summary['public_info_requests']->unit }}</p>
                        <p class="text-xs text-gray-400">{{ $summary['public_info_requests']->notes }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6"><i class="fas fa-network-wired text-3xl text-blue-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Infrastruktur TIK</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $infrastructure['telecom_towers']->title }}</span><span
                                class="font-bold">{{ $infrastructure['telecom_towers']->value }}
                                {{ $infrastructure['telecom_towers']->unit }}</span></div>
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $infrastructure['fiber_optic_length']->title }}</span><span
                                class="font-bold">{{ $infrastructure['fiber_optic_length']->value }}
                                {{ $infrastructure['fiber_optic_length']->unit }}</span></div>
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $infrastructure['internet_connected_villages']->title }}</span><span
                                class="font-bold">{{ $infrastructure['internet_connected_villages']->value }}{{ $infrastructure['internet_connected_villages']->unit }}</span>
                        </div>
                        <div class="flex justify-between"><span
                                class="text-gray-600">{{ $infrastructure['public_cctv']->title }}</span><span
                                class="font-bold">{{ $infrastructure['public_cctv']->value }}
                                {{ $infrastructure['public_cctv']->unit }}</span></div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6"><i class="fas fa-headset text-3xl text-yellow-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Pelayanan & Pengaduan</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $service['reports_in']->title }}</span><span
                                class="font-bold">{{ $service['reports_in']->value }}
                                {{ $service['reports_in']->unit }}</span></div>
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $service['reports_done']->title }}</span><span
                                class="font-bold">{{ $service['reports_done']->value }}
                                {{ $service['reports_done']->unit }}</span></div>
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $service['avg_resolution_time']->title }}</span><span
                                class="font-bold">{{ $service['avg_resolution_time']->value }}
                                {{ $service['avg_resolution_time']->unit }}</span></div>
                        <div class="flex justify-between"><span
                                class="text-gray-600">{{ $service['satisfaction_rate']->title }}</span><span
                                class="font-bold">{{ $service['satisfaction_rate']->value }}{{ $service['satisfaction_rate']->unit }}</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6"><i class="fas fa-globe-asia text-3xl text-green-600 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Akses Internet</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $internet_access['household_connectivity']->title }}</span><span
                                class="font-bold">{{ $internet_access['household_connectivity']->value }}{{ $internet_access['household_connectivity']->unit }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $internet_access['active_internet_users']->title }}</span><span
                                class="font-bold">{{ $internet_access['active_internet_users']->value }}
                                {{ $internet_access['active_internet_users']->unit }}</span></div>
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $internet_access['free_access_points']->title }}</span><span
                                class="font-bold">{{ $internet_access['free_access_points']->value }}
                                {{ $internet_access['free_access_points']->unit }}</span></div>
                        <div class="flex justify-between"><span
                                class="text-gray-600">{{ $internet_access['blankspot_areas']->title }}</span><span
                                class="font-bold">{{ $internet_access['blankspot_areas']->value }}
                                {{ $internet_access['blankspot_areas']->unit }}</span></div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="flex items-center mb-6"><i class="fas fa-database text-3xl text-red-500 mr-4"></i>
                        <h2 class="text-2xl font-bold text-slate-800">Data & Statistik Digital</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $digital_data['open_datasets']->title }}</span><span
                                class="font-bold">{{ $digital_data['open_datasets']->value }}
                                {{ $digital_data['open_datasets']->unit }}</span></div>
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $digital_data['public_service_apps']->title }}</span><span
                                class="font-bold">{{ $digital_data['public_service_apps']->value }}
                                {{ $digital_data['public_service_apps']->unit }}</span></div>
                        <div class="flex justify-between border-b pb-2"><span
                                class="text-gray-600">{{ $digital_data['website_visits']->title }}</span><span
                                class="font-bold">{{ $digital_data['website_visits']->value }}
                                {{ $digital_data['website_visits']->unit }}</span></div>
                        <div class="flex justify-between"><span
                                class="text-gray-600">{{ $digital_data['active_social_media']->title }}</span><span
                                class="font-bold">{{ $digital_data['active_social_media']->value }}
                                {{ $digital_data['active_social_media']->unit }}</span></div>
                    </div>
                </div>
            </div>
        </section>
    </main>


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
