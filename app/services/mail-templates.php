<?php
// app/services/mail-templates.php

function ogw_esc($v): string {
  return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}

/**
 * CONTACT template
 */
function ogw_template_contact(array $row): array {
  $fullName  = trim(($row['title'] ?? '') . ' ' . ($row['full_name'] ?? ''));
  $phone     = (string)($row['contact_number'] ?? '');
  $email     = (string)($row['email'] ?? '');
  $state     = (string)($row['state'] ?? '');
  $postcode  = (string)($row['postcode'] ?? '');
  $type      = (string)($row['inquiry_type'] ?? '');
  $descRaw   = (string)($row['description'] ?? '');

  $interested  = !empty($row['interested_service']);
  $agreedTerms = !empty($row['agreed_terms']); // IMPORTANT: matches your ContactLogic field

  $subjectLine = 'Ogawa Malaysia: Contact Us response';

  $emailHtml = $email !== ''
    ? '<a href="mailto:' . ogw_esc($email) . '">' . ogw_esc($email) . '</a>'
    : '';

  $html = "
    <p><strong>Subject: {$subjectLine}</strong></p>
    <br>

    <p>You have received a response to your Contact Us form, with the following responses:</p>
    <br>

    <p>
      Full Name: " . ogw_esc($fullName) . "<br>
      Contact Number: " . ogw_esc($phone) . "<br>
      Email Address: {$emailHtml}<br>
      State: " . ogw_esc($state) . "<br>
      Postcode: " . ogw_esc($postcode) . "<br>
      Type of Inquiry: " . ogw_esc($type) . "<br>
      Description: " . ogw_esc($descRaw) . "
    </p>
  ";

  if ($interested) {
    $html .= "<br><p><strong>I am interested into Service Maintenance Package</strong></p>";
  }

  if ($agreedTerms) {
    $html .= "<br><p><strong>I have read and understood the terms and conditions of the Policy Notice and hereby agree to the same</strong></p>";
  }

  // Optional internal footer
  $html .= "
    <br>
    <hr>
    <p style='color:#666;font-size:12px'>
      Submitted: " . ogw_esc($row['submitted_at'] ?? '') . "
    </p>
  ";

  $text  = "Subject: {$subjectLine}\n\n";
  $text .= "You have received a response to your Contact Us form, with the following responses:\n\n";
  $text .= "Full Name: {$fullName}\n";
  $text .= "Contact Number: {$phone}\n";
  $text .= "Email Address: {$email}\n";
  $text .= "State: {$state}\n";
  $text .= "Postcode: {$postcode}\n";
  $text .= "Type of Inquiry: {$type}\n";
  $text .= "Description: {$descRaw}\n\n";

  if ($interested)  $text .= "I am interested into Service Maintenance Package\n\n";
  if ($agreedTerms) $text .= "I have read and understood the terms and conditions of the Policy Notice and hereby agree to the same\n\n";

  $text .= "IP: " . ($row['ip'] ?? '') . "\n";
  $text .= "UA: " . ($row['user_agent'] ?? '') . "\n";
  $text .= "Submitted: " . ($row['submitted_at'] ?? '') . "\n";

  return [$html, $text];
}

/**
 * WARRANTY template
 */
