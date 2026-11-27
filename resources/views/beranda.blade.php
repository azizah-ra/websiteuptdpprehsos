
@extends('layouts.app')

@section('title', 'Beranda | UPTD PP REHSOS')

@push('styles')
<style>
    .home-hero {
        position: relative;
        display: flex;
        align-items: center;
        min-height: 620px;
        color: white;
        background: #133e2d;
        isolation: isolate;
        overflow: hidden;
    }

    .home-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -1;
        background:
            linear-gradient(
                90deg,
                rgba(6, 29, 20, .83) 0%,
                rgba(6, 29, 20, .42) 55%,
                rgba(6, 29, 20, .10) 100%
            ),
            url('{{ asset('images/UPTD.jpeg') }}')
            center / cover no-repeat;
    }

    .home-hero h1 {
        max-width: 790px;
        margin: 20px 0;
        font: 800 clamp(46px, 6vw, 82px)/1.1 Manrope, sans-serif;
        letter-spacing: -2.7px;
    }

    .home-hero p {
        max-width: 570px;
        font-size: 18px;
        color: #eaf4eb;
        margin-bottom: 32px;
    }

    .home-hero .eyebrow { color: #dcf0c6; }

    /* Paragraf Beranda rata kanan-kiri, judul tetap rata kiri */
    .home-copy .lead,
    .home-link p,
    .hm-pelayanan-lead,
    .hm-pelayanan-description p,
    .hm-panel-item p {
        text-align: justify;
        text-align-last: left;
        text-justify: inter-word;
        overflow-wrap: break-word;
    }

    .home-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 70px;
        align-items: center;
    }

    .home-copy {
        max-width: 600px;
    }

    .home-photo {
        width: 100%;
        height: 370px;
        object-fit: cover;
        border-radius: 12px;
    }

    .home-links {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
        margin-top: 35px;
    }

    .home-link {
        padding: 23px 0;
        border-top: 2px solid #23754d;
    }

    .home-link h3 {
        font: 800 19px Manrope, sans-serif;
        margin: 0 0 9px;
    }

    .home-link p {
        color: var(--muted);
        font-size: 13px;
        margin: 0 0 15px;
    }

    .home-link a {
        color: var(--green);
        font-size: 13px;
        font-weight: 800;
    }

    @media (max-width: 850px) {
        .home-grid { grid-template-columns: 1fr; gap: 30px; }
        .home-links { grid-template-columns: 1fr; gap: 8px; }
        .home-hero { min-height: 550px; }
    }

    @media (max-width: 580px) {
        .home-hero h1 { font-size: 43px; letter-spacing: -1.5px; }
        .home-hero p { font-size: 15px; }
        .home-photo { height: 270px; }
    }

/* =========================================
   BERANDA — PELAYANAN TERPADU
========================================= */

.hm-pelayanan {
    background: #FFFFFF;
    padding: 58px 0 64px;
}

.hm-pelayanan-container {
    width: min(1200px, calc(100% - 48px));
    margin: 0 auto;
}

.hm-pelayanan-heading {
    max-width: 790px;
    margin-bottom: 32px;
}

.hm-pelayanan-label,
.hm-panel-label {
    display: block;
    color: #087E61;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
    margin-bottom: 12px;
}

.hm-pelayanan-heading h2 {
    color: #173E30;
    font-size: clamp(27px, 3vw, 36px);
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: -0.7px;
    margin: 0 0 16px;
}

.hm-pelayanan-lead {
    color: #61776B;
    font-size: 15px;
    line-height: 1.85;
    margin: 0;
}

.hm-pelayanan-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
    gap: 44px;
    align-items: start;
}

.hm-pelayanan-description h3 {
    color: #173E30;
    font-size: 21px;
    font-weight: 750;
    margin: 0 0 18px;
}

.hm-pelayanan-description p {
    color: #576D61;
    font-size: 14px;
    line-height: 1.95;
    margin: 0 0 17px;
}

/* Panel kanan */

.hm-pelayanan-panel {
    background: #EFF7F1;
    border: 1px solid #E0EDE4;
    border-radius: 18px;
    padding: 28px;
}

