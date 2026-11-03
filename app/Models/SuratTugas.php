<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratTugas extends Model
{
    use HasFactory;

    protected $table = 'surat_tugas';

    protected $fillable = [
        'nomor_st',
        'nomor_spd',
        'dasar_surat',
        'tanggal_surat',
        'maksud_tugas',
        'tanggal_mulai',
        'tanggal_selesai',
        'hari_tanggal_teks',
        'tempat_tujuan',
        'pegawai_id',
        'nama_pegawai',
        'nip_pegawai',
        'pangkat_golongan',
        'jabatan_pegawai',
        'pejabat_id',
        'pejabat_nama',
        'pejabat_jabatan',
        'pejabat_pangkat',
        'pejabat_nip',
        'terbitkan_spd',
        'alat_angkut',
        'durasi_hari',
    ];

    protected $casts = [
        'tanggal_surat'   => 'date',
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
        'terbitkan_spd'   => 'boolean',
        'durasi_hari'     => 'integer',
    ];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
