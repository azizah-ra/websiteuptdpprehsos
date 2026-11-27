
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#10231d">
    <meta name="description" content="Website profil UPTD PP REHSOS Kabupaten Sidoarjo">
    <title>@yield('title', 'UPTD PP REHSOS Kabupaten Sidoarjo')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --dark: #10231d;
            --green: #167c53;
            --text: #19382a;
            --muted: #63766b;
            --soft: #f5f7f3;
            --border: #e2e8e2;
            --lime: #d9f0bd;
        }

        * { box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: #fff;
            color: var(--text);
            font: 15px/1.75 'DM Sans', Arial, sans-serif;
        }

        a { text-decoration: none; color: inherit; }
        img { display: block; max-width: 100%; }
        button { font: inherit; cursor: pointer; }

        .container {
            width: min(1200px, calc(100% - 48px));
            margin: auto;
        }

        /* NAVBAR */
        .header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--dark);
            color: #fff;
            box-shadow: 0 3px 18px #00000014;
        }

        .nav-inner {
            min-height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 0;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            background: #fff;
            padding: 4px;
            border-radius: 50%;
        }

        .brand strong {
            display: block;
            font: 800 16px/1.3 Manrope, sans-serif;
        }

        .brand small {
            display: block;
            font-size: 10px;
            color: #bfd2c4;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 26px;
        }

        .nav-links a {
            white-space: nowrap;
            font-size: 13px;
            font-weight: 700;
            color: #eaf2ec;
            transition: color .2s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--lime);
        }

        .nav-links .contact-link {
            background: var(--lime);
            padding: 11px 20px;
            color: var(--dark);
            border-radius: 50px;
        }

        .nav-links .contact-link:hover {
            background: #c7e8a2;
            color: var(--dark);
        }

        .menu-button {
            display: none;
            width: 44px;
            height: 44px;
            border: 1px solid #ffffff44;
            border-radius: 8px;
            color: #fff;
            background: transparent;
            font-size: 23px;
        }

        /* KOMPONEN KONTEN */
        .section { padding: 95px 0; }
        .soft { background: var(--soft); }

        .eyebrow {
            display: block;
            color: var(--green);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 17px;
        }

        .heading {
            margin: 0 0 20px;
            color: var(--text);
            font: 800 clamp(32px, 4.5vw, 56px)/1.15 Manrope, sans-serif;
            letter-spacing: -1.7px;
        }

        .lead {
            font-size: 16px;
            color: var(--muted);
            line-height: 1.9;
        }

        .text-link {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-top: 18px;
            padding-bottom: 5px;
            border-bottom: 2px solid var(--green);
            font-size: 13px;
            font-weight: 800;
            color: var(--green);
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 13px 22px;
            border-radius: 50px;
            background: var(--lime);
            color: var(--dark);
            font-size: 13px;
            font-weight: 800;
            transition: transform .2s ease;
        }

        .button:hover { transform: translateY(-2px); }

        .page-heading {
            padding: 76px 0 65px;
            background: var(--soft);
        }

        .page-heading h1 {
            max-width: 850px;
            margin: 0 0 18px;
            font: 800 clamp(40px, 5.8vw, 73px)/1.1 Manrope, sans-serif;
            letter-spacing: -2.5px;
        }

        .page-heading p {
            max-width: 700px;
            color: var(--muted);
            font-size: 17px;
        }

        /* FOOTER */
        .footer {
            background: var(--dark);
            color: #c6d8cb;
            padding: 60px 0 25px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 60px;
        }

        .footer h3 {
            color: #fff;
            font: 800 16px Manrope, sans-serif;
            margin: 0 0 16px;
        }

        .footer p,
        .footer a {
            color: #b2c8b9;
            font-size: 13px;
            line-height: 1.9;
        }

        .footer a { display: block; margin-bottom: 6px; }
        .footer a:hover { color: #fff; }

        .footer-bottom {
            margin-top: 48px;
            padding-top: 20px;
            border-top: 1px solid #ffffff22;
            font-size: 11px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .menu-button { display: block; }

            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--dark);
                padding: 18px 24px 24px;
                flex-direction: column;
                align-items: stretch;
                gap: 0;
                border-top: 1px solid #ffffff25;
            }

            .nav-links.open { display: flex; }
            .nav-links a { padding: 11px 0; }
            .nav-links .contact-link {
                margin-top: 10px;
                text-align: center;
                padding: 12px;
            }

            .footer-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 580px) {
            .container { width: calc(100% - 34px); }
            .nav-inner { min-height: 72px; }
            .brand img { width: 42px; height: 42px; }
            .brand strong { font-size: 13px; }
            .brand small { font-size: 9px; }
            .section { padding: 70px 0; }
            .page-heading { padding: 60px 0 45px; }
            .footer-grid { grid-template-columns: 1fr; gap: 28px; }
        }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            .button { transition: none; }
        }


