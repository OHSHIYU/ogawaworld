<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-vivre'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-vivre/brochure.css') ?>">
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
  <!-- Index Friendly -->
  <section class="index-section">
    <div class="container py-4">
      <h1 class="h1">OGAWA Vivre</h1>
    </div>
  </section>

  <!-- 1 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('Vivre brochure-01.webp') ?>"
      alt="OGAWA Vivre"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 2 - OK -->
  <section class="full-image-frame align-content-center">
    <img
      src="<?= $brochure('Vivre brochure-02.webp') ?>"
      alt="OGAWA Vivre"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay justify-content-center">
      <div class="max-width-50">
        <h2 class="h2 mb-4 font-tertiary">VIVRE : Refined Relaxation</h2>
        <div class="font-tertiary">
            <p class="mb-3">
              Vivre combines the sleep design of a modern sofa with the advanced features of a 
              traditional massage chair.
            </p>
            <p class="mb-3">
              Perfect for contemporary homes, it offers ecceptional comfort and therapeutic 
              benefits while saving space and maintaining style.
            </p>
            <p>
              With intuitive controls and a range of wellness features, Vivre makes complete relaxation effortless,
              blending simplicity with sophistication for a rejuvenating home experience.
            </p>
        </div>
        
      </div>
      
    </div>
  </section>

  <!-- 3 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('Vivre brochure-03.webp') ?>"
      alt="OGAWA Vivre — 360° wellness solutions features"
      class="bg-img"
      loading="eager"
      decoding="async"
    />

    <div class="overlay">
      <h2 class="h1 font-secondary fw-bold text-center">360°<br>Wellness Solutions</h2>

      <!-- 3D Arm -->
      <div class="u-pos max-width-40 justify-items-center s3-3d-arm text-center">
        <img class="height-60-img mb-2" src="<?= $brochure('Asset 4.webp') ?>" alt="">
        <div class="font-secondary">
          <h3 class="h5 mb-0 callout-title">3D ARM AIRBAG</h3>
          <p class="text-justify">
            The U-shaped design of the arm air pressure upgrades comfort with full wrap-around support.
          </p>
        </div>
      </div>

      <!-- Shoulder -->
      <div class="u-pos max-width-40 justify-items-center s3-shoulder text-center">
        <img class="height-60-img mb-2" src="<?= $brochure('Asset 2.webp') ?>" alt="">
        <div class="font-secondary">
          <h3 class="h5 mb-0 callout-title">SHOULDER BUTTERFLY AIRBAG</h3>
          <p class="text-justify">
            Gently presses shoulders and arms — feel the care of happiness.
          </p>
        </div>
      </div>

      <!-- Foot -->
      <div class="u-pos max-width-40 justify-items-center s3-foot text-center">
        <img class="height-60-img mb-2" src="<?= $brochure('Asset 1.webp') ?>" alt="">
        <div class="font-secondary">
          <h3 class="h5 mb-0 callout-title">FOOT &amp; CALF MASSAGE</h3>
          <p class="text-justify">
            Instant deep relief with wrap-around kneading massage and roller reflexology.
          </p>
        </div>
      </div>

      <!-- S+L -->
      <div class="u-pos max-width-40 justify-items-center s3-sl-track text-center">
        <img class="height-60-img mb-2" src="<?= $brochure('Asset 3.webp') ?>" alt="">
        <div class="font-secondary">
          <h3 class="h5 mb-0 callout-title">S+L TRACK MASSAGE CHAIR</h3>
          <p class="text-justify">
            Fits the curve of your spine from neck to hip for a wider massage area.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 4 – OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('Vivre brochure-04.webp') ?>"
      alt="Seamless Smart Home Integration"
      class="bg-img"
      loading="eager"
      decoding="async"
    />

    <div class="overlay text-center" style="justify-self: end;">
      <h2 class="h2 font-secondary fw-bold mb-3">SMART HOME INTEGRATION</h2>

      <ul class="smart-grid" role="list">
        <li class="smart-item">
          <img class="height-300-img mb-2" src="<?= $brochure('Asset 5.webp') ?>" alt="">
          <p class="font-tertiary">Enjoy immersive stereo surround sound through Bluetooth</p>
        </li>
        <li class="smart-item">
          <img class="height-300-img mb-32" src="<?= $brochure('Asset 6.webp') ?>" alt="">
          <p class="font-tertiary">Control everything with intuitive buttons and knobs</p>
        </li>
        <li class="smart-item">
          <img class="height-300-img mb-2" src="<?= $brochure('Asset 7.webp') ?>" alt="">
          <p class="font-tertiary">Keep your devices charged with convenient USB ports</p>
        </li>
      </ul>
    </div>
  </section>

  <!-- 5 – OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('Vivre brochure-05.webp') ?>"
      alt="OGAWA Vivre — advanced massage methods"
      class="bg-img"
      loading="eager"
      decoding="async"
    />

    <div class="overlay align-items-center" style="justify-items: center;">
      <header class="mb-4 font-primary fw-semibold text-center">
        <h2 class="h2 mb-3">ADVANCED MASSAGE METHODS</h2>
        <p>
          New level of relaxation with Vivre's variety of soothing massage
          techniques that knows just how to hit the right spots.
        </p>
      </header>

      <ul class="methods-grid" role="list" aria-label="Massage methods">
        <li>
          <img class="height-120-img" src="<?= $brochure('Asset 8.webp') ?>" alt="Kneading">
          <span>Kneading</span>
        </li>
        <li>
          <img class="height-120-img" src="<?= $brochure('Asset 9.webp') ?>" alt="Tapping_Knocking">
          <span>Tapping + Knocking</span>
        </li>
        <li>
          <img class="height-120-img" src="<?= $brochure('Asset 10.webp') ?>" alt="Tapping">
          <span>Tapping</span>
        </li>
        <li>
          <img class="height-120-img" src="<?= $brochure('Asset 11.webp') ?>" alt="Knocking">
          <span>Knocking</span>
        </li>
        <li>
          <img class="height-120-img" src="<?= $brochure('Asset 12.webp') ?>" alt="Rolling">
          <span>Rolling</span>
        </li>
        <li>
          <img class="height-120-img" src="<?= $brochure('Asset 13.webp') ?>" alt="Shiatsu">
          <span>Shiatsu</span>
        </li>
        <li>
          <img class="height-120-img" src="<?= $brochure('Asset 14.webp') ?>" alt="Clapping">
          <span>Clapping</span>
        </li>
        <li>
          <img class="height-120-img" src="<?= $brochure('Asset 15.webp') ?>" alt="Swedish">
          <span>Swedish</span>
        </li>
      </ul>
    </div>
  </section>

  <!-- 6 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('Vivre brochure-06.webp') ?>"
      alt="OGAWA Vivre"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
