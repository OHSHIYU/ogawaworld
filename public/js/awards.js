// awards.js
// Continuous (marquee) awards scroller: auto runs, pauses on hover/focus.
// Works with mouse, touch, and keyboard focus.

(() => {
  const root = document.querySelector("[data-awards]");
  if (!root) return;

  const track = root.querySelector("[data-track]");
  if (!track) return;

  // Prefer pausing over the whole visible carousel box
  const hoverTarget =
    root.querySelector(".aw-carousel") ||
    root.querySelector(".aw-viewport") ||
    root;

  // === Config ===
  let pxPerSec = 60; // speed in pixels/sec (tweak to taste)

  // === State ===
  let rafId = null;
  let paused = false;
  let last = 0;
  let contentWidth = 0; // width of the FIRST copy (half the total after cloning)
  let offset = 0; // current translateX (negative to move left)

  // Respect reduced motion
  const prefersReduced = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  ).matches;
  if (prefersReduced) pxPerSec = 0;

  // Duplicate the slides once to make a seamless loop
  const originalSlides = Array.from(track.children).map((n) =>
    n.cloneNode(true)
  );
  originalSlides.forEach((n) => track.appendChild(n.cloneNode(true)));

  // No snapping transitions for continuous move
  track.style.transition = "none";
  track.style.willChange = "transform";

  // --- helpers ---
  const pause = () => (paused = true);
  const resume = () => (paused = false);

  const measure = () => {
    // Since we cloned once, total children = 2x first copy
    const children = Array.from(track.children);
    const half = Math.floor(children.length / 2) || children.length;
    contentWidth = children
      .slice(0, half)
      .reduce((sum, el) => sum + el.getBoundingClientRect().width, 0);
  };

  const render = () => {
    if (contentWidth > 0) {
      // Wrap after one full copy so the numbers don't grow unbounded
      if (-offset >= contentWidth) offset += contentWidth;
    }
    track.style.transform = `translateX(${offset}px)`;
  };

  const tick = (t) => {
    if (!last) last = t;
    const dt = (t - last) / 1000; // seconds
    last = t;

    if (!paused && pxPerSec > 0 && contentWidth > 0) {
      offset -= pxPerSec * dt;
      render();
    }
    rafId = requestAnimationFrame(tick);
  };

  const start = () => {
    cancelAnimationFrame(rafId);
    last = 0;
    rafId = requestAnimationFrame(tick);
  };

  // --- events: pause/resume area over the visible carousel ---
  hoverTarget.addEventListener("pointerenter", pause);
  hoverTarget.addEventListener("pointerleave", resume);

  // Keyboard accessibility: pause while focusing inside the carousel
  hoverTarget.addEventListener("focusin", pause);
  hoverTarget.addEventListener("focusout", resume);

  // Touch niceties: brief pause while touching
  hoverTarget.addEventListener("touchstart", pause, { passive: true });
  hoverTarget.addEventListener("touchend", resume, { passive: true });
  hoverTarget.addEventListener("touchcancel", resume, { passive: true });

  // Recalculate on resize (keep current visual position)
  let resizeTimer = null;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      const wasPaused = paused;
      paused = true;
      const prevWidth = contentWidth;
      measure();

      // Keep offset visually consistent within the new width
      if (contentWidth > 0) {
        // normalize to [0, contentWidth)
        const norm = ((-offset % contentWidth) + contentWidth) % contentWidth;
        offset = -norm;
      } else {
        offset = 0;
      }

      render();
      paused = wasPaused;
    }, 120);
  });

  // Init
  measure();
  render();
  start();
})();