/* =====================================
   NAVBAR UPTD PP REHSOS - FINAL
===================================== */

.header {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: #ffffff;
    color: #173b2a;
    border-bottom: 1px solid #e7eee9;
    box-shadow: 0 3px 20px rgba(0, 0, 0, 0.035);
}

.nav-inner {
    min-height: 85px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 22px;
}

.brand {
    display: flex;
    align-items: center;
    gap: 13px;
    text-decoration: none;
}

.brand img {
    width: 52px;
    height: 52px;
    object-fit: contain;
    background: transparent;
    border-radius: 50%;
    padding: 0;
}

.brand strong {
    display: block;
    color: #173b2a;
    font-family: 'Manrope', sans-serif;
    font-weight: 800;
    font-size: 16px;
    line-height: 1.4;
}

.brand small {
    display: block;
    color: #728477;
    font-size: 11px;
}

/* LINK NAVIGASI */

.nav-links {
    display: flex;
    align-items: center;
    gap: 25px;
}

.nav-links a {
    position: relative;
    color: #34483c;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    transition: color .25s ease;
}

.nav-links a:not(.contact-link):hover,
.nav-links a:not(.contact-link).active {
    color: #087f56;
}

.nav-links a:not(.contact-link)::after {
    content: "";
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 0;
    height: 2px;
    background: #087f56;
    transition: width .25s ease;
}

.nav-links a:not(.contact-link):hover::after,
.nav-links a:not(.contact-link).active::after {
    width: 100%;
}

/* TOMBOL HUBUNGI KAMI */

.nav-links .contact-link,
.nav-links .contact-link.active {
    background: #087f56;
    color: #ffffff;
    padding: 13px 23px;
    border-radius: 50px;
    white-space: nowrap;
    transition:
        background .25s ease,
        transform .25s ease;
}

.nav-links .contact-link:hover {
    background: #066a47;
    color: #ffffff;
    transform: translateY(-2px);
}

/* MENU HP */

.menu-button {
    display: none;
    width: 44px;
    height: 44px;
    color: #173b2a;
    background: transparent;
    border: 1px solid #dce8df;
    border-radius: 9px;
    font-size: 24px;
}

/* RESPONSIVE */

@media (max-width: 1100px) {

    .menu-button {
        display: block;
    }

    .nav-links {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #ffffff;
        padding: 18px 25px 28px;
        flex-direction: column;
        align-items: stretch;
        gap: 0;
        border-top: 1px solid #e7eee9;
        box-shadow: 0 15px 25px rgba(0,0,0,.06);
    }

    .nav-links.open {
        display: flex;
    }

    .nav-links a {
        color: #34483c;
        padding: 13px 0;
        border-bottom: 1px solid #edf2ee;
    }

    .nav-links a:not(.contact-link)::after {
        display: none;
    }

    .nav-links .contact-link {
        margin-top: 16px;
        padding: 14px 20px;
        text-align: center;
        border-bottom: none;
    }
}

