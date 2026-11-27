@extends('layouts.app')

@section('title', 'Fasilitas dan Kegiatan | UPTD PP REHSOS Kabupaten Sidoarjo')

@php
$fasilitas = [
        [
            'judul' => 'Ruang Pelayanan',
            'kategori' => 'Pelayanan',
            'ringkas' => 'Tempat penerimaan, administrasi, dan koordinasi pelayanan.',
            'detail' => 'Ruang pelayanan menunjang proses penerimaan, penyampaian informasi, pencatatan administrasi, dan koordinasi awal bagi penerima layanan. Melalui sarana ini, informasi mengenai kondisi serta kebutuhan awal dapat dicatat dan diteruskan kepada petugas terkait. Penggunaannya mendukung alur pelayanan yang terarah dan terdokumentasi.',
        ],
        [
            'judul' => 'Tempat Istirahat Sementara',
            'kategori' => 'Kebutuhan Dasar',
            'ringkas' => 'Sarana istirahat atau tinggal sementara selama proses pelayanan.',
            'detail' => 'Tempat istirahat sementara mendukung kebutuhan akomodasi penerima layanan selama menjalani proses perlindungan dan pendampingan sosial. Penggunaan sarana disesuaikan dengan kondisi, kebutuhan, serta pengaturan pelayanan yang berlaku di lingkungan UPTD. Lingkungan istirahat yang layak menjadi bagian dari pemenuhan kebutuhan dasar penerima layanan.',
        ],
        [
            'judul' => 'Ruang Makan',
            'kategori' => 'Kebutuhan Dasar',
            'ringkas' => 'Mendukung pemenuhan kebutuhan makan sehari-hari.',
            'detail' => 'Sarana makan mendukung pemenuhan kebutuhan pangan sehari-hari selama penerima layanan berada dalam pendampingan UPTD. Pengaturan kegiatan makan dapat disesuaikan dengan kondisi individu, kebutuhan pelayanan, dan ketentuan operasional yang berlaku. Pemenuhan kebutuhan makan merupakan salah satu unsur penting dalam perlindungan sosial.',
        ],
        [
            'judul' => 'Kamar Mandi',
            'kategori' => 'Sanitasi',
            'ringkas' => 'Fasilitas sanitasi dan kebersihan diri penerima manfaat.',
            'detail' => 'Kamar mandi dan sarana sanitasi menunjang kebutuhan kebersihan diri serta kegiatan sehari-hari penerima layanan. Kebersihan lingkungan menjadi salah satu aspek yang perlu diperhatikan untuk mendukung kenyamanan dan kondisi kesehatan selama pelayanan. Penggunaannya disesuaikan dengan kebutuhan serta kemampuan masing-masing individu.',
        ],
        [
            'judul' => 'Fasilitas Kesehatan',
            'kategori' => 'Kesehatan',
            'ringkas' => 'Menunjang pemeriksaan dan penanganan kesehatan.',
            'detail' => 'Sarana pendukung kesehatan dimanfaatkan untuk membantu pengamatan dan pemeriksaan awal sesuai kompetensi serta kewenangan petugas. Pemantauan kondisi dan pencatatan hasil menjadi bagian dari kesinambungan informasi pelayanan. Jika kondisi penerima layanan memerlukan penanganan lebih lanjut, petugas dapat melakukan koordinasi dan rujukan kepada layanan kesehatan yang berwenang.',
        ],
        [
            'judul' => 'Sarana Kegiatan dan Pembinaan',
            'kategori' => 'Pembinaan',
            'ringkas' => 'Ruang dan sarana pendukung kegiatan sosial serta pendampingan.',
            'detail' => 'Sarana kegiatan menunjang aktivitas sosial, pendampingan, pembinaan, dan pengembangan kemampuan penerima layanan sesuai kondisi masing-masing. Kegiatan dapat membantu penerima layanan menjalani aktivitas yang terarah selama memperoleh pelayanan sosial. Pelaksanaan dan intensitas kegiatan menyesuaikan kebutuhan individu serta pendampingan petugas.',
        ],
        [
            'judul' => 'Pengantaran dan Pendampingan',
            'kategori' => 'Pendampingan',
            'ringkas' => 'Dukungan mobilitas untuk layanan atau kontrol kesehatan.',
            'detail' => 'Pengantaran dan pendampingan merupakan dukungan mobilitas bagi penerima layanan yang memerlukan pemeriksaan kesehatan, rujukan, atau tindak lanjut lainnya. Petugas membantu koordinasi dengan pihak terkait sesuai kebutuhan serta kewenangannya. Pelaksanaan pengantaran memperhatikan kondisi penerima layanan dan hasil asesmen yang tersedia.',
        ],
    ];
    $kegiatan = [
        [
            'judul' => 'Senam Pagi',
            'uraian' => 'Senam pagi menjadi salah satu bentuk aktivitas fisik yang dapat mendukung kebugaran, kebersamaan, dan rutinitas positif. Pelaksanaannya disesuaikan dengan kemampuan serta kondisi kesehatan penerima layanan.',
        ],
        [
            'judul' => 'Kebersihan Lingkungan',
            'uraian' => 'Kegiatan menjaga kebersihan bertujuan mendukung lingkungan pelayanan yang nyaman dan tertata. Keterlibatan penerima layanan, apabila sesuai dengan kondisi dan kemampuannya, dilakukan melalui pendampingan petugas.',
        ],
        [
            'judul' => 'Pemenuhan Kebutuhan Sehari-hari',
            'uraian' => 'Pemenuhan kebutuhan sehari-hari mencakup dukungan terhadap makan, kebersihan diri, istirahat, dan aktivitas dasar lainnya. Petugas memberikan bantuan atau pendampingan sesuai kebutuhan setiap penerima layanan.',
        ],
        [
            'judul' => 'Kegiatan Sosial dan Pembinaan',
            'uraian' => 'Kegiatan sosial dan pembinaan diarahkan untuk memberikan ruang interaksi, pendampingan, dan dukungan pengembangan diri. Bentuk kegiatan menyesuaikan kebutuhan, kemampuan, serta kondisi sosial penerima layanan.',
        ],
        [
            'judul' => 'Peringatan Hari Besar Nasional',
            'uraian' => 'Peringatan hari besar nasional dapat menjadi sarana membangun suasana kebersamaan dan partisipasi di lingkungan UPTD. Pelaksanaannya mempertimbangkan kondisi serta keterlibatan penerima layanan.',
        ],
        [
            'judul' => 'Penjemputan dan Pemulangan',
            'uraian' => 'Kegiatan penjemputan dan pemulangan dilakukan melalui koordinasi dengan keluarga atau pihak terkait berdasarkan kebutuhan serta hasil asesmen. Pertukaran informasi dan tindak lanjut dilakukan sesuai ketentuan agar proses pelayanan tetap terarah.',
        ],
    ];
