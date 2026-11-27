
/* ==========================================
   AIRPLANE CURSOR — UPTD PP REHSOS
   FIX POPUP / DIALOG
========================================== */

(function () {
    'use strict';

    const finePointer = window.matchMedia(
        '(hover: hover) and (pointer: fine)'
    ).matches;

    const reducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    if (!finePointer || reducedMotion) return;

    function init() {

        // CEGAH KURSOR DUPLIKAT
        if (document.getElementById('airplane-cursor')) {
            return;
        }

        // =====================================
        // MEMBUAT PESAWAT
        // =====================================

        const plane = document.createElement('div');
        plane.id = 'airplane-cursor';

        plane.innerHTML = `
            <svg viewBox="0 0 40 44"
                 xmlns="http://www.w3.org/2000/svg">

                <path
                    d="M20 2 L37 40 L20 30 L3 40 Z"
                    fill="#FFFFFF"
                    stroke="#123D30"
                    stroke-width="2"
                    stroke-linejoin="round"
                />

                <path
                    d="M20 2 L20 30"
                    fill="none"
                    stroke="#E8C878"
                    stroke-width="2"
                />

                <path
                    d="M20 30 L15 37 L13 27"
                    fill="#E8C878"
                    opacity=".9"
                />
            </svg>
        `;

        // =====================================
        // MEMBUAT JEJAK EMAS
        // =====================================

        const canvas = document.createElement('canvas');
        canvas.id = 'airplane-trail';

        document.body.appendChild(canvas);
        document.body.appendChild(plane);

        const ctx = canvas.getContext('2d');
        const svg = plane.querySelector('svg');

        if (!ctx || !svg) {
            plane.remove();
            canvas.remove();
            return;
        }

        document.body.classList.add('airplane-enabled');

        let x = 0;
        let y = 0;
        let targetX = 0;
        let targetY = 0;
        let lastMouseX = 0;
        let lastMouseY = 0;
        let angle = 25;

        let visible = false;
        let hovering = false;
        let clicking = false;
        let points = [];

        // =====================================
        // UKURAN CANVAS
        // =====================================

        function resize() {

            const dpr = Math.min(
                window.devicePixelRatio || 1,
                2
            );

            canvas.width = Math.round(
                window.innerWidth * dpr
            );

            canvas.height = Math.round(
                window.innerHeight * dpr
            );

            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        }

        resize();

        window.addEventListener('resize', resize);

        // =====================================
        // FIX POP-UP DIALOG
        // =====================================

        function getActiveDialog() {

            const dialogs = Array.from(
                document.querySelectorAll('dialog[open]')
            );

            // Prioritaskan dialog modal yang berada
            // pada lapisan teratas browser.
            for (let i = dialogs.length - 1; i >= 0; i--) {

                try {
                    if (dialogs[i].matches(':modal')) {
                        return dialogs[i];
                    }
                } catch (error) {}
            }

            return dialogs.length
                ? dialogs[dialogs.length - 1]
                : null;
        }

        function syncAirplanePopup() {

            const activeDialog = getActiveDialog();
            const destination = activeDialog || document.body;

            const changed =
                plane.parentElement !== destination ||
                canvas.parentElement !== destination;

            if (!changed) return;

            // Pindahkan kursor ke dalam pop-up.
            // Elemen tetap tidak menangkap klik.

            destination.appendChild(canvas);
            destination.appendChild(plane);

            points = [];
        }

        // Pantau pop-up dibuka dan ditutup.
        const popupObserver = new MutationObserver(
            syncAirplanePopup
        );

        popupObserver.observe(document.body, {
            subtree: true,
            childList: true,
            attributes: true,
            attributeFilter: ['open']
        });

        // Menangani dialog yang ditutup
        // menggunakan tombol atau Escape.
        document.addEventListener(
            'close',
            syncAirplanePopup,
            true
        );

        syncAirplanePopup();

        // =====================================
        // SEMBUNYIKAN KURSOR
        // =====================================

        function hideAirplane() {
            visible = false;
            plane.style.opacity = '0';
            points = [];
        }

        // =====================================
        // GERAKAN MOUSE
        // =====================================

        window.addEventListener(
            'pointermove',
            function (e) {

                if (e.pointerType !== 'mouse') return;

                syncAirplanePopup();

                const target = e.target;

                const editing =
                    target instanceof Element &&
                    !!target.closest(
                        'input, textarea, select, ' +
                        '[contenteditable="true"], iframe'
                    );

                const introActive =
                    document.documentElement.classList.contains(
                        'rehsos-intro-active'
                    );

                if (editing || introActive) {
                    hideAirplane();
                    return;
                }

                const dx = e.clientX - lastMouseX;
                const dy = e.clientY - lastMouseY;

                if (Math.hypot(dx, dy) > 2) {
                    angle =
                        Math.atan2(dy, dx) * 180 /
                        Math.PI + 90;
                }

                lastMouseX = e.clientX;
                lastMouseY = e.clientY;

                targetX = e.clientX;
                targetY = e.clientY;

                if (!visible) {
                    x = targetX;
                    y = targetY;
                    visible = true;
                }

                plane.style.opacity = '1';

                hovering =
                    target instanceof Element &&
                    !!target.closest(
                        'a, button, [role="button"]'
                    );

            },
            { capture: true, passive: true }
        );

        // =====================================
        // ANIMASI KLIK
        // =====================================

        window.addEventListener('pointerdown', function (e) {
            if (e.pointerType !== 'mouse') return;

            clicking = true;
            plane.classList.add('airplane-click');
        });

        window.addEventListener('pointerup', function () {
            clicking = false;
            plane.classList.remove('airplane-click');
        });

        window.addEventListener('blur', hideAirplane);

        document.addEventListener(
            'mouseleave',
            hideAirplane
        );

        // =====================================
        // ANIMASI TERBANG DAN JEJAK
        // =====================================

        function animate(time) {

            ctx.clearRect(
                0,
                0,
                window.innerWidth,
                window.innerHeight
            );

            if (visible) {

                const oldX = x;
                const oldY = y;

                // Gerakan halus mengikuti mouse
                x += (targetX - x) * 0.38;
                y += (targetY - y) * 0.38;

                plane.style.left = x + 'px';
                plane.style.top = y + 'px';

                const scale = clicking
                    ? 0.85
                    : hovering ? 1.12 : 1;

                svg.style.transform =
                    `rotate(${angle}deg) scale(${scale})`;

                const moving =
                    Math.hypot(
                        x - oldX,
                        y - oldY
                    ) > 0.4;

                if (moving) {
                    points.push({
                        x: x,
                        y: y,
                        time: time
                    });
                }
            }

            // Jejak emas menghilang perlahan
            points = points.filter(
                p => time - p.time < 260
            );

            for (let i = 1; i < points.length; i++) {

                const p1 = points[i - 1];
                const p2 = points[i];

                const age =
                    (time - p2.time) / 260;

                const opacity = Math.max(
                    0,
                    (1 - age) * 0.5
                );

                ctx.beginPath();
                ctx.moveTo(p1.x, p1.y);
                ctx.lineTo(p2.x, p2.y);

                ctx.strokeStyle =
                    `rgba(201,165,85,${opacity})`;

                ctx.lineWidth = 1.5;
                ctx.lineCap = 'round';
                ctx.stroke();
            }

            requestAnimationFrame(animate);
        }

        requestAnimationFrame(animate);
    }

    // =====================================
    // INISIALISASI
    // =====================================

    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            init
        );
    } else {
        init();
    }

})();
