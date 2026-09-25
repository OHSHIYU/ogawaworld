<link rel="stylesheet" href="<?= asset('css/about.css') ?>">
<link rel="stylesheet" href="<?= asset('css/animate.css') ?>">

<section class="about-hero px-5">
  <div class="about-hero__card" data-reveal="fade-up" style="--reveal-delay: 80ms;">
    <?php if (!empty($b['eyebrow'])): ?><p class="eyebrow"><?= e($b['eyebrow']) ?></p><?php endif; ?>
    <?php if (!empty($b['title'])): ?><h1 class="about-hero__title"><?= e($b['title']) ?></h1><?php endif; ?>
    <?php if (!empty($b['body'])): ?><p class="about-hero__body"><?= nl2br(e($b['body'])) ?></p><?php endif; ?>
  </div>

  <figure class="about-hero__media" data-reveal="zoom-in" style="--reveal-delay: 150ms;">
    <img src="<?= asset($b['image'] ?? 'img/about/hero.webp') ?>" alt="Founders collaborating" loading="lazy">
  </figure>

  <?php if (!empty($about['stats'])): ?>
  <div class="about-stats">
    <?php foreach ($about['stats'] as $i => $s): ?>
      <div
        class="stat"
        data-reveal="fade-up"
        style="--reveal-delay: <?= 220 + $i * 90 ?>ms;"
      >
        <div class="stat__value"><?= e($s['value']) ?></div>
        <div class="stat__label"><?= e($s['label']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
</section>

<?php if (!empty($about['cards'])): ?>
<section class="about-cards px-5">
  <?php foreach ($about['cards'] as $i => $c): ?>
    <article
      class="kv-card"
      data-reveal="fade-up"
      style="--reveal-delay: <?= 120 + $i * 120 ?>ms;"
    >
      <?php if (!empty($c['eyebrow'])): ?><p class="eyebrow"><?= e($c['eyebrow']) ?></p><?php endif; ?>
      <?php if (!empty($c['title'])): ?><h3 class="kv-card__title"><?= e($c['title']) ?></h3><?php endif; ?>
      <?php if (!empty($c['body'])): ?><p class="kv-card__body"><?= nl2br(e($c['body'])) ?></p><?php endif; ?>
    </article>
  <?php endforeach; ?>
</section>
<?php endif; ?>

<?php if (!empty($about['awards']['items'])): ?>
<section class="awards px-5" data-awards data-reveal="fade-up" style="--reveal-delay: 120ms;">
  <h2 class="title"><?= e($about['awards']['title']) ?></h2>
  <div class="aw-carousel">
    <div class="aw-viewport" aria-roledescription="carousel">
      <div class="aw-track" data-track>
        <?php foreach ($about['awards']['items'] as $i => $a): ?>
          <div class="aw-slide">
            <div
              class="aw-card"
              data-reveal="fade-up"
              style="--reveal-delay: <?= 200 + $i * 80 ?>ms;"
            >
              <img class="aw-card__logo" src="<?= asset($a['logo']) ?>" alt="<?= e($a['name'] ?? 'Award') ?>">
              <div class="aw-card__name"><?= e($a['name'] ?? '') ?></div>
              <div class="aw-card__meta"><?= e($a['year'] ?? '') ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="aw-controls">
      <button type="button" class="aw-nav" aria-label="Previous" data-prev>‹</button>
      <div class="aw-dots" data-dots></div>
      <button type="button" class="aw-nav" aria-label="Next" data-next>›</button>
    </div>
  </div>
</section>
<?php endif; ?>

<script src="<?= asset('js/awards.js') ?>" defer></script>

<!-- Scroll-reveal helper for animate.css (slow + smooth) -->
<script>
  (function () {
    const elements = document.querySelectorAll('[data-reveal]');
    if (!elements.length) return;

    // Fallback: if IntersectionObserver not supported, just show everything
    if (!('IntersectionObserver' in window)) {
      elements.forEach(el => el.classList.add('is-visible'));
      return;
    }

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.15
    });

    elements.forEach(el => observer.observe(el));
  })();
</script>
