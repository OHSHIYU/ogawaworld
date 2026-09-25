<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

/**
 * Parse CSV emails from env like "a@x.com,b@y.com"
 */
function ogw_env_emails(string $key): array {
  $raw = trim((string) getenv($key));
  if ($raw === '') return [];
  $parts = array_map('trim', explode(',', $raw));
  return array_values(array_filter($parts, fn($e) => filter_var($e, FILTER_VALIDATE_EMAIL)));
}

/**
 * Form routing config.
 * Add more forms here when needed.
 */
function ogw_mail_route(string $formKey): array {
  $formKey = strtolower(trim($formKey));

  $map = [
    'contact' => [
      'to_email' => getenv('CONTACT_TO_EMAIL') ?: 'customercare@ogawaworld.net',
      'to_name'  => getenv('CONTACT_TO_NAME') ?: 'OGAWA Customer Care',
      'cc'       => ogw_env_emails('CONTACT_CC'),
      'bcc'      => ogw_env_emails('CONTACT_BCC'),
      'subject_prefix' => 'New Contact Enquiry',
      'submitter_name_key' => 'full_name',
      'from_display_name' => 'New Contact Form Submission',
    ],
    'warranty' => [
      'to_email' => getenv('WARRANTY_TO_EMAIL') ?: 'customercare@ogawaworld.net',
      'to_name'  => getenv('WARRANTY_TO_NAME') ?: 'OGAWA Customer Care',
      'cc'       => ogw_env_emails('WARRANTY_CC'),
      'bcc'      => ogw_env_emails('WARRANTY_BCC'),
      'subject_prefix' => 'New Warranty Registration',
      'submitter_name_key' => 'full_name',
      'from_display_name' => 'New Warranty Registration',
    ],
    'corporate' => [
      'to_email' => getenv('CORPORATE_TO_EMAIL') ?: 'ogawa-corporatesales@ogawaworld.net',
      'to_name'  => getenv('CORPORATE_TO_NAME') ?: 'OGAWA Corporate Sales',
      'cc'       => ogw_env_emails('CORPORATE_CC'),
      'bcc'      => ogw_env_emails('CORPORATE_BCC'),
      'subject_prefix' => 'New Corporate Purchase Enquiry',
      'submitter_name_key' => 'full_name',
      'from_display_name' => 'New Corporate Purchase Enquiry',
    ],
  ];

  return $map[$formKey] ?? $map['contact'];
}

/**
 * Create PHPMailer with SMTP settings from env.
 */
function ogw_mailer(): PHPMailer {
  $mail = new PHPMailer(true);

  $smtpHost   = getenv('SMTP_HOST') ?: 'smtphz.qiye.163.com';
  $smtpUser   = getenv('SMTP_USER') ?: '';
  $smtpPass   = getenv('SMTP_PASS') ?: '';
  $smtpPort   = (int) (getenv('SMTP_PORT') ?: 465);
  $smtpSecure = strtolower(getenv('SMTP_SECURE') ?: 'ssl'); // ssl | tls
  $smtpDebug  = (int) (getenv('SMTP_DEBUG') ?: 0);

  if ($smtpUser === '' || $smtpPass === '') {
    throw new Exception('SMTP_USER or SMTP_PASS missing.');
  }

  $mail->isSMTP();
  $mail->Host       = $smtpHost;
  $mail->SMTPAuth   = true;
  $mail->Username   = $smtpUser;
  $mail->Password   = $smtpPass;
  $mail->Port       = $smtpPort;

  if ($smtpSecure === 'tls') {
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  } else {
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  }

  $mail->CharSet = 'UTF-8';

  // Optional debug to error log
  if ($smtpDebug === 1) {
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function ($str, $level) {
      error_log("SMTP DEBUG [$level] $str");
    };
  }

  return $mail;
}

/**
 * Send email for ANY form.
 *
 * $formKey: contact|warranty
 * $payload: sanitized row data (id, name, email etc)
 * $htmlBody / $textBody: generated template per form
 * $attachments: array of [path, name(optional)] or string paths
 */
