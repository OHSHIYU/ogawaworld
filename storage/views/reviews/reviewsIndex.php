<?php
// Trustindex settings
$TRUSTINDEX_WIDGET_ID = 'dce6e5b56f8e983bef6614708dc';
$TRUSTINDEX_LOADER    = "https://cdn.trustindex.io/loader.js?$TRUSTINDEX_WIDGET_ID";
?>

<link rel="stylesheet" href="<?= asset('css/reviews.css') ?>">
<script src="https://elfsightcdn.com/platform.js" async></script>

<div class="reviews-hero"
     style="background-image:url('<?= asset('img/hero/hero-b.webp') ?>');"
     data-reveal="fade-up"
     style="--reveal-delay: 60ms;">
  <div class="row align-items-center text-center">
    <div>
      <span class="badge-google">
        <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
          <path fill="#4285F4" d="M21.35 11.1h-9.18v2.99h5.44c-.24 1.48-1.64 4.34-5.44 4.34-3.27 0-5.94-2.7-5.94-6.03s2.67-6.03 5.94-6.03c1.86 0 3.1.79 3.81 1.47l2.6-2.5C17.59 3.41 15.53 2.5 12.17 2.5 6.91 2.5 2.5 6.91 2.5 12.17S6.91 21.83 12.17 21.83c7.01 0 9.33-4.92 9.33-7.45 0-.5-.05-.82-.15-1.28z"/>
        </svg>
        Google Reviews
      </span>
      <h1 class="display-5 fw-semibold mt-3">What our customers say</h1>
      <p class="lead mb-0">Real reviews collected via Trustindex from our Google Business profile.</p>
    </div>
  </div>
</div>

<main class="m-5">
  <div class="container">

      <!-- Wrap Elfsight widget so we can animate it -->
      <section class="reviews-widget">
        <div class="elfsight-app-1966d911-0ce0-4229-92ce-57c5be47d265" data-elfsight-app-lazy></div>
      </section>

      <div class="text-center mt-3">
        <a href="https://www.google.com/maps/place/OGAWA+Malaysia/@2.986191,101.5442457,17z/data=!4m8!3m7!1s0x31cdb214c71370e3:0xd55663dff935469!8m2!3d2.986191!4d101.5442457!9m1!1b1!16s%2Fg%2F1tj43dlw?entry=ttu&g_ep=EgoyMDI1MTAyMi4wIKXMDSoASAFQAw%3D%3D" 
            class="btn-ghost"
            target="_tab">
            View More <i class="fa-solid fa-arrow-up-right-from-square"></i>
        </a>
      </div>
  </div>
</main>

<script>
  // Scroll-reveal helper (same pattern as Products/About)
  (function () {
    const els = document.querySelectorAll('[data-reveal]');
    if (!els.length) return;

    if (!('IntersectionObserver' in window)) {
      els.forEach(el => el.classList.add('is-visible'));
      return;
    }

    const io = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -10% 0px' });

    els.forEach(el => io.observe(el));
  })();

  // (Optional) old Trustindex lazy loader – safe, just no-op while #ti-mount is commented
  (function () {
    var mount = document.getElementById('ti-mount');
    if (!mount) return;

    function injectWidget() {
      if (mount.dataset.loaded) return;
      mount.dataset.loaded = "1";

      var widget = document.createElement('div');
      widget.className = 'ti-widget';
      widget.setAttribute('data-widget-id', '<?= $TRUSTINDEX_WIDGET_ID ?>');
      mount.innerHTML = '';
      mount.appendChild(widget);

      var s = document.createElement('script');
      s.src = '<?= $TRUSTINDEX_LOADER ?>';
      s.async = true;
      s.defer = true;
      mount.appendChild(s);
    }

    if ('IntersectionObserver' in window) {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) { injectWidget(); io.disconnect(); }
        });
      }, { rootMargin: '200px 0px' });
      io.observe(mount);
    } else {
      injectWidget();
    }
  })();
</script>

<!-- Elfsight Google Reviews | Untitled Google Reviews -->
