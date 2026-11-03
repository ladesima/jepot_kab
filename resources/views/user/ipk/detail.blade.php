@extends('layouts.app')

@section('meta_tags')
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $dokumen->judul_dokumen }}">
    <meta property="og:description" content="Dokumen Indeks Pengelolaan Keuangan Daerah (IPK) - {{ $dokumen->judul_dokumen }}">
    <meta property="og:image" content="{{ asset('images/new_logo.png') }}">
@endsection

@section('content')
<section class="py-12 sm:py-16 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <!-- Breadcrumb -->
        <nav class="flex mb-6 text-sm text-gray-500" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600 transition">
                        <i class="fas fa-home mr-1"></i> Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-xs text-gray-400 mx-2"></i>
                        <a href="{{ route('ipk') }}" class="text-gray-600 hover:text-blue-600 transition">IPK</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-xs text-gray-400 mx-2"></i>
                        <span class="text-gray-400 line-clamp-1 max-w-xs sm:max-w-md">{{ $dokumen->judul_dokumen }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- ================= LEFT CONTENT (PREVIEW UTAMA) ================= -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-4 sm:p-8">

                    <!-- Judul Dokumen -->
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-3 leading-snug">
                        {{ $dokumen->judul_dokumen }}
                    </h1>

                    <!-- Informasi Meta (Tanggal Upload & Tahun) -->
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 pb-5 border-b border-gray-100">
                        <div class="flex items-center gap-1.5">
                            <i class="far fa-calendar-alt text-blue-600"></i>
                            <span>Tanggal Upload: <strong>{{ \Carbon\Carbon::parse($dokumen->tanggal_upload)->format('d F Y') }}</strong></span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <i class="fas fa-tag text-emerald-600"></i>
                            <span>Tahun: <strong>{{ $dokumen->tahun }}</strong></span>
                        </div>
                    </div>

                    <!-- Tombol Aksi (Unduh, Salin Link, Kembali) -->
                    <div class="flex flex-wrap items-center gap-3 my-6">
                        <a href="{{ route('ipk.download', $dokumen->id) }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow-sm hover:shadow transition">
                            <i class="fas fa-download"></i>
                            <span>Unduh Dokumen</span>
                        </a>

                        <button type="button" onclick="copyCurrentUrl(this)"
                            class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-xl border border-gray-300 transition">
                            <i class="fas fa-link"></i>
                            <span>Salin Link</span>
                        </button>

                        <a href="{{ route('ipk') }}"
                            class="inline-flex items-center gap-2 px-4 py-2.5 bg-white hover:bg-gray-50 text-gray-600 text-sm font-medium rounded-xl border border-gray-200 transition ml-auto">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali ke Daftar</span>
                        </a>
                    </div>

                    <!-- Kotak Preview Dokumen -->
                    <div class="mt-4 border border-gray-300 rounded-2xl overflow-hidden shadow-md bg-gray-900">
                        @php
                            $ext = strtolower(pathinfo($dokumen->file, PATHINFO_EXTENSION));
                            $fileUrl = route('ipk.file', $dokumen->id);
                        @endphp

                        @if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg']))
                            <!-- Preview Gambar (Semua Perangkat) -->
                            <div class="p-4 flex items-center justify-center min-h-[400px] sm:min-h-[500px] bg-gray-100">
                                <img src="{{ $fileUrl }}" 
                                     alt="{{ $dokumen->judul_dokumen }}" 
                                     class="max-w-full max-h-[800px] rounded-lg shadow object-contain" />
                            </div>
                        @else
                            <!-- ================= 1. VERSI PC / DESKTOP (Native Browser Iframe) ================= -->
                            <div class="hidden md:block w-full">
                                <iframe 
                                    src="{{ $fileUrl }}"
                                    width="100%" 
                                    height="850"
                                    class="w-full border-0 bg-white"
                                    title="Preview Dokumen {{ $dokumen->judul_dokumen }}">
                                </iframe>
                            </div>

                            <!-- ================= 2. VERSI ANDROID / HP / TABLET (HTML5 Canvas Reader) ================= -->
                            <div class="block md:hidden w-full">
                                <!-- Toolbar Mobile Reader -->
                                <div class="bg-gray-800 text-white px-3 py-2.5 flex items-center justify-between gap-2 border-b border-gray-700 text-xs select-none">
                                    <div class="flex items-center gap-1.5">
                                        <button type="button" id="m-prev-page" class="p-1.5 px-2.5 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition disabled:opacity-40">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <span class="text-xs text-gray-200 font-medium whitespace-nowrap">
                                            Hal <span id="m-page-num" class="font-bold text-blue-400">1</span> / <span id="m-page-count">-</span>
                                        </span>
                                        <button type="button" id="m-next-page" class="p-1.5 px-2.5 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition disabled:opacity-40">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>

                                    <div class="flex items-center gap-1">
                                        <button type="button" id="m-zoom-out" class="p-1.5 px-2 bg-gray-700 hover:bg-gray-600 rounded-lg" title="Perkecil">
                                            <i class="fas fa-minus text-[10px]"></i>
                                        </button>
                                        <span id="m-zoom-text" class="text-[11px] text-gray-300 min-w-[32px] text-center font-mono">Fit</span>
                                        <button type="button" id="m-zoom-in" class="p-1.5 px-2 bg-gray-700 hover:bg-gray-600 rounded-lg" title="Perbesar">
                                            <i class="fas fa-plus text-[10px]"></i>
                                        </button>
                                        <button type="button" id="m-btn-fit" class="p-1.5 px-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-[11px]" title="Fit Layar HP">
                                            Fit
                                        </button>
                                    </div>
                                </div>

                                <!-- Container Canvas Mobile -->
                                <div id="m-pdf-container" class="relative w-full h-[68vh] overflow-auto bg-gray-800 p-2 flex flex-col items-center justify-start">
                                    <!-- Loading Spinner Mobile -->
                                    <div id="m-pdf-loader" class="absolute inset-0 bg-gray-900/90 flex flex-col items-center justify-center text-white z-20">
                                        <div class="w-9 h-9 border-4 border-blue-500 border-t-transparent rounded-full animate-spin mb-2"></div>
                                        <p class="text-xs font-medium">Memuat halaman PDF...</p>
                                    </div>

                                    <!-- Canvas Tempat Gambar PDF di HP -->
                                    <div class="relative bg-white shadow-xl rounded-sm overflow-hidden flex justify-center my-auto">
                                        <canvas id="m-the-canvas" class="max-w-full h-auto block"></canvas>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            <!-- ================= RIGHT SIDEBAR ================= -->
            <div class="space-y-6">

                <!-- Dokumen IPK Lainnya -->
                @if(isset($dokumenLainnya) && $dokumenLainnya->count() > 0)
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                        <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                            <i class="fas fa-folder-open text-blue-600"></i>
                            Dokumen IPK Lainnya
                        </h3>

                        <div class="space-y-3">
                            @foreach($dokumenLainnya as $item)
                                <a href="{{ route('ipk.show', $item->id) }}" class="block group p-2.5 rounded-lg hover:bg-gray-50 transition border border-transparent hover:border-gray-200">
                                    <p class="text-sm font-semibold text-gray-800 group-hover:text-blue-600 leading-snug line-clamp-2">
                                        {{ $item->judul_dokumen }}
                                    </p>
                                    <div class="flex items-center gap-3 mt-1.5 text-xs text-gray-400">
                                        <span><i class="far fa-calendar-alt mr-1"></i>{{ \Carbon\Carbon::parse($item->tanggal_upload)->format('d-m-Y') }}</span>
                                        <span><i class="fas fa-tag mr-1"></i>{{ $item->tahun }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Berita Terbaru -->
                @if(isset($recentBerita) && $recentBerita->count() > 0)
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                        <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                            <i class="fas fa-newspaper text-emerald-600"></i>
                            Berita Terbaru
                        </h3>

                        <div class="space-y-3">
                            @foreach($recentBerita as $berita)
                                <a href="{{ route('berita.show', $berita->id) }}" class="block group p-2 rounded-lg hover:bg-gray-50 transition">
                                    <p class="text-sm font-medium text-gray-800 group-hover:text-blue-600 leading-snug line-clamp-2">
                                        {{ $berita->judul }}
                                    </p>
                                    <span class="text-xs text-gray-400 mt-1 block">
                                        {{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

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
            <p class="text-xs text-gray-300">Link halaman preview dokumen siap dibagikan.</p>
        </div>
    </div>
</div>

@if(!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg']))
<!-- Script PDF.js Khusus Mobile (Android / HP / Tablet) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hanya inisialisasi PDF.js canvas jika dibuka pada layar mobile (< 768px) atau sentuh
        const isMobileScreen = window.innerWidth < 768;
        if (!isMobileScreen) return;

        const url = "{{ $fileUrl }}";
        const container = document.getElementById('m-pdf-container');
        const canvas = document.getElementById('m-the-canvas');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        const loader = document.getElementById('m-pdf-loader');
        const pageNumEl = document.getElementById('m-page-num');
        const pageCountEl = document.getElementById('m-page-count');
        const zoomTextEl = document.getElementById('m-zoom-text');
        const prevBtn = document.getElementById('m-prev-page');
        const nextBtn = document.getElementById('m-next-page');

        let pdfDoc = null;
        let pageNum = 1;
        let pageRendering = false;
        let pageNumPending = null;
        let scale = 1.0;
        let fitToWidth = true;

        try {
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';
        } catch(e) {}

        const loadingTask = pdfjsLib.getDocument({
            url: url,
            cMapUrl: 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/cmaps/',
            cMapPacked: true
        });

        loadingTask.promise.then(function(pdf) {
            pdfDoc = pdf;
            pageCountEl.textContent = pdf.numPages;
            loader.classList.add('hidden');
            renderPage(pageNum);
        }).catch(function(err) {
            console.error(err);
            loader.innerHTML = `
                <div class="p-4 text-center text-white">
                    <p class="text-xs mb-2">Gagal memuat preview otomatis.</p>
                    <a href="{{ route('ipk.download', $dokumen->id) }}" class="px-3 py-1.5 bg-blue-600 text-white rounded-lg text-xs font-semibold">
                        Unduh Dokumen
                    </a>
                </div>
            `;
        });

        function renderPage(num) {
            pageRendering = true;
            pdfDoc.getPage(num).then(function(page) {
                const unscaledViewport = page.getViewport({ scale: 1.0 });

                let currentScale = scale;
                if (fitToWidth) {
                    const availableWidth = container.clientWidth - 20;
                    currentScale = availableWidth / unscaledViewport.width;
                    if (currentScale > 2.0) currentScale = 2.0;
                    if (currentScale < 0.4) currentScale = 0.4;
                }

                const viewport = page.getViewport({ scale: currentScale });
                const outputScale = window.devicePixelRatio || 1;

                canvas.width = Math.floor(viewport.width * outputScale);
                canvas.height = Math.floor(viewport.height * outputScale);
                canvas.style.width = Math.floor(viewport.width) + "px";
                canvas.style.height = Math.floor(viewport.height) + "px";

                const transform = outputScale !== 1 ? [outputScale, 0, 0, outputScale, 0, 0] : null;

                const renderContext = {
                    canvasContext: ctx,
                    transform: transform,
                    viewport: viewport
                };

                const renderTask = page.render(renderContext);

                renderTask.promise.then(function() {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });

                pageNumEl.textContent = num;
                prevBtn.disabled = num <= 1;
                nextBtn.disabled = num >= pdfDoc.numPages;
                zoomTextEl.textContent = fitToWidth ? 'Fit' : Math.round(scale * 100) + '%';
            });
        }

        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        prevBtn.addEventListener('click', function() {
            if (pageNum <= 1) return;
            pageNum--;
            queueRenderPage(pageNum);
            container.scrollTop = 0;
        });

        nextBtn.addEventListener('click', function() {
            if (!pdfDoc || pageNum >= pdfDoc.numPages) return;
            pageNum++;
            queueRenderPage(pageNum);
            container.scrollTop = 0;
        });

        document.getElementById('m-zoom-in')?.addEventListener('click', function() {
            fitToWidth = false;
            scale = Math.min(scale + 0.25, 2.5);
            queueRenderPage(pageNum);
        });

        document.getElementById('m-zoom-out')?.addEventListener('click', function() {
            fitToWidth = false;
            scale = Math.max(scale - 0.25, 0.4);
            queueRenderPage(pageNum);
        });

        document.getElementById('m-btn-fit')?.addEventListener('click', function() {
            fitToWidth = true;
            scale = 1.0;
            queueRenderPage(pageNum);
        });

        window.addEventListener('resize', function() {
            if (fitToWidth && pdfDoc) {
                queueRenderPage(pageNum);
            }
        });
    });
</script>
@endif

<script>
    function copyCurrentUrl(btnElement) {
        let url = window.location.href;
        if (window.location.protocol === 'https:' && url.startsWith('http://')) {
            url = url.replace('http://', 'https://');
        }

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
        if (btnElement) {
            const originalHtml = btnElement.innerHTML;
            btnElement.innerHTML = '<i class="fas fa-check text-emerald-600"></i> <span class="text-emerald-700 font-semibold">Tersalin!</span>';
            btnElement.classList.add('bg-emerald-50', 'border-emerald-300');
            setTimeout(() => {
                btnElement.innerHTML = originalHtml;
                btnElement.classList.remove('bg-emerald-50', 'border-emerald-300');
            }, 2000);
        }

        const toast = document.getElementById('copyToast');
        if (toast) {
            toast.classList.remove('translate-y-20', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }
    }
</script>
@endsection
