<?php
// views/pdp/shared/font-loader.php

/**
 * $base: absolute web URL to the product asset folder, e.g.
 *   https://.../img/pdp/ogawa-master-drive-ai-2-0  (you already set $base) */
function ogw_product_font_url(string $base, string $file): string {
  return rtrim($base, '/') . '/Fonts/' . rawurlencode($file);
}

function ogw_mime_from_ext(string $file): string {
  $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  return match ($ext) {
    'woff2' => 'font/woff2',
    'woff'  => 'font/woff',
    'otf'   => 'font/otf',
    'ttf'   => 'font/ttf',
    default => 'font/woff2'
  };
}

/**
 * Print <link rel="preload"> for manifest["preload"] files.
 * Each preload item can be either a filename (string) or
 * ['file'=>'X.woff2','type'=>'font/woff2'].
 */
function ogw_preload_product_fonts(string $base, array $manifest): void {
  if (empty($manifest['preload'])) return;
  foreach ($manifest['preload'] as $item) {
    if (is_string($item)) {
      $href = ogw_product_font_url($base, $item);
      $type = ogw_mime_from_ext($item);
    } else {
      $href = ogw_product_font_url($base, $item['file']);
      $type = $item['type'] ?? ogw_mime_from_ext($item['file']);
    }
    echo '<link rel="preload" as="font" href="' . $href . '" type="' . $type . '" crossorigin>' . PHP_EOL;
  }
}

/**
 * Print @font-face for manifest["faces"].
 * Each face:
 * [
 *   'family' => 'Orbitron',
 *   'weight' => 700,              // default 400
 *   'style'  => 'normal',         // default normal
 *   'src'    => ['Orbitron-Bold.woff2','Orbitron-Bold.ttf'] // in Fonts/
 * ]
 */
function ogw_print_product_font_faces(string $base, array $manifest): void {
  if (empty($manifest['faces'])) return;
  echo "<style>\n";
  foreach ($manifest['faces'] as $face) {
    $family = $face['family'];
    $weight = $face['weight'] ?? 400;
    $style  = $face['style']  ?? 'normal';

    $srcParts = [];
    foreach ($face['src'] as $file) {
      $url = ogw_product_font_url($base, $file);
      $fmt = match (strtolower(pathinfo($file, PATHINFO_EXTENSION))) {
        'woff2' => 'woff2', 'woff' => 'woff',
        'otf' => 'opentype', 'ttf' => 'truetype',
        default => 'woff2'
      };
      $srcParts[] = "url('{$url}') format('{$fmt}')";
    }
    $src = implode(",\n    ", $srcParts);

    echo "@font-face{font-family:'{$family}';\n";
    echo "  src:\n    {$src};\n";
    echo "  font-weight: {$weight}; font-style: {$style}; font-display: swap;\n";
    echo "}\n";
  }
  echo "</style>\n";
}
