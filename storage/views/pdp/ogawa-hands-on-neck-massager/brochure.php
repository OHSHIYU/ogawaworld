<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-hands-on-neck-massager'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-hands-on-neck-massager/brochure.css') ?>">
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
  <section class="full-image-frame left-content">
    <img
      src="<?= $brochure('BROCHURE-01.webp') ?>"
      alt="OGAWA Hands-On Neck Massager"
      loading="eager"
      decoding="async"
    >

    <div class="overlay max-width-80">
      <h1 class="h1">OGAWA Hands On Neck Massager</h1>
      <p>Cool Blue comfort, hands-on relief - anytime, anywhere.</p>
    </div>
  </section>

  <!-- 2 - OK -->
  <section class="full-image-frame left-content">
    <img
      src="<?= $brochure('BROCHURE-02.webp') ?>"
      alt="OGAWA Hands-On Neck Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay max-width-80">
      <h2 class="h2">
        Relax your neck with natural, human-like massage
      </h2>
      <p>
        Our Hands On Neck Massager gently simulates real human hands to push,
        knead and pinch your neck muscles. The soft, skin-friendly silicone 
        hugs the cervical curve so you can unwind comfortably at your desk,
        in a lounge, or on the plane.
      </p>
    </div>
  </section>

  <!-- 3 - Pending BG -->
  <section class="container-fluid">
    <div class="row g-0">
      <!-- Left content -->
      <div class="col-12 col-md-6 gradient-background align-content-center p-5">
        <h2 class="h2 mb-3 fw-bold">
          Five massage modes and two heat levels fit your day
        </h2>
        <p class="mb-2">Switch among five massage modes</p>
        
        <div class="row mb-3">
          <div class="col-2">
            <img src="<?= $brochure('Asset 3.webp') ?>" alt="" class="height-60-img mb-2">
            <span>Wake Up</span>
          </div>
          <div class="col-2">
            <img src="<?= $brochure('Asset 4.webp') ?>" alt="" class="height-60-img mb-2">
            <span>Neck Care</span>
          </div>
          <div class="col-2">
            <img src="<?= $brochure('Asset 5.webp') ?>" alt="" class="height-60-img mb-2">
            <span>Relaxing</span>
          </div>
          <div class="col-2">
            <img src="<?= $brochure('Asset 6.webp') ?>" alt="" class="height-60-img mb-2">
            <span>Energetic</span>
          </div>
          <div class="col-2">
            <img src="<?= $brochure('Asset 7.webp') ?>" alt="" class="height-60-img mb-2">
            <span>Kneading</span>
          </div>
        </div>

        <p>
          So you always have the right rhythm.
          <br><br>
          With a single press you can toggle soothing heat between 42&deg;C and 45&deg;C,
          or turn it off when you prefer a cool session.
        </p>
      </div>

      <!-- Right img -->
      <div class="col-12 col-md-6">
        <img src="<?= $brochure('Asset 2.webp') ?>" alt="">
      </div>
    </div>
  </section>

  <!-- 4 - OK -->
  <section class="full-image-frame right-content">
    <img
      src="<?= $brochure('BROCHURE-04.webp') ?>"
      alt="OGAWA Hands-On Neck Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay max-width-80" style="justify-self: flex-end;">
      <h2 class="h2">
        More Coverage, More Comfort
      </h2>
      <p>
        The upper and lower arms provide a wider massage range to effectively
        relieve tension at the Fengchi points - a key area linked to headaches,
        neck stiffness, and fatigue.
      </p>
    </div>
  </section>

  <!-- 5 - OK -->
  <section class="full-image-frame center-content">
    <img
      src="<?= $brochure('BROCHURE-05.webp') ?>"
      alt="OGAWA Hands-On Neck Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay max-width-70 text-center justify-content-start" style="justify-self: center;">
      <h2 class="h2">
        More Coverage, More Comfort
      </h2>
      <p>
        The upper and lower arms provide a wider massage range to effectively
        relieve tension at the Fengchi points - a key area linked to headaches,
        neck stiffness, and fatigue.
      </p>
    </div>
  </section>

  <!-- 6 - OK -->
  <section class="full-image-frame left-content">
    <img
      src="<?= $brochure('BROCHURE-06.webp') ?>"
      alt="OGAWA Hands-On Neck Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay max-width-80">
      <h2 class="h2">
        Quiet, portable and simple to use
      </h2>
      <p>
        Press and hold the power button for 1.5 seconds to start or stop your session,
        then choose your mode and heating with quick taps.
        <br>
        A real-voice prompt can be turned on or off with a double press so you can 
        operate the device without looking.
      </p>
    </div>
  </section>

  <!-- 7 - OK -->
  <section class="full-image-frame right-content">
    <img
      src="<?= $brochure('BROCHURE-07.webp') ?>"
      alt="OGAWA Hands-On Neck Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay max-width-80 text-white" style="justify-self: flex-end;">
      <h2 class="h2">
        The long-lasting battery keeps you relaxed on the go
      </h2>
      <p>
        With a 2000 mAh battery, you can enjoy around 1.5 hours of use after an 
        estimated 3-hour charge.
        <br><br>
        The battery indicator helps you plan ahead so your comfort companion
        is always ready when you need it.
      </p>
    </div>
  </section>

  <!-- 8 - OK -->
  <section class="full-image-frame left-content">
    <img
      src="<?= $brochure('BROCHURE-08.webp') ?>"
      alt="OGAWA Hands-On Neck Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay justify-content-start">
      <h2 class="h2">
        Cool Blue, crafted for calm
      </h2>
      <p>
        Our single signature colour,<br>
        Cool Blue,<br>
        bring a clean, modern aesthetic<br>
        that feels in the office,<br>
        the airport lounge<br>
        or your living room.
      </p>
    </div>
  </section>

  <!-- 9 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('BROCHURE-09.webp') ?>"
      alt="OGAWA Hands-On Neck Massager"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
