<link rel="stylesheet" href="<?= asset('css/manuals.css') ?>">

<section class="man-hero" style="--hero:url('<?= asset('img/product/product-bg.avif') ?>');">
  <div class="man-hero__inner">
    <h1 class="man-hero__title">Manuals & Downloads</h1>
    <p class="man-hero__sub">
      Search your product and download the official user manual (PDF).
    </p>

    <form class="man-search" method="GET">
      <input name="q"
             type="search"
             value="<?= e($_GET['q'] ?? '') ?>"
             placeholder="Search product name..."
             autocomplete="off">
      <button class="btn" type="submit">Search</button>
    </form>
  </div>
</section>

<section class="man-list">
  <div class="man-list__inner">
    <div class="man-grid">

      <?php if(empty($manuals)): ?>
        <div class="man-empty">
          <h3>No manuals available</h3>
        </div>
      <?php else: ?>

        <?php foreach($manuals as $m): ?>
          <article class="man-card">

            <div class="man-card__main">
              <div class="man-card__title">
                <?= e($m['title']) ?>
              </div>

              <?php if($m['type'] === 'woo'): ?>
                <a class="man-card__link"
                   href="<?= url($m['slug']) ?>">
                   View product
                </a>
              <?php endif; ?>
            </div>

            <a class="btn btn-solid"
               href="<?= url('user-manual/' . $m['slug']) ?>">
               View Manual
            </a>

          </article>
        <?php endforeach; ?>

      <?php endif; ?>

    </div>
  </div>
</section>
