<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita | GITJ Gabus</title>
</head>
<body>
    <h1>Berita GITJ Gabus</h1>
    <p>Informasi dan kabar terbaru dari gereja.</p>

    @forelse ($berita as $item)
        <article>
            @if ($item->gambar)
                <img
                    src="{{ asset('storage/' . $item->gambar) }}"
                    alt="{{ $item->judul }}"
                    width="300"
                >
            @endif

            <h2>{{ $item->judul }}</h2>

            @if ($item->tanggal_publikasi)
                <p>{{ $item->tanggal_publikasi->format('d-m-Y') }}</p>
            @endif

            <p>{{ $item->ringkasan }}</p>
            <p>{{ $item->isi }}</p>
        </article>
        <hr>
    @empty
        <p>Belum ada berita yang diterbitkan.</p>
    @endforelse
</body>
</html>
