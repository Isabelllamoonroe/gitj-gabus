<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GITJ Gabus | Gereja Injili di Tanah Jawa</title>

    <style>
        :root {
            --cream: #faf7f0;
            --brown: #493326;
            --gold: #b99a5b;
            --white: #ffffff;
            --muted: #766b61;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            font-family: Georgia, "Times New Roman", serif;
            background: var(--cream);
            color: var(--brown);
            line-height: 1.7;
        }

        /* NAVBAR */
        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 13px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;

            background: linear-gradient(
                110deg,
                #fffdf8 0%,
                #f0e5d0 55%,
                #e4d0ad 100%
            );

            border-bottom: 1px solid #d5bd91;
            box-shadow: 0 5px 18px rgba(73, 51, 38, 0.14);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--brown);
            flex-shrink: 0;
        }

        .logo {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--gold);
            box-shadow: 0 3px 9px rgba(73, 51, 38, 0.2);
            background: white;
        }

        .brand-name {
            font-size: 21px;
            font-weight: bold;
            line-height: 1.25;
        }

        .brand-name small {
            display: block;
            margin-top: 4px;
            font-family: Arial, sans-serif;
            font-size: 10px;
            font-weight: normal;
            letter-spacing: 0.5px;
            color: #75604a;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 10px 20px;
        }

        nav a {
            color: var(--brown);
            font-family: Arial, sans-serif;
            font-size: 13px;
            text-decoration: none;
            transition: color 0.2s, transform 0.2s;
        }

        nav a:hover {
            color: #98733b;
            transform: translateY(-1px);
        }

        /* BANNER */
        .hero {
            min-height: 540px;
            display: flex;
            align-items: center;
            padding: 75px 9%;

            background:
                linear-gradient(
                    90deg,
                    rgba(39, 27, 19, 0.82),
                    rgba(39, 27, 19, 0.28)
                ),
                url("{{ asset('images/foto-gereja.jpg') }}")
                center 55% / cover no-repeat;

            color: white;
        }

        .hero-content {
            max-width: 750px;
        }

        h1 {
            font-size: clamp(38px, 6vw, 65px);
            line-height: 1.2;
            margin-bottom: 20px;
            font-weight: normal;
            text-shadow: 0 3px 12px rgba(0, 0, 0, 0.25);
        }

        .hero p {
            max-width: 600px;
            font-size: 17px;
            color: #fff8ed;
        }

        .button {
            display: inline-block;
            margin-top: 28px;
            padding: 12px 25px;
            background: linear-gradient(135deg, #c8aa70, #a27c3e);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.18);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        /* BAGIAN UMUM */
        section {
            padding: 65px 7%;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-heading h2 {
            font-size: clamp(29px, 4vw, 39px);
            font-weight: normal;
            line-height: 1.3;
        }

        .section-heading p {
            margin-top: 8px;
            color: #817366;
        }

        .gold-line {
            width: 65px;
            height: 3px;
            background: linear-gradient(90deg, #ddc58e, #a17a3c);
            margin: 15px auto;
            border-radius: 5px;
        }

        /* MENGENAL GEREJA */
        .about-section {
            background: linear-gradient(
                135deg,
                #f5eee1,
                #e9dcc6
            );
        }

        .about {
            max-width: 850px;
            margin: 0 auto;
            padding: 30px;
            text-align: center;
            background: rgba(255, 255, 255, 0.76);
            border: 1px solid #e6d6ba;
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(73, 51, 38, 0.06);
        }

        .about p {
            color: #69574a;
            font-size: 16px;
            line-height: 1.9;
        }

        /* RENUNGAN */
        .renungan-section {
            background: linear-gradient(
                180deg,
                #fffdf8 0%,
                #f8f1e5 100%
            );
            border-top: 1px solid #eadcc6;
            border-bottom: 1px solid #eadcc6;
        }

        .renungan-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .renungan-heading h2 {
            font-family: Arial, sans-serif;
            font-size: clamp(35px, 5vw, 52px);
            font-weight: 800;
            letter-spacing: 2px;
            color: #302820;
        }

        .renungan-heading .gold-line {
            margin-top: 18px;
        }

        .renungan-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 26px;
        }

        .renungan-card {
            min-width: 0;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid #eadcc6;
            border-radius: 7px;
            box-shadow: 0 6px 20px rgba(73, 51, 38, 0.07);
            transition: transform 0.25s, box-shadow 0.25s;
        }

        .renungan-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(73, 51, 38, 0.13);
        }

        .renungan-card img {
            display: block;
            width: 100%;
            height: 225px;
            object-fit: cover;
        }

        .renungan-content {
            padding: 22px;
        }

        .renungan-content h3 {
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
            font-size: clamp(20px, 2vw, 27px);
            line-height: 1.35;
            color: #302820;
        }

        .renungan-date {
            margin-bottom: 14px;
            color: #8b765b;
            font-size: 14px;
        }

        .renungan-description {
            color: #5f5146;
            font-size: 15px;
            line-height: 1.85;
            overflow-wrap: anywhere;
        }

        .read-more {
            display: inline-block;
            margin-top: 13px;
            color: #99743c;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
        }

        .read-more:hover {
            color: #604421;
            text-decoration: underline;
        }

        /* FOOTER */
        footer {
            position: relative;
            padding: 55px 7% 24px;
            background: linear-gradient(
                135deg,
                #f4f0ec 0%,
                #eee5d9 55%,
                #e5d6c2 100%
            );
            border-top: 1px solid #dfcfb7;
            color: #302820;
        }

        .footer-grid {
            max-width: 1250px;
            margin: 0 auto 35px;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 40px;
            text-align: center;
        }

        .footer-column h3 {
            margin-bottom: 12px;
            font-family: Arial, sans-serif;
            font-size: 23px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .footer-column p {
            color: #51463c;
            font-size: 16px;
            overflow-wrap: anywhere;
        }

        .footer-column a {
            color: #51463c;
            text-decoration: none;
        }

        .footer-column a:hover {
            color: #99743c;
        }

        .socials {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 13px;
            margin: 25px auto 20px;
        }

        .socials a {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border: 1px solid #d3c5b3;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            color: #493326;
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size: 17px;
            text-decoration: none;
            box-shadow: 0 3px 9px rgba(73, 51, 38, 0.06);
            transition: background 0.2s, transform 0.2s;
        }

        .socials a:hover {
            background: #dfc99f;
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 12px;
            letter-spacing: 1.3px;
            color: #493326;
        }

        /* TOMBOL KEMBALI KE ATAS */
        .back-to-top {
            position: fixed;
            right: 22px;
            bottom: 22px;
            z-index: 999;
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: linear-gradient(135deg, #493326, #241a14);
            color: white;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 25px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25);
            transition: transform 0.2s, background 0.2s;
        }

        .back-to-top:hover {
            transform: translateY(-4px);
            background: #98733d;
        }

        /* RESPONSIVE */
        @media (max-width: 950px) {
            header {
                justify-content: center;
            }

            nav {
                justify-content: center;
            }

            .renungan-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            header {
                padding: 13px 5%;
                gap: 15px;
            }

            .brand-name {
                font-size: 19px;
            }

            .logo {
                width: 47px;
                height: 47px;
            }

            nav {
                gap: 10px 14px;
            }

            nav a {
                font-size: 12px;
            }

            .hero {
                min-height: 430px;
                padding: 55px 7%;
                background-position: center;
            }

            .hero p {
                font-size: 15px;
            }

            section {
                padding: 45px 6%;
            }

            .about {
                padding: 22px;
            }

            .renungan-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .renungan-card img {
                height: 230px;
            }

            .renungan-content {
                padding: 20px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .footer-column h3 {
                font-size: 21px;
            }

            footer {
                padding: 40px 6% 22px;
            }

            .back-to-top {
                right: 14px;
                bottom: 14px;
                width: 42px;
                height: 42px;
            }
        }
    </style>
</head>
<body id="top">
<header>
    <a href="{{ route('beranda') }}" class="brand">
        <img
        src="{{ asset('images/logo-gitj-sinode.png') }}"
        alt="Logo GITJ Gabus"
        class="logo"
        >

        <div class="brand-name">
            GITJ Gabus
            <small>Gereja Injili di Tanah Jawa</small>
        </div>
    </a>

    <nav>
        <a href="{{ route('beranda') }}">Beranda</a>
        <a href="{{ route('profil') }}">Profil Gereja</a>
        <a href="{{ route('jadwal') }}">Jadwal Ibadah</a>
        <a href="{{ route('dokumentasi') }}">Dokumentasi</a>
        <a href="{{ route('lokasi') }}">Lokasi</a>
        <a href="{{ url('/berita') }}">Berita</a>
    </nav>
</header>

<main>
    <!-- BANNER UTAMA -->
    <section class="hero">
        <div class="hero-content">
            <h1>Berjalan Bersama<br>Dalam Kasih Tuhan</h1>

            <p>
                Selamat Datang di Website Resmi GITJ Gabus
            </p>

            <a href="{{ route('jadwal') }}" class="button">
                Lihat Jadwal Ibadah
            </a>
        </div>
    </section>

    <!-- PENGENALAN GEREJA -->
    <section class="about-section">
        <div class="section-heading">
            <h2>Mengenal GITJ Gabus</h2>
            <div class="gold-line"></div>
            <p>Tempat bersekutu, bertumbuh dalam iman, dan melayani sesama.</p>
        </div>

        <div class="about">
            <p>
                GITJ Gabus merupakan tempat bagi jemaat untuk beribadah,
                bersekutu, dan bertumbuh dalam iman kepada Tuhan.
                Melalui website ini, jemaat dan pengunjung dapat memperoleh
                informasi mengenai gereja serta kegiatan pelayanannya.
            </p>
        </div>
    </section>

    <!-- RENUNGAN -->
    <section class="renungan-section">
        <div class="renungan-heading">
            <h2>RENUNGAN</h2>
            <div class="gold-line"></div>
        </div>

        <div class="renungan-grid">

            <article class="renungan-card">
                <img
                    src="{{ asset('images/renungan-genter-deling.jpg') }}"
                    alt="Ilustrasi renungan Genter Deling"
                    loading="lazy"
                >

                <div class="renungan-content">
                    <h3>Genter Deling</h3>
                    <p class="renungan-date">April 9, 2026</p>

                    <p class="renungan-description">
                        GENTER DELING (II Timotius 3:16-17)
                        Ing wewengkon kawula saperangan tiyang nyambut
                        damelipun mocok mbedol telo. Pramila kathah
                        ingkang ngingah menda...
                    </p>

                    <a href="{{ url('/berita') }}" class="read-more">
                        Read More »
                    </a>
                </div>
            </article>

            <article class="renungan-card">
                <img
                    src="{{ asset('images/renungan-kembang-turi.jpg') }}"
                    alt="Bunga turi untuk ilustrasi renungan"
                    loading="lazy"
                >

                <div class="renungan-content">
                    <h3>Kembang Turi</h3>
                    <p class="renungan-date">April 9, 2026</p>

                    <p class="renungan-description">
                        KEMBANG TURI (I Para Raja 17:1-6)
                        Wulan Desember 2018 kula nanem wiji turi ing
                        pekarangan wingking griya. Awit wontenipun
                        jawah...
                    </p>

                    <a href="{{ url('/berita') }}" class="read-more">
                        Read More »
                    </a>
                </div>
            </article>

            <article class="renungan-card">
                <img
                    src="{{ asset('images/renungan-iman-lan-pakarti.jpg') }}"
                    alt="Buah di pohon untuk ilustrasi renungan"
                    loading="lazy"
                >

                <div class="renungan-content">
                    <h3>Iman Lan Pakarti</h3>
                    <p class="renungan-date">March 26, 2026</p>

                    <p class="renungan-description">
                        MENAWI wonten tiyang ingkang nggadahi pakarti
                        sae dhumateng sesami manungsa, nanging boten
                        pitados dhumateng Gusti Allah, saged kawastanan
                        tiyang punika...
                    </p>

                    <a href="{{ url('/berita') }}" class="read-more">
                        Read More »
                    </a>
                </div>
            </article>

        </div>
    </section>
</main>

<!-- FOOTER -->
<footer>
    <div class="footer-grid">

        <div class="footer-column">
            <h3>ALAMAT</h3>
            <p>
                Silakan isi alamat resmi<br>
                GITJ Gabus di sini.
            </p>
        </div>

        <div class="footer-column">
            <h3>TELEPON</h3>
            <p>
                <a href="tel:+62NOMORTELEPON">
                    Isi nomor telepon gereja
                </a>
            </p>
            <p>
                <a href="mailto:EMAILGEREJA">
                    Isi email gereja jika tersedia
                </a>
            </p>
        </div>

    </div>

    <div class="socials">
        <!-- Ganti URL # dengan tautan akun resmi gereja -->
        <a href="#" aria-label="Facebook">f</a>
        <a href="#" aria-label="Instagram">◎</a>
        <a href="#" aria-label="WhatsApp">W</a>
    </div>

    <div class="copyright">
        2026 ©GITJ GABUS
    </div>
</footer>

<a href="#top" class="back-to-top" aria-label="Kembali ke atas">
    ↑
</a>
</body>
</html>
