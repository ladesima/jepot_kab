@extends('layouts.admin')

@section('title', 'Manajemen Sekretaris Daerah')

@section('content')
<div class="max-w-4xl mx-auto py-4">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Sekretaris Daerah</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola data profil dan riwayat jabatan Sekretaris Daerah.</p>
        </div>
        <a href="{{ route('user.sekretaris-daerah') }}" target="_blank"
           class="inline-flex items-center px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold rounded-lg shadow transition">
            <i class="fas fa-external-link-alt mr-2"></i> Lihat Halaman Publik
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-300 text-emerald-800 px-4 py-3 rounded-lg mb-6 flex items-center">
            <i class="fas fa-check-circle text-emerald-600 mr-3 text-lg"></i>
            <span class="font-medium text-sm">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-rose-50 border border-rose-300 text-rose-800 px-4 py-3 rounded-lg mb-6">
            <div class="font-bold mb-1 flex items-center">
                <i class="fas fa-exclamation-triangle mr-2 text-rose-600"></i> Terjadi kesalahan:
            </div>
            <ul class="list-disc list-inside text-xs space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-2xl p-8 border border-gray-100">

        <form
            action="{{ isset($sekda) && $sekda->exists ? route('admin.sekretaris-daerah.update', $sekda->id) : route('admin.sekretaris-daerah.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @if(isset($sekda) && $sekda->exists)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- NAMA --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap & Gelar <span class="text-rose-500">*</span></label>
                    <input type="text"
                           name="nama"
                           value="{{ old('nama', $sekda->nama ?? '') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-teal-500 focus:outline-none"
                           placeholder="Contoh: H. MUHAMMAD ARIFIN NUR, S.H., M.H."
                           required>
                </div>

                {{-- JABATAN --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan</label>
                    <input type="text"
                           value="Sekretaris Daerah Kabupaten Jeneponto"
                           class="w-full border border-gray-200 bg-gray-50 text-gray-600 rounded-lg px-4 py-2.5 text-sm cursor-not-allowed"
                           readonly>
                </div>

                {{-- AGAMA --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Agama</label>
                    <select name="agama" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-teal-500 focus:outline-none">
                        <option value="">-- Pilih Agama --</option>
                        @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
                            <option value="{{ $agama }}"
                                {{ (old('agama', $sekda->agama ?? '') == $agama) ? 'selected' : '' }}>
                                {{ $agama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- TEMPAT LAHIR --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Tempat Lahir</label>
                    <input type="text"
                           name="tempat_lahir"
                           value="{{ old('tempat_lahir', $sekda->tempat_lahir ?? '') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-teal-500 focus:outline-none"
                           placeholder="Contoh: Jeneponto">
                </div>

                {{-- TANGGAL LAHIR --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Tanggal Lahir</label>
                    <input type="date"
                           name="tanggal_lahir"
                           value="{{ old('tanggal_lahir', isset($sekda->tanggal_lahir) ? \Carbon\Carbon::parse($sekda->tanggal_lahir)->format('Y-m-d') : '') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-teal-500 focus:outline-none">
                </div>

                {{-- FOTO --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Foto Resmi</label>
                    <input type="file" name="foto" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm text-gray-700 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
                    <p class="text-xs text-gray-400 mt-1">Format: JPG, JPEG, PNG, WEBP. Maks: 2MB.</p>

                    @if(!empty($sekda->foto))
                        <div class="mt-3 flex items-center space-x-3">
                            <img src="{{ asset('uploads/sekda/' . basename($sekda->foto)) }}"
                                 alt="Foto Sekda"
                                 class="w-24 h-32 object-cover rounded-xl shadow-md border border-gray-200">
                            <span class="text-xs text-gray-500">Foto saat ini</span>
                        </div>
                    @endif
                </div>

                {{-- DOKUMEN LHKPN --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Dokumen LHKPN (PDF)</label>
                    <input type="file" name="file_lhkpn" accept=".pdf,application/pdf"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm text-gray-700 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                    <p class="text-xs text-gray-400 mt-1">Format: PDF (Maksimal 25MB). Kosongkan jika tidak ingin mengubah dokumen.</p>

                    @if(!empty($sekda->file_lhkpn))
                        <div class="mt-3 flex items-center justify-between p-3.5 bg-gray-50 border border-gray-200 rounded-xl">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-lg bg-red-100 text-red-600 flex items-center justify-center text-lg">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-700">Dokumen LHKPN Tersedia</p>
                                    <a href="{{ asset('uploads/lhkpn/' . basename($sekda->file_lhkpn)) }}" target="_blank"
                                       class="text-xs text-blue-600 hover:text-blue-800 underline inline-flex items-center mt-0.5">
                                        <i class="fas fa-external-link-alt mr-1"></i> Buka / Lihat File LHKPN
                                    </a>
                                </div>
                            </div>
                            <span class="text-xs font-semibold px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-full">Sudah Diupload</span>
                        </div>
                    @endif
                </div>

                {{-- RIWAYAT JABATAN --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Riwayat Jabatan</label>
                    <p class="text-xs text-gray-400 mb-1.5">Tuliskan riwayat jabatan satu per baris (tekan Enter untuk baris baru).</p>
                    <textarea name="riwayat_jabatan"
                              rows="6"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-teal-500 focus:outline-none"
                              placeholder="Contoh:&#10;Kepala Bagian Organisasi Setda Jeneponto (2015 – 2018)&#10;Kepala Bappeda Kabupaten Jeneponto (2018 – 2021)&#10;Sekretaris Daerah Kabupaten Jeneponto (2021 – Sekarang)">{{ old('riwayat_jabatan', $sekda->riwayat_jabatan ?? '') }}</textarea>
                </div>

                {{-- SAMBUTAN --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Sambutan / Pesan</label>
                    <textarea name="sambutan"
                              rows="4"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-teal-500 focus:outline-none"
                              placeholder="Tuliskan kata sambutan singkat dari Sekretaris Daerah (opsional)...">{{ old('sambutan', $sekda->sambutan ?? '') }}</textarea>
                </div>

            </div>

            {{-- SUBMIT --}}
            <div class="mt-8 flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-md transition">
                    <i class="fas fa-save mr-2"></i> {{ isset($sekda) && $sekda->exists ? 'Perbarui Data Sekda' : 'Simpan Data Sekda' }}
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
