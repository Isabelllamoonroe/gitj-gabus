<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Ibadah | Admin GITJ Gabus</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f7f3eb;
            color: #493629;
        }
        .container {
            max-width: 1100px;
            margin: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }
        h1 { margin-bottom: 8px; }
        p { color: #786858; }
        a, button {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 7px;
            background: #79583c;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }
        .back {
            background: #e7ddce;
            color: #493629;
        }
        .card {
            padding: 22px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 12px #49362910;
            overflow-x: auto;
        }
        .success {
            padding: 12px;
            margin-bottom: 18px;
            background: #e5f4e5;
            color: #27632a;
            border-radius: 7px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 14px 10px;
            text-align: left;
            border-bottom: 1px solid #eee6dc;
        }
        th { background: #f7f3eb; }
        .action { display: flex; gap: 7px; }
        .edit { background: #a17a40; }
        .delete { background: #a94442; }
        .empty {
            padding: 25px;
            text-align: center;
            color: #786858;
        }
        form { display: inline; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div>
            <h1>Jadwal Ibadah</h1>
            <p>Kelola jadwal ibadah GITJ Gabus.</p>
        </div>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="back">← Dashboard</a>
            <a href="{{ route('admin.jadwal.create') }}">+ Tambah Jadwal</a>
        </div>
    </div>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <h3>Daftar Jadwal</h3>

        @if ($jadwal->count())
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Ibadah</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_ibadah }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>
                                {{ substr($item->waktu_mulai, 0, 5) }}
                                @if ($item->waktu_selesai)
                                    – {{ substr($item->waktu_selesai, 0, 5) }}
                                @endif
                            </td>
                            <td>{{ $item->lokasi ?: '-' }}</td>
                            <td>
                                <div class="action">
                                    <a class="edit"
                                       href="{{ route('admin.jadwal.edit', $item) }}">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.jadwal.destroy', $item) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete" type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty">
                Belum ada jadwal ibadah. Klik tombol Tambah Jadwal untuk memulai.
            </div>
        @endif
    </div>
</div>
</body>
</html>
