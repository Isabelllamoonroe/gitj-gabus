<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasi = Dokumentasi::latest()->get();

        return view('admin.dokumentasi.index', compact('dokumentasi'));
    }

    public function create()
    {
        return view('admin.dokumentasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_kegiatan' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('dokumentasi', 'public');
        }

        $data['aktif'] = $request->boolean('aktif', true);

        Dokumentasi::create($data);

        return redirect()
            ->route('admin.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        return view('admin.dokumentasi.edit', compact('dokumentasi'));
    }

    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_kegiatan' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($dokumentasi->gambar) {
                Storage::disk('public')->delete($dokumentasi->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('dokumentasi', 'public');
        }

        $data['aktif'] = $request->boolean('aktif');

        $dokumentasi->update($data);

        return redirect()
            ->route('admin.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
        if ($dokumentasi->gambar) {
            Storage::disk('public')->delete($dokumentasi->gambar);
        }

        $dokumentasi->delete();

        return redirect()
            ->route('admin.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil dihapus.');
    }
}
