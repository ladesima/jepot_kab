<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SuratTugas;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SuratTugasUserController extends Controller
{
    /**
     * Display the main Surat Tugas & SPD page with 3 tabs.
     */
    public function index(Request $request)
    {
        $search = $request->query('q');
        $tab = $request->query('tab', 'buat');

        $query = SuratTugas::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomor_st', 'like', "%{$search}%")
                  ->orWhere('nomor_spd', 'like', "%{$search}%")
                  ->orWhere('nama_pegawai', 'like', "%{$search}%")
                  ->orWhere('nip_pegawai', 'like', "%{$search}%")
                  ->orWhere('maksud_tugas', 'like', "%{$search}%")
                  ->orWhere('tempat_tujuan', 'like', "%{$search}%");
            });
        }

        $suratTugasList = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        $totalSt = SuratTugas::count();
        $totalSpd = SuratTugas::where('terbitkan_spd', true)->count();
        $totalPegawai = SuratTugas::distinct('nama_pegawai')->count('nama_pegawai');
        $totalPenerimaUnik = SuratTugas::whereNotNull('nama_pegawai')->count();

        // Calculate next sequential document number
        $lastRecord = SuratTugas::orderBy('id', 'desc')->first();
        $nextNumber = 1;
        if ($lastRecord && preg_match('/090\/(\d+)\/ST/', $lastRecord->nomor_st, $matches)) {
            $nextNumber = intval($matches[1]) + 1;
        } elseif ($lastRecord) {
            $nextNumber = $lastRecord->id + 1;
        }
        $nextNomorSt = sprintf("090/%03d/ST", $nextNumber);
        $nextNomorSpd = sprintf("090/%03d/SPD", $nextNumber);

        // Preload sample pegawais for dropdown / quick selection
        $pegawais = Pegawai::orderBy('nama', 'asc')->limit(100)->get();

        return view('user.surat-tugas.index', compact(
            'suratTugasList',
            'totalSt',
            'totalSpd',
            'totalPegawai',
            'totalPenerimaUnik',
            'nextNomorSt',
            'nextNomorSpd',
            'pegawais',
            'search',
            'tab'
        ));
    }

    /**
     * API for searching pegawai via autocomplete.
     */
    public function searchPegawai(Request $request)
    {
        $query = $request->get('q', '');

        $pegawais = Pegawai::where('nama', 'like', "%{$query}%")
            ->orWhere('nip', 'like', "%{$query}%")
            ->orWhere('jabatan', 'like', "%{$query}%")
            ->limit(15)
            ->get(['id', 'nama', 'nip', 'jabatan']);

        return response()->json($pegawais);
    }

    /**
     * Store newly created Surat Tugas & SPD.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dasar_surat'      => 'required|string',
            'tanggal_surat'    => 'required|date',
            'maksud_tugas'     => 'required|string',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'tempat_tujuan'    => 'required|string',
            'nama_pegawai'     => 'required|string|max:255',
            'nip_pegawai'      => 'nullable|string|max:100',
            'pangkat_golongan' => 'nullable|string|max:150',
            'jabatan_pegawai'  => 'required|string|max:255',
            'pejabat_nama'     => 'required|string|max:255',
            'pejabat_jabatan'  => 'required|string|max:255',
        ]);

        $tglMulai = Carbon::parse($request->tanggal_mulai);
        $tglSelesai = Carbon::parse($request->tanggal_selesai);
        $durasiHari = $tglMulai->diffInDays($tglSelesai) + 1;

        // Indonesian Day & Date text formatting
        $hariIndo = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $bulanIndo = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        if ($tglMulai->equalTo($tglSelesai)) {
            $hari = $hariIndo[$tglMulai->dayOfWeek];
            $tglText = $tglMulai->day . ' ' . $bulanIndo[$tglMulai->month] . ' ' . $tglMulai->year;
            $hariTanggalTeks = "{$hari}, {$tglText}";
        } else {
            $hariAwal = $hariIndo[$tglMulai->dayOfWeek];
            $hariAkhir = $hariIndo[$tglSelesai->dayOfWeek];
            if ($tglMulai->month === $tglSelesai->month && $tglMulai->year === $tglSelesai->year) {
                $hariTanggalTeks = "{$hariAwal} s.d. {$hariAkhir}, {$tglMulai->day} s.d. {$tglSelesai->day} {$bulanIndo[$tglMulai->month]} {$tglMulai->year}";
            } else {
                $hariTanggalTeks = "{$hariAwal} ({$tglMulai->day} {$bulanIndo[$tglMulai->month]} {$tglMulai->year}) s.d. {$hariAkhir} ({$tglSelesai->day} {$bulanIndo[$tglSelesai->month]} {$tglSelesai->year})";
            }
        }

        // Strict sequential document numbers (starts from 1, auto-incremented)
        $lastRecord = SuratTugas::orderBy('id', 'desc')->first();
        $nextNumber = 1;
        if ($lastRecord && preg_match('/090\/(\d+)\/ST/', $lastRecord->nomor_st, $matches)) {
            $nextNumber = intval($matches[1]) + 1;
        } elseif ($lastRecord) {
            $nextNumber = $lastRecord->id + 1;
        }
        $nomorSt = sprintf("090/%03d/ST", $nextNumber);
        $nomorSpd = $request->boolean('terbitkan_spd') ? sprintf("090/%03d/SPD", $nextNumber) : null;

        $suratTugas = SuratTugas::create([
            'nomor_st'          => $nomorSt,
            'nomor_spd'         => $nomorSpd,
            'dasar_surat'       => $request->dasar_surat,
            'tanggal_surat'     => $request->tanggal_surat,
            'maksud_tugas'      => $request->maksud_tugas,
            'tanggal_mulai'     => $request->tanggal_mulai,
            'tanggal_selesai'   => $request->tanggal_selesai,
            'hari_tanggal_teks' => $hariTanggalTeks,
            'tempat_tujuan'     => $request->tempat_tujuan,
            'pegawai_id'        => $request->pegawai_id,
            'nama_pegawai'      => $request->nama_pegawai,
            'nip_pegawai'       => $request->nip_pegawai,
            'pangkat_golongan'  => $request->pangkat_golongan,
            'jabatan_pegawai'   => $request->jabatan_pegawai,
            'pejabat_id'        => $request->pejabat_id,
            'pejabat_nama'      => $request->pejabat_nama,
            'pejabat_jabatan'   => $request->pejabat_jabatan,
            'pejabat_pangkat'   => $request->pejabat_pangkat,
            'pejabat_nip'       => $request->pejabat_nip,
            'terbitkan_spd'     => $request->boolean('terbitkan_spd'),
            'alat_angkut'       => $request->alat_angkut ?? 'Kendaraan Dinas / Umum',
            'durasi_hari'       => $durasiHari,
        ]);

        return redirect()->route('user.surat-tugas', ['tab' => 'riwayat'])
            ->with('success', "Surat Tugas Nomor {$suratTugas->nomor_st} berhasil diterbitkan!")
            ->with('latest_id', $suratTugas->id);
    }

    /**
     * Show official printable Surat Tugas view.
     */
    public function cetakSt($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);
        return view('user.surat-tugas.cetak-st', compact('suratTugas'));
    }

    /**
     * Show official printable Surat Perjalanan Dinas (SPD) view.
     */
    public function cetakSpd($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);
        return view('user.surat-tugas.cetak-spd', compact('suratTugas'));
    }

    /**
     * Export document as editable Word file (.doc).
     */
    public function exportDoc($id, $type)
    {
        $suratTugas = SuratTugas::findOrFail($id);
        $cleanNomor = str_replace(['/', '\\', ' '], '_', $type === 'spd' ? ($suratTugas->nomor_spd ?? $suratTugas->nomor_st) : $suratTugas->nomor_st);
        $filename = ($type === 'spd' ? 'SPD_' : 'Surat_Tugas_') . $cleanNomor . '.doc';

        $viewName = $type === 'spd' ? 'user.surat-tugas.cetak-spd' : 'user.surat-tugas.cetak-st';
        $content = view($viewName, [
            'suratTugas' => $suratTugas,
            'isWord' => true
        ])->render();

        return response($content)
            ->header('Content-Type', 'application/vnd.ms-word; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->header('Cache-Control', 'max-age=0');
    }

    /**
     * Remove Surat Tugas record.
     */
    public function destroy($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);
        $nomor = $suratTugas->nomor_st;
        $suratTugas->delete();

        return redirect()->back()->with('success', "Surat Tugas {$nomor} berhasil dihapus.");
    }
}
