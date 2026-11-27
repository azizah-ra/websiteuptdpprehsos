
@extends('layouts.app')

@section('title', 'Profil Instansi | UPTD PP REHSOS Kabupaten Sidoarjo')

@push('styles')
<style>
/* =========================================
   PROFIL INSTANSI — DESAIN REFERENSI
   Berlaku hanya untuk halaman profil
========================================= */

.profile-reference {
    --pf-green: #173e30;
    --pf-accent: #16815c;
    --pf-muted: #5f7068;
    --pf-soft: #f5faf7;
    --pf-border: #e3ece6;
    color: var(--pf-green);
}

.profile-reference * {
    box-sizing: border-box;
}


.profile-reference .pf-section {
    padding: 38px 0;
}


.profile-reference .pf-section-soft {
    background: #f8fbf9;
}

.profile-reference .pf-label {
    display: block;
    margin-bottom: 12px;
    color: var(--pf-accent);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.7px;
    text-transform: uppercase;
}

.profile-reference .pf-title {
    margin: 0 0 17px;
    color: var(--pf-green);
    font-family: Manrope, sans-serif;
    font-size: clamp(27px, 2.8vw, 36px);
    font-weight: 800;
    line-height: 1.28;
    letter-spacing: -1px;
}

.profile-reference .pf-description {
    color: var(--pf-muted);
    font-size: 14px;
    line-height: 1.9;
    margin: 0 0 16px;
}

.profile-reference .pf-heading-center {
    max-width: 760px;
    margin: 0 auto 36px;
    text-align: center;
}

.profile-reference .pf-heading-center .pf-description {
    margin: 0;
}

/* HERO PROFIL */


/* HERO PROFIL — HIJAU TUA */

.profile-reference .pf-hero {
    background: #123D30;
    padding: 42px 0 46px;
}

.profile-reference .pf-hero .pf-label {
    display: block;
    margin-bottom: 12px;
    color: #B9E5CE;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
}

.profile-reference .pf-hero h1 {
    margin: 0;
    color: #FFFFFF;
    font-family: 'Manrope', sans-serif;
    font-size: clamp(30px, 3.2vw, 42px);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -1px;
}

.profile-reference .pf-hero p {
    max-width: 680px;
    margin: 0;
    font-size: 15px;
    line-height: 1.8;
    color: var(--pf-muted);
}

/* PROFIL PENGENALAN */

.profile-reference .pf-intro-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    gap: 55px;
}

.profile-reference .pf-intro-text h2 {
    max-width: 520px;
}

.profile-reference .pf-image {
    overflow: hidden;
    border-radius: 17px;
    background: #e5eee8;
}

.profile-reference .pf-image img {
    display: block;
    width: 100%;
    height: 370px;
    object-fit: cover;
}

/* TABEL IDENTITAS */

.profile-reference .pf-identity-table {
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
    border-collapse: collapse;
    background: #ffffff;
    border: 1px solid var(--pf-border);
    border-radius: 15px;
    overflow: hidden;
}

.profile-reference .pf-identity-table th,
.profile-reference .pf-identity-table td {
    padding: 20px 25px;
    border-bottom: 1px solid var(--pf-border);
    text-align: left;
    vertical-align: top;
    font-size: 14px;
    line-height: 1.8;
}

.profile-reference .pf-identity-table tr:last-child th,
.profile-reference .pf-identity-table tr:last-child td {
    border-bottom: none;
}

.profile-reference .pf-identity-table th {
    width: 32%;
    font-weight: 800;
    color: var(--pf-green);
}

.profile-reference .pf-identity-table td {
    color: var(--pf-muted);
}

/* VISI MISI */

.profile-reference .pf-vision-grid {
    display: grid;
    grid-template-columns: .85fr 1.15fr;
    gap: 25px;
    align-items: stretch;
}

.profile-reference .pf-panel {
    padding: 32px;
    border: 1px solid var(--pf-border);
    border-radius: 18px;
    background: #f9fcfa;
}

.profile-reference .pf-vision-panel {
    background: #eaf6ef;
}

.profile-reference .pf-panel-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 49px;
    height: 49px;
    margin-bottom: 24px;
    border-radius: 12px;
    background: #d8efe2;
    color: #117951;
}