@endphp

@push('styles')
<style>
/* Halaman Fasilitas — warna dan tipografi konsisten dengan website */
.fac-page {
    --fac-dark: #173d2f;
    --fac-green: #087e61;
    --fac-muted: #607568;
    --fac-border: #dfebe4;
    --fac-soft: #f3f9f6;
    color: var(--fac-dark);
}
.fac-page *, .fac-page *::before, .fac-page *::after { box-sizing: border-box; }
.fac-page section[id] { scroll-margin-top: 95px; }
.fac-page .fac-section { padding: 48px 0; }
.fac-page .fac-soft { background: var(--fac-soft); }
.fac-page .fac-label {
    display: block; margin: 0 0 10px; color: var(--fac-green);
    font-size: 10px; font-weight: 800; letter-spacing: 1.5px;
}
.fac-page .fac-title {
    margin: 0 0 14px; color: var(--fac-dark);
    font: 800 clamp(26px,2.6vw,34px)/1.27 Manrope,sans-serif;
    letter-spacing: -.8px;
}
.fac-page .fac-copy,
.fac-page .fac-card p,
.fac-page .fac-activity p,
.fac-page .fac-note {
    color: var(--fac-muted);
    font-size: 14px;
    line-height: 1.85;
    text-align: justify;
    text-align-last: left;
    text-justify: inter-word;
    overflow-wrap: break-word;
}
.fac-page .fac-copy { margin: 0 0 14px; }
.fac-page .fac-copy:last-child { margin-bottom: 0; }

