<link rel="stylesheet" href="<?= asset('css/legal.css') ?>">

<section>
  <?php if ($active): ?>
    <div class="lv-banner" style="background-image:url('<?= asset('img/hero/hero-c.webp') ?>');">
      <h1 class="lv-banner__title"><?= e($active['title']) ?></h1>
    </div>
  <?php endif; ?>

  <div class="lv-grid">
    <aside class="lv-side">
      <ul class="lv-nav">
        <?php foreach ($entries as $e):
          $isActive = isset($active['slug']) && $e['slug'] === $active['slug'];
        ?>
          <li>
            <a href="<?= url(urlencode($e['slug'])) ?>"
               class="lv-nav__link <?= $isActive ? 'is-active' : '' ?>">
              <span class="lv-nav__dot" aria-hidden="true"></span>
              <span class="lv-nav__text"><?= e($e['title']) ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </aside>

    <main class="lv-main">
      <?php if ($active): ?>
        <div class="lv-updated">
          Updated <?= date('M j, Y', strtotime($active['updated_at'])) ?>
        </div>
        <article class="legal-content">
          <?= $active['content_html'] ?? '' ?>
        </article>
      <?php else: ?>
        <p>No legal entries found.</p>
      <?php endif; ?>
    </main>
  </div>
</section>
