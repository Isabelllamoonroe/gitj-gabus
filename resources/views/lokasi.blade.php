<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokasi Gereja | GITJ Gabus</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Georgia, 'Times New Roman', serif;
            background: #faf7f0;
            color: #493326;
            line-height: 1.8;
        }

        header {
            background: white;
            border-bottom: 1px solid #e7dcc8;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .brand { font-size: 23px; font-weight: bold; }

        nav { display: flex; flex-wrap: wrap; gap: 18px; }

        nav a {
            color: #493326;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover { color: #b99a5b; }

        main {
            max-width: 1000px;
            margin: auto;
            padding: 45px 6%;
        }

        .heading { text-align: center; margin-bottom: 35px; }

        .heading h1 { font-size: clamp(28px, 5vw, 40px); }

        .heading p { color: #8d6b35; }

        .card {
            background: white;
            border: 1px solid #e7dcc8;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .card h2 { color: #8d6b35; margin-top: 0; }

        .map {
            width: 100%;
            height: 400px;
            border: 0;
            border-radius: 8px;
        }

        .button {
            display: inline-block;
            background: #493326;
            color: white;
            padding: 10px 18px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }

        footer {
            background: #493326;
            color: #eee4d5;
            text-align: center;
            padding: 25px;
            font-size: 13px;
        }

        @media (max-width: 650px) {
            header { justify-content: center; }
            nav { justify-content: center; }
            main { padding: 30px 5%; }
            .card { padding: 18px; }
            .map { height: 320px; }
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
        <a href="{{ route('dokumentasi') }}">Dokumentasi</a>
        <a href="{{ route('lokasi') }}">Lokasi</a>
    </nav>
</header>

<main>
    <div class="heading">
        <h1>Lokasi Gereja</h1>
        <p>Temukan lokasi dan informasi GITJ Gabus</p>
    </div>

    <section class="card">
        <h2>GITJ Gabus</h2>

        @if ($profil?->alamat)
            <p><strong>Alamat:</strong><br>{{ $profil->alamat }}</p>
        @else
            <p>Informasi alamat gereja belum diisi.</p>
        @endif

        @if ($profil?->telepon)
            <p><strong>Telepon:</strong> {{ $profil->telepon }}</p>
        @endif

        @if ($profil?->email)
            <p><strong>Email:</strong> {{ $profil->email }}</p>
        @endif

        <a
            class="button"
            href="https://www.google.com/maps/search/?api=1&query=GITJ%20Gabus"
            target="_blank"
            rel="noopener noreferrer">
            Buka Petunjuk Arah
        </a>
    </section>

    <section class="card">
        <h2>Peta Lokasi</h2>

        @if ($profil?->maps_embed_url)
            <iframe
                class="map"
                src="{{ $profil->maps_embed_url }}"
                title="Peta lokasi GITJ Gabus"
                loading="lazy"
                allowfullscreen>
            </iframe>
        @else
            <p>Peta lokasi belum tersedia. Silakan isi URL Google Maps Embed melalui admin.</p>
        @endif
    </section>
</main>

<footer>
    &copy; {{ date('Y') }} GITJ Gabus. Informasi gereja dan pelayanan.
</footer>

</body>
</html>
