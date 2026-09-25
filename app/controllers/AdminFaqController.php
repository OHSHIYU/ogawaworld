<?php
// app/controllers/AdminFaqController.php

$db = DB::conn();

// Parse sub-action
$action = 'list';
if (preg_match('~^faq/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
} elseif (preg_match('~^faq/update$~', $adminUri)) {
    $action = 'update';
} elseif (preg_match('~^faq/delete/(\d+)$~', $adminUri, $m)) {
    $action = 'delete';
    $deleteId = (int)$m[1];
} elseif ($adminUri === 'faq/create') {
    $action = 'create';
} elseif ($adminUri === 'faq/categories') {
    $action = 'categories';
}

// --- CATEGORY MANAGEMENT ---
if ($action === 'categories') {
    $categories = $db->query("SELECT * FROM faq_categories ORDER BY sort_order, name")->fetch_all(MYSQLI_ASSOC);
    $pageTitle = 'FAQ Categories';
    require VIEW_PATH . 'admin/faq/categories.php';
    exit;
}

// --- DELETE ---
if ($action === 'delete') {
    $stmt = $db->prepare("DELETE FROM faq WHERE id = ?");
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $stmt->close();
    flash_set('success', 'FAQ deleted successfully.');
    header('Location: ' . url('admin/faq'));
    exit;
}

// --- UPDATE/CREATE ---
if (($action === 'update' || $action === 'create') && $_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    
    $question = trim($_POST['question'] ?? '');
    $answer = $_POST['answer'] ?? '';
    $category_id = !empty($_POST['category_id']) ? (int)$_POST['category_id'] : null;
    $sort_order = (int)($_POST['sort_order'] ?? 0);
    
    // Get category name for backward compatibility
    $category = '';
    if ($category_id) {
        $stmt = $db->prepare("SELECT name FROM faq_categories WHERE id = ?");
        $stmt->bind_param('i', $category_id);
        $stmt->execute();
        $stmt->bind_result($category);
        $stmt->fetch();
        $stmt->close();
    }
    
    if ($action === 'update') {
        $id = (int)$_POST['id'];
        $stmt = $db->prepare("UPDATE faq SET question=?, answer=?, category=?, category_id=?, sort_order=?, updated_at=NOW() WHERE id=?");
        $stmt->bind_param('sssiii', $question, $answer, $category, $category_id, $sort_order, $id);
    } else {
        $stmt = $db->prepare("INSERT INTO faq (question, answer, category, category_id, sort_order, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param('sssii', $question, $answer, $category, $category_id, $sort_order);
    }
    
    $stmt->execute();
    $stmt->close();
    
    flash_set('success', $action === 'update' ? 'FAQ updated successfully.' : 'FAQ created successfully.');
    header('Location: ' . url('admin/faq'));
    exit;
}

// --- EDIT ---
if ($action === 'edit') {
    $stmt = $db->prepare("SELECT * FROM faq WHERE id = ?");
    $stmt->bind_param('i', $editId);
    $stmt->execute();
    $item = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    
    if (!$item) {
        http_response_code(404);
        echo "FAQ not found.";
        exit;
    }
    
    $categories = $db->query("SELECT * FROM faq_categories ORDER BY sort_order, name")->fetch_all(MYSQLI_ASSOC);
    $pageTitle = 'Edit FAQ';
    require VIEW_PATH . 'admin/faq/edit.php';
    exit;
}

// --- CREATE FORM ---
if ($action === 'create') {
    $pageTitle = 'Create FAQ';
    $item = ['id' => 0, 'question' => '', 'answer' => '', 'category' => '', 'category_id' => null, 'sort_order' => 0];
    $categories = $db->query("SELECT * FROM faq_categories ORDER BY sort_order, name")->fetch_all(MYSQLI_ASSOC);
    require VIEW_PATH . 'admin/faq/edit.php';
    exit;
}

// --- LIST ---
$result = $db->query("
    SELECT f.id, f.question, f.category, c.name as category_name, f.sort_order, f.updated_at 
    FROM faq f
    LEFT JOIN faq_categories c ON f.category_id = c.id
    ORDER BY f.category, f.sort_order, f.id
");
$items = $result->fetch_all(MYSQLI_ASSOC);

$pageTitle = 'FAQ';
require VIEW_PATH . 'admin/faq/index.php';
