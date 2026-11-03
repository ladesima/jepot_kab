<aside id="sidebar"
    class="w-64 bg-gray-800 p-4 flex-shrink-0 flex flex-col fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out z-40">

    <!-- Bagian atas (logo + nav scrollable) -->
    <div class="flex flex-col h-full">
        <!-- Header -->
        <div class="flex items-center justify-between md:justify-center py-4 mb-4 border-b border-gray-700">
            <div class="flex items-center">
                <i class="fas fa-shield-alt text-3xl text-blue-400"></i>
                <h1 class="text-2xl font-bold ml-3 text-white">Admin Panel</h1>
            </div>
            <button id="close-sidebar" class="md:hidden text-gray-300 hover:text-white">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>

        <!-- Nav scrollable -->
        <nav class="flex-grow overflow-y-auto sidebar-scroll">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-tachometer-alt w-6"></i>
                <span class="ml-4">Dashboard</span>
            </a>

            <!-- ================= PROFIL ================= -->
            <p class="px-4 mt-4 mb-2 text-xs text-gray-500 uppercase">Profil</p>
            <a href="{{ route('admin.kepala-daerah') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-user-tie w-6"></i>
                <span class="ml-4">Kepala Daerah</span>
            </a>
            <a href="{{ route('admin.sekretaris-daerah') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-users w-6"></i>
                <span class="ml-4">Sekretaris Daerah</span>
            </a>
            <a href="{{ route('admin.pejabat-daerah') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-users w-6"></i>
                <span class="ml-4">Pejabat Daerah</span>
            </a>
            <a href="{{ route('admin.struktur') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-sitemap w-6"></i>
                <span class="ml-4">Struktur Organisasi</span>
            </a>

            <!-- 🔥 MENU BARU -->
            <a href="{{ route('opd.index') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-building w-6"></i>
                <span class="ml-4">OPD / Dinas</span>
            </a>

            <p class="px-4 mt-4 mb-2 text-xs text-gray-500 uppercase">Wilayah</p>

<a href="{{ route('admin.kecamatan.index') }}"
   class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
    <i class="fas fa-map w-6"></i>
    <span class="ml-4">Kecamatan</span>
</a>

<a href="{{ route('admin.desa.index') }}"
   class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
    <i class="fas fa-home w-6"></i>
    <span class="ml-4">Desa</span>
</a>


            <!-- ================= KONTEN ================= -->
            <p class="px-4 mt-4 mb-2 text-xs text-gray-500 uppercase">Konten</p>
            <a href="{{ route('admin.slider') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-image w-6"></i>
                <span class="ml-4">Sliders</span>
            </a>
            <a href="{{ route('admin.data-statistik') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-chart-bar w-6"></i>
                <span class="ml-4">Data Statistik</span>
            </a>
            <a href="{{ route('admin.berita') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-newspaper w-6"></i>
                <span class="ml-4">Berita</span>
            </a>
            <a href="{{ route('admin.artikel') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-pen-alt w-6"></i>
                <span class="ml-4">Artikel</span>
            </a>
            <a href="{{ route('admin.album') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-images w-6"></i>
                <span class="ml-4">Galeri</span>
            </a>
            <a href="{{ route('admin.pengumuman') }}"
   class="flex items-center px-4 py-3 rounded-lg 
   {{ request()->routeIs('admin.pengumuman*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
    
    <i class="fas fa-bullhorn w-6"></i>
    <span class="ml-4">Pengumuman</span>
</a>
            <a href="{{ route('admin.penghargaan') }}"
                class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700">
                <i class="fas fa-award w-6"></i>
                <span class="ml-4">Penghargaan</span>
            </a>
<p class="px-4 mt-4 mb-2 text-xs text-gray-500 uppercase">Dokumen Publik</p>

<a href="{{ route('admin.ipk') }}"
   class="flex items-center px-4 py-3 rounded-lg 
   {{ request()->routeIs('admin.ipk*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
    
    <i class="fas fa-file-alt w-6"></i>
    <span class="ml-4">IPK Daerah</span>
</a>

<a href="{{ route('admin.mcsp') }}"
   class="flex items-center px-4 py-3 rounded-lg 
   {{ request()->routeIs('admin.mcsp*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
    
    <i class="fas fa-shield-alt w-6"></i>
    <span class="ml-4">MCSP KPK</span>
</a>

<a href="{{ route('admin.ppid.index') }}"
   class="flex items-center px-4 py-3 rounded-lg 
   {{ request()->routeIs('admin.ppid*') ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
    
    <i class="fas fa-bullhorn w-6"></i>
    <span class="ml-4">PPID</span>
</a>
        </nav>

        <!-- Logout fixed di bawah -->
        <div class="mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg text-left">
                    <i class="fas fa-sign-out-alt w-6"></i>
                    <span class="ml-4">Logout</span>
                </button>
            </form>
        </div>
    </div>

</aside>