.hm-panel-item {
    display: flex;
    gap: 15px;
    padding: 16px 0;
    border-bottom: 1px solid #DCE9DF;
}

.hm-panel-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.hm-panel-number {
    color: #087E61;
    font-size: 12px;
    font-weight: 800;
    padding-top: 3px;
}

.hm-panel-item h4 {
    color: #173E30;
    font-size: 14px;
    font-weight: 750;
    margin: 0 0 6px;
}

.hm-panel-item p {
    color: #60776B;
    font-size: 13px;
    line-height: 1.7;
    margin: 0;
}

/* RESPONSIVE */

@media (max-width: 800px) {

    .hm-pelayanan {
        padding: 40px 0 45px;
    }

    .hm-pelayanan-container {
        width: calc(100% - 32px);
    }

    .hm-pelayanan-grid {
        grid-template-columns: 1fr;
        gap: 24px;
    }

    .hm-pelayanan-panel {
        padding: 22px;
    }

    .hm-pelayanan-heading {
        margin-bottom: 25px;
    }
}

</style>
@endpush

@section('content')

<section class="home-hero">
    <div class="container">
        <span class="eyebrow">PEMERINTAH KABUPATEN SIDOARJO</span>

        <h1>
            UPTD PP REHSOS<br>
            Kabupaten Sidoarjo.
        </h1>

        <p>
            Perlindungan dan pelayanan rehabilitasi sosial
            yang humanis, profesional, dan berkeadilan.
        </p>

        <a href="{{ route('profil') }}" class="button">
            Mengenal Kami ↗
        </a>
    </div>
</section>

<section class="section">
    <div class="container home-grid">
        <div class="home-copy">
            <span class="eyebrow">TENTANG KAMI</span>

            <h2 class="heading">
                Pelayanan sosial yang humanis, profesional, dan berkeadilan.
            </h2>

            <p class="lead">
                UPTD PP REHSOS (Liponsos) merupakan unit pelaksana teknis daerah
                di bawah naungan Dinas Sosial Kabupaten Sidoarjo
                dalam bidang rehabilitasi sosial.
                UPTD ini menyelenggarakan penampungan sementara,
                perlindungan, pendampingan, dan rehabilitasi sosial
                bagi masyarakat yang membutuhkan pelayanan.
            </p>

            <a href="{{ route('profil') }}" class="text-link">
                Selengkapnya tentang instansi ↗
            </a>
        </div>

        <img class="home-photo"
             src="{{ asset('images/UPTD.jpeg') }}"
             alt="Gedung instansi UPTD PP REHSOS">
    </div>
</section>

<section class="section soft">
    <div class="container">
        <span class="eyebrow">JELAJAHI INFORMASI</span>
        <h2 class="heading">Informasi untuk masyarakat.</h2>

        <div class="home-links">
            <article class="home-link">
                <h3>Profil Instansi</h3>
                <p>Mengenal UPTD PP REHSOS, visi, misi, dan tujuan pelayanan.</p>
                <a href="{{ route('profil') }}">Lihat Profil ↗</a>
            </article>

            <article class="home-link">
                <h3>Pelayanan Sosial</h3>
                <p>Informasi perlindungan, rehabilitasi, dan pendampingan sosial.</p>
                <a href="{{ route('layanan') }}">Lihat Layanan ↗</a>
            </article>

            <article class="home-link">
                <h3>Informasi Pelayanan</h3>
                <p>Pelajari alur, dokumen, dan informasi pelayanan sosial.</p>
                <a href="{{ route('informasi') }}">Lihat Informasi ↗</a>
            </article>

        </div>
    </div>
</section>

<!-- =========================================
     MENGENAL PELAYANAN TERPADU
========================================= -->

