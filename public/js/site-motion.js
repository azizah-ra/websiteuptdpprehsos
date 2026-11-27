/* ====================================================
   UPTD PP REHSOS — INTRO + MENU + SCROLL v8
   ==================================================== */

document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    const root = document.documentElement;
    const intro = document.getElementById('rehsos-intro');
    const reduceMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    // Sesuai durasi animasi CSS (milidetik).
    const DROP_MS = 1600;       // Logo jatuh dan memantul tepat dua kali
    const HOLD_MS = 500;        // Diam selama 0,5 detik
    const EXIT_MS = 900;        // Logo keluar sepenuhnya lewat sisi kiri layar
    const DOOR_MS = 1400;       // Dua pintu hijau bergeser
    const REVEAL_MS = 950;      // Beranda membesar dan jadi terang

    let finished = false;
    let scrollInitialized = false;
    let introSafetyTimer;

    function wait(milliseconds) {
        return new Promise(function (resolve) {
            window.setTimeout(resolve, milliseconds);
        });
    }

    // ==========================================
    // SCROLL REVEAL + ANIMASI JUDUL
    // ==========================================

    function initScrollMotion() {
        if (scrollInitialized) return;
        scrollInitialized = true;

        if (reduceMotion || !('IntersectionObserver' in window)) {
            return;
        }

        const cards = document.querySelectorAll([
            '#rehsos-page .lm-card',
            '#rehsos-page .lm-step',
            '#rehsos-page .lm-type-row',
            '#rehsos-page .lm-about-panel',
            '#rehsos-page .im-highlight',
            '#rehsos-page .im-step',
            '#rehsos-page .im-notice',
            '#rehsos-page .pf-identity-table',
            '#rehsos-page .pf-structure-image',
            '#rehsos-page .home-link',
            '#rehsos-page .facility-card',
            '#rehsos-page [data-rehsos-reveal]'
        ].join(','));

        const headings = document.querySelectorAll(
            '#rehsos-page h1, #rehsos-page h2'
        );

        const observer = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('rehsos-visible');
                obs.unobserve(entry.target);
            });
        }, {
            threshold: 0.08,
            rootMargin: '0px 0px 25px 0px'
        });

        // Jalankan animasi hanya untuk elemen terlihat/akan muncul.
        // Tidak merusak tombol, modal, atau PDF.
        cards.forEach(function (element, index) {
            if (!element.getBoundingClientRect().height) return;
            element.style.setProperty('--rehsos-delay',
                String(index % 3 * 70) + 'ms'
            );
            element.classList.add('rehsos-reveal');
            observer.observe(element);
        });

        headings.forEach(function (element) {
            if (!element.getBoundingClientRect().height) return;
            element.classList.add('rehsos-type-reveal');
            observer.observe(element);
        });
    }

    // ==========================================
    // MENYELESAIKAN INTRO
    // ==========================================

    function finishIntro() {
        if (finished) return;
        finished = true;

        if (introSafetyTimer) {
            window.clearTimeout(introSafetyTimer);
        }

        root.classList.remove(
            'rehsos-intro-active',
            'rehsos-intro-start',
            'rehsos-intro-exit',
            'rehsos-intro-opening',
            'rehsos-intro-reveal'
        );

        if (intro) intro.hidden = true;

        try {
            sessionStorage.setItem('rehsosIntroSeen', '1');
        } catch (error) {
            // Situs tetap dapat dibuka bila storage ditolak.
        }

        initScrollMotion();
    }

    // ==========================================
    // URUTAN INTRO SINEMATIK
    // ==========================================

    async function playIntro() {
        // Tahap 1: logo jatuh lalu memantul.
        root.classList.add('rehsos-intro-start');
        await wait(DROP_MS);
        if (finished) return;

        // Tahap 2: logo diam 0,5 detik.
        await wait(HOLD_MS);
        if (finished) return;

        // Tahap 3: logo memantul dan meluncur ke kiri.
        root.classList.add('rehsos-intro-exit');
        await wait(EXIT_MS);
        if (finished) return;

        // Tahap 4: dua pintu hijau bergeser.
        root.classList.add('rehsos-intro-opening');
        await wait(DOOR_MS);
        if (finished) return;

        // Tahap 5: tirai gelap memudar, Beranda zoom ke 100%.
        root.classList.add('rehsos-intro-reveal');
        await wait(REVEAL_MS);
        if (finished) return;

        finishIntro();
    }

    const isIntroActive = Boolean(
        intro &&
        root.classList.contains('rehsos-intro-active') &&
        !reduceMotion
    );

    if (isIntroActive) {
        intro.hidden = false;

        const skipButton = document.getElementById('rehsos-intro-skip');
        if (skipButton) {
            skipButton.addEventListener('click', finishIntro);
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') finishIntro();
        });

        // Pengaman: overlay tak akan menutupi situs tanpa batas.
        introSafetyTimer = window.setTimeout(finishIntro, 7500);
        playIntro();
    } else {
        root.classList.remove('rehsos-intro-active');
        if (intro) intro.hidden = true;
        initScrollMotion();
    }

    // Jika halaman dipulihkan dari bfcache, jangan hidupkan intro lagi.
    window.addEventListener('pageshow', function (event) {
        if (event.persisted && root.classList.contains('rehsos-intro-active')) {
            finishIntro();
        }
    });
});


