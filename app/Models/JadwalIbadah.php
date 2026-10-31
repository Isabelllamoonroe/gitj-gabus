<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalIbadah extends Model
{
    protected $table = 'jadwal_ibadah';


    protected $fillable = [
    'nama_ibadah',
    'hari',
    'waktu_mulai',
    'waktu_selesai',
    'lokasi',
    'keterangan',
    'pengkhotbah',
    'nats_alkitab',
    'tema',
];

}
