<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal | GITJ Gabus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #faf7f0;
            color: #493326;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #d8c9b5;
            border-radius: 4px;
        }
        button {
            margin-top: 20px;
            padding: 11px 16px;
            background: #9b7b42;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .error { color: #b32626; }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Jadwal Ibadah</h1>
    <p>GITJ Gabus — Dashboard Admin</p>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jadwal.update', $jadwal) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Ibadah *</label>
        <input type="text" name="nama_ibadah"
            value="{{ old('nama_ibadah', $jadwal->nama_ibadah) }}" required>

        <label>Hari *</label>
        <input type="text" name="hari"
            value="{{ old('hari', $jadwal->hari) }}" required>

        <label>Waktu Mulai *</label>
        <input type="time" name="waktu_mulai"
            value="{{ old('waktu_mulai', substr($jadwal->waktu_mulai, 0, 5)) }}" required>

        <label>Waktu Selesai</label>
        <input type="time" name="waktu_selesai"
            value="{{ old('waktu_selesai', $jadwal->waktu_selesai ? substr($jadwal->waktu_selesai, 0, 5) : '') }}">

        <label>Lokasi</label>
        <input type="text" name="lokasi"
            value="{{ old('lokasi', $jadwal->lokasi) }}">

        <label>Keterangan</label>
        <textarea name="keterangan" rows="4">{{ old('keterangan', $jadwal->keterangan) }}</textarea>

        <button type="submit">Simpan Perubahan</button>
    </form>


        <label for="pengkhotbah">Pengkhotbah</label>
        <input
            type="text"
            id="pengkhotbah"
            name="pengkhotbah"
            value="{{ old('pengkhotbah', $jadwal->pengkhotbah) }}"
            placeholder="Nama pengkhotbah">

        @error('pengkhotbah')
            <small class="error">{{ $message }}</small>
        @enderror

        <label for="nats_alkitab">Nats Alkitab</label>
        <input
            type="text"
            id="nats_alkitab"
            name="nats_alkitab"
            value="{{ old('nats_alkitab', $jadwal->nats_alkitab) }}"
            placeholder="Contoh: Yohanes 3:16">

        @error('nats_alkitab')
            <small class="error">{{ $message }}</small>
        @enderror

        <label for="tema">Tema Ibadah</label>
        <input
            type="text"
            id="tema"
            name="tema"
            value="{{ old('tema', $jadwal->tema) }}"
            placeholder="Tema ibadah">

        @error('tema')
            <small class="error">{{ $message }}</small>
        @enderror

        <p>
            <a href="{{ route('admin.jadwal.index') }}">← Kembali ke daftar jadwal</a>
        </p>
 </div>
</body>
</html>