/* TRANSISI ANTAR MENU */

(function () {
    'use strict';

    function start() {

        if (window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches) return;

        try {
            sessionStorage.removeItem('rehsosNavPending');
        } catch (error) {}

        const routeNames = new Map([
            ['/', 'Beranda'],
            ['/profil', 'Profil Instansi'],
            ['/layanan', 'Layanan'],
            ['/informasi', 'Informasi'],
            ['/fasilitas', 'Fasilitas'],
            ['/kontak', 'Hubungi Kami']
        ]);

        const normalize = path =>
            path.replace(/\/+$/, '') || '/';

        // Baca alamat route Laravel jika tersedia
        const oldScreen =
            document.getElementById('rehsos-nav-screen');

        if (oldScreen && oldScreen.dataset.pages) {
            try {
                const pages = JSON.parse(
                    oldScreen.dataset.pages
                );

                if (Array.isArray(pages)) {
                    pages.forEach(page => {
                        if (!page || !page.url || !page.name) return;

                        const url = new URL(
                            page.url,
                            location.href
                        );

                        if (url.origin === location.origin) {
                            routeNames.set(
                                normalize(url.pathname),
                                String(page.name)
                            );
                        }
                    });
                }
            } catch (error) {}
        }

        // Buat loading otomatis
        const layer = document.createElement('div');

        layer.id = 'rehsos-menu-loader';
        layer.hidden = true;
        layer.setAttribute('role', 'status');
        layer.setAttribute('aria-live', 'polite');

        layer.innerHTML = `
            <div class="rehsos-menu-loader-inner">

                <span class="rehsos-menu-spinner"
                      aria-hidden="true"></span>

                <p class="rehsos-menu-name"></p>

            </div>
        `;

        document.body.appendChild(layer);

        const label = layer.querySelector(
            '.rehsos-menu-name'
        );

        let navigating = false;
        let navigationTimer = null;

        document.addEventListener('click', function (event) {

            if (
                event.defaultPrevented ||
                navigating ||
                event.button !== 0 ||
                event.ctrlKey ||
                event.metaKey ||
                event.shiftKey ||
                event.altKey
            ) return;

            const anchor = event.target.closest('a[href]');

            if (!anchor ||
                anchor.hasAttribute('download') ||
                (anchor.getAttribute('target') &&
                 anchor.getAttribute('target') !== '_self')
            ) return;

            let target;

            try {
                target = new URL(
                    anchor.href,
                    location.href
                );
            } catch (error) {
                return;
            }

            if (target.origin !== location.origin) return;

            const currentPath = normalize(
                location.pathname
            );

            const targetPath = normalize(
                target.pathname
            );

            if (
                !routeNames.has(targetPath) ||
                currentPath === targetPath
            ) return;

            event.preventDefault();

            navigating = true;

            label.textContent = routeNames.get(targetPath);
            layer.hidden = false;

            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    layer.classList.add('is-active');
                });
            });

            // Loading selama 0,85 detik
            navigationTimer = setTimeout(() => {
                location.assign(target.href);
            }, 850);
        });

        // Pengaman ketika kembali dengan tombol Back
        window.addEventListener('pageshow', function (event) {

            if (!event.persisted) return;

            if (navigationTimer) {
                clearTimeout(navigationTimer);
            }

            navigating = false;

            layer.classList.remove('is-active');
            layer.hidden = true;
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', start);
    } else {
        start();
    }

})();
