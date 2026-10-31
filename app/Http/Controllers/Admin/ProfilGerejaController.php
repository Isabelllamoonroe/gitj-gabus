<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilGereja;
use Illuminate\Http\Request;

class ProfilGerejaController extends Controller
{
    public function edit()
    {
        $profil = ProfilGereja::first();

        if (!$profil) {
            $profil = ProfilGereja::create([
                'nama_gereja' => 'GITJ Gabus',
            ]);
        }

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nama_gereja' => 'required|string|max:255',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'maps_embed_url' => 'nullable|url|max:2000',
        ]);

        $profil = ProfilGereja::first();

        if (!$profil) {
            $profil = ProfilGereja::create($data);
        } else {
            $profil->update($data);
        }

        return redirect()
            ->route('admin.profil.edit')
            ->with('success', 'Profil gereja berhasil diperbarui.');
    }
}
