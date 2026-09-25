<?php
/**
 * Font Lab — scans all product font manifests and renders a test grid.
 * Usage:
 *   /dev/font-lab            (all products)
 *   /dev/font-lab?product=ogawa-master-drive-ai-2-0   (filter by slug)
 *   /dev/font-lab?q=Orbitron (filter by family/weight)
 */

require VIEW_PATH . 'layout/header.php';
require VIEW_PATH . 'pdp/shared/font-loader.php';

// optional "noindex" for safety (in case header doesn't set it)
echo '<meta name="robots" content="noindex,nofollow">';

$filterSlug = isset($_GET['product']) ? trim($_GET['product']) : '';
$q          = isset($_GET['q']) ? trim($_GET['q']) : '';

// Where product manifests live
$manifests = glob(VIEW_PATH . 'pdp/*/fonts.php');

$allProducts = [];  // [{slug, base, manifestPath, faces:[...]}]

// Load all manifests
foreach ($manifests as $manifestPath) {
  $slug = basename(dirname($manifestPath)); // views/pdp/<slug>/fonts.php
  if ($filterSlug && $slug !== $filterSlug) continue;

  $base = rtrim(asset('img/pdp/' . $slug), '/');
  $manifest = @include $manifestPath;
  if (!is_array($manifest) || empty($manifest['faces'])) continue;

  // Optional query filter by family/weight text
  if ($q) {
    $keep = false;
    foreach ($manifest['faces'] as $f) {
      $label = ($f['family'] ?? '') . ' ' . (string)($f['weight'] ?? 400);
      if (stripos($label, $q) !== false) { $keep = true; break; }
    }
    if (!$keep) continue;
  }

  $allProducts[] = [
    'slug' => $slug,
    'base' => $base,
    'path' => $manifestPath,
    'faces' => $manifest['faces'],
  ];
}

// Register all @font-face rules (no preloads on this page)
foreach ($allProducts as $p) {
  ogw_print_product_font_faces($p['base'], ['faces' => $p['faces']]);
}
?>

<style>
  /* Color system (light theme) */
  :root{
    --bg:#f6f8fb;
    --panel:#eef2f7;
    --card:#ffffff;
    --border:#e3e8ef;
    --text:#0f172a;        /* slate-900 */
    --muted:#475569;       /* slate-600 */
    --brand:#2563eb;       /* blue-600 */
    --brand-ink:#0b3ea9;
    --ok:#16a34a;          /* green-600 */
    --bad:#dc2626;         /* red-600 */
    --pill:#0f172a0d;      /* subtle */
    --shadow:0 6px 20px rgba(2,6,23,.06);
  }

  /* Optional: auto-dark if user prefers */
  @media (prefers-color-scheme: dark){
    :root{
      --bg:#0b1220;
      --panel:#0f1626;
      --card:#121a2a;
      --border:#24324d;
      --text:#e7edf7;
      --muted:#8ea0c1;
      --brand:#3b82f6;
      --brand-ink:#cde3ff;
      --ok:#3ecf8e;
      --bad:#ff6b6b;
      --pill:#ffffff14;
      --shadow:0 10px 26px rgba(0,0,0,.25);
    }
  }

  body{
    background:var(--bg);
    color:var(--text);
    font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;
  }

  .wrap{max-width:1200px;margin:36px auto;padding:0 16px;}
  h1{margin:0 0 14px;font-size:32px;letter-spacing:.2px;}

  /* Toolbar */
  .toolbar{
    background:var(--panel);
    border:1px solid var(--border);
    border-radius:14px;
    padding:12px;
    display:flex;gap:8px;align-items:center;flex-wrap:wrap;
    box-shadow:var(--shadow);
  }
  .toolbar input{
    padding:10px 12px;border-radius:10px;border:1px solid var(--border);
    background:#fff;color:var(--text);min-width:260px;outline:none;
  }
  .toolbar button{
    padding:10px 14px;border-radius:10px;border:0;background:var(--brand);
    color:#fff;cursor:pointer;font-weight:600;
  }
  .toolbar a{color:var(--brand);text-decoration:none;margin-left:6px;}

  /* Product section */
  .product{margin:24px 0 28px;}
  .product h2{margin:0 6px 6px;font-size:18px;font-weight:700;}
  .links{display:flex;gap:14px;margin:0 6px 8px;font-size:13px;flex-wrap:wrap;}
  .links a{color:var(--brand);}
  .meta{color:var(--muted);}

  /* Grid & cards */
  .grid{display:grid;gap:14px;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));}
  .card{
    background:var(--card);border:1px solid var(--border);border-radius:14px;
    padding:16px;box-shadow:var(--shadow);
  }
  .head{display:flex;align-items:baseline;justify-content:space-between;margin-bottom:8px;}
  .head strong{font-size:15px;letter-spacing:.15px;}
  .pill{
    font-size:12px;padding:2px 8px;border-radius:999px;background:var(--pill);
    color:var(--muted);border:1px solid var(--border);
  }

  /* Sample line */
  .sample{
    font-size:28px;line-height:1.3;margin:10px 0 6px;
    letter-spacing:.2px;word-break:break-word;
  }
  .sub{color:var(--muted);font-size:12px;}
  .status{margin-top:8px;font-size:12px;font-weight:600;}
  .ok{color:var(--ok);} .bad{color:var(--bad);}

  /* Small improvements on links/hover */
  a,a:visited{color:var(--brand);text-decoration:none}
  a:hover{color:var(--brand-ink);text-decoration:underline}