@media (max-width: 580px) {

    .nav-inner {
        min-height: 72px;
    }

    .brand img {
        width: 43px;
        height: 43px;
    }

    .brand strong {
        font-size: 13px;
    }

    .brand small {
        font-size: 10px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .nav-links a,
    .nav-links a::after,
    .nav-links .contact-link {
        transition: none;
    }
}


/* ==========================================
   INTERNAL PAGES — MODERN COMPACT TYPOGRAPHY
   Tidak memengaruhi halaman Beranda
========================================== */

/* HERO / JUDUL HALAMAN */
.inner-page .page-heading {
    padding: 54px 0 55px;
    background: #f6f8f5;
}

.inner-page .page-heading h1 {
    max-width: 900px;
    font-family: 'Manrope', sans-serif;
    font-size: clamp(32px, 3.6vw, 47px);
    line-height: 1.18;
    font-weight: 800;
    letter-spacing: -1.7px;
    margin: 0 0 16px;
    color: #18392a;
}

.inner-page .page-heading p {
    max-width: 690px;
    font-size: 15px;
    line-height: 1.8;
    color: #65786a;
    margin: 0;
}

/* JUDUL SETIAP BAGIAN */
.inner-page .heading {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(26px, 2.7vw, 35px);
    line-height: 1.28;
    font-weight: 800;
    letter-spacing: -1px;
    margin: 0 0 18px;
    color: #18392a;
}

/* LABEL KECIL DI ATAS JUDUL */
.inner-page .eyebrow {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.6px;
    margin-bottom: 14px;
    color: #168055;
}

/* PARAGRAF UTAMA */
.inner-page .lead {
    font-size: 15px;
    line-height: 1.85;
    color: #66796c;
}

/* JARAK ANTAR BAGIAN */
.inner-page .section {
    padding: 65px 0;
}

/* PENGECILAN KHUSUS HERO LAYANAN
   Jika masih memakai class service-page */
.inner-page .service-page .intro {
    padding: 57px 0;
}

.inner-page .service-page .intro h1 {
    font-size: clamp(32px, 3.6vw, 47px);
    line-height: 1.18;
    letter-spacing: -1.7px;
    margin-bottom: 16px;
}

.inner-page .service-page .intro p {
    font-size: 15px;
    line-height: 1.8;
}

/* KOMPONEN PROFIL */
.inner-page .profil-poster .judul-kecil {
    font-size: 21px;
}

.inner-page .profil-poster .teks-visi {
    font-size: clamp(19px, 2vw, 25px);
    line-height: 1.6;
}

.inner-page .profil-poster .teks-profil {
    font-size: 15px;
    line-height: 1.85;
}

/* BAGIAN PEMETAAN */
.inner-page .maps-information {
    padding: 65px 0;
}

/* RESPONSIVE TABLET */
@media (max-width: 900px) {

    .inner-page .page-heading {
        padding: 45px 0;
    }

    .inner-page .section {
        padding: 55px 0;
    }
}

/* RESPONSIVE HP */
@media (max-width: 580px) {

    .inner-page .page-heading {
        padding: 40px 0 43px;
    }

    .inner-page .page-heading h1,
    .inner-page .service-page .intro h1 {
        font-size: 31px;
        line-height: 1.22;
        letter-spacing: -0.9px;
    }

    .inner-page .heading {
        font-size: 26px;
        line-height: 1.3;
        letter-spacing: -0.6px;
    }

    .inner-page .page-heading p,
    .inner-page .lead {
        font-size: 14px;
        line-height: 1.8;
    }

    .inner-page .section {
        padding: 46px 0;
    }

    .inner-page .service-page .intro {
        padding: 43px 0;
    }

    .inner-page .maps-information {
        padding: 48px 0;
    }
}

    </style>

    @stack('styles')



{{-- PERBAIKAN GRID KHUSUS HALAMAN LAYANAN --}}
@if(request()->routeIs('layanan'))
<style>

/* =====================================
   DESKTOP — TATA LETAK FINAL
===================================== */

/* TENTANG LAYANAN: 2 KOLOM */
.lm-page .container.lm-about-grid {
    display: grid !important;
    grid-template-columns:
        minmax(0, 1fr)
        minmax(0, 0.95fr) !important;
    gap: 36px !important;
    align-items: center !important;
}

.lm-page .lm-about-copy,
.lm-page .lm-about-panel {
    min-width: 0;
    width: auto;
}

/* PENERIMA LAYANAN: 3 KOLOM */
.lm-page .lm-cards {
    display: grid !important;
    grid-template-columns:
        repeat(3, minmax(0, 1fr)) !important;
    gap: 18px !important;
    align-items: stretch;
}

.lm-page .lm-card {
    width: auto !important;
    min-width: 0;
    min-height: 220px;
    margin: 0;
}

/* TAHAPAN PENANGANAN: 4 KOLOM */
.lm-page .lm-steps {
    display: grid !important;
    grid-template-columns:
        repeat(4, minmax(0, 1fr)) !important;
    gap: 16px !important;
    align-items: stretch;
}

.lm-page .lm-step {
    width: auto !important;
    min-width: 0;
    min-height: 180px;
    margin: 0;
    padding: 22px;
}

/* JARAK ANTARBAGIAN */
.lm-page .lm-section {
    padding-top: 45px;
    padding-bottom: 45px;
}

/* =====================================
   TABLET — 2 KOLOM
===================================== */

@media (min-width: 701px) and (max-width: 1023px) {

    .lm-page .container.lm-about-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr)) !important;
        gap: 24px !important;
    }

    .lm-page .lm-cards {
        grid-template-columns:
            repeat(2, minmax(0, 1fr)) !important;
    }

    .lm-page .lm-steps {
        grid-template-columns:
            repeat(2, minmax(0, 1fr)) !important;
    }
}

