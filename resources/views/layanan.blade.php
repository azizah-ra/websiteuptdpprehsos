
@extends('layouts.app')

@section('title', 'Layanan | UPTD PP REHSOS Kabupaten Sidoarjo')

@push('styles')
<style>
/* =====================================
   HALAMAN LAYANAN MODERN
===================================== */

.lm-page {
    --lm-dark: #173d2f;
    --lm-green: #087e61;
    --lm-muted: #61766b;
    --lm-border: #e1ebe5;
    --lm-soft: #f3faf6;
}

.lm-page * {
    box-sizing: border-box;
}

.lm-page .lm-section {
    padding: 55px 0;
}

.lm-page .lm-label {
    display: block;
    color: var(--lm-green);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
    margin-bottom: 11px;
}

.lm-page .lm-title {
    color: var(--lm-dark);
    font: 800 clamp(26px,2.6vw,35px)/1.25 Manrope,sans-serif;
    letter-spacing: -1px;
    margin: 0 0 13px;
}

.lm-page .lm-text {
    color: var(--lm-muted);
    font-size: 14px;
    line-height: 1.8;
    margin: 0;
}

.lm-page .lm-centered {
    max-width: 740px;
    margin: 0 auto 28px;
    text-align: center;
}

/* HERO — RINGKAS */

.lm-page .lm-hero {
    background:
        linear-gradient(
            90deg,
            rgba(9, 49, 38, 0.82) 0%,
            rgba(12, 88, 70, 0.68) 45%,
            rgba(24, 156, 127, 0.55) 100%
        ),
        url('{{ asset('images/UPTD.jpeg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 42px 0 46px;
    color: white;
}

.lm-page .lm-hero .container {
    min-height: 0;
    display: block;
}


.lm-page .lm-hero h1,
.lm-page .lm-hero p,
.lm-page .lm-hero .lm-label {
    text-shadow: 0 2px 10px rgba(0,0,0,0.18);
}

.lm-page .lm-hero .lm-label {
    color: #c9f5dd;
}

.lm-page .lm-hero h1 {
    color: white;
    font: 800 clamp(32px,3.6vw,47px)/1.16 Manrope,sans-serif;
    letter-spacing: -1.4px;
    margin: 0 0 17px;
}

.lm-page .lm-hero p {
    max-width: 710px;
    color: #e3f5ed;
    font-size: 15px;
    line-height: 1.8;
    margin: 0 0 23px;
}


.lm-page .lm-hero-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    width: fit-content;
    max-width: 100%;

    padding: 10px 18px;
    margin-top: 2px;

    background: transparent;
    color: #ffffff;

    border: 1px solid rgba(255, 255, 255, 0.75);
    border-radius: 30px;

    font-size: 13px;
    font-weight: 700;
    text-decoration: none;

    transition:
        background-color .25s ease,
        border-color .25s ease;
}

.lm-page .lm-hero-link:hover {
    background: rgba(255, 255, 255, 0.12);
    border-color: #ffffff;
    color: #ffffff;
}


/* TENTANG LAYANAN */

.lm-page .lm-about-grid {
    display: grid;
    grid-template-columns: 1fr .85fr;
    align-items: center;
    gap: 45px;
}

.lm-page .lm-about-copy p + p {
    margin-top: 12px;
}

.lm-page .lm-about-panel {
    background: #e8f6ef;
    border-radius: 17px;
    padding: 30px;
}

.lm-page .lm-about-panel svg {
    width: 33px;
    height: 33px;
    margin-bottom: 15px;
    fill: none;
    stroke: #087e61;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.lm-page .lm-about-panel h3 {
    font: 800 20px/1.4 Manrope,sans-serif;
    color: var(--lm-dark);
    margin: 0 0 12px;
}

/* LIMA BENTUK PELAYANAN */

.lm-page .lm-types {
    background: #f8fbf9;
}

.lm-page .lm-type-list {
    border-top: 1px solid var(--lm-border);
    margin-top: 25px;
}

.lm-page .lm-type-row {
    display: grid;
    grid-template-columns: 40px 1fr 1.2fr;
    gap: 20px;
    align-items: start;
    padding: 17px 0;
    border-bottom: 1px solid var(--lm-border);
}

.lm-page .lm-type-row span {
    color: var(--lm-green);
    font-size: 12px;
    font-weight: 800;
}

.lm-page .lm-type-row h3 {
    margin: 0;
    font: 800 16px/1.5 Manrope,sans-serif;
}

.lm-page .lm-type-row p {
    margin: 0;
    color: var(--lm-muted);
    font-size: 13px;
    line-height: 1.75;
}

/* ENAM KARTU PENERIMA LAYANAN */

.lm-page .lm-recipients {
    background: #f2f9f5;
}

.lm-page .lm-cards {
    display: grid;
    grid-template-columns: repeat(3,minmax(0,1fr));
    gap: 18px;
}

.lm-page .lm-card {
    min-width: 0;
    padding: 24px;
    background: #fff;
    border: 1px solid var(--lm-border);
    border-radius: 16px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    min-height: 224px;
    transition: border-color .2s,transform .2s;
}

.lm-page .lm-card:hover {
    border-color: #a9d9c4;
    transform: translateY(-2px);
}

.lm-page .lm-card-top {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: start;
    margin-bottom: 18px;
}

.lm-page .lm-card-icon {
    display: grid;
    place-items: center;
    width: 43px;
    height: 43px;
    background: #e5f5ed;
    border-radius: 11px;
    color: #087e61;
}

