<?php

$db = DB::conn();

$action = 'list';

if (preg_match('~^promo-banners/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
} elseif ($adminUri === 'promo-banners/update') {
    $action = 'update';
}

// --- UPDATE ---
if ($action === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    csrf_check();

    $id         = (int)($_POST['id'] ?? 0);
    $heading    = trim($_POST['heading'] ?? '');
    $subheading = trim($_POST['subheading'] ?? '');
    $cta_text   = trim($_POST['cta_text'] ?? '');
    $cta_url    = trim($_POST['cta_url'] ?? '');
    $is_active  = isset($_POST['is_active']) ? 1 : 0;

    // Validation
    if ($heading === '') {
        flash_set('error', 'Heading is required.');
        header('Location: ' . url('admin/promo-banners/edit/' . $id));
        exit;
    }

    if ($cta_url && !preg_match('~^(https?:\/\/|\/)~', $cta_url)) {
        flash_set('error', 'Invalid URL format.');
        header('Location: ' . url('admin/promo-banners/edit/' . $id));
        exit;
    }

    try {
        $image_url = ogw_handle_image_upload('image', $_POST['existing_image_url'] ?? '');
    } catch (Exception $e) {
        flash_set('error', $e->getMessage());
        header('Location: ' . url('admin/promo-banners/edit/' . $id));
        exit;
    }

    $stmt = $db->prepare("
        UPDATE cms_promo_banners
        SET heading=?, subheading=?, cta_text=?, cta_url=?, image_url=?, is_active=?, updated_at=NOW()
        WHERE id=?
    ");

    $stmt->bind_param('sssssii',
        $heading,
        $subheading,
        $cta_text,
        $cta_url,
        $image_url,
        $is_active,
        $id
    );

    $stmt->execute();
    $stmt->close();

    flash_set('success', 'Promo banner updated.');
    header('Location: ' . url('admin/promo-banners'));
    exit;
}

// --- EDIT ---
if ($action === 'edit') {

    $stmt = $db->prepare("SELECT * FROM cms_promo_banners WHERE id=?");
    $stmt->bind_param('i', $editId);
    $stmt->execute();

    $item = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$item) {
        http_response_code(404);
        exit('Not found');
    }

    $pageTitle = 'Edit Promo Banner';
    require VIEW_PATH . 'admin/promo-banners/edit.php';
    exit;
}

// --- LIST ---
$result = $db->query("
    SELECT * FROM cms_promo_banners
    WHERE panel IN ('left','right_top','right_bottom')
    ORDER BY FIELD(panel, 'left','right_top','right_bottom'), sort_order, id
");

$items = $result->fetch_all(MYSQLI_ASSOC);

$pageTitle = 'Promo Banners';
require VIEW_PATH . 'admin/promo-banners/index.php';
