{{-- FOOTER KOMPONEN TUNGGAL: CSS DI DALAM KOMPONEN AGAR TIDAK HILANG --}}
<style>
#rehsos-footer {
    box-sizing: border-box !important;
    display: block !important;
    width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
    background: #11291f !important;
    color: #e6f1e9 !important;
    font-family: 'DM Sans', Arial, sans-serif !important;
}
#rehsos-footer *, #rehsos-footer *::before, #rehsos-footer *::after { box-sizing: border-box; }
#rehsos-footer .rf-inner { width: min(1120px, calc(100% - 50px)); margin: 0 auto; }
#rehsos-footer .rf-grid {
    display: grid !important;
    grid-template-columns: minmax(0,1fr) minmax(0,.85fr) minmax(0,1.2fr) !important;
    gap: 30px !important;
    align-items: start;
    padding: 28px 0 24px;
}
#rehsos-footer .rf-grid > div, #rehsos-footer .rf-grid > nav { min-width: 0; margin: 0; padding: 0; }
#rehsos-footer h2, #rehsos-footer h3 {
    color: #fff !important; font-size: 14px !important;
    font-weight: 800 !important; line-height: 1.4 !important;
    margin: 0 0 12px !important; letter-spacing: 0 !important;
}
#rehsos-footer p { margin: 0 0 10px !important; color: #bdcec4 !important; font-size: 12px !important; line-height: 1.7 !important; }
#rehsos-footer a { color: #d1e9d8 !important; text-decoration: none !important; font-size: 12px !important; }
#rehsos-footer a:hover { color: white !important; text-decoration: underline !important; }
#rehsos-footer .rf-links { display: grid !important; grid-template-columns: repeat(2,minmax(0,1fr)) !important; gap: 11px 16px !important; }
#rehsos-footer .rf-links a { display: block; margin: 0; padding: 0; }
#rehsos-footer .rf-map { display: block; width: 100%; height: 128px; border: 0; border-radius: 9px; background: #e9f1eb; }
#rehsos-footer .rf-mapline { display: flex; align-items: baseline; justify-content: space-between; gap: 10px; flex-wrap: wrap; margin-top: 9px; }
#rehsos-footer .rf-mapline span { color: #bdcec4; font-size: 11px; line-height: 1.5; }
#rehsos-footer .rf-mapline a { font-size: 11px !important; font-weight: 700; }
#rehsos-footer .rf-bottom { display: flex; justify-content: space-between; align-items: center; gap: 10px 20px; flex-wrap: wrap; padding: 12px 0 15px; border-top: 1px solid rgba(255,255,255,.12); }
#rehsos-footer .rf-bottom span { font-size: 10px !important; color: #a5baad !important; line-height: 1.6; }
@media (max-width: 800px) {
    #rehsos-footer .rf-grid { grid-template-columns: repeat(2,minmax(0,1fr)) !important; gap: 25px !important; }
    #rehsos-footer .rf-place { grid-column: 1 / -1; }
}
@media (max-width: 550px) {
    #rehsos-footer .rf-inner { width: calc(100% - 32px); }
    #rehsos-footer .rf-grid { grid-template-columns: minmax(0,1fr) !important; gap: 22px !important; padding-top: 25px; }
    #rehsos-footer .rf-place { grid-column: auto; }
    #rehsos-footer .rf-map { height: 155px; }
}

.footer-watermark {
    font-size: 11px;
    color: rgba(255,255,255,0.5);
    font-style: italic;
    letter-spacing: 0.2px;
}
</style>

<footer id="rehsos-footer">
    <div class="rf-inner">
        <div class="rf-grid">
            <div>
                <h2>UPTD PP REHSOS</h2>
                <p>Unit pelayanan sosial di bawah Dinas Sosial Kabupaten Sidoarjo.</p>
                <a href="tel:+6285711404090">Telp. (+62) 85711404090</a>
            </div>

            <nav aria-label="Navigasi footer">
                <h3>Navigasi</h3>
                <div class="rf-links">
                    <a href="{{ route('beranda') }}">Beranda</a>
                    <a href="{{ route('profil') }}">Profil</a>
                    <a href="{{ route('layanan') }}">Layanan</a>
                    <a href="{{ route('informasi') }}">Informasi</a>
                    <a href="{{ route('fasilitas') }}">Fasilitas</a>
                    <a href="{{ route('kontak') }}">Hubungi Kami</a>
                </div>
            </nav>

            <div class="rf-place">
                <h3>Lokasi Kami</h3>
                <iframe class="rf-map" title="Lokasi UPTD PP REHSOS Kabupaten Sidoarjo"
                    src="https://maps.google.com/maps?q=Jl.%20Sekolahan%2C%20Cangkring%2C%20Sidokare%2C%20Sidoarjo%2C%20Jawa%20Timur%2061214&amp;z=16&amp;output=embed"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                <div class="rf-mapline">
                    <span>Sidokare, Sidoarjo 61214</span>
                    <a href="https://maps.app.goo.gl/ky7X67a9pCeqYjU77?g_st=ac" target="_blank" rel="noopener noreferrer">Petunjuk arah ↗</a>
                </div>
            </div>
        </div>
        <div class="rf-bottom">
            <span>© {{ date('Y') }} UPTD PP REHSOS Kabupaten Sidoarjo.</span>
            <span class="footer-watermark">
    by Mahasiswa S1 Pendidikan Teknologi Informasi UNESA
</span>
        </div>
    </div>
</footer>
