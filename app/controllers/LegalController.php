<?php
/**
 * LegalController
 * Fetches and displays all active legal pages
 */
$db = DB::conn();
global $db;

/**
 * Retrieve all active legal pages
 */
function legal_all(): array {
  global $db;

  $sql = "
    SELECT category, slug, title, sort_order, updated_at
    FROM legal_pages
    WHERE status = 1 AND is_hidden = 0
    ORDER BY category, sort_order, title
  ";

  $res = $db->query($sql);
  if (!$res) {
    error_log('Legal query failed: ' . $db->error);
    return [];
  }

  return $res->fetch_all(MYSQLI_ASSOC);
}

/**
 * Retrieve single legal page by slug
 */
function legal_by_slug(string $slug): ?array {
  global $db;

  $stmt = $db->prepare("
    SELECT category, slug, title, content_html, sort_order, updated_at
    FROM legal_pages
    WHERE slug = ? AND status = 1
    LIMIT 1
  ");

  $slug = strtolower(trim($slug));
  $stmt->bind_param("s", $slug);
  $stmt->execute();

  $row = $stmt->get_result()->fetch_assoc();
  return $row ?: null;
}

// --------------------------------------------------
// Controller execution
// --------------------------------------------------

require_once dirname(__DIR__) . '/services/seo-pages.php';

$entries = legal_all();

$slug = $_GET['slug'] ?? null;
$active = $slug ? legal_by_slug($slug) : null;

// If slug not found, STOP and let router continue
if (!$active) {
  return;   // important
}

// Tell router we found a legal page
$legalFound = true;

ogw_set_seo([
  'title' => ($active['title'] ?? 'Legal') . ' | OGAWA Malaysia',
  'description' => 'OGAWA Malaysia legal information and policies.',
  'og_type' => 'website',
]);

require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'legal/legalIndex.php';
require VIEW_PATH . 'layout/footer.php';
