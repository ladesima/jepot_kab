<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengumuman extends Model
{
    protected $fillable = [
        'judul',
        'file',
        'tanggal',
        'deskripsi',
        'views',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'views'   => 'integer',
    ];

    protected $appends = [
        'slug',
    ];

    /*
    |--------------------------------------------------------------------------
    | Slug otomatis tanpa kolom database
    |--------------------------------------------------------------------------
    */
    public function getSlugAttribute(): string
    {
        $slug = Str::slug((string) $this->judul);

        /*
         * Fallback agar parameter slug tidak pernah kosong.
         */
        if ($slug === '') {
            return 'pengumuman-' . $this->getKey();
        }

        return $slug;
    }
}