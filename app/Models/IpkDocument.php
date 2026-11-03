<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpkDocument extends Model
{
    protected $fillable = [
        'judul_dokumen',
        'tahun',
        'tanggal_upload',
        'file'
    ];
}
