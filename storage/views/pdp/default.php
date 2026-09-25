<?php
require VIEW_PATH . 'layout/header.php';

$bro = $GLOBALS['__BROCHURE__']['images'] ?? [];
$prodHeroSrc = $p['images'][0]['src'] ?? null;
$prodHeroAlt = $p['images'][0]['alt'] ?? $p['name'];
?>
<link rel="stylesheet" href="<?= asset('css/pdp/default.css') ?>">
<link rel="stylesheet" href="<?= asset('css/btn.css') ?>">

<section class="hero">
  <div class="hero-copy">
    <h1><?= e($p['name']) ?></h1>
    <?php if ($p['short']): ?><p class="lead"><?= e($p['short']) ?></p><?php endif; ?>
    <?php if (!empty($p['price_html'])): ?>
      <div class="pd-price"><?= $p['price_html'] ?></div>
    <?php endif; ?>
    <a href="<?= e($p['permalink']) ?>" class="btn-ghost" target="_blank" rel="noopener"
       aria-label="Buy <?= e($p['name']) ?> on Ogawa Store">Buy Now on Ogawa Store <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
  </div>

  <?php if ($prodHeroSrc): ?>
    <picture class="hero-media">
      <img src="<?= e($prodHeroSrc) ?>" alt="<?= e($prodHeroAlt) ?>" loading="eager" decoding="async" fetchpriority="high">
    </picture>
  <?php endif; ?>
</section>

<?php if (!empty($bro)): ?>
<div class="section" aria-labelledby="br-title">
  <div class="gallery">
    <?php foreach ($bro as $i): ?>
      <figure class="gallery-card">
        <img
          src="<?= e($i['url']) ?>"
          alt="<?= e($i['alt'] ?: $p['name']) ?>"
          loading="lazy" decoding="async">
        <?php if (!empty($i['caption'])): ?><figcaption><?= e($i['caption']) ?></figcaption><?php endif; ?>
      </figure>
    <?php endforeach; ?>
  </div>
</div>
<?php elseif (!empty($p['images']) && count($p['images']) > 1): ?>
<div aria-labelledby="gal-title">
  <div class="gallery">
    <?php foreach ($p['images'] as $img): ?>
      <figure class="gallery-card">
        <img src="<?= e($img['src']) ?>" alt="<?= e($img['alt'] ?: $p['name']) ?>" loading="lazy" decoding="async">
      </figure>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php include __DIR__ . '/../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