/* =====================================
   HANDPHONE — 1 KOLOM
===================================== */

@media (max-width: 700px) {

    .lm-page .container.lm-about-grid,
    .lm-page .lm-cards,
    .lm-page .lm-steps {
        grid-template-columns:
            minmax(0, 1fr) !important;
        gap: 16px !important;
    }

    .lm-page .lm-card,
    .lm-page .lm-step {
        min-height: auto;
    }

    .lm-page .lm-section {
        padding-top: 35px;
        padding-bottom: 35px;
    }
}

</style>
@endif


{{-- ANIMASI GLOBAL WEBSITE --}}


<script>
(function () {
    try {
        const reduced = window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;

        const seen = sessionStorage.getItem(
            'rehsosIntroSeen'
        ) === '1';

        if (!reduced && !seen) {
            document.documentElement.classList.add(
                'rehsos-intro-active'
            );
        }
    } catch (error) {}
})();
</script>

<link
    rel="stylesheet"
    href="{{ asset('css/site-motion.css') }}?v=9"
>

<style>
    /* Loading tidak terlihat saat halaman normal */
    #rehsos-nav-screen {
        position: fixed;
        inset: 0;
        z-index: 99998;
        visibility: hidden;
        pointer-events: none;
    }
</style>

<link rel="stylesheet"
      href="{{ asset('css/menu-transition.css') }}?v=20">

      <link rel="stylesheet"
      href="{{ asset('css/airplane-cursor.css') }}?v=3">

</head>


<body class="{{ request()->routeIs('beranda') ? 'home-page' : 'inner-page' }}">



<div id="rehsos-intro"
     aria-label="Animasi pembuka UPTD PP REHSOS">

    <div class="rehsos-intro-door left"></div>
    <div class="rehsos-intro-door right"></div>

    <div class="rehsos-intro-inner">
        <img
            src="{{ asset('images/logo.png') }}"
            alt="Logo UPTD PP REHSOS"
            class="rehsos-intro-logo"
        >

        <h2 class="rehsos-intro-name">
            UPTD PP REHSOS
        </h2>

        <p class="rehsos-intro-location">
            KABUPATEN SIDOARJO
        </p>

        <span class="rehsos-intro-line"
              aria-hidden="true"></span>
    </div>

    <button
        type="button"
        id="rehsos-intro-skip"
        class="rehsos-intro-skip"
    >
        Lewati Intro
    </button>

</div>


    <!-- LEWATI INTRO -->
    <button
        type="button"
        id="rehsos-intro-skip"
        class="rehsos-intro-skip"
    >
        Lewati Intro →
    </button>

</div>

<!-- AKHIR INTRO -->


    <!-- LEWATI INTRO -->
    <button
        type="button"
        id="rehsos-intro-skip"
        class="rehsos-intro-skip"
    >
        Lewati Intro →
    </button>

</div>



<!-- TRANSISI ANTAR MENU -->

