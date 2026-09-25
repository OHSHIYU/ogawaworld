<?php
/**
 * TestimonialsController
 * Fetches KOL Reviews from WordPress REST API
 * Uses shared fetch_wp_json_cached() helper (same as HomeController)
 */

require_once dirname(__DIR__) . '/helpers.php';

/**
 * ------------------------------------------------------------------
 * Config
 * ------------------------------------------------------------------
 */
$WP_BASE   = getenv('WP_BASE') ?: 'https://ogawaworld.net/store';
$WP_PATH   = '/wp-json/wp/v2/kol_review';
$WP_FIELDS = 'id,date,title,content,link,meta_fields';

$PER_PAGE  = 100;   // Max items per request
$TTL_MIN   = 6;     // Cache TTL (minutes)
$TTL_SEC   = 300;   // Cache TTL (seconds)

/**
 * ------------------------------------------------------------------
 * Helpers
 * ------------------------------------------------------------------
 */
if (!function_exists('ellipsize_plain')) {
  function ellipsize_plain(string $html, int $len = 160): string {
    $txt = trim(strip_tags($html));
    if ($txt === '') return '';
    if (mb_strlen($txt) <= $len) return $txt;
    $cut = mb_substr($txt, 0, $len);
    $pos = mb_strrpos($cut, ' ');
    return ($pos !== false ? mb_substr($cut, 0, $pos) : $cut) . '…';
  }
}

if (!function_exists('map_review_row')) {
  function map_review_row(array $row): array {
    $meta  = $row['meta_fields'] ?? [];
    $photo = $meta['media_urls'][0] ?? 'https://placehold.co/600x750';

    return [
      'name'         => $meta['kol_name'] ?? 'KOL',
      'platform'     => $meta['platform'] ?? '',
      'handle'       => ltrim((string)($meta['handle'] ?? ''), '@'),
      'published_on' => $meta['published_on'] ?? substr((string)($row['date'] ?? ''), 0, 10),
      'photo_url'    => $photo,
      'title'        => html_entity_decode(
        strip_tags($row['title']['rendered'] ?? ''),
        ENT_QUOTES,
        'UTF-8'
      ),
      'description'  => ellipsize_plain($row['content']['rendered'] ?? ''),
      'source_url'   => $meta['source_url'] ?? ($row['link'] ?? ''),
    ];
  }
}

/**
 * ------------------------------------------------------------------
 * Fetch KOL Reviews (same HTTP client as ogawa-friends)
 * ------------------------------------------------------------------
 */
$query = http_build_query([
  'per_page' => $PER_PAGE,
  'orderby'  => 'date',
  'order'    => 'desc',
  '_fields'  => $WP_FIELDS,
]);

$url = rtrim($WP_BASE, '/') . $WP_PATH . '?' . $query;

/**
 * IMPORTANT:
 * fetch_wp_json_cached() is the SAME helper used by:
 * - Ogawa Friends
 * - WooCommerce products
 * - Other working REST calls
 */
$kolRaw = fetch_wp_json_cached($url, $TTL_MIN, $TTL_SEC);

if (!is_array($kolRaw)) {
  $kolRaw = [];
}

/**
 * ------------------------------------------------------------------
 * Prepare data for views
 * ------------------------------------------------------------------
 */
$kolItems = array_map('map_review_row', $kolRaw);
$kolTotal = count($kolItems);

// Shared usage (home / other pages)
$kolTestimonials = $kolItems;
$kolHome         = array_slice($kolItems, 0, 4);