.lm-page .lm-card-icon svg {
    width: 24px;
    height: 24px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.9;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.lm-page .lm-card-num {
    font: 800 23px Manrope,sans-serif;
    color: #d5e9de;
}

.lm-page .lm-card h3 {
    margin: 0 0 9px;
    color: var(--lm-dark);
    font: 800 17px/1.4 Manrope,sans-serif;
}

.lm-page .lm-card p {
    margin: 0 0 19px;
    color: var(--lm-muted);
    font-size: 13px;
    line-height: 1.75;
}

.lm-page .lm-card-button {
    margin-top: auto;
    padding: 0;
    background: none;
    border: 0;
    color: var(--lm-green);
    font-size: 13px;
    font-weight: 800;
    text-align: left;
}

.lm-page .lm-card-button:hover {
    text-decoration: underline;
}

/* ALUR PELAYANAN */

.lm-page .lm-steps {
    display: grid;
    grid-template-columns: repeat(4,minmax(0,1fr));
    gap: 17px;
}

.lm-page .lm-step {
    border: 1px solid var(--lm-border);
    border-radius: 14px;
    padding: 23px;
    background: white;
}

.lm-page .lm-step-no {
    display: block;
    color: var(--lm-green);
    font: 800 25px Manrope,sans-serif;
    margin-bottom: 17px;
}

.lm-page .lm-step h3 {
    color: var(--lm-dark);
    font: 800 16px/1.4 Manrope,sans-serif;
    margin: 0 0 8px;
}

.lm-page .lm-step p {
    color: var(--lm-muted);
    font-size: 13px;
    line-height: 1.8;
    margin: 0;
}

/* POP-UP DETAIL LAYANAN */

.lm-detail-dialog {
    width: min(680px,calc(100% - 28px));
    max-width: none;
    max-height: min(85vh,760px);
    border: none;
    border-radius: 19px;
    padding: 0;
    background: white;
    color: #173d2f;
    box-shadow: 0 25px 90px rgba(0,0,0,.23);
}

.lm-detail-dialog::backdrop {
    background: rgba(8,32,25,.67);
    backdrop-filter: blur(3px);
}

.lm-modal-content {
    position: relative;
    padding: 32px;
}

.lm-modal-close {
    position: absolute;
    right: 17px;
    top: 17px;
    width: 37px;
    height: 37px;
    border: 1px solid #e0ebe5;
    border-radius: 50%;
    background: #f5f9f6;
    color: #173d2f;
    font-size: 25px;
    cursor: pointer;
}

.lm-modal-kicker {
    color: #08815c;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.4px;
    display: block;
    margin: 8px 45px 12px 0;
}

.lm-modal-title {
    margin: 0 42px 15px 0;
    color: #173d2f;
    font: 800 clamp(23px,3vw,29px)/1.3 Manrope,sans-serif;
}

.lm-modal-description {
    margin: 0 0 23px;
    color: #5d7265;
    font-size: 14px;
    line-height: 1.85;
}

.lm-modal-divider {
    height: 1px;
    background: #e4ece6;
    margin-bottom: 19px;
}

.lm-modal-subtitle {
    color: #173d2f;
    font: 800 15px/1.5 Manrope,sans-serif;
    margin: 0 0 13px;
}

.lm-modal-list {
    padding: 0;
    margin: 0;
    list-style: none;
}

.lm-modal-list li {
    position: relative;
    padding: 0 0 0 27px;
    margin-bottom: 12px;
    color: #5d7265;
    font-size: 14px;
    line-height: 1.75;
}

.lm-modal-list li::before {
    content: "✓";
    position: absolute;
    left: 0;
    top: 0;
    color: #08815c;
    font-weight: 800;
}

.lm-modal-footer {
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px solid #e4ece6;
    display: flex;
    justify-content: flex-end;
}

.lm-modal-done {
    border: none;
    background: #087e61;
    color: #fff;
    border-radius: 24px;
    padding: 10px 21px;
    font-size: 13px;
    font-weight: 800;
    cursor: pointer;
}

/* RESPONSIVE — struktur media query diperbaiki */
@media (max-width: 900px) {
    .lm-page .lm-about-grid {
        grid-template-columns: 1fr;
        gap: 24px;
    }
    .lm-page .lm-cards,
    .lm-page .lm-steps {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    .lm-page .lm-sop-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 600px) {
    .lm-page .lm-hero { padding: 35px 0 39px; }
    .lm-page .lm-section { padding: 40px 0; }
    .lm-page .lm-type-row {
        grid-template-columns: 28px 1fr;
        gap: 6px 12px;
    }
    .lm-page .lm-type-row p { grid-column: 2; }
    .lm-page .lm-cards,
    .lm-page .lm-steps {
        grid-template-columns: 1fr;
    }
    .lm-page .lm-card { min-height: auto; }
    .lm-modal-content { padding: 23px; }
    .lm-page .lm-sop-card { padding: 23px 20px; }
    .lm-page .lm-sop-coordination { padding: 23px 20px; }
}

@media (prefers-reduced-motion: reduce) {
    .lm-page .lm-card {
        transition: none;
    }
}

/* =====================================
   PENGAYAAN SOP PELAYANAN + RATA KANAN-KIRI
   Hanya berlaku pada halaman Layanan
===================================== */

.lm-page .lm-about-copy .lm-text,
.lm-page .lm-about-panel .lm-text,
.lm-page .lm-type-row p,
.lm-page .lm-card p,
.lm-page .lm-step p,
.lm-page .lm-sop-intro,
.lm-page .lm-sop-card > p,
.lm-page .lm-sop-steps p,
.lm-page .lm-sop-coordination p,
.lm-modal-description,
.lm-modal-list li {
    text-align: justify;
    text-align-last: left;
    text-justify: inter-word;
    overflow-wrap: break-word;
    hyphens: auto;
}

.lm-page .lm-sop-section {
    background: #ffffff;
}

.lm-page .lm-sop-heading {
    max-width: 860px;
    margin-bottom: 27px;
}

.lm-page .lm-sop-intro {
    color: var(--lm-muted);
    font-size: 14px;
    line-height: 1.9;
    margin: 0;
}

.lm-page .lm-sop-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 22px;
    align-items: start;
}

.lm-page .lm-sop-card {
    min-width: 0;
    border: 1px solid #e1ebe5;
    border-radius: 17px;
    background: #f7fbf8;
    padding: 27px;
}

.lm-page .lm-sop-card:nth-child(2) {
    background: #f4f8f6;
}

.lm-page .lm-sop-kicker {
    display: inline-block;
    margin-bottom: 11px;
    color: #087e61;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.lm-page .lm-sop-card h3 {
    margin: 0 0 13px;
    color: #173d2f;
    font: 800 clamp(18px, 1.8vw, 21px)/1.4 Manrope, sans-serif;
}

.lm-page .lm-sop-card > p {
    margin: 0 0 17px;
    color: #61766b;
    font-size: 13.5px;
    line-height: 1.9;
}

.lm-page .lm-sop-coordination {
    margin-top: 24px;
    padding: 24px 28px;
    background: #eaf6ef;
    border: 1px solid #dcebe1;
    border-radius: 17px;
}

.lm-page .lm-sop-coordination h3 {
    margin: 0 0 11px;
    color: #173d2f;
    font: 800 17px/1.4 Manrope, sans-serif;
}

.lm-page .lm-sop-coordination p {
    margin: 0 0 12px;
    color: #536b5e;
    font-size: 13.5px;
    line-height: 1.85;
}

.lm-page .lm-sop-coordination p:last-child { margin-bottom: 0; }

.lm-page .lm-sop-note {
    margin-top: 16px;
    color: #667a70;
    font-size: 12px;
    line-height: 1.75;
}

.lm-page .lm-urgent-note {
    margin-top: 22px;
    padding: 17px 20px;
    border-left: 3px solid #087e61;
    border-radius: 8px;
    background: #f4faf6;
    color: #38574a;
    font-size: 13px;
    line-height: 1.8;
    text-align: justify;
}

.lm-page .lm-steps {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}

/* Media query ditempatkan terakhir agar tidak membatalkan grid responsif */
@media (max-width: 900px) {
    .lm-page .lm-sop-grid {
        grid-template-columns: 1fr;
    }
    .lm-page .lm-steps {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 600px) {
    .lm-page .lm-steps {
        grid-template-columns: 1fr;
    }
}



/* REVISI TAMPILAN SOP POP-UP + PERAPIHAN ALUR */
.lm-page .lm-sop-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 18px;
    border: 1px solid #b7d9c8;
    border-radius: 999px;
    background: #ffffff;
    color: #087e61;
    font-size: 13px;
    font-weight: 800;
    cursor: pointer;
    transition: background .2s ease, border-color .2s ease, transform .2s ease;
}

.lm-page .lm-sop-action:hover {
    background: #eef8f2;
    border-color: #8ccab0;
    transform: translateY(-1px);
}

/* Dialog berada di luar .lm-page, jadi CSS harus menargetkan dialog langsung. */
.lm-sop-dialog {
    width: min(700px, calc(100% - 32px));
    max-width: none;
    max-height: min(86vh, 730px);
    max-height: min(86dvh, 730px);
    margin: auto;
    padding: 0;
    overflow-y: auto;
    overscroll-behavior: contain;
    border: 1px solid #e3ece6;
    border-radius: 17px;
    background: #ffffff;
    color: #173d2f;
    box-shadow: 0 24px 75px rgba(0,0,0,.22);
}

.lm-sop-dialog::backdrop {
    background: rgba(8, 32, 25, .65);
    backdrop-filter: blur(3px);
}

.lm-sop-modal-content {
    position: relative;
    padding: 25px 26px 22px;
}

.lm-sop-modal-close {
    position: absolute;
    top: 16px;
    right: 16px;
    display: grid;
    place-items: center;
    width: 33px;
    height: 33px;
    padding: 0;
    border: 1px solid #dce9e1;
    border-radius: 50%;
    background: #f5f9f6;
    color: #173d2f;
    font-size: 23px;
    line-height: 1;
    cursor: pointer;
}

.lm-sop-modal-kicker {
    display: block;
    margin: 0 44px 6px 0;
    color: #087e61;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.3px;
}

.lm-sop-modal-title {
    margin: 0 42px 8px 0;
    color: #173d2f;
    font: 800 clamp(20px, 2.5vw, 25px)/1.3 Manrope, sans-serif;
    letter-spacing: -.5px;
}

.lm-sop-modal-text {
    margin: 0 0 13px;
    color: #60766b;
    font-size: 12.5px;
    line-height: 1.65;
    text-align: justify;
    text-align-last: left;
}

/* 7 langkah ringkas; setiap langkah langsung berisi judul dan uraian. */
.lm-sop-dialog .lm-sop-steps {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 9px;
    list-style: none;
    counter-reset: sop-step;
    margin: 0;
    padding: 0;
}

.lm-sop-dialog .lm-sop-steps li {
    position: relative;
    counter-increment: sop-step;
    min-width: 0;
    margin: 0;
    padding: 11px 12px 11px 40px;
    border: 1px solid #e2ece6;
    border-radius: 10px;
    background: #f8fbf9;
}

.lm-sop-dialog .lm-sop-steps li::before {
    content: counter(sop-step, decimal-leading-zero);
    position: absolute;
    top: 12px;
    left: 10px;
    display: grid;
    place-items: center;
    width: 22px;
    height: 22px;
    border-radius: 7px;
    background: #e1f2e8;
    color: #087e61;
    font-size: 10px;
    font-weight: 800;
}

.lm-sop-dialog .lm-sop-steps li strong {
    display: block;
    margin: 1px 0 4px;
    color: #173d2f;
    font-size: 12px;
    line-height: 1.4;
    font-weight: 800;
}

.lm-sop-dialog .lm-sop-steps li p {
    margin: 0;
    color: #5c7065;
    font-size: 12px;
    line-height: 1.6;
    text-align: left;
    overflow-wrap: break-word;
}

/* Tahap ke-7 berada di tengah baris terakhir. */
.lm-sop-dialog .lm-sop-steps li:last-child:nth-child(odd) {
    grid-column: 1 / -1;
    width: calc(50% - 5px);
    justify-self: center;
}

.lm-sop-modal-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 13px;
    padding-top: 13px;
    border-top: 1px solid #e4ece6;
}

