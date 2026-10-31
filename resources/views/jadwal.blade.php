
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Ibadah | GITJ Gabus</title>

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

        .page-title p {
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 12px;
        }

        .page-title h1 {
            font-size: clamp(28px, 4vw, 42px);
            margin: 10px 0;
        }

        .page-title .intro {
            color: #77685b;
            text-transform: none;
            letter-spacing: normal;
            font-size: 15px;
        }

        .schedule-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 10px 25px 75px;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 25px;
        }

        .schedule-card {
            background: var(--white);
            border: 1px solid #e8dece;
            border-top: 4px solid var(--gold);
            border-radius: 8px;
            padding: 28px;
            box-shadow: 0 5px 18px rgba(73, 51, 38, 0.05);
        }

        .schedule-card .number {
            color: var(--gold);
            font-size: 13px;
            letter-spacing: 2px;
        }

        .schedule-card h2 {
            font-size: 23px;
            margin: 8px 0 18px;
        }

        .schedule-card p {
            margin: 9px 0;
            font-size: 15px;
        }

        .schedule-card strong {
            display: inline-block;
            min-width: 115px;
        }

        .schedule-note {
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid #eee5d8;
            color: #84776a;
            font-size: 13px;
        }

        footer {
            text-align: center;
            padding: 25px;
            background: var(--brown);
            color: var(--white);
            font-size: 13px;
        }

        @media (max-width: 700px) {
            header {
                padding: 16px 5%;
            }

            nav {
                gap: 12px;
            }

            .schedule-container {
                grid-template-columns: 1fr;
                padding: 10px 18px 50px;
            }

            .schedule-card {
                padding: 23px;
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
            <a href="{{ route('jadwal') }}" class="active">Jadwal</a>
            <a href="{{ route('dokumentasi') }}">Dokumentasi</a>
            <a href="{{ route('lokasi') }}">Lokasi</a>
        </nav>
    </header>

    <main>
        <section class="page-title">
            <p>GITJ Gabus</p>
            <h1>Jadwal Ibadah</h1>
            <p class="intro">
                Bersama dan Melayani Bersama Tuhan
            </p>
        </section>


            <section class="schedule-container">
        @forelse ($jadwal as $item)
            <article class="schedule-card">
            <span class="number">
                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} — IBADAH
            </span>
            <h2>{{ $item->nama_ibadah }}</h2>

            <p>
                <strong>Hari</strong>:
                {{ $item->hari }}
            </p>

            <p><strong>Waktu</strong>:
                {{ substr($item->waktu_mulai, 0, 5) }}
                @if ($item->waktu_selesai)
                    – {{ substr($item->waktu_selesai, 0, 5) }}
                @endif
            </p>

            <p>
                <strong>Tempat:</strong> {{ $item->lokasi ?: 'Belum diisi' }}
            </p>
            <p>
                <strong>Pengkhotbah:</strong> {{ $item->pengkhotbah ?: 'Belum diisi' }}
            </p>
            <p>
                <strong>Nats Alkitab:</strong> {{ $item->nats_alkitab ?: 'Belum diisi' }}
            </p>
            <p>
                <strong>Tema Ibadah:</strong> {{ $item->tema ?: 'Belum diisi' }}
            </p>
        @if ($item->keterangan)
        <div class="schedule-note">{{ $item->keterangan }}</div>
        @endif
        </article>

    @empty
        <article class="schedule-card">
            <h2>Jadwal Belum Tersedia</h2>
            <p>Belum ada jadwal ibadah yang dipublikasikan.</p>
        </article>
    @endforelse
</section>


            <article class="schedule-card">
                <span class="number">02 — PERSEKUTUAN</span>
                <h2>Persekutuan Doa</h2>
                <p><strong>Hari</strong>: Belum diisi</p>
                <p><strong>Waktu</strong>: Belum diisi</p>
                <p><strong>Tempat</strong>: Belum diisi</p>
                <div class="schedule-note">
                    Mari berdoa dan saling menguatkan dalam iman.
                </div>
            </article>

            <article class="schedule-card">
                <span class="number">03 — PEMBELAJARAN</span>
                <h2>Pendalaman Alkitab</h2>
                <p><strong>Hari</strong>: Belum diisi</p>
                <p><strong>Waktu</strong>: Belum diisi</p>
                <p><strong>Tempat</strong>: Belum diisi</p>
                <p><strong>Firman</strong>: Belum diisi</p>
                <div class="schedule-note">
                    Belajar memahami firman Tuhan bersama-sama.
                </div>
            </article>

            <article class="schedule-card">
                <span class="number">04 — PEMUDA</span>
                <h2>Persekutuan Pemuda</h2>
                <p><strong>Hari</strong>: Belum diisi</p>
                <p><strong>Waktu</strong>: Belum diisi</p>
                <p><strong>Tempat</strong>: Belum diisi</p>
                <div class="schedule-note">
                    Bertumbuh, melayani, dan bersekutu bersama pemuda.
                </div>
            </article>
        </section>
    </main>

    <footer>
        &copy; {{ date('Y') }} GITJ Gabus. Semua hak dilindungi.
    </footer>
</body>
</html>
