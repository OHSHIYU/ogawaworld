<?php
// app/controllers/CorporatePurchaseLogic.php

/**
 * Validate corporate enquiry form data.
 */
function corporate_validate(array $data): array {

    $errors = [];

    $required = [
        'full_name','company_name','contact_number','email',
        'address_line1','city','state','postcode','country'
    ];

    foreach ($required as $field) {
        if (empty($data[$field])) {
            $errors[$field] = ucfirst(str_replace('_',' ',$field)) . ' is required.';
        }
    }

    if (empty($_POST['products']) || empty($_POST['qty'])) {
        $errors['products'] = 'At least one product is required.';
    } else {
        foreach ($_POST['products'] as $i => $product) {
            if (empty(trim($product))) {
                $errors['products'] = 'Product name cannot be empty.';
                break;
            }

            if (!isset($_POST['qty'][$i]) || (int)$_POST['qty'][$i] <= 0) {
                $errors['products'] = 'Invalid quantity.';
                break;
            }
        }
    }

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }

    return $errors;
}

function corporate_create(array $data, array $products, array $qty): int {

    $db = DB::conn();

    $stmt = $db->prepare("
        INSERT INTO corporate_enquiries
        (full_name, company_name, contact_number, email,
        address_line1, address_line2, city, state, postcode, country,
        description, agreed_terms, created_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");

    $stmt->bind_param(
        'sssssssssssi',
        $data['full_name'],
        $data['company_name'],
        $data['contact_number'],
        $data['email'],
        $data['address_line1'],
        $data['address_line2'],
        $data['city'],
        $data['state'],
        $data['postcode'],
        $data['country'],
        $data['description'],
        $data['agreed_terms']
    );

    $stmt->execute();
    $enquiry_id = $stmt->insert_id;
    $stmt->close();

    if (!empty($products)) {
        foreach ($products as $index => $product) {

            $product = trim($product);
            $quantity = (int)$qty[$index];

            if ($product && $quantity > 0) {

                $stmt = $db->prepare("
                    INSERT INTO corporate_enquiry_products
                    (enquiry_id, product_name, qty)
                    VALUES (?, ?, ?)
                ");

                $stmt->bind_param('isi', $enquiry_id, $product, $quantity);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    return $enquiry_id;
}
