<link rel="stylesheet" href="<?= asset('css/manuals.css') ?>">

<section class="manual-hero">
  <div class="manual-hero__inner">
    <h1 class="manual-title">
      <?= e($productName) ?>
      <span>User Manual</span>
    </h1>

    <p class="manual-sub">
      Official user manual and documentation for <?= e($productName) ?>.
    </p>

    <div class="manual-actions">
      <a class="btn btn-solid"
        href="<?= e($pdfUrl) ?>"
        target="_blank">
        Download PDF
      </a>

      <?php if($manualRow['source'] === 'woo'): ?>
        <a class="btn btn-outline-dark"
          href="<?= url($productSlug) ?>">
          View Product
        </a>
      <?php endif; ?>
    </div>
  </div>

  <div class="manual-viewer">
    <div class="container">
      <iframe
        src="https://mozilla.github.io/pdf.js/web/viewer.html?file=<?= urlencode($pdfUrl) ?>"
        style="width:100%; height:90vh; border:none;">
      </iframe>
    </div>
</div>
</section>
