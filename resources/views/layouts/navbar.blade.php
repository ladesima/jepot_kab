<script>
    // Universal theme pre-loader to prevent FOUC
    (function() {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    })();
</script>
<link rel="stylesheet" href="{{ asset('css/theme-dark-light.css') }}">
<link rel="stylesheet" href="{{ asset('css/interactive-animations.css') }}">
<script src="{{ asset('js/interactive-animations.js') }}" defer></script>

<header class="sticky top-0 z-50 shadow-md">
    <!-- Top Bar -->
    <div class="bg-slate-900 text-white text-xs">
        <div class="container mx-auto px-6 py-1.5 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-envelope text-teal-400"></i>
                <span>jenepontokab.go.id</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="hover:text-blue-400 transition-colors"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-blue-400 transition-colors"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-blue-400 transition-colors"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="bg-slate-800">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('images/new_logo.png') }}" alt="Logo Kabupaten Jeneponto" class="h-14 w-14 mr-3 drop-shadow">
                <div>
                    <p class="text-white font-bold text-xl leading-tight">KABUPATEN</p>
                    <p class="text-white font-bold text-xl leading-tight">JENEPONTO</p>
                </div>
            </a>

            <!-- Right Controls for Mobile -->
            <div class="flex items-center space-x-2 md:hidden">
                <!-- Mobile Theme Toggle Button -->
                <button type="button" onclick="toggleTheme()" class="theme-toggle-btn p-2 rounded-lg bg-slate-700/80 hover:bg-slate-700 text-amber-400 border border-slate-600 transition-all focus:outline-none flex items-center justify-center" aria-label="Ganti Tema" title="Ganti Mode Terang/Gelap">
                    <span class="theme-icon-container flex items-center justify-center"></span>
                </button>

                <button id="menu-toggle" class="text-white text-2xl focus:outline-none p-1">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Desktop / Collapsible Navigation Links -->
            <div id="menu"
                class="hidden md:flex flex-col md:flex-row md:items-center md:space-x-1.5 lg:space-x-2 text-white font-medium absolute md:static top-full left-0 w-full md:w-auto bg-slate-800 md:bg-transparent shadow-md md:shadow-none px-6 md:px-0 py-4 md:py-0 space-y-2 md:space-y-0">

                <!-- ================= PEMERINTAHAN ================= -->
                <div class="relative group">
                    <button
                        class="dropdown-toggle w-full text-left px-3 py-2 rounded-md hover:bg-slate-700 transition-colors flex items-center justify-between md:justify-start">
                        Pemerintahan <i class="fas fa-chevron-down text-xs ml-1.5 opacity-70"></i>
                    </button>

                    <div
                        class="dropdown-menu hidden md:absolute right-0 mt-1 w-full md:w-56 bg-slate-700 rounded-md shadow-xl py-1 z-20 border border-slate-600">

                        <!-- Kepala Daerah -->
                        <div class="relative group/sub">
                            <a href="#"
                                class="submenu-toggle block w-full text-left px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors flex items-center justify-between">
                                Kepala Daerah
                                <i class="fas fa-chevron-right text-xs opacity-70"></i>
                            </a>

                            <div
                                class="submenu hidden md:absolute left-full top-0 -mt-1 w-full md:w-56 bg-slate-700 rounded-md shadow-xl py-1 z-30 border border-slate-600">

                                <a href="{{ route('user.bupati') }}"
                                    class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                                    Bupati
                                </a>

                                <a href="{{ route('user.wakil-bupati') }}"
                                    class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                                    Wakil Bupati
                                </a>

                                <a href="{{ route('user.sekretaris-daerah') }}"
                                    class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                                    Sekretaris Daerah
                                </a>
                            </div>
                        </div>

                        <!-- STRUKTUR ORGANISASI -->
                        <a href="{{ route('user.struktur-organisasi') }}"
                           class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                           Struktur Organisasi
                        </a>

                        <!-- KEPALA OPD -->
                        <a href="{{ route('pemerintahan') }}"
                           class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                           Kepala OPD
                        </a>

                        <!-- KECAMATAN & DESA -->
                        <a href="{{ route('kecamatan.index') }}"
                           class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                           Kecamatan & Desa
                        </a>

                        <a href="{{ route('user.visi-misi') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                            Visi dan Misi
                        </a>
                    </div>
                </div>

                <!-- ================= PROFIL ================= -->
                <div class="relative group">
                    <button
                        class="dropdown-toggle w-full text-left px-3 py-2 rounded-md hover:bg-slate-700 transition-colors flex items-center justify-between md:justify-start">
                        Profil Daerah <i class="fas fa-chevron-down text-xs ml-1.5 opacity-70"></i>
                    </button>

                    <div
                        class="dropdown-menu hidden md:absolute right-0 mt-1 w-full md:w-56 bg-slate-700 rounded-md shadow-xl py-1 z-20 border border-slate-600">

                        <a href="{{ route('user.gambaran-umum') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                            Gambaran Umum
                        </a>

                        <a href="{{ route('user.ruang-lingkup-pemerintahan') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                            Ruang Lingkup Pemerintahan
                        </a>

                        <a href="{{ route('user.data-statistik') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                            Data Statistik
                        </a>
                    </div>
                </div>

                <!-- ================= MEDIA ================= -->
                <div class="relative group">
                    <button
                        class="dropdown-toggle w-full text-left px-3 py-2 rounded-md hover:bg-slate-700 transition-colors flex items-center justify-between md:justify-start">
                        Media Informasi <i class="fas fa-chevron-down text-xs ml-1.5 opacity-70"></i>
                    </button>

                    <div
                        class="dropdown-menu hidden md:absolute right-0 mt-1 w-full md:w-56 bg-slate-700 rounded-md shadow-xl py-1 z-20 border border-slate-600">
                        <a href="{{ route('user.pengumuman') }}"
                           class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                            Pengumuman
                        </a>
                        <a href="{{ route('user.berita') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                            Berita
                        </a>
                        <a href="{{ route('user.galeri') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                            Galeri
                        </a>
                        <a href="{{ route('user.artikel') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                            Artikel
                        </a>
                        <a href="{{ route('user.ppid') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-slate-600 transition-colors">
                            PPID
                        </a>
                    </div>
                </div>

        

                <!-- PENGHARGAAN -->
                <a href="{{ route('user.penghargaan') }}"
                    class="block md:inline-block px-3 py-2 rounded-md hover:bg-slate-700 transition-colors">
                    Penghargaan
                </a>

                <!-- LOGIN -->
                <a href="{{ route('login') }}"
                    class="block md:inline-block px-3 py-2 rounded-md hover:bg-slate-700 transition-colors">
                    Login
                </a>

                <!-- ================= THEME TOGGLE BUTTON (DESKTOP) ================= -->
                <button type="button" onclick="toggleTheme()"
                    class="theme-toggle-btn hidden md:inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-700/90 hover:bg-slate-600 text-white border border-slate-500/80 transition-all focus:outline-none shadow-sm ml-2 cursor-pointer group"
                    title="Ganti Mode Terang / Gelap" aria-label="Toggle Theme">
                    <span class="theme-icon-container flex items-center justify-center"></span>
                    <span class="theme-label text-xs font-semibold tracking-wide">Mode</span>
                </button>

            </div>
        </div>
    </nav>
