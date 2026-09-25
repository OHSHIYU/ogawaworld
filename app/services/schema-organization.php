<?php
require_once __DIR__ . '/../config/seo-config.php';
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "@id": "<?= OGW_BASE_URL ?>/#organization",
  "name": "OGAWA Malaysia",
  "url": "<?= OGW_BASE_URL ?>/",
  "logo": "<?= OGW_BASE_URL ?>/assets/images/logo-ogawa.png",
  "sameAs": [
    "https://www.facebook.com/ogawamalaysia",
    "https://www.instagram.com/ogawamalaysia"
  ]
}
</script>
