<?php
require_once __DIR__ . '/seo.php';

function ogw_set_seo(array $data = []): void
{
    // Keep canonical clean (no query string)
    $pathOnly = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';

    $defaults = [
        'title'       => 'OGAWA Malaysia',
        'description' => 'OGAWA Malaysia official website for premium massage chairs and wellness products.',
        'canonical'   => OGW_BASE_URL . $pathOnly,
        'og_image'    => OGW_DEFAULT_OG_IMAGE,
        'og_type'     => 'website',
        'robots'      => null,
    ];

    // Merge + expose to header
    $GLOBALS['ogw_seo'] = array_merge($defaults, $GLOBALS['ogw_seo'] ?? [], $data);
}
