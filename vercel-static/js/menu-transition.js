(function () {
    'use strict';

    function init() {

        const normalize = path =>
            path.replace(/\/+$/, '') || '/';

        const routes = new Set([
            '/',
            '/beranda',
            '/profil',
            '/layanan',
            '/informasi',
            '/fasilitas',
            '/kontak'
        ]);

        // Ambil rute Laravel jika tersedia
        const oldScreen = document.getElementById(
            'rehsos-nav-screen'
        );

        if (oldScreen?.dataset.pages) {
            try {
                const pages = JSON.parse(
                    oldScreen.dataset.pages
                );

                pages.forEach(page => {
                    const url = new URL(
                        page.url,
                        location.href
                    );

                    if (url.origin === location.origin) {
                        routes.add(normalize(url.pathname));
                    }
                });
            } catch (error) {}
        }

        const reduceMotion = window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;

        // Zoom ketika halaman baru dibuka
        try {
            const arrival = JSON.parse(
                sessionStorage.getItem(
                    'rehsosMenuArrival'
                ) || 'null'
            );

            sessionStorage.removeItem(
                'rehsosMenuArrival'
            );

            if (
                !reduceMotion &&
                arrival &&
                normalize(arrival.path) ===
                    normalize(location.pathname) &&
                Date.now() - arrival.time < 15000
            ) {
                const page =
                    document.getElementById('rehsos-page') ||
                    document.querySelector('main');

                if (page) {
                    page.classList.add('rehsos-menu-enter');

                    page.addEventListener(
                        'animationend',
                        () => {
                            page.classList.remove(
                                'rehsos-menu-enter'
                            );
                        },
                        { once: true }
                    );
                }
            }
        } catch (error) {}

        // Buat layar transisi otomatis (3 Titik)
        const loader = document.createElement('div');

        loader.id = 'rehsos-dots-loader';
        loader.hidden = true;
        loader.setAttribute('aria-hidden', 'true');

        loader.innerHTML = `
            <div class="rehsos-dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        `;

        document.body.appendChild(loader);

        let navigating = false;
        let timer = null;

        document.addEventListener('click', function (event) {

            if (
                event.defaultPrevented ||
                navigating ||
                event.button !== 0 ||
                event.ctrlKey ||
                event.metaKey ||
                event.shiftKey ||
                event.altKey ||
                !(event.target instanceof Element)
            ) return;

            const link = event.target.closest('a[href]');

            if (
                !link ||
                link.hasAttribute('download') ||
                (link.target && link.target !== '_self')
            ) return;

            let destination;

            try {
                destination = new URL(
                    link.href,
                    location.href
                );
            } catch (error) {
                return;
            }

            const current = normalize(
                location.pathname
            );

            const next = normalize(
                destination.pathname
            );

            if (
                destination.origin !== location.origin ||
                !routes.has(next) ||
                next === current
            ) return;

            event.preventDefault();

            if (reduceMotion) {
                location.assign(destination.href);
                return;
            }

            navigating = true;

            try {
                sessionStorage.setItem(
                    'rehsosMenuArrival',
                    JSON.stringify({
                        path: next,
                        time: Date.now()
                    })
                );
            } catch (error) {}

            // Mulai animasi 3 titik
            loader.hidden = false;
            loader.classList.add('active');

            // Pindah halaman setelah maksimal 200 milidetik (0,2 detik)
            timer = setTimeout(function () {
                location.assign(destination.href);
            }, 500);
        });

        // Reset saat menggunakan Back
        window.addEventListener('pageshow', function (event) {

            if (event.persisted) {
                clearTimeout(timer);
                navigating = false;
                loader.classList.remove('active');
                loader.hidden = true;
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