.profile-reference .pf-panel-icon svg {
    width: 25px;
    height: 25px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.profile-reference .pf-panel h3 {
    margin: 0 0 17px;
    font: 800 15px Manrope, sans-serif;
    color: var(--pf-green);
}

.profile-reference .pf-vision-text {
    margin: 0;
    color: var(--pf-green);
    font: 700 clamp(19px, 2vw, 23px)/1.65 Manrope, sans-serif;
}

.profile-reference .pf-mission-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.profile-reference .pf-mission-list li {
    display: grid;
    grid-template-columns: 35px minmax(0, 1fr);
    gap: 14px;
    padding: 14px 0;
    border-bottom: 1px solid var(--pf-border);
    color: var(--pf-muted);
    font-size: 13px;
    line-height: 1.85;
}

.profile-reference .pf-mission-list li:last-child {
    border-bottom: 0;
}

.profile-reference .pf-num {
    font-size: 12px;
    font-weight: 800;
    color: var(--pf-accent);
}

/* ENAM TUJUAN PELAYANAN */

.profile-reference .pf-goals-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 20px;
}

.profile-reference .pf-goal-card {
    position: relative;
    min-height: 205px;
    padding: 27px;
    background: #ffffff;
    border: 1px solid var(--pf-border);
    border-radius: 16px;
    transition: transform .25s ease, box-shadow .25s ease;
}

.profile-reference .pf-goal-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(16, 65, 43, .06);
}

.profile-reference .pf-goal-number {
    position: absolute;
    right: 22px;
    top: 17px;
    color: #e3f0e8;
    font: 800 35px Manrope, sans-serif;
}

.profile-reference .pf-goal-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 37px;
    height: 37px;
    margin-bottom: 22px;
    color: var(--pf-accent);
}

.profile-reference .pf-goal-icon svg {
    width: 28px;
    height: 28px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.profile-reference .pf-goal-card h3 {
    margin: 0 0 10px;
    font: 800 15px/1.5 Manrope, sans-serif;
}

.profile-reference .pf-goal-card p {
    margin: 0;
    color: var(--pf-muted);
    font-size: 13px;
    line-height: 1.8;
}

/* EMPAT FUNGSI */

.profile-reference .pf-functions-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 18px;
}

.profile-reference .pf-function {
    padding: 27px 14px;
    text-align: center;
    border: 1px solid var(--pf-border);
    border-radius: 15px;
    background: #ffffff;
}

.profile-reference .pf-function svg {
    width: 31px;
    height: 31px;
    display: block;
    margin: 0 auto 14px;
    fill: none;
    stroke: var(--pf-accent);
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.profile-reference .pf-function h3 {
    margin: 0;
    color: var(--pf-green);
    font: 800 14px/1.5 Manrope, sans-serif;
}

/* STRUKTUR PETUGAS */

.profile-reference .pf-org-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
}

