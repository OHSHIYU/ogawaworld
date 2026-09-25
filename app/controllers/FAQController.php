<?php
/**
 * FAQController
 * Fetches and displays all active FAQs, grouped by category.
 */
$db = DB::conn();
global $db;

/**
 * Retrieve all FAQs grouped by category
 */
function faq_all(): array {
  global $db;

  $sql = "SELECT category, question, answer
          FROM faq
          WHERE is_active = 1
          ORDER BY category, sort_order, id";

  $res = $db->query($sql);
  if (!$res) {
    error_log('FAQ query failed: ' . $db->error);
    return [];
  }

  $faqs = [];
  while ($row = $res->fetch_assoc()) {
    $faqs[$row['category']][] = $row;
  }

  return $faqs;
}

// --- Render view
require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
  'title' => 'FAQ | OGAWA Malaysia',
  'description' => 'Frequently asked questions about OGAWA Malaysia products, delivery, warranty, and support.',
]);
require VIEW_PATH . 'layout/header.php';

$faqs = faq_all();
require VIEW_PATH . 'faq/faqIndex.php';
require dirname(__DIR__, 2) . '/app/services/schema-faq.php';

// Convert DB FAQ structure → flat list of Q/A for schema
$schemaFaq = [];

foreach ($faqs as $category => $items) {
    foreach ($items as $it) {
        $schemaFaq[] = [
            'q' => $it['question'],
            'a' => $it['answer'],
        ];
    }
}

// Output structured FAQ JSON-LD
ogw_render_faq_schema($schemaFaq);

require VIEW_PATH . 'layout/footer.php';

