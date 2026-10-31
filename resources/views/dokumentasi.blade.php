
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi | GITJ Gabus</title>

    <style>
        :root {
            --cream: #faf7f0;
            --brown: #493326;
            --gold: #b99a5b;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Georgia, 'Times New Roman', serif;
            background: var(--cream);
            color: var(--brown);
            line-height: 1.7;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: var(--white);
            border-bottom: 1px solid #e7dcc8;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
        }

        nav {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        nav a {
            text-decoration: none;
            color: var(--brown);
            font-size: 14px;
        }

        nav a:hover,
        nav a.active {
            color: var(--gold);
        }

        .page-title {
            text-align: center;
            padding: 65px 20px 35px;
        }

        .eyebrow {
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 12px;
        }

        .page-title h1 {
            font-size: clamp(28px, 4vw, 42px);
            margin: 10px 0;
        }

        .intro {
            color: #77685b;
            font-size: 15px;
        }

        .gallery {
            max-width: 1100px;
            margin: 0 auto;
            padding: 15px 25px 75px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 35px;
            align-items: start;
        }

        .polaroid {
            background: white;
            padding: 12px 12px 22px;
            box-shadow: 0 6px 18px rgba(73, 51, 38, 0.13);
            border: 1px solid #eee7dc;
            transform: rotate(-1deg);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .polaroid:nth-child(even) {
            transform: rotate(1.5deg);
        }

        .polaroid:hover {
            transform: rotate(0deg) translateY(-5px);
            box-shadow: 0 12px 25px rgba(73, 51, 38, 0.18);
        }

        .polaroid img {
            width: 100%;
            aspect-ratio: 4 / 3;
            object-fit: cover;
            display: block;
            background: #eee5d8;
        }

        .caption {
            padding: 16px 5px 0;
        }

        .caption h2 {
            font-size: 19px;
            margin-bottom: 6px;
        }

        .caption p {
            color: #77685b;
            font-size: 14px;
        }

        .caption .date {
            color: var(--gold);
            font-size: 12px;
            margin-bottom: 7px;
        }

        footer {
            text-align: center;
            padding: 25px;
            background: var(--brown);
            color: var(--white);
            font-size: 13px;
        }

        @media (max-width: 800px) {
            .gallery {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 25px;
            }
        }

        @media (max-width: 520px) {
            header {
                padding: 16px 5%;
            }

            nav {
                gap: 12px;
            }

            .gallery {
                grid-template-columns: 1fr;
                max-width: 390px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="brand">GITJ Gabus</div>

        <nav>
            <a href="{{ route('beranda') }}">Beranda</a>
            <a href="{{ route('profil') }}">Profil Gereja</a>
            <a href="{{ route('jadwal') }}">Jadwal</a>
            <a href="{{ route('dokumentasi') }}" class="active">Dokumentasi</a>
            <a href="{{ route('lokasi') }}">Lokasi</a>
        </nav>
    </header>

    <main>
        <section class="page-title">
            <p class="eyebrow">Kenangan dan Pelayanan</p>
            <h1>Dokumentasi Kegiatan</h1>
            <p class="intro">
                Mengabadikan kebersamaan dan perjalanan pelayanan GITJ Gabus.
            </p>
        </section>


<section class="gallery">

    @forelse ($dokumentasi as $item)
        <article class="polaroid">

            @if ($item->gambar)
                <img
                    src="{{ asset('storage/' . $item->gambar) }}"
                    alt="{{ $item->judul }}"
                    loading="lazy">
            @else
                <div style="aspect-ratio: 4 / 3; background: #eee5d8; display: flex; align-items: center; justify-content: center; color: #77685b;">
                    Foto belum tersedia
                </div>
            @endif

            <div class="caption">
                <p class="date">
                    @if ($item->tanggal_kegiatan)
                        {{ $item->tanggal_kegiatan->format('d F Y') }}
                    @else
                        KEGIATAN GEREJA
                    @endif
                </p>

                <h2>{{ $item->judul }}</h2>

                @if ($item->deskripsi)
                    <p>{{ $item->deskripsi }}</p>
                @endif
            </div>

        </article>
    @empty
        <p style="grid-column: 1 / -1; text-align: center;">
            Belum ada dokumentasi kegiatan yang ditampilkan.
        </p>
    @endforelse

</section>

    </main>

    <footer>
        &copy; {{ date('Y') }} GITJ Gabus. Semua hak dilindungi.
    </footer>
</body>
</html>
