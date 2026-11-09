/**
 * Landing page motion — PT Perumnas Iida Group
 * IntersectionObserver based reveal with a short stagger.
 * Respects prefers-reduced-motion.
 */
(function () {
    'use strict';

    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var items = document.querySelectorAll('.reveal');

    if (!items.length) { return; }

    if (prefersReduced || !('IntersectionObserver' in window)) {
        items.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) { return; }
            var el = entry.target;
            // Stagger siblings inside the same grid/container (40–80ms)
            var parent = el.parentElement;
            var siblings = parent ? Array.prototype.filter.call(
                parent.children,
                function (child) { return child.classList && child.classList.contains('reveal'); }
            ) : [];
            var index = siblings.indexOf(el);
            var delay = index > 0 ? Math.min(index * 60, 240) : 0;

            el.style.setProperty('--reveal-delay', delay + 'ms');
            el.classList.add('is-visible');
            observer.unobserve(el);
        });
    }, {
        root: null,
        rootMargin: '0px 0px -80px 0px',
        threshold: 0.08
    });

    items.forEach(function (el) { observer.observe(el); });
})();

/**
 * Video hero — mute/unmute toggle.
 * Mirrors the control on https://www.perumnasiidagroup.com/.
 * The video starts muted so autoplay is permitted by the browser.
 */
(function () {
    'use strict';

    var heroVideo = document.getElementById('hero-video');
    var soundBtn  = document.getElementById('video-sound-btn');
    var soundIcon = document.getElementById('video-sound-icon');
    var soundText = document.getElementById('video-sound-text');

    if (!soundBtn || !heroVideo) { return; }

    soundBtn.addEventListener('click', function () {
        heroVideo.muted = !heroVideo.muted;

        if (heroVideo.muted) {
            soundIcon.textContent = 'volume_off';
            soundText.textContent = 'Unmute';
            soundBtn.setAttribute('aria-pressed', 'false');
            soundBtn.setAttribute('aria-label', 'Nyalakan suara video');
        } else {
            heroVideo.volume = 1.0; // Ensure volume is up
            soundIcon.textContent = 'volume_up';
            soundText.textContent = 'Mute';
            soundBtn.setAttribute('aria-pressed', 'true');
            soundBtn.setAttribute('aria-label', 'Matikan suara video');
        }
    });
})();
