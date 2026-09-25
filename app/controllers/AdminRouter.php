<?php
// app/controllers/AdminRouter.php

// Ensure session is started (bootstrap should have done it, but just in case)
if (session_status() === PHP_SESSION_NONE) session_start();

// Helper to check admin auth
function isAdmin() {
    return isset($_SESSION['admin_id']);
}

// Redirect to login if not authenticated
function requireAdmin() {
    if (!isAdmin()) {
        header('Location: ' . url('admin/login'));
        exit;
    }
}

// Parse the admin sub-URI
// $uri comes from routes.php, e.g., 'admin' or 'admin/dashboard'
$adminUri = preg_replace('~^admin/?~', '', $uri); // remove leading 'admin' or 'admin/'
if ($adminUri === '') $adminUri = 'dashboard';    // default to dashboard

// --- Routing Switch ---
switch (true) {
    // Auth
    case ($adminUri === 'login'):
        require __DIR__ . '/AdminAuthController.php';
        break;
    
    case ($adminUri === 'logout'):
        require __DIR__ . '/AdminAuthController.php';
        break;

    // Dashboard
    case ($adminUri === 'dashboard'):
        requireAdmin();
        require __DIR__ . '/AdminDashboardController.php';
        break;

    // Legal Pages
    case ($adminUri === 'legal'):
    case preg_match('~^legal/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminLegalController.php';
        break;

    // FAQ
    case ($adminUri === 'faq'):
    case preg_match('~^faq/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminFaqController.php';
        break;

    // Warranty
    case ($adminUri === 'warranty'):
    case preg_match('~^warranty/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminWarrantyController.php';
        break;

    // Registrations (eWarranty)
    case ($adminUri === 'registrations'):
    case preg_match('~^registrations/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminRegistrationsController.php';
        break;

    // Contact Enquiries
    case ($adminUri === 'contact'):
    case preg_match('~^contact/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminContactController.php';
        break;

    // User Manuals
    case ($adminUri === 'manuals'):
    case preg_match('~^manuals/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminManualController.php';
        break;

    // Promo Banners
    case ($adminUri === 'promo-banners'):
    case preg_match('~^promo-banners/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminPromoBannerController.php';
        break;

    // Corporate Clients
    case ($adminUri === 'clients'):
    case preg_match('~^clients/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminClientsController.php';
        break;

    // Corporate Partners
    case ($adminUri === 'partners'):
    case preg_match('~^partners/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminPartnersController.php';
        break;

    // Corporate Awards
    case ($adminUri === 'awards'):
    case preg_match('~^awards/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminAwardsController.php';
        break;

    // Corporate Categories
    case ($adminUri === 'categories'):
    case preg_match('~^categories/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminCategoriesController.php';
        break;

    // Events
    case ($adminUri === 'events'):
    case preg_match('~^events/(.+)$~', $adminUri):
        requireAdmin();
        require __DIR__ . '/AdminEventsController.php';
        break;

    // CKEditor Uploads
    case ($adminUri === 'ckeditor-upload'):
        require __DIR__ . '/AdminCkeditorUploadController.php';
        break;

    default:
        http_response_code(404);
        requireAdmin(); // Show layout even for 404 inside admin? Or just text.
        echo "<h1>Admin 404 - Page Not Found</h1>";
        break;
}
