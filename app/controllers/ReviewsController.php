<?php
require_once dirname(__DIR__) . '/helpers.php';

// Render the view
require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
  'title' => 'Reviews | OGAWA Malaysia',
  'description' => 'Read customer reviews and experiences with OGAWA Malaysia massage chairs and wellness products.',
]);
require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'reviews/reviewsIndex.php';
require VIEW_PATH . 'layout/footer.php';
