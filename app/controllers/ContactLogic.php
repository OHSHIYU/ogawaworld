<?php
require_once dirname(__DIR__) . '/helpers.php';

$db = DB::conn();
global $db;

/**
 * Generate ULID-like unique ID.
 */
function contact_ulid(): string {
  $alphabet = '0123456789ABCDEFGHJKMNPQRSTVWXYZ';
  $time = (int) floor(microtime(true) * 1000);

  $t = '';
  for ($i = 0; $i < 10; $i++) {
    $t = $alphabet[$time % 32] . $t;
    $time = intdiv($time, 32);
  }

  $r = '';
  for ($i = 0; $i < 16; $i++) $r .= $alphabet[random_int(0, 31)];
  return $t . $r;
}

/**
 * Validate input.
 */
function contact_validate(array $in): array {
  $errs = [];

  if (!isset($in['title']) || !in_array($in['title'], ['Mr','Ms','Mrs','Dr','Other'], true)) {
    $errs['title'] = 'Please choose a salutation.';
  }

  if (trim($in['full_name'] ?? '') === '') {
    $errs['full_name'] = 'Full name is required.';
  }

  if (!filter_var($in['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
    $errs['email'] = 'A valid email is required.';
  }

  if (trim($in['inquiry_type'] ?? '') === '') {
    $errs['inquiry_type'] = 'Please select a type of inquiry.';
  }

  if (trim($in['description'] ?? '') === '') {
    $errs['description'] = 'Please tell us about your inquiry.';
  }

  if (empty($in['agreed_terms'])) {
    $errs['agreed_terms'] = 'You must agree to the Policy Notice.';
  }

  return $errs;
}

/**
 * Create and store a new record (DB).
 */
function contact_create(array $in): array {
  global $db;

  $clean = fn($v) => trim(strip_tags((string)$v));

  $row = [
    'title'              => $in['title'] ?? 'Mr',
    'full_name'          => $clean($in['full_name'] ?? ''),
    'contact_number'     => $clean($in['contact_number'] ?? ''),
    'email'              => $clean($in['email'] ?? ''),
    'state'              => $clean($in['state'] ?? ''),
    'postcode'           => $clean($in['postcode'] ?? ''),
    'inquiry_type'       => $clean($in['inquiry_type'] ?? ''),
    'description'        => trim((string)($in['description'] ?? '')), // keep formatting
    'interested_service' => !empty($in['interested_service']) ? 1 : 0,
    'agreed_terms'       => !empty($in['agreed_terms']) ? 1 : 0,
    'status'             => 'new',
    'submitted_at'       => date('Y-m-d H:i:s'),
    'updated_at'         => date('Y-m-d H:i:s'),
    'ip'                 => $_SERVER['REMOTE_ADDR'] ?? '',
    'user_agent'         => $_SERVER['HTTP_USER_AGENT'] ?? '',
  ];

  $sql = "INSERT INTO contact_enquiries
    (title, full_name, contact_number, email, state, postcode, inquiry_type, description,
     interested_service, agreed_terms, status, submitted_at, updated_at, ip, user_agent)
    VALUES
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $db->prepare($sql);
  if (!$stmt) {
    error_log('Contact insert prepare failed: ' . $db->error);
    return $row;
  }

  $stmt->bind_param(
    'sssssssssiiisss',
    $row['title'],
    $row['full_name'],
    $row['contact_number'],
    $row['email'],
    $row['state'],
    $row['postcode'],
    $row['inquiry_type'],
    $row['description'],
    $row['interested_service'],
    $row['agreed_terms'],
    $row['status'],
    $row['submitted_at'],
    $row['updated_at'],
    $row['ip'],
    $row['user_agent']
  );

  if (!$stmt->execute()) {
    error_log('Contact insert execute failed: ' . $stmt->error);
    $stmt->close();
    return $row;
  }

  $newId = (int)$db->insert_id;
  $stmt->close();
  $row['id'] = $newId;

  return $row;
}
