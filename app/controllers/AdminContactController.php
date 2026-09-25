<?php
// app/controllers/AdminContactController.php

$db = DB::conn();

// Parse sub-action
$action = 'list';
if (preg_match('~^contact/view/(\d+)$~', $adminUri, $m)) {
    $action = 'view';
    $viewId = (int)$m[1];
}

// --- VIEW DETAIL ---
if ($action === 'view') {
    $stmt = $db->prepare("SELECT * FROM contact_enquiries WHERE id = ?");
    $stmt->bind_param('i', $viewId);
    $stmt->execute();
    $enquiry = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    
    if (!$enquiry) {
        http_response_code(404);
        echo "Enquiry not found.";
        exit;
    }
    
    $pageTitle = 'View Contact Enquiry';
    require VIEW_PATH . 'admin/contact/view.php';
    exit;
}

// --- LIST ---
$result = $db->query("SELECT * FROM contact_enquiries ORDER BY updated_at DESC");
$enquiries = $result->fetch_all(MYSQLI_ASSOC);

$pageTitle = 'Contact Enquiries';
require VIEW_PATH . 'admin/contact/index.php';
