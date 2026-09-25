<?php
// app/config/database.php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

final class DB {
  private static ?mysqli $conn = null;

  public static function conn(): mysqli {
    if (self::$conn instanceof mysqli) {
      return self::$conn;
    }

    $cfg = require __DIR__ . '/constants.php';

    // Persistent connection: 'p:' prefix tells mysqli to reuse across requests
    $host = $cfg['db']['host'];
    if (strpos($host, 'p:') !== 0) {
      $host = 'p:' . $host;
    }

    try {
      $t0 = microtime(true);
      $conn = new mysqli(
        $host,
        $cfg['db']['user'],
        $cfg['db']['pass'],
        $cfg['db']['name']
      );

      $conn->set_charset($cfg['db']['charset']);
      // Keep timezone explicit
      $conn->query("SET time_zone = '+08:00'");

      self::$conn = $conn;

      // Minimal one-line log when we actually create a connection
      $logDir = dirname(__DIR__, 2) . '/storage/logs';
      if (!is_dir($logDir)) { @mkdir($logDir, 0755, true); }
      @file_put_contents(
        $logDir . '/db_conn.log',
        date('c') . ' new-conn pid=' . getmypid() . ' t=' . round((microtime(true) - $t0) * 1000) . "ms\n",
        FILE_APPEND
      );

      return self::$conn;
    } catch (mysqli_sql_exception $e) {
      http_response_code(500);
      error_log('Database connection error: ' . $e->getMessage());
      exit('Database connection error.');
    }
  }
}
