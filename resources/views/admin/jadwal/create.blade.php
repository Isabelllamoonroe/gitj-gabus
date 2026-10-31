<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Ibadah | GITJ Gabus</title>

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

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 16px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            margin-top: 6px;
            border: 1px solid #d8cbb8;
            border-radius: 5px;
            font: inherit;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        button, .back {
            padding: 11px 18px;
            border: 0;
            border-radius: 5px;
            text-decoration: none;
            font: inherit;
            cursor: pointer;
        }

        button {
            background: #493326;
            color: white;
        }

        .back {
            background: #eee5d8;
            color: #493326;
        }

        .error {
            color: #b42318;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>Tambah Jadwal Ibadah</h1>
        <p>Masukkan informasi kegiatan ibadah GITJ Gabus.</p>

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

        <form action="{{ route('admin.jadwal.store') }}" method="POST">
            @csrf

            <label for="nama_ibadah">Nama Ibadah *</label>
            <input
                id="nama_ibadah"
                name="nama_ibadah"
                value="{{ old('nama_ibadah') }}"
                placeholder="Contoh: Ibadah Raya"
                required>

            <label for="hari">Hari *</label>
            <input
                id="hari"
                name="hari"
                value="{{ old('hari') }}"
                placeholder="Contoh: Minggu"
                required>

            <label for="waktu_mulai">Waktu Mulai *</label>
            <input
                type="time"
                id="waktu_mulai"
                name="waktu_mulai"
                value="{{ old('waktu_mulai') }}"
                required>

            <label for="waktu_selesai">Waktu Selesai</label>
            <input
                type="time"
                id="waktu_selesai"
                name="waktu_selesai"
                value="{{ old('waktu_selesai') }}">

            <label for="lokasi">Tempat Ibadah</label>
            <input
                id="lokasi"
                name="lokasi"
                value="{{ old('lokasi') }}"
                placeholder="Contoh: Gereja GITJ Gabus">

            <label for="keterangan">Keterangan</label>
            <textarea
                id="keterangan"
                name="keterangan"
                placeholder="Informasi tambahan">{{ old('keterangan') }}</textarea>


<div class="form-group">
    <label for="pengkhotbah">Pengkhotbah</label>
    <input
        type="text"
        id="pengkhotbah"
        name="pengkhotbah"
        value="{{ old('pengkhotbah') }}"
        placeholder="Nama pengkhotbah">
    @error('pengkhotbah')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="nats_alkitab">Nats Alkitab</label>
    <input
        type="text"
        id="nats_alkitab"
        name="nats_alkitab"
        value="{{ old('nats_alkitab') }}"
        placeholder="Contoh: Yohanes 3:16">
    @error('nats_alkitab')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="tema">Tema Ibadah</label>
    <input
        type="text"
        id="tema"
        name="tema"
        value="{{ old('tema') }}"
        placeholder="Tema ibadah">
    @error('tema')
        <small class="error">{{ $message }}</small>
    @enderror
</div>


            <div class="actions">
                <button type="submit">Simpan Jadwal</button>
                <a class="back" href="{{ route('admin.jadwal.index') }}">
                    Kembali
                </a>
            </div>
        </form>
    </main>
</body>
</html>
