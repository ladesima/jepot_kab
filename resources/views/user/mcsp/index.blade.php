@extends('layouts.app')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@section('content')

<section class="py-10 bg-gray-50">

<div class="container mx-auto px-6">

<!-- Judul -->
<div class="mb-6">

<h1 class="text-3xl font-semibold text-gray-700">
MCSP KORSUPGAH KPK
</h1>

<div class="text-sm text-gray-500 mt-2">
<a href="/" class="text-blue-500">Beranda</a> / MCSP KORSUPGAH KPK
</div>

</div>


<div class="bg-white shadow rounded-lg overflow-hidden">

<table class="w-full text-sm">

<thead class="bg-gray-100">
<tr>
<th class="p-3 text-left">No</th>
<th class="p-3 text-left">Dokumen</th>
<th class="p-3 text-left">Tahun</th>
<th class="p-3 text-left">Tgl. Upload</th>
<th class="p-3 text-center">Unduh</th>
</tr>
</thead>

<tbody>

@foreach($data as $index => $item)

<tr class="border-t">

<td class="p-3">
{{ $index + 1 }}
</td>

<td class="p-3">
{{ $item->judul_dokumen }}
</td>

<td class="p-3">
{{ $item->tahun }}
</td>

<td class="p-3">
{{ \Carbon\Carbon::parse($item->tanggal_upload)->format('d-m-Y') }}
</td>

<td class="p-3 text-center">
<a href="{{ upload_asset($item->file, 'mcsp') }}"
class="text-blue-500 text-lg">

<i class="fa fa-download"></i>

</a>
</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</section>
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
@endsection