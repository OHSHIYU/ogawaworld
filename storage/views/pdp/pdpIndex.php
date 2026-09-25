<?php
require_once __DIR__ . '/../../../app/services/seo.php';

$slugDir  = __DIR__ . '/' . basename($p['slug']);   // e.g. .../views/pdp/ogawa-by-...
$template = $slugDir . '/brochure.php';

if (!file_exists($template)) {
  $template = __DIR__ . '/default.php';
}

// Build SEO data for this product
$seoData = [
    'title'       => !empty($p['seo_title'])
        ? $p['seo_title']
        : $p['name'] . ' – OGAWA Malaysia',
    'description' => !empty($p['seo_description'])
        ? $p['seo_description']
        : 'Discover ' . $p['name'] . ' from OGAWA Malaysia – premium massage and wellness solution.',
    'og_image'    => !empty($p['hero_image'])
        ? OGW_BASE_URL . $p['hero_image']
        : OGW_DEFAULT_OG_IMAGE,
    'og_type'     => 'product',
];

// Expose it to the layout/header
$GLOBALS['ogw_seo'] = $seoData;

// JSON-LD product schema (OK to output in body, so after header)
require $template;

// If we're on a PDP (controller built $p with a buy link), render sticky buy bar
if (!empty($p) && !empty($p['permalink'])) {
  include VIEW_PATH . 'pdp/shared/stickyBuy.php';
}
