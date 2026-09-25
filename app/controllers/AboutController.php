<?php
function about_all(): array {
  static $cache = null;
  if ($cache !== null) return $cache;

  $path = dirname(__DIR__, 2) . '/storage/json/about.json';

  // Default structure so views never break
  $defaults = [
    'banner' => [],
    'stats'  => [],
    'cards'  => [],
    'awards' => ['title' => 'Awards & Achievements', 'items' => []],
  ];

  if (!is_readable($path)) return $cache = $defaults;

  $raw  = file_get_contents($path);
  $data = json_decode($raw, true) ?: [];

  // Fill missing keys
  $data = array_replace($defaults, $data);
  if (!is_array($data['awards'])) $data['awards'] = $defaults['awards'];
  $data['awards']['title'] = $data['awards']['title'] ?? $defaults['awards']['title'];
  $data['awards']['items'] = $data['awards']['items'] ?? [];

  return $cache = $data;
}

// --- Render View
$about = about_all();
$b = $about['banner'] ?? [];

require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
  'title' => 'About OGAWA Malaysia',
  'description' => 'Learn about OGAWA Malaysia, our wellness innovations, and our commitment to improving everyday wellbeing.',
]);

require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'about/aboutIndex.php';
require VIEW_PATH . 'layout/footer.php';
