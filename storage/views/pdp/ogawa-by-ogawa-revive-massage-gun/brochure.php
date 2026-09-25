<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-by-ogawa-revive-massage-gun'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-by-ogawa-revive-massage-gun/brochure.css') ?>">
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
  <section class="p-4 bg">
    <h1 class="h1 fw-bold text-center text-white">ogawa By Ogawa Revive Massage Gun</h1>
  </section>

  <!-- 1 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('REVIVE GUN-E BROCHURE FA-01.webp') ?>"
      alt="ogawa by Ogawa Revive Massage Gun"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay text-white">
      <h2 class="section-heading h1">BUILT FORR POWER<br>CRAFTED FOR RECOVERY</h2>
      <h3 class="h3">RELIEF IN ONE GUN</h3>
    </div>

    <div class="overlay bottom text-white">
      <h3 class="h3">REVIVE MASSAGE GUN</h3>
      <h3 class="h3">SMART TOUCH, SMART RELEASE</h3>
    </div>
  </section>

  <!-- 2 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('REVIVE GUN-E BROCHURE FA-02.webp') ?>"
      alt="ogawa by Ogawa Revive Massage Gun"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <h2 class="section-heading h1">SORENESS. STIFFNESS.<br>STRESS?</h2>

      <div class="s2-item max-width-60 text-start">
        <h3 class="s2-item-title text-white h3">MEET YOUR<br>PERSONAL<br>RECOVERY COACH</h3>
        <p class="text-white">
          For athletes, busy professionals, the doer, the shaker, the mover - experience
          targeted relief like never before. Our Revive massage gun evolves with your needs.
        </p>
      </div>
    </div>
  </section>

  <!-- 3 -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('REVIVE GUN-E BROCHURE FA-03.webp') ?>"
      alt="ogawa by Ogawa Revive Massage Gun"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <h2 class="section-heading h1">WHY YOUR BODY WILL<br>THANK YOU</h2>

      <div class="u-pos s3-item s3-item-blood">
        <img class="height-120-img" src="<?= $brochure('Asset 1.webp') ?>" alt="">
        <h3 class="h3">Boost Blood Circulation</h3>
        <p>Stimulate oxygen flow to muscle for faster recovery and reduce stiffness.</p>
      </div>

      <div class="u-pos s3-item s3-item-muscle">
        <img class="height-120-img" src="<?= $brochure('Asset 2.webp') ?>" alt="">
        <h3 class="h3">Activate Muscle Performance</h3>
        <p>Prep before workout, recover after - optimize every movement.</p>
      </div>

      <div class="u-pos s3-item s3-item-lymphatic">
        <img class="height-120-img" src="<?= $brochure('Asset 3.webp') ?>" alt="">
        <h3 class="h3">Enhance Lymphatic Drainage</h3>
        <p>Reduce swelling and flush toxins for lighter, energized days.</p>
      </div>
    </div>
  </section>

  <!-- 4 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('REVIVE GUN-E BROCHURE FA-04.webp') ?>"
      alt="ogawa by Ogawa Revive Massage Gun"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <h2 class="section-heading h1 mb-5">WHY THIS MASSAGE GUN<br>STANDS OUT</h2>

      <div class="s4-item d-flex justify-content-between mb-5 text-white" style="align-items: center;">
        <img class="height-300-img" src="<?= $brochure('Asset 5.webp') ?>" alt="">

        <div class="max-width-60 text-start">
          <h3 class="h3">1.54' Smart Touch Screen</h3>
          <h4 class="h4">Your Guided Recovery Companion</h4>
          <ul>
            <li>
              Guided Session with live prompts: <i>Where to massage, which head to use, and rhythm adjustments.</i>
            </li>
            <li>Step-by-step tutorials for optimal muscle activation.</li>
          </ul>
        </div>
      </div>

      <div class="s4-item d-flex justify-content-between text-white" style="align-items: center;">
        <img class="height-300-img" src="<?= $brochure('Asset 6.webp') ?>" alt="">

        <div class="max-width-60 text-start">
          <h3 class="h3">Power Without the Roar</h3>
          <h4 class="h4">3400 RPM Power but &lt;60db</h4>
          <ul>
            <li>The optimal frequency for deep tissue penetration.</li>
            <li>Paired with intelligent power control to ensure stable, consistent pressure.</li>
            <li>Provide peace of mind when messaging.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- 5 - OK -->
  <section class="full-image-frame s5-full-frame">
    <img
      src="<?= $brochure('REVIVE GUN-E BROCHURE FA-05.webp') ?>"
      alt="ogawa by Ogawa Revive Massage Gun"
      class="bg-img"
      loading="eager"
      decoding="async"
    >
    <div class="overlay text-white">
      <h2 class="section-heading h1">TAILORED TO<br>YOUR BODY'S NEEDS</h2>

      <div class="mb-4">
        <h3 class="h3">3 SMART MASSAGE MODES</h3>
        
        <div class="row">
          <div class="col-4">
            <img class="mb-2" src="<?= $brochure('Asset 7.webp') ?>" alt="">
            <h3 class="h3">Quick Start Mode</h3>
            <p>4 Adjustable Speeds: From gentle to intense - relief in reconds.</p>
          </div>

          <div class="col-4">
            <img class="mb-2" src="<?= $brochure('Asset 8.webp') ?>" alt="">
            <h3 class="h3">Rhythm Mode</h3>
            <p>5 Auto-Programs: Flower, Berg, Light, Sea, Zen - soothe muscles with rhythmic patterns.</p>
          </div>

          <div class="col-4">
            <img class="mb-2" src="<?= $brochure('Asset 9.webp') ?>" alt="">
            <h3 class="h3">Sport Mode</h3>
            <p>5 Activity-Specific Programs: Run, Cycle, Skip, Yoga, and Swimming - target muscles stressed by your workout.</p>
          </div>
        </div>
      </div>
      
      <div>
        <h3 class="h2">4 HEAD, TOTAL CONTROL</h3>
        
        <div class="row">
          <div class="col-3">
            <img class="mb-2" src="<?= $brochure('Asset 10.webp') ?>" alt="">
            <h3 class="h3">Dome</h3>
            <p>Suitable for most parts of the body.</p>
          </div>

          <div class="col-3">
            <img class="mb-2" src="<?= $brochure('Asset 11.webp') ?>" alt="">
            <h3 class="h3">Cone</h3>
            <p>Soft Silicone: Suitable for soft tissue and muscle use.</p>
          </div>

          <div class="col-3">
            <img class="mb-2" src="<?= $brochure('Asset 12.webp') ?>" alt="">
            <h3 class="h3">Thomb</h3>
            <p>For deep muscle massage, such as soles of feet and palms.</p>
          </div>

          <div class="col-3">
            <img class="mb-2" src="<?= $brochure('Asset 13.webp') ?>" alt="">
            <h3 class="h3">Double</h3>
            <p>Deep muscle massage for large muscle groups.</p>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>

  <!-- 6 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('REVIVE GUN-E BROCHURE FA-06.webp') ?>"
      alt="ogawa by Ogawa Revive Massage Gun"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <h2 class="section-heading h1">ENGINEERED FOR<br>EFFORTLESS USE</h2>

      <div class="u-pos s6-list max-width-70">
        <div class="d-flex" style="align-items:center;">
          <img class="height-120-img me-3" src="<?= $brochure('Asset 14.webp') ?>" alt="Mounting Extension Handle">

          <div class="text-white text-start" >
            <h3 class="h3">Mounting Extension Handle</h3>
            <p>Reach tricky spots with ergonomic grip.</p>
          </div>
        </div>

        <div class="d-flex" style="align-items:center;">
          <img class="height-120-img me-3" src="<?= $brochure('Asset 15.webp') ?>" alt="10-minute Auto Shut Down">

          <div class="text-white text-start">
            <h3 class="h3">10-minute Auto Shut Down</h3>
            <p>Safety-first design for smarter, controlled sessions.</p>
          </div>
        </div>

        <div class="d-flex" style="align-items:center;">
          <img class="height-120-img me-3" src="<?= $brochure('Asset 16.webp') ?>" alt="Dual Charging">

          <div class="text-white text-start">
            <h3 class="h3">Dual Charging</h3>
            <p>USB-C or wireless - charge anywhere.</p>
          </div>
        </div>

        <div class="d-flex" style="align-items:center;">
          <img class="height-120-img me-3" src="<?= $brochure('Asset 17.webp') ?>" alt="Ultra-Lightweight">

          <div class="text-white text-start">
            <h3 class="h3">Ultra-Lightweight</h3>
            <p>Only 0.5kg (lighter than your phone!).</p>
          </div>
        </div>

        <div class="d-flex" style="align-items:center;">
          <img class="height-120-img me-3" src="<?= $brochure('Asset 18.webp') ?>" alt="Week-Long Battery">

          <div class="text-white text-start">
            <h3 class="h3">Week-Long Battery</h3>
            <p>2200mAH - 10 mins/day = 7days.</p>
          </div>
        </div>

        <div class="d-flex" style="align-items:center;">
          <img class="height-120-img me-3" src="<?= $brochure('Asset 19.webp') ?>" alt="All-in-One Dock">

          <div class="text-white text-start">
            <h3 class="h3">All-in-One Dock</h3>
            <p>Store, organize, and charge wirelessly.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 7 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('REVIVE GUN-E BROCHURE FA-07.webp') ?>"
      alt="ogawa by Ogawa Revive Massage Gun"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
