@extends('layouts.app')

@section('content')

<style>
/* Scroll Reveal Base */
.reveal {
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.9s cubic-bezier(0.16, 1, 0.3, 1);
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}

/* Delay Stagger */
.reveal.delay-1 { transition-delay: 0.1s; }
.reveal.delay-2 { transition-delay: 0.2s; }
.reveal.delay-3 { transition-delay: 0.3s; }
.reveal.delay-4 { transition-delay: 0.4s; }

/* Timeline Line */
.timeline-line {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 3px;
    background: linear-gradient(to bottom, #0d9488, #2dd4bf);
}
</style>

<main class="bg-gradient-to-b from-slate-50 via-white to-slate-100 min-h-screen">

    {{-- HERO --}}
    <section class="pt-28 pb-20 text-center reveal">
        <div class="container mx-auto px-6 max-w-4xl">
            <h1 class="text-5xl font-extrabold text-slate-800 tracking-tight">
                Profil Sekretaris Daerah
            </h1>
            <p class="mt-4 text-gray-500 text-lg">
                Pemerintah Kabupaten Jeneponto
            </p>
        </div>
    </section>

    {{-- PROFILE CARD --}}
    <section class="container mx-auto px-6 pb-24">
        <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl p-14 reveal">

            @isset($sekda)
            <div class="grid lg:grid-cols-2 gap-20 items-center">

                {{-- FOTO --}}
                <div class="relative flex justify-center reveal delay-1">
                    <div class="absolute w-80 h-80 bg-teal-500/20 blur-3xl rounded-full -z-10"></div>

                    <img src="{{ !empty($sekda->foto) ? asset('uploads/sekda/' . basename($sekda->foto)) : 'https://placehold.co/400x500/E2E8F0/334155?text=Foto+Sekda' }}"
                        alt="Foto {{ $sekda->nama }}"
                        class="rounded-3xl shadow-2xl w-80 h-[500px] object-cover transition duration-500 hover:scale-105">
                </div>

                {{-- INFORMASI --}}
                <div class="reveal delay-2">

                    <h2 class="text-3xl font-bold text-slate-800">
                        {{ $sekda->nama }}
                    </h2>

                    <p class="text-teal-600 font-semibold mt-2 text-lg">
                        Sekretaris Daerah Kabupaten Jeneponto
                    </p>

                    <div class="mt-12 space-y-8">

                        <div class="flex justify-between border-b pb-4">
                            <span class="text-gray-500">Tempat / Tanggal Lahir</span>
                            <span class="font-semibold text-slate-800 text-right">
                                {{ $sekda->tempat_lahir ?? '-' }},
                                {{ $sekda->tanggal_lahir ? \Carbon\Carbon::parse($sekda->tanggal_lahir)->translatedFormat('d F Y') : '-' }}
                            </span>
                        </div>

                        <div class="flex justify-between border-b pb-4">
                            <span class="text-gray-500">Agama</span>
                            <span class="font-semibold text-slate-800">
                                {{ $sekda->agama ?? '-' }}
                            </span>
                        </div>

                        <div class="flex justify-between border-b pb-4">
                            <span class="text-gray-500">Jabatan</span>
                            <span class="font-semibold text-slate-800 text-right">
                                Sekretaris Daerah
                            </span>
                        </div>

                        @if(!empty($sekda->sambutan))
                        <div class="border-b pb-4">
                            <span class="text-gray-500 block mb-2">Sambutan</span>
                            <div class="text-slate-700 text-sm leading-relaxed italic">
                                "{!! nl2br(e($sekda->sambutan)) !!}"
                            </div>
                        </div>
                        @endif

                    </div>

                    @if(!empty($sekda->file_lhkpn))
                        <div class="mt-8 pt-6 border-t border-gray-100 flex items-center">
                            <a href="{{ asset('uploads/lhkpn/' . basename($sekda->file_lhkpn)) }}" target="_blank" download
                               class="inline-flex items-center gap-3 px-6 py-3.5 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-semibold rounded-2xl shadow-lg shadow-red-500/25 transition duration-300 transform hover:-translate-y-0.5">
                                <i class="fas fa-file-pdf text-xl"></i>
                                <span>Unduh Dokumen LHKPN</span>
                                <i class="fas fa-arrow-down text-sm opacity-80"></i>
                            </a>
                        </div>
                    @endif

                </div>

            </div>

            {{-- RIWAYAT JABATAN --}}
            @if(!empty($sekda->riwayat_jabatan))
            <div class="mt-28 text-center reveal">
                <h3 class="text-3xl font-bold text-slate-800">
                    Riwayat Jabatan
                </h3>
            </div>

            <div class="mt-16 max-w-4xl mx-auto relative">
                <div class="timeline-line h-full"></div>

                <div class="space-y-12 relative">
                    @php
                        // Memisahkan riwayat jabatan per baris
                        $riwayatItems = array_filter(array_map('trim', explode("\n", $sekda->riwayat_jabatan)));
                    @endphp

                    @foreach($riwayatItems as $index => $item)
                        @php
                            $isEven = $index % 2 === 0;
                        @endphp
                        <div class="relative flex {{ $isEven ? 'justify-start' : 'justify-end' }} reveal delay-{{ ($index % 4) + 1 }}">
                            <div class="{{ $isEven ? 'w-1/2 pr-10 text-right' : 'w-1/2 pl-10 text-left' }}">
                                <div class="bg-slate-50 border border-slate-200 p-5 rounded-2xl shadow-sm hover:shadow-md transition">
                                    <p class="font-semibold text-slate-800 text-base">
                                        {{ $item }}
                                    </p>
                                </div>
                            </div>
                            <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-teal-600 rounded-full shadow-lg border-4 border-white top-5"></div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            @else
            <div class="text-center py-20">
                <i class="fas fa-user-tie text-6xl text-slate-300 mb-4 block"></i>
                <h3 class="text-xl font-bold text-slate-700">Data Sekretaris Daerah Belum Tersedia</h3>
                <p class="text-gray-500 mt-2">Silakan input data melalui admin panel.</p>
            </div>
            @endisset

        </div>
    </section>

</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const reveals = document.querySelectorAll(".reveal");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
            }
        });
    }, {
        threshold: 0.15
    });

    reveals.forEach(reveal => {
        observer.observe(reveal);
    });
});
</script>
@endsection
