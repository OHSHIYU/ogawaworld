<?php
require_once dirname(__DIR__) . '/helpers.php';
require_once __DIR__ . '/ContactLogic.php';
require_once dirname(__DIR__) . '/services/mailer.php';
require_once dirname(__DIR__) . '/services/mail-templates.php';

$success = null;
$errors  = [];
$old     = [
  'title' => 'Mr','full_name'=>'','contact_number'=>'','email'=>'',
  'state'=>'','postcode'=>'','inquiry_type'=>'','description'=>'',
  'interested_service'=>0,'agreed_terms'=>0
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  csrf_check();

  $recaptcha_secret = '6LcAl3csAAAAADf63m7ideXK4vtooAVmE3RQjEi2';
  $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';

  if (empty($recaptcha_response)) {
      $errors['recaptcha'] = 'reCAPTCHA token missing.';
  } else {

      $ch = curl_init();
      curl_setopt_array($ch, [
          CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
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
          $errors['recaptcha'] = 'Unable to verify reCAPTCHA.';
      } else {
          $captcha = json_decode($response, true);

          if (
              !$captcha ||
              empty($captcha['success']) ||
              ($captcha['score'] ?? 0) < 0.5 ||
              ($captcha['action'] ?? '') !== 'contact_form'
          ) {
              $errors['recaptcha'] = 'reCAPTCHA verification failed.';
          }
      }
  }

  foreach ($old as $k => $v) {
    $old[$k] = $_POST[$k] ?? ($k === 'interested_service' || $k === 'agreed_terms' ? 0 : '');
  }
  $old['interested_service'] = !empty($_POST['interested_service']) ? 1 : 0;
  $old['agreed_terms']       = !empty($_POST['agreed_terms']) ? 1 : 0;

  $errors = array_merge($errors, contact_validate($old));

  if (!$errors) {
    $created = contact_create($old);

    // Generate email bodies
    [$html, $text] = ogw_template_contact($created);

    // Send email via unified mailer (contact route)
    $sent = ogw_send_form_email('contact', $created, $html, $text);

    if (!$sent) {
      error_log('Contact enquiry email failed. Ref=' . ($created['id'] ?? ''));
      // Optional: show warning in UI if you want
      // $success = 'Thank you! Your enquiry has been received, but email notification failed. Reference: ' . e($created['id']);
    }

    $success = 'Thank you! Your enquiry has been received.';

    // reset form
    $old = [
      'title' => 'Mr','full_name'=>'','contact_number'=>'','email'=>'',
      'state'=>'','postcode'=>'','inquiry_type'=>'','description'=>'',
      'interested_service'=>0,'agreed_terms'=>0
    ];
  }
}

// --- Render view
require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
  'title' => 'Contact Us | OGAWA Malaysia',
  'description' => 'Get in touch with OGAWA Malaysia for enquiries, support and assistance.',
]);

require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'contact/contactIndex.php';
require VIEW_PATH . 'layout/footer.php';
