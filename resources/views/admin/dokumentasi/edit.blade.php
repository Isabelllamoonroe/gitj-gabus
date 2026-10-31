<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dokumentasi | GITJ Gabus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #faf7f0;
            color: #493326;
            margin: 0;
            padding: 30px 15px;
        }
        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px #49332615;
        }
        h1 { margin-top: 0; }
        label {
            display: block;
            margin-top: 16px;
            font-weight: bold;
        }
        input:not([type="checkbox"]):not([type="file"]), textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            margin-top: 6px;
            border: 1px solid #d8cbb8;
            border-radius: 5px;
            font: inherit;
        }
        input[type="file"] {
            display: block;
            margin-top: 8px;
        }
        textarea { min-height: 100px; resize: vertical; }
        .error { color: #b42318; font-size: 14px; }
        .photo {
            display: block;
            max-width: 220px;
            max-height: 180px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 6px;
        }
        .actions { display: flex; gap: 10px; margin-top: 24px; }
        button, .back {
            padding: 11px 18px;
            border: 0;
            border-radius: 5px;
            text-decoration: none;
            font: inherit;
            cursor: pointer;
        }
        button { background: #493326; color: white; }
        .back { background: #eee5d8; color: #493326; }
    </style>
</head>
<body>
<main class="container">
    <h1>Edit Dokumentasi</h1>
    <p>Perbarui informasi kegiatan GITJ Gabus.</p>

    @if ($errors->any())
        <div class="error">
            <p>Mohon periksa kembali isian berikut:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.dokumentasi.update', $dokumentasi->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="judul">Judul Kegiatan *</label>
        <input type="text" id="judul" name="judul"
               value="{{ old('judul', $dokumentasi->judul) }}" required>
        @error('judul')
            <small class="error">{{ $message }}</small>
        @enderror

        <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
        <input type="date" id="tanggal_kegiatan"
               name="tanggal_kegiatan"
               value="{{ old('tanggal_kegiatan', $dokumentasi->tanggal_kegiatan?->format('Y-m-d')) }}">
        @error('tanggal_kegiatan')
            <small class="error">{{ $message }}</small>
        @enderror

        <label for="deskripsi">Deskripsi Kegiatan</label>
        <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi', $dokumentasi->deskripsi) }}</textarea>
        @error('deskripsi')
            <small class="error">{{ $message }}</small>
        @enderror

        <label>Foto Saat Ini</label>
        @if ($dokumentasi->gambar)
            <img class="photo"
                 src="{{ asset('storage/' . $dokumentasi->gambar) }}"
                 alt="{{ $dokumentasi->judul }}">
        @else
            <p>Belum ada foto.</p>
        @endif

        <label for="gambar">Ganti Foto (opsional)</label>
        <input type="file" id="gambar" name="gambar"
               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
        <small>Kosongkan jika tidak ingin mengganti foto. Maksimal 2 MB.</small>
        @error('gambar')
            <small class="error">{{ $message }}</small>
        @enderror

        <label>
            <input type="checkbox" name="aktif" value="1"
                   style="width:auto"
                   {{ old('aktif', $dokumentasi->aktif) ? 'checked' : '' }}>
            Tampilkan di halaman publik
        </label>

        <div class="actions">
            <button type="submit">Simpan Perubahan</button>
            <a class="back"
               href="{{ route('admin.dokumentasi.index') }}">Kembali</a>
        </div>
    </form>
</main>
</body>
</html>
