<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Gereja | GITJ Gabus</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Georgia, 'Times New Roman', serif;
            background: #faf7f0;
            color: #493326;
            line-height: 1.7;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: white;
            border-bottom: 1px solid #e7dcc8;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
        }

        nav a {
            color: #493326;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: #b99a5b;
        }

        main {
            min-height: 65vh;
            padding: 50px 7%;
            max-width: 1100px;
            margin: auto;
        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-title p {
            color: #9b7a40;
            letter-spacing: 3px;
            font-size: 12px;
            text-transform: uppercase;
        }

        .page-title h1 {
            font-size: clamp(28px, 5vw, 42px);
            margin: 5px 0;
        }

        .divider {
            width: 65px;
            height: 3px;
            background: #b99a5b;
            margin: 18px auto;
        }

        .profile-card {
            background: #fff;
            padding: 30px;
            margin-bottom: 24px;
            border: 1px solid #e7dcc8;
            border-radius: 8px;
            box-shadow: 0 5px 18px rgba(73, 51, 38, 0.04);
        }

        .profile-card h2 {
            color: #8d6b35;
            margin-top: 0;
            font-size: 23px;
        }

        .profile-card p {
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .contact a {
            color: #8d6b35;
            overflow-wrap: anywhere;
        }

        .map {
            width: 100%;
            height: 350px;
            border: 0;
            border-radius: 6px;
        }

        .empty {
            text-align: center;
            padding: 35px 20px;
            background: #fff;
            border: 1px solid #e7dcc8;
            border-radius: 8px;
        }

        footer {
            padding: 28px 7%;
            background: #493326;
            color: #eee4d5;
            text-align: center;
            font-size: 13px;
        }

        @media (max-width: 760px) {
            header {
                flex-direction: column;
            }

            nav {
                justify-content: center;
            }

            main {
                padding: 35px 5%;
            }

            .profile-card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>
@include('partials.navbar')
<main>
    <div class="page-title">
        <p>Mengenal Kami</p>
        <h1>{{ $profil?->nama_gereja ?? 'GITJ Gabus' }}</h1>
        <div class="divider"></div>
        <p>Gereja Injili di Tanah Jawa</p>
    </div>

    @if (!$profil)
        <div class="empty">
            Informasi profil gereja belum tersedia.
        </div>
    @else
        @if ($profil->sejarah)
            <section class="profile-card">
                <h2>Sejarah Gereja</h2>
                <p>{{ $profil->sejarah }}</p>
            </section>
        @endif

        @if ($profil->visi)
            <section class="profile-card">
                <h2>Visi</h2>
                <p>{{ $profil->visi }}</p>
            </section>
        @endif

        @if ($profil->misi)
            <section class="profile-card">
                <h2>Misi</h2>
                <p>{{ $profil->misi }}</p>
            </section>
        @endif

        @if ($profil->alamat || $profil->telepon || $profil->email)
            <section class="profile-card contact">
                <h2>Informasi Gereja</h2>

                @if ($profil->alamat)
                    <p><strong>Alamat:</strong><br>{{ $profil->alamat }}</p>
                @endif

                @if ($profil->telepon)
                    <p><strong>Telepon:</strong>
                        <a href="tel:{{ $profil->telepon }}">{{ $profil->telepon }}</a>
                    </p>
                @endif

                @if ($profil->email)
                    <p><strong>Email:</strong>
                        <a href="mailto:{{ $profil->email }}">{{ $profil->email }}</a>
                    </p>
                @endif
            </section>
        @endif

        @if ($profil->maps_embed_url)
            <section class="profile-card">
                <h2>Lokasi Gereja</h2>
                <iframe
                    class="map"
                    src="{{ $profil->maps_embed_url }}"
                    title="Peta lokasi GITJ Gabus"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </section>
        @endif
    @endif
</main>

<footer>
    &copy; {{ date('Y') }} GITJ Gabus. Informasi gereja dan pelayanan.
</footer>
</body>
</html>
