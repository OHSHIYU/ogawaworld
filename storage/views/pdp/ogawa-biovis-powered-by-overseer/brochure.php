<?php
$seoOverride = [
  'title'       => 'OGAWA BioVis powered by OVERSEER™',
  'description' => 'Limited campaign description...',
];

// Merge into the global before header is included
$GLOBALS['ogw_seo'] = array_merge($GLOBALS['ogw_seo'] ?? [], $seoOverride);

require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-biovis-powered-by-overseer'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-biovis-powered-by-overseer/brochure.css') ?>">
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
  <!-- Index Friendly - OK -->
  <section class="index-section">
    <div class="container py-4">
      <h1 class="h1">OGAWA BioVis - powered by OVERSEER™</h1>
    </div>
  </section>

  <!-- 1 Biovis - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-01.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 2 Learn overseer - OK -->
  <section class="full-image-frame left-content text-white">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-02.webp') ?>"
      alt="OVERSEER™ by OGAWA chip with glowing base"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay text-center">
      <div style="justify-items: center;"> 
        <div class="d-flex align-items-center learn-more-contents">
          <div>
            <h2 class="learn-overseer-title m-0">OVERSEER™</h2>
            <p class="learn-overseer-subtitle m-0">Precision. Personalisation. Pure Bliss.</p>
          </div>
          <div class="ver-line bg-white"></div>
          <img class="height-120-img" src="<?= $brochure('Asset 1.webp') ?>" alt="An Industry First-And-Only">
        </div>

        <p class="learn-overseer-text">
          Customise massage programmes that's tailored to the body's specific needs.
        </p>

        <a href="/technology/overseer" class="learn-overseer-btn">
          LEARN ABOUT OVERSEER™
        </a>
      </div>
    </div>
  </section>

  <!-- 3 Grid features (clickable image grid) - OK -->
  <section class="full-image-frame features-grid height-1500-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-03.webp') ?>"
      alt="OGAWA BioVis feature grid"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay features-overlay">
      <h2 class="h2">BIOVIS</h2>
      <p>The Future of Wellness is Now</p>

      <div class="features-grid-inner">
        <!-- top row -->
        <a href="#vitality-touch-pro"
          class="pos-relative feature-card feature-card--vitality"
          aria-label="Jump to Vitality Touch PRO section">
          <img src="<?= $brochure('Asset 2.webp') ?>" alt="Vitality Touch PRO">
          <span class="left-bottom-label">Vitality TouchPRO</span>
        </a>

        <a href="#liflex-track"
          class="pos-relative feature-card feature-card--liflex"
          aria-label="Jump to Liflex Adaptive Multi-Angle Track section">
          <img src="<?= $brochure('Asset 4.webp') ?>" alt="Liflex Adaptive Multi-Angle Track">
          <span class="left-bottom-label">Liflex™ Adaptive Multi-Angle Track</span>
        </a>

        <a href="#pilaflex"
          class="pos-relative feature-card feature-card--pilaflex"
          aria-label="Jump to Pilaflex section">
          <img src="<?= $brochure('Asset 7.webp') ?>" alt="Pilaflex">
          <span class="left-bottom-label">Pilaflex</span>
        </a>

        <!-- bottom row -->
        <a href="#kinectback"
          class="pos-relative feature-card feature-card--kinectback"
          aria-label="Jump to Kinectback 3D Gearbox section">
          <img src="<?= $brochure('Asset 3.webp') ?>" alt="Kinectback 3D Gearbox">
          <span class="left-bottom-label">Kinectback 3D Gearbox</span>
        </a>

        <a href="#virtual-cockpit"
          class="pos-relative feature-card feature-card--virtual"
          aria-label="Jump to Virtual Cockpit section">
          <img src="<?= $brochure('Asset 5.webp') ?>" alt="Virtual Cockpit">
          <span class="left-bottom-label">Virtual Cockpit</span>
        </a>

        <a href="#cloudlift"
          class="pos-relative feature-card feature-card--cloudlift"
          aria-label="Jump to Cloudlift &amp; Waving Cushion section">
          <img src="<?= $brochure('Asset 6.webp') ?>" alt="Cloudlift &amp; Waving Cushion">
          <span class="left-bottom-label">Cloudlift &amp; Waving Cushion</span>
        </a>

        <a href="#ai-safeguard"
          class="pos-relative feature-card feature-card--ai"
          aria-label="Jump to AI Safeguard System section">
          <img src="<?= $brochure('Asset 8.webp') ?>" alt="AI Safeguard System">
          <span class="left-bottom-label">AI Safeguard System</span>
        </a>
      </div>
    </div>
  </section>

  <!-- 4 Vitality touch pro - OK -->
  <section class="full-image-frame s4" id="vitality-touch-pro">
    <div class="s4-header blue-bg text-center">
      <h2 class="section-title h1">VITALITY TOUCH PRO</h2>
      <p class="section-subtitle">Precision. Personalisation. Performance.</p>
    </div>

    <div class="pos-relative">
      <video autoplay muted loop playsinline>
        <source src="<?= $brochure('vitality-touch-pro.mp4') ?>" type="video/mp4">
      </video>

      <div class="overlay">
        <div class="u-pos" style="--pos-top: 5%; --pos-right: 5%;">
          <img
            src="<?= $brochure('Asset 9.webp') ?>"
            alt="Vitality Touch PRO icon"
            class="s4-video-icon"
          >
        </div>
      </div>
    </div>
  </section>

  <!-- 5 Kinectback Title - OK -->
  <section class="full-image-frame" id="kinectback">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-04.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="text-center">
        <h2 class="section-title h1">KINECTBACK</h2>
        <h3 class="h3">5D Gearbox</h3>
      </div>
    </div>
  
    <div class="overlay justify-content-end align-items-center">
      <div class="d-flex gap-3 text-center align-items-center">
        <img class="height-120-img" src="<?= $brochure('Asset 10.webp') ?>" alt="">
        <p class="section-subtitle">Discover unparalleled comfort<br>like never before.</p>
      </div>
    </div>
  </section>

  <!-- 6 Kinectback Video - OK -->
  <section class="full-image-frame s6-kinectback">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-05.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="row">
        <div class="col-6" style="justify-items: center;">
          <p class="max-width-80 text-center">
            Experience wider coverage with up to 52%* precision targeting your acupuncture points,
            delivering a comprehensive and revitalizing massage like never before.
          </p>

          <div class="pos-relative">
            <video autoplay muted loop playsinline>
              <source src="<?= $brochure('roller-massage.mp4') ?>" type="video/mp4">
            </video>
            <span class="left-bottom-label">Enhanced with<br>1cm-wide rollers</span>
          </div>
        </div>

        <div class="col-6" style="justify-items: center;">
          <p class="max-width-80 text-center">
            Benefit from a remarkable 30%* increase in massage accuracy, delivering pinpoint 
            precision for ultimate relief and comfort.
          </p>
          <div class="pos-relative">
            <video autoplay muted loop playsinline>
              <source src="<?= $brochure('brushless-motor.mp4') ?>" type="video/mp4">
            </video>
            <span class="left-bottom-label">Brushless Motor</span>
          </div>
        </div>
      </div>

      <p class="text-center">*Figures are derived through a comparison with standard massage chairs</p>
    </div>
  </section>

  <!-- 7 Liflex Title - OK -->
  <section class="full-image-frame" id="liflex-track">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-06.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="text-center">
        <h2 class="section-title h1">
          LIFLEX&trade; ADAPTIVE<br>
          MULTI-ANGLE TRACK
        </h2>
      </div>
    </div>
  
    <div class="overlay justify-content-end align-items-center">
      <div class="d-flex gap-3 text-center align-items-center">
        <img class="height-120-img" src="<?= $brochure('Asset 11.webp') ?>" alt="The World's First Motion Guide Rails">
        <div class="text-center">
          <p class="section-subtitle">Mobility Beyond Compare</p>
          <p>
            LiFlex with Motion Guide Rails offers superior reclining which adapts to
            body curves, enabling unique full-body massage in one smooth motion.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 8 Liflex Video - OK -->
  <section class="full-image-frame">
    <video autoplay muted loop playsinline>
      <source src="<?= $brochure('liflex.mp4') ?>" type="video/mp4">
    </video>
  </section>

  <!-- 9 Pilaflex Title - OK -->
  <section class="full-image-frame" id="pilaflex">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-07.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="text-center">
        <h2 class="section-title h1">PILAFLEX</h2>
      </div>
    </div>
  
    <div class="overlay justify-content-end align-items-center">
      <div class="d-flex gap-3 text-center align-items-center">
        <img class="height-120-img" src="<?= $brochure('Asset 12.webp') ?>" alt="Pioneering 2-Way Ankle Stretch Technology">
        <div class="text-center">
          <p class="section-subtitle">Revolutionary Ankle Comfort</p>
          <p>
            Experience deep relaxation with our 3D Foot & Leg Massage featuring a 135&deg;
              2-Way Ankle Stretch, enhancing ankle flexibility with up-down swing stretch.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 10 Pilaflex Video - OK -->
  <section class="full-image-frame">
    <div class="pos-relative">
      <video autoplay muted loop playsinline>
        <source src="<?= $brochure('pilaflex.mp4') ?>" type="video/mp4">
      </video>

      <div class="u-pos pilaflex-video-pos">
        <div class="d-flex pos-relative" style="max-width: 30%;">
          <img src="<?= $brochure('Asset 19.webp') ?>" alt="Stretch: Thai Massage">
        </div>
      </div>
    </div>
  </section>

  <!-- 11 Cloudlift - OK -->
  <section class="full-image-frame left-content s11-cloudlift" id="cloudlift">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-08.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div>
        <h2 class="section-title h1">CLOUDLIFT&trade;<br>AIRBAG CUSHION</h2>

        <div class="text-start">
          <img class="height-120-img mb-3" src="<?= $brochure('Asset 13.webp') ?>" alt="">
          <h3 class="section-subtitle h3 mb-3">Experience the silent efficiency of the airbag in action</h3>
          <p>
            Advance anti-collapse technology with flexible airbags fills gaps for spine support
            and protection, offering a cloud-like pampering sensation.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 12 Virtual cockpit title - OK -->
  <section class="full-image-frame" id="virtual-cockpit">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-09.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay align-items-center">
      <h2 class="section-title h1 mb-3">Virtual cockpit</h2>
      <div class="d-flex mb-3" style="align-items: center;">
        <img class="height-120-img me-3" src="<?= $brochure('Asset 14.webp') ?>" alt="">
        <p class="section-subtitle">
          Experience the pinnacle of<br>
          display and sound systems
        </p>
      </div>
    </div>
  </section>

  <!-- 12-1 Virtual cockpit video - OK -->
  <section class="full-image-frame">
    <video autoplay muted loop playsinline>
      <source src="<?= $brochure('vitual-cockpit.mp4') ?>" type="video/mp4">
    </video>
  </section>

  <!-- 13 In every touch - ok -->
  <section class="full-image-frame">
    <div class="s4-header alice-blue-bg text-center">
      <h3 class="section-subtitle h3">In Every Touch, A Universe of Discovery</h3>
      <p>
        BIOVIS features MONSTER audio and the 12" Infinity Pad. Creating a Virtual
        Cockpit for an incredible control experience.
      </p>
    </div>

    <video autoplay muted loop playsinline>
      <source src="<?= $brochure('monster-speaker.mp4') ?>" type="video/mp4">
    </video>
  </section>

  <!-- 14 AI Safeguard -->
  <section class="full-image-frame s14-ai" id="ai-safeguard">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-10.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay align-items-center text-center">
      <div style="justify-items: center;">
        <h2 class="section-title h1 mb-3">AI SAFEGUARD SYSTEM</h2>
        <img class="height-120-img mb-3" src="<?= $brochure('Asset 15.webp') ?>" alt="Top-Tier">
        <div class="d-flex">
          <div class="s14-item">
            <img class="height-120-img" src="<?= $brochure('Asset 16.webp') ?>" alt="">
            <h3 class="section-subtitle h3">Weight Safety Detection</h3>
          </div>

          <div class="s14-item">
            <img class="height-120-img" src="<?= $brochure('Asset 17.webp') ?>" alt="">
            <h3 class="section-subtitle h3">Autonomous Object Detection</h3>
            <p>
              The leg portion of the massage chair will automatically move 
              to its original position if it detects an object.
            </p>
          </div>

          <div class="s14-item">
            <img class="height-120-img" src="<?= $brochure('Asset 18.webp') ?>" alt="">
            <h3 class="section-subtitle h3">ChildLock</h3>
            <p>Notification for child lock<br>(safety feature)</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 15 - OK -->
  <section class="full-image-frame" style="--img-w: 3969px; --img-h: 2330px;">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-11.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 16 - OK -->
  <section class="full-image-frame" style="--img-w: 3969px; --img-h: 3126px;">
    <img
      src="<?= $brochure('OGAWA WEBSITE - BIOVIS-12.webp') ?>"
      alt="OGAWA BioVis - powered by OVERSEER™"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