<section class="hm-pelayanan" id="pelayanan-terpadu">

    <div class="hm-pelayanan-container">

        <div class="hm-pelayanan-heading">
            <span class="hm-pelayanan-label">
                MENGENAL PELAYANAN KAMI
            </span>

            <h2>
                Pelayanan Sosial yang Terarah
                dan Berkesinambungan.
            </h2>

            <p class="hm-pelayanan-lead">
                UPTD PP REHSOS Kabupaten Sidoarjo
                berupaya memberikan perlindungan dan
                pelayanan rehabilitasi sosial yang
                memperhatikan kondisi serta kebutuhan
                setiap penerima layanan.
            </p>
        </div>

        <div class="hm-pelayanan-grid">

            <!-- KOLOM KIRI -->
            <div class="hm-pelayanan-description">

                <h3>
                    Pendekatan Pelayanan Terpadu
                </h3>

                <p>
                    Pelayanan sosial di UPTD PP REHSOS
                    Kabupaten Sidoarjo diarahkan untuk
                    memberikan perlindungan, perhatian,
                    dan pendampingan kepada Pemerlu
                    Pelayanan Kesejahteraan Sosial (PPKS).
                    Setiap penerima layanan memiliki
                    kondisi serta kebutuhan yang berbeda
                    sehingga diperlukan proses pelayanan
                    yang terarah dan manusiawi.
                    Pendekatan pelayanan mencakup
                    penerimaan, identifikasi kebutuhan,
                    pemantauan kondisi kesehatan, dan
                    pendampingan aktivitas sehari-hari.
                    Seluruh tahapan tersebut diarahkan
                    untuk mendukung pelayanan yang aman,
                    terkoordinasi, dan berkesinambungan.
                </p>

                <p>
                    Dalam pelaksanaannya, koordinasi
                    antardivisi menjadi bagian penting
                    untuk menjaga kesinambungan
                    pelayanan kepada penerima layanan.
                    Petugas kesehatan berperan dalam
                    pemeriksaan dan pemantauan kondisi
                    kesehatan sesuai kompetensi serta
                    kewenangannya, sedangkan petugas
                    pendamping membantu pemenuhan
                    kebutuhan sehari-hari dan memantau
                    perkembangan penerima layanan.
                    Informasi yang relevan disampaikan
                    kepada petugas terkait dengan tetap
                    memperhatikan kerahasiaan data
                    pribadi dan kesehatan.
                    Melalui pencatatan, koordinasi,
                    evaluasi, serta tindak lanjut,
                    pelayanan diharapkan dapat
                    dilaksanakan secara lebih tertib
                    dan bertanggung jawab.
                </p>

            </div>

            <!-- KOLOM KANAN -->
            <aside class="hm-pelayanan-panel">

                <span class="hm-panel-label">
                    RUANG LINGKUP PELAYANAN
                </span>

                <div class="hm-panel-item">
                    <span class="hm-panel-number">01</span>
                    <div>
                        <h4>Penerimaan dan Identifikasi</h4>
                        <p>
                            Penerimaan, pencatatan awal,
                            dan identifikasi kondisi serta
                            kebutuhan penerima layanan.
                        </p>
                    </div>
                </div>

                <div class="hm-panel-item">
                    <span class="hm-panel-number">02</span>
                    <div>
                        <h4>Pelayanan Kesehatan</h4>
                        <p>
                            Pemeriksaan awal, pemantauan
                            kondisi kesehatan, pencatatan,
                            dan rujukan sesuai kebutuhan.
                        </p>
                    </div>
                </div>

                <div class="hm-panel-item">
                    <span class="hm-panel-number">03</span>
                    <div>
                        <h4>Pendampingan Sosial</h4>
                        <p>
                            Pendampingan aktivitas harian,
                            pemenuhan kebutuhan, dan
                            pemantauan perkembangan.
                        </p>
                    </div>
                </div>

                <div class="hm-panel-item">
                    <span class="hm-panel-number">04</span>
                    <div>
                        <h4>Evaluasi dan Tindak Lanjut</h4>
                        <p>
                            Koordinasi antarpetugas,
                            dokumentasi, evaluasi,
                            serta tindak lanjut pelayanan.
                        </p>
                    </div>
                </div>

            </aside>

        </div>

    </div>

</section>

<!-- AKHIR MENGENAL PELAYANAN TERPADU -->

@endsection
