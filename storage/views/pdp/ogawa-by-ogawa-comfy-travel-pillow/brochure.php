<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-by-ogawa-comfy-travel-pillow'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-by-ogawa-comfy-travel-pillow/brochure.css') ?>">
<link rel="stylesheet" href="<?= asset('css/pdp/responsive.css') ?>">

<?php
  // Load shared loader + this product's manifest
  require VIEW_PATH . 'pdp/shared/font-loader.php';
  $fontManifest = @include __DIR__ . '/fonts.php'; // returns array

  // Print preloads + @font-face
  if (is_array($fontManifest)) {
    ogw_preload_product_fonts($base, $fontManifest);
    ogw_print_product_font_faces($base, $fontManifest);
  }
?>

<div class="main">
  <!-- Index Friendly Intro (top of page, outside brochure image) -->
  <section class="p-4 bg-pink text-center">
    <h1 class="h1 fw-bold mb-2">ogawa by OGAWA Comfy Travel Pillow</h1>
  </section>

  <!-- S1 – ok -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('COMFY TRAVEL PILLOW BROCHURE FA-01.webp') ?>"
      alt="Comfy Travel Pillow hero – Massage Meets Memory"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay font-black text-center">
      <div class="px-3 px-md-5">
        <h2 class="section-heading h2">Massage Meets Memory</h2>
        <h3 class="section-subtitle h3">The Extraordinary Comfy Travel Pillow</h3>

        <div class="pill-tag">
          <p>3 Rhythmic Massage &middot; 3D Support &middot; Zero Compromise Comfort</p>
        </div>
      </div>
    </div>
  </section>

  <!-- S2 – Intelligent Massage - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('COMFY TRAVEL PILLOW BROCHURE FA-02.webp') ?>"
      alt="Comfy Travel Pillow intelligent massage modes"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay font-black">
      <div>
        <h2 class="section-heading h2">Intelligent Massage</h2>
        <h3 class="section-subtitle h3">3 Rhythmic Massage Mode</h3>
      </div>

      <div class="s2-copy-middle">
        <div class="pill-tag mb-3">
          <p>3 massage modes for instant relief.</p>
        </div>

        <p>
          Melt tension mid-flight or during road trips with precision deep tissue massage.
          Choose a massage rhythm that matches your mood and neck condition.
        </p>
      </div>

      <div class="s2-copy-bottom">
        <div class="s2-modes">
          <article class="s2-mode">
            <div class="s2-mode-img">
              <img src="<?= $brochure('Asset 1.webp') ?>"
                  alt="Vitality massage mode">
              <div class="s2-mode-title-bar">
                <h3 class="s2-mode-title h4">Vitality</h3>
              </div>
            </div>
            <p class="s2-mode-text">
              Vigorous Kneading<br>for stiffness
            </p>
          </article>

          <article class="s2-mode">
            <div class="s2-mode-img">
              <img src="<?= $brochure('Asset 2.webp') ?>"
                  alt="Gentle massage mode">
              <div class="s2-mode-title-bar">
                <h3 class="s2-mode-title h4">Gentle</h3>
              </div>
            </div>
            <p class="s2-mode-text">
              Gentle Pulse<br>for relaxation
            </p>
          </article>

          <article class="s2-mode">
            <div class="s2-mode-img">
              <img src="<?= $brochure('Asset 3.webp') ?>"
                  alt="Soothing massage mode">
              <div class="s2-mode-title-bar">
                <h3 class="s2-mode-title h4">Soothing</h3>
              </div>
            </div>
            <p class="s2-mode-text">
              Slow Waves<br>for deep rest
            </p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- S3 – Soft Hug, Strong Support - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('COMFY TRAVEL PILLOW BROCHURE FA-03.webp') ?>"
      alt="Comfy Travel Pillow double memory foam construction"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay font-black">
      <div class="px-3 px-md-5 text-center">
        <h2 class="section-heading h2">Soft Hug, Strong Support</h2>
        <h3 class="section-subtitle h3">Double Memory Foam</h3>
      </div>

      <div class="s3-copy-middle">
        <div class="u-pos" style="--pos-top: 32%; --pos-left: 16%;">
          <h3 class="h5">High-density inner core</h3>
        </div>
        <div class="u-pos" style="--pos-bottom: 32%; --pos-right: 15%;">
          <h3 class="h5">Softer outer foam</h3>
        </div>
      </div>

      <div class="s3-copy-bottom">
        <div class="pill-tag mb-3">
          <p>Double Memory Foam, Dual Layer Genius</p>
        </div>

        <p>
          Softer outer foam hugs your neck, while the high-density inner core stabilises your
          spine. Wake up refreshed instead of stiff, even after hours of travel.
        </p>
      </div>
    </div>
  </section>

  <!-- S4 – 4-Zone Smart Support - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('COMFY TRAVEL PILLOW BROCHURE FA-04.webp') ?>"
      alt="Comfy Travel Pillow 4-zone smart neck support"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay font-black text-center">
      <div class="s4-copy px-3 px-md-5">
        <div class="mb-5">
          <h2 class="section-heading h2">4-Zone Smart Support</h2>
          <h3 class="section-subtitle h3">Where Medical Precision Meets Comfort</h3>
        </div>

        <div class="mb-5">
          <img src="<?= $brochure('Asset 4.webp') ?>" alt="">
        </div>

        <div class="pill-tag mb-3">
          <p>4 zones hug your skull, neck, chin, and shoulders.</p>
        </div>

        <p>
          Prevents “travel neck” by supporting your spine’s natural curve. Smart
          side guards, chin fit and skull support work together to scientifically
          disperse pressure and make every nap more relaxing.
        </p>
      </div>
    </div>
  </section>

  <!-- S5 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('COMFY TRAVEL PILLOW BROCHURE FA-05.webp') ?>"
      alt="Comfy Travel Pillow technical illustration and specifications"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
