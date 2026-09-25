<?php
// app/controllers/AdminRegistrationsController.php

$db = DB::conn();

// Parse sub-action
$action = 'list';
if (preg_match('~^registrations/view/(\d+)$~', $adminUri, $m)) {
    $action = 'view';
    $viewId = (int)$m[1];
}

// --- VIEW DETAIL ---
if ($action === 'view') {
    $stmt = $db->prepare("SELECT * FROM ewarranty_registrations WHERE id = ?");
    $stmt->bind_param('i', $viewId);
    $stmt->execute();
    $registration = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    
    if (!$registration) {
        http_response_code(404);
        echo "Registration not found.";
        exit;
    }
    
    $pageTitle = 'View eWarranty Registration';
    require VIEW_PATH . 'admin/registrations/view.php';
    exit;
}

// --- LIST ---
$result = $db->query("SELECT * FROM ewarranty_registrations ORDER BY created_at DESC");
$registrations = $result->fetch_all(MYSQLI_ASSOC);

$pageTitle = 'eWarranty Registrations';
require VIEW_PATH . 'admin/registrations/index.php';
