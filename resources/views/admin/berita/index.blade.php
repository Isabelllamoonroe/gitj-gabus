
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Berita | GITJ Gabus</title>
    <style>
        body { font-family: Arial, sans-serif; background: #faf7f0; color: #493326; padding: 30px; }
        .container { max-width: 1100px; margin: auto; }
        h1 { font-family: Georgia, serif; }
        .btn { display: inline-block; padding: 10px 15px; background: #493326; color: white; text-decoration: none; border: 0; border-radius: 5px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #e7dcc8; text-align: left; }
        th { background: #493326; color: white; }
        img { width: 75px; height: 55px; object-fit: cover; }
        .success { color: green; }
        form { display: inline; }
    </style>
</head>
<body>
<div class="container">
    <h1>Kelola Berita</h1>
    <p>Kelola berita dan informasi kegiatan GITJ Gabus.</p>

    <a class="btn" href="{{ route('admin.berita.create') }}">+ Tambah Berita</a>
    <a class="btn" href="{{ route('admin.dashboard') }}">Dashboard</a>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($berita as $item)
                <tr>
                    <td>
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto berita">
                        @else
                            Belum ada foto
                        @endif
                    </td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->tanggal_publikasi ?: '-' }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('admin.berita.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada berita. Silakan tambahkan berita pertama.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
