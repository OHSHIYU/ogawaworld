<?php
require_once __DIR__ . '/../config/seo-config.php';

/**
 * Render FAQPage JSON-LD
 *
 * @param array $items Each item: ['q' => '...', 'a' => '...']
 */
function ogw_render_faq_schema(array $items): void
{
    if (empty($items)) return;

    $canonical = OGW_BASE_URL . $_SERVER['REQUEST_URI'];

    $entities = [];
    foreach ($items as $item) {
        $q = trim($item['q'] ?? '');
        $a = trim($item['a'] ?? '');
        if ($q === '' || $a === '') continue;

        $entities[] = [
            '@type' => 'Question',
            'name'  => $q,
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $a,
            ],
        ];
    }

    if (empty($entities)) return;

    $data = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        '@id'        => $canonical . '#faq',
        'mainEntity' => $entities,
    ];

    echo '<script type="application/ld+json">' . PHP_EOL;
    echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    echo PHP_EOL . '</script>' . PHP_EOL;
}
