<?php
require_once dirname(__DIR__) . '/helpers.php';
require_once __DIR__ . '/WarrantyLogic.php';
require_once dirname(__DIR__) . '/services/mailer.php';
require_once dirname(__DIR__) . '/services/mail-templates.php';

$db = DB::conn();
global $db;

/**
 * Get all active warranty pages
 */
function warranty_all(): array {
  global $db;

  $sql = "
    SELECT id, slug, title, type, content_html, sort_order, status, updated_at
    FROM warranty_pages
    WHERE status = 1 AND is_hidden = 0
    ORDER BY sort_order, id
  ";

  $res = $db->query($sql);
  return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
}

/**
 * Get warranty page by slug
 */
function warranty_by_slug(string $slug): ?array {
  global $db;

  $stmt = $db->prepare("
    SELECT id, slug, title, type, content_html, sort_order, status, updated_at
    FROM warranty_pages
    WHERE slug = ? AND status = 1
    LIMIT 1
  ");

  if (!$stmt) return null;

  $stmt->bind_param("s", $slug);
  $stmt->execute();

  $row = $stmt->get_result()->fetch_assoc();
  $stmt->close();

  if (!$row) return null;

  // Attach tabs if registration type
  if (($row['type'] ?? '') === 'registration') {
    $stmt2 = $db->prepare("
      SELECT tab_key AS `key`, label, content_html
      FROM warranty_tabs
      WHERE warranty_id = ?
      ORDER BY sort_order
    ");

    if ($stmt2) {
      $stmt2->bind_param("i", $row['id']);
      $stmt2->execute();
      $row['tabs'] = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
      $stmt2->close();
    } else {
      $row['tabs'] = [];
    }
  }

  return $row;
}

/**
 * Upload receipt file (optional) and return relative path for DB.
 * Returns '' if no file uploaded.
 */
function warranty_handle_receipt_upload(string $field = 'receipt'): string {
  if (empty($_FILES[$field]) || !isset($_FILES[$field]['error'])) return '';
  if ($_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) return '';

  if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
    throw new Exception(
      'Receipt upload failed (error code ' .
      (int)$_FILES[$field]['error'] .
      ').'
    );
  }

  $name = (string)($_FILES[$field]['name'] ?? 'receipt');
  $size = (int)($_FILES[$field]['size'] ?? 0);

  // 10MB max
  if ($size > 10 * 1024 * 1024) {
    throw new Exception('Receipt file is too large (max 10MB).');
  }

  $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
  $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

  if (!in_array($ext, $allowed, true)) {
    throw new Exception('Receipt must be JPEG, PNG or PDF.');
  }

  // Save to /public/uploads/warranty
  $baseDir = dirname(__DIR__, 2) . '/public/uploads/warranty';

  if (!is_dir($baseDir)) {
    if (!mkdir($baseDir, 0755, true) && !is_dir($baseDir)) {
      throw new Exception('Failed to create upload directory.');
    }
  }

  $safeName =
    'receipt_' .
    date('Ymd_His') .
    '_' .
    bin2hex(random_bytes(6)) .
    '.' .
    $ext;

  $destAbs =
    rtrim($baseDir, '/\\') .
    DIRECTORY_SEPARATOR .
    $safeName;

  if (!move_uploaded_file($_FILES[$field]['tmp_name'], $destAbs)) {
    throw new Exception('Failed to save uploaded receipt.');
  }

  return 'uploads/warranty/' . $safeName;
}


// --------------------------------------------------
// Controller execution
// --------------------------------------------------

$entries = warranty_all();
$slug = $_GET['slug'] ?? null;

if ($slug) {
  $active = warranty_by_slug((string)$slug);

  if (!$active) {
    http_response_code(404);
    require VIEW_PATH . 'errors/404.php';
    exit;
  }

} else {
  $active = $entries[0] ?? null;
}


// --------------------------------------------------
// Handle sub-tab
// --------------------------------------------------

$sub = $_GET['sub'] ?? 'info';

$tabs =
  ($active && ($active['type'] ?? '') === 'registration')
    ? ($active['tabs'] ?? [])
    : [];


// --------------------------------------------------
// E-WARRANTY T&C SYNC
//
// General Warranty T&C
// -> use /warranty/general-warranty content
//
// Leather Warranty T&C
// -> use /warranty/leather-warranty content
//
// Register tab remains unchanged.
// --------------------------------------------------

if (!empty($tabs)) {

  // Load the two canonical warranty pages.
  $generalWarranty = warranty_by_slug('general-warranty');
  $leatherWarranty = warranty_by_slug('leather-warranty');

  foreach ($tabs as &$tab) {

    $tabKey = $tab['key'] ?? '';

    // ----------------------------------------------
    // GENERAL WARRANTY T&C
    // ----------------------------------------------
    if ($tabKey === 'general-warranty' && $generalWarranty) {

      $tab['content_html'] =
        $generalWarranty['content_html'] ?? '';

      /*
       * E-Warranty General Warranty T&C requires
       * this additional registration notice.
       *
       * This notice is intentionally kept only
       * inside the E-Warranty T&C tab.
       */
      $registrationNotice = '
        <p class="ewarranty-registration-notice">
          Register your product within <strong>14 days</strong>
          of purchase to activate extended benefits where applicable.
        </p>
      ';

      $tab['content_html'] =
        $registrationNotice .
        $tab['content_html'];
    }


    // ----------------------------------------------
    // LEATHER WARRANTY T&C
    // ----------------------------------------------
    elseif ($tabKey === '-leather-warranty' && $leatherWarranty) {

      $tab['content_html'] =
        $leatherWarranty['content_html'] ?? '';
    }
  }

  // Remove foreach reference
  unset($tab);
}


// --------------------------------------------------
// Validate selected tab
// --------------------------------------------------

$tabKeys = array_column($tabs, 'key');

if (!in_array($sub, $tabKeys, true)) {
  $sub = $tabKeys[0] ?? 'info';
}


// --------------------------------------------------
// Registration POST (SAVE + EMAIL)
// Only handle submit if on registration page
// + register tab
// --------------------------------------------------

$success = null;
$errors  = [];

if (
  $_SERVER['REQUEST_METHOD'] === 'POST'
  && $active
  && ($active['type'] ?? '') === 'registration'
  && $sub === 'register'
) {
  try {

    csrf_check();

    // ------------------------------------
    // reCAPTCHA verification
    // ------------------------------------

    $recaptcha_secret =
      '6LdvancsAAAAAEYS6s8XySRE7Inrpb5eovSJVnMV';

    $recaptcha_response =
      $_POST['g-recaptcha-response'] ?? '';

    if (empty($recaptcha_response)) {

      $errors['recaptcha'] =
        'reCAPTCHA token missing.';

    } else {

      $ch = curl_init();

      curl_setopt_array($ch, [
        CURLOPT_URL =>
          'https://www.google.com/recaptcha/api/siteverify',

        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,

        CURLOPT_POSTFIELDS => [
          'secret'   => $recaptcha_secret,
          'response' => $recaptcha_response,
          'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
        ],
      ]);

      $response = curl_exec($ch);
      curl_close($ch);

      if ($response === false) {

        $errors['recaptcha'] =
          'Unable to verify reCAPTCHA.';

      } else {

        $captcha = json_decode($response, true);

        if (
          !$captcha ||
          empty($captcha['success']) ||
          ($captcha['score'] ?? 0) < 0.6 ||
          ($captcha['action'] ?? '') !== 'warranty_register'
        ) {
          $errors['recaptcha'] =
            'reCAPTCHA verification failed.';
        }
      }
    }


    // ------------------------------------
    // Form values
    // ------------------------------------

    $fullName =
      trim((string)($_POST['full_name'] ?? ''));

    $email =
      trim((string)($_POST['email'] ?? ''));

    $countryCode =
      trim((string)($_POST['country_code'] ?? '+60'));

    $phone =
      trim((string)($_POST['phone'] ?? ''));

    $state =
      trim((string)($_POST['state'] ?? ''));

    $purchaseDate =
      trim((string)($_POST['purchase_date'] ?? ''));

    $productModel =
      trim((string)($_POST['product_model'] ?? ''));

    $serialNo =
      trim((string)($_POST['serial_no'] ?? ''));

    $purchasedFrom =
      trim((string)($_POST['purchased_from'] ?? ''));

    $agree =
      !empty($_POST['agree']) ? 1 : 0;


    // ------------------------------------
    // Validate
    // ------------------------------------

    if ($fullName === '') {
      $errors['full_name'] =
        'Full name is required.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] =
        'A valid email is required.';
    }

    if ($countryCode === '') {
      $errors['phone'] =
        'Country code is required.';
    }

    if ($phone === '') {

      $errors['phone'] =
        'Phone is required.';

    } elseif (!preg_match('/^[0-9\- ]+$/', $phone)) {

      $errors['phone'] =
        'Phone format is invalid.';
    }

    if ($purchaseDate === '') {
      $errors['purchase_date'] =
        'Purchase date is required.';
    }

    if ($productModel === '') {
      $errors['product_model'] =
        'Product model is required.';
    }

    if ($serialNo === '') {
      $errors['serial_no'] =
        'Serial number is required.';
    }

    if (!$agree) {
      $errors['agree'] =
        'You must accept the Warranty Terms.';
    }


    // ------------------------------------
    // Upload receipt (optional)
    // ------------------------------------

    $receiptPath = '';

    if (!$errors) {
      $receiptPath =
        warranty_handle_receipt_upload('receipt');
    }


    // ------------------------------------
    // Save
    // ------------------------------------

    if (!$errors) {

      // Save to DB:
      // form has ONE phone field
      // -> store in phone_number

      $data = [
        'full_name'      => $fullName,
        'email'          => $email,
        'phone_cc'       => $countryCode,
        'phone_number'   => $phone,
        'state'          => $state,
        'product_model'  => $productModel,
        'serial_no'      => $serialNo,
        'purchased_from' => $purchasedFrom,
        'purchase_date'  => $purchaseDate,
        'receipt_path'   => $receiptPath,
        'agree_tnc'      => $agree,
        'ip_addr'        => $_SERVER['REMOTE_ADDR'] ?? '',
        'user_agent'     => $_SERVER['HTTP_USER_AGENT'] ?? '',
      ];

      $newId =
        warranty_save_registration($data);


      // ------------------------------------
      // Build payload for email template
      // ------------------------------------

      $payload = [
        'id'             => $newId,
        'full_name'      => $fullName,
        'email'          => $email,
        'phone'          => $countryCode . ' ' . $phone,
        'state'          => $state,
        'product_model'  => $productModel,
        'serial_no'      => $serialNo,
        'purchased_from' => $purchasedFrom,
        'purchase_date'  => $purchaseDate,
        'submitted_at'   => date('Y-m-d H:i:s'),
        'has_attachment' => !empty($receiptPath),
      ];

      [$html, $text] =
        ogw_template_warranty($payload);


      // ------------------------------------
      // Attach receipt if uploaded
      // ------------------------------------

      $attachments = [];

      if ($receiptPath !== '') {

        $abs =
          dirname(__DIR__, 2) .
          '/public/' .
          ltrim($receiptPath, '/');

        if (is_file($abs)) {
          $attachments[] = [
            'path' => $abs,
            'name' => basename($abs)
          ];
        }
      }


      // --------------------------------------------------
      // 1. Send to CUSTOMER (confirmation)
      // --------------------------------------------------

      $customerSubject =
        "OGAWA Warranty Registration Confirmation (Ref: {$newId})";

      $customerSent =
        ogw_send_direct_mail(
          $email,
          $fullName,
          $customerSubject,
          $html,
          $text
        );

      if (!$customerSent) {
        error_log(
          'Warranty customer email failed. Ref=' .
          $newId
        );
      }


      // --------------------------------------------------
      // 2. Send to CUSTOMER CARE
      // --------------------------------------------------

      $internalSubject =
        "New Warranty Registration - Ref {$newId}";

      [$internalHtml, $internalText] =
        ogw_template_warranty_internal($payload);

      $careSent =
        ogw_send_form_email(
          'warranty',
          $payload,
          $internalHtml,
          $internalText,
          $attachments
        );

      if (!$careSent) {
        error_log(
          'Warranty internal email failed. Ref=' .
          $newId
        );
      }


      // ------------------------------------
      // Success
      // ------------------------------------

      $success =
        'Thank you! Your warranty registration has been received. Reference: ' .
        e($newId);

      // Reset form values
      $_POST = [];
    }

  } catch (Exception $e) {

    error_log(
      'Warranty submit error: ' .
      $e->getMessage()
    );

    $errors['general'] =
      'Something went wrong. Please try again.';
  }
}


// --------------------------------------------------
// Render
// --------------------------------------------------

require_once dirname(__DIR__) . '/services/seo-pages.php';

ogw_set_seo([
  'title' =>
    ($active['title'] ?? 'Warranty') .
    ' | OGAWA Malaysia',

  'description' =>
    'Warranty information for OGAWA Malaysia products.',
]);

require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'warranty/warrantyIndex.php';
require VIEW_PATH . 'layout/footer.php';