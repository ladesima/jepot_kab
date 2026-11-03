@extends('layouts.app')

@section('content')

<style>
/* Scroll Reveal Base */
.reveal {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}

.reveal.delay-1 { transition-delay: 0.1s; }
.reveal.delay-2 { transition-delay: 0.2s; }
</style>

<main class="bg-gradient-to-b from-slate-50 via-white to-slate-100 dark:from-slate-900 dark:via-slate-900 dark:to-slate-950 min-h-screen transition-colors duration-300">

    {{-- HERO --}}
    <section class="pt-28 pb-16 text-center reveal">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="inline-flex items-center justify-center p-3 mb-6 rounded-3xl bg-white dark:bg-slate-800 shadow-xl shadow-blue-500/10 border border-slate-100 dark:border-slate-700 transition-colors duration-300">
                <img src="{{ asset('images/new_logo.png') }}" alt="Logo Kabupaten Jeneponto" class="h-20 w-auto object-contain drop-shadow">
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 dark:text-white tracking-tight">
                PPID
            </h1>
            <p class="mt-3 text-gray-500 dark:text-gray-400 text-lg">
                Pejabat Pengelola Informasi dan Dokumentasi — Kabupaten Jeneponto
            </p>
        </div>
    </section>

    {{-- TABEL PPID --}}
    <section class="container mx-auto px-6 pb-24">
        <div class="max-w-7xl mx-auto reveal delay-1">

            <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-2xl overflow-hidden border border-gray-100 dark:border-slate-700 transition-colors duration-300">

                {{-- Header Tabel --}}
                <div class="bg-gradient-to-r from-blue-700 to-blue-800 px-8 py-5 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-table text-white text-lg"></i>
                        <h2 class="text-white font-bold text-lg">Daftar Badan Publik</h2>
                    </div>
                    <span class="text-blue-200 text-sm font-medium">{{ $ppids->count() }} Instansi</span>
                </div>

                {{-- Tabel --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-slate-100 dark:bg-slate-900/80 border-b border-slate-200 dark:border-slate-700 transition-colors">
                                <th class="px-6 py-4 text-center font-bold text-slate-600 dark:text-slate-300 w-16">No.</th>
                                <th class="px-6 py-4 text-left font-bold text-slate-600 dark:text-slate-300">Badan Publik</th>
                                <th class="px-6 py-4 text-left font-bold text-slate-600 dark:text-slate-300">Alamat</th>
                                <th class="px-6 py-4 text-left font-bold text-slate-600 dark:text-slate-300">Ruang Lingkup Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-slate-700">
                            @forelse($ppids as $index => $ppid)
                                <tr class="hover:bg-blue-50/50 dark:hover:bg-slate-700/50 transition duration-200">
                                    <td class="px-6 py-4 text-center font-bold text-slate-500 dark:text-slate-400">{{ $index + 1 }}.</td>
                                    <td class="px-6 py-4 font-semibold text-slate-800 dark:text-slate-100">{{ $ppid->badan_publik }}</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300 leading-relaxed">{{ $ppid->alamat }}</td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300 leading-relaxed">{{ $ppid->ruang_lingkup }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-16 text-center text-gray-400 dark:text-gray-500">
                                        <i class="fas fa-inbox text-5xl mb-4 block text-gray-300 dark:text-gray-600"></i>
                                        <p class="font-semibold text-lg">Data belum tersedia</p>
                                        <p class="text-sm mt-1">Data PPID akan ditampilkan setelah diinput oleh admin.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>

</main>

{{-- SCROLL REVEAL SCRIPT --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.15 });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    });
</script>
@endsection
