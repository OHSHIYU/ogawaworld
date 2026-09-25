<?php
// app/controllers/AdminPartnersController.php

$db = DB::conn();

$action = 'list';
if (preg_match('~^partners/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
} elseif (preg_match('~^partners/update$~', $adminUri)) {
    $action = 'update';
} elseif (preg_match('~^partners/delete/(\d+)$~', $adminUri, $m)) {
    $action = 'delete';
    $deleteId = (int)$m[1];
} elseif ($adminUri === 'partners/create') {
    $action = 'create';
}

if ($action === 'delete') {
    $stmt = $db->prepare("DELETE FROM cms_partners WHERE id = ?");
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $stmt->close();
    flash_set('success', 'Partner deleted successfully.');
    header('Location: ' . url('admin/partners'));
    exit;
}

if (($action === 'update' || $action === 'create') && $_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    
    $name = trim($_POST['name'] ?? '');
    $existing_image = $_POST['existing_image_url'] ?? '';
    $image_url = ogw_handle_image_upload('image', $existing_image);
    $sort_order = (int)($_POST['sort_order'] ?? 0);
    
    if ($action === 'update') {
        $id = (int)$_POST['id'];
        $stmt = $db->prepare("UPDATE cms_partners SET name=?, image_url=?, sort_order=?, updated_at=NOW() WHERE id=?");
        $stmt->bind_param('ssii', $name, $image_url, $sort_order, $id);
    } else {
        $stmt = $db->prepare("INSERT INTO cms_partners (name, image_url, sort_order, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
        $stmt->bind_param('ssi', $name, $image_url, $sort_order);
    }
    
    $stmt->execute();
    $stmt->close();
    
    flash_set('success', $action === 'update' ? 'Partner updated successfully.' : 'Partner created successfully.');
    header('Location: ' . url('admin/partners'));
    exit;
}

if ($action === 'edit') {
    $stmt = $db->prepare("SELECT * FROM cms_partners WHERE id = ?");
    $stmt->bind_param('i', $editId);
    $stmt->execute();
    $item = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if (!$item) { http_response_code(404); echo "Partner not found."; exit; }
    $pageTitle = 'Edit Partner';
    require VIEW_PATH . 'admin/partners/edit.php';
    exit;
}

if ($action === 'create') {
    $pageTitle = 'Create Partner';
    $item = ['id' => 0, 'name' => '', 'image_url' => '', 'sort_order' => 0];
    require VIEW_PATH . 'admin/partners/edit.php';
    exit;
}

$result = $db->query("SELECT * FROM cms_partners ORDER BY sort_order, id");
$items = $result->fetch_all(MYSQLI_ASSOC);
$pageTitle = 'Business Partners';
require VIEW_PATH . 'admin/partners/index.php';
