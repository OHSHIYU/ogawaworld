<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Handle special files early and STOP after output
if ($uri === '/sitemap.xml') {
    require __DIR__ . '/../app/controllers/SitemapController.php';
    exit;
} elseif ($uri === '/robots.txt') {
    require __DIR__ . '/../app/controllers/RobotsController.php';
    exit;
}

require __DIR__ . '/../app/bootstrap.php';
require __DIR__ . '/../app/routes.php';
