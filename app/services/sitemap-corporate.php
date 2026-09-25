<?php
// app/services/sitemap-corporate.php
require_once __DIR__ . '/../config/seo-config.php';

// If your fetch_wp_json_cached() lives in helpers.php, include it.
// Adjust path if your helpers file is somewhere else.
// Comment this out if helpers are already loaded globally.
$helpersPath = __DIR__ . '/../helpers.php';
if (is_file($helpersPath)) {
    require_once $helpersPath;
}

/**
 * Reserved root slugs (must not be treated as product PDP routes)
 * Keep this consistent with routes.php.
 */
function ogw_reserved_slugs(): array {
    return [
        '', 'home',
        'testimonials',
        'about',
        'technology',
        'products',
        'reviews',
        'store-locator',
        'faq',
        'contact',
        'warranty',
        'legal',
        'dev',
        'sitemap.xml',
        'robots.txt',
        // common static folders
        'uploads',
        'css',
        'js',
        'img',
    ];
}

function ogw_is_reserved_slug(string $slug): bool {
    $slug = strtolower(trim($slug));
    return in_array($slug, ogw_reserved_slugs(), true);
}

/**
 * Add a URL row to sitemap list
 */
function ogw_sitemap_add(
    array &$urls,
    string $path,
    ?int $lastmodTs = null,
    string $changefreq = 'weekly',
    string $priority = '0.6'
): void {
    $path = '/' . ltrim($path, '/');

    // ensure trailing slash for pretty URLs
    if ($path !== '/' && !str_ends_with($path, '/')) $path .= '/';

    $loc = rtrim(OGW_BASE_URL, '/') . $path;

    $row = [
        'loc'        => $loc,
        'changefreq' => $changefreq,
        'priority'   => $priority,
    ];

    if ($lastmodTs) {
        $row['lastmod'] = gmdate('Y-m-d\TH:i:s\Z', $lastmodTs);
    }

    $urls[] = $row;
}

/**
 * Fetch product slugs from WooCommerce site via WP REST endpoint:
 *   /wp-json/ogawa/v1/products?fields=slug,modified&per_page=100&page=1
 *
 * Requires the MU-plugin on the WordPress /store site.
 */
function ogw_sitemap_fetch_product_slugs_from_wp(): array
{
    $wpBase = getenv('WP_BASE') ?: 'https://ogawaworld.net/store';

    $endpointBase = rtrim($wpBase, '/') . '/wp-json/ogawa/v1/products';
    $perPage = 100;
    $page = 1;

    $out = [];

    while (true) {
        $url = $endpointBase . '?' . http_build_query([
            'fields'   => 'slug,modified',
            'per_page' => $perPage,
            'page'     => $page,
        ]);

        // Use cached fetcher if available; otherwise basic file_get_contents fallback
        if (function_exists('fetch_wp_json_cached')) {
            $data = fetch_wp_json_cached($url, 8, 600);
        } else {
            $json = @file_get_contents($url);
            $data = $json ? json_decode($json, true) : null;
        }

        if (!is_array($data) || empty($data)) break;

        foreach ($data as $row) {
            if (empty($row['slug'])) continue;

            $slug = strtolower(trim((string)$row['slug']));
            if ($slug === '' || !preg_match('~^[a-z0-9\-]+$~', $slug)) continue;

            $out[] = [
                'slug'      => $slug,
                'lastmodTs' => !empty($row['modified']) ? strtotime((string)$row['modified']) : null,
            ];
        }

        // if returned less than perPage, no more pages
        if (count($data) < $perPage) break;

        $page++;
        if ($page > 200) break; // safety
    }

    return $out;
}

/**
 * Output corporate sitemap XML
 * Canonical PDP URL is now: /{product-slug}/
 */
function ogw_output_corporate_sitemap_xml(): void
{
    header('Content-Type: application/xml; charset=UTF-8');

    $urls = [];

    // -----------------------
    // A) Core corporate pages
    // -----------------------
    ogw_sitemap_add($urls, '/', null, 'daily', '1.0');
    ogw_sitemap_add($urls, '/about/', null, 'monthly', '0.7');

    // Technology (add more if you have)
    ogw_sitemap_add($urls, '/technology/overseer/', null, 'monthly', '0.7');

    // Products index + other main pages (PLP still at /products/)
    ogw_sitemap_add($urls, '/products/', null, 'weekly', '0.8');
    ogw_sitemap_add($urls, '/reviews/', null, 'weekly', '0.6');
    ogw_sitemap_add($urls, '/store-locator/', null, 'weekly', '0.6');
    ogw_sitemap_add($urls, '/faq/', null, 'monthly', '0.6');
    ogw_sitemap_add($urls, '/contact/', null, 'monthly', '0.5');

    // Warranty (indexable informational only)
    ogw_sitemap_add($urls, '/warranty/', null, 'monthly', '0.4');
    ogw_sitemap_add($urls, '/warranty/leather-warranty/', null, 'yearly', '0.3');

    // Testimonials (if indexable)
    ogw_sitemap_add($urls, '/testimonials/', null, 'weekly', '0.6');

    // ---------------------------------------
    // B) Corporate product info pages (AUTO)
    // NEW canonical: /{slug}/ (root)
    // Skip reserved slugs that would clash with real routes.
    // ---------------------------------------
    $products = ogw_sitemap_fetch_product_slugs_from_wp();

    foreach ($products as $p) {
        $slug = strtolower(trim((string)($p['slug'] ?? '')));
        if ($slug === '' || !preg_match('~^[a-z0-9\-]+$~', $slug)) continue;
        if (ogw_is_reserved_slug($slug)) continue;

        ogw_sitemap_add(
            $urls,
            '/' . $slug . '/',
            $p['lastmodTs'] ?? null,
            'weekly',
            '0.9'
        );
    }

    // ---------------------------------------
    // Output XML
    // ---------------------------------------
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ($urls as $u) {
        echo "  <url>\n";
        echo '    <loc>' . htmlspecialchars($u['loc'], ENT_QUOTES, 'UTF-8') . "</loc>\n";

        if (!empty($u['lastmod'])) {
            echo '    <lastmod>' . htmlspecialchars($u['lastmod'], ENT_QUOTES, 'UTF-8') . "</lastmod>\n";
        }

        echo '    <changefreq>' . htmlspecialchars($u['changefreq'], ENT_QUOTES, 'UTF-8') . "</changefreq>\n";
        echo '    <priority>' . htmlspecialchars($u['priority'], ENT_QUOTES, 'UTF-8') . "</priority>\n";
        echo "  </url>\n";
    }

    echo "</urlset>\n";
}
