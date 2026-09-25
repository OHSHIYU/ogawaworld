<?php
require_once dirname(__DIR__) . '/helpers.php';

$db = DB::conn();
$slug = $_GET['slug'] ?? null;

if (!$slug) {
    http_response_code(404);
    require VIEW_PATH . 'layout/404.php';
    exit;
}

/**
 * Find manual in DB
 */
$stmt = $db->prepare("
    SELECT *
    FROM product_manuals
    WHERE (wc_slug=? OR legacy_slug=?)
    AND status=1
    LIMIT 1
");
$stmt->bind_param("ss", $slug, $slug);
$stmt->execute();
$manualRow = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$manualRow) {
    http_response_code(404);
    require VIEW_PATH . 'layout/404.php';
    exit;
}

$productName = '';
$productSlug = '';

if ($manualRow['source'] === 'woo') {

    $WP_BASE = getenv('WP_BASE') ?: 'https://ogawaworld.net/store';

    $json = fetch_wp_json_cached(
        rtrim($WP_BASE, '/') . "/wp-json/wc/store/products?slug=" . urlencode($manualRow['wc_slug']),
        8,
        600
    );

    if (!empty($json[0])) {
        $p = $json[0];
        $productName = html_entity_decode($p['name'], ENT_QUOTES, 'UTF-8');
        $productSlug = $p['slug'];
    } else {
        // fallback if Woo API fails
        $productName = $manualRow['wc_slug'];
        $productSlug = $manualRow['wc_slug'];
    }

} else {

    $productName = $manualRow['legacy_title'];
    $productSlug = $manualRow['legacy_slug'];
}

$pdfUrl = asset($manualRow['manual_file']);

/**
 * SEO
 */
require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
    'title' => $productName . ' User Manual | OGAWA Malaysia',
    'description' => 'Download the official user manual for ' . $productName . '.',
    'og_type' => 'article',
]);

require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'manuals/manualDetail.php';
require VIEW_PATH . 'layout/footer.php';
