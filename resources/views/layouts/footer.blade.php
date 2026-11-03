<footer class="bg-slate-900 text-gray-300 pt-16 pb-8">

    <div class="container mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- ================= TENTANG ================= -->
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Tentang Kami</h3>
                <p class="text-gray-400 leading-relaxed">
                    Portal resmi informasi dan layanan publik Pemerintah Kabupaten Jeneponto.
                    Menyajikan informasi pemerintahan, berita daerah, statistik, dan layanan digital.
                </p>

                <div class="flex space-x-4 mt-6">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- ================= NAVIGASI ================= -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">
                    Navigasi
                </h3>

                <ul class="space-y-3 text-sm">

                    <li>
                        <a href="{{ url('/') }}" class="hover:text-white transition">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.bupati') }}" class="hover:text-white transition">
                            Kepala Daerah
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pemerintahan') }}" class="hover:text-white transition">
                            Kepala OPD
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.struktur-organisasi') }}" class="hover:text-white transition">
                            Struktur Organisasi
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kecamatan.index') }}" class="hover:text-white transition">
                            Desa
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.visi-misi') }}" class="hover:text-white transition">
                            Visi dan Misi
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.gambaran-umum') }}" class="hover:text-white transition">
                            Gambaran Umum
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.ruang-lingkup-pemerintahan') }}" class="hover:text-white transition">
                            Ruang Lingkup Pemerintahan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.data-statistik') }}" class="hover:text-white transition">
                            Data Statistik
                        </a>
                    </li>

                </ul>
            </div>

            <!-- ================= LOKASI ================= -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Lokasi Kami</h3>

                <div class="rounded-lg overflow-hidden shadow-lg">
                    <iframe 
                        src="https://www.google.com/maps?q=Jeneponto&output=embed"
                        width="100%" 
                        height="200" 
                        style="border:0;" 
                        allowfullscreen 
                        loading="lazy">
                    </iframe>
                </div>
            </div>

            <!-- ================= STATISTIK ================= -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Statistik Pengunjung</h3>

                <div class="space-y-3 text-sm">

                    <div class="flex justify-between">
                        <span>Total Pengunjung</span>
                        <span id="total" class="text-red-400 font-bold">0</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Hari Ini</span>
                        <span id="today" class="text-green-400 font-bold">0</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Minggu Ini</span>
                        <span id="week" class="text-blue-400 font-bold">0</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Bulan Ini</span>
                        <span id="month" class="text-yellow-400 font-bold">0</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Tahun Ini</span>
                        <span id="year" class="text-orange-400 font-bold">0</span>
                    </div>

                </div>
            </div>

        </div>

        <!-- ================= COPYRIGHT ================= -->
        <div class="mt-12 border-t border-gray-800 pt-6 text-center text-sm text-gray-500">
            <p>&copy; 2026 Pemerintah Kabupaten Jeneponto. All rights reserved.</p>
            <p>Designed & Developed by</p>
            <p>Dinas Komunikasi,Informatika dan Statistik</p>
            <p>Muhammad Musyary, S.Kom.</p>
            </p>
        </div>

    </div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    async function loadVisitorStats() {
        try {
            const response = await fetch("/visitor-stats");
            const data = await response.json();

            if (document.getElementById("total"))
                document.getElementById("total").innerText = data.total;

            if (document.getElementById("today"))
                document.getElementById("today").innerText = data.today;

            if (document.getElementById("week"))
                document.getElementById("week").innerText = data.week;

            if (document.getElementById("month"))
                document.getElementById("month").innerText = data.month;

            if (document.getElementById("year"))
                document.getElementById("year").innerText = data.year;

        } catch (error) {
            console.error("Visitor Stats Error:", error);
        }
    }

    loadVisitorStats();
    setInterval(loadVisitorStats, 10000);

});
</script>
</footer>

<!-- ================= SCRIPT REALTIME ================= -->
