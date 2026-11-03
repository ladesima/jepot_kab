@extends('layouts.app')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@section('content')

<section class="py-10 bg-gray-50">

<div class="container mx-auto px-6">

<!-- Judul -->
<div class="mb-6">
<h1 class="text-3xl font-semibold text-gray-700">
Indeks Pengelolaan Keuangan Daerah
</h1>

<div class="text-sm text-gray-500 mt-2">
<a href="/" class="text-blue-500">Beranda</a> / IPK
</div>
</div>


<!-- Filter -->
<div class="bg-white shadow rounded-lg p-4 mb-6">

<form method="GET" class="flex items-center gap-3">

<select name="tahun"
class="border rounded px-3 py-2">

@for($year = date('Y'); $year >= 2020; $year--)
<option value="{{ $year }}">
{{ $year }}
</option>
@endfor

</select>

<button class="bg-blue-500 text-white px-4 py-2 rounded">
Cari
</button>

<a href="{{ route('ipk') }}"
class="bg-yellow-400 px-4 py-2 rounded">
Reset
</a>

</form>

</div>


<!-- Table -->
<div class="bg-white shadow rounded-lg overflow-hidden">

<table class="w-full text-sm">

<thead class="bg-gray-100">
<tr class="text-left">
<th class="p-3">No</th>
<th class="p-3">Dokumen</th>
<th class="p-3">Tahun</th>
<th class="p-3">Tgl. Upload</th>
<th class="p-3 text-center">Aksi</th>
</tr>
</thead>

<tbody>

@forelse($data as $index => $item)

<tr class="border-t hover:bg-gray-50 transition">

<td class="p-3">
{{ $index + 1 }}
</td>

<td class="p-3 font-medium text-gray-800">
{{ $item->judul_dokumen }}
</td>

<td class="p-3">
{{ $item->tahun }}
</td>

<td class="p-3">
{{ \Carbon\Carbon::parse($item->tanggal_upload)->format('d-m-Y') }}
</td>

<td class="text-center p-3">
<div class="flex items-center justify-center gap-2 flex-wrap">
    <!-- Tombol Preview (Halaman Web Baru dengan Frame Preview) -->
    <a href="{{ route('ipk.show', $item->id) }}" target="_blank" rel="noopener noreferrer"
        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-medium transition shadow-sm hover:shadow"
        title="Buka Halaman Preview Dokumen di Tab Baru">
        <i class="fas fa-eye text-sm"></i>
        <span>Lihat</span>
    </a>

    <!-- Tombol Salin Link Halaman Preview -->
    <button type="button"
        onclick="copyDirectLink('{{ route('ipk.show', $item->id) }}', this)"
        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 border border-gray-300 rounded-lg text-xs font-medium transition shadow-sm hover:shadow"
        title="Salin Link Halaman Dokumen">
        <i class="fas fa-link text-sm"></i>
        <span class="btn-text">Salin Link</span>
    </button>

    <!-- Tombol Unduh (Download hanya saat tombol ini ditekan) -->
    <a href="{{ route('ipk.download', $item->id) }}"
        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-medium transition shadow-sm hover:shadow"
        title="Unduh Dokumen">
        <i class="fas fa-download text-sm"></i>
        <span>Unduh</span>
    </a>
</div>
</td>

</tr>

@empty
<tr>
    <td colspan="5" class="p-6 text-center text-gray-500">
        Belum ada dokumen IPK yang tersedia.
    </td>
</tr>
@endforelse

</tbody>

</table>

</div>

</div>

</section>

<!-- Toast Notifikasi Salin Link -->
<div id="copyToast" class="fixed bottom-5 right-5 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none">
    <div class="bg-gray-900 text-white px-4 py-3 rounded-xl shadow-2xl flex items-center gap-3 border border-gray-700">
        <div class="w-7 h-7 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
            <i class="fas fa-check text-sm"></i>
        </div>
        <div>
            <p class="text-sm font-semibold text-white">Link Berhasil Disalin!</p>
            <p class="text-xs text-gray-300">Link preview dokumen siap dibagikan.</p>
        </div>
    </div>
</div>

<script>
    function copyDirectLink(url, btnElement) {
        // Pastikan URL selalu menggunakan protokol yang sama dengan halaman (HTTPS)
        if (window.location.protocol === 'https:' && url.startsWith('http://')) {
            url = url.replace('http://', 'https://');
        }

        // Salin ke clipboard
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url).then(() => {
                showCopyFeedback(btnElement);
            }).catch(() => {
                fallbackCopy(url, btnElement);
            });
        } else {
            fallbackCopy(url, btnElement);
        }
    }

    function fallbackCopy(text, btnElement) {
        const tempInput = document.createElement('input');
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        try {
            document.execCommand('copy');
            showCopyFeedback(btnElement);
        } catch (err) {
            alert('Gagal menyalin link.');
        }
        document.body.removeChild(tempInput);
    }

    function showCopyFeedback(btnElement) {
        // Efek visual pada tombol
        if (btnElement) {
            const originalHtml = btnElement.innerHTML;
            btnElement.innerHTML = '<i class="fas fa-check text-emerald-600 text-sm"></i> <span class="text-emerald-700 font-semibold">Tersalin!</span>';
            btnElement.classList.add('bg-emerald-50', 'border-emerald-300');
            setTimeout(() => {
                btnElement.innerHTML = originalHtml;
                btnElement.classList.remove('bg-emerald-50', 'border-emerald-300');
            }, 2000);
        }

        // Tampilkan Toast Notifikasi
        const toast = document.getElementById('copyToast');
        if (toast) {
            toast.classList.remove('translate-y-20', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }
    }
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
@endsection