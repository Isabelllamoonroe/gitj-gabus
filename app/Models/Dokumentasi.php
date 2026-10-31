<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';

    protected $fillable = [
        'judul',
        'tanggal_kegiatan',
        'deskripsi',
        'gambar',
        'aktif',
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
        'aktif' => 'boolean',
    ];
}