</header>

<script>
    // Universal theme engine with inline SVGs for 100% reliable rendering
    const THEME_SUN_SVG = `<svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>`;

    const THEME_MOON_SVG = `<svg class="w-4 h-4 text-indigo-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>`;

    function syncThemeUI() {
        const isDark = document.documentElement.classList.contains('dark');
        document.querySelectorAll('.theme-icon-container').forEach(container => {
            container.innerHTML = isDark ? THEME_SUN_SVG : THEME_MOON_SVG;
        });
        document.querySelectorAll('.theme-label').forEach(label => {
            label.textContent = isDark ? 'Terang' : 'Gelap';
        });
        document.querySelectorAll('.theme-toggle-btn').forEach(btn => {
            btn.setAttribute('title', isDark ? 'Beralih ke Mode Terang' : 'Beralih ke Mode Gelap');
        });
    }

    function toggleTheme() {
        const isCurrentlyDark = document.documentElement.classList.contains('dark');
        if (isCurrentlyDark) {
            document.documentElement.classList.remove('dark');
            if (document.body) document.body.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            if (document.body) document.body.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
        syncThemeUI();
    }

    // Ensure Tailwind supports dark mode via class
    if (window.tailwind) {
        window.tailwind.config = window.tailwind.config || {};
        window.tailwind.config.darkMode = 'class';
    }

    // Sync on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', syncThemeUI);
    } else {
        syncThemeUI();
    }

    // Mobile Navbar & Dropdowns toggle
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        if (menuToggle && menu) {
            menuToggle.addEventListener('click', function() {
                menu.classList.toggle('hidden');
            });
        }

        // Dropdown toggles for mobile
        document.querySelectorAll('.dropdown-toggle').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (window.innerWidth < 768) {
                    e.preventDefault();
                    const dropdown = this.nextElementSibling;
                    if (dropdown) dropdown.classList.toggle('hidden');
                }
            });
        });

        document.querySelectorAll('.submenu-toggle').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (window.innerWidth < 768) {
                    e.preventDefault();
                    const submenu = this.nextElementSibling;
                    if (submenu) submenu.classList.toggle('hidden');
                }
            });
        });
    });
</script>
