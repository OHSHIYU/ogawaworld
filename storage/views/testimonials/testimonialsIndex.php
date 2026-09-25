<?php require VIEW_PATH . 'layout/header.php'; ?>

<link rel="stylesheet" href="<?= asset('css/home.css') ?>">
<link rel="stylesheet" href="<?= asset('css/testimonials.css') ?>">
<link rel="stylesheet" href="<?= asset('css/animate.css') ?>">

<section class="t-archive" aria-labelledby="t-archive-title">
  <div class="banner"
       style="background-image:url('<?= asset('img/hero/hero-a.webp') ?>');"
       data-reveal="fade-up"
       style="--reveal-delay: 60ms;">
    <div class="text-center">
      <h1>What People Say</h1>
      <p>Real stories from creators, customers, and media.</p>
      <p class="m-0">Showing <strong><?= number_format($kolTotal) ?></strong> reviews.</p>
    </div>
  </div>

  <div class="p-5">
    <?php if (!empty($kolItems)): ?>
      <div class="t-masonry">
        <?php foreach ($kolItems as $idx => $t):
          $name   = htmlspecialchars($t['name'] ?? 'KOL', ENT_QUOTES, 'UTF-8');
          $plat   = htmlspecialchars($t['platform'] ?? '', ENT_QUOTES, 'UTF-8');
          $handleRaw = isset($t['handle']) ? ltrim((string)$t['handle'], '@') : '';
          $handle    = htmlspecialchars($handleRaw !== '' ? '@'.$handleRaw : '', ENT_QUOTES, 'UTF-8');
          $title  = htmlspecialchars($t['title'] ?? '', ENT_QUOTES, 'UTF-8');
          $desc   = htmlspecialchars($t['description'] ?? '', ENT_QUOTES, 'UTF-8');
          $date   = htmlspecialchars($t['published_on'] ?? '', ENT_QUOTES, 'UTF-8');
          $img    = htmlspecialchars($t['photo_url'] ?? 'https://placehold.co/600x750', ENT_QUOTES, 'UTF-8');
          $srcUrl = trim((string)($t['source_url'] ?? ''));
          $delay  = 80 * ($idx % 8); // stagger in waves of 8
        ?>
          <figure class="t-card"
                  data-reveal="fade-up"
                  style="--reveal-delay: <?= $delay ?>ms;"
                  itemscope itemtype="https://schema.org/Review">
            <div class="t-photo">
              <?php if ($srcUrl !== ''): ?>
                <a href="<?= htmlspecialchars($srcUrl, ENT_QUOTES, 'UTF-8') ?>"
                   target="_blank"
                   rel="nofollow noopener noreferrer"
                   aria-label="Open original review by <?= $name ?>">
                  <img src="<?= $img ?>" alt="<?= $name ?>" loading="lazy" decoding="async"
                       width="600" height="750" itemprop="image">
                </a>
              <?php else: ?>
                <img src="<?= $img ?>" alt="<?= $name ?>" loading="lazy" decoding="async"
                     width="600" height="750" itemprop="image">
              <?php endif; ?>
              <figcaption class="t-tag" itemprop="author" itemscope itemtype="https://schema.org/Person">
                <span itemprop="name"><?= $name ?></span>
              </figcaption>
            </div>

            <figcaption class="t-meta">
              <div class="t-city">
                <?= $plat !== '' ? $plat : '—' ?>
                <?php if ($handle !== ''): ?> · <span><?= $handle ?></span><?php endif; ?>
                <?php if ($date !== ''): ?> · <time datetime="<?= $date ?>" itemprop="datePublished"><?= $date ?></time><?php endif; ?>
              </div>

              <?php if ($title !== ''): ?>
                <p class="t-quote" style="margin-top:6px;"><strong itemprop="name"><?= $title ?></strong></p>
              <?php endif; ?>

              <?php if ($desc !== ''): ?>
                <p class="t-quote" itemprop="reviewBody">“<?= $desc ?>”</p>
              <?php endif; ?>
            </figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p class="t-empty" data-reveal="fade-up" style="--reveal-delay: 120ms;">
        No testimonials available yet. Please check back soon.
      </p>
    <?php endif; ?>

  </div>
</section>

<script>
  // Simple scroll-reveal helper shared with other pages
  (function () {
    const els = document.querySelectorAll('[data-reveal]');
    if (!els.length) return;

    // Respect reduced-motion users
    const prefersReduced = window.matchMedia &&
      window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!('IntersectionObserver' in window) || prefersReduced) {
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
</script>

<?php require VIEW_PATH . 'layout/footer.php'; ?>
