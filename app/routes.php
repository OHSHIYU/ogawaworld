<?php
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$reserved = [
  '', 'home',
  'testimonials','about','technology','products',
  'reviews','events','store-locator','faq','contact',
  'warranty','legal','user-manual',
  'dev','sitemap.xml','robots.txt',
  'uploads','css','js','img',
  'corporate-purchase'
];

switch (true) {

  // --------------------------------------------------
  // HOME
  // --------------------------------------------------
  case ($uri === '' || $uri === 'home'):
    require __DIR__ . '/controllers/TestimonialsController.php';
    require __DIR__ . '/controllers/HomeController.php';
    break;

  // --------------------------------------------------
  // ADMIN
  // --------------------------------------------------
  case ($uri === 'admin' || strpos($uri, 'admin/') === 0):
    require __DIR__ . '/controllers/AdminRouter.php';
    break;

  // --------------------------------------------------
  // TESTIMONIALS
  // --------------------------------------------------
  case ($uri === 'testimonials'):
    require __DIR__ . '/controllers/TestimonialsController.php';
    require VIEW_PATH . 'testimonials/testimonialsIndex.php';
    break;

  // --------------------------------------------------
  // ABOUT
  // --------------------------------------------------
  case ($uri === 'about'):
    require __DIR__ . '/controllers/AboutController.php';
    break;

  // --------------------------------------------------
  // TECHNOLOGY
  // --------------------------------------------------
  case preg_match('/^technology\/(.+)/', $uri, $matches):
    $_GET['slug'] = $matches[1];
    require __DIR__ . '/controllers/TechnologyController.php';
    break;

  // --------------------------------------------------
  // PRODUCTS LIST
  // --------------------------------------------------
  case ($uri === 'products'):       require __DIR__ . '/controllers/ProductsController.php'; break;

  // --------------------------------------------------
  // MANUAL DETAIL
  // --------------------------------------------------
  case preg_match('/^user-manual\/([a-z0-9\-]+)$/', $uri, $matches):
    $_GET['slug'] = $matches[1];
    require __DIR__ . '/controllers/ManualDetailController.php';
    break;

  // --------------------------------------------------
  // STATIC PAGES
  // --------------------------------------------------
  case ($uri === 'reviews'):            require __DIR__ . '/controllers/ReviewsController.php'; break;
  case ($uri === 'events'):             require __DIR__ . '/controllers/EventsController.php'; break;

  // Events: legacy numeric ID route (backwards compat)
  case preg_match('/^events\/detail\/(\d+)$/', $uri, $m):
    $_GET['id'] = $m[1];
    require __DIR__ . '/controllers/EventsController.php';
    break;

  // Events: slug-based route  e.g. /events/start-your-healthy-lifespan
  case preg_match('/^events\/([a-z0-9\-]+)$/', $uri, $m):
    $_GET['slug'] = $m[1];
    require __DIR__ . '/controllers/EventsController.php';
    break;

  case ($uri === 'user-manual'):        require __DIR__ . '/controllers/ManualsController.php'; break;
  case ($uri === 'store-locator'):      require __DIR__ . '/controllers/StoreLocatorController.php'; break;
  case ($uri === 'faq'):                require __DIR__ . '/controllers/FAQController.php'; break;
  case ($uri === 'contact'):            require __DIR__ . '/controllers/ContactController.php'; break;
  case ($uri === 'corporate-purchase'): require __DIR__ . '/controllers/CorporatePurchaseController.php'; break;

  // --------------------------------------------------
  // LEGAL ROOT-LEVEL
  // --------------------------------------------------
  case ($uri !== '' && preg_match('/^[a-z0-9\-]+$/', $uri)):
    $_GET['slug'] = $uri;
    $legalFound = false;
    require __DIR__ . '/controllers/LegalController.php';

    if ($legalFound) {
        exit;
    }

  // --------------------------------------------------
  // PRODUCT DETAIL (SEO slug)
  // --------------------------------------------------
  case ($uri !== ''
        && preg_match('/^[a-z0-9\-]+$/', $uri)
        && !in_array($uri, $reserved, true)):

    $_GET['slug'] = $uri;

    $productFound = false;
    require __DIR__ . '/controllers/PDPController.php';

    if (!$productFound) {
      http_response_code(404);
      require VIEW_PATH . 'layout/404.php';
      exit;
    }

    require VIEW_PATH . 'pdp/pdpIndex.php';
    break;

  // --------------------------------------------------
  // WARRANTY
  // --------------------------------------------------
  case ($uri === 'warranty'):
  case preg_match('/^warranty\/(.+)/', $uri, $matches):
    $_GET['slug'] = $matches[1] ?? null;
    require __DIR__ . '/controllers/WarrantyController.php';
    break;

  // --------------------------------------------------
  // DEV
  // --------------------------------------------------
  case ($uri === 'dev/font-lab'):
    require VIEW_PATH . 'pdp/shared/font-lab.php';
    break;

  // --------------------------------------------------
  // 404
  // --------------------------------------------------
  default:
    http_response_code(404);
    require VIEW_PATH . 'layout/404.php';
    exit;
}
