<?php

$db = DB::conn();

/* =========================================
   Fetch Woo Products (Unlimited Pagination)
========================================= */
function fetch_woo_products() {

    $WP_BASE = getenv('WP_BASE') ?: 'https://ogawaworld.net/store';
    $all = [];
    $page = 1;

    while (true) {

        $url = rtrim($WP_BASE, '/') . '/wp-json/wc/store/products?per_page=100&page=' . $page;

        $json = @file_get_contents($url);
        if (!$json) break;

        $data = json_decode($json, true);
        if (empty($data)) break;

        foreach ($data as $p) {
            $all[] = [
                'id'   => $p['id'],
                'name' => html_entity_decode($p['name'], ENT_QUOTES, 'UTF-8'),
                'slug' => $p['slug']
            ];
        }

        if (count($data) < 100) break;
        $page++;
    }

    return $all;
}

/* =========================================
   Woo Products Without Manuals
========================================= */
function fetch_woo_without_manuals($db) {

    $woo = fetch_woo_products();

    $result = $db->query("SELECT wc_product_id FROM product_manuals WHERE wc_product_id IS NOT NULL");
    $existing = array_column($result->fetch_all(MYSQLI_ASSOC), 'wc_product_id');

    return array_filter($woo, function($p) use ($existing){
        return !in_array($p['id'], $existing);
    });
}

$action = 'list';

/* =========================================
   ROUTING
========================================= */
if (preg_match('~^manuals/edit/(\d+)$~', $adminUri, $m)) {
    $action = 'edit';
    $editId = (int)$m[1];
}
elseif ($adminUri === 'manuals/create') {
    $action = 'create';
}
elseif ($adminUri === 'manuals/update') {
    $action = 'update';
}
elseif (preg_match('~^manuals/delete/(\d+)$~', $adminUri, $m)) {
    $action = 'delete';
    $deleteId = (int)$m[1];
}

/* =========================================
   DELETE
========================================= */
if ($action === 'delete') {

    $stmt = $db->prepare("DELETE FROM product_manuals WHERE id=?");
    $stmt->bind_param("i", $deleteId);
    $stmt->execute();
    $stmt->close();

    flash_set('success', 'Manual deleted.');
    header('Location: ' . url('admin/manuals'));
    exit;
}

/* =========================================
   CREATE / UPDATE
========================================= */
if (($action === 'create' || $action === 'update') && $_SERVER['REQUEST_METHOD'] === 'POST') {

    csrf_check();

    $source = $_POST['source'] ?? 'woo';

    $wc_product_id = $source === 'woo' ? (int)($_POST['wc_product_id'] ?? 0) : null;
    $wc_slug       = $source === 'woo' ? trim($_POST['wc_slug'] ?? '') : null;

    $legacy_title  = $source === 'legacy' ? trim($_POST['legacy_title'] ?? '') : null;
    $legacy_slug   = $source === 'legacy' ? trim($_POST['legacy_slug'] ?? '') : null;

    $sort_order = (int)($_POST['sort_order'] ?? 0);
    $status     = isset($_POST['status']) ? 1 : 0;

    /* ---- Upload ---- */
    $manual_file = '';

    if (!empty($_FILES['manual']['name'])) {

        $uploadDir = dirname(__DIR__, 2) . '/public/uploads/manuals/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $ext = strtolower(pathinfo($_FILES['manual']['name'], PATHINFO_EXTENSION));
        if ($ext !== 'pdf') die('Only PDF allowed.');

        $filename = 'manual_' . time() . '_' . bin2hex(random_bytes(4)) . '.pdf';
        move_uploaded_file($_FILES['manual']['tmp_name'], $uploadDir . $filename);

        $manual_file = 'uploads/manuals/' . $filename;
    }

    /* ---- UPDATE ---- */
    if ($action === 'update') {

        $id = (int)$_POST['id'];

        if ($manual_file) {
            $stmt = $db->prepare("
                UPDATE product_manuals 
                SET source=?, wc_product_id=?, wc_slug=?, legacy_title=?, legacy_slug=?, manual_file=?, sort_order=?, status=?, updated_at=NOW()
                WHERE id=?
            ");
            $stmt->bind_param("sissssiii",
                $source, $wc_product_id, $wc_slug, $legacy_title, $legacy_slug,
                $manual_file, $sort_order, $status, $id
            );
        } else {
            $stmt = $db->prepare("
                UPDATE product_manuals 
                SET source=?, wc_product_id=?, wc_slug=?, legacy_title=?, legacy_slug=?, sort_order=?, status=?, updated_at=NOW()
                WHERE id=?
            ");
            $stmt->bind_param("sisssiii",
                $source, $wc_product_id, $wc_slug, $legacy_title, $legacy_slug,
                $sort_order, $status, $id
            );
        }
    }

    /* ---- CREATE ---- */
    else {

        if ($source === 'woo' && $wc_product_id) {

            $check = $db->prepare("SELECT id FROM product_manuals WHERE wc_product_id=? LIMIT 1");
            $check->bind_param("i", $wc_product_id);
            $check->execute();
            $exists = $check->get_result()->fetch_assoc();
            $check->close();

            if ($exists) {
                flash_set('success', 'This Woo product already has a manual.');
                header('Location: ' . url('admin/manuals'));
                exit;
            }
        }

        $stmt = $db->prepare("
            INSERT INTO product_manuals 
            (source, wc_product_id, wc_slug, legacy_title, legacy_slug, manual_file, sort_order, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param("sissssii",
            $source, $wc_product_id, $wc_slug, $legacy_title,
            $legacy_slug, $manual_file, $sort_order, $status
        );
    }

    $stmt->execute();
    $stmt->close();

    flash_set('success', 'Manual saved successfully.');
    header('Location: ' . url('admin/manuals'));
    exit;
}

/* =========================================
   EDIT
========================================= */
if ($action === 'edit') {

    $stmt = $db->prepare("SELECT * FROM product_manuals WHERE id=?");
    $stmt->bind_param("i", $editId);
    $stmt->execute();
    $manual = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    $wooProducts = fetch_woo_products();

    require VIEW_PATH . 'admin/manuals/edit.php';
    exit;
}

/* =========================================
   CREATE
========================================= */
if ($action === 'create') {

    $wooProducts = fetch_woo_products();

    $manual = [
        'id'=>0,
        'source'=>'woo',
        'wc_product_id'=>'',
        'wc_slug'=>'',
        'legacy_title'=>'',
        'legacy_slug'=>'',
        'manual_file'=>'',
        'sort_order'=>0,
        'status'=>1
    ];

    require VIEW_PATH . 'admin/manuals/edit.php';
    exit;
}

/* =========================================
   LIST
========================================= */
$result = $db->query("SELECT * FROM product_manuals ORDER BY sort_order, id");
$manuals = $result->fetch_all(MYSQLI_ASSOC);
$missingWoo = [];
if ($action === 'list') {
    $missingWoo = fetch_woo_without_manuals($db);
}

require VIEW_PATH . 'admin/manuals/index.php';
