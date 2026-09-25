<?php
require_once dirname(__DIR__) . '/helpers.php';

$WP_BASE    = getenv('WP_BASE') ?: 'https://ogawaworld.net/store';
$STORE_BASE = rtrim($WP_BASE, '/') . '/wp-json/wc/store';
$SHOP_URL   = rtrim($WP_BASE, '/') . '/shop/';
$CACHE_DIR  = dirname(__DIR__, 2) . '/storage/cache';

$catImgFallback       = asset('img/product/category-fallback.avif');
$productThumbFallback = 'https://placehold.co/600x600.png';
$allProductsIcon      = asset('img/favicon/brown-icon-2134.png');

// ---- Internal helpers ----

// Cached WooCommerce API fetch
function store_get_json_cached(string $path, array $params = [], int $timeout = 8, int $ttl = 300): ?array {
  global $STORE_BASE, $CACHE_DIR;
  $url  = rtrim($STORE_BASE, '/') . '/' . ltrim($path, '/');
  if ($params) $url .= '?' . http_build_query($params);
  $key  = 'store_' . md5($url);
  $file = $CACHE_DIR . '/' . $key . '.json';

  if (is_file($file) && (time() - filemtime($file) < $ttl)) {
    $json = json_decode(file_get_contents($file), true);
    if (is_array($json)) return $json;
  }

  $data = fetch_wp_json_cached($url, $timeout, $ttl);
  if ($data) @file_put_contents($file, json_encode($data));
  return $data;
}

// Fetch categories
function store_get_categories_all(): array {
  $perPage = 100; $page = 1; $all = [];
  while (true) {
    $rows = store_get_json_cached('products/categories', [
      'per_page'  => $perPage,
      'page'      => $page,
      'hide_empty'=> false,
    ]);
    if (!is_array($rows) || empty($rows)) break;
    $all = array_merge($all, $rows);
    if (count($rows) < $perPage || $page++ > 10) break;
  }
  return $all;
}

// ---- Data assembly ----
// "All Products" stays first
$categories = [[
  'id'        => 'all',
  'name'      => 'All Products',
  'slug'      => 'all',
  'image_url' => $allProductsIcon,
  'url'       => $SHOP_URL,
]];

// fetch all cats from API
$rawCats = store_get_categories_all();

// remove "uncategorized"
$rawCats = array_filter($rawCats, function ($c) {
  return ($c['slug'] ?? '') !== 'uncategorized';
});

// desired order by slug (edit this any time you want to change the sequence)
$catOrder = [
  'massage-chairs',
  'back-massagers',
  'fitness-equipment',
  'foot-massagers',
  'portable-massagers',
  'lifestyle-series',
  'massage',
];
$orderMap = array_flip($catOrder);

// sort using our custom order; anything not listed goes to the end A-Z
usort($rawCats, function ($a, $b) use ($orderMap) {
  $aSlug = $a['slug'] ?? '';
  $bSlug = $b['slug'] ?? '';

  // position in our desired order (unknown slugs get 9999 so they go to the end)
  $aPos = $orderMap[$aSlug] ?? 9999;
  $bPos = $orderMap[$bSlug] ?? 9999;

  if ($aPos === $bPos) {
    // same position or both "unknown": fallback alphabetical by name
    return strcasecmp($a['name'] ?? '', $b['name'] ?? '');
  }

  return $aPos <=> $bPos;
});

// now build the array used by the view
foreach ($rawCats as $c) {
  $categories[] = [
    'id'        => (int)($c['id'] ?? 0),
    'name'      => html_entity_decode((string)($c['name'] ?? ''), ENT_QUOTES, 'UTF-8'),
    'slug'      => (string)($c['slug'] ?? ''),
    'image_url' => (isset($c['image']['src']) ? $c['image']['src'] : $catImgFallback),
    'url'       => $c['permalink'] ?? ($SHOP_URL . 'category/' . ($c['slug'] ?? '') . '/'),
  ];
}

// ---- Render View ----
require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
  'title' => 'Products | OGAWA Malaysia',
  'description' => 'Browse OGAWA Malaysia products including massage chairs and wellness solutions. View product information and features.',
  'og_type' => 'website',
]);
require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'products/productsIndex.php';
require VIEW_PATH . 'layout/footer.php';
