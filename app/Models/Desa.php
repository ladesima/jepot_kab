<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';

    protected $fillable = [
    'nama_desa',
    'kepala_desa',
    'alamat',
    'email',
    'website',
    'telepon',
    'kecamatan_id',
];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    // Otomatis tambahkan https jika belum ada
    public function getWebsiteUrlAttribute()
    {
        if (!$this->website) {
            return null;
        }

        return Str::startsWith($this->website, ['http://', 'https://'])
            ? $this->website
            : 'https://' . $this->website;
    }

    /*
    |--------------------------------------------------------------------------
    | QUERY SCOPE
    |--------------------------------------------------------------------------
    */

    public function scopeByKecamatan($query, $kecamatanId)
    {
        return $query->where('kecamatan_id', $kecamatanId);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('nama_desa', 'like', "%{$keyword}%");
    }
}
