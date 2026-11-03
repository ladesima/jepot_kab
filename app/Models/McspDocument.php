<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class McspDocument extends Model
{
    protected $table = 'mcsp_documents';

    protected $fillable = [
        'judul_dokumen',
        'tahun',
        'tanggal_upload',
        'file'
    ];
}