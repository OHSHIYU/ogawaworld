<?php
require_once __DIR__ . '/../config/seo-config.php';

function ogw_seo_meta(array $args = [])
{
    $defaults = [
        'title'       => 'OGAWA Malaysia',
        'description' => 'Official OGAWA Malaysia – Premium massage chairs, wellness products and store locator. Experience advanced relaxation technology.',
        'canonical'   => null,
        'og_image'    => OGW_DEFAULT_OG_IMAGE,
        'robots'      => null, // e.g. 'noindex, nofollow'
        'og_type'     => 'website',
    ];

    $data = array_merge($defaults, $args);

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $currentUrl = rtrim(OGW_BASE_URL . $path, '/') ?: OGW_BASE_URL . '/';

    if (empty($data['canonical'])) {
        $data['canonical'] = $currentUrl;
    }

    // On staging, FORCE noindex, regardless of per-page setting
    if (OGW_ENV === 'staging') {
        $data['robots'] = 'noindex, nofollow';
    }

    ?>
    <title><?= htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($data['description'], ENT_QUOTES, 'UTF-8') ?>">
    <link rel="canonical" href="<?= htmlspecialchars($data['canonical'], ENT_QUOTES, 'UTF-8') ?>"/>

    <?php if (!empty($data['robots'])): ?>
        <meta name="robots" content="<?= htmlspecialchars($data['robots'], ENT_QUOTES, 'UTF-8') ?>"/>
    <?php endif; ?>

    <!-- Open Graph -->
    <meta property="og:site_name" content="OGAWA Malaysia">
    <meta property="og:title" content="<?= htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8') ?>"/>
    <meta property="og:description" content="<?= htmlspecialchars($data['description'], ENT_QUOTES, 'UTF-8') ?>"/>
    <meta property="og:image" content="<?= htmlspecialchars($data['og_image'], ENT_QUOTES, 'UTF-8') ?>"/>
    <meta property="og:url" content="<?= htmlspecialchars($data['canonical'], ENT_QUOTES, 'UTF-8') ?>"/>
    <meta property="og:type" content="<?= htmlspecialchars($data['og_type'], ENT_QUOTES, 'UTF-8') ?>"/>

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="<?= htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8') ?>"/>
    <meta name="twitter:description" content="<?= htmlspecialchars($data['description'], ENT_QUOTES, 'UTF-8') ?>"/>
    <meta name="twitter:image" content="<?= htmlspecialchars($data['og_image'], ENT_QUOTES, 'UTF-8') ?>"/>
    <?php
}