</style>

<div class="wrap">
  <h1>Ogawa Font Lab</h1>
  <div class="toolbar">
    <form method="get" style="display:flex;gap:8px;flex-wrap:wrap;align-items:center;">
      <input name="product" placeholder="Filter by product slug…" value="<?= htmlspecialchars($filterSlug) ?>">
      <input name="q" placeholder="Filter by font family/weight…" value="<?= htmlspecialchars($q) ?>">
      <button type="submit">Filter</button>
      <a href="?">Reset</a>
    </form>
  </div>

  <?php if (empty($allProducts)): ?>
    <p>No products found (or no matches for your filters).</p>
  <?php endif; ?>

  <?php foreach ($allProducts as $p): ?>
    <?php
      $faces = $p['faces'];
      $slug  = $p['slug'];
      // guessed brochure URL (adjust if yours differs)
      $brochureUrl = url($slug);
      $singleTest  = $brochureUrl . '?fonttest=1';
    ?>
    <section class="product" data-product="<?= htmlspecialchars($slug) ?>">
      <h2><?= htmlspecialchars($slug) ?></h2>
      <div class="links">
        <a href="<?= htmlspecialchars($brochureUrl) ?>" target="_blank">Open brochure</a>
        <a href="<?= htmlspecialchars($singleTest) ?>" target="_blank">Single font test for this product</a>
        <span class="meta">Manifest: <code><?= htmlspecialchars(str_replace(VIEW_PATH,'VIEW_PATH/',$p['path'])) ?></code></span>
      </div>
      <div class="grid">
        <?php foreach ($faces as $f):
          $family = $f['family'];
          $weight = $f['weight'] ?? 400;
          $style  = $f['style'] ?? 'normal';
          $exts   = implode(', ', array_map(fn($s)=>pathinfo($s, PATHINFO_EXTENSION), $f['src']));
        ?>
          <div class="card"
              data-family="<?= htmlspecialchars($family) ?>"
              data-weight="<?= (int)$weight ?>"
              data-style="<?= htmlspecialchars($style) ?>">
            <div class="head">
              <strong><?= htmlspecialchars($family) ?> <?= (int)$weight ?> <?= $style === 'italic' ? 'Italic' : '' ?></strong>
              <span class="pill"><?= htmlspecialchars($exts) ?></span>
            </div>

            <div class="sample" style="
              font-family:'<?= htmlspecialchars($family) ?>',system-ui,sans-serif;
              font-weight:<?= (int)$weight ?>;
              font-style:<?= htmlspecialchars($style) ?>;">
              The quick brown fox 123 — 快速的棕色狐狸跳过了懒狗。
            </div>

            <div class="sub">
              CSS:
              <code>font-family:'<?= htmlspecialchars($family) ?>'; font-weight: <?= (int)$weight ?>; font-style: <?= htmlspecialchars($style) ?>;</code>
            </div>

            <div class="status">Status: <span class="check">checking…</span></div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endforeach; ?>
</div>

<script>
  const cards = [...document.querySelectorAll('.card')];

  async function checkFonts() {
    for (const el of cards) {
      const fam   = el.dataset.family;
      const w     = el.dataset.weight || '400';
      const style = el.dataset.style || 'normal';
      const text  = 'The quick brown fox 123 — 快速的棕色狐狸跳过了懒狗。';

      try {
        const spec = `${style} ${w} 24px "${fam}"`;
        await document.fonts.load(spec, text);
        const ok = document.fonts.check(spec, text);

        el.querySelector('.check').textContent = ok ? 'loaded' : 'not loaded';
        el.querySelector('.check').className = 'check ' + (ok ? 'ok' : 'bad');
      } catch (e) {
        el.querySelector('.check').textContent = 'error';
        el.querySelector('.check').className = 'check bad';
      }
    }
  }
  checkFonts();
</script>

<?php require VIEW_PATH . 'layout/footer.php'; ?>
