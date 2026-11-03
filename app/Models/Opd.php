<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;

    protected $table = 'opds';

    protected $fillable = [
        'nama_opd',
        'kepala_dinas',
        'website',
        'riwayat_jabatan',
        'alamat',
    ];
}
