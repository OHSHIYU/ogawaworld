<?php

$db = DB::conn();

// ── Detail view ───────────────────────────────────────────────
// Router already sets $_GET['slug'] or $_GET['id'] before requiring this file.

if (isset($_GET['slug'])) {
    // Slug-based lookup (clean URLs)
    $slug = preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['slug']));
    $stmt = $db->prepare("SELECT * FROM cms_events WHERE slug = ? AND is_active = 1");
    $stmt->bind_param('s', $slug);
    $stmt->execute();
    $event = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$event) {
        http_response_code(404);
        require VIEW_PATH . 'layout/404.php';
        exit;
    }

    $seoData = [
        'title'       => $event['title'] . ' - OGAWA',
        'description' => $event['subtitle'] ?? 'Event details',
    ];

    $today   = date('Y-m-d');
    $isEnded = ($event['end_date'] < $today);

    require VIEW_PATH . 'events/detail.php';
    exit;
}

if (isset($_GET['id'])) {
    // Numeric ID fallback (legacy URLs like /events/detail/2)
    $id   = (int)$_GET['id'];
    $stmt = $db->prepare("SELECT * FROM cms_events WHERE id = ? AND is_active = 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $event = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$event) {
        http_response_code(404);
        require VIEW_PATH . 'layout/404.php';
        exit;
    }

    // Redirect to the canonical slug URL if one exists
    if (!empty($event['slug'])) {
        header('Location: ' . url('events/' . $event['slug']), true, 301);
        exit;
    }

    $seoData = [
        'title'       => $event['title'] . ' - OGAWA',
        'description' => $event['subtitle'] ?? 'Event details',
    ];

    $today   = date('Y-m-d');
    $isEnded = ($event['end_date'] < $today);

    require VIEW_PATH . 'events/detail.php';
    exit;
}

// ── Index view ────────────────────────────────────────────────
$result    = $db->query("SELECT * FROM cms_events WHERE is_active = 1 ORDER BY start_date DESC");
$allEvents = $result->fetch_all(MYSQLI_ASSOC);

$ongoingEvents = [];
$endedEvents   = [];
$today         = date('Y-m-d');

foreach ($allEvents as $ev) {
    if ($ev['end_date'] < $today) {
        $endedEvents[] = $ev;
    } else {
        $ongoingEvents[] = $ev;
    }
}

$seoData = [
    'title'       => 'Events - OGAWA',
    'description' => 'Discover the latest events, promotions, and special exhibitions at OGAWA.',
];

require VIEW_PATH . 'events/index.php';
