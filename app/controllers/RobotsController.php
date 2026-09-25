<?php
require_once dirname(__DIR__) . '/config/seo-config.php';

header('Content-Type: text/plain; charset=UTF-8');

$base = rtrim(OGW_BASE_URL, '/');

if (OGW_ENV === 'staging') {
    // Block all bots on staging
    echo "User-agent: *\n";
    echo "Disallow: /\n";
    echo "\n";
    echo "Sitemap: {$base}/sitemap.xml\n";
    exit;
}

// Production: allow + block only sensitive paths (adjust if needed)
echo "User-agent: *\n";
echo "Disallow: /assets/\n";     // optional
echo "Disallow: /storage/\n";    // safety
echo "Disallow: /app/\n";        // safety
echo "Disallow: /vendor/\n";     // safety
echo "\n";
echo "Sitemap: {$base}/sitemap.xml\n";
exit;
