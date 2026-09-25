<?php
// Change this on launch day only.
define('OGW_ENV', 'production'); // 'staging' or 'production'

// Staging vs production base URLs
if (OGW_ENV === 'production') {
    define('OGW_BASE_URL', 'https://ogawaworld.net');
} else {
    // your current preview/staging URL
    // define('OGW_BASE_URL', 'https://green-rabbit-511600.hostingersite.com');
    define('OGW_BASE_URL', 'https://my-ogawa.com');
}

// Default OG image (fallback)
define('OGW_DEFAULT_OG_IMAGE', OGW_BASE_URL . '/og-image.png');
