
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | GITJ Gabus</title>

    <style>
        :root {
            --cream: #faf7f0;
            --brown: #493326;
            --gold: #b99a5b;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: var(--cream);
            color: var(--brown);
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 245px;
            flex-shrink: 0;
            background: var(--brown);
            color: white;
            padding: 28px 18px;
        }

        .brand {
            font-family: Georgia, serif;
            font-size: 22px;
            font-weight: bold;
            padding: 0 10px 28px;
            border-bottom: 1px solid #ffffff30;
        }

        .sidebar p {
            color: #d9cbb7;
            font-size: 12px;
            letter-spacing: 2px;
            margin: 28px 10px 12px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 10px;
            border-radius: 6px;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #ffffff18;
            color: #e4c98e;
        }

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: white;
            padding: 22px 30px;
            border-bottom: 1px solid #e7dcc8;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .topbar h1 {
            margin: 0;
            font-family: Georgia, serif;
            font-size: 25px;
        }

        .topbar span {
            color: #77685b;
            font-size: 13px;
        }

        .content {
            padding: 30px;
        }

        .welcome {
            background: white;
            padding: 28px;
            border-radius: 10px;
            border: 1px solid #e7dcc8;
            border-left: 5px solid var(--gold);
            margin-bottom: 25px;
        }

        .welcome h2 {
            font-family: Georgia, serif;
            margin: 0 0 10px;
            font-size: 24px;
        }

        .welcome p {
            color: #77685b;
            line-height: 1.7;
            margin-bottom: 0;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border: 1px solid #e7dcc8;
            border-radius: 10px;
            padding: 24px;
        }

        .card .icon {
            font-size: 27px;
        }

        .card h3 {
            margin: 14px 0 8px;
            font-size: 18px;
        }

        .card p {
            color: #77685b;
            font-size: 14px;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            background: var(--brown);
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 13px;
            margin-top: 8px;
        }

        .button:hover {
            background: #654a36;
        }

        .public-link {
            margin-top: 25px;
        }

        .public-link a {
            color: #795c2c;
        }

        @media (max-width: 650px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: auto;
                padding: 20px 15px;
            }

            .brand {
                padding-bottom: 15px;
            }

            .sidebar p {
                margin-top: 18px;
            }

            .topbar,
            .content {
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="layout">

        <aside class="sidebar">
            <div class="brand">GITJ Gabus</div>

            <p>MENU UTAMA</p>
            <a href="{{ route('admin.dashboard') }}" class="active">
                🏠 Dashboard
            </a>

            <a href="{{ route('admin.jadwal.index') }}">
                📅 Jadwal Ibadah
            </a>

            <a href="{{ route('admin.dokumentasi.index') }}">
                📷 Dokumentasi
            </a>

            <p>WEBSITE</p>
            <a href="{{ route('beranda') }}" target="_blank">
                🌐 Lihat Website
            </a>
        </aside>

        <main class="main">
            <header class="topbar">
                <h1>Dashboard Admin</h1>
                <span>Panel Pengelolaan Gereja</span>
            </header>

            <section class="content">
                <div class="welcome">
                    <h2>Selamat datang, Admin! 🤎</h2>
                    <p>
                        Kelola informasi GITJ Gabus melalui panel ini.
                        Kamu dapat mulai dengan mengatur jadwal ibadah.
                    </p>
                </div>

                <div class="cards">
                    <article class="card">
                        <div class="icon">📅</div>
                        <h3>Jadwal Ibadah</h3>
                        <p>
                            Tambahkan, perbarui, dan hapus jadwal
                            kegiatan ibadah gereja.
                        </p>
                        <a class="button"
                           href="{{ route('admin.jadwal.index') }}">
                            Kelola Jadwal
                        </a>
                    </article>

                    <article class="card">
                        <div class="icon">🌐</div>
                        <h3>Website Pengunjung</h3>
                        <p>
                            Buka halaman publik untuk memeriksa
                            tampilan website GITJ Gabus.
                        </p>
                        <a class="button"
                           href="{{ route('beranda') }}"
                           target="_blank">
                            Lihat Website
                        </a>
                    </article>
                </div>

                <div class="public-link">
                    <p>
                        Tips: setelah menyimpan perubahan, periksa
                        hasilnya di <a href="{{ route('beranda') }}">halaman Beranda</a>.
                    </p>
                </div>
            </section>
        </main>

    </div>
</body>
</html>
