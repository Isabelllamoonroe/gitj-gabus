
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Berita | GITJ Gabus</title>
    <style>
        body { font-family: Arial, sans-serif; background: #faf7f0; color: #493326; padding: 30px; }
        .container { max-width: 750px; margin: auto; background: white; padding: 25px; border-radius: 10px; }
        label { display: block; margin-top: 16px; font-weight: bold; }
        input, textarea, select { box-sizing: border-box; width: 100%; padding: 10px; margin-top: 6px; border: 1px solid #d8c8b3; border-radius: 5px; }
        textarea { min-height: 120px; }
        button, .btn { display: inline-block; margin-top: 20px; padding: 11px 16px; background: #493326; color: white; border: 0; border-radius: 5px; text-decoration: none; cursor: pointer; }
        img { display: block; max-width: 220px; margin-top: 10px; }
        .error { color: #b00020; }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Berita</h1>

    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Judul Berita *</label>
        <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" required>

        <label>Ringkasan</label>
        <textarea name="ringkasan">{{ old('ringkasan', $berita->ringkasan) }}</textarea>

        <label>Isi Berita *</label>
        <textarea name="isi" required>{{ old('isi', $berita->isi) }}</textarea>

        <label>Foto Saat Ini</label>
        @if ($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Foto berita saat ini">
        @else
            <p>Belum ada foto.</p>
        @endif

        <label>Ganti Foto (opsional, maksimal 2 MB)</label>
        <input type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp">

        <label>Tanggal Publikasi</label>
        <input type="date" name="tanggal_publikasi" value="{{ old('tanggal_publikasi', $berita->tanggal_publikasi) }}">

        <label>Status</label>
        <select name="status" required>
            <option value="draft" @selected(old('status', $berita->status) === 'draft')>Draft</option>
            <option value="terbit" @selected(old('status', $berita->status) === 'terbit')>Terbit</option>
        </select>

        <button type="submit">Simpan Perubahan</button>
        <a class="btn" href="{{ route('admin.berita.index') }}">Kembali</a>
    </form>
</div>
</body>
</html>