/* Hero foto — tidak memengaruhi intro logo/navbar */
.fac-page .fac-hero {
    background:
        linear-gradient(90deg,rgba(7,42,32,.86),rgba(9,62,47,.70) 54%,rgba(10,75,56,.30)),
        url('{{ asset('images/UPTD.jpeg') }}') center 48% / cover no-repeat;
    padding: 43px 0 47px; color: #fff;
}
.fac-page .fac-hero .container { min-height: 0; display: block; }
.fac-page .fac-hero-tag {
    display: block; margin-bottom: 12px; color: #d6f5e6;
    font-size: 10px; font-weight: 800; letter-spacing: 1.6px;
}
.fac-page .fac-hero h1 {
    max-width: 800px; margin: 0 0 14px; color: #fff;
    font: 800 clamp(31px,3.5vw,45px)/1.2 Manrope,sans-serif;
    letter-spacing: -1.2px;
}
.fac-page .fac-hero p {
    max-width: 690px; margin: 0 0 20px;
    font-size: 14px; line-height: 1.8; color: #e9f7ef;
}
.fac-page .fac-hero-link {
    display: inline-flex; align-items: center; width: fit-content;
    max-width: 100%; padding: 10px 18px;
    border: 1px solid rgba(255,255,255,.85); border-radius: 999px;
    background: transparent; color: #fff; font-size: 13px;
    font-weight: 750; text-decoration: none;
    transition: background .2s ease;
}
.fac-page .fac-hero-link:hover,
.fac-page .fac-hero-link:focus-visible { background: rgba(255,255,255,.15); color: #fff; }

/* Pengantar dua kolom */
.fac-page .container.fac-intro-grid {
    display: grid;
    grid-template-columns: minmax(0,1.05fr) minmax(0,.95fr);
    gap: 38px; align-items: center;
}
.fac-page .fac-intro-grid > * { min-width: 0; }
.fac-page .fac-feature { border-radius: 16px; padding: 27px 29px; background: #e7f5ed; }
.fac-page .fac-feature-mark {
    display: inline-grid; place-items: center; width: 42px; height: 42px;
    margin: 0 0 16px; border-radius: 12px;
    background: var(--fac-green); color: #fff;
    font: 800 20px/1 Manrope,sans-serif;
}
.fac-page .fac-feature h3 {
    margin: 0 0 12px; color: var(--fac-dark);
    font: 800 20px/1.4 Manrope,sans-serif;
}

/* Kartu fasilitas/kegiatan */
.fac-page .fac-center { max-width: 790px; margin: 0 auto 26px; text-align: center; }
.fac-page .fac-center .fac-title { margin-left: auto; margin-right: auto; }
.fac-page .fac-center .fac-copy { text-align: center; text-align-last: center; }
.fac-page .fac-grid {
    display: grid; grid-template-columns: repeat(3,minmax(0,1fr));
    gap: 17px;
}
.fac-page .fac-card, .fac-page .fac-activity {
    min-width: 0; border: 1px solid var(--fac-border);
    background: #fff; border-radius: 15px;
}
.fac-page .fac-card {
    padding: 22px 23px; transition: border-color .2s ease, transform .2s ease;
}
.fac-page .fac-card:hover { border-color: #a7d9c1; transform: translateY(-2px); }
.fac-page .fac-card-number, .fac-page .fac-activity-number {
    display: inline-flex; align-items: center; justify-content: center;
    width: 36px; height: 36px; margin-bottom: 15px;
    border-radius: 10px; background: #e4f5ec;
    color: var(--fac-green); font: 800 13px Manrope,sans-serif;
}
.fac-page .fac-card h3, .fac-page .fac-activity h3 {
    margin: 0 0 9px; color: var(--fac-dark);
    font: 800 16px/1.45 Manrope,sans-serif;
}
.fac-page .fac-card p, .fac-page .fac-activity p {
    margin: 0; font-size: 13px; line-height: 1.78;
}
.fac-page .fac-card-wide {
    grid-column: 1 / -1; display: grid;
    grid-template-columns: 48px minmax(0,1fr);
    align-items: center; gap: 15px; padding: 20px 23px;
}
.fac-page .fac-card-wide .fac-card-number { margin: 0; }
.fac-page .fac-card-wide h3 { margin-bottom: 5px; }
.fac-page .fac-activity { padding: 22px 23px; }
.fac-page .fac-note {
    margin-top: 20px; padding: 16px 20px;
    border-left: 3px solid #12835e; border-radius: 0 10px 10px 0;
    background: #e9f4ed; font-size: 13px; line-height: 1.8;
}
.fac-page .fac-note strong { color: #173d2f; }

/* Denah — gambar tetap terlihat; klik untuk PDF */
.fac-page .fac-denah-header {
    max-width: 780px; margin: 0 auto 22px; text-align: center;
}
.fac-page .fac-denah-header .fac-title { margin-left: auto; margin-right: auto; }
.fac-page .fac-denah-header .fac-copy { text-align: center; text-align-last: center; }
.fac-page .fac-denah-preview {
    max-width: 1010px; margin: 0 auto;
    border: 1px solid var(--fac-border); border-radius: 16px;
    background: white; overflow: hidden;
    box-shadow: 0 10px 26px rgba(18,57,41,.05);
}
.fac-page .fac-denah-picture {
    display: block; width: 100%; padding: 0; cursor: zoom-in;
    border: 0; background: #f4f6f1;
}
.fac-page .fac-denah-picture img { width: 100%; height: auto; display: block; object-fit: contain; }
.fac-page .fac-denah-picture:focus-visible { outline: 3px solid #0d8f70; outline-offset: -3px; }

/* PDF modal: berada di luar .fac-page karena top layer */
.fac-plan-dialog {
    width: min(1120px,96vw); height: min(90vh,840px);
    max-width: none; max-height: none; padding: 0; border: 0;
    border-radius: 15px; overflow: hidden; background: #fff;
    box-shadow: 0 24px 80px rgba(0,0,0,.3);
}
.fac-plan-dialog::backdrop { background: rgba(7,30,22,.76); }
.fac-plan-shell { display: flex; flex-direction: column; height: 100%; min-height: 0; }
.fac-plan-top {
    display: flex; align-items: center; justify-content: space-between;
    gap: 12px; padding: 12px 17px; border-bottom: 1px solid #e4ede6;
}
.fac-plan-top strong { color: #173d2f; font: 800 15px/1.4 Manrope,sans-serif; }
.fac-plan-actions { display: flex; align-items: center; gap: 12px; }
.fac-plan-external { color: #087e61; text-decoration: none; font-size: 12px; font-weight: 800; }
.fac-plan-close {
    width: 37px; height: 37px; flex: 0 0 auto;
    border: 1px solid #dae9df; border-radius: 50%;
    background: #f2f8f4; color: #173d2f;
    font-size: 25px; line-height: 1; cursor: pointer;
}
.fac-plan-frame { width: 100%; flex: 1; min-height: 0; border: 0; background: #f6f8f6; }

@media (max-width: 920px) {
    .fac-page .fac-grid { grid-template-columns: repeat(2,minmax(0,1fr)); }
    .fac-page .container.fac-intro-grid { grid-template-columns: 1fr; gap: 22px; }
    .fac-page .fac-card-wide { grid-column: 1 / -1; }
}
@media (max-width: 600px) {
    .fac-page .fac-hero { padding: 35px 0 39px; }
    .fac-page .fac-section { padding: 38px 0; }
    .fac-page .fac-grid { grid-template-columns: 1fr; gap: 12px; }
    .fac-page .fac-card, .fac-page .fac-activity { padding: 20px; }
    .fac-page .fac-card-wide {
        display: flex; flex-direction: column; align-items: flex-start; gap: 10px;
    }
    .fac-page .fac-card-wide .fac-card-number { margin-bottom: 0; }
    .fac-page .fac-feature { padding: 23px; }
    .fac-plan-dialog { width: 98vw; height: 93vh; }
    .fac-plan-top strong { font-size: 12px; }
    .fac-plan-external { font-size: 11px; }
}
@media (prefers-reduced-motion: reduce) {
    .fac-page .fac-card { transition: none; }
}
</style>
@endpush

@section('content')
<div class="fac-page">
    <!-- Hero Fasilitas -->
    <section class="fac-hero">
        <div class="container">
            <span class="fac-hero-tag">FASILITAS DAN KEGIATAN</span>
            <h1>Fasilitas UPTD PP REHSOS</h1>
            <p>Menjelajahi sarana dan kegiatan yang mendukung perlindungan, pendampingan, serta pelayanan rehabilitasi sosial di UPTD PP REHSOS Kabupaten Sidoarjo.</p>
            <a href="#daftar-fasilitas" class="fac-hero-link">Jelajahi Fasilitas &darr;</a>
        </div>
    </section>

    <!-- Pengenalan: dua kolom desktop -->
    <section class="fac-section">
        <div class="container fac-intro-grid">
            <div>
                <span class="fac-label">LINGKUNGAN PELAYANAN</span>
                <h2 class="fac-title">Mendukung Pelayanan Sosial yang Humanis</h2>
                <p class="fac-copy">Fasilitas dan lingkungan pelayanan berperan penting dalam mendukung perlindungan serta pendampingan bagi Pemerlu Pelayanan Kesejahteraan Sosial (PPKS). Sarana yang tersedia digunakan untuk menunjang penerimaan, pemenuhan kebutuhan dasar, pemantauan kondisi kesehatan, dan aktivitas sehari-hari selama proses pelayanan. Setiap penerima layanan dapat memiliki kebutuhan yang berbeda sehingga penggunaan fasilitas perlu mempertimbangkan kondisi dan hasil asesmen masing-masing individu. Penataan sarana dan kegiatan yang terarah diharapkan turut mendukung kenyamanan, keselamatan, serta kesinambungan pelayanan.</p>
                <p class="fac-copy">Dalam kerangka pelayanan terpadu, kegiatan di lingkungan UPTD berkaitan dengan pelaksanaan tugas petugas kesehatan dan pendamping. Petugas pendamping memperhatikan kebutuhan sehari-hari serta perkembangan kondisi penerima layanan, sedangkan petugas kesehatan menangani pemantauan kesehatan sesuai kompetensi dan kewenangannya. Informasi yang relevan dicatat dan dikoordinasikan agar kebutuhan tindak lanjut dapat diketahui oleh petugas terkait. Pemanfaatan setiap sarana tetap mengikuti ketentuan operasional dan kondisi fasilitas yang tersedia.</p>
            </div>
            <aside class="fac-feature">
                <span class="fac-feature-mark" aria-hidden="true">+</span>
                <h3>Sarana yang Mendukung Pelayanan Terpadu</h3>
                <p class="fac-copy">Fasilitas UPTD tidak hanya mendukung kebutuhan tempat dan aktivitas, tetapi juga menunjang alur pelayanan sejak penerimaan hingga pendampingan serta tindak lanjut. Ruang dan sarana dimanfaatkan sesuai fungsi masing-masing untuk membantu petugas memberikan pelayanan secara terarah. Kebutuhan kesehatan, kebersihan, makan, istirahat, dan kegiatan sosial diperhatikan dengan mempertimbangkan kondisi penerima layanan. Koordinasi antardivisi menjadi bagian penting agar pelaksanaan pelayanan tetap aman dan berkesinambungan.</p>
            </aside>
        </div>
    </section>

    <!-- Fasilitas tetap tujuh item, seperti source asli -->
    <section class="fac-section fac-soft" id="daftar-fasilitas">
        <div class="container">
            <div class="fac-center">
                <span class="fac-label">SARANA DAN PRASARANA</span>
                <h2 class="fac-title">Fasilitas UPTD</h2>
                <p class="fac-copy">Ragam sarana yang mendukung penerimaan, pemenuhan kebutuhan sehari-hari, pelayanan kesehatan, dan pendampingan sosial bagi penerima layanan.</p>
            </div>
            <div class="fac-grid">
                @foreach($fasilitas as $index => $item)
                    <article class="fac-card {{ $loop->last ? 'fac-card-wide' : '' }}">
                        <span class="fac-card-number" aria-hidden="true">{{ sprintf('%02d', $index + 1) }}</span>
                        <div>
                            <h3>{{ $item['judul'] }}</h3>
                            <p>{{ $item['detail'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="fac-note"><strong>Keterkaitan dengan pelayanan:</strong> Sarana digunakan sesuai kebutuhan penerima layanan serta kewenangan petugas dalam proses penerimaan, pendampingan, pemantauan, dan tindak lanjut. Uraian ini merupakan gambaran umum yang dikembangkan dari rancangan konsep pelayanan terpadu, bukan pernyataan bahwa SOP tersebut telah disahkan.</div>
        </div>
    </section>

    <!-- Kegiatan yang sudah ada tetap dipertahankan -->
    <section class="fac-section" id="kegiatan">
        <div class="container">
            <div class="fac-center">
                <span class="fac-label">AKTIVITAS HARIAN</span>
                <h2 class="fac-title">Kegiatan di Lingkungan UPTD</h2>
                <p class="fac-copy">Kegiatan dilaksanakan untuk membantu memenuhi kebutuhan sehari-hari, mendukung interaksi sosial, serta mendampingi penerima layanan sesuai kondisi dan kemampuan masing-masing.</p>
            </div>
            <div class="fac-grid">
                @foreach($kegiatan as $index => $item)
                    <article class="fac-activity">
                        <span class="fac-activity-number" aria-hidden="true">{{ sprintf('%02d', $index + 1) }}</span>
                        <h3>{{ $item['judul'] }}</h3>
                        <p>{{ $item['uraian'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Denah yang sudah ada tidak diubah sumber filenya -->
    <section class="fac-section fac-soft" id="denah">
        <div class="container">
            <div class="fac-denah-header">
                <span class="fac-label">DENAH FASILITAS</span>
                <h2 class="fac-title">Denah Area UPTD</h2>
                <p class="fac-copy">Gambaran penataan area dan sarana di lingkungan UPTD PP REHSOS Kabupaten Sidoarjo. Klik gambar untuk melihat dokumen denah dalam tampilan lebih besar.</p>
            </div>
            <div class="fac-denah-preview">
                <button class="fac-denah-picture" type="button" data-denah-open aria-label="Perbesar denah UPTD PP REHSOS">
                    <img src="{{ asset('images/denah-uptd.webp') }}"
                         alt="Denah UPTD PP REHSOS Kabupaten Sidoarjo"
                         loading="lazy" decoding="async">
                </button>
            </div>
        </div>
    </section>
</div>

<!-- Dialog top layer: aturan CSS-nya tidak bergantung pada .fac-page -->
<dialog id="facPlanDialog" class="fac-plan-dialog" aria-labelledby="facPlanTitle">
    <div class="fac-plan-shell">
        <div class="fac-plan-top">
            <strong id="facPlanTitle">Denah UPTD PP REHSOS</strong>
            <div class="fac-plan-actions">
                <a class="fac-plan-external" href="{{ asset('dokumen/denah-uptd.pdf') }}"
                   target="_blank" rel="noopener noreferrer">Buka PDF ↗</a>
                <button id="facPlanClose" type="button" class="fac-plan-close" aria-label="Tutup denah">&times;</button>
            </div>
        </div>
        <iframe id="facPlanFrame" class="fac-plan-frame" title="Denah UPTD PP REHSOS dalam format PDF"></iframe>
    </div>
</dialog>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const planDialog = document.getElementById('facPlanDialog');
    const planFrame = document.getElementById('facPlanFrame');
    const planClose = document.getElementById('facPlanClose');
    const planUrl = @json(asset('dokumen/denah-uptd.pdf'));
    let lastPlanTrigger = null;

    if (!planDialog || !planFrame || !planClose) return;

    document.querySelectorAll('[data-denah-open]').forEach(function (button) {
        button.addEventListener('click', function () {
            lastPlanTrigger = button;
            if (typeof planDialog.showModal === 'function') {
                planFrame.src = planUrl;
                planDialog.showModal();
                planClose.focus();
            } else {
                window.open(planUrl, '_blank', 'noopener');
            }
        });
    });

    planClose.addEventListener('click', function () { planDialog.close(); });

    planDialog.addEventListener('click', function (event) {
        const rect = planDialog.getBoundingClientRect();
        if (event.target === planDialog &&
            (event.clientX < rect.left || event.clientX > rect.right ||
             event.clientY < rect.top || event.clientY > rect.bottom)) {
            planDialog.close();
        }
    });

    planDialog.addEventListener('close', function () {
        planFrame.removeAttribute('src');
        if (lastPlanTrigger) lastPlanTrigger.focus();
    });
});
</script>
@endpush
