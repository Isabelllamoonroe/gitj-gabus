<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalIbadah;
use Illuminate\Http\Request;

class JadwalIbadahController extends Controller
{
    public function index()
    {
        $jadwal = JadwalIbadah::latest()->get();

        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
    'nama_ibadah' => 'required|string|max:255',
    'hari' => 'required|string|max:50',
    'waktu_mulai' => 'required|date_format:H:i',
    'waktu_selesai' => 'nullable|date_format:H:i',
    'lokasi' => 'nullable|string|max:255',
    'keterangan' => 'nullable|string',
    'pengkhotbah' => 'nullable|string|max:255',
    'nats_alkitab' => 'nullable|string|max:255',
    'tema' => 'nullable|string|max:255',
]);

        JadwalIbadah::create($data);

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(JadwalIbadah $jadwal)
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, JadwalIbadah $jadwal)
    {
        $data = $request->validate([
            'nama_ibadah' => 'required|string|max:255',
            'hari' => 'required|string|max:50',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'nullable|date_format:H:i',
            'lokasi' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'pengkhotbah' => 'nullable|string|max:255',
            'nats_alkitab' => 'nullable|string|max:255',
            'tema' => 'nullable|string|max:255',

        ]);

        $jadwal->update($data);

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(JadwalIbadah $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
