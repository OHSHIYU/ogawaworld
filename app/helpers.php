<?php
// Generate clean URLs
function url(string $path = ''): string {
  $p = trim($path, '/');
  return $p === '' ? '/' : "/$p";
}

// Product detail pretty URL
function pdp_url(string $slug): string {
  $slug = strtolower(trim($slug));
  if ($slug === '' || !preg_match('~^[a-z0-9\-]+$~', $slug)) return '#';
  return '/' . rawurlencode($slug) . '/';
}

function detect_base_path(): string {
  $uri = $_SERVER['REQUEST_URI'] ?? '/';
  $scriptName = $_SERVER['SCRIPT_NAME'] ?? ''; // e.g. /ogawaworld/public/index.php
  $scriptDir  = rtrim(str_replace('\\', '/', dirname($scriptName)), '/'); // e.g. /ogawaworld/public

  // If you're truly serving from the web root (DocumentRoot = .../public),
  // SCRIPT_NAME will usually be /index.php and dirname => /
  // So base becomes '' (meaning "/")
  if ($scriptDir === '' || $scriptDir === '.') return '/';
  if ($scriptDir === '/') return '/';

  return $scriptDir . '/';
}

// Assets
function asset(string $path): string {
  $path = ltrim($path, '/');

  // Detect base path automatically (supports both:
  //  - http://localhost:8080/ogawaworld/public/...
  //  - https://yourdomain.com/... or https://yourdomain.com/ogawaworld/public/...
  $base = detect_base_path();

  return rtrim($base, '/') . '/' . $path;
}

function uploads(string $path): string {
  return '/uploads/' . ltrim($path, '/');
}

// Escaping and redirects
function e($v){ return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function redirect($to){ header('Location: '.url($to)); exit; }

// Flash session
function flash_set($k,$v){ $_SESSION['__flash'][$k]=$v; }
function flash_get($k){ $v=$_SESSION['__flash'][$k]??null; unset($_SESSION['__flash'][$k]); return $v; }

// CSRF protection
function csrf_token(){
  if(session_status() === PHP_SESSION_NONE) session_start();
  if(empty($_SESSION['__csrf'])) $_SESSION['__csrf']=bin2hex(random_bytes(16));
  return $_SESSION['__csrf'];
}
function csrf_field(){
  echo '<input type="hidden" name="__csrf" value="'.csrf_token().'">';
}
function csrf_check(){
  if(session_status() === PHP_SESSION_NONE) session_start();
  if(($_POST['__csrf']??'') !== ($_SESSION['__csrf']??'')) {
    http_response_code(403);
    exit('Invalid CSRF token.');
  }
}

// Cached fetch from WordPress REST
function fetch_wp_json_cached($url, $timeout = 6, $ttl = 300) {
  $cacheDir = dirname(__DIR__) . '/storage/cache';
  if (!is_dir($cacheDir)) @mkdir($cacheDir, 0775, true);

  $key      = 'wp_' . sha1($url);
  $dataFile = "$cacheDir/{$key}.json";
  $metaFile = "$cacheDir/{$key}.meta";

  $headers = [];
  if (is_file($metaFile)) {
    $meta = @json_decode(@file_get_contents($metaFile), true) ?: [];
    if (!empty($meta['etag']))           $headers[] = 'If-None-Match: '.$meta['etag'];
    if (!empty($meta['last_modified']))  $headers[] = 'If-Modified-Since: '.$meta['last_modified'];
  }

  if (is_file($dataFile) && (time() - filemtime($dataFile) < $ttl)) {
    $json = @json_decode(@file_get_contents($dataFile), true);
    if (is_array($json)) return $json;
  }

  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_TIMEOUT => $timeout,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_USERAGENT => 'OgawaSite/1.0',
    CURLOPT_HEADER => true,
    CURLOPT_HTTPHEADER => $headers,
  ]);
  $raw   = curl_exec($ch);
  $err   = curl_error($ch);
  $code  = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $hsize = (int) curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  curl_close($ch);

  if ($raw === false || $err) {
    if (is_file($dataFile)) {
      $json = @json_decode(@file_get_contents($dataFile), true);
      if (is_array($json)) return $json;
    }
    return [];
  }

  $headersBlob = substr($raw, 0, $hsize);
  $body        = substr($raw, $hsize);

  if ($code === 304 && is_file($dataFile)) {
    $json = @json_decode(@file_get_contents($dataFile), true);
    return is_array($json) ? $json : [];
  }

  if ($code >= 200 && $code < 300 && $body) {
    $json = json_decode($body, true);
    if (is_array($json)) {
      @file_put_contents($dataFile, json_encode($json, JSON_UNESCAPED_SLASHES));
      $etag = ''; $last = '';
      foreach (explode("\n", $headersBlob) as $line) {
        if (stripos($line, 'ETag:') === 0)           $etag = trim(substr($line, 5));
        if (stripos($line, 'Last-Modified:') === 0)  $last = trim(substr($line, 13));
      }
      @file_put_contents($metaFile, json_encode(['etag'=>$etag,'last_modified'=>$last]));
      return $json;
    }
  }

  if (is_file($dataFile)) {
    $json = @json_decode(@file_get_contents($dataFile), true);
    if (is_array($json)) return $json;
  }

  return [];
}

/**
 * Handle image upload for CMS sections.
 * Returns the relative path to the uploaded file, or the original value if no file was uploaded.
 */
function ogw_handle_image_upload(string $field = 'image', string $existing = ''): string {
    if (empty($_FILES[$field]) || !isset($_FILES[$field]['error'])) return $existing;
    if ($_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) return $existing;

    if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Image upload failed (error code ' . (int)$_FILES[$field]['error'] . ').');
    }

    $f = $_FILES[$field];
    $maxBytes = 5 * 1024 * 1024; // 5MB
    if ($f['size'] > $maxBytes) throw new Exception('Image exceeds 5MB limit.');

    $ext = strtolower(pathinfo($f['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($ext, $allowed, true)) throw new Exception('Invalid file type. Allowed: JPG, PNG, GIF, WEBP.');

    $baseDir = dirname(__DIR__) . '/public/uploads/cms';
    if (!is_dir($baseDir)) mkdir($baseDir, 0775, true);

    $safeName = 'cms_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $absPath = $baseDir . '/' . $safeName;

    if (!move_uploaded_file($f['tmp_name'], $absPath)) {
        throw new Exception('Failed to save uploaded image.');
    }

    return 'cms/' . $safeName;
}
