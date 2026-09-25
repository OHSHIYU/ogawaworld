<?php
// app/controllers/AdminClientsController.php

$db = DB::conn();

// Parse sub-action
$action = 'list';
if (preg_match('~^clients/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
} elseif (preg_match('~^clients/update$~', $adminUri)) {
    $action = 'update';
} elseif (preg_match('~^clients/delete/(\d+)$~', $adminUri, $m)) {
    $action = 'delete';
    $deleteId = (int)$m[1];
} elseif ($adminUri === 'clients/create') {
    $action = 'create';
}

// --- DELETE ---
if ($action === 'delete') {
    $stmt = $db->prepare("DELETE FROM cms_clients WHERE id = ?");
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $stmt->close();
    flash_set('success', 'Client deleted successfully.');
    header('Location: ' . url('admin/clients'));
    exit;
}

// --- UPDATE/CREATE ---
if (($action === 'update' || $action === 'create') && $_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    
    $name = trim($_POST['name'] ?? '');
    $existing_image = $_POST['existing_image_url'] ?? '';
    $image_url = ogw_handle_image_upload('image', $existing_image);
    $sort_order = (int)($_POST['sort_order'] ?? 0);
    
    if ($action === 'update') {
        $id = (int)$_POST['id'];
        $stmt = $db->prepare("UPDATE cms_clients SET name=?, image_url=?, sort_order=?, updated_at=NOW() WHERE id=?");
        $stmt->bind_param('ssii', $name, $image_url, $sort_order, $id);
    } else {
        $stmt = $db->prepare("INSERT INTO cms_clients (name, image_url, sort_order, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
        $stmt->bind_param('ssi', $name, $image_url, $sort_order);
    }
    
    $stmt->execute();
    $stmt->close();
    
    flash_set('success', $action === 'update' ? 'Client updated successfully.' : 'Client created successfully.');
    header('Location: ' . url('admin/clients'));
    exit;
}

// --- EDIT ---
if ($action === 'edit') {
    $stmt = $db->prepare("SELECT * FROM cms_clients WHERE id = ?");
    $stmt->bind_param('i', $editId);
    $stmt->execute();
    $item = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    
    if (!$item) {
        http_response_code(404);
        echo "Client not found.";
        exit;
    }
    
    $pageTitle = 'Edit Client';
    require VIEW_PATH . 'admin/clients/edit.php';
    exit;
}

// --- CREATE FORM ---
if ($action === 'create') {
    $pageTitle = 'Create Client';
    $item = ['id' => 0, 'name' => '', 'image_url' => '', 'sort_order' => 0];
    require VIEW_PATH . 'admin/clients/edit.php';
    exit;
}

// --- LIST ---
$result = $db->query("SELECT * FROM cms_clients ORDER BY sort_order, id");
$items = $result->fetch_all(MYSQLI_ASSOC);

$pageTitle = 'Our Clients';
require VIEW_PATH . 'admin/clients/index.php';
