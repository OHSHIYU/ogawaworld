(() => {
  const cssNum = (v) => parseFloat(String(v).replace("px", "")) || 0;
  const smoothstep = (t) => t * t * (3 - 2 * t); // for overseer head only

  let tracks = [];
  let head = null;
  let ticking = false;

  const completed = new WeakSet(); // finished (pinned+blink)
  const running = new WeakSet(); // currently animating
  const travelMap = new WeakMap(); // cache of computed travel per track

  function collect(root = document) {
    tracks = Array.from(root.querySelectorAll(".vbar-track"));
  }

  function computeTravel(el) {
    const cs = getComputedStyle(el);
    const highlight = cssNum(cs.getPropertyValue("--bar-highlight-h")) || 96;
    const pad = cssNum(cs.getPropertyValue("--bar-pad")) || 16;
    const h = el.getBoundingClientRect().height; // layout read (rare, not on scroll)
    return Math.max(0, h - highlight - pad * 2);
  }

  function setOffset(el, px) {
    el.style.setProperty("--bar-offset", px + "px");
  }

  // Set initial state: runner starts at bottom (based on cached or computed travel)
  function setupTrack(el) {
    el.classList.remove("vbar-running", "vbar-active");
    const t = computeTravel(el);
    travelMap.set(el, t);
    setOffset(el, t);
  }

  function pinAndBlink(el) {
    setOffset(el, 0);
    el.classList.remove("vbar-running");
    el.classList.add("vbar-active");
    completed.add(el);
    running.delete(el);
  }

  function startRun(el) {
    if (completed.has(el) || running.has(el)) return;
    running.add(el);

    // ensure travel cached (in case of dynamic DOM)
    const t = travelMap.get(el) ?? computeTravel(el);
    travelMap.set(el, t);

    // place at bottom, then trigger transition to top
    setOffset(el, t);

    // force reflow so the following change transitions
    // eslint-disable-next-line no-unused-expressions
    el.offsetHeight;

    el.classList.add("vbar-running");
    setOffset(el, 0);

    // complete only for the transform transition
    const onEnd = (evt) => {
      if (evt.propertyName !== "transform") return;
      el.removeEventListener("transitionend", onEnd);
      pinAndBlink(el);
    };
    el.addEventListener("transitionend", onEnd, { once: false });
  }

  // Observe when tracks enter the viewport to trigger the one-time run
  let io;
  function initObserver() {
    if (io) io.disconnect();
    io = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          const el = entry.target;
          if (entry.isIntersecting && !completed.has(el)) {
            startRun(el);
          }
        }
      },
      { root: null, rootMargin: "0px 0px -10% 0px", threshold: 0.15 }
    );
    tracks.forEach((el) => io.observe(el));
  }

  // ResizeObserver to keep travel cached & accurate without scroll work
  let ro;
  function initResizeObserver() {
    if (ro) ro.disconnect();
    ro = new ResizeObserver((entries) => {
      for (const { target } of entries) {
        if (!(target instanceof Element)) continue;
        // only recompute if not completed or running (don’t yank a running/pinned bar)
        if (!completed.has(target) && !running.has(target)) {
          const t = computeTravel(target);
          travelMap.set(target, t);
          // keep the runner at bottom until it’s time to run
          setOffset(target, t);
        }
      }
    });
    tracks.forEach((el) => ro.observe(el));
  }

  // Overseer head runner – only thing we update during scroll
  function updateRunnerBars() {
    if (!head) return;
    const r = head.getBoundingClientRect();
    const vh = window.innerHeight || document.documentElement.clientHeight;

    let p = (vh - r.top) / (vh + r.height);
    p = Math.max(0, Math.min(1, p));
    p = smoothstep(p);

    head.style.setProperty("--runner-x-top", (p * 100).toFixed(2) + "%");
    head.style.setProperty("--runner-x-bot", ((1 - p) * 100).toFixed(2) + "%");
  }

  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(() => {
      updateRunnerBars(); // no vbar layout work here
      ticking = false;
    });
  }

  function onResize() {
    // On resize, tracks may change height; RO will refresh cache, so nothing to do here
    // Still update head runner position.
    updateRunnerBars();
  }

  // Public API
  const VBar = {
    initTracks(root = document) {
      collect(root);
      tracks.forEach(setupTrack);
      initObserver();
      initResizeObserver();
    },
    initOverseerHead(el = document.querySelector(".overseer-head")) {
      head = el || null;
      updateRunnerBars();
    },
    refresh() {
      // Re-run for added/removed nodes
      collect(document);
      tracks.forEach((el) => {
        if (!completed.has(el) && !running.has(el)) setupTrack(el);
      });
      initObserver();
      initResizeObserver();
      updateRunnerBars();
    },
    reset(el) {
      if (!el) return;
      el.classList.remove("vbar-active", "vbar-running");
      completed.delete(el);
      running.delete(el);
      setupTrack(el);
    },
  };
  window.VBar = VBar;

  const init = () => {
    VBar.initTracks(document);
    VBar.initOverseerHead(document.querySelector(".overseer-head"));
    updateRunnerBars();

    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onResize);
  };

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init, { once: true });
  } else {
    init();
  }
})();