function ogw_send_form_email(
  string $formKey,
  array $payload,
  string $htmlBody,
  string $textBody,
  array $attachments = []
): bool {
  try {
    $route = ogw_mail_route($formKey);
    $mail  = ogw_mailer();

    // System From (must be your verified mailbox)
    $fromEmail = getenv('MAIL_FROM') ?: (getenv('SMTP_USER'));
    $siteName  = getenv('MAIL_FROM_NAME') ?: 'OGAWA Website';

    // Submitter identity (for display + reply-to)
    $submitEmail = $payload['email'] ?? '';

    $nameKey = $route['submitter_name_key'] ?? 'full_name';
    $submitName =
      $payload[$nameKey]
      ?? $payload['name']
      ?? $payload['applicant_name']
      ?? $payload['customer_name']
      ?? 'Customer';

    // IMPORTANT:
    // From email stays as system mailbox, but From name can show submitter
    $displayFromName = $route['from_display_name'] ?? (trim($submitName) . ' via ' . $siteName);

    $mail->setFrom($fromEmail, $displayFromName);

    // Helps reduce SPF/DMARC alignment issues and weird bounces
    $mail->Sender = $fromEmail;

    // Recipient routing
    $mail->addAddress($route['to_email'], $route['to_name']);

    foreach (($route['cc'] ?? []) as $cc)   $mail->addCC($cc);
    foreach (($route['bcc'] ?? []) as $bcc) $mail->addBCC($bcc);

    // Reply-to submitter (this is what you want)
    if ($submitEmail && filter_var($submitEmail, FILTER_VALIDATE_EMAIL)) {
      $mail->addReplyTo($submitEmail, $submitName);
    }

    // Subject pattern: Prefix + optional type + ref
    $ref    = $payload['id'] ?? '';
    $type   = $payload['inquiry_type'] ?? $payload['category'] ?? '';
    $prefix = $route['subject_prefix'] ?? 'New Submission';

    $subject = $prefix;
    if ($type !== '') $subject .= " [$type]";
    if ($ref  !== '') $subject .= " Ref: $ref";
    $mail->Subject = $subject;

    // Body
    $mail->isHTML(true);
    $mail->Body    = $htmlBody;
    $mail->AltBody = $textBody;

    // Attachments
    foreach ($attachments as $att) {
      if (is_string($att)) {
        if (is_file($att)) $mail->addAttachment($att);
        continue;
      }
      if (is_array($att)) {
        $path = $att['path'] ?? '';
        $name = $att['name'] ?? '';
        if ($path && is_file($path)) {
          $name ? $mail->addAttachment($path, $name) : $mail->addAttachment($path);
        }
      }
    }

    return $mail->send();

  } catch (Exception $e) {
    error_log("Form mail send failed ($formKey): " . $e->getMessage());
    return false;
  }
}

function ogw_send_direct_mail(
  string $toEmail,
  string $toName,
  string $subject,
  string $htmlBody,
  string $textBody,
  array $attachments = []
): bool {

  try {
    $mail = ogw_mailer();

    $fromEmail = getenv('MAIL_FROM') ?: getenv('SMTP_USER');
    $siteName  = getenv('MAIL_FROM_NAME') ?: 'OGAWA Website';

    $mail->setFrom($fromEmail, $siteName);
    $mail->Sender = $fromEmail;

    $mail->addAddress($toEmail, $toName);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $htmlBody;
    $mail->AltBody = $textBody;

    foreach ($attachments as $att) {
      if (is_string($att) && is_file($att)) {
        $mail->addAttachment($att);
      }
      if (is_array($att) && !empty($att['path']) && is_file($att['path'])) {
        $mail->addAttachment($att['path'], $att['name'] ?? '');
      }
    }

    return $mail->send();

  } catch (Exception $e) {
    error_log("Direct mail failed: " . $e->getMessage());
    return false;
  }
}
