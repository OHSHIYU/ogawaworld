<?php
require_once dirname(__DIR__) . '/helpers.php';

$WP_BASE    = getenv('WP_BASE') ?: 'https://ogawaworld.net/store';
$STORE_BASE = rtrim($WP_BASE, '/') . '/wp-json/wc/store';
$OGW_API    = rtrim($WP_BASE, '/') . '/wp-json/ogw/v1';

$slug = strtolower(trim((string)($_GET['slug'] ?? '')));

$productFound = false;

if ($slug === '' || !preg_match('~^[a-z0-9\-]+$~', $slug)) {
  return;
}

$canonical_url = rtrim(getenv('BASE_URL') ?: 'https://ogawaworld.net', '/') . '/' . rawurlencode($slug) . '/';

function store_get(string $path, array $params = [], int $timeout = 8, int $ttl = 300) {
  global $STORE_BASE;
  $url = rtrim($STORE_BASE, '/') . '/' . ltrim($path, '/') . ($params ? '?' . http_build_query($params) : '');

  if (function_exists('fetch_wp_json_cached')) {
    return fetch_wp_json_cached($url, $timeout, $ttl);
  }

  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => $timeout,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_HTTPHEADER     => ['Accept: application/json'],
  ]);
  $resp = curl_exec($ch);
  curl_close($ch);

  return json_decode((string)$resp, true);
}

function ogw_get(string $path, array $params = [], int $timeout = 8, int $ttl = 300) {
  global $OGW_API;
  $url = rtrim($OGW_API, '/') . '/' . ltrim($path, '/') . ($params ? '?' . http_build_query($params) : '');

  if (function_exists('fetch_wp_json_cached')) {
    return fetch_wp_json_cached($url, $timeout, $ttl);
  }

  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => $timeout,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_HTTPHEADER     => ['Accept: application/json'],
  ]);
  $resp = curl_exec($ch);
  curl_close($ch);

  return json_decode((string)$resp, true);
}

// Fetch product by slug
$rows = store_get('products', ['slug' => $slug, 'per_page' => 1]);

if (!is_array($rows) || empty($rows)) {
  $productFound = false;
  return;
}

$raw = $rows[0];

// -------------------------------------------------------
// CORPORATE CHANNEL GATE
// Fetch og_channel from our custom REST endpoint and block
// corporate products from being accessible / indexed.
// -------------------------------------------------------
$_assets = ogw_get('product-assets', ['ids' => (int)$raw['id']], 6, 300);
$_channel = '';
if (is_array($_assets) && isset($_assets[(string)$raw['id']]['channel'])) {
    $_channel = strtolower(trim((string)$_assets[(string)$raw['id']]['channel']));
} elseif (is_array($_assets) && isset($_assets[$raw['id']]['channel'])) {
    $_channel = strtolower(trim((string)$_assets[$raw['id']]['channel']));
}

$_allowed_channels = ['online', 'retail', 'affiliate'];
if ($_channel !== '' && !in_array($_channel, $_allowed_channels, true)) {
    // Block corporate, affiliate, no_channel, and any future unknown channels
    $productFound = false;
    return;
}
// -------------------------------------------------------

$productFound = true;

// Fetch variations
$variations = [];
if (($raw['type'] ?? '') === 'variable') {
  $variations = store_get("products/{$raw['id']}/variations", ['per_page' => 100]) ?: [];
}

// Map view model
$images = [];
foreach ((array)($raw['images'] ?? []) as $img) {
  if (!empty($img['src'])) {
    $images[] = ['src' => $img['src'], 'alt' => $img['alt'] ?? ''];
  }
}

$p = [
  'id'         => (int)$raw['id'],
  'name'       => html_entity_decode((string)$raw['name'], ENT_QUOTES, 'UTF-8'),
  'slug'       => (string)$raw['slug'],
  'short'      => trim(strip_tags(html_entity_decode((string)($raw['short_description'] ?? ''), ENT_QUOTES, 'UTF-8'))),
  'desc_html'  => (string)($raw['description'] ?? ''),
  'images'     => $images,
  'price_html' => $raw['prices']['price_html'] ?? '',
  'in_stock'   => !empty($raw['is_in_stock']),
  'attrs'      => $raw['attributes'] ?? [],
  'variations' => $variations,
  'permalink'  => $raw['permalink'] ?? rtrim($WP_BASE, '/') . '/product/' . $slug . '/',
  'og_channel' => $_channel, // pass through for use in views/schema if needed
];

$GLOBALS['__CANONICAL__'] = $canonical_url;
$permalink = $p['permalink'];

// Fetch brochure images via our plugin
$brochure = ogw_get('brochure', ['product_id' => $p['id']], 6, 120);
$brochureImages = is_array($brochure['images'] ?? null) ? $brochure['images'] : [];

$GLOBALS['__BROCHURE__'] = [
  'images' => $brochureImages,
];