@php
    $rehsosNavPages = [
        ['url' => route('beranda'), 'name' => 'Beranda'],
        ['url' => route('profil'), 'name' => 'Profil Instansi'],
        ['url' => route('layanan'), 'name' => 'Layanan'],
        ['url' => route('informasi'), 'name' => 'Informasi'],
        ['url' => route('fasilitas'), 'name' => 'Fasilitas'],
        ['url' => route('kontak'), 'name' => 'Hubungi Kami'],
    ];
@endphp

<div id="rehsos-nav-screen"
     aria-hidden="true"
     data-pages="{{ json_encode($rehsosNavPages) }}">

    <div class="rehsos-nav-content">

        <h2 class="rehsos-nav-destination"
            id="rehsos-nav-destination">
            Beranda
        </h2>

        <div class="rehsos-nav-loader"
             aria-hidden="true"></div>

    </div>

</div>



<!-- NAVBAR UTAMA -->
<header class="header">

    <div class="container nav-inner">

        <!-- LOGO DAN IDENTITAS -->
        <a href="{{ route('beranda') }}" class="brand">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo UPTD PP REHSOS Kabupaten Sidoarjo"
            >

            <span>
                <strong>UPTD PP REHSOS</strong>
                <small>Kabupaten Sidoarjo</small>
            </span>

        </a>

        <!-- TOMBOL MENU HP -->
        <button
            id="menu-button"
            type="button"
            class="menu-button"
            aria-label="Buka menu navigasi"
            aria-controls="main-nav"
            aria-expanded="false"
        >
            ☰
        </button>

        <!-- MENU NAVIGASI -->
        <nav
            class="nav-links"
            id="main-nav"
            aria-label="Navigasi utama"
        >

            <a
                href="{{ route('beranda') }}"
                class="{{ request()->routeIs('beranda') ? 'active' : '' }}"
            >
                Beranda
            </a>

            <a
                href="{{ route('profil') }}"
                class="{{ request()->routeIs('profil') ? 'active' : '' }}"
            >
                Profil
            </a>

            <a
                href="{{ route('layanan') }}"
                class="{{ request()->routeIs('layanan') ? 'active' : '' }}"
            >
                Layanan
            </a>

            <a
                href="{{ route('informasi') }}"
                class="{{ request()->routeIs('informasi') ? 'active' : '' }}"
            >
                Informasi
            </a>

            <a
                href="{{ route('fasilitas') }}"
                class="{{ request()->routeIs('fasilitas') ? 'active' : '' }}"
            >
                Fasilitas
            </a>

            <a
                href="{{ route('kontak') }}"
                class="contact-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
            >
                Hubungi Kami ↗
            </a>

        </nav>

    </div>

</header>



<div id="rehsos-page">
    @yield('content')
</div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.getElementById('menu-button');
            const nav = document.getElementById('main-nav');

            if (!button || !nav) return;

            button.addEventListener('click', function () {
                const opened = nav.classList.toggle('open');
                button.setAttribute('aria-expanded', String(opened));
                button.textContent = opened ? '✕' : '☰';
            });

            nav.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    nav.classList.remove('open');
                    button.setAttribute('aria-expanded', 'false');
                    button.textContent = '☰';
                });
            });
        });
    </script>

    @stack('scripts')


@include('partials.footer')



<!-- INTRO WEBSITE -->
<div id="rehsos-intro" aria-hidden="true">

    <div class="rehsos-intro-inner">

        <img
            src="{{ asset('images/logo.png') }}"
            class="rehsos-intro-logo"
            alt=""
        >

        <h2 class="rehsos-intro-name">
            UPTD PP REHSOS
        </h2>

        <p class="rehsos-intro-location">
            KABUPATEN SIDOARJO
        </p>

        <div class="rehsos-intro-line"></div>

    </div>

</div>
<!-- END INTRO -->


{{-- JAVASCRIPT ANIMASI WEBSITE --}}

<script
    src="{{ asset('js/site-motion.js') }}?v=9"
    defer
></script>

<script
    src="{{ asset('js/menu-transition.js') }}?v=20"
    defer
></script>

<script src="{{ asset('js/airplane-cursor.js') }}?v=3" defer></script>
</body>
</html>
