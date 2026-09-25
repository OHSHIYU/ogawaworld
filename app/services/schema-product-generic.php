<?php
$hero = !empty($p['hero_image']) ? OGW_BASE_URL . $p['hero_image'] : OGW_DEFAULT_OG_IMAGE;
$desc = !empty($p['short_desc']) ? $p['short_desc'] : $p['name'];

$canonical = OGW_BASE_URL . $_SERVER['REQUEST_URI'];
$storeUrl  = !empty($p['permalink']) ? $p['permalink'] : null;
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "@id": "<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') ?>#product",
  "name": "<?= htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8') ?>",
  "image": [
    "<?= htmlspecialchars($hero, ENT_QUOTES, 'UTF-8') ?>"
  ],
  "description": "<?= htmlspecialchars($desc, ENT_QUOTES, 'UTF-8') ?>",
  "brand": {
    "@type": "Brand",
    "name": "OGAWA"
  }<?php if ($storeUrl): ?>,
  "sameAs": [
    "<?= htmlspecialchars($storeUrl, ENT_QUOTES, 'UTF-8') ?>"
  ]<?php endif; ?>
  <?php if (!empty($p['price'])): ?>,
  "offers": {
    "@type": "Offer",
    "url": "<?= htmlspecialchars($storeUrl ?: $canonical, ENT_QUOTES, 'UTF-8') ?>",
    "priceCurrency": "MYR",
    "price": "<?= htmlspecialchars($p['price'], ENT_QUOTES, 'UTF-8') ?>",
    "availability": "https://schema.org/InStock"
  }
  <?php endif; ?>
}
</script>
