<?php
require_once __DIR__ . '/../config/seo-config.php';

/**
 * Render LocalBusiness schema for store locator.
 *
 * @param array $stores
 * Each store:
 * [
 *   'id'       => 123, // optional
 *   'name'     => 'OGAWA Mid Valley',
 *   'street'   => 'Lot XX, Mid Valley Megamall',
 *   'city'     => 'Kuala Lumpur',
 *   'postcode' => '59200',
 *   'state'    => 'Wilayah Persekutuan Kuala Lumpur',
 *   'country'  => 'Malaysia',
 *   'phone'    => '+60-3-1234-5678', // optional
 *   'map'      => 'https://www.google.com/maps/...', // optional (Google Maps URL)
 * ]
 */
function ogw_render_store_locator_schema(array $stores): void
{
    if (empty($stores)) return;

    $items = [];

    foreach ($stores as $s) {
        if (empty($s['name']) || empty($s['street']) || empty($s['city'])) {
            continue;
        }

        // Stable per-store id (prefer numeric id; fallback to hash)
        $idPart = '';
        if (!empty($s['id'])) {
            $idPart = (string) $s['id'];
        } else {
            $idPart = md5(strtolower(trim($s['name'] . '|' . ($s['street'] ?? '') . '|' . ($s['city'] ?? ''))));
        }

        $entry = [
            '@type' => 'LocalBusiness',
            '@id'   => OGW_BASE_URL . '/store-locator#store-' . $idPart,
            'name'  => $s['name'],
            'address' => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $s['street'],
                'addressLocality' => $s['city'],
                'postalCode'      => $s['postcode'] ?? '',
                'addressRegion'   => $s['state'] ?? '',
                'addressCountry'  => $s['country'] ?? 'Malaysia',
            ],

            // This is the website URL (NOT Google Maps)
            'url' => OGW_BASE_URL . '/store-locator',
        ];

        // Optional fields only when present
        if (!empty($s['phone'])) {
            $entry['telephone'] = $s['phone'];
        }

        // Google Maps URL should be hasMap (and optionally sameAs)
        if (!empty($s['map'])) {
            $entry['hasMap'] = $s['map'];
            $entry['sameAs'] = [$s['map']];
        }

        $items[] = $entry;
    }

    if (empty($items)) return;

    $data = [
        '@context' => 'https://schema.org',
        '@graph'   => $items,
    ];

    echo '<script type="application/ld+json">' . PHP_EOL;
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo PHP_EOL . '</script>' . PHP_EOL;
}
