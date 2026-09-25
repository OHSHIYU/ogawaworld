// scroll-animate.js
(function () {
  const els = document.querySelectorAll("[data-reveal]");
  if (!("IntersectionObserver" in window) || !els.length) {
    // Fallback: show everything
    els.forEach((el) => el.classList.add("is-visible"));
    return;
  }

  const io = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const el = entry.target;

          // Optional delay from data-delay (in ms)
          const delayAttr = el.getAttribute("data-delay");
          if (delayAttr) {
            el.style.setProperty(
              "--reveal-delay",
              `${parseInt(delayAttr, 10)}ms`
            );
          }

          el.classList.add("is-visible");
          obs.unobserve(el); // animate once; remove for repeat-on-scroll
        }
      });
    },
    {
      root: null,
      rootMargin: "0px 0px -8% 0px", // slightly earlier reveal
      threshold: 0.15,
    }
  );

  els.forEach((el) => io.observe(el));
})();