.lm-sop-modal-done {
    padding: 9px 20px;
    border: 0;
    border-radius: 999px;
    background: #087e61;
    color: #fff;
    font-size: 12px;
    font-weight: 800;
    cursor: pointer;
}

.lm-sop-modal-close:hover,
.lm-sop-modal-done:hover {
    filter: brightness(.95);
}

@media (max-width: 600px) {
    .lm-sop-modal-content { padding: 21px 17px 18px; }
    .lm-sop-dialog .lm-sop-steps { grid-template-columns: 1fr; }
    .lm-sop-dialog .lm-sop-steps li:last-child:nth-child(odd) {
        grid-column: auto;
        width: 100%;
    }
}

.lm-page .lm-steps {
    grid-template-columns: repeat(4, minmax(0, 1fr));
}

.lm-page .lm-steps .lm-step:nth-child(5) {
    grid-column: 2;
}

.lm-page .lm-steps .lm-step:nth-child(6) {
    grid-column: 3;
}

@media (max-width: 900px) {
    .lm-page .lm-steps {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .lm-page .lm-steps .lm-step:nth-child(5),
    .lm-page .lm-steps .lm-step:nth-child(6) {
        grid-column: auto;
    }
}

@media (max-width: 600px) {
    .lm-page .lm-steps {
        grid-template-columns: 1fr;
    }
}

</style>
@endpush

@section('content')

@php
    $jenisLayanan = [
        [
            'nama' => 'Perlindungan Sosial',
            'uraian' => 'Pendampingan dan pemenuhan kebutuhan dasar.',
        ],
        [
            'nama' => 'Rehabilitasi Sosial',
            'uraian' => 'Pembinaan untuk pemulihan fungsi sosial.',
        ],
        [
            'nama' => 'Pemberdayaan Sosial',
            'uraian' => 'Pelatihan dan pengembangan keterampilan.',
        ],
        [
            'nama' => 'Pendampingan Sosial',
            'uraian' => 'Dukungan dan arahan bagi penerima manfaat.',
        ],
        [
            'nama' => 'Penampungan Sementara (Shelter)',
            'uraian' => 'Tempat tinggal sementara bagi yang membutuhkan.',
        ],
    ];

    $kelompok = [
        [
            'nama' => 'Orang dengan Gangguan Jiwa (ODGJ)',
            'ringkas' => 'Pelayanan dan pendampingan sosial sesuai kondisi serta kebutuhan individu.',
            'uraian' => 'ODGJ adalah orang yang mengalami gangguan pada pikiran, perilaku, dan perasaan yang dapat menimbulkan penderitaan atau hambatan dalam menjalankan aktivitas dan fungsi kehidupannya. Kondisi setiap individu berbeda-beda, sehingga kebutuhan penanganannya perlu dinilai oleh tenaga kesehatan yang kompeten.',
            'dukungan' => [
                'Asesmen dan identifikasi kebutuhan individu.',
                'Pemenuhan kebutuhan dasar dan tempat tinggal sementara.',
                'Koordinasi dengan fasilitas pelayanan kesehatan.',
                'Penelusuran keluarga dan dukungan proses pemulangan apabila memenuhi persyaratan.',
            ],
        ],
        [
            'nama' => 'Wanita Harapan',
            'ringkas' => 'Perlindungan, pendampingan, dan rehabilitasi sosial bagi perempuan yang membutuhkan.',
            'uraian' => 'Wanita Harapan merupakan istilah yang digunakan dalam referensi pelayanan untuk menyebut perempuan yang membutuhkan pelayanan, pendampingan, atau rehabilitasi sosial karena kondisi dan permasalahan sosial yang dihadapinya.',
            'dukungan' => [
                'Identifikasi dan asesmen kebutuhan setiap individu.',
                'Pendampingan dan perlindungan sosial.',
                'Dukungan pemulihan sosial.',
                'Rujukan ke layanan terkait sesuai kebutuhan.',
            ],
        ],
        [
            'nama' => 'Gelandangan dan Pengemis (GEPENG)',
            'ringkas' => 'Identifikasi, pemenuhan kebutuhan dasar, dan pendampingan sosial.',
            'uraian' => 'Gelandangan adalah orang yang tidak memiliki tempat tinggal tetap atau tempat tinggal yang layak. Pengemis adalah orang yang memperoleh penghasilan dengan meminta-minta di tempat umum atau kepada orang lain. Setiap individu dapat memiliki latar belakang dan permasalahan sosial yang berbeda.',
            'dukungan' => [
                'Pendataan dan identifikasi kondisi penerima layanan.',
                'Pemenuhan kebutuhan dasar.',
                'Pendampingan sosial sesuai kebutuhan.',
                'Penelusuran keluarga apabila diperlukan.',
            ],
        ],
        [
            'nama' => 'Lansia Terlantar',
            'ringkas' => 'Dukungan kebutuhan dasar, kesehatan, dan pendampingan bagi lanjut usia.',
            'uraian' => 'Lansia adalah seseorang yang telah mencapai usia 60 tahun atau lebih. Lansia terlantar merupakan lanjut usia yang mengalami kesulitan memenuhi kebutuhan hidup secara layak karena tidak memiliki sumber penghasilan atau dukungan yang memadai, tidak mempunyai keluarga yang dapat merawatnya, atau mengalami penelantaran.',
            'dukungan' => [
                'Bantuan kebutuhan makanan, pakaian, dan tempat tinggal.',
                'Perhatian terhadap kebersihan diri dan kesehatan.',
                'Pemeriksaan awal dan asesmen kebutuhan.',
                'Penelusuran keluarga dan pendampingan sesuai kondisi lansia.',
            ],
        ],
        [
            'nama' => 'Anak Jalanan (ANJAL)',
            'ringkas' => 'Pendampingan dan perlindungan dengan mengutamakan kepentingan anak.',
            'uraian' => 'Anak jalanan adalah anak yang sebagian besar waktunya digunakan untuk mencari nafkah atau melakukan kegiatan di jalanan dan tempat umum lainnya. Anak jalanan memiliki latar belakang yang beragam dan membutuhkan perhatian terhadap keselamatan serta pemenuhan hak-haknya.',
            'dukungan' => [
                'Asesmen kondisi dan kebutuhan anak.',
                'Pemenuhan kebutuhan dasar.',
                'Penelusuran keluarga dengan memperhatikan keselamatan anak.',
                'Penghubungan dengan layanan pendidikan dan perlindungan anak.',
            ],
        ],
        [
            'nama' => 'Orang Terlantar',
            'ringkas' => 'Bantuan awal, identifikasi, serta koordinasi penanganan dan tindak lanjut.',
            'uraian' => 'Orang terlantar adalah individu yang mengalami kondisi tidak terpenuhinya kebutuhan dasar atau kehilangan dukungan yang diperlukan untuk menjalani kehidupan secara layak. Kondisi tersebut dapat terjadi karena kehilangan tempat tinggal, terpisah dari keluarga, kehilangan sumber penghasilan, atau keadaan lainnya.',
            'dukungan' => [
                'Bantuan awal sesuai kebutuhan mendesak.',
                'Identifikasi identitas, asal daerah, dan kondisi kesehatan.',
                'Koordinasi dengan keluarga atau pemerintah daerah asal.',
                'Pemulangan atau penyaluran sesuai hasil asesmen dan prosedur.',
            ],
        ],
    ];
@endphp

<div class="lm-page">

    <!-- HERO -->
    <section class="lm-hero">
        <div class="container">
            <span class="lm-label">PELAYANAN SOSIAL</span>

            <h1>Layanan UPTD PP REHSOS</h1>

            <p>
                Pelayanan dan pendampingan sosial bagi
                masyarakat yang membutuhkan perlindungan,
                pemenuhan kebutuhan dasar, serta
                rehabilitasi sosial.
            </p>

            <a href="#penerima-layanan" class="lm-hero-link">
                Jelajahi Penerima Layanan ↓
            </a>
        </div>
    </section>

    <!-- TENTANG LAYANAN -->
    <section class="lm-section">
        <div class="container lm-about-grid">

            <div class="lm-about-copy">
                <span class="lm-label">TENTANG LAYANAN</span>

                <h2 class="lm-title">
                    Pelayanan Sosial yang Humanis dan Profesional
                </h2>

                <p class="lm-text">
                    UPTD PP REHSOS Kabupaten Sidoarjo memberikan perlindungan
                    dan pelayanan rehabilitasi sosial bagi masyarakat yang
                    membutuhkan dukungan kesejahteraan sosial. Setiap penerima
                    layanan memiliki latar belakang, kondisi, dan kebutuhan
                    yang berbeda sehingga penanganannya perlu disesuaikan
                    melalui identifikasi dan asesmen awal. Pelayanan mencakup
                    penerimaan, pemenuhan kebutuhan dasar, pemantauan kondisi
                    kesehatan, pendampingan sosial, serta tindak lanjut sesuai
                    kewenangan petugas. Seluruh proses diarahkan agar
                    pelayanan berlangsung aman, manusiawi, terkoordinasi,
                    dan berkesinambungan.
                </p>

                <p class="lm-text">
                    Dalam pelaksanaannya, koordinasi antara petugas kesehatan
                    dan pendamping diperlukan untuk memperhatikan kebutuhan
                    penerima layanan secara menyeluruh. Petugas kesehatan
                    melakukan pemeriksaan atau pengamatan awal, pemantauan,
                    pencatatan, dan koordinasi rujukan sesuai kompetensi,
                    sedangkan petugas pendamping membantu aktivitas harian serta
                    memantau perkembangan sosial dan fisik yang relevan.
                    Informasi penting disampaikan kepada petugas terkait
                    dengan tetap menjaga kerahasiaan data pribadi dan kesehatan.
                    Pencatatan, evaluasi, dan serah terima informasi mendukung
                    kesinambungan pelayanan dari satu tahap ke tahap berikutnya.
                </p>
            </div>

            <aside class="lm-about-panel">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 21s-8-4-8-11a4 4 0 0 1 8-1 4 4 0 0 1 8 1c0 7-8 11-8 11Z"/>
                    <path d="M12 11v6M9 14h6"/>
                </svg>

                <h3>
                    Berorientasi pada Kebutuhan
                    Penerima Layanan
                </h3>

                <p class="lm-text">
                    Pelayanan dimulai dengan mengenali kondisi dan kebutuhan
                    penerima layanan secara individual. Identifikasi awal
                    membantu petugas menentukan kebutuhan pendampingan dan
                    perhatian kesehatan sesuai kewenangan. Perubahan kondisi
                    dipantau dan diinformasikan kepada petugas terkait agar
                    dapat ditindaklanjuti. Pendekatan ini menempatkan keselamatan,
                    martabat, dan kesinambungan pelayanan sebagai perhatian utama.
                </p>
            </aside>

        </div>
    </section>

    <!-- LIMA JENIS LAYANAN -->
    <section class="lm-section lm-types">
        <div class="container">
            <span class="lm-label">BENTUK PELAYANAN</span>

            <h2 class="lm-title">Jenis Layanan Sosial</h2>

            <div class="lm-type-list">
                @foreach ($jenisLayanan as $index => $jenis)
                    <article class="lm-type-row">
                        <span>
                            {{ sprintf('%02d', $index + 1) }}
                        </span>

                        <h3>{{ $jenis['nama'] }}</h3>

                        <p>{{ $jenis['uraian'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PELAYANAN KESEHATAN DAN PENDAMPINGAN: BERDASARKAN RANCANGAN SOP -->
    <section class="lm-section lm-sop-section" id="pelayanan-terpadu">
        <div class="container">
            <div class="lm-sop-heading">
                <span class="lm-label">PENDEKATAN PELAYANAN TERPADU</span>
                <h2 class="lm-title">Pelayanan Kesehatan dan Pendampingan Sosial</h2>
                <p class="lm-sop-intro">
                    Dalam rancangan pelayanan terpadu, Divisi Kesehatan dan Divisi
                    Pendamping memiliki peran yang saling melengkapi dalam
                    memperhatikan kebutuhan penerima layanan. Pelayanan kesehatan
                    berfokus pada pengamatan, pemantauan, pencatatan, dan
                    penentuan tindak lanjut sesuai kompetensi petugas. Sementara
                    itu, pendampingan sosial mencakup bantuan aktivitas harian,
                    pengamatan perkembangan, pelaporan, dan serah terima tugas.
                    Koordinasi kedua divisi diperlukan agar informasi penting
                    dapat diteruskan secara tepat dan pelayanan tetap berkesinambungan.
                </p>
            </div>

            <div class="lm-sop-grid">
                <article class="lm-sop-card">
                    <span class="lm-sop-kicker">DIVISI KESEHATAN</span>
                    <h3>Pelayanan dan Pemantauan Kesehatan</h3>
                    <p>
                        Pelayanan kesehatan diawali dengan menerima informasi
                        mengenai kondisi penerima layanan, baik secara langsung
                        maupun melalui petugas pendamping. Petugas kemudian
                        melakukan pengamatan atau pemeriksaan sesuai kompetensi
                        dan kewenangannya untuk menentukan kebutuhan pemantauan,
                        tindakan, atau rujukan. Pelaksanaan pelayanan disertai
                        pencatatan keluhan, hasil temuan, tindakan, waktu
                        pelayanan, serta kebutuhan tindak lanjut. Perkembangan
                        kondisi dipantau dan informasi relevan dikoordinasikan
                        dengan petugas pendamping tanpa mengabaikan kerahasiaan
                        data kesehatan.
                    </p>

                    <button type="button" class="lm-sop-action" data-sop-detail="kesehatan">
                        Lihat 7 tahapan pelayanan kesehatan
                    </button>
                </article>

                <article class="lm-sop-card">
                    <span class="lm-sop-kicker">DIVISI PENDAMPING</span>
                    <h3>Pendampingan dan Pemantauan Penerima Layanan</h3>
                    <p>
                        Pendampingan diarahkan untuk membantu penerima layanan
                        menjalani aktivitas dan memenuhi kebutuhan sehari-hari
                        sesuai kondisi masing-masing. Petugas menerima arahan,
                        mengenali kebutuhan sosial dan pendampingan, kemudian
                        melaksanakan bantuan sesuai tugas serta kewenangannya.
                        Selama pendampingan, perubahan kondisi fisik, perilaku,
                        dan sosial yang relevan dicatat serta dilaporkan kepada
                        petugas terkait. Koordinasi dengan Divisi Kesehatan dan
                        serah terima informasi saat pergantian tugas membantu
                        menjaga kesinambungan pelayanan.
                    </p>

                    <button type="button" class="lm-sop-action" data-sop-detail="pendampingan">
                        Lihat 7 tahapan pendampingan
                    </button>
                </article>
            </div>

            <div class="lm-sop-coordination">
                <h3>Koordinasi, Pencatatan, dan Evaluasi Pelayanan</h3>
                <p>
                    Koordinasi antardivisi diperlukan untuk menyampaikan informasi
                    penting mengenai kondisi dan kebutuhan penerima layanan kepada
                    petugas yang memiliki kewenangan. Pencatatan pelayanan mencakup
                    hasil kegiatan, perkembangan, kendala, dan tindak lanjut yang
                    diperlukan sesuai ketentuan. Serah terima informasi antarpetugas
                    menjadi bagian penting agar pelayanan tidak terputus ketika
                    terjadi pergantian tugas. Evaluasi dilakukan untuk meninjau
                    perkembangan penerima layanan dan kebutuhan penyesuaian
                    pelayanan atau rujukan.
                </p>
                <p>
                    Administrasi pelayanan mendukung pengelolaan register,
                    dokumen, rekapitulasi, dan laporan sesuai kewenangan petugas.
                    Informasi pribadi dan kesehatan penerima layanan harus
                    dikelola dengan memperhatikan kerahasiaan data. Penilaian
                    perkembangan dan koordinasi kasus dilakukan berdasarkan
                    kebutuhan yang ditemukan selama proses pelayanan. Upaya ini
                    diarahkan untuk mendukung ketertiban dokumentasi, kesinambungan
                    pelayanan, serta perbaikan mutu secara berkelanjutan.
                </p>
            </div>

            <p class="lm-sop-note">
                Uraian ini dikembangkan dari rancangan konsep dasar SOP pelayanan
                dan menjadi gambaran umum; pelaksanaannya mengikuti ketentuan resmi
                serta kewenangan petugas di UPTD PP REHSOS.
            </p>
        </div>
    </section>

    <!-- PENERIMA LAYANAN -->
    <section
        class="lm-section lm-recipients"
        id="penerima-layanan"
    >
        <div class="container">

            <div class="lm-centered">
                <span class="lm-label">
                    KELOMPOK PENERIMA LAYANAN
                </span>

                <h2 class="lm-title">
                    Siapa Saja yang Mendapatkan Layanan?
                </h2>

                <p class="lm-text">
                    Pilih salah satu kategori untuk
                    membaca penjelasan dan bentuk
                    dukungan yang dapat diberikan.
                </p>
            </div>

            <div class="lm-cards">

                @foreach ($kelompok as $index => $item)

                    <article class="lm-card">

                        <div class="lm-card-top">

                            <span class="lm-card-icon">
                                <svg viewBox="0 0 24 24"
                                     aria-hidden="true">

                                    @if ($index === 0)
                                        <path d="M12 4c-4-4-10 1-8 6-3 3 0 8 4 8 0 4 4 4 4 1V4Z"/>
                                        <path d="M12 4c4-4 10 1 8 6 3 3 0 8-4 8 0 4-4 4-4 1V4Z"/>
                                        <path d="M12 5v14"/>
                                    @elseif ($index === 1)
                                        <circle cx="12" cy="5" r="2"/>
                                        <path d="M12 9v8M8 12l4-3 4 3M9 21l3-4 3 4"/>
                                    @elseif ($index === 2)
                                        <circle cx="12" cy="4" r="2"/>
                                        <path d="m11 8 4 4-2 4-4 5M10 12l-4 3M13 16l5 5"/>
                                    @elseif ($index === 3)
                                        <circle cx="11" cy="4" r="2"/>
                                        <path d="M11 8v9M7 12l4-4 4 5M7 21l4-4M15 13l2 8M18 12v9"/>
                                    @elseif ($index === 4)
                                        <circle cx="12" cy="5" r="2"/>
                                        <path d="M12 9v8M8 12l4-3 4 3M9 21v-4M15 21v-4"/>
                                    @else
                                        <path d="m2 11 10-7 10 7"/>
                                        <path d="M5 10v11h14V10"/>
                                        <circle cx="12" cy="12" r="2"/>
                                        <path d="M8 20v-3a4 4 0 0 1 8 0v3"/>
                                    @endif

                                </svg>
                            </span>

                            <span class="lm-card-num">
                                {{ sprintf('%02d', $index + 1) }}
                            </span>
                        </div>

                        <h3>{{ $item['nama'] }}</h3>

                        <p>{{ $item['ringkas'] }}</p>

                        <button
                            type="button"
                            class="lm-card-button"
                            data-layanan-detail="{{ $index }}"
                            aria-label="Pelajari lebih lanjut tentang {{ $item['nama'] }}"
                        >
                            Pelajari lebih lanjut →
                        </button>

                    </article>

                @endforeach

            </div>

        </div>
    </section>

    <!-- ALUR PELAYANAN TERPADU: 6 TAHAP BERDASARKAN RANCANGAN SOP -->
    <section class="lm-section" id="alur-pelayanan">
        <div class="container">
            <div class="lm-centered">
                <span class="lm-label">ALUR PELAYANAN</span>
                <h2 class="lm-title">Tahapan Pelayanan Terpadu</h2>
                <p class="lm-text">
                    Enam tahapan pelayanan berikut menggambarkan proses mulai dari
                    penerimaan hingga evaluasi dan tindak lanjut. Pelayanan kesehatan
                    dan pendampingan dapat berlangsung bersamaan sesuai kebutuhan.
                </p>
            </div>

            <div class="lm-steps">
                <article class="lm-step">
                    <span class="lm-step-no">01</span>
                    <h3>Penerimaan</h3>
                    <p>Petugas menerima penerima layanan dan memastikan kebutuhan awal yang perlu diperhatikan.</p>
                </article>
                <article class="lm-step">
                    <span class="lm-step-no">02</span>
                    <h3>Registrasi dan Asesmen Awal</h3>
                    <p>Pencatatan identitas sesuai ketentuan dan identifikasi kondisi serta kebutuhan penerima layanan.</p>
                </article>
                <article class="lm-step">
                    <span class="lm-step-no">03</span>
                    <h3>Identifikasi Kondisi Kesehatan</h3>
                    <p>Menilai apakah terdapat kebutuhan kesehatan yang memerlukan perhatian atau penanganan segera.</p>
                </article>
                <article class="lm-step">
                    <span class="lm-step-no">04</span>
                    <h3>Pelayanan Divisi Terkait</h3>
                    <p>Divisi Kesehatan dan Divisi Pendamping memberikan pelayanan sesuai kebutuhan dan kewenangan; keduanya dapat berlangsung bersamaan.</p>
                </article>
                <article class="lm-step">
                    <span class="lm-step-no">05</span>
                    <h3>Pencatatan dan Koordinasi</h3>
                    <p>Hasil pelayanan dicatat dan informasi penting disampaikan kepada petugas terkait dengan menjaga kerahasiaan data.</p>
                </article>
                <article class="lm-step">
                    <span class="lm-step-no">06</span>
                    <h3>Evaluasi dan Tindak Lanjut</h3>
                    <p>Petugas memantau perkembangan, menentukan penyesuaian pelayanan, dan berkoordinasi mengenai rujukan jika diperlukan.</p>
                </article>
            </div>

            <div class="lm-urgent-note" role="note">
                <strong>Penanganan kondisi darurat:</strong>
                Apabila ditemukan kondisi gawat darurat, petugas segera
                mengaktifkan prosedur penanganan darurat dan menghubungi tenaga
                kesehatan atau layanan kegawatdaruratan yang berwenang.
                Registrasi maupun administrasi tidak boleh menunda pertolongan
                yang diperlukan.
            </div>
        </div>
    </section>

</div>


<!-- POP-UP SOP PELAYANAN -->
<dialog id="sopKesehatanDialog" class="lm-sop-dialog" aria-labelledby="sopKesehatanTitle">
    <div class="lm-sop-modal-content">
        <button class="lm-sop-modal-close" type="button" data-sop-close="kesehatan" aria-label="Tutup detail pelayanan kesehatan">&times;</button>
        <span class="lm-sop-modal-kicker">DIVISI KESEHATAN</span>
        <h2 id="sopKesehatanTitle" class="lm-sop-modal-title">7 Tahapan Pelayanan Kesehatan</h2>
        <p class="lm-sop-modal-text">Tahapan ini menggambarkan alur pelayanan kesehatan mulai dari penerimaan informasi hingga evaluasi perkembangan penerima layanan, sesuai kompetensi dan kewenangan petugas.</p>
        <ol class="lm-sop-steps">
            <li><strong>Penerimaan informasi</strong><p>Menerima informasi awal mengenai kondisi kesehatan dari penerima layanan atau petugas pendamping.</p></li>
            <li><strong>Pemeriksaan awal</strong><p>Melakukan pengamatan atau pemeriksaan sesuai kompetensi dan kewenangan petugas.</p></li>
            <li><strong>Penentuan tindak lanjut</strong><p>Menentukan kebutuhan pemantauan, penanganan sesuai kewenangan, atau rujukan.</p></li>
            <li><strong>Pelaksanaan pelayanan</strong><p>Memberikan pelayanan sesuai standar profesi, prosedur yang berlaku, dan kebutuhan penerima layanan.</p></li>
            <li><strong>Dokumentasi</strong><p>Mencatat keluhan, temuan, tindakan, waktu pelayanan, dan kebutuhan tindak lanjut.</p></li>
            <li><strong>Koordinasi</strong><p>Menyampaikan informasi yang relevan kepada petugas pendamping dengan tetap menjaga kerahasiaan data kesehatan.</p></li>
            <li><strong>Evaluasi</strong><p>Memantau perkembangan dan memastikan tindak lanjut yang diperlukan diperhatikan.</p></li>
        </ol>
        <div class="lm-sop-modal-footer">
            <button type="button" class="lm-sop-modal-done" data-sop-close="kesehatan">Tutup</button>
        </div>
    </div>
</dialog>

<dialog id="sopPendampinganDialog" class="lm-sop-dialog" aria-labelledby="sopPendampinganTitle">
    <div class="lm-sop-modal-content">
        <button class="lm-sop-modal-close" type="button" data-sop-close="pendampingan" aria-label="Tutup detail pendampingan">&times;</button>
        <span class="lm-sop-modal-kicker">DIVISI PENDAMPING</span>
        <h2 id="sopPendampinganTitle" class="lm-sop-modal-title">7 Tahapan Pendampingan</h2>
        <p class="lm-sop-modal-text">Tahapan pendampingan menekankan kesinambungan bantuan harian, pemantauan perkembangan, pelaporan, koordinasi, dan serah terima informasi antarpetugas.</p>
        <ol class="lm-sop-steps">
            <li><strong>Penerimaan tugas</strong><p>Menerima arahan dan informasi awal dari koordinator atau petugas terkait.</p></li>
            <li><strong>Identifikasi kebutuhan</strong><p>Mengenali kebutuhan sehari-hari, kondisi sosial, serta kebutuhan pendampingan penerima layanan.</p></li>
            <li><strong>Pelaksanaan pendampingan</strong><p>Membantu aktivitas dan kebutuhan penerima layanan sesuai tugas serta kewenangan.</p></li>
            <li><strong>Pemantauan</strong><p>Mengamati perubahan kondisi fisik, perilaku, atau sosial yang relevan dengan pelayanan.</p></li>
            <li><strong>Pelaporan</strong><p>Mencatat aktivitas, perkembangan, kendala, dan kejadian penting dalam format yang ditetapkan.</p></li>
            <li><strong>Koordinasi</strong><p>Melaporkan perubahan kondisi kesehatan kepada Divisi Kesehatan serta persoalan lain kepada petugas berwenang.</p></li>
            <li><strong>Serah terima tugas</strong><p>Menyampaikan informasi penting kepada petugas pengganti agar pendampingan terus berlanjut.</p></li>
        </ol>
        <div class="lm-sop-modal-footer">
            <button type="button" class="lm-sop-modal-done" data-sop-close="pendampingan">Tutup</button>
        </div>
    </div>
</dialog>

<!-- POP-UP DETAIL PENERIMA LAYANAN -->

<dialog
    id="layananDetailDialog"
    class="lm-detail-dialog"
    aria-labelledby="layananModalTitle"
    aria-describedby="layananModalDescription"
>
    <div class="lm-modal-content">

        <button
            id="layananModalClose"
            class="lm-modal-close"
            type="button"
            aria-label="Tutup informasi layanan"
        >
            &times;
        </button>

        <span class="lm-modal-kicker">
            KELOMPOK PENERIMA LAYANAN
        </span>

        <h2
            id="layananModalTitle"
            class="lm-modal-title"
        ></h2>

        <p
            id="layananModalDescription"
            class="lm-modal-description"
        ></p>

        <div class="lm-modal-divider"></div>

        <h3 class="lm-modal-subtitle">
            Bentuk dukungan yang dapat diberikan
        </h3>

        <ul
            id="layananModalList"
            class="lm-modal-list"
        ></ul>

        <div class="lm-modal-footer">
            <button
                id="layananModalDone"
                class="lm-modal-done"
                type="button"
            >
                Tutup
            </button>
        </div>

    </div>
</dialog>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const sopDialogs = {
        kesehatan: document.getElementById('sopKesehatanDialog'),
        pendampingan: document.getElementById('sopPendampinganDialog')
    };

    let lastSopTrigger = null;

    document.querySelectorAll('[data-sop-detail]').forEach(function (button) {
        button.addEventListener('click', function () {
            const key = button.getAttribute('data-sop-detail');
            const dialog = sopDialogs[key];
            if (!dialog) return;
            lastSopTrigger = button;
            dialog.showModal();
            const closeBtn = dialog.querySelector('.lm-sop-modal-close');
            if (closeBtn) closeBtn.focus();
        });
    });

    document.querySelectorAll('[data-sop-close]').forEach(function (button) {
        button.addEventListener('click', function () {
            const key = button.getAttribute('data-sop-close');
            const dialog = sopDialogs[key];
            if (dialog) dialog.close();
        });
    });

    Object.values(sopDialogs).forEach(function (dialog) {
        if (!dialog) return;
        dialog.addEventListener('click', function (event) {
            if (event.target === dialog) dialog.close();
        });
        dialog.addEventListener('close', function () {
            if (lastSopTrigger) lastSopTrigger.focus();
        });
    });

    const kelompok = @json($kelompok);

    const dialog = document.getElementById(
        'layananDetailDialog'
    );

    const modalTitle = document.getElementById(
        'layananModalTitle'
    );

    const modalDescription = document.getElementById(
        'layananModalDescription'
    );

    const modalList = document.getElementById(
        'layananModalList'
    );

    const closeButton = document.getElementById(
        'layananModalClose'
    );

    const doneButton = document.getElementById(
        'layananModalDone'
    );

    if (!dialog || !modalTitle || !modalDescription ||
        !modalList || !closeButton || !doneButton) {
        return;
    }

    let lastTrigger = null;

    document.querySelectorAll(
        '[data-layanan-detail]'
    ).forEach(function (button) {

        button.addEventListener('click', function () {

            const index = Number(
                button.getAttribute('data-layanan-detail')
            );

            const item = kelompok[index];

            if (!item) return;

            lastTrigger = button;

            modalTitle.textContent = item.nama;
            modalDescription.textContent = item.uraian;

            modalList.replaceChildren();

            item.dukungan.forEach(function (dukungan) {

                const li = document.createElement('li');
                li.textContent = dukungan;
                modalList.appendChild(li);

            });

            dialog.showModal();
            closeButton.focus();

        });

    });

    closeButton.addEventListener('click', function () {
        dialog.close();
    });

    doneButton.addEventListener('click', function () {
        dialog.close();
    });

    // Klik area gelap di luar kotak untuk menutup
    dialog.addEventListener('click', function (event) {
        if (event.target === dialog) {
            dialog.close();
        }
    });

    // Kembalikan fokus ke tombol pembuka
    dialog.addEventListener('close', function () {
        if (lastTrigger) {
            lastTrigger.focus();
        }
    });

});
</script>
@endpush
