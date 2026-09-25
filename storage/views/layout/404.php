<?php
// views/layout/404.php
// Router already sets http_response_code(404) — no need to set it again here.
$title = $title ?? 'Page not found | OGAWA';

// If your header uses $title, keep it.
?>

<?php require VIEW_PATH . 'layout/header.php'; ?>

<main class="wrap-404" style="padding: 64px 18px;">
  <div class="card-404" style="max-width: 900px; margin: 0 auto; text-align: center;">
    <h1 style="margin:0 0 8px; font-size: 28px;">404 — Page not found</h1>
    <p style="margin:0 0 18px; color:#555; line-height: 1.5;">
      The page you’re looking for doesn’t exist, or the link may have changed.
    </p>

    <a class="btn btn-solid" href="/">Go to Home</a>
  </div>
</main>

<?php require VIEW_PATH . 'layout/footer.php'; ?>
