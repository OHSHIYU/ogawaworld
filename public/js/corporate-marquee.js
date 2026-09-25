/**
 * corporate-marquee.js
 * Continuous loop scroller for Clients, Partners, and Awards.
 */
(() => {
    const marquees = document.querySelectorAll('[data-marquee]');
    if (!marquees.length) return;

    marquees.forEach(root => {
        const track = root.querySelector('.marquee-track');
        if (!track) return;

        // Configuration
        let pxPerSec = 50; // default speed
        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReduced) pxPerSec = 0;

        // Clone children for seamless loop
        const clones = Array.from(track.children).map(child => child.cloneNode(true));
        clones.forEach(clone => track.appendChild(clone));

        // State
        let rafId = null;
        let paused = false;
        let last = 0;
        let offset = 0;
        let contentWidth = 0;

        const measure = () => {
            const children = Array.from(track.children);
            const count = children.length / 2;
            contentWidth = children.slice(0, count).reduce((sum, el) => {
                const rect = el.getBoundingClientRect();
                const style = window.getComputedStyle(el);
                const margin = parseFloat(style.marginLeft) + parseFloat(style.marginRight);
                return sum + rect.width + margin;
            }, 0);
        };

        const tick = (t) => {
            if (!last) last = t;
            const dt = (t - last) / 1000;
            last = t;

            if (!paused && pxPerSec > 0 && contentWidth > 0) {
                offset -= pxPerSec * dt;
                if (-offset >= contentWidth) {
                    offset += contentWidth;
                }
                track.style.transform = `translateX(${offset}px)`;
            }
            rafId = requestAnimationFrame(tick);
        };

        // Events
        root.addEventListener('pointerenter', () => paused = true);
        root.addEventListener('pointerleave', () => paused = false);
        root.addEventListener('touchstart', () => paused = true, { passive: true });
        root.addEventListener('touchend', () => paused = false, { passive: true });

        // Resize handling
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                measure();
            }, 200);
        });

        // Initialize
        setTimeout(() => {
            measure();
            rafId = requestAnimationFrame(tick);
        }, 100);
    });
})();