.profile-reference .pf-org-placeholder {
    padding: 42px 26px;
    min-height: 235px;
    background: #eff8f2;
    border: 2px dashed #b6dbc6;
    border-radius: 17px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.profile-reference .pf-org-placeholder svg {
    width: 44px;
    height: 44px;
    margin-bottom: 16px;
    fill: none;
    stroke: var(--pf-green);
    stroke-width: 1.7;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.profile-reference .pf-org-placeholder strong {
    color: var(--pf-green);
    font: 800 17px Manrope, sans-serif;
    margin-bottom: 10px;
}

.profile-reference .pf-org-placeholder p {
    margin: 0;
    max-width: 320px;
    color: var(--pf-muted);
    font-size: 13px;
    line-height: 1.8;
}

/* RINCIAN MAKSUD DAN TUJUAN */

.profile-reference .pf-extra {
    margin-top: 25px;
    padding: 20px 24px;
    background: #f6faf7;
    border: 1px solid var(--pf-border);
    border-radius: 13px;
}

.profile-reference .pf-extra summary {
    cursor: pointer;
    font-weight: 800;
    font-size: 14px;
}

.profile-reference .pf-extra ol {
    color: var(--pf-muted);
    padding-left: 20px;
    font-size: 13px;
    line-height: 1.9;
}

.profile-reference .pf-extra li {
    margin: 9px 0;
}

/* RESPONSIVE */

@media (max-width: 900px) {
    .profile-reference .pf-intro-grid,
    .profile-reference .pf-org-grid,
    .profile-reference .pf-vision-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }

    .profile-reference .pf-goals-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .profile-reference .pf-functions-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 580px) {

.profile-reference .pf-section {
    padding: 30px 0;
}

.profile-reference .pf-hero {
    padding: 24px 0;
}






.profile-reference .pf-hero h1 {
    margin: 0;
    color: #E8C878 !important;
    font-family: 'Manrope', sans-serif;
    font-size: clamp(27px, 3vw, 36px);
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -0.8px;
}


    .profile-reference .pf-image img {
        height: 260px;
    }

    .profile-reference .pf-panel {
        padding: 23px;
    }

    .profile-reference .pf-goals-grid {
        grid-template-columns: 1fr;
    }

    .profile-reference .pf-goal-card {
        min-height: auto;
    }

    .profile-reference .pf-identity-table th,
    .profile-reference .pf-identity-table td {
        display: block;
        width: 100%;
        border-bottom: none;
        padding: 6px 17px;
    }

    .profile-reference .pf-identity-table th {
        padding-top: 15px;
    }

    .profile-reference .pf-identity-table td {
        padding-bottom: 15px;
    }

    .profile-reference .pf-identity-table tr {
        border-bottom: 1px solid var(--pf-border);
    }
}

@media (prefers-reduced-motion: reduce) {
    .profile-reference .pf-goal-card {
        transition: none;
    }
}


/* ==========================================
   IDENTITAS INSTANSI — COMPACT MODERN TABLE
========================================== */

.profile-reference .pf-identity-table {
    width: 100%;
    max-width: 760px;
    margin: 0 auto;
    table-layout: fixed;
    border-collapse: separate;
    border-spacing: 0;
    background: #ffffff;
    border: 1px solid #e7ede8;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(20, 60, 40, 0.035);
}

.profile-reference .pf-identity-table th {
    width: 34%;
    padding: 17px 23px;
    color: #173e30;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    line-height: 1.6;
    letter-spacing: 0;
    vertical-align: middle;
    border-bottom: 1px solid #e9eeea;
}

.profile-reference .pf-identity-table td {
    width: 66%;
    padding: 17px 23px;
    color: #53695d;
    font-family: 'DM Sans', sans-serif;
    font-size: 13.5px;
    font-weight: 500;
    line-height: 1.75;
    vertical-align: middle;
    overflow-wrap: break-word;
    border-bottom: 1px solid #e9eeea;
}

.profile-reference .pf-identity-table tr:last-child th,
.profile-reference .pf-identity-table tr:last-child td {
    border-bottom: none;
}

.profile-reference .pf-identity-table tr:hover {
    background: #f8fbf9;
}

/* Judul bagian identitas */
.profile-reference .pf-heading-center {
    max-width: 720px;
    margin: 0 auto 30px;
    text-align: center;
}

.profile-reference .pf-heading-center .pf-title {
    font-size: clamp(25px, 2.6vw, 32px);
    letter-spacing: -0.8px;
    margin-bottom: 10px;
}

.profile-reference .pf-heading-center .pf-description {
    font-size: 13.5px;
    line-height: 1.75;
}

/* Responsif untuk HP */
@media (max-width: 580px) {
    .profile-reference .pf-identity-table {
        max-width: 100%;
    }

    .profile-reference .pf-identity-table tr {
        display: block;
        padding: 13px 17px;
        border-bottom: 1px solid #e9eeea;
    }

    .profile-reference .pf-identity-table tr:last-child {
        border-bottom: none;
    }

    .profile-reference .pf-identity-table th,
    .profile-reference .pf-identity-table td {
        display: block;
        width: 100%;
        padding: 0;
        border: none;
    }

    .profile-reference .pf-identity-table th {
        font-size: 12px;
        margin-bottom: 5px;
    }

    .profile-reference .pf-identity-table td {
        font-size: 13px;
    }
}


/* STRUKTUR PETUGAS */

.profile-reference .pf-structure-image {
    width: 100%;
    max-width: 1120px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #e3ece6;
    border-radius: 14px;
    overflow: hidden;
}

.profile-reference .pf-structure-image img {
    display: block;
    width: 100%;
    height: auto;
    object-fit: contain;
}

.profile-reference .pf-structure-caption {
    max-width: 1120px;
    margin: 12px auto 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    font-size: 12px;
    color: #617568;
}

.profile-reference .pf-structure-caption a {
    color: #087e61;
    font-weight: 700;
    text-decoration: none;
}

.profile-reference .pf-structure-caption a:hover {
    text-decoration: underline;
}


/* HERO PROFIL — COMPACT DAN ELEGAN */

.profile-reference .pf-hero {
    background: #123D30;
    padding: 22px 0 24px !important;
    min-height: 0 !important;
}

.profile-reference .pf-hero .container {
    min-height: 0 !important;
}

.profile-reference .pf-hero .pf-label {
    color: #D5E5DA;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.8px;
    margin-bottom: 6px;
}

.profile-reference .pf-hero h1 {
    margin: 0;
    color: #FFFFFF;
    font-size: clamp(27px, 3vw, 36px);
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -0.8px;
}



/* Kurangi jarak menuju konten pertama */
.profile-reference .pf-hero + .pf-section {
    padding-top: 25px !important;
}

/* Versi HP */
@media (max-width: 580px) {
    .profile-reference .pf-hero {
        padding: 19px 0 21px !important;
    }

    .profile-reference .pf-hero h1 {
        font-size: 27px;
    }

    .profile-reference .pf-hero + .pf-section {
        padding-top: 20px !important;
    }
}



/* ==========================================
   PROFIL — TEKS JUSTIFY + TATA KELOLA SOP
   Hanya paragraf isi; judul dan intro berpusat
   tidak diubah perataannya.
========================================== */
.profile-reference .pf-intro-text .pf-description,
.profile-reference .pf-goal-card p,
.profile-reference .pf-mission-list li span:last-child,
.profile-reference .pf-extra li,
.profile-reference .pf-governance-copy p,
.profile-reference .pf-governance-role p {
    text-align: justify;
    text-align-last: left;
    text-justify: inter-word;
    overflow-wrap: break-word;
}

.profile-reference .pf-governance {
    background: #ffffff;
    border-top: 1px solid #edf2ee;
}

.profile-reference .pf-governance-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.08fr) minmax(0, .92fr);
    gap: 36px;
    align-items: start;
}

