
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101f1a">
    <meta name="description" content="Profil dan informasi pelayanan sosial UPTD PP REHSOS Kabupaten Sidoarjo.">
    <title>UPTD PP REHSOS | Kabupaten Sidoarjo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --dark: #101f1a;
            --forest: #123d2b;
            --green: #177c55;
            --lime: #d8f0bb;
            --text: #1c3328;
            --muted: #64776d;
            --soft: #f4f7f3;
            --line: #e1e9e2;
        }

        * { box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            margin: 0;
            font: 15px/1.7 'DM Sans', Arial, sans-serif;
            color: var(--text);
            background: white;
            overflow-x: hidden;
        }

        a { color: inherit; text-decoration: none; }
        img { display: block; max-width: 100%; }
        button { cursor: pointer; font: inherit; }

        .container {
            width: min(1200px, calc(100% - 48px));
            margin: auto;
        }

        /* NAVBAR */
        .header {
            background: var(--dark);
            color: white;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 3px 16px #00000016;
        }

        .nav-wrap {
            min-height: 82px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            background: white;
            padding: 4px;
            border-radius: 50%;
        }

        .brand strong {
            display: block;
            font: 800 16px/1.3 Manrope, sans-serif;
        }

        .brand small {
            display: block;
            color: #b6cbbd;
            font-size: 10px;
            margin-top: 3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 26px;
        }

        .nav-links a {
            color: #eef5ef;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .nav-links a:hover { color: var(--lime); }

        .nav-links .nav-cta {
            padding: 11px 19px;
            background: var(--lime);
            color: var(--dark);
            border-radius: 30px;
        }

        .menu-button {
            display: none;
            background: transparent;
            color: white;
            border: 1px solid #ffffff44;
            border-radius: 8px;
            width: 43px;
            height: 43px;
            font-size: 23px;
        }

        /* HERO */
        .hero {
            min-height: 650px;
            position: relative;
            display: flex;
            align-items: center;
            isolation: isolate;
            overflow: hidden;
            color: white;
            background: var(--forest);
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background:
                linear-gradient(
                    90deg,
                    rgba(7,31,23,.85),
                    rgba(7,31,23,.48) 48%,
                    rgba(7,31,23,.08)
                ),
                url('{{ asset('images/gedung-liponsos.jpeg') }}')
                center 42% / cover no-repeat;
        }

        .hero-content { padding: 110px 0; }

        .eyebrow {
            color: var(--lime);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero h1 {
            max-width: 800px;
            margin: 22px 0;
            font: 800 clamp(43px, 6.2vw, 83px)/1.08 Manrope, sans-serif;
            letter-spacing: -3px;
        }

        .hero p {
            font-size: 18px;
            color: #edf4ed;
            margin-bottom: 30px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 13px 22px;
            background: var(--lime);
            color: #173928;
            border-radius: 40px;
            font-size: 13px;
            font-weight: 800;
        }

        .button:hover { background: #c7eaa2; }

        /* SECTIONS */
        .section { padding: 95px 0; }
        .soft { background: var(--soft); }

        .section-label {
            color: var(--green);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.8px;
            text-transform: uppercase;
        }

        .section-title {
            font: 800 clamp(30px, 4vw, 49px)/1.2 Manrope, sans-serif;
            letter-spacing: -1.6px;
            margin: 13px 0 20px;
        }

        .lead {
            color: var(--muted);
            font-size: 16px;
            line-height: 1.85;
        }

        .section-heading {
            max-width: 770px;
            margin-bottom: 35px;
        }

        /* PROFIL */
        .profile-grid {
            display: grid;
            grid-template-columns: .95fr 1.05fr;
            gap: 70px;
            align-items: center;
        }

        .profile-photo {
            min-height: 470px;
            border-radius: 23px;
            background:
                linear-gradient(0deg, #09291b94, transparent 60%),
                url('{{ asset('images/gedung-liponsos.jpeg') }}')
                center / cover;
            display: flex;
            align-items: end;
            padding: 28px;
            color: white;
        }

        .profile-photo strong {
            font: 800 23px/1.3 Manrope, sans-serif;
        }

        .info-strip {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 28px;
        }

        .info-item {
            padding: 17px;
            background: #f0f6ee;
            border-radius: 12px;
        }

        .info-item strong {
            display: block;
            font-size: 13px;
        }

        .info-item span {
            color: var(--muted);
            font-size: 11px;
        }

        /* VISI MISI */
        .vision-grid {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 20px;
        }

        .vision-card {
            padding: 35px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 18px;
        }

        .vision-card h3 {
            font: 800 23px Manrope, sans-serif;
            margin: 0 0 18px;
        }

        .vision-card p,
        .vision-card li {
            color: #526b5c;
            line-height: 1.85;
        }

        .vision-card ol {
            margin: 0;
            padding-left: 20px;
        }

        .vision-card li { margin-bottom: 10px; }

        /* LAYANAN */
        .service-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .service-card {
            padding: 30px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 17px;
        }

        .service-number {
            color: var(--green);
            font-weight: 800;
            font-size: 12px;
        }

        .service-card h3 {
            font: 800 21px/1.3 Manrope, sans-serif;
            margin: 32px 0 12px;
        }

        .service-card p {
            font-size: 13px;
            color: var(--muted);
            margin: 0;
        }

        /* PUBLIKASI */
        .publication-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .publication-card {
            border: 1px solid var(--line);
            border-radius: 18px;
            background: white;
            overflow: hidden;
        }

        .publication-cover {
            height: 330px;
            background: #e9f2eb;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            overflow: hidden;
        }

        .publication-cover img {
            height: 100%;
            width: 100%;
            object-fit: contain;
        }

        .publication-copy { padding: 24px; }

        .publication-copy h3 {
            margin: 0 0 8px;
            font: 800 20px Manrope, sans-serif;
        }

        .publication-copy p {
            color: var(--muted);
            font-size: 13px;
        }

        .publication-copy a {
            display: inline-block;
            color: var(--green);
            font-size: 13px;
            font-weight: 800;
            margin-top: 9px;
        }

        .doc-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .doc-card {
            padding: 23px;
            border: 1px solid var(--line);
            border-radius: 15px;
            background: white;
            display: flex;
            flex-direction: column;
        }

        .doc-icon { font-size: 27px; }

        .doc-card h3 {
            font-size: 15px;
            margin: 15px 0 8px;
        }

        .doc-card p {
            color: var(--muted);
            font-size: 12px;
            flex: 1;
        }

        .doc-card a {
            color: var(--green);
            font-size: 12px;
            font-weight: 800;
            margin-top: 13px;
        }

        /* KONTAK */
        .contact {
            background: #dceccc;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 55px;
            align-items: start;
        }

        .contact-list {
            display: grid;
            gap: 15px;
        }

        .contact-row {
            padding: 20px;
            background: #ffffffbc;
            border: 1px solid #cbdcc4;
            border-radius: 12px;
        }

        .contact-row strong {
            display: block;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .contact-row span,
        .contact-row a {
            font-size: 13px;
            color: #476050;
        }

        /* FOOTER */
        .footer {
            padding: 62px 0 25px;
            background: var(--dark);
            color: #d0dfd3;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr 1fr;
            gap: 60px;
        }

        .footer h3 {
            color: white;
            margin: 0 0 17px;
            font-size: 16px;
        }

        .footer p,
        .footer a {
            color: #b4c7ba;
            font-size: 13px;
            line-height: 1.9;
        }

        .footer a { display: block; }
        .footer a:hover { color: white; }

        .footer-bottom {
            margin-top: 48px;
            padding-top: 22px;
            border-top: 1px solid #ffffff27;
            color: #a9bcae;
            font-size: 11px;
        }

        /* RESPONSIVE */
        @media (max-width: 950px) {
            .nav-links { gap: 14px; }
            .nav-links a { font-size: 12px; }

            .profile-grid { gap: 35px; }
            .service-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 800px) {
            .nav-wrap { min-height: 72px; }
            .menu-button { display: block; }

            .nav-links {
                display: none;
                position: absolute;
                top: 72px;
                left: 0;
                right: 0;
                background: var(--dark);
                padding: 15px 24px 22px;
                flex-direction: column;
                align-items: stretch;
                gap: 0;
                border-top: 1px solid #ffffff26;
            }

            .nav-links.open { display: flex; }
            .nav-links a { padding: 10px 0; }
            .nav-links .nav-cta { padding: 12px 16px; margin-top: 10px; text-align: center; }

            .profile-grid,
            .vision-grid,
            .contact-grid { grid-template-columns: 1fr; }

            .profile-photo { min-height: 350px; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 30px; }
        }

        @media (max-width: 560px) {
            .container { width: calc(100% - 34px); }
            .brand img { width: 42px; height: 42px; }
            .brand strong { font-size: 12px; }
            .brand small { font-size: 9px; }

            .hero { min-height: 580px; }
            .hero-content { padding: 75px 0; }
            .hero h1 { font-size: 43px; letter-spacing: -1.8px; }
            .hero p { font-size: 15px; }

            .section { padding: 72px 0; }
            .service-grid,
            .publication-grid,
            .doc-grid,
            .info-strip,
            .footer-grid { grid-template-columns: 1fr; }

            .publication-cover { height: 370px; }
            .vision-card { padding: 24px; }
        }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
        }


/* PUBLIKASI — TAMPILAN EDITORIAL MODERN */

.publication-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
    align-items: stretch;
}

.publication-card {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    background: #fff;
    border: 1px solid #e2e9e2;
    border-radius: 15px;
    transition: transform .2s ease, box-shadow .2s ease;
}

.publication-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(16, 55, 32, .09);
}

.publication-cover {
    height: 270px;
    overflow: hidden;
    background: #e8f2e9;
    display: flex;
    align-items: center;
    justify-content: center;
}

.publication-cover img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform .3s ease;
}

.publication-card:hover .publication-cover img {
    transform: scale(1.035);
}

.publication-copy {
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 25px;
}

.publication-category {
    color: #16815a;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.1px;
    text-transform: uppercase;
}

.publication-copy h3 {
    font: 800 20px/1.4 Manrope, sans-serif;
    letter-spacing: -.45px;
    margin: 12px 0;
    color: #153c2b;
}

.publication-copy p {
    font-size: 14px;
    line-height: 1.85;
    color: #5e6e65;
    margin: 0 0 22px;
    flex: 1;
}

.document-action {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    width: 100%;
    padding: 13px 0 0;
    border: 0;
    border-top: 1px solid #e5ebe6;
    background: none;
    color: #147b54;
    font: 800 13px DM Sans, sans-serif;
    text-align: left;
    cursor: pointer;
}

.document-action:hover {
    color: #0a5137;
}

.book-cover {
    width: 100%;
    height: 100%;
    padding: 30px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    color: white;
    background:
        radial-gradient(circle at 85% 12%, #89ba7e 0%, transparent 38%),
        linear-gradient(145deg, #206d4a, #0b3125);
}

.book-cover small {
    font-size: 12px;
    letter-spacing: 2px;
    font-weight: 800;
}

.book-cover strong {
    font: 800 47px/1 Manrope, sans-serif;
    letter-spacing: -2px;
}

.book-cover span {
    font-size: 13px;
    color: #d7ebd8;
}

.maps-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
    margin-top: 24px;
}

.map-document {
    display: flex;
    flex-direction: column;
    padding: 27px;
    background: white;
    border: 1px solid #e2e9e2;
    border-radius: 15px;
}

.map-document h3 {
    margin: 12px 0;
    font: 800 20px/1.4 Manrope, sans-serif;
}

.map-document p {
    margin: 0 0 22px;
    flex: 1;
    color: #64776d;
    line-height: 1.8;
    font-size: 14px;
}

/* PEMBACA FILE DI DALAM WEBSITE */

.document-modal {
    width: min(1120px, 96vw);
    max-width: none;
    height: min(90vh, 900px);
    max-height: none;
    padding: 0;
    border: 0;
    border-radius: 16px;
    background: #fff;
    color: #173729;
    overflow: hidden;
    box-shadow: 0 25px 90px #0005;
}

.document-modal::backdrop {
    background: rgba(4, 20, 14, .78);
}

.document-modal-inner {
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 0;
}

.document-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    padding: 16px 23px;
    border-bottom: 1px solid #e4eae5;
}

.document-modal-header strong {
    font: 800 15px Manrope, sans-serif;
}

.document-close {
    flex-shrink: 0;
    border: 0;
    width: 39px;
    height: 39px;
    border-radius: 9px;
    background: #eef3ee;
    color: #234834;
    font-size: 23px;
    cursor: pointer;
}

.document-viewer {
    flex: 1;
    min-height: 0;
    background: #eef1ee;
}

.document-viewer iframe {
    display: block;
    width: 100%;
    height: 100%;
    border: 0;
}

.document-viewer img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

@media (max-width: 900px) {
    .publication-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .maps-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 620px) {
    .publication-grid {
        grid-template-columns: 1fr;
    }

    .publication-cover {
        height: 330px;
    }

    .document-modal {
        width: 100vw;
        height: 100dvh;
        max-height: none;
        border-radius: 0;
    }

    .document-modal-header {
        padding: 12px 16px;
    }
}

/* ==========================================
   LAYANAN SOSIAL — EDITORIAL WEBSITE DESIGN
========================================== */

.editorial-services {
    padding: 112px 0 120px;
    background: #ffffff;
}

.editorial-heading {
    max-width: 820px;
    margin-bottom: 46px;
}

.editorial-kicker {
    display: block;
    color: #167b53;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 18px;
}

.editorial-heading h2 {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(35px, 4.6vw, 61px);
    font-weight: 800;
    letter-spacing: -2.5px;
    line-height: 1.16;
    color: #163529;
    margin: 0;
}

/* FEATURE UTAMA */

.editorial-feature {
    display: grid;
    grid-template-columns: 53% 47%;
    min-height: 465px;
    background: #f4f7f3;
}

.editorial-feature-image {
    position: relative;
    min-height: 420px;
    overflow: hidden;
    background: #dce8de;
}

.editorial-feature-image img {
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0;
    object-fit: cover;
    object-position: center;
}

.editorial-feature-content {
    padding: 58px 57px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.editorial-number {
    color: #18815a;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.3px;
}

.editorial-feature-content h3 {
    font-family: 'Manrope', sans-serif;
    font-size: clamp(29px, 3vw, 44px);
    font-weight: 800;
    letter-spacing: -1.4px;
    line-height: 1.2;
    color: #163b2a;
    margin: 22px 0;
}

.editorial-feature-content p {
    font-size: 15px;
    line-height: 1.9;
    color: #52685a;
    margin: 0 0 16px;
}

/* DAFTAR LAYANAN — BUKAN KARTU */

.editorial-list {
    margin-top: 65px;
    border-top: 1px solid #d9e3dc;
}

.editorial-item {
    display: grid;
    grid-template-columns: 75px minmax(210px, .8fr) minmax(0, 1.2fr);
    gap: 26px;
    align-items: start;
    padding: 33px 0;
    border-bottom: 1px solid #d9e3dc;
}

.editorial-item-number {
    color: #178258;
    font-size: 13px;
    font-weight: 800;
    padding-top: 7px;
}

.editorial-item h3 {
    font-family: 'Manrope', sans-serif;
    font-size: 22px;
    line-height: 1.4;
    letter-spacing: -.6px;
    margin: 0;
    color: #17392b;
}

.editorial-item p {
    color: #607367;
    font-size: 14px;
    line-height: 1.85;
    margin: 0;
    max-width: 600px;
}

/* RESPONSIVE */

@media (max-width: 900px) {
    .editorial-services {
        padding: 85px 0;
    }

    .editorial-feature {
        grid-template-columns: 1fr;
    }

    .editorial-feature-image {
        min-height: 370px;
    }

    .editorial-feature-content {
        padding: 42px;
    }

    .editorial-item {
        grid-template-columns: 50px 1fr;
        gap: 12px 20px;
    }

    .editorial-item p {
        grid-column: 2;
    }
}

@media (max-width: 580px) {
    .editorial-services {
        padding: 65px 0 80px;
    }

    .editorial-heading h2 {
        font-size: 33px;
        letter-spacing: -1.2px;
    }

    .editorial-feature-image {
        min-height: 260px;
    }

    .editorial-feature-content {
        padding: 30px 24px;
    }

    .editorial-feature-content h3 {
        font-size: 28px;
    }

    .editorial-list {
        margin-top: 38px;
    }

    .editorial-item {
        grid-template-columns: 1fr;
        padding: 25px 0;
        gap: 8px;
    }

    .editorial-item-number {
        padding: 0;
    }

    .editorial-item p {
        grid-column: 1;
    }

    .editorial-item h3 {
        font-size: 20px;
    }
}

/* Layanan tanpa foto atau kartu */
.editorial-services {
    background: #ffffff;
    padding: 90px 0 105px;
}

.editorial-heading {
    max-width: 900px;
    margin-bottom: 45px;
}

.editorial-heading h2 {
    font-size: clamp(34px, 4vw, 52px);
    letter-spacing: -1.8px;
}

.services-intro {
    max-width: 680px;
    margin-top: 20px;
    color: #66796c;
    font-size: 16px;
    line-height: 1.9;
}

.editorial-list {
    margin-top: 40px;
    border-top: 1px solid #dce6dd;
}

.editorial-item {
    display: grid;
    grid-template-columns: 65px minmax(200px, .8fr) minmax(0, 1.2fr);
    align-items: start;
    gap: 25px;
    padding: 32px 0;
    border-bottom: 1px solid #dce6dd;
}

.editorial-item-number {
    padding-top: 5px;
    color: #18815a;
    font-size: 13px;
    font-weight: 800;
}

.editorial-item h3 {
    margin: 0;
    color: #17392b;
    font-size: 21px;
}

.editorial-item p {
    margin: 0;
    max-width: 620px;
    color: #607367;
    font-size: 14px;
    line-height: 1.85;
}

@media (max-width: 800px) {
    .editorial-item {
        grid-template-columns: 45px 1fr;
        gap: 10px 18px;
    }

    .editorial-item p {
        grid-column: 2;
    }
}

@media (max-width: 580px) {
    .editorial-services {
        padding: 70px 0;
    }

    .editorial-item {
        grid-template-columns: 1fr;
        gap: 8px;
        padding: 25px 0;
    }

    .editorial-item p {
        grid-column: 1;
    }

    .editorial-heading h2 {
        font-size: 34px;
    }
}


/* ====================================
   UPTD PP REHSOS - MOTION SYSTEM
   Animasi ringan dan profesional
==================================== */

/* Animasi muncul saat scroll */
.motion-ready .reveal {
    opacity: 0;
    transform: translateY(24px);
    transition:
        opacity .75s cubic-bezier(.22, 1, .36, 1),
        transform .75s cubic-bezier(.22, 1, .36, 1);
    transition-delay: var(--reveal-delay, 0ms);
}

.motion-ready .reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
}

/* Hero: zoom halus satu kali */
@keyframes heroCinematic {
    from { transform: scale(1.045); }
    to   { transform: scale(1); }
}

.hero::before {
    animation: heroCinematic 2.2s ease-out both;
}

/* Tombol dan navigasi */
.button,
.nav-cta {
    transition:
        background-color .25s ease,
        transform .25s ease;
}

.button:hover,
.nav-cta:hover {
    transform: translateY(-2px);
}

.nav-links a:not(.nav-cta) {
    transition: color .2s ease;
}

/* Daftar layanan */
.editorial-item {
    transition: background-color .25s ease;
}

/* Aksesibilitas: hormati preferensi pengguna */
@media (prefers-reduced-motion: reduce) {
    html {
        scroll-behavior: auto;
    }

    .motion-ready .reveal,
    .motion-ready .reveal.is-visible {
        opacity: 1;
        transform: none;
        transition: none;
    }

    .hero::before {
        animation: none;
    }

    .button,
    .nav-cta,
    .nav-links a,
    .editorial-item {
        transition: none;
    }
}

    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="header">
        <div class="container nav-wrap">
            <a href="#beranda" class="brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Dinas Sosial">
                <span>
                    <strong>UPTD PP REHSOS</strong>
                    <small>Kabupaten Sidoarjo</small>
                </span>
            </a>

            <button class="menu-button"
                    type="button"
                    id="menu-button"
                    aria-label="Buka navigasi"
                    aria-controls="main-nav"
                    aria-expanded="false">
                ☰
            </button>

            <nav class="nav-links" id="main-nav" aria-label="Navigasi utama">
                <a href="#beranda">Beranda</a>
                <a href="#profil">Profil</a>
                <a href="#visi-misi">Visi & Misi</a>
                <a href="#layanan">Layanan</a>
                <a href="#publikasi">Publikasi</a>
                <a href="#kontak" class="nav-cta">Hubungi Kami ↗</a>
            </nav>
        </div>
    </header>

    <main>

        <!-- HERO -->
        <section class="hero" id="beranda">
            <div class="container hero-content">
                <div class="eyebrow">PEMERINTAH KABUPATEN SIDOARJO</div>

                <h1>UPTD PP REHSOS<br>Kabupaten Sidoarjo.</h1>

                <p>Pelayanan sosial yang humanis dan berorientasi pada kepedulian.</p>

                <a href="#profil" class="button">
                    Kenali Kami ↗
                </a>
            </div>
        </section>

        <!-- PROFIL -->
        <section class="section" id="profil">
            <div class="container profile-grid">

                <div class="profile-photo">
                    <strong>Lingkungan UPTD PP REHSOS Sidoarjo</strong>
                </div>

                <div>
                    <div class="section-label">01 / PROFIL INSTANSI</div>

                    <h2 class="section-title">
                        Mengenal UPTD PP REHSOS.
                    </h2>

                    <p class="lead">
                        UPTD PP REHSOS Kabupaten Sidoarjo merupakan
                        unit pelayanan sosial di bawah Dinas Sosial
                        Kabupaten Sidoarjo yang memberikan perlindungan,
                        perawatan, pembinaan, dan rehabilitasi sosial.
                    </p>

                    <p class="lead">
                        Pelayanan mencakup penerimaan, pemenuhan
                        kebutuhan dasar, pendampingan, serta dukungan
                        pemulihan fungsi sosial bagi individu yang
                        membutuhkan pelayanan.
                    </p>

                    <div class="info-strip">
                        <div class="info-item">
                            <strong>Perlindungan</strong>
                            <span>Pelayanan sosial</span>
                        </div>

                        <div class="info-item">
                            <strong>Pendampingan</strong>
                            <span>Dukungan penerima layanan</span>
                        </div>

                        <div class="info-item">
                            <strong>Rehabilitasi</strong>
                            <span>Pemulihan fungsi sosial</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- VISI MISI -->
        <section class="section soft" id="visi-misi">
            <div class="container">

                <div class="section-heading">
                    <div class="section-label">02 / ARAH PELAYANAN</div>
                    <h2 class="section-title">Visi dan Misi.</h2>
                    <p class="lead">
                        Arah pelayanan berdasarkan materi informasi
                        UPTD PP REHSOS yang disediakan.
                    </p>
                </div>

                <div class="vision-grid">

                    <article class="vision-card">
                        <h3>Visi</h3>
                        <p>
                            Terwujudnya pelayanan dan rehabilitasi sosial
                            yang humanis, profesional, dan berkeadilan
                            menuju kemandirian Pemerlu Pelayanan
                            Kesejahteraan Sosial (PPKS).
                        </p>
                    </article>

                    <article class="vision-card">
                        <h3>Misi</h3>

                        <ol>
                            <li>
                                Melaksanakan registrasi, identifikasi,
                                asesmen, dan pelayanan akomodasi
                                yang humanis.
                            </li>
                            <li>
                                Melaksanakan perawatan kesehatan,
                                bimbingan mental spiritual, dan sosial.
                            </li>
                            <li>
                                Mendukung pengembangan keterampilan
                                dan kemandirian penerima layanan.
                            </li>
                            <li>
                                Melaksanakan penyaluran, penempatan kembali,
                                dan reintegrasi sosial kepada keluarga
                                maupun masyarakat.
                            </li>
                            <li>
                                Melaksanakan pembinaan lanjutan,
                                perlindungan sosial, evaluasi, dan pelaporan.
                            </li>
                        </ol>
                    </article>

                </div>
            </div>
        </section>

        <!-- LAYANAN -->

<!-- ==========================================
     LAYANAN SOSIAL - EDITORIAL
========================================== -->


<!-- LAYANAN SOSIAL -->
<section class="editorial-services" id="layanan">
    <div class="container">

        <div class="editorial-heading">
            <span class="editorial-kicker">
                03 / PELAYANAN SOSIAL
            </span>

            <h2>
                Layanan untuk Masyarakat.
            </h2>

            <p class="services-intro">
                UPTD PP REHSOS Kabupaten Sidoarjo
                memberikan pelayanan perlindungan,
                rehabilitasi, dan pendampingan sosial
                berdasarkan kebutuhan penerima layanan.
            </p>
        </div>

        <div class="editorial-list">

            <article class="editorial-item">
                <span class="editorial-item-number">01</span>
                <h3>Perlindungan Sosial</h3>
                <p>
                    Memberikan perlindungan dan pemenuhan
                    kebutuhan dasar bagi individu yang
                    membutuhkan pelayanan sosial, dengan
                    memperhatikan keamanan, kenyamanan,
                    serta martabat penerima layanan.
                </p>
            </article>

            <article class="editorial-item">
                <span class="editorial-item-number">02</span>
                <h3>Rehabilitasi Sosial</h3>
                <p>
                    Mendukung pemulihan fungsi sosial melalui
                    pembinaan, bimbingan, dan kegiatan yang
                    disesuaikan dengan kondisi serta kebutuhan
                    masing-masing penerima layanan.
                </p>
            </article>

            <article class="editorial-item">
                <span class="editorial-item-number">03</span>
                <h3>Pemberdayaan Sosial</h3>
                <p>
                    Membantu pengembangan kemampuan,
                    keterampilan, dan kemandirian penerima
                    layanan melalui kegiatan pembinaan
                    yang sesuai dengan hasil asesmen.
                </p>
            </article>

            <article class="editorial-item">
                <span class="editorial-item-number">04</span>
                <h3>Pendampingan Sosial</h3>
                <p>
                    Memberikan pendampingan melalui asesmen,
                    pemantauan kondisi, koordinasi dengan
                    pihak terkait, serta dukungan dalam proses
                    penelusuran keluarga dan tindak lanjut
                    pelayanan.
                </p>
            </article>

            <article class="editorial-item">
                <span class="editorial-item-number">05</span>
                <h3>Penampungan Sementara</h3>
                <p>
                    Menyediakan tempat tinggal sementara
                    dan pemenuhan kebutuhan dasar bagi
                    individu yang memerlukan perlindungan,
                    sesuai kondisi dan prosedur pelayanan
                    yang berlaku.
                </p>
            </article>

        </div>

    </div>
</section>


<!-- PUBLIKASI -->
<section class="section soft" id="publikasi">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">
                INFORMASI & EDUKASI PUBLIK
            </span>

            <h2 class="section-title">
                Mengenal UPTD PP REHSOS Lebih Dekat
            </h2>

            <p class="lead">
                Jelajahi informasi tentang profil, layanan sosial,
                serta panduan pendampingan melalui publikasi
                edukatif UPTD PP REHSOS Kabupaten Sidoarjo.
            </p>
        </div>

        <div class="publication-grid">

            <!-- KARTU 1: PROFIL -->
            <article class="publication-card">

                <div class="publication-cover">
                    <img
                        src="{{ asset('images/poster-profil.jpeg') }}"
                        alt="Infografis profil, visi, dan misi UPTD PP REHSOS"
                        loading="lazy">
                </div>

                <div class="publication-copy">
                    <span class="publication-category">
                        PROFIL INSTANSI
                    </span>

                    <h3>
                        Mengenal Visi, Misi, dan Tujuan Pelayanan
                    </h3>

                    <p>
                        UPTD PP REHSOS memiliki peran dalam
                        memberikan perlindungan dan pelayanan
                        rehabilitasi sosial bagi individu yang
                        membutuhkan dukungan. Infografis ini
                        menjelaskan arah pelayanan yang humanis,
                        pembagian tugas petugas, serta upaya
                        meningkatkan mutu dan kesinambungan
                        pelayanan sosial.
                    </p>

                    <button
                        type="button"
                        class="document-action open-document"
                        data-type="image"
                        data-title="Profil, Visi dan Misi"
                        data-file="{{ asset('images/poster-profil.jpeg') }}">
                        <span>Baca Selengkapnya</span>
                        <span aria-hidden="true">↗</span>
                    </button>
                </div>

            </article>

            <!-- KARTU 2: LAYANAN -->
            <article class="publication-card">

                <div class="publication-cover">
                    <img
                        src="{{ asset('images/poster-layanan.jpeg') }}"
                        alt="Infografis jenis layanan sosial UPTD PP REHSOS"
                        loading="lazy">
                </div>

                <div class="publication-copy">
                    <span class="publication-category">
                        INFORMASI PELAYANAN
                    </span>

                    <h3>
                        Perlindungan dan Rehabilitasi Sosial
                    </h3>

                    <p>
                        Pelayanan sosial mencakup pemenuhan
                        kebutuhan dasar, pendampingan,
                        rehabilitasi, pemberdayaan, serta
                        penyediaan tempat tinggal sementara.
                        Bentuk pelayanan disesuaikan dengan
                        kondisi dan kebutuhan penerima manfaat,
                        termasuk dukungan menuju kemandirian
                        dan reintegrasi sosial.
                    </p>

                    <button
                        type="button"
                        class="document-action open-document"
                        data-type="image"
                        data-title="Informasi Layanan Sosial"
                        data-file="{{ asset('images/poster-layanan.jpeg') }}">
                        <span>Baca Selengkapnya</span>
                        <span aria-hidden="true">↗</span>
                    </button>
                </div>

            </article>

            <!-- KARTU 3: PILOSA -->
            <article class="publication-card">

                <div class="publication-cover">
                    <div class="book-cover">
                        <small>PANDUAN INFORMASI</small>

                        <strong>PILOSA<br>2026</strong>

                        <span>
                            Panduan Informasi dan Layanan Sosial
                        </span>
                    </div>
                </div>

                <div class="publication-copy">
                    <span class="publication-category">
                        BUKU PANDUAN
                    </span>

                    <h3>
                        PILOSA: Panduan Informasi dan Layanan Sosial
                    </h3>

                    <p>
                        PILOSA merupakan media edukasi masyarakat
                        yang memuat profil UPTD PP REHSOS,
                        kelompok penerima pelayanan, prosedur
                        penerimaan dan pendampingan, penanganan
                        kondisi sosial, serta informasi kegiatan
                        dan fasilitas. Panduan ini membantu
                        masyarakat memahami pelayanan sosial
                        secara lebih menyeluruh.
                    </p>

                    <button
                        type="button"
                        class="document-action open-document"
                        data-type="pdf"
                        data-title="Buku PILOSA 2026"
                        data-file="{{ asset('dokumen/PILOSA.pdf') }}">
                        <span>Baca Buku PILOSA</span>
                        <span aria-hidden="true">↗</span>
                    </button>
                </div>

            </article>

        </div>

        <!-- DOKUMENTASI PETA -->
        <div style="margin-top:75px">

            <span class="section-label">
                PEMETAAN PELAYANAN SOSIAL
            </span>

            <h2 class="section-title">
                Memahami Persebaran Data Pelayanan
            </h2>

            <p class="lead" style="max-width:800px">
                Dokumen berikut menyajikan data agregat klien
                yang tercatat dalam periode Juni–Oktober 2026.
                Informasi ini menggambarkan cakupan pendataan
                dan lokasi asal klien, bukan jumlah keseluruhan
                masyarakat yang membutuhkan pelayanan sosial.
            </p>

            <div class="maps-grid">

                <article class="map-document">
                    <span class="publication-category">
                        PETA KABUPATEN/KOTA
                    </span>

                    <h3>
                        Persebaran Klien Berdasarkan Kabupaten/Kota
                    </h3>

                    <p>
                        Pemetaan ini mencakup data klien yang
                        berasal dari Kabupaten Sidoarjo dan
                        sejumlah daerah lain di Jawa Timur.
                        Dalam dokumen periode Juni–Oktober 2026,
                        terdapat 165 data klien, dengan 150 data
                        berasal dari Kabupaten Sidoarjo.
                        Peta juga menampilkan perbandingan
                        kategori pelayanan menurut daerah asal.
                    </p>

                    <button
                        type="button"
                        class="document-action open-document"
                        data-type="pdf"
                        data-title="Peta Persebaran Kabupaten/Kota"
                        data-file="{{ asset('dokumen/peta-kabupaten.pdf') }}">
                        <span>Lihat Dokumen Peta</span>
                        <span aria-hidden="true">↗</span>
                    </button>
                </article>

                <article class="map-document">
                    <span class="publication-category">
                        PETA KECAMATAN
                    </span>

                    <h3>
                        Persebaran Klien di Kabupaten Sidoarjo
                    </h3>

                    <p>
                        Peta ini menunjukkan persebaran 150
                        data klien yang tercatat menurut
                        kecamatan di Kabupaten Sidoarjo.
                        Kecamatan Sidoarjo mencatat 57 data,
                        disusul Waru sebanyak 20 dan Taman
                        sebanyak 14. Hasil pemetaan dapat
                        membantu memahami distribusi pencatatan
                        pelayanan pada periode tersebut.
                    </p>

                    <button
                        type="button"
                        class="document-action open-document"
                        data-type="pdf"
                        data-title="Peta Persebaran Kecamatan"
                        data-file="{{ asset('dokumen/peta-kecamatan.pdf') }}">
                        <span>Lihat Dokumen Peta</span>
                        <span aria-hidden="true">↗</span>
                    </button>
                </article>

            </div>

        </div>

    </div>
</section>

<!-- MODAL PEMBACA DOKUMEN -->
<dialog
    class="document-modal"
    id="document-modal"
    aria-labelledby="document-modal-title">

    <div class="document-modal-inner">

        <div class="document-modal-header">
            <strong id="document-modal-title">
                Dokumen Publikasi
            </strong>

            <button
                type="button"
                class="document-close"
                id="document-close"
                aria-label="Tutup dokumen">
                ×
            </button>
        </div>

        <div class="document-viewer" id="document-viewer">
        </div>

    </div>
</dialog>

        </section>

        <!-- KONTAK -->
        <section class="section contact" id="kontak">
            <div class="container contact-grid">

                <div>
                    <div class="section-label">05 / KONTAK</div>
                    <h2 class="section-title">
                        Terhubung dengan UPTD PP REHSOS.
                    </h2>
                    <p class="lead">
                        Informasi alamat dan kontak berikut merujuk
                        pada materi PILOSA 2026. Konfirmasikan
                        kembali sebelum website dipublikasikan secara resmi.
                    </p>
                </div>

                <div class="contact-list">

                    <div class="contact-row">
                        <strong>Alamat</strong>
                        <span>
                            Jl. Sekolahan, Cangkring, Sidokare,
                            Kecamatan Sidoarjo, Kabupaten Sidoarjo,
                            Jawa Timur 61214.
                        </span>
                    </div>

                    <div class="contact-row">
                        <strong>Telepon</strong>
                        <a href="tel:+628197960417">
                            +62 819-7960-417
                        </a>
                    </div>

                    <div class="contact-row">
                        <strong>Informasi Jam Pelayanan</strong>
                        <span>
                            Berdasarkan materi PILOSA:
                            setiap hari, 24 jam.
                        </span>
                    </div>

                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">

            <div class="footer-grid">

                <div>
                    <h3>UPTD PP REHSOS</h3>
                    <p>
                        Unit pelayanan sosial di bawah
                        Dinas Sosial Kabupaten Sidoarjo.
                    </p>
                </div>

                <div>
                    <h3>Navigasi</h3>
                    <a href="#beranda">Beranda</a>
                    <a href="#profil">Profil</a>
                    <a href="#visi-misi">Visi & Misi</a>
                    <a href="#layanan">Layanan</a>
                    <a href="#publikasi">Publikasi</a>
                </div>

                <div>
                    <h3>Informasi</h3>
                    <a href="#kontak">Kontak</a>
                    <a href="{{ asset('dokumen/PILOSA.pdf') }}"
                       target="_blank" rel="noopener">
                        Buku PILOSA
                    </a>
                    <p>Kabupaten Sidoarjo, Jawa Timur</p>
                </div>

            </div>

            <div class="footer-bottom">
                &copy; {{ date('Y') }} UPTD PP REHSOS
                Kabupaten Sidoarjo. Seluruh hak dilindungi.
            </div>

        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.getElementById('menu-button');
            const nav = document.getElementById('main-nav');

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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('document-modal');
    const viewer = document.getElementById('document-viewer');
    const title = document.getElementById('document-modal-title');
    const closeButton = document.getElementById('document-close');

    if (!modal || !viewer || !title || !closeButton) {
        return;
    }

    // Buka poster atau PDF di dalam halaman website
    document.querySelectorAll('.open-document').forEach(function (button) {
        button.addEventListener('click', function () {
            const file = button.dataset.file;
            const type = button.dataset.type;
            const documentTitle = button.dataset.title;

            if (!file || !['image', 'pdf'].includes(type)) {
                return;
            }

            title.textContent = documentTitle || 'Dokumen Publikasi';
            viewer.replaceChildren();

            if (type === 'image') {
                const img = document.createElement('img');
                img.src = file;
                img.alt = documentTitle || 'Gambar dokumen';
                viewer.appendChild(img);
            } else {
                const frame = document.createElement('iframe');
                frame.src = file;
                frame.title = documentTitle || 'Dokumen PDF';
                frame.setAttribute('loading', 'lazy');
                viewer.appendChild(frame);
            }

            if (!modal.open) {
                modal.showModal();
            }
        });
    });

    // Tutup dengan tombol X
    closeButton.addEventListener('click', function () {
        modal.close();
    });

    // Klik di luar kotak dokumen untuk menutup
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.close();
        }
    });

    // Bersihkan viewer ketika ditutup
    modal.addEventListener('close', function () {
        viewer.replaceChildren();
    });

    // Tombol Escape ditangani otomatis oleh elemen dialog
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const reducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    if (reducedMotion || !('IntersectionObserver' in window)) {
        return;
    }

    // Elemen yang akan diberikan animasi
    const elements = document.querySelectorAll([
        '.section-title',
        '.section-heading',
        '.profile-photo',
        '.profile-grid > div:last-child',
        '.vision-card',
        '.editorial-heading',
        '.editorial-item',
        '.publication-card',
        '.map-document',
        '.contact-row'
    ].join(','));

    // Siapkan animasi
    elements.forEach(function (element, index) {
        element.classList.add('reveal');

        // Jeda kecil untuk elemen yang berurutan
        const delay = (index % 3) * 75;
        element.style.setProperty(
            '--reveal-delay',
            delay + 'ms'
        );
    });

    // Aktifkan hanya setelah kelas elemen siap
    document.documentElement.classList.add('motion-ready');

    const observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.08,
            rootMargin: '0px 0px 30px 0px'
        }
    );

    elements.forEach(function (element) {
        observer.observe(element);
    });

});
</script>


</body>
</html>