function ogw_template_warranty(array $row): array {
  $name  = ogw_esc($row['full_name'] ?? '');
  $email = ogw_esc($row['email'] ?? '');
  $ref   = ogw_esc($row['id'] ?? '');

  $html = "
  <div style='font-family:Arial,Helvetica,sans-serif;color:#333;max-width:720px'>
    <p>Dear <strong>{$name}</strong>,</p>

    <p>
      Thank you for purchasing <strong>OGAWA</strong>.
      Your warranty has been <strong>successfully registered</strong>.
    </p>

    <p>
      Below are your warranty registration details for your reference.
      For more information on warranty coverage, please refer to
      <a href='https://www.ogawaworld.net/warranty/general-warranty' target='_blank'>
        OGAWA Warranty Policy
      </a>.
    </p>

    <table width='100%' cellpadding='8' cellspacing='0'
           style='border-collapse:collapse;background:#f9f9f9;margin-top:20px'>
      <tr><td width='35%'><strong>Reference No.</strong></td><td>{$ref}</td></tr>
      <tr><td><strong>Full Name</strong></td><td>{$name}</td></tr>
      <tr><td><strong>Email Address</strong></td><td>{$email}</td></tr>
      <tr><td><strong>Contact Number</strong></td><td>".ogw_esc($row['phone'] ?? '')."</td></tr>
      <tr><td><strong>State</strong></td><td>".ogw_esc($row['state'] ?? '')."</td></tr>
      <tr><td><strong>Model / Item Purchased</strong></td><td>".ogw_esc($row['product_model'] ?? '')."</td></tr>
      <tr><td><strong>Serial Number</strong></td><td>".ogw_esc($row['serial_no'] ?? '')."</td></tr>
      <tr><td><strong>Purchase Date</strong></td><td>".ogw_esc($row['purchase_date'] ?? '')."</td></tr>
      <tr><td><strong>Purchased From</strong></td><td>".ogw_esc($row['purchased_from'] ?? '')."</td></tr>
      <tr>
        <td><strong>Additional Proof</strong></td>
        <td>".(!empty($row['has_attachment']) ? 'Attached' : 'Not Provided')."</td>
      </tr>
      <tr><td><strong>Status</strong></td><td><strong>Approved</strong></td></tr>
    </table>

    <p style='margin-top:20px'>
      By submitting this warranty registration, you have confirmed that you have
      read and agreed to OGAWA’s Warranty Terms & Conditions.
    </p>

    <p>
      If you require further assistance, please contact us at
      <a href='mailto:customercare@ogawaworld.net'>customercare@ogawaworld.net</a>.
    </p>

    <p style='margin-top:30px'>
      Warm regards,<br>
      <strong>OGAWA Customer Care</strong>
    </p>

    <hr style='margin:30px 0'>

    <p style='font-size:12px;color:#777'>
      This is an auto-generated email. Please do not reply directly to this message.
    </p>
  </div>
  ";

  $text =
    "Dear {$name},\n\n" .
    "Thank you for purchasing OGAWA. Your warranty has been successfully registered.\n\n" .
    "Reference No: {$ref}\n" .
    "Model: " . ($row['product_model'] ?? '') . "\n" .
    "Serial No: " . ($row['serial_no'] ?? '') . "\n" .
    "Purchase Date: " . ($row['purchase_date'] ?? '') . "\n\n" .
    "For warranty information, please visit:\n" .
    "https://www.ogawaworld.net/warranty/general-warranty\n\n" .
    "OGAWA Customer Care";

  return [$html, $text];
}
function ogw_template_warranty_internal(array $row): array {
  $ref = ogw_esc($row['id'] ?? '');

  $html = "
  <div style='font-family:Arial,Helvetica,sans-serif;color:#333;max-width:720px'>
    <h2 style='margin-bottom:10px'>New Warranty Registration</h2>

    <table width='100%' cellpadding='8' cellspacing='0'
           style='border-collapse:collapse;background:#f9f9f9;margin-top:15px'>
      <tr><td width='35%'><strong>Reference No.</strong></td><td>{$ref}</td></tr>
      <tr><td><strong>Full Name</strong></td><td>".ogw_esc($row['full_name'] ?? '')."</td></tr>
      <tr><td><strong>Email Address</strong></td><td>".ogw_esc($row['email'] ?? '')."</td></tr>
      <tr><td><strong>Contact Number</strong></td><td>".ogw_esc($row['phone'] ?? '')."</td></tr>
      <tr><td><strong>State</strong></td><td>".ogw_esc($row['state'] ?? '')."</td></tr>
      <tr><td><strong>Model / Item Purchased</strong></td><td>".ogw_esc($row['product_model'] ?? '')."</td></tr>
      <tr><td><strong>Serial Number</strong></td><td>".ogw_esc($row['serial_no'] ?? '')."</td></tr>
      <tr><td><strong>Purchase Date</strong></td><td>".ogw_esc($row['purchase_date'] ?? '')."</td></tr>
      <tr><td><strong>Purchased From</strong></td><td>".ogw_esc($row['purchased_from'] ?? '')."</td></tr>
      <tr>
        <td><strong>Proof of Purchase</strong></td>
        <td>".(!empty($row['has_attachment']) ? 'Attached' : 'Not Provided')."</td>
      </tr>
    </table>

    <p style='margin-top:20px'>
      Please review this warranty registration in the admin panel.
    </p>

    <hr style='margin:30px 0'>

    <p style='font-size:12px;color:#777'>
      This is an internal system notification from OGAWA Website.
    </p>
  </div>
  ";

  $text =
    "New Warranty Registration\n\n" .
    "Reference No: {$ref}\n" .
    "Full Name: " . ($row['full_name'] ?? '') . "\n" .
    "Email: " . ($row['email'] ?? '') . "\n" .
    "Phone: " . ($row['phone'] ?? '') . "\n" .
    "Model: " . ($row['product_model'] ?? '') . "\n" .
    "Serial No: " . ($row['serial_no'] ?? '') . "\n" .
    "Purchase Date: " . ($row['purchase_date'] ?? '') . "\n";

  return [$html, $text];
}

