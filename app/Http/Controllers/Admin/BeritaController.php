<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal_publikasi' => 'nullable|date',
            'status' => 'required|in:draft,terbit',
        ]);

        $data['slug'] = Str::slug($data['judul'])
            . '-' . Str::lower(Str::random(5));

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal_publikasi' => 'nullable|date',
            'status' => 'required|in:draft,terbit',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        $data['slug'] = Str::slug($data['judul'])
            . '-' . Str::lower(Str::random(5));

        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