.profile-reference .pf-governance-copy h3,
.profile-reference .pf-governance-roles > h3 {
    margin: 0 0 16px;
    font: 800 20px/1.4 Manrope, sans-serif;
    color: var(--pf-green);
}

.profile-reference .pf-governance-copy p {
    color: var(--pf-muted);
    font-size: 14px;
    line-height: 1.9;
    margin: 0 0 16px;
}

.profile-reference .pf-governance-roles {
    padding: 25px 27px;
    border: 1px solid #deeee3;
    border-radius: 16px;
    background: #f0f8f3;
}

.profile-reference .pf-governance-role {
    display: grid;
    grid-template-columns: 27px minmax(0, 1fr);
    gap: 12px;
    padding: 15px 0;
    border-top: 1px solid #d7e8dc;
}

.profile-reference .pf-role-index {
    color: var(--pf-accent);
    font-size: 12px;
    font-weight: 800;
    padding-top: 2px;
}

.profile-reference .pf-governance-role h4 {
    color: var(--pf-green);
    font: 800 14px/1.5 Manrope, sans-serif;
    margin: 0 0 5px;
}

.profile-reference .pf-governance-role p {
    color: #586c60;
    font-size: 13px;
    line-height: 1.8;
    margin: 0;
}

.profile-reference .pf-governance-note {
    color: #708277;
    font-size: 11px;
    line-height: 1.7;
    margin: 16px 0 0;
}

