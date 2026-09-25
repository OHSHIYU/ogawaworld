<?php
// app/controllers/CorporatePurchaseController.php
require_once dirname(__DIR__) . '/helpers.php';
require_once __DIR__ . '/CorporatePurchaseLogic.php';
require_once dirname(__DIR__) . '/services/mailer.php';
require_once dirname(__DIR__) . '/services/mail-templates.php';

$db = DB::conn();
$success = null;
$errors  = [];
$old = [
    'full_name'=>'',
    'company_name'=>'',
    'contact_number'=>'',
    'email'=>'',
    'address_line1'=>'',
    'address_line2'=>'',
    'city'=>'',
    'state'=>'',
    'postcode'=>'',
    'country'=>'',
    'description'=>'',
    'agreed_terms'=>0
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    csrf_check();

    $recaptcha_secret = '6LffJHcsAAAAAOmX0vDmGHFsADkWql_OO0eAFqpI';
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
                'secret' => $recaptcha_secret,
                'response' => $recaptcha_response,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            ],
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $captcha = json_decode($response, true);

        if (
            !$captcha ||
            empty($captcha['success']) ||
            $captcha['score'] < 0.5 ||
            $captcha['action'] !== 'corporate_form'
        ) {
            $errors['recaptcha'] = 'reCAPTCHA verification failed.';
        }
    }

    foreach ($old as $k => $v) {
        $old[$k] = $_POST[$k] ?? '';
    }

    $old['agreed_terms'] = !empty($_POST['agreed_terms']) ? 1 : 0;

    $errors = array_merge($errors, corporate_validate($old));

    if (!$errors) {

        $enquiry_id = corporate_create($old, $_POST['products'], $_POST['qty']);

        // Prepare product array
        $productData = [];
        foreach ($_POST['products'] as $i => $product) {
            $productData[] = [
                'product_name' => trim($product),
                'qty' => (int) $_POST['qty'][$i]
            ];
        }

        // INTERNAL EMAIL (to OGAWA team)
        list($htmlInternal, $textInternal) =
            ogw_template_corporate_internal($old, $productData);

        ogw_send_form_email(
            'corporate',
            $old,
            $htmlInternal,
            $textInternal
        );

        // CUSTOMER CONFIRMATION EMAIL
        list($htmlCustomer, $textCustomer) =
            ogw_template_corporate_customer($old, $productData);

        ogw_send_direct_mail(
            $old['email'],
            $old['full_name'],
            'Thank you for your Corporate Purchase enquiry - OGAWA Malaysia',
            $htmlCustomer,
            $textCustomer
        );

        $success = "Thank you! Your corporate enquiry has been received.";
        $old = array_fill_keys(array_keys($old), '');
    }
}

// Fetch CMS data for the view
$clients = $db->query("SELECT * FROM cms_clients ORDER BY sort_order, id")->fetch_all(MYSQLI_ASSOC);
$partners = $db->query("SELECT * FROM cms_partners ORDER BY sort_order, id")->fetch_all(MYSQLI_ASSOC);
$awards = $db->query("SELECT * FROM cms_awards ORDER BY sort_order, id")->fetch_all(MYSQLI_ASSOC);
$categories = $db->query("SELECT * FROM cms_massage_categories ORDER BY sort_order, id")->fetch_all(MYSQLI_ASSOC);

require_once dirname(__DIR__) . '/services/seo-pages.php';
ogw_set_seo([
    'title' => 'Corporate Purchase | OGAWA Malaysia',
    'description' => 'OGAWA Corporate Gifting Team provides premium gift solutions and ideas for all your corporate needs.',
]);

require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'corporate/corporateIndex.php';
require VIEW_PATH . 'layout/footer.php';
