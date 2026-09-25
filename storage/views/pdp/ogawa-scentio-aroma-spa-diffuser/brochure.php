<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-scentio-aroma-spa-diffuser'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-scentio-aroma-spa-diffuser/brochure.css') ?>">
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
  <!-- 1 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('SCENTIO-E BROCHURE_Artboard 1.webp') ?>"
      alt="OGAWA Scentio Aroma Spa Diffuser"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="u-pos max-width-40" style="--pos-top: 22%; --pos-left: 8%;">
        <div class="mb-5">
          <h1 class="main-title h1">
            <span>Scentio</span><br>Aroma Spa Diffuser
          </h1>
          <p><i>Luxury in Every Breath</i></p>
        </div>
        
        <div>
          <h4>Welcome to Scentio</h4>
          <p>For those who seek balance in a busy world, Scentio redefines aromatherapy.</p>
          <p>
            Designed for modern lifestyles, our premium diffuser blends cutting-edge 
            technology with elegant design to create a sanctuary in your home,
            office, or wellness space.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 2 - OK -->
  <section class="full-image-frame s2">
    <img
      src="<?= $brochure('SCENTIO-E BROCHURE_Artboard 2.webp') ?>"
      alt="OGAWA Scentio Aroma Spa Diffuser"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <h2 class="h2 section-heading u-pos pos-scentio-title">
        Why Scentio
      </h2>

      <div class="u-pos max-width-40 pos-unmatch">
        <div class="d-flex mb-1" style="align-items: center;">
          <img class="height-120-img me-2" src="<?= $brochure('Asset 1.webp') ?>" alt="Unmatched Longevity">
          <h3 class="h6 mb-0">Unmatched Longevity</h3>
        </div>
        <p>100ml Pure Essential Oil Capacity | 476 Hours of Continuous Use</p>
        <p>
          With a minimal consumption rate of 0.21ml/hour, Scentio ensures your 
          favourite scents last for weeks, not days.
        </p>
      </div>

      <div class="u-pos max-width-40 pos-powerful">
        <div class="d-flex mb-1" style="align-items: center;">
          <img class="height-120-img me-2" src="<?= $brochure('Asset 2.webp') ?>" alt="Powerful Coverage">
          <h3 class="h6 mb-0">Powerful Coverage</h3>
        </div>
        <p>500-1000 Sqft Reach</p>
        <p>
          Effortlessly fill large spaces with delicate, consistent fragrance - perfect for living rooms,
          open-plan offices, or yoga studios.
        </p>
      </div>

      <div class="u-pos max-width-40 pos-smart">
        <div class="d-flex mb-1" style="align-items: center;">
          <img class="height-120-img me-2" src="<?= $brochure('Asset 3.webp') ?>" alt="Smart Timer Function">
          <h3 class="h6 mb-0">Smart Timer Function</h3>
        </div>
        <p>
          Set it and forgot it! Automatically switch on/off (2-8 hours) to conserve oil and maintain
          your ideal atmosphere.
        </p>
      </div>

      <div class="u-pos max-width-40 pos-customize">
        <div class="d-flex mb-1" style="align-items: center;">
          <img class="height-120-img me-2" src="<?= $brochure('Asset 4.webp') ?>" alt="4 Customizable Modes">
          <h3 class="h6 mb-0">4 Customizable Modes</h3>
        </div>
        <p>Sleep | Intermittent | Continuous | Boost</p>
        <p>
          From Low to H+ mode, tailor your experience: energize your morning, unwind at night, or
          create a calming ambiance for meditation.
        </p>
      </div>
    </div>
  </section>

  <!-- 3 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('SCENTIO-E BROCHURE_Artboard 3.webp') ?>"
      alt="OGAWA Scentio Aroma Spa Diffuser"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="u-pos max-width-60" style="--pos-top: 14%; --pos-left: 8%;">
        <h2 class="h2 section-heading mb-2">Features at a Glance</h2>

        <ul>
          <li class="mb-1">
            <h4 class="h4">Premium Aluminium Design</h4>
            <p>Sleek,durable, and timeless - a statement piece that complements modern interiors.</p>
          </li>
          <li class="mb-1">
            <h4 class="h4">Lighter-Than-Air Mocrodroplets</h4>
            <p>Advanced ultrasonic technology releases ultrafine mist for faster, even dispersion without residue.</p>
          </li>
          <li class="mb-1">
            <h4 class="h4">100% Pure Essential Oil Compability</h4>
            <p>Works with any pure essential oils (no diluting required.)</p>
          </li>
          <li class="mb-1">
            <h4 class="h4">Whisper-Quiet Operation</h4>
            <p>Silent enough for sleep or focused work.</p>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 4 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('SCENTIO-E BROCHURE_Artboard 4.webp') ?>"
      alt="OGAWA Scentio Aroma Spa Diffuser"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
