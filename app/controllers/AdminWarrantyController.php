<?php
// app/controllers/AdminWarrantyController.php

$db = DB::conn();

// Parse sub-action
$action = 'list';
if (preg_match('~^warranty/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
} elseif (preg_match('~^warranty/update$~', $adminUri)) {
    $action = 'update';
} elseif (preg_match('~^warranty/delete/(\d+)$~', $adminUri, $m)) {
    $action = 'delete';
    $deleteId = (int)$m[1];
} elseif ($adminUri === 'warranty/create') {
    $action = 'create';
}

// --- DELETE ---
if ($action === 'delete') {
    $stmt = $db->prepare("DELETE FROM warranty_pages WHERE id = ?");
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $stmt->close();
    flash_set('success', 'Warranty page deleted successfully.');
    header('Location: ' . url('admin/warranty'));
    exit;
}

// --- UPDATE/CREATE ---
if (($action === 'update' || $action === 'create') && $_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    
    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $content_html = $_POST['content_html'] ?? '';
    $sort_order = (int)($_POST['sort_order'] ?? 0);
    $status = isset($_POST['status']) ? 1 : 0;
    $is_hidden = (isset($_POST['is_hidden']) && $status) ? 1 : 0;
    
    if ($action === 'update') {
        $id = (int)$_POST['id'];
        $stmt = $db->prepare("UPDATE warranty_pages SET title=?, slug=?, content_html=?, status=?, is_hidden=?, sort_order=?, updated_at=NOW() WHERE id=?");
        $stmt->bind_param('sssiiii', $title, $slug, $content_html, $status, $is_hidden, $sort_order, $id);
    } else {
        $stmt = $db->prepare("INSERT INTO warranty_pages (title, slug, content_html, status, is_hidden, sort_order, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param('sssiii', $title, $slug, $content_html, $status, $is_hidden, $sort_order);
    }
    
    $stmt->execute();
    $stmt->close();
    
    flash_set('success', $action === 'update' ? 'Warranty page updated successfully.' : 'Warranty page created successfully.');
    header('Location: ' . url('admin/warranty'));
    exit;
}

// --- EDIT ---
if ($action === 'edit') {
    $stmt = $db->prepare("SELECT * FROM warranty_pages WHERE id = ?");
    $stmt->bind_param('i', $editId);
    $stmt->execute();
    $page = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    
    if (!$page) {
        http_response_code(404);
        echo "Warranty page not found.";
        exit;
    }
    
    $pageTitle = 'Edit Warranty Page';
    require VIEW_PATH . 'admin/warranty/edit.php';
    exit;
}

// --- CREATE FORM ---
if ($action === 'create') {
    $pageTitle = 'Create Warranty Page';
    $page = [
        'id' => 0,
        'title' => '',
        'slug' => '',
        'content_html' => '',
        'sort_order' => 0,
        'status' => 1,
        'is_hidden' => 0
    ];
    require VIEW_PATH . 'admin/warranty/edit.php';
    exit;
}

// --- LIST ---
$result = $db->query("
    SELECT id, slug, title, status, is_hidden, sort_order, updated_at
    FROM warranty_pages
    ORDER BY sort_order, title
");
$pages = $result->fetch_all(MYSQLI_ASSOC);

$pageTitle = 'Warranty Pages';
require VIEW_PATH . 'admin/warranty/index.php';
