@extends('layouts.admin')

@section('title', 'Manajemen PPID')

@section('content')
<div class="max-w-7xl mx-auto py-4">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Data PPID</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola data Badan Publik, Alamat, dan Ruang Lingkup Kegiatan.</p>
        </div>
        <a href="{{ route('user.ppid') }}" target="_blank"
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow transition">
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

    {{-- FORM TAMBAH DATA --}}
    <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-100 mb-8">
        <h2 class="text-lg font-bold text-gray-700 mb-4 flex items-center">
            <i class="fas fa-plus-circle text-blue-500 mr-2"></i> Tambah Data PPID Baru
        </h2>

        <form action="{{ route('admin.ppid.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Badan Publik <span class="text-rose-500">*</span></label>
                    <input type="text" name="badan_publik" value="{{ old('badan_publik') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="Contoh: Sekretariat Daerah" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Alamat <span class="text-rose-500">*</span></label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="Contoh: Jl. Lanto Dg. Pasewang No. 34" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Ruang Lingkup Kegiatan <span class="text-rose-500">*</span></label>
                    <input type="text" name="ruang_lingkup" value="{{ old('ruang_lingkup') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="Contoh: penyusunan kebijakan, pengoordinasian seluruh OPD" required>
                </div>
            </div>
            <div class="mt-5 flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-md transition text-sm">
                    <i class="fas fa-save mr-2"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>

    {{-- TABEL DATA PPID --}}
    <div class="bg-white shadow-md rounded-2xl border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-lg font-bold text-gray-700 flex items-center">
                <i class="fas fa-table text-blue-500 mr-2"></i> Daftar Badan Publik PPID
            </h2>
            <span class="text-xs text-gray-400">Total: {{ $ppids->count() }} data</span>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-slate-700 text-white">
                        <th class="px-4 py-3 text-center font-semibold w-12">No.</th>
                        <th class="px-4 py-3 text-left font-semibold">Badan Publik</th>
                        <th class="px-4 py-3 text-left font-semibold">Alamat</th>
                        <th class="px-4 py-3 text-left font-semibold">Ruang Lingkup Kegiatan</th>
                        <th class="px-4 py-3 text-center font-semibold w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($ppids as $index => $ppid)
                        <tr class="hover:bg-blue-50/50 transition" id="row-{{ $ppid->id }}">
                            <td class="px-4 py-3 text-center text-gray-500 font-semibold">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $ppid->badan_publik }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $ppid->alamat }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $ppid->ruang_lingkup }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    {{-- Tombol Edit --}}
                                    <button onclick="openEditModal({{ $ppid->id }}, '{{ addslashes($ppid->badan_publik) }}', '{{ addslashes($ppid->alamat) }}', '{{ addslashes($ppid->ruang_lingkup) }}')"
                                            class="inline-flex items-center px-2.5 py-1.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg text-xs font-semibold transition">
                                        <i class="fas fa-pencil-alt mr-1"></i> Edit
                                    </button>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.ppid.destroy', $ppid->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-2.5 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg text-xs font-semibold transition">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                <i class="fas fa-inbox text-4xl mb-3 block"></i>
                                <p class="font-semibold">Belum ada data PPID</p>
                                <p class="text-xs mt-1">Silakan tambahkan data menggunakan form di atas.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- MODAL EDIT --}}
<div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-xl p-6 relative">
        <button onclick="closeEditModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-lg">
            <i class="fas fa-times"></i>
        </button>

        <h3 class="text-lg font-bold text-gray-800 mb-5 flex items-center">
            <i class="fas fa-edit text-amber-500 mr-2"></i> Edit Data PPID
        </h3>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Badan Publik</label>
                    <input type="text" name="badan_publik" id="edit_badan_publik"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" id="edit_alamat" rows="2"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Ruang Lingkup Kegiatan</label>
                    <textarea name="ruang_lingkup" id="edit_ruang_lingkup" rows="3"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" required></textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg text-sm font-semibold transition">
                    Batal
                </button>
                <button type="submit"
                        class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-bold shadow transition">
                    <i class="fas fa-save mr-1"></i> Perbarui
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, badanPublik, alamat, ruangLingkup) {
        document.getElementById('editForm').action = '/admin/ppid/' + id;
        document.getElementById('edit_badan_publik').value = badanPublik;
        document.getElementById('edit_alamat').value = alamat;
        document.getElementById('edit_ruang_lingkup').value = ruangLingkup;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('editModal').addEventListener('click', function(e) {
        if (e.target === this) closeEditModal();
    });
</script>
@endsection
