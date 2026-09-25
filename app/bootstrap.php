<?php
require_once __DIR__ . '/config/env.php';
$cfg = require_once __DIR__ . '/config/constants.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php'; // loads the DB class but doesn't connect yet
require_once __DIR__ . '/helpers.php';

session_start();

// Production should not echo notices
if (($env = getenv('APP_ENV') ?: 'production') === 'production') {
  error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
  ini_set('display_errors', '0');
} else {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
}

date_default_timezone_set($cfg['timezone']);
