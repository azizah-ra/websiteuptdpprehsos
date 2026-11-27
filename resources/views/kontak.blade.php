@extends('layouts.app')

@section('title', 'Hubungi Kami | UPTD PP REHSOS Kabupaten Sidoarjo')

@push('styles')
<style>
/* HALAMAN KONTAK — khusus kontak.blade.php, tidak mengubah halaman lain */
.kc-page {
    --kc-green: #087e61;
    --kc-dark: #173d2f;
    --kc-muted: #607568;
    --kc-border: #e1ebe5;
    --kc-soft: #f3f9f6;
    color: var(--kc-dark);
}
.kc-page *, .kc-page *::before, .kc-page *::after { box-sizing: border-box; }S
.kc-page section[id] { scroll-margin-top: 100px; }
.kc-page .kc-hero {
    background:
        linear-gradient(90deg, rgba(7,42,32,.87) 0%, rgba(9,62,47,.68) 53%, rgba(10,75,56,.32) 100%),
        url('{{ asset('images/UPTD.jpeg') }}') center 48% / cover no-repeat;
    color: #fff;
    padding: 45px 0 49px;
}
.kc-page .kc-hero .container { display: block; min-height: 0; }
.kc-page .kc-hero-label {
    display: block; margin-bottom: 12px; color: #d4f3e3;
    font-size: 10px; font-weight: 800; letter-spacing: 1.6px;
}
.kc-page .kc-hero h1 {
    max-width: 780px; margin: 0 0 13px; color: white;
    font: 800 clamp(31px,3.5vw,45px)/1.2 Manrope, sans-serif;
    letter-spacing: -1.1px;
}
.kc-page .kc-hero p {
    max-width: 680px; margin: 0 0 20px; color: #e9f6ef;
    font-size: 14px; line-height: 1.8;
}
.kc-page .kc-hero-link {
    display: inline-flex; align-items: center; gap: 9px;
    width: fit-content; max-width: 100%;
    padding: 10px 18px; border: 1px solid rgba(255,255,255,.84);
    border-radius: 999px; background: transparent;
    text-decoration: none; color: #fff; font-size: 13px; font-weight: 750;
    transition: background-color .2s ease;
}
.kc-page .kc-hero-link:hover, .kc-page .kc-hero-link:focus-visible {
    background: rgba(255,255,255,.14); color: #fff;
}
.kc-page .kc-section { padding: 54px 0; }
.kc-page .kc-section-soft { background: var(--kc-soft); }
.kc-page .kc-info-grid.container {
    display: grid; grid-template-columns: minmax(0,.9fr) minmax(0,1.1fr);
    align-items: start; gap: 44px;
}
.kc-page .kc-info-grid > * { min-width: 0; }
.kc-page .kc-label {
    display: block; margin: 0 0 10px; color: var(--kc-green);
    font-size: 10px; font-weight: 800; letter-spacing: 1.5px;
}
.kc-page .kc-title {
    margin: 0 0 13px; color: var(--kc-dark);
    font: 800 clamp(26px,2.6vw,34px)/1.28 Manrope, sans-serif;
    letter-spacing: -.8px;
}
.kc-page .kc-copy {
    color: var(--kc-muted); font-size: 14px; line-height: 1.85;
    margin: 0 0 19px;
}
.kc-page .kc-details { border-top: 1px solid var(--kc-border); margin: 23px 0 0; }
.kc-page .kc-detail {
    display: grid; grid-template-columns: 42px minmax(0,1fr);
    gap: 15px; padding: 18px 0;
    border-bottom: 1px solid var(--kc-border);
}
.kc-page .kc-detail-icon {
    display: grid; place-items: center; width: 40px; height: 40px;
    border-radius: 11px; background: #e3f3ea; color: var(--kc-green);
}
.kc-page .kc-detail-icon svg {
    width: 21px; height: 21px; fill: none; stroke: currentColor;
    stroke-width: 1.9; stroke-linecap: round; stroke-linejoin: round;
}
.kc-page .kc-detail h3 {
    margin: 1px 0 7px; font: 800 15px/1.45 Manrope, sans-serif;
    color: var(--kc-dark);
}
.kc-page .kc-detail p, .kc-page .kc-detail address {
    margin: 0; color: var(--kc-muted); font-size: 13px;
    line-height: 1.8; font-style: normal;
}
.kc-page .kc-detail a:not(.kc-button) {
    color: #087e61; font-weight: 750; text-decoration: none;
}
.kc-page .kc-detail a:not(.kc-button):hover { text-decoration: underline; }
.kc-page .kc-detail-note { display: block; margin-top: 3px; font-size: 12px; color: #73877b; }
.kc-page .kc-actions { display: flex; flex-wrap: wrap; gap: 11px; margin-top: 23px; }
.kc-page .kc-button {
    display: inline-flex; align-items: center; justify-content: center; gap: 9px;
    padding: 11px 18px; border-radius: 999px; font-size: 13px;
    font-weight: 800; text-decoration: none; line-height: 1.35;
    border: 1px solid var(--kc-green);
}
.kc-page .kc-button-primary { background: var(--kc-green); color: #fff; }
.kc-page .kc-button-primary:hover { background: #066c52; color: #fff; }
.kc-page .kc-button-outline { background: #fff; color: var(--kc-green); }
.kc-page .kc-button-outline:hover { background: #e9f6ed; color: var(--kc-green); }
.kc-page .kc-map-card {
    border: 1px solid var(--kc-border); border-radius: 17px;
    overflow: hidden; background: #fff;
    box-shadow: 0 9px 25px rgba(17, 68, 45, .05);
}
.kc-page .kc-map-head {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 9px; padding: 16px 19px;
    border-bottom: 1px solid var(--kc-border);
}
.kc-page .kc-map-head h3 {
    font: 800 15px/1.5 Manrope, sans-serif;
    color: var(--kc-dark); margin: 0;
}
.kc-page .kc-map-head a {
    font-size: 12px; font-weight: 800; text-decoration: none; color: var(--kc-green);
}
.kc-page .kc-map-head a:hover { text-decoration: underline; }
.kc-page .kc-map {
    display: block; width: 100%; height: 410px;
    border: 0; background: #e8f1e9;
}
.kc-page .kc-map-foot {
    padding: 12px 19px; color: #667c6d; font-size: 12px; line-height: 1.7;
}
.kc-page .kc-bottom {
    display: flex; align-items: center; justify-content: space-between;
    gap: 22px; padding: 24px 28px; border-radius: 15px;
    background: #e6f4eb;
}
.kc-page .kc-bottom h2 {
    margin: 0 0 6px; font: 800 19px/1.4 Manrope, sans-serif;
    color: var(--kc-dark);
}
.kc-page .kc-bottom p { margin: 0; color: var(--kc-muted); font-size: 13px; line-height: 1.7; }
.kc-page .kc-bottom a { white-space: nowrap; }
@media (max-width: 900px) {
    .kc-page .kc-info-grid.container { grid-template-columns: 1fr; gap: 27px; }
    .kc-page .kc-map { height: 340px; }
}
@media (max-width: 600px) {
    .kc-page .kc-hero { padding: 36px 0 40px; }
    .kc-page .kc-section { padding: 39px 0; }
    .kc-page .kc-map { height: 290px; }
    .kc-page .kc-bottom { flex-direction: column; align-items: flex-start; padding: 20px; }
    .kc-page .kc-bottom a { white-space: normal; }
}
@media (prefers-reduced-motion: reduce) {
    .kc-page .kc-hero-link { transition: none; }
}
</style>
@endpush

@section('content')
<div class="kc-page">
    <!-- HERO FOTO GEDUNG -->
    <section class="kc-hero">
        <div class="container">
            <span class="kc-hero-label">HUBUNGI KAMI</span>
            <h1>Kontak dan Lokasi UPTD PP REHSOS</h1>
            <p>Informasi alamat, telepon, dan lokasi UPTD PP REHSOS Kabupaten Sidoarjo untuk membantu masyarakat mengakses pelayanan sosial.</p>
            <a href="#lokasi-kontak" class="kc-hero-link">Lihat Lokasi &darr;</a>
        </div>
    </section>

    <!-- KONTAK DAN GOOGLE MAPS -->
    <section class="kc-section" id="lokasi-kontak">
        <div class="container kc-info-grid">
            <div>
                <span class="kc-label">INFORMASI INSTANSI</span>
                <h2 class="kc-title">Kunjungi atau Hubungi Kami</h2>
                <p class="kc-copy">UPTD PP REHSOS berada di wilayah Sidokare, Kecamatan Sidoarjo. Gunakan informasi berikut untuk menghubungi petugas atau menemukan lokasi pelayanan.</p>

                <div class="kc-details">
                    <div class="kc-detail">
                        <span class="kc-detail-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                        </span>
                        <div>
                            <h3>Alamat</h3>
                            <address>Jl. Sekolahan / Jl. Kutuk, Cangkring, Sidokare, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61214</address>
                        </div>
                    </div>

                    <div class="kc-detail">
                        <span class="kc-detail-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.4 2.8a2 2 0 0 1-.6 1.7L7 10a16 16 0 0 0 7 7l1.8-1.9a2 2 0 0 1 1.7-.6l2.8.4a2 2 0 0 1 1.7 2Z"/></svg>
                        </span>
                        <div>
                            <h3>Telepon</h3>
                            <p><a href="tel:+6285711404090">+62 8571 1404 090</a></p>
                        </div>
                    </div>

                    <div class="kc-detail">
                        <span class="kc-detail-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                        </span>
                        <div>
                            <h3>Operasional Shelter</h3>
                            <p><strong>24 jam, Senin–Minggu</strong></p>
                            <span class="kc-detail-note">Informasi ini berlaku untuk operasional layanan shelter, bukan jam layanan administrasi.</span>
                        </div>
                    </div>

                    <div class="kc-detail">
                        <span class="kc-detail-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M7 3v7a5 5 0 0 0 10 0V3"/><path d="M7 7h10M12 15v6M8 21h8"/></svg>
                        </span>
                        <div>
                            <h3>Fasilitas Umum</h3>
                            <p>Toilet / restroom tersedia.</p>
                        </div>
                    </div>
                </div>

                <div class="kc-actions">
                    <a class="kc-button kc-button-primary"
                       href="https://maps.app.goo.gl/ky7X67a9pCeqYjU77?g_st=ac"
                       target="_blank" rel="noopener noreferrer">
                        Buka Google Maps &#8599;
                    </a>
                    <a class="kc-button kc-button-outline" href="tel:+62318075421">
                        Hubungi via Telepon &#8599;
                    </a>
                </div>
            </div>

            <div class="kc-map-card">
                <div class="kc-map-head">
                    <h3>Lokasi UPTD PP REHSOS</h3>
                    <a href="https://maps.app.goo.gl/ky7X67a9pCeqYjU77?g_st=ac"
                       target="_blank" rel="noopener noreferrer">Petunjuk Arah &#8599;</a>
                </div>
                <iframe
                    class="kc-map"
                    title="Peta lokasi UPTD PP REHSOS Kabupaten Sidoarjo"
                    src="https://www.google.com/maps?output=embed&amp;q=Jl.%20Sekolahan%2C%20Cangkring%2C%20Sidokare%2C%20Kecamatan%20Sidoarjo%2C%20Kabupaten%20Sidoarjo%2C%20Jawa%20Timur%2061214"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                ></iframe>
                <div class="kc-map-foot">Cangkring, Sidokare, Kecamatan Sidoarjo, Kabupaten Sidoarjo, Jawa Timur.</div>
            </div>
        </div>
    </section>

    <!-- PENGHUBUNG KE PANDUAN, TANPA FORM DATA PRIBADI -->
    <section class="kc-section kc-section-soft">
        <div class="container">
            <div class="kc-bottom">
                <div>
                    <h2>Ingin mengetahui prosedur pelayanan?</h2>
                    <p>Baca tahapan dan persyaratan layanan sebelum berkunjung.</p>
                </div>
                <a href="{{ route('informasi') }}" class="kc-button kc-button-primary">Lihat Informasi Pelayanan &#8599;</a>
            </div>
        </div>
    </section>
</div>
@endsection
