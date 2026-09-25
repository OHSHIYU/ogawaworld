<?php
require_once dirname(__DIR__) . '/helpers.php';
require_once dirname(__DIR__) . '/config/database.php';

/**
 * Save warranty registration into DB
 * Returns new AUTO_INCREMENT ID.
 */
function warranty_save_registration(array $data): int {
  global $db;

  $sql = "INSERT INTO ewarranty_registrations
    (full_name, email, phone_cc, phone_number, state, product_model, serial_no,
     purchased_from, purchase_date, receipt_path, agree_tnc, ip_addr, user_agent, status)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?, 'new')";

  $stmt = $db->prepare($sql);
  if (!$stmt) {
    throw new Exception('DB prepare failed: ' . $db->error);
  }

  // Store IP as readable string (recommended: VARCHAR(45) for IPv4/IPv6)
  $ipStr = (string)($data['ip_addr'] ?? '');

  $stmt->bind_param(
    'ssssssssssiss',
    $data['full_name'],
    $data['email'],
    $data['phone_cc'],
    $data['phone_number'],
    $data['state'],
    $data['product_model'],
    $data['serial_no'],
    $data['purchased_from'],
    $data['purchase_date'],
    $data['receipt_path'],
    $data['agree_tnc'],   // int
    $ipStr,               // string
    $data['user_agent']   // string
  );

  if (!$stmt->execute()) {
    $err = $stmt->error;
    $stmt->close();
    throw new Exception('DB execute failed: ' . $err);
  }

  $id = (int)$stmt->insert_id;
  $stmt->close();

  return $id;
}
