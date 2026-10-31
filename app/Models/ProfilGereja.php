<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilGereja extends Model
{
    protected $table = 'profil_gereja';

    protected $fillable = [
        'nama_gereja',
        'sejarah',
        'visi',
        'misi',
        'alamat',
        'telepon',
        'email',
        'maps_embed_url',
    ];
}
