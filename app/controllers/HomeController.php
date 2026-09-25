<?php
require_once dirname(__DIR__, 2) . '/app/helpers.php';

$WP_BASE = getenv('WP_BASE') ?: 'https://ogawaworld.net/store';
$WC_BASE = rtrim($WP_BASE, '/');

// --- Fetch Featured Products
$limit = 3;
$storeApiUrl = $WC_BASE . '/wp-json/wc/store/products?' . http_build_query([
  'featured' => 'true',
  'orderby'  => 'date',
  'order'    => 'desc',
  'per_page' => $limit,
]);
$wcProducts = fetch_wp_json_cached($storeApiUrl, 6, 300);
if (!is_array($wcProducts)) $wcProducts = [];

$fallbackImg = 'https://placehold.co/400';
$arrivals = [];

foreach ($wcProducts as $p) {
  $id   = (int)($p['id'] ?? 0);
  $slug = (string)($p['slug'] ?? '');
  $name = (string)($p['name'] ?? 'Product');
  $img  = $p['images'][0]['src'] ?? $fallbackImg;
  $permalink = $p['permalink'] ?? $WC_BASE . '/product/' . rawurlencode($slug) . '/';

  $arrivals[] = [
    'id'         => $id,
    'slug'       => $slug,
    'name'       => $name,
    'image_url'  => $img,
    'is_new'     => true,
    'buy_url'    => $permalink,
    'add_to_cart'=> $id > 0 ? ($WC_BASE . '/?add-to-cart=' . $id) : '',
    'created_at' => $p['date_created'] ?? '',
  ];
}

// --- Ogawa Friends (YouTube)
$FR_URL = $WP_BASE . '/wp-json/wp/v2/og_friends?orderby=menu_order&order=asc&_fields=id,title,youtube_id,youtube_thumb';
$friendsRows = fetch_wp_json_cached($FR_URL, 6, 300);

$friendsVideos = array_map(fn($r) => [
  'id'    => $r['youtube_id'],
  'title' => html_entity_decode(strip_tags($r['title']['rendered']), ENT_QUOTES, 'UTF-8'),
  // Prefer custom thumbnail (youtube_thumb), then YouTube maxres, then hqdefault as last fallback
  'thumb' => $r['youtube_thumb']
              ?? "https://img.youtube.com/vi/{$r['youtube_id']}/maxresdefault.jpg",
  'url'   => "https://www.youtube.com/watch?v={$r['youtube_id']}",
], array_filter((array)$friendsRows, fn($r) => !empty($r['youtube_id'])));

// --- Promo Banners
$promoBanners = [
    'left' => null,
    'right_top' => null,
    'right_bottom' => null
];

try {
    $db = DB::conn();

    $stmt = $db->prepare("
        SELECT *
        FROM cms_promo_banners
        WHERE is_active = 1
          AND panel IN ('left', 'right_top', 'right_bottom')
        ORDER BY sort_order ASC
    ");
    $stmt->execute();
    $res = $stmt->get_result();

    while ($row = $res->fetch_assoc()) {
        $key = trim($row['panel']);

        if (array_key_exists($key, $promoBanners)) {
            $promoBanners[$key] = $row;
        }
    }

} catch (\Exception $e) {
    // silent fail
}

// --- Render view
require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
  'title' => 'OGAWA Malaysia | Premium Massage Chairs & Wellness Products',
  'description' => 'Explore OGAWA Malaysia premium massage chairs and wellness products. Discover technology, products, reviews, warranty and support.',
]);
require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'home/homeIndex.php';
require VIEW_PATH . 'layout/footer.php';
