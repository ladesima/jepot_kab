<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SekretarisDaerah extends Model
{
    protected $table = 'sekretaris_daerahs';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'riwayat_jabatan',
        'sambutan',
        'foto',
        'file_lhkpn',
    ];
}
