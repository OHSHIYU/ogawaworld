<?php
// app/controllers/AdminAwardsController.php

$db = DB::conn();

$action = 'list';
if (preg_match('~^awards/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
} elseif (preg_match('~^awards/update$~', $adminUri)) {
    $action = 'update';
} elseif (preg_match('~^awards/delete/(\d+)$~', $adminUri, $m)) {
    $action = 'delete';
    $deleteId = (int)$m[1];
} elseif ($adminUri === 'awards/create') {
    $action = 'create';
}

if ($action === 'delete') {
    $stmt = $db->prepare("DELETE FROM cms_awards WHERE id = ?");
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $stmt->close();
    flash_set('success', 'Award deleted successfully.');
    header('Location: ' . url('admin/awards'));
    exit;
}

if (($action === 'update' || $action === 'create') && $_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    
    $title = trim($_POST['title'] ?? '');
    $year = trim($_POST['year'] ?? '');
    $existing_image = $_POST['existing_image_url'] ?? '';
    $image_url = ogw_handle_image_upload('image', $existing_image);
    $sort_order = (int)($_POST['sort_order'] ?? 0);
    
    if ($action === 'update') {
        $id = (int)$_POST['id'];
        $stmt = $db->prepare("UPDATE cms_awards SET title=?, year=?, image_url=?, sort_order=?, updated_at=NOW() WHERE id=?");
        $stmt->bind_param('sssii', $title, $year, $image_url, $sort_order, $id);
    } else {
        $stmt = $db->prepare("INSERT INTO cms_awards (title, year, image_url, sort_order, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param('sssi', $title, $year, $image_url, $sort_order);
    }
    
    $stmt->execute();
    $stmt->close();
    
    flash_set('success', $action === 'update' ? 'Award updated successfully.' : 'Award created successfully.');
    header('Location: ' . url('admin/awards'));
    exit;
}

if ($action === 'edit') {
    $stmt = $db->prepare("SELECT * FROM cms_awards WHERE id = ?");
    $stmt->bind_param('i', $editId);
    $stmt->execute();
    $item = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if (!$item) { http_response_code(404); echo "Award not found."; exit; }
    $pageTitle = 'Edit Award';
    require VIEW_PATH . 'admin/awards/edit.php';
    exit;
}

if ($action === 'create') {
    $pageTitle = 'Create Award';
    $item = ['id' => 0, 'title' => '', 'year' => '', 'image_url' => '', 'sort_order' => 0];
    require VIEW_PATH . 'admin/awards/edit.php';
    exit;
}

$result = $db->query("SELECT * FROM cms_awards ORDER BY sort_order, id");
$items = $result->fetch_all(MYSQLI_ASSOC);
$pageTitle = 'Awards & Achievements';
require VIEW_PATH . 'admin/awards/index.php';
