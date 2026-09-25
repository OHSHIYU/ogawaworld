<?php
/**
 * Central app constants + config array.
 * - Defines path constants used by controllers/views.
 * - Chooses DB creds from ENV with sensible fallbacks.
 * - Works on Windows (XAMPP) and Linux hosting.
 */

// ----- Paths (absolute) -----
if (!defined('BASE_PATH'))   define('BASE_PATH', dirname(__DIR__, 2));                 // /.../ogawaworld
if (!defined('APP_PATH'))    define('APP_PATH',  BASE_PATH . DIRECTORY_SEPARATOR . 'app'    . DIRECTORY_SEPARATOR);
if (!defined('STORAGE_PATH'))define('STORAGE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR);
if (!defined('VIEW_PATH'))   define('VIEW_PATH', STORAGE_PATH . 'views' . DIRECTORY_SEPARATOR);
if (!defined('PUBLIC_PATH')) define('PUBLIC_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'public'  . DIRECTORY_SEPARATOR);

// ----- Host / env -----
$host    = $_SERVER['HTTP_HOST'] ?? 'localhost';
$isLocal = in_array($host, ['localhost', '127.0.0.1'], true);

$appEnv  = getenv('APP_ENV') ?: 'production';
$isProd  = ($appEnv === 'production');

// ----- DB creds -----
// In production use DB_*
// In non-prod, prefer TEST_DB_*; if absent, fall back to DB_* so local still works.
$pick = function ($prodKey, $testKey) use ($isProd) {
  if ($isProd) {
    return getenv($prodKey) ?: '';
  }
  $test = getenv($testKey);
  return ($test !== false && $test !== '') ? $test : (getenv($prodKey) ?: '');
};

$dbHost = $pick('DB_HOST',  'TEST_DB_HOST') ?: 'localhost';
$dbName = $pick('DB_NAME',  'TEST_DB_NAME');
$dbUser = $pick('DB_USER',  'TEST_DB_USER');
$dbPass = $pick('DB_PASS',  'TEST_DB_PASS');

return [
  'base_url' => getenv('BASE_URL') ?: ($isLocal ? 'http://localhost/ogawaworld' : 'https://ogawaworld.net'),
  'timezone' => getenv('TIMEZONE') ?: 'Asia/Kuala_Lumpur',
  'db' => [
    'host'    => $dbHost,
    'name'    => $dbName,
    'user'    => $dbUser,
    'pass'    => $dbPass,
    'charset' => 'utf8mb4',
  ],
  'mail' => [
    'from' => getenv('MAIL_FROM') ?: 'no-reply@ogawaworld.net',
  ],
];
