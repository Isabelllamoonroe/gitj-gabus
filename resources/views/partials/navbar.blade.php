<style>
    .main-navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        padding: 12px 6%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;

        background: linear-gradient(
            110deg,
            #fffdf8 0%,
            #f2e7d3 50%,
            #dfc79d 100%
        );

        border-bottom: 1px solid #d7c29d;
        box-shadow: 0 5px 18px rgba(73, 51, 38, 0.14);
    }

    .main-navbar .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        color: #493326;
        flex-shrink: 0;
    }

    .main-navbar .logo {
        width: 52px;
        height: 52px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #b99a5b;
        background: white;
        box-shadow: 0 3px 10px rgba(73, 51, 38, 0.18);
    }

    .main-navbar .brand-name {
        font-size: 21px;
        font-weight: bold;
        line-height: 1.3;
    }

    .main-navbar .brand-name small {
        display: block;
        margin-top: 3px;
        font-family: Arial, sans-serif;
        font-size: 10px;
        font-weight: normal;
        color: #80694c;
    }

    .main-navbar nav {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px 20px;
    }

    .main-navbar nav a {
        position: relative;
        padding: 7px 0;
        color: #493326;
        font-family: Arial, sans-serif;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.25s ease;
    }

    .main-navbar nav a::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 2px;
        background: #a68143;
        transition: width 0.25s ease;
    }

    .main-navbar nav a:hover,
    .main-navbar nav a.active {
        color: #98713a;
    }

    .main-navbar nav a:hover::after,
    .main-navbar nav a.active::after {
        width: 100%;
    }

    @media (max-width: 760px) {
        .main-navbar {
            justify-content: center;
            padding: 13px 5%;
        }

        .main-navbar nav {
            gap: 8px 16px;
        }

        .main-navbar nav a {
            font-size: 12px;
        }
    }
</style>

<header class="main-navbar">

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
        <a href="{{ route('beranda') }}"
           class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
            Beranda
        </a>

        <a href="{{ route('profil') }}"
           class="{{ request()->routeIs('profil') ? 'active' : '' }}">
            Profil Gereja
        </a>

        <a href="{{ route('jadwal') }}"
           class="{{ request()->routeIs('jadwal') ? 'active' : '' }}">
            Jadwal Ibadah
        </a>

        <a href="{{ route('dokumentasi') }}"
           class="{{ request()->routeIs('dokumentasi') ? 'active' : '' }}">
            Dokumentasi
        </a>

        <a href="{{ route('lokasi') }}"
           class="{{ request()->routeIs('lokasi') ? 'active' : '' }}">
            Lokasi
        </a>

        <a href="{{ url('/berita') }}"
           class="{{ request()->is('berita*') ? 'active' : '' }}">
            Berita
        </a>
    </nav>

</header>