@media (max-width: 900px) {
    .profile-reference .pf-governance-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

@media (max-width: 580px) {
    .profile-reference .pf-governance-roles {
        padding: 20px;
    }
}


.profile-reference .pf-role-panel {
    background: #EFF7F1;
    border: 1px solid #E0EDE4;
    border-radius: 17px;
    padding: 26px;
}

.profile-reference .pf-role-panel h3 {
    color: #173E30;
    font-size: 19px;
    font-weight: 800;
    margin: 0 0 18px;
}

.profile-reference .pf-role-item {
    display: grid;
    grid-template-columns: 24px minmax(0, 1fr);
    gap: 15px;
    padding: 17px 0;
    border-top: 1px solid #DCE9DF;
}

.profile-reference .pf-role-number {
    color: #087E61;
    font-size: 12px;
    font-weight: 800;
}

.profile-reference .pf-role-item h4 {
    color: #173E30;
    font-size: 14px;
    font-weight: 700;
    margin: 0 0 7px;
}

.profile-reference .pf-role-item p {
    color: #60776B;
    font-size: 13px;
    line-height: 1.85;
    text-align: justify;
    text-justify: inter-word;
    margin: 0;
}

.profile-reference .pf-role-note {
    margin: 15px 0 0;
    color: #718477;
    font-size: 11px;
    line-height: 1.7;
}


</style>
@endpush

@section('content')

<div class="profile-reference">

    <!-- 1. JUDUL HALAMAN -->

<!-- HERO PROFIL -->
<section class="pf-hero">
    <div class="container">
        <span class="pf-label">TENTANG KAMI</span>
        <h1 style="color: #E8C878 !important;">UPTD PP REHSOS</h1>
    </div>
</section>


    <!-- 2. PENGENALAN INSTANSI -->
    <section class="pf-section">
        <div class="container pf-intro-grid">

            <div class="pf-intro-text">
                <span class="pf-label">MENGENAL UPTD PP REHSOS</span>

                <h2 class="pf-title">
                    Pelayanan Sosial yang Humanis, Profesional, dan Berkeadilan.
                </h2>

                <p class="pf-description">
                    UPTD PP REHSOS (Liponsos)
                    merupakan unit pelaksana teknis daerah di bawah Dinas Sosial
                    Kabupaten Sidoarjo yang berfokus pada perlindungan serta
                    pelayanan rehabilitasi sosial bagi Pemerlu Pelayanan Kesejahteraan
                    Sosial (PPKS). Pelayanan dilaksanakan dengan memperhatikan
                    kondisi, kebutuhan, dan martabat setiap penerima layanan.
                    Dukungan yang diberikan mencakup penampungan sementara,
                    pemenuhan kebutuhan dasar, pendampingan, dan bentuk pelayanan
                    sosial lainnya sesuai tugas serta kewenangan petugas.
                    Pendekatan tersebut diharapkan menciptakan lingkungan pelayanan
                    yang aman, manusiawi, dan bertanggung jawab.
                </p>

                <p class="pf-description">
                    Dalam pelaksanaannya, pelayanan tidak berhenti pada proses
                    penerimaan, tetapi berlanjut melalui identifikasi kebutuhan,
                    pemantauan kondisi kesehatan, pendampingan aktivitas sehari-hari,
                    serta evaluasi dan tindak lanjut. Petugas Kesehatan dan petugas
                    Pendamping menjalankan peran yang saling melengkapi sesuai
                    kompetensi serta kewenangan masing-masing. Pencatatan dan
                    koordinasi antarpetugas membantu menjaga kesinambungan informasi
                    maupun penanganan, dengan tetap memperhatikan kerahasiaan data
                    penerima layanan. Melalui proses tersebut, UPTD PP REHSOS
                    berupaya mendukung pemulihan fungsi sosial, penguatan kemandirian,
                    dan reintegrasi penerima layanan sesuai hasil asesmen.
                </p>
            </div>

            <div class="pf-image">
                <img
                    src="{{ asset('images/UPTD.jpeg') }}"
                    alt="Lingkungan gedung UPTD PP REHSOS Kabupaten Sidoarjo"
                    loading="lazy"
                >
            </div>

        </div>
    </section>


    <!-- 3. IDENTITAS INSTANSI -->
    <section class="pf-section pf-section-soft">
        <div class="container">

            <div class="pf-heading-center">
                <span class="pf-label">IDENTITAS INSTANSI</span>
                <h2 class="pf-title">Informasi Singkat Instansi</h2>

                <p class="pf-description">
                    Informasi umum UPTD PP REHSOS
                    Kabupaten Sidoarjo.
                </p>
            </div>


<table class="pf-identity-table">
    <tbody>

        <tr>
            <th scope="row">Nama Instansi</th>
            <td>
                UPTD Perlindungan dan Pelayanan
                Rehabilitasi Sosial Kabupaten Sidoarjo
            </td>
        </tr>

        <tr>
            <th scope="row">Tahun Berdiri</th>
            <td>2012</td>
        </tr>

        <tr>
            <th scope="row">Kepala UPTD</th>
            <td>Kristian Yudi Arianto, S.E.</td>
        </tr>

        <tr>
            <th scope="row">Instansi Induk</th>
            <td>Dinas Sosial Kabupaten Sidoarjo</td>
        </tr>

        <tr>
            <th scope="row">Lokasi</th>
            <td>Kabupaten Sidoarjo, Jawa Timur</td>
        </tr>

        <tr>
            <th scope="row">Fokus Pelayanan</th>
            <td>
                Perlindungan, pendampingan,
                dan rehabilitasi sosial
            </td>
        </tr>

        <tr>
            <th scope="row">Penerima Layanan</th>
            <td>
                Pemerlu Pelayanan Kesejahteraan
                Sosial (PPKS)
            </td>
        </tr>

    </tbody>
</table>

        </div>
    </section>


    <!-- 4. PENDEKATAN DAN TATA KELOLA PELAYANAN -->
    <section class="pf-section pf-governance" id="pendekatan-pelayanan">
        <div class="container">
            <div class="pf-heading-center">
                <span class="pf-label">PENDEKATAN PELAYANAN</span>
                <h2 class="pf-title">Pelayanan yang Terarah dan Terkoordinasi</h2>
                <p class="pf-description">
                    Gambaran prinsip kerja dan pembagian tanggung jawab dalam mendukung
                    kesinambungan pelayanan bagi penerima layanan.
                </p>
            </div>

            <div class="pf-governance-grid">
                <div class="pf-governance-copy">
                    <h3>Prinsip Penyelenggaraan Pelayanan</h3>
                    <p>
                        Pelayanan sosial membutuhkan pedoman kerja yang jelas agar
                        setiap petugas memahami alur kegiatan dan batas tanggung
                        jawabnya. Rangkaian pelayanan mencakup penerimaan dan
                        identifikasi kebutuhan, pemantauan kesehatan, pendampingan,
                        pencatatan, serta evaluasi dan tindak lanjut. Koordinasi
                        antardivisi diperlukan agar informasi penting tersampaikan
                        kepada petugas yang tepat dan tidak terjadi tumpang tindih
                        pelaksanaan tugas. Prinsip tersebut menjadi landasan untuk
                        mengembangkan pelayanan yang terarah, aman, manusiawi,
                        terdokumentasi, dan dapat dipertanggungjawabkan.
                    </p>
                    <p>
                        Pencatatan administrasi merupakan bagian dari upaya menjaga
                        ketertiban serta kesinambungan informasi pelayanan.
                        Perkembangan kondisi, tindakan yang dilakukan, dan kebutuhan
                        tindak lanjut dicatat sesuai kewenangan untuk mendukung
                        koordinasi antarpelaksana. Evaluasi pelayanan digunakan untuk
                        mengidentifikasi kendala dan kebutuhan perbaikan agar mutu
                        pelayanan dapat ditingkatkan secara berkelanjutan. Pada
                        setiap tahapan, perlindungan informasi pribadi dan kesehatan
                        penerima layanan tetap menjadi perhatian.
                    </p>
                </div>


<div class="pf-role-panel">

    <h3>Pembagian Peran Pelayanan</h3>

    <div class="pf-role-item">
        <span class="pf-role-number">01</span>
        <div>
            <h4>Kepala UPTD</h4>
            <p>Menetapkan arahan, mengawasi pelaksanaan SOP, dan mengevaluasi mutu pelayanan sesuai kewenangan.</p>
        </div>
    </div>

    <div class="pf-role-item">
        <span class="pf-role-number">02</span>
        <div>
            <h4>Divisi Kesehatan</h4>
            <p>Melaksanakan pelayanan kesehatan sesuai kompetensi, memantau kondisi penerima layanan, mencatat hasil, serta melakukan rujukan jika dibutuhkan.</p>
        </div>
    </div>

    <div class="pf-role-item">
        <span class="pf-role-number">03</span>
        <div>
            <h4>Divisi Pendamping</h4>
            <p>Melaksanakan pendampingan, membantu pemenuhan kebutuhan sehari-hari sesuai tugas, memantau perkembangan, dan melaporkan perubahan kondisi.</p>
        </div>
    </div>

    </div>

    <p class="pf-role-note">
        Pembagian peran mengacu pada rancangan SOP pelayanan.
        Pelaksana dan jabatan menyesuaikan struktur resmi instansi.
    </p>

</div>

    </section>

    <!-- 5. VISI DAN MISI -->
    <section class="pf-section" id="visi-misi">
        <div class="container">

            <div class="pf-heading-center">
                <span class="pf-label">ARAH PELAYANAN</span>

                <h2 class="pf-title">Visi dan Misi Instansi</h2>

                <p class="pf-description">
                    Landasan dalam penyelenggaraan
                    pelayanan sosial di UPTD PP REHSOS.
                </p>
            </div>

            <div class="pf-vision-grid">

                <!-- VISI -->
                <article class="pf-panel pf-vision-panel">

                    <div class="pf-panel-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="12" r="9"/>
                            <circle cx="12" cy="12" r="5"/>
                            <circle cx="12" cy="12" r="1"/>
                        </svg>
                    </div>

                    <h3>VISI</h3>

                    <p class="pf-vision-text">
                        Terwujudnya Pelayanan dan Rehabilitasi
                        Sosial yang Humanis, Profesional,
                        dan Berkeadilan Menuju Kemandirian
                        Pemerlu Pelayanan Kesejahteraan
                        Sosial (PPKS).
                    </p>

                </article>

                <!-- MISI -->
                <article class="pf-panel">

                    <div class="pf-panel-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="m4 6 2 2 3-3"/>
                            <path d="M12 7h8"/>
                            <path d="m4 13 2 2 3-3"/>
                            <path d="M12 14h8"/>
                            <path d="m4 20 2 2 3-3"/>
                            <path d="M12 21h8"/>
                        </svg>
                    </div>

                    <h3>MISI</h3>

                    <ol class="pf-mission-list">
                        <li>
                            <span class="pf-num">01</span>
                            <span>
                                Melaksanakan registrasi, identifikasi,
                                asesmen, dan pelayanan akomodasi
                                yang humanis.
                            </span>
                        </li>

                        <li>
                            <span class="pf-num">02</span>
                            <span>
                                Melaksanakan diagnosa, perawatan
                                kesehatan serta bimbingan mental
                                spiritual dan sosial.
                            </span>
                        </li>

                        <li>
                            <span class="pf-num">03</span>
                            <span>
                                Melaksanakan pengembangan kecerdasan,
                                keterampilan kerja dan bina usaha
                                bagi PPKS.
                            </span>
                        </li>

                        <li>
                            <span class="pf-num">04</span>
                            <span>
                                Melaksanakan penyaluran, penempatan
                                kembali dan reintegrasi sosial
                                ke keluarga dan masyarakat.
                            </span>
                        </li>

                        <li>
                            <span class="pf-num">05</span>
                            <span>
                                Melaksanakan pembinaan lanjutan,
                                perlindungan sosial, evaluasi
                                dan pelaporan.
                            </span>
                        </li>
                    </ol>

                </article>

            </div>
        </div>
    </section>


    <!-- 6. TUJUAN PELAYANAN -->
    <section class="pf-section pf-section-soft">
        <div class="container">

            <div class="pf-heading-center">
                <span class="pf-label">
                    KOMITMEN PELAYANAN
                </span>

                <h2 class="pf-title">Tujuan Pelayanan</h2>

                <p class="pf-description">
                    Pelayanan sosial diarahkan untuk
                    memenuhi kebutuhan dan mendukung
                    pemulihan fungsi sosial penerima layanan.
                </p>
            </div>

            <div class="pf-goals-grid">

                <article class="pf-goal-card">
                    <span class="pf-goal-number">01</span>

                    <span class="pf-goal-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="m3 10 9-7 9 7"/>
                            <path d="M5 9v12h14V9"/>
                            <path d="M9 21v-8h6v8"/>
                        </svg>
                    </span>

                    <h3>Memenuhi Kebutuhan Dasar</h3>

                    <p>
                        Pemenuhan kebutuhan tempat tinggal
                        sementara, makanan, kebersihan diri,
                        dan kebutuhan sehari-hari.
                    </p>
                </article>

                <article class="pf-goal-card">
                    <span class="pf-goal-number">02</span>

                    <span class="pf-goal-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </span>

                    <h3>Memberikan Perlindungan</h3>

                    <p>
                        Memberikan lingkungan pelayanan
                        yang aman, layak, dan manusiawi
                        bagi penerima layanan.
                    </p>
                </article>

                <article class="pf-goal-card">
                    <span class="pf-goal-number">03</span>

                    <span class="pf-goal-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0l-1 1-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z"/>
                        </svg>
                    </span>

                    <h3>Pemulihan Kondisi Sosial</h3>

                    <p>
                        Mendukung pemulihan fungsi sosial
                        melalui pembinaan, perawatan,
                        dan pendampingan sesuai kebutuhan.
                    </p>
                </article>

                <article class="pf-goal-card">
                    <span class="pf-goal-number">04</span>

                    <span class="pf-goal-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 22V12"/>
                            <path d="M12 12C5 12 4 7 4 4c6 0 8 3 8 8Z"/>
                            <path d="M12 12c7 0 8-5 8-8-6 0-8 3-8 8Z"/>
                        </svg>
                    </span>

                    <h3>Meningkatkan Kemandirian</h3>

                    <p>
                        Membantu penerima layanan
                        mengembangkan keterampilan,
                        kemampuan, dan kemandirian.
                    </p>
                </article>

                <article class="pf-goal-card">
                    <span class="pf-goal-number">05</span>

                    <span class="pf-goal-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="7" cy="7" r="3"/>
                            <circle cx="17" cy="7" r="3"/>
                            <path d="M2 21v-4a5 5 0 0 1 8-4"/>
                            <path d="M22 21v-4a5 5 0 0 0-8-4"/>
                            <path d="m9 16 3 3 3-3"/>
                        </svg>
                    </span>

                    <h3>Reintegrasi Sosial</h3>

                    <p>
                        Mendukung proses pengembalian
                        penerima layanan kepada keluarga
                        maupun masyarakat sesuai asesmen.
                    </p>
                </article>

                <article class="pf-goal-card">
                    <span class="pf-goal-number">06</span>

                    <span class="pf-goal-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 3v18"/>
                            <path d="M4 7h16"/>
                            <path d="M5 7 2 14h6L5 7Z"/>
                            <path d="m19 7-3 7h6l-3-7Z"/>
                            <path d="M8 21h8"/>
                        </svg>
                    </span>

                    <h3>Menghormati Martabat Manusia</h3>

                    <p>
                        Memberikan pelayanan yang
                        manusiawi dan tanpa diskriminasi,
                        dengan menghormati hak setiap individu.
                    </p>
                </article>

            </div>

            <!-- MAKSUD DAN TUJUAN BERDASARKAN RANCANGAN KONSEP SOP -->
            <details class="pf-extra">
                <summary>
                    Lihat Maksud dan Tujuan Penyelenggaraan
                </summary>

                <ol>
                    <li>
                        Menjadi pedoman baku bagi petugas
                        dalam memberikan pelayanan.
                    </li>
                    <li>
                        Memperjelas pembagian tugas dan
                        tanggung jawab masing-masing divisi.
                    </li>
                    <li>
                        Menjamin kesinambungan pelayanan
                        kesehatan dan pendampingan.
                    </li>
                    <li>
                        Meningkatkan ketertiban administrasi
                        dan dokumentasi pelayanan.
                    </li>
                    <li>
                        Meminimalkan kesalahan, keterlambatan,
                        dan tumpang tindih pelaksanaan tugas.
                    </li>
                    <li>
                        Menjadi dasar evaluasi dan
                        peningkatan mutu pelayanan.
                    </li>
                </ol>
            </details>

        </div>
    </section>


    <!-- 7. FUNGSI PELAYANAN -->
    <section class="pf-section">
        <div class="container">

            <div class="pf-heading-center">
                <span class="pf-label">
                    FUNGSI PELAYANAN
                </span>

                <h2 class="pf-title">
                    Fungsi UPTD PP REHSOS
                </h2>

                <p class="pf-description">
                    Fungsi pelayanan sosial yang
                    dilaksanakan sesuai kebutuhan
                    penerima layanan.
                </p>
            </div>

            <div class="pf-functions-grid">

                <article class="pf-function">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 17h5l3 2h5l5-6a2 2 0 0 0-3-2l-4 3"/>
                        <path d="M3 13h5l4 2h4"/>
                        <path d="M12 5c2-3 6-1 6 2 0 2-3 4-6 6-3-2-6-4-6-6 0-3 4-5 6-2Z"/>
                    </svg>
                    <h3>Pelayanan</h3>
                </article>

                <article class="pf-function">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0l-1 1-1-1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z"/>
                        <path d="M5 12h4l2-3 2 6 2-3h4"/>
                    </svg>
                    <h3>Rehabilitasi Sosial</h3>
                </article>

                <article class="pf-function">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="8" cy="8" r="3"/>
                        <circle cx="17" cy="8" r="3"/>
                        <path d="M2 21v-4a6 6 0 0 1 9-5"/>
                        <path d="M22 21v-4a6 6 0 0 0-9-5"/>
                        <path d="M9 18h6"/>
                    </svg>
                    <h3>Pendampingan</h3>
                </article>

                <article class="pf-function">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 21V5l8-3 8 3v16"/>
                        <path d="M2 21h20"/>
                        <path d="M12 7v8"/>
                        <path d="M8 11h8"/>
                    </svg>
                    <h3>Rujukan</h3>
                </article>

            </div>

        </div>
    </section>



<!-- 8. STRUKTUR PETUGAS -->
<section class="pf-section pf-section-soft" id="struktur-petugas">
    <div class="container">

        <div class="pf-heading-center">
            <span class="pf-label">ORGANISASI</span>

            <h2 class="pf-title">
                Struktur Petugas UPTD PP REHSOS
            </h2>

            <p class="pf-description">
                Struktur petugas UPTD PP REHSOS Kabupaten
                Sidoarjo terdiri dari Kepala UPTD serta
                petugas pada bidang juru masak, kebersihan,
                pendampingan, penjagaan, dan kesehatan.
            </p>
        </div>

        <!-- GAMBAR STRUKTUR PETUGAS -->
        <div class="pf-structure-image">
            <img
                src="{{ asset('images/Struktur-Petugas.png') }}"
                alt="Struktur Petugas UPTD PP REHSOS Kabupaten Sidoarjo"
                loading="lazy"
            >
        </div>

        <div class="pf-structure-caption">
            <span>
                Struktur Petugas UPTD PP REHSOS
                Kabupaten Sidoarjo
            </span>

            <a
                href="{{ asset('images/struktur-petugas.png') }}"
                target="_blank"
                rel="noopener noreferrer"
            >
                Lihat ukuran penuh ↗
            </a>
        </div>

    </div>
</section>


</div>

@endsection
