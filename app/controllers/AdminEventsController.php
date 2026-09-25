<?php

$db = DB::conn();

$action = 'list';

if (preg_match('~^events/create$~', $adminUri)) {
    $action = 'create';
} elseif (preg_match('~^events/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
} elseif ($adminUri === 'events/store') {
    $action = 'store';
} elseif ($adminUri === 'events/update') {
    $action = 'update';
} elseif (preg_match('~^events/delete/(\d+)$~', $adminUri, $m)) {
    $action = 'delete';
    $deleteId = (int)$m[1];
}

// ── Helper: generate a URL slug from any string ──────────────
function ogw_make_slug(string $text): string {
    $text = mb_strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9\s\-]/', '', $text);
    $text = preg_replace('/[\s\-]+/', '-', $text);
    return trim($text, '-');
}

// ── Helper: ensure slug is unique in cms_events ──────────────
function ogw_unique_slug(\mysqli $db, string $slug, int $excludeId = 0): string {
    $base    = $slug;
    $counter = 1;
    while (true) {
        $stmt = $db->prepare("SELECT id FROM cms_events WHERE slug = ? AND id != ?");
        $stmt->bind_param('si', $slug, $excludeId);
        $stmt->execute();
        $stmt->store_result();
        $exists = $stmt->num_rows > 0;
        $stmt->close();
        if (!$exists) break;
        $slug = $base . '-' . $counter++;
    }
    return $slug;
}

// --- STORE ---
if ($action === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $title        = trim($_POST['title'] ?? '');
    $subtitle     = trim($_POST['subtitle'] ?? '');
    $content_text = trim($_POST['content_text'] ?? '');
    $start_date   = trim($_POST['start_date'] ?? '');
    $end_date     = trim($_POST['end_date'] ?? '');
    $is_active    = isset($_POST['is_active']) ? 1 : 0;

    if ($title === '') {
        flash_set('error', 'Title is required.');
        header('Location: ' . url('admin/events/create'));
        exit;
    }

    $rawSlug = trim($_POST['slug'] ?? '');
    $slug    = ogw_unique_slug($db, ogw_make_slug($rawSlug !== '' ? $rawSlug : $title));

    $image_url     = ogw_handle_image_upload('image_url', '');
    $content_image = ogw_handle_image_upload('content_image', '');

    $stmt = $db->prepare("
        INSERT INTO cms_events (title, subtitle, slug, image_url, content_text, content_image, start_date, end_date, is_active)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param(
        'ssssssssi',
        $title, $subtitle, $slug, $image_url, $content_text, $content_image,
        $start_date, $end_date, $is_active
    );
    $stmt->execute();
    $stmt->close();

    flash_set('success', 'Event created successfully.');
    header('Location: ' . url('admin/events'));
    exit;
}

// --- UPDATE ---
if ($action === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();

    $id           = (int)($_POST['id'] ?? 0);
    $title        = trim($_POST['title'] ?? '');
    $subtitle     = trim($_POST['subtitle'] ?? '');
    $content_text = trim($_POST['content_text'] ?? '');
    $start_date   = trim($_POST['start_date'] ?? '');
    $end_date     = trim($_POST['end_date'] ?? '');
    $is_active    = isset($_POST['is_active']) ? 1 : 0;

    if ($title === '') {
        flash_set('error', 'Title is required.');
        header('Location: ' . url('admin/events/edit/' . $id));
        exit;
    }

    $rawSlug = trim($_POST['slug'] ?? '');
    $slug    = ogw_unique_slug($db, ogw_make_slug($rawSlug !== '' ? $rawSlug : $title), $id);

    $image_url     = ogw_handle_image_upload('image_url', $_POST['existing_image_url'] ?? '');
    $content_image = ogw_handle_image_upload('content_image', $_POST['existing_content_image'] ?? '');

    $stmt = $db->prepare("
        UPDATE cms_events
        SET title=?, subtitle=?, slug=?, image_url=?, content_text=?, content_image=?,
            start_date=?, end_date=?, is_active=?, updated_at=NOW()
        WHERE id=?
    ");
    $stmt->bind_param(
        'ssssssssii',
        $title, $subtitle, $slug, $image_url, $content_text, $content_image,
        $start_date, $end_date, $is_active, $id
    );
    $stmt->execute();
    $stmt->close();

    flash_set('success', 'Event updated successfully.');
    header('Location: ' . url('admin/events'));
    exit;
}

// --- DELETE ---
if ($action === 'delete') {
    $stmt = $db->prepare("DELETE FROM cms_events WHERE id=?");
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $stmt->close();

    flash_set('success', 'Event deleted.');
    header('Location: ' . url('admin/events'));
    exit;
}

// --- CREATE ---
if ($action === 'create') {
    $pageTitle = 'Create Event';
    require VIEW_PATH . 'admin/events/create.php';
    exit;
}

// --- EDIT ---
if ($action === 'edit') {
    $stmt = $db->prepare("SELECT * FROM cms_events WHERE id=?");
    $stmt->bind_param('i', $editId);
    $stmt->execute();
    $item = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$item) {
        http_response_code(404);
        exit('Not found');
    }

    $pageTitle = 'Edit Event';
    require VIEW_PATH . 'admin/events/edit.php';
    exit;
}

// --- LIST ---
$result = $db->query("SELECT * FROM cms_events ORDER BY id DESC");
$items  = $result->fetch_all(MYSQLI_ASSOC);

$pageTitle = 'Events';
require VIEW_PATH . 'admin/events/index.php';
