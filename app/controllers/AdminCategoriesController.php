<?php
// app/controllers/AdminCategoriesController.php

$db = DB::conn();

$action = 'list';
if (preg_match('~^categories/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
} elseif (preg_match('~^categories/update$~', $adminUri)) {
    $action = 'update';
} elseif (preg_match('~^categories/delete/(\d+)$~', $adminUri, $m)) {
    $action = 'delete';
    $deleteId = (int)$m[1];
} elseif ($adminUri === 'categories/create') {
    $action = 'create';
}

if ($action === 'delete') {
    $stmt = $db->prepare("DELETE FROM cms_massage_categories WHERE id = ?");
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $stmt->close();
    flash_set('success', 'Category deleted successfully.');
    header('Location: ' . url('admin/categories'));
    exit;
}

if (($action === 'update' || $action === 'create') && $_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    
    $name = trim($_POST['name'] ?? '');
    $existing_image = $_POST['existing_image_url'] ?? '';
    $image_url = ogw_handle_image_upload('image', $existing_image);
    $link = trim($_POST['link'] ?? '');
    $sort_order = (int)($_POST['sort_order'] ?? 0);
    
    if ($action === 'update') {
        $id = (int)$_POST['id'];
        $stmt = $db->prepare("UPDATE cms_massage_categories SET name=?, image_url=?, link=?, sort_order=?, updated_at=NOW() WHERE id=?");
        $stmt->bind_param('sssii', $name, $image_url, $link, $sort_order, $id);
    } else {
        $stmt = $db->prepare("INSERT INTO cms_massage_categories (name, image_url, link, sort_order, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param('sssi', $name, $image_url, $link, $sort_order);
    }
    
    $stmt->execute();
    $stmt->close();
    
    flash_set('success', $action === 'update' ? 'Category updated successfully.' : 'Category created successfully.');
    header('Location: ' . url('admin/categories'));
    exit;
}

if ($action === 'edit') {
    $stmt = $db->prepare("SELECT * FROM cms_massage_categories WHERE id = ?");
    $stmt->bind_param('i', $editId);
    $stmt->execute();
    $item = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if (!$item) { http_response_code(404); echo "Category not found."; exit; }
    $pageTitle = 'Edit Massage Category';
    require VIEW_PATH . 'admin/categories/edit.php';
    exit;
}

if ($action === 'create') {
    $pageTitle = 'Create Massage Category';
    $item = ['id' => 0, 'name' => '', 'image_url' => '', 'link' => '', 'sort_order' => 0];
    require VIEW_PATH . 'admin/categories/edit.php';
    exit;
}

$result = $db->query("SELECT * FROM cms_massage_categories ORDER BY sort_order, id");
$items = $result->fetch_all(MYSQLI_ASSOC);
$pageTitle = 'Massage Categories';
require VIEW_PATH . 'admin/categories/index.php';
