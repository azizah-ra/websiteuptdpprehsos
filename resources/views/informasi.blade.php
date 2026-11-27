@extends('layouts.app')

@section('title', 'Informasi | UPTD PP REHSOS Kabupaten Sidoarjo')

@push('styles')
<style>
.info-page { --im-green:#087e61; --im-dark:#173e30; --im-border:#e2ebe5; --im-muted:#617568; }
.info-page * { box-sizing:border-box; }
.info-page section[id] { scroll-margin-top: 105px; }

.info-page .im-hero {
    background:
        linear-gradient(90deg,rgba(6,39,30,.84),rgba(9,71,54,.67) 52%,rgba(11,83,64,.39)),
        url('{{ asset('images/UPTD.jpeg') }}') center 48% / cover no-repeat;
    color:#fff;
    padding:44px 0 72px;
}
.info-page .im-hero .container { display:block; min-height:0; }
.info-page .im-hero-label { display:block; color:#d3f4e5; font-size:10px; font-weight:800; letter-spacing:1.7px; margin-bottom:13px; }
.info-page .im-hero h1 { max-width:760px; margin:0 0 14px; font:800 clamp(32px,3.7vw,46px)/1.17 Manrope,sans-serif; letter-spacing:-1.3px; color:#fff; }
.info-page .im-hero p { max-width:680px; margin:0 0 21px; font-size:15px; line-height:1.8; color:#eef8f1; }
.info-page .im-hero-link { display:inline-flex; align-items:center; gap:10px; width:max-content; max-width:100%; padding:10px 18px; border:1px solid rgba(255,255,255,.8); border-radius:30px; background:transparent; color:#fff; text-decoration:none; font-size:13px; font-weight:800; transition:background-color .2s ease; }
.info-page .im-hero-link:hover { background:rgba(255,255,255,.13); color:#fff; }

/* Tiga ringkasan di bawah hero */
.info-page .im-highlights { position:relative; z-index:1; display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); margin-top:-32px; background:#fff; border:1px solid var(--im-border); border-radius:16px; box-shadow:0 14px 32px rgba(20,65,45,.08); overflow:hidden; }
.info-page .im-highlight { min-width:0; display:flex; align-items:center; gap:15px; padding:20px 24px; }
.info-page .im-highlight + .im-highlight { border-left:1px solid var(--im-border); }
.info-page .im-highlight-icon { flex:0 0 44px; display:grid; place-items:center; width:44px; height:44px; background:#e4f5ed; border-radius:11px; font:800 13px Manrope,sans-serif; color:var(--im-green); }
.info-page .im-highlight small { display:block; color:#778c80; font-size:11px; }
.info-page .im-highlight strong { display:block; margin:2px 0; color:var(--im-dark); font:800 17px/1.4 Manrope,sans-serif; }
.info-page .im-highlight span { display:block; color:#72877a; font-size:11px; line-height:1.6; }

/* Panduan dua kolom */
.info-page .im-label { display:block; margin-bottom:10px; color:var(--im-green); font-size:10px; font-weight:800; letter-spacing:1.5px; }
.info-page .im-title { margin:0 0 15px; color:var(--im-dark); font:800 clamp(26px,2.7vw,34px)/1.28 Manrope,sans-serif; letter-spacing:-.8px; }
.info-page .im-copy { color:var(--im-muted); font-size:14px; line-height:1.85; margin:0 0 14px; }
.info-page .im-guide { padding:58px 0; }
.info-page .container.im-guide-grid { display:grid; grid-template-columns:minmax(0,1fr) minmax(0,.96fr); gap:42px; align-items:center; }
.info-page .im-guide-action { display:inline-flex; align-items:center; width:max-content; max-width:100%; margin-top:8px; padding:11px 20px; color:#fff; background:var(--im-green); border-radius:26px; font-size:13px; font-weight:800; text-decoration:none; }
.info-page .im-guide-action:hover { background:#08694f; color:#fff; }
.info-page .im-notice { padding:30px; border-radius:18px; background:#e8f6ee; }
.info-page .im-notice-symbol { display:grid; place-items:center; width:46px; height:46px; margin-bottom:17px; border-radius:12px; background:var(--im-green); color:#fff; font:800 24px Manrope,sans-serif; }
.info-page .im-notice h3 { margin:0 0 12px; color:var(--im-dark); font:800 21px/1.4 Manrope,sans-serif; }

/* Timeline prosedur */
.info-page .im-process { padding:55px 0 61px; background:#f3f9f6; }
.info-page .im-process-heading { margin:0 auto 30px; max-width:760px; text-align:center; }
.info-page .im-timeline { position:relative; margin:0 auto; max-width:900px; }
.info-page .im-timeline::before { content:''; position:absolute; left:27px; top:28px; bottom:32px; width:2px; background:#c4e5d5; }
.info-page .im-step { display:grid; position:relative; z-index:1; grid-template-columns:56px minmax(0,1fr); align-items:start; gap:24px; margin-bottom:16px; }
.info-page .im-step:last-child { margin-bottom:0; }
.info-page .im-step-number { display:grid; place-items:center; width:56px; height:56px; border-radius:15px; background:var(--im-green); color:#fff; font:800 16px Manrope,sans-serif; }
.info-page .im-step-content { padding:21px 25px; background:#fff; border:1px solid var(--im-border); border-radius:15px; }
.info-page .im-step-content h3 { margin:0 0 7px; color:var(--im-dark); font:800 17px/1.45 Manrope,sans-serif; }
.info-page .im-step-content p { margin:0; color:var(--im-muted); font-size:13px; line-height:1.8; }

/* Persyaratan: tiga kartu ringkas dan satu pop-up, bukan accordion */
.info-page .section.ri-section { padding:48px 0; background:#f5f9f6; }
.info-page .ri-intro { max-width:800px; margin:0 0 23px; color:#617568; font-size:14px; line-height:1.75; }
.info-page .ri-grid { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:16px; }
.info-page .ri-card { display:flex; flex-direction:column; min-width:0; min-height:178px; padding:22px; border:1px solid #e0ebe4; border-radius:14px; background:#fff; }
.info-page .ri-card-number { display:block; margin-bottom:16px; color:#18865f; font-size:12px; font-weight:800; letter-spacing:1px; }
.info-page .ri-card h3 { margin:0 0 13px; color:#173e30; font:800 16px/1.45 Manrope,sans-serif; }
.info-page .ri-open { align-self:flex-start; margin-top:auto; padding:6px 0; border:0; border-bottom:1px solid #087e61; background:transparent; color:#087e61; font:800 13px/1.5 'DM Sans',sans-serif; cursor:pointer; }
.info-page .ri-open:hover { color:#075c45; }
/* Elemen dialog berada di top layer, tidak mengganggu modal PDF yang sudah ada */
.info-page .ri-dialog { box-sizing:border-box; width:min(650px,calc(100vw - 32px)); max-width:none; max-height:min(85vh,760px); margin:auto; padding:0; border:0; border-radius:17px; background:#fff; color:#173e30; overflow:auto; box-shadow:0 22px 70px rgba(0,0,0,.24); }
.info-page .ri-dialog::backdrop { background:rgba(9,35,26,.65); }
.info-page .ri-dialog-inner { padding:27px 30px 28px; }
.info-page .ri-dialog-top { display:flex; align-items:flex-start; justify-content:space-between; gap:16px; margin-bottom:18px; }
.info-page .ri-dialog-kicker { display:block; margin-bottom:9px; color:#087e61; font-size:10px; font-weight:800; letter-spacing:1.4px; }
.info-page .ri-dialog-title { margin:0; color:#173e30; font:800 clamp(21px,3vw,27px)/1.35 Manrope,sans-serif; }
.info-page .ri-close { flex:0 0 38px; width:38px; height:38px; border:1px solid #dfebe3; border-radius:50%; background:#f5faf6; color:#173e30; font-size:24px; line-height:1; cursor:pointer; }
.info-page .ri-detail-group { padding-top:17px; margin-top:18px; border-top:1px solid #e2ece5; }
.info-page .ri-detail-group h4 { margin:0 0 9px; color:#173e30; font:800 14px/1.5 Manrope,sans-serif; }
.info-page .ri-detail-group ul { margin:0; padding-left:19px; color:#5b7063; font-size:13px; line-height:1.8; }
.info-page .ri-detail-group li { margin:0 0 7px; }
.info-page .ri-dialog-actions { margin-top:20px; text-align:right; }
.info-page .ri-done { padding:10px 21px; border:0; border-radius:26px; background:#087e61; color:#fff; font:800 13px 'DM Sans',sans-serif; cursor:pointer; }
@media(max-width:850px) { .info-page .ri-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
@media(max-width:600px) { .info-page .section.ri-section { padding:38px 0; } .info-page .ri-grid { grid-template-columns:1fr; gap:12px; } .info-page .ri-card { min-height:130px; padding:17px 20px; } .info-page .ri-card-number { margin-bottom:9px; } .info-page .ri-card h3 { margin-bottom:9px; } .info-page .ri-dialog-inner { padding:21px; } }
.info-page .im-contact { padding:47px 0; }

/* Dokumen pemetaan: empat kartu dokumen PDF yang dapat diklik. */
.info-page .maps-information { background:#fff; padding:55px 0 63px; }
.info-page .map-intro { max-width:780px; margin:0; color:var(--im-muted); font-size:14px; line-height:1.8; }
.info-page .map-doc-heading { margin-top:0; }
.info-page .map-doc-subtext { margin:0 0 23px; max-width:710px; color:var(--im-muted); font-size:14px; line-height:1.8; }
.info-page .map-doc-grid {
    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));
    align-items:stretch;
    gap:17px;
}
.info-page a.map-doc {
    display:flex;
    flex-direction:column;
    min-width:0;
    padding:24px 25px;
    border:1px solid #dfebe3;
    border-radius:16px;
    background:#fafdfa;
    color:var(--im-dark);
    text-decoration:none;
    transition:border-color .22s ease, box-shadow .22s ease, transform .22s ease;
}
.info-page a.map-doc:hover,
.info-page a.map-doc:focus-visible {
    border-color:#88cbb0;
    background:#fff;
    box-shadow:0 9px 23px rgba(12,62,41,.08);
    transform:translateY(-2px);
}
.info-page .map-doc-top { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:16px; }
.info-page .map-doc-no { color:#087e61; font:800 12px 'DM Sans',sans-serif; letter-spacing:.5px; }
.info-page .map-doc-type { color:#688276; font-size:11px; font-weight:700; }
.info-page .map-doc h3 { margin:0 0 10px; color:#183e2c; font:800 18px/1.45 Manrope,sans-serif; }
.info-page .map-doc p { margin:0 0 19px; color:#5b7366; font-size:13px; line-height:1.8; }
.info-page .map-doc-action { display:inline-flex; align-items:center; gap:9px; margin-top:auto; padding-top:12px; border-top:1px solid #e3ece6; color:#087e61; font-size:13px; font-weight:800; }
.info-page .map-note { margin-top:24px; padding:17px 20px; border-left:3px solid #16825d; background:#f4f9f5; color:#566e60; font-size:12px; line-height:1.8; }
.info-page .map-note p { margin:0 0 7px; }
.info-page .map-note p:last-child { margin-bottom:0; }
.maps-pdf-dialog { border:0; border-radius:12px; padding:0; width:min(1150px,95vw); height:90vh; max-width:none; max-height:none; overflow:hidden; background:white; color:var(--im-dark,#173b2a); box-shadow:0 20px 70px rgba(0,0,0,.25); }
.maps-pdf-dialog::backdrop { background:rgba(10,29,20,.75); }
.maps-pdf-inner { display:flex; flex-direction:column; height:100%; }
.maps-pdf-header { display:flex; justify-content:space-between; align-items:center; gap:20px; padding:14px 22px; border-bottom:1px solid #e1e9e2; }
.maps-pdf-header h3 { margin:0; font:800 15px/1.5 Manrope,sans-serif; }
.maps-pdf-close { flex:0 0 auto; width:40px; height:40px; border:1px solid #dbe6dd; border-radius:50%; background:#f4f8f4; color:#173b2a; font-size:23px; cursor:pointer; }
.maps-pdf-frame { flex:1; width:100%; min-height:0; border:0; background:#f5f6f5; }

@media(max-width:850px) {
    .info-page .map-doc-grid { grid-template-columns:repeat(2,minmax(0,1fr)); }
    .info-page .im-highlights { grid-template-columns:1fr; }
    .info-page .im-highlight + .im-highlight { border-left:0; border-top:1px solid var(--im-border); }
    .info-page .container.im-guide-grid { grid-template-columns:1fr; gap:23px; }
}
@media(max-width:650px) {
    .info-page .im-hero { padding:35px 0 64px; }
    .info-page .im-hero h1 { font-size:31px; }
    .info-page .im-guide,.info-page .im-process { padding:42px 0; }
    .info-page .im-highlight { padding:14px 18px; }
    .info-page .im-notice { padding:23px; }
    .info-page .im-step { grid-template-columns:42px minmax(0,1fr); gap:12px; }
    .info-page .im-step-number { width:42px; height:42px; border-radius:11px; font-size:13px; }
    .info-page .im-timeline::before { left:20px; }
    .info-page .im-step-content { padding:17px; }
    .info-page .im-step-content h3 { font-size:15px; }
    .info-page .map-doc-grid { grid-template-columns:minmax(0,1fr); gap:12px; }
    .info-page a.map-doc { padding:20px; }
    .maps-pdf-dialog { width:98vw; height:94vh; }
    .maps-pdf-header { padding:12px; }
    .maps-pdf-header h3 { font-size:13px; }
}
@media(prefers-reduced-motion:reduce) {
    .info-page .im-hero-link { transition:none; }
}

/* PENGAYAAN INFORMASI SOP — PARAGRAF RATA KANAN-KIRI */
.info-page .im-guide .im-copy,
.info-page .im-notice .im-copy,
.info-page .im-step-content p,
.info-page .ri-intro,
.info-page a.map-doc p,
.info-page .map-note p,
.info-page .im-sop-guidance-item p {
    text-align: justify;
    text-align-last: left;
    text-justify: inter-word;
    overflow-wrap: break-word;
}

/* Pengantar tahapan tetap rata tengah agar mengikuti judul */
.info-page .im-process-heading .im-copy {
    text-align: center;
    text-align-last: center;
}

.info-page .im-sop-guidance {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
    max-width: 900px;
    margin: 24px auto 0;
}

.info-page .im-sop-guidance-item {
    min-width: 0;
    padding: 22px 24px;
    border: 1px solid #dce9e1;
    border-radius: 15px;
    background: #ffffff;
}

.info-page .im-sop-guidance-label {
    display: block;
    margin-bottom: 9px;
    color: #087e61;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.info-page .im-sop-guidance-item h3 {
    color: #173e30;
    font: 800 16px/1.4 Manrope, sans-serif;
    margin: 0 0 9px;
}

.info-page .im-sop-guidance-item p {
    color: #617568;
    font-size: 13px;
    line-height: 1.8;
    margin: 0;
}

.info-page .im-sop-source-note {
    max-width: 900px;
    margin: 13px auto 0;
    color: #65796e;
    font-size: 11.5px;
    line-height: 1.7;
}

@media (max-width: 650px) {
    .info-page .im-sop-guidance { grid-template-columns: 1fr; gap: 12px; }
    .info-page .im-sop-guidance-item { padding: 18px 20px; }
    .info-page .im-step { margin-bottom: 12px; }
}

</style>
@endpush

@section('content')
<div class="info-page">
    <section class="im-hero">
        <div class="container">
            <span class="im-hero-label">PUSAT INFORMASI</span>
            <h1>Informasi Pelayanan Sosial</h1>
            <p>Ketahui prosedur, persyaratan, tahapan pelayanan, serta informasi penting sebelum mengakses layanan UPTD PP REHSOS Kabupaten Sidoarjo.</p>
            <a class="im-hero-link" href="#prosedur-pelayanan">Lihat Prosedur ↓</a>
        </div>
    </section>

    <div class="container">
        <div class="im-highlights" aria-label="Ringkasan proses pelayanan">
            <div class="im-highlight"><div class="im-highlight-icon">01</div><div><small>Langkah Awal</small><strong>Penerimaan</strong><span>Identifikasi kebutuhan awal</span></div></div>
            <div class="im-highlight"><div class="im-highlight-icon">02</div><div><small>Penilaian Kebutuhan</small><strong>Asesmen</strong><span>Kondisi sosial dan kesehatan</span></div></div>
            <div class="im-highlight"><div class="im-highlight-icon">03</div><div><small>Pelayanan dan Evaluasi</small><strong>Pendampingan</strong><span>Koordinasi dan tindak lanjut</span></div></div>
        </div>
    </div>

    <!-- PANDUAN MASYARAKAT -->
    <section class="im-guide">
        <div class="container im-guide-grid">
            <div>
                <span class="im-label">PANDUAN MASYARAKAT</span>
                <h2 class="im-title">Bagaimana Cara Mengakses Pelayanan?</h2>
                <p class="im-copy">
                    Pelayanan di UPTD PP REHSOS Kabupaten Sidoarjo diawali dengan
                    penerimaan dan identifikasi kondisi penerima layanan agar petugas
                    memahami kebutuhan yang harus diperhatikan. Informasi awal,
                    identitas yang tersedia, serta kondisi sosial dan kesehatan
                    digunakan sebagai bahan asesmen sesuai ketentuan. Berdasarkan
                    hasil identifikasi tersebut, petugas menentukan kebutuhan
                    pelayanan kesehatan, pendampingan, atau koordinasi dengan pihak
                    terkait. Setiap tahapan diarahkan untuk mendukung pelayanan
                    yang aman, manusiawi, dan berkesinambungan.
                </p>
                <p class="im-copy">
                    Proses penerimaan dapat melibatkan pihak yang melakukan
                    penyerahan atau pendampingan, antara lain instansi terkait,
                    aparat setempat, maupun keluarga sesuai kondisi kasus.
                    Kelengkapan dokumen dapat berbeda bergantung pada keadaan
                    penerima layanan dan jenis penanganan yang diperlukan.
                    Petugas melakukan verifikasi serta asesmen sebelum menentukan
                    tindak lanjut yang sesuai. Masyarakat dapat menghubungi
                    petugas untuk memperoleh informasi mengenai persyaratan
                    dan proses penyerahan sebelum datang.
                </p>
                <a href="#prosedur-pelayanan" class="im-guide-action">Pelajari Prosedur →</a>
            </div>
            <aside class="im-notice">
                <span class="im-notice-symbol" aria-hidden="true">i</span>
                <h3>Perlu Diperhatikan</h3>
                <p class="im-copy">
                    Penanganan penerima layanan disesuaikan dengan hasil asesmen,
                    kebutuhan individu, dan kewenangan petugas. Pelayanan dapat
                    melibatkan Divisi Kesehatan dan Divisi Pendamping secara
                    bersamaan jika kondisi penerima layanan memerlukannya.
                </p>
                <p class="im-copy">
                    Informasi pribadi dan kesehatan hanya disampaikan kepada
                    petugas terkait sesuai kepentingan pelayanan. Apabila terdapat
                    kondisi gawat darurat, pertolongan yang diperlukan harus
                    diprioritaskan dan tidak boleh tertunda karena administrasi.
                </p>
            </aside>
        </div>
    </section>

    <!-- ALUR PELAYANAN TERPADU: 6 TAHAP BERDASARKAN RANCANGAN SOP -->
    <section class="im-process" id="prosedur-pelayanan">
        <div class="container">
            <div class="im-process-heading">
                <span class="im-label">PROSEDUR PELAYANAN</span>
                <h2 class="im-title">Enam Tahapan Pelayanan Terpadu</h2>
                <p class="im-copy">
                    Alur berikut memberikan gambaran proses pelayanan, mulai dari
                    penerimaan, asesmen, dan penanganan sesuai kebutuhan hingga
                    pencatatan, evaluasi, serta tindak lanjut penerima layanan.
                </p>
            </div>
            <div class="im-timeline">
                <article class="im-step">
                    <span class="im-step-number">01</span>
                    <div class="im-step-content">
                        <h3>Penerimaan dan Penyerahan Penerima Layanan</h3>
                        <p>
                            Petugas menerima penerima layanan dan mengidentifikasi
                            kebutuhan awal yang perlu diperhatikan. Penyerahan dapat
                            dilakukan oleh pihak terkait sesuai kondisi kasus,
                            disertai informasi atau dokumen pendukung yang tersedia.
                            Petugas mencermati kondisi awal untuk mengetahui apakah
                            terdapat kebutuhan yang harus segera ditangani.
                        </p>
                    </div>
                </article>
                <article class="im-step">
                    <span class="im-step-number">02</span>
                    <div class="im-step-content">
                        <h3>Registrasi dan Asesmen Awal</h3>
                        <p>
                            Petugas melakukan pencatatan identitas sesuai ketentuan,
                            memeriksa informasi yang tersedia, dan mengidentifikasi
                            kebutuhan penerima layanan. Asesmen awal membantu
                            memahami kondisi sosial, kebutuhan sehari-hari, serta
                            bentuk pendampingan yang diperlukan. Hasilnya menjadi
                            dasar koordinasi untuk menentukan pelayanan selanjutnya.
                        </p>
                    </div>
                </article>
                <article class="im-step">
                    <span class="im-step-number">03</span>
                    <div class="im-step-content">
                        <h3>Identifikasi Kondisi Kesehatan</h3>
                        <p>
                            Petugas yang berwenang mengamati atau memeriksa kondisi
                            kesehatan awal sesuai kompetensi dan tugasnya. Tahap ini
                            bertujuan mengetahui kebutuhan pemantauan, penanganan
                            sesuai kewenangan, atau kemungkinan rujukan ke layanan
                            kesehatan. Kondisi yang membutuhkan pertolongan segera
                            harus diprioritaskan tanpa menunggu proses administrasi.
                        </p>
                    </div>
                </article>
                <article class="im-step">
                    <span class="im-step-number">04</span>
                    <div class="im-step-content">
                        <h3>Pelayanan Kesehatan dan Pendampingan</h3>
                        <p>
                            Divisi Kesehatan melaksanakan pelayanan dan pemantauan
                            sesuai kompetensi, sedangkan Divisi Pendamping membantu
                            kebutuhan serta aktivitas harian penerima layanan.
                            Kedua bentuk pelayanan dapat dilakukan bersamaan sesuai
                            hasil identifikasi dan perkembangan kondisi individu.
                            Setiap petugas menjalankan pelayanan sesuai tugas dan
                            kewenangannya.
                        </p>
                    </div>
                </article>
                <article class="im-step">
                    <span class="im-step-number">05</span>
                    <div class="im-step-content">
                        <h3>Pencatatan dan Koordinasi Antarpetugas</h3>
                        <p>
                            Hasil pelayanan, perkembangan kondisi, kendala, dan
                            tindak lanjut yang diperlukan dicatat sebagai bagian
                            dari dokumentasi. Informasi penting disampaikan kepada
                            petugas terkait agar kebutuhan penerima layanan dapat
                            ditangani secara berkesinambungan. Koordinasi dan serah
                            terima informasi dilakukan dengan tetap memperhatikan
                            kerahasiaan data pribadi dan kesehatan.
                        </p>
                    </div>
                </article>
                <article class="im-step">
                    <span class="im-step-number">06</span>
                    <div class="im-step-content">
                        <h3>Evaluasi dan Tindak Lanjut</h3>
                        <p>
                            Petugas meninjau perkembangan penerima layanan untuk
                            menentukan kebutuhan pemantauan atau penyesuaian bentuk
                            pelayanan. Jika diperlukan, tindak lanjut dapat berupa
                            koordinasi rujukan kepada pihak yang berwenang maupun
                            proses pemulangan berdasarkan hasil asesmen dan
                            ketentuan yang berlaku. Evaluasi membantu memastikan
                            pelayanan tetap sesuai kebutuhan penerima layanan.
                        </p>
                    </div>
                </article>
            </div>

            <div class="im-sop-guidance" aria-label="Ketentuan penting pelayanan">
                <article class="im-sop-guidance-item">
                    <span class="im-sop-guidance-label">PRIORITAS KESELAMATAN</span>
                    <h3>Penanganan Kondisi Darurat</h3>
                    <p>
                        Apabila terdapat kondisi gawat darurat, petugas harus segera
                        menjalankan prosedur penanganan darurat dan menghubungi
                        tenaga kesehatan atau layanan kegawatdaruratan yang
                        berwenang. Pencatatan dan administrasi tidak boleh menunda
                        pertolongan yang diperlukan oleh penerima layanan.
                    </p>
                </article>
                <article class="im-sop-guidance-item">
                    <span class="im-sop-guidance-label">KESINAMBUNGAN PELAYANAN</span>
                    <h3>Koordinasi dan Kerahasiaan Informasi</h3>
                    <p>
                        Informasi mengenai kebutuhan, perkembangan, dan tindak
                        lanjut penerima layanan disampaikan kepada petugas terkait
                        sesuai kewenangan. Setiap proses pencatatan, koordinasi,
                        dan serah terima tugas perlu menjaga kerahasiaan data
                        pribadi serta kesehatan penerima layanan.
                    </p>
                </article>
            </div>
            <p class="im-sop-source-note">
                Alur ini disusun sebagai gambaran pelayanan berdasarkan rancangan
                konsep dasar SOP; penerapannya mengikuti ketentuan resmi instansi.
            </p>
        </div>
    </section>

    {{-- Bagian persyaratan: tiga kartu ringkas dengan detail dalam pop-up --}}
    @php
        $persyaratan = [
            [
                'nama' => 'Pelayanan ODGJ',
                'grup' => [
                    'Penerimaan dan pendampingan' => [
                        'Surat pengantar atau dokumen penyerahan dari pihak terkait.',
                        'KTP dan KK penerima layanan atau keluarga, jika tersedia.',
                        'BPJS atau KIS, jika tersedia.',
                        'Identitas penanggung jawab dan dokumen perjanjian pelayanan sesuai kebutuhan.',
                    ],
                    'Pemulangan' => [
                        'Hasil asesmen dan penelusuran petugas.',
                        'Dokumen identitas atau hasil pemeriksaan biometrik.',
                        'Surat keluar rumah sakit apabila diperlukan sesuai kasus.',
                    ],
                ],
            ],
            [
                'nama' => 'Pelayanan Lansia Terlantar',
                'grup' => [
                    'Penerimaan dan pendampingan' => [
                        'Surat pengantar atau dokumen penyerahan dari pihak terkait.',
                        'KTP/KK penerima layanan atau keluarga jika tersedia.',
                        'BPJS/KIS dan dokumen pendukung jika tersedia.',
                        'Informasi kondisi keterlantaran serta penanggung jawab apabila ada.',
                    ],
                    'Pemulangan' => [
                        'Hasil asesmen dan penelusuran petugas.',
                        'Dokumen identitas atau dokumen pengganti yang dipersyaratkan.',
                    ],
                ],
            ],
            [
                'nama' => 'Pelayanan Gelandangan, Pengemis, dan Anak Jalanan',
                'grup' => [
                    'Penerimaan dan pendampingan' => [
                        'Dokumen penyerahan dari pihak terkait.',
                        'Dokumen identitas, jika tersedia.',
                        'BPJS/KIS, jika tersedia.',
                        'Asesmen untuk menentukan kebutuhan pelayanan sementara.',
                    ],
                    'Pemulangan' => [
                        'Hasil asesmen dan penelusuran petugas.',
                        'Dokumen identitas atau dokumen pendukung lainnya.',
                    ],
                ],
            ],
        ];
    @endphp

    <section class="section ri-section" id="persyaratan">
        <div class="container">
            <span class="eyebrow">PERSYARATAN PELAYANAN</span>
            <h2 class="heading">Dokumen yang Diperlukan</h2>
            <p class="ri-intro">
                Pilih kategori pelayanan untuk melihat dokumen penerimaan,
                pendampingan, dan pemulangan. Kelengkapan dokumen dapat
                disesuaikan dengan kondisi serta hasil asesmen.
            </p>

            <div class="ri-grid">
                @foreach($persyaratan as $i => $item)
                    <article class="ri-card">
                        <span class="ri-card-number">{{ sprintf('%02d', $i + 1) }}</span>
                        <h3>{{ $item['nama'] }}</h3>
                        <button type="button" class="ri-open"
                                data-ri-template="ri-detail-{{ $i }}"
                                aria-haspopup="dialog"
                                aria-label="Lihat persyaratan {{ $item['nama'] }}">
                            Lihat Persyaratan →
                        </button>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Konten setiap pop-up dipersiapkan sebagai HTML agar seluruh detail asli tetap ada. --}}
    @foreach($persyaratan as $i => $item)
        <template id="ri-detail-{{ $i }}">
            @foreach($item['grup'] as $judul => $daftar)
                <div class="ri-detail-group">
                    <h4>{{ $judul }}</h4>
                    <ul>
                        @foreach($daftar as $dokumen)
                            <li>{{ $dokumen }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </template>
    @endforeach

    <dialog id="riDialog" class="ri-dialog"
            aria-labelledby="riDialogTitle">
        <div class="ri-dialog-inner">
            <div class="ri-dialog-top">
                <div>
                    <span class="ri-dialog-kicker">RINCIAN PERSYARATAN</span>
                    <h2 id="riDialogTitle" class="ri-dialog-title">Dokumen Pelayanan</h2>
                </div>
                <button type="button" id="riClose" class="ri-close" aria-label="Tutup persyaratan">&times;</button>
            </div>
            <div id="riDialogBody"></div>
            <div class="ri-dialog-actions">
                <button type="button" id="riDone" class="ri-done">Selesai</button>
            </div>
        </div>
    </dialog>

    <section class="maps-information" id="peta-persebaran">

    <div class="container">

        <span class="eyebrow">DOKUMEN PEMETAAN</span>
        <h2 class="heading map-doc-heading">Jelajahi Dokumen Peta</h2>

        @php

            $dokumenPeta = [

                [

                    'judul' => 'Persebaran PMKS per Kabupaten/Kota',

                    'file' => 'peta-kabupaten.pdf',

                    'deskripsi' => 'Peta dominasi kategori PMKS berdasarkan daerah asal klien dari enam kabupaten/kota pada periode Juni–Oktober 2026.'

                ],

                [

                    'judul' => 'Persebaran PMKS per Kecamatan',

                    'file' => 'peta-kecamatan.pdf',

                    'deskripsi' => 'Peta dominasi kategori PMKS di kecamatan-kecamatan Kabupaten Sidoarjo berdasarkan 150 klien yang tercatat.'

                ],

                [

                    'judul' => 'Lokasi Penemuan Klien PPKS di Jawa Timur',

                    'file' => 'peta-jawa-timur.pdf',

                    'deskripsi' => 'Peta sebaran lokasi penemuan klien PPKS yang dievakuasi UPTD PP REHSOS menurut kabupaten/kota, periode Juni–Oktober 2026.'

                ],

                [

                    'judul' => 'Lokasi Penemuan Klien PPKS di Sidoarjo',

                    'file' => 'peta-sidoarjo.pdf',

                    'deskripsi' => 'Peta jumlah klien PPKS yang ditemukan dan dievakuasi berdasarkan kecamatan di Kabupaten Sidoarjo.'

                ],

            ];

        @endphp

        <!-- KARTU PETA: SELURUH KARTU DAPAT MEMBUKA POP-UP PDF -->
        <div class="map-doc-grid">
            @foreach ($dokumenPeta as $nomor => $peta)
                <a
                    class="map-doc"
                    href="{{ asset('dokumen/' . $peta['file']) }}"
                    data-map-preview
                    data-map-title="{{ $peta['judul'] }}"
                    aria-label="Baca dokumen {{ $peta['judul'] }} dalam pop-up"
                >
                    <div class="map-doc-top">
                        <span class="map-doc-no">{{ sprintf('%02d', $nomor + 1) }}</span>
                        <span class="map-doc-type">PDF · PETA PERSEBARAN</span>
                    </div>
                    <h3>{{ $peta['judul'] }}</h3>
                    <p>{{ $peta['deskripsi'] }}</p>
                    <span class="map-doc-action">Lihat peta <span aria-hidden="true">↗</span></span>
                </a>
            @endforeach
        </div>

        <div class="map-note">
            <p>
                <strong>Catatan sumber:</strong> Peta disusun menggunakan data klien
                periode Juni–Oktober 2026 dan tercantum sebagai karya pemetaan
                mahasiswa Universitas Negeri Surabaya.
            </p>
            <p>
                Data ini menggambarkan klien yang tercatat dalam dokumen, bukan
                seluruh populasi PPKS. Istilah PMKS dan PPKS mengikuti penamaan
                yang digunakan dalam masing-masing dokumen.
            </p>
        </div>

    </div>

</section>

    <section class="section soft im-contact">
    <div class="container">
        <span class="eyebrow">INFORMASI LEBIH LANJUT</span>
        <h2 class="heading">Masih memiliki pertanyaan?</h2>
        <p class="lead">Hubungi petugas untuk mengetahui informasi pelayanan sesuai kebutuhan.</p>
        <a href="{{ route('kontak') }}" class="button">Hubungi Kami ↗</a>
    </div>
</section>
</div>

<dialog

    id="mapPdfDialog"

    class="maps-pdf-dialog"

    aria-labelledby="mapPdfTitle"

>

    <div class="maps-pdf-inner">

        <div class="maps-pdf-header">

            <h3 id="mapPdfTitle">

                Dokumen Peta Persebaran

            </h3>

            <button

                id="mapPdfClose"

                class="maps-pdf-close"

                type="button"

                aria-label="Tutup dokumen"

            >

                &times;

            </button>

        </div>

        <iframe

            id="mapPdfFrame"

            class="maps-pdf-frame"

            title="Pratinjau dokumen peta PDF"

        ></iframe>

    </div>

</dialog>
@endsection

@push('scripts')
<script>

document.addEventListener('DOMContentLoaded', function () {

    const dialog = document.getElementById('mapPdfDialog');

    const frame = document.getElementById('mapPdfFrame');

    const title = document.getElementById('mapPdfTitle');

    const closeButton = document.getElementById('mapPdfClose');

    if (!dialog || !frame || !title || !closeButton) {

        return;

    }

    if (typeof dialog.showModal !== 'function') {

        return;

    }

    const links = document.querySelectorAll(

        '[data-map-preview]'

    );

    let lastMapTrigger = null;

    links.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            lastMapTrigger = link;
            title.textContent = link.getAttribute('data-map-title') || 'Dokumen Peta Persebaran';
            frame.src = link.href;
            dialog.showModal();
            closeButton.focus();
        });
    });

    closeButton.addEventListener('click', function () {
        dialog.close();
    });

    dialog.addEventListener('click', function (event) {
        const rect = dialog.getBoundingClientRect();
        if (event.target === dialog &&
            (event.clientX < rect.left || event.clientX > rect.right ||
             event.clientY < rect.top || event.clientY > rect.bottom)) {
            dialog.close();
        }
    });

    dialog.addEventListener('close', function () {
        frame.removeAttribute('src');
        if (lastMapTrigger) lastMapTrigger.focus();
    });

});

</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dialog = document.getElementById('riDialog');
    const title = document.getElementById('riDialogTitle');
    const body = document.getElementById('riDialogBody');
    const close = document.getElementById('riClose');
    const done = document.getElementById('riDone');
    if (!dialog || !title || !body || !close || !done) return;

    let opener = null;
    document.querySelectorAll('[data-ri-template]').forEach(function (button) {
        button.addEventListener('click', function () {
            const template = document.getElementById(button.dataset.riTemplate);
            if (!template || typeof dialog.showModal !== 'function') return;
            opener = button;
            title.textContent = button.closest('.ri-card').querySelector('h3').textContent;
            body.replaceChildren(template.content.cloneNode(true));
            dialog.showModal();
            close.focus();
        });
    });
    close.addEventListener('click', function () { dialog.close(); });
    done.addEventListener('click', function () { dialog.close(); });
    dialog.addEventListener('click', function (event) {
        // Tutup hanya jika klik terjadi pada area backdrop di luar kotak dialog.
        const rect = dialog.getBoundingClientRect();
        if (event.target === dialog &&
           (event.clientX < rect.left || event.clientX > rect.right ||
            event.clientY < rect.top || event.clientY > rect.bottom)) {
            dialog.close();
        }
    });
    dialog.addEventListener('close', function () {
        if (opener) opener.focus();
    });
});
</script>
@endpush
