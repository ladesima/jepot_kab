<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = [
        'nama_kecamatan',
        'kepala_camat',
        'riwayat_jabatan',
        'alamat',
        'email',
        'website',
        'telepon'
    ];

    public function desas()
    {
        return $this->hasMany(Desa::class);
    }
}
