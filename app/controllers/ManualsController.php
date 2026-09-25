<?php
require_once dirname(__DIR__) . '/helpers.php';

$db = DB::conn();
$WP_BASE = getenv('WP_BASE') ?: 'https://ogawaworld.net/store';

/**
 * Fetch all active manuals
 */
$stmt = $db->query("
    SELECT *
    FROM product_manuals
    WHERE status = 1
    ORDER BY sort_order, id
");

$manualRows = $stmt->fetch_all(MYSQLI_ASSOC);

/**
 * Fetch Woo product info for Woo manuals
 */
$wooProducts = [];

foreach ($manualRows as $row) {
    if ($row['source'] === 'woo' && $row['wc_slug']) {

        $slug = urlencode($row['wc_slug']);

        $json = fetch_wp_json_cached(
            rtrim($WP_BASE, '/') . "/wp-json/wc/store/products?slug={$slug}",
            8,
            600
        );

        if (!empty($json[0])) {
            $p = $json[0];
            $wooProducts[$row['wc_slug']] = [
                'name' => html_entity_decode($p['name'], ENT_QUOTES, 'UTF-8'),
                'slug' => $p['slug'],
            ];
        }
    }
}

/**
 * Build final manual list
 */
$manuals = [];

foreach ($manualRows as $row) {

    if ($row['source'] === 'woo') {

        $slug = $row['wc_slug'];
        $product = $wooProducts[$slug] ?? null;

        if (!$product) continue;

        $manuals[] = [
            'title' => $product['name'],
            'slug'  => $product['slug'],
            'pdf'   => asset($row['manual_file']),
            'type'  => 'woo'
        ];
    }

    else {

        $manuals[] = [
            'title' => $row['legacy_title'],
            'slug'  => $row['legacy_slug'],
            'pdf'   => asset($row['manual_file']),
            'type'  => 'legacy'
        ];
    }
}

$q = trim($_GET['q'] ?? '');

if ($q !== '') {
    $manuals = array_filter($manuals, function($m) use ($q) {
        return stripos($m['title'], $q) !== false;
    });
}

/**
 * SEO
 */
require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
    'title' => 'Manuals & Downloads | OGAWA Malaysia',
    'description' => 'Download official OGAWA product user manuals.',
    'og_type' => 'website',
]);

require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'manuals/manualsIndex.php';
require VIEW_PATH . 'layout/footer.php';
