<?php
require_once dirname(__DIR__) . '/helpers.php';

// --- API setup
$WP_BASE = getenv('WP_BASE') ?: 'https://ogawaworld.net/store';
$API_URL = rtrim($WP_BASE, '/') . '/wp-json/ogawa/v1/stores';

// --- Fetch & parse
$payload = fetch_wp_json_cached($API_URL, 8, 300);
$items   = $payload['items'] ?? [];

$stores = [];
$states = [];

foreach ($items as $it) {
  $state = is_array($it['state'] ?? null)
    ? ($it['state'][0] ?? '')
    : ($it['state'] ?? '');

  $addr  = trim(($it['mall_unit'] ? $it['mall_unit'] . "\n" : '') . ($it['address'] ?? ''));
  $lat   = isset($it['lat']) ? (float)$it['lat'] : null;
  $lng   = isset($it['lng']) ? (float)$it['lng'] : null;

  $gmaps = $it['gmaps'] ??
           ($lat && $lng
             ? "https://www.google.com/maps/search/?api=1&query={$lat},{$lng}"
             : "https://www.google.com/maps/search/?api=1&query=" . rawurlencode($addr));

  $stores[] = [
    'id'       => (int)$it['id'],
    'name'     => (string)$it['name'],
    'state'    => $state,
    'city'     => (string)($it['city'] ?? ''),
    'postcode' => (string)($it['postcode'] ?? ''),
    'address'  => $addr,
    'phones'   => (array)($it['phones'] ?? []),
    'image'    => $it['image']['full'] ?? $it['image']['thumbnail'] ?? null,
    'lat'      => $lat,
    'lng'      => $lng,
    'gmaps'    => $gmaps,
  ];

  if ($state) $states[$state] = true;
}

// --- Organize states alphabetically
$states = array_keys($states);
sort($states);

// --- Render view
require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
  'title' => 'Store Locator | OGAWA Malaysia',
  'description' => 'Find OGAWA Malaysia stores and showrooms near you. Explore locations by state and get directions.',
]);
require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'storeLocator/storeLocatorIndex.php';

// ------------------------
// Build schema from API items (AUTO - no manual list)
// ------------------------
$schemaStores = [];

foreach ($items as $it) {
    $state = is_array($it['state'] ?? null)
        ? ($it['state'][0] ?? '')
        : ($it['state'] ?? '');

    $street = trim(
        ($it['mall_unit'] ? $it['mall_unit'] . ' ' : '') .
        ($it['address'] ?? '')
    );

    $schemaStores[] = [
        'id'       => (int)($it['id'] ?? 0),
        'name'     => (string)($it['name'] ?? ''),
        'street'   => $street,
        'city'     => (string)($it['city'] ?? ''),
        'postcode' => (string)($it['postcode'] ?? ''),
        'state'    => (string)$state,
        'country'  => 'Malaysia',

        // phone: pick first phone if array exists
        'phone'    => !empty($it['phones'][0]) ? (string)$it['phones'][0] : '',

        // map: prefer API gmaps, else build one from lat/lng or address
        'map'      => !empty($it['gmaps'])
            ? (string)$it['gmaps']
            : (
                (!empty($it['lat']) && !empty($it['lng']))
                    ? "https://www.google.com/maps/search/?api=1&query=" . rawurlencode($it['lat'] . ',' . $it['lng'])
                    : (!empty($street) ? "https://www.google.com/maps/search/?api=1&query=" . rawurlencode($street) : '')
              ),
    ];
}

include dirname(__DIR__, 2) . '/app/services/schema-store-locator.php';
ogw_render_store_locator_schema($schemaStores);

require VIEW_PATH . 'layout/footer.php';
