<?php
// app/controllers/AdminLegalController.php

$db = DB::conn();

// Parse sub-action from URI
$action = 'list'; // default
if (preg_match('~^legal/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
} elseif (preg_match('~^legal/update$~', $adminUri)) {
    $action = 'update';
} elseif (preg_match('~^legal/delete/(\d+)$~', $adminUri, $m)) {
    $action = 'delete';
    $deleteId = (int)$m[1];
} elseif ($adminUri === 'legal/create') {
    $action = 'create';
}

// --- DELETE ---
if ($action === 'delete') {
    $stmt = $db->prepare("DELETE FROM legal_pages WHERE id = ?");
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $stmt->close();
    flash_set('success', 'Legal page deleted successfully.');
    header('Location: ' . url('admin/legal'));
    exit;
}

// --- UPDATE/CREATE ---
if (($action === 'update' || $action === 'create') && $_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    
    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $content_html = $_POST['content_html'] ?? '';
    $status = isset($_POST['status']) ? 1 : 0;
    $sort_order = (int)($_POST['sort_order'] ?? 0);
    $is_hidden = (isset($_POST['is_hidden']) && $status) ? 1 : 0;
    
    if ($action === 'update') {
        $id = (int)$_POST['id'];
        $stmt = $db->prepare("UPDATE legal_pages SET title=?, slug=?, category=?, content_html=?, status=?, is_hidden=?, sort_order=?, updated_at=NOW() WHERE id=?");
        $stmt->bind_param('ssssiiii', $title, $slug, $category, $content_html, $status, $is_hidden, $sort_order, $id);
    } else {
        $stmt = $db->prepare("INSERT INTO legal_pages (title, slug, category, content_html, status, is_hidden, sort_order, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param('ssssiii', $title, $slug, $category, $content_html, $status, $is_hidden, $sort_order);
    }
    
    $stmt->execute();
    $stmt->close();
    
    flash_set('success', $action === 'update' ? 'Legal page updated successfully.' : 'Legal page created successfully.');
    header('Location: ' . url('admin/legal'));
    exit;
}

// --- EDIT ---
if ($action === 'edit') {
    $stmt = $db->prepare("SELECT * FROM legal_pages WHERE id = ?");
    $stmt->bind_param('i', $editId);
    $stmt->execute();
    $page = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    
    if (!$page) {
        http_response_code(404);
        echo "Legal page not found.";
        exit;
    }
    
    $pageTitle = 'Edit Legal Page';
    require VIEW_PATH . 'admin/legal/edit.php';
    exit;
}

// --- CREATE FORM ---
if ($action === 'create') {
    $pageTitle = 'Create Legal Page';
    $page = ['id' => 0, 'title' => '', 'slug' => '', 'category' => '', 'content_html' => '', 'status' => 1, 'sort_order' => 0];
    require VIEW_PATH . 'admin/legal/edit.php';
    exit;
}

// --- LIST ---
$result = $db->query("SELECT * FROM legal_pages ORDER BY category, sort_order, title");
$pages = $result->fetch_all(MYSQLI_ASSOC);

$pageTitle = 'Legal Pages';
require VIEW_PATH . 'admin/legal/index.php';