/**
 * CORPORATE template
 */
function ogw_template_corporate_customer(array $row, array $products): array {

  $productText = '';
  foreach ($products as $p) {
      $productText .= $p['product_name'] . 
                      " - (" . $p['qty'] . " Quantity)\n";
  }

  $html = "
  <div style='font-family:Arial,Helvetica,sans-serif;color:#333;max-width:720px'>
    <p>Dear <strong>" . ogw_esc($row['full_name']) . "</strong>,</p>

    <p>
      Thank you for your Corporate Purchase enquiry with <strong>OGAWA Malaysia</strong>.
      Our Corporate Team has received your request and will contact you shortly.
    </p>

    <p><strong>Your Submitted Details:</strong></p>

    <p>
      Company Name: " . ogw_esc($row['company_name']) . "<br>
      Contact Number: " . ogw_esc($row['contact_number']) . "<br>
      Email: " . ogw_esc($row['email']) . "
    </p>

    <p><strong>Product Details:</strong><br>
    " . nl2br(ogw_esc($productText)) . "</p>

    <p>
      If you have further questions, please contact us at
      <a href='mailto:ogawa-corporatesales@ogawaworld.net'>ogawa-corporatesales@ogawaworld.net</a>.
    </p>

    <p style='margin-top:30px'>
      Warm regards,<br>
      <strong>OGAWA Corporate Team</strong>
    </p>

    <hr>
    <p style='font-size:12px;color:#777'>
      This is an auto-generated email. Please do not reply directly to this message.
    </p>
  </div>
  ";

  $text =
    "Dear {$row['full_name']},\n\n" .
    "Thank you for your Corporate Purchase enquiry.\n\n" .
    "Products:\n{$productText}\n\n" .
    "OGAWA Corporate Team";

  return [$html, $text];
}
function ogw_template_corporate_internal(array $row, array $products): array {

  $subjectLine = 'Ogawa Malaysia: Corporate Purchase form response';

  // Build product table rows
  $productRows = '';
  foreach ($products as $p) {
      $productRows .= "
        <tr>
          <td style='padding:8px;border:1px solid #ddd'>" . ogw_esc($p['product_name']) . "</td>
          <td style='padding:8px;border:1px solid #ddd;text-align:center'>" . ogw_esc($p['qty']) . "</td>
        </tr>
      ";
  }

  $html = "
  <div style='font-family:Arial,Helvetica,sans-serif;color:#333;max-width:750px;margin:auto'>

    <h2 style='margin-bottom:5px;color:#000'>New Corporate Purchase Enquiry</h2>
    <p style='color:#777;font-size:13px;margin-top:0'>
      A new corporate enquiry has been submitted via the website.
    </p>

    <hr style='margin:20px 0'>

    <h3 style='margin-bottom:10px'>Contact Information</h3>

    <table width='100%' cellpadding='0' cellspacing='0' style='border-collapse:collapse;background:#f9f9f9'>
      <tr><td style='padding:8px;width:35%'><strong>Full Name</strong></td><td style='padding:8px'>" . ogw_esc($row['full_name']) . "</td></tr>
      <tr><td style='padding:8px'><strong>Company Name</strong></td><td style='padding:8px'>" . ogw_esc($row['company_name']) . "</td></tr>
      <tr><td style='padding:8px'><strong>Contact Number</strong></td><td style='padding:8px'>" . ogw_esc($row['contact_number']) . "</td></tr>
      <tr><td style='padding:8px'><strong>Email</strong></td><td style='padding:8px'>
        <a href='mailto:" . ogw_esc($row['email']) . "'>" . ogw_esc($row['email']) . "</a>
      </td></tr>
    </table>

    <br>

    <h3 style='margin-bottom:10px'>Address Details</h3>

    <table width='100%' cellpadding='0' cellspacing='0' style='border-collapse:collapse;background:#f9f9f9'>
      <tr><td style='padding:8px;width:35%'><strong>Address Line 1</strong></td><td style='padding:8px'>" . ogw_esc($row['address_line1']) . "</td></tr>
      <tr><td style='padding:8px'><strong>Address Line 2</strong></td><td style='padding:8px'>" . ogw_esc($row['address_line2']) . "</td></tr>
      <tr><td style='padding:8px'><strong>City</strong></td><td style='padding:8px'>" . ogw_esc($row['city']) . "</td></tr>
      <tr><td style='padding:8px'><strong>State / Province</strong></td><td style='padding:8px'>" . ogw_esc($row['state']) . "</td></tr>
      <tr><td style='padding:8px'><strong>Postcode</strong></td><td style='padding:8px'>" . ogw_esc($row['postcode']) . "</td></tr>
      <tr><td style='padding:8px'><strong>Country</strong></td><td style='padding:8px'>" . ogw_esc($row['country']) . "</td></tr>
    </table>

    <br>

    <h3 style='margin-bottom:10px'>Product Details</h3>

    <table width='100%' cellpadding='0' cellspacing='0' style='border-collapse:collapse;background:#ffffff'>
      <tr style='background:#000;color:#fff'>
        <th style='padding:8px;border:1px solid #ddd;text-align:left'>Product Name</th>
        <th style='padding:8px;border:1px solid #ddd;text-align:center'>Quantity</th>
      </tr>
      {$productRows}
    </table>

    <br>

    <h3 style='margin-bottom:10px'>Additional Notes</h3>
    <div style='background:#f4f4f4;padding:12px;border-radius:4px'>
      " . nl2br(ogw_esc($row['description'] ?? 'No additional notes provided.')) . "
    </div>

    <hr style='margin:30px 0'>

    <p style='font-size:12px;color:#777'>
      This is an automated system notification from OGAWA Website.<br>
      Submitted on: " . date('Y-m-d H:i:s') . "
    </p>

  </div>
  ";

  $text  = "New Corporate Purchase Enquiry\n\n";
  $text .= "Full Name: " . ($row['full_name'] ?? '') . "\n";
  $text .= "Company Name: " . ($row['company_name'] ?? '') . "\n";
  $text .= "Contact Number: " . ($row['contact_number'] ?? '') . "\n";
  $text .= "Email: " . ($row['email'] ?? '') . "\n\n";
  $text .= "Products:\n";

  foreach ($products as $p) {
      $text .= "- {$p['product_name']} ({$p['qty']})\n";
  }

  $text .= "\nAdditional Notes:\n" . ($row['description'] ?? '') . "\n";

  return [$html, $text];
}
