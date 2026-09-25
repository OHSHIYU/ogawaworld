<?php
$slug = $_GET['slug'] ?? '';

// Map slug → corresponding view
$viewPath = VIEW_PATH . "technology/{$slug}.php";

// Optional: load shared JSON data for all technology pages
// $path = dirname(__DIR__, 2) . '/storage/json/technology.json';
// $tech = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

if (is_readable($viewPath)) {
    require_once dirname(__DIR__) . '/services/seo-pages.php';
    ogw_set_seo([
    'title' => 'OVERSEER™ Technology | OGAWA Malaysia',
    'description' => 'Discover OVERSEER™ — OGAWA’s intelligent technology designed for precision, personalisation and comfort.',
    ]);
    require VIEW_PATH . 'layout/header.php';
    require $viewPath;
    require VIEW_PATH . 'layout/footer.php';
} else {
    http_response_code(404);
    require VIEW_PATH . 'layout/404.php';
}
