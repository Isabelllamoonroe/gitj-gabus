<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Kegiatan | GITJ Gabus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #faf7f0;
            color: #493326;
            margin: 0;
            padding: 30px 15px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }
        h1 { margin-top: 0; }
        a, button {
            display: inline-block;
            padding: 10px 14px;
            border: 0;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font: inherit;
        }
        .add {
            background: #493326;
            color: white;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #e5dccf;
            text-align: left;
        }
        th { background: #f3ece1; }
        .edit { background: #eee5d8; color: #493326; }
        .delete { background: #a83232; color: white; }
        .photo {
            width: 75px;
            height: 55px;
            object-fit: cover;
            border-radius: 4px;
        }
        .success { color: #267344; }
        .actions { display: flex; gap: 6px; align-items: center; }
        @media (max-width: 650px) {
            .container { overflow-x: auto; }
            table { min-width: 650px; }
        }
    </style>
</head>
<body>
<main class="container">
    <h1>Dokumentasi Kegiatan</h1>
    <p>Kelola foto dan dokumentasi kegiatan GITJ Gabus.</p>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a class="add" href="{{ route('admin.dokumentasi.create') }}">
        + Tambah Dokumentasi
    </a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dokumentasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($item->gambar)
                            <img class="photo"
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul }}">
                        @else
                            Belum ada foto
                        @endif
                    </td>
                    <td>{{ $item->judul }}</td>
                    <td>
                        {{ $item->tanggal_kegiatan
                            ? $item->tanggal_kegiatan->format('d-m-Y')
                            : '—' }}
                    </td>
                    <td>{{ $item->aktif ? 'Aktif' : 'Nonaktif' }}</td>
                    <td>
                        <div class="actions">
                            <a class="edit"
                                href="{{ route('admin.dokumentasi.edit', $item->id) }}">
                                Edit
                            </a>
                            <form
                                action="{{ route('admin.dokumentasi.destroy', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Hapus dokumentasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="delete" type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada dokumentasi kegiatan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p><a href="{{ route('admin.dashboard') }}">Kembali ke Dashboard</a></p>
</main>
</body>
</html>
