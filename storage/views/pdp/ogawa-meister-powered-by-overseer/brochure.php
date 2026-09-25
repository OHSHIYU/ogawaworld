<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-meister-powered-by-overseer'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-meister-powered-by-overseer/brochure.css') ?>">
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
      <h1 class="h1">OGAWA MEISTER – powered by OVERSEER™</h1>
    </div>
  </section>

  <!-- 1 Img only - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-01.webp') ?>"
      alt="OGAWA MEISTER – powered by OVERSEER™"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 2 Left text - OK -->
  <section class="full-image-frame left-content">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-02.webp') ?>"
      alt="OVERSEER™ by OGAWA chip with glowing base"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="max-width-70">
        <p class="text-start">
          Meet Meister POWERED BY OVERSEER&trade;, the next-gen AI massage
          chair that isn't just an ordinary massage chair - it comes with
          Health Tracking, AI Voice Command, and AI Safeguard system.
          <br><br>
          The AI Health Tracking System redefines relaxation with cutting-edge
          intelligence designed just for you - it understands and adapts
          to your body's unique needs.
        </p>
      </div>
    </div>
  </section>

  <!-- 3 Learn overseer - OK -->
  <section class="full-image-frame left-content">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-03.webp') ?>"
      alt="OVERSEER™ by OGAWA chip with glowing base"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay text-center">
      <div class="left-inner max-width-70">
        <h2 class="h2 left-title m-3">OVERSEER™</h2>

        <p class="mb-3">
          Personalized stress analysis and recommends tailored massage 
          programs that match your health needs.
        </p>

        <a href="/technology/overseer" class="learn-overseer-btn">
          LEARN ABOUT OVERSEER™
        </a>
      </div>
    </div>
  </section>

  <!-- 4 Features grid - OK -->
  <section class="full-image-frame features-grid height-2000-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-04.webp') ?>"
      alt="OGAWA BioVis feature grid"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay features-overlay">
      <h2 class="h2 section-title">MEISTER</h2>
      <p>POWERED BY OVERSEER&trade;</p>

      <div class="features-grid-inner">
        <!-- top row -->
        <!-- Biosensor -->
        <a href="#biosensor"
          class="pos-relative feature-card feature-card--biosensor"
          aria-label="Jump to BioSensor section">
          <img src="<?= $brochure('Asset 1.webp') ?>" alt="BioSensor">
          <span class="left-bottom-label">BioSensor</span>
        </a>

        <!-- Liflex Track -->
        <a href="#liflex-track"
          class="pos-relative feature-card feature-card--liflex"
          aria-label="Jump to Liflex&trade; Track section">
          <img src="<?= $brochure('Asset 3.webp') ?>" alt="Liflex&trade; Track">
          <span class="left-bottom-label">Liflex&trade; Track</span>
        </a>

        <!-- Smart Space Enjoyment -->
        <a href="#smart-space"
          class="pos-relative feature-card feature-card--smart"
          aria-label="Jump to Smart Space Enjoyment section">
          <img src="<?= $brochure('Asset 6.webp') ?>" alt="Smart Space Enjoyment">
          <span class="left-bottom-label">Smart Space Enjoyment</span>
        </a>

        <!-- bottom row -->
        <!-- OTA Technology -->
        <a href="#ota-tech"
          class="pos-relative feature-card feature-card--ota"
          aria-label="Jump to OTA Technology section">
          <img src="<?= $brochure('Asset 2.webp') ?>" alt="OTA Technology">
          <span class="left-bottom-label">OTA Technology</span>
        </a>

        <!-- Five Elements -->
        <a href="#five-elements"
          class="pos-relative feature-card feature-card--five"
          aria-label="Jump to Five Elements section">
          <img src="<?= $brochure('Asset 4.webp') ?>" alt="Five Elements">
          <span class="left-bottom-label">Five Elements</span>
        </a>

        <!-- Whisper-Quiet Relaxation -->
        <a href="#whisper-quiet"
          class="pos-relative feature-card feature-card--whisper"
          aria-label="Jump to Whisper-Quiet Relaxation section">
          <img src="<?= $brochure('Asset 5.webp') ?>" alt="Whisper-Quiet Relaxation">
          <span class="left-bottom-label">Whisper-Quiet Relaxation</span>
        </a>

        <!-- AI Safeguard -->
        <a href="#ai-safeguard"
          class="pos-relative feature-card feature-card--ai"
          aria-label="Jump to AI Safeguard System section">
          <img src="<?= $brochure('Asset 7.webp') ?>" alt="AI Safeguard System">
          <span class="left-bottom-label">AI Safeguard System</span>
        </a>
      </div>
    </div>
  </section>

  <!-- 5 Calm Balance Breath - OK -->
  <section class="full-image-frame calm height-1000-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-04.webp') ?>"
      alt="OVERSEER™ by OGAWA chip with glowing base"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay align-items-center">
      <div class="max-width-70 text-center">
        <h2 class="h2">Calm, Balance, Breath</h2>
        <div class="blue-box">
          <div class="d-flex justify-content-center gap-5 mb-3">
            <img class="height-120-img" src="<?= $brochure('Asset 8.webp') ?>" alt="">
            <img class="height-120-img" src="<?= $brochure('Asset 9.webp') ?>" alt="">
          </div>
          <p>
            Alarming DASS-21 report shows 53% of Malaysians face anxiety,
            and 39% report stress. Malaysia's mental health crisis grows.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 6 Calm Balance Breath - OK -->
  <section class="full-image-frame calm height-1000-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-04.webp') ?>"
      alt="OVERSEER™ by OGAWA chip with glowing base"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay align-items-center">
      <div class="max-width-70 text-center">
        <h2 class="h2 mb-3">Calm, Balance, Breath</h2>
        <p>
          In collaboration with Universiti Sains Malaysia, OGAWA's exclusive
          massage programs help to reduce stress by 60% and anxiety by 45%.
        </p>
        <div class="blue-box d-flex justify-content-center gap-5 mb-3">
          <img class="height-120-img" src="<?= $brochure('Asset 10.webp') ?>" alt="">
          <img class="height-120-img" src="<?= $brochure('Asset 10.webp') ?>" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- 7 Release stress - OK -->
  <section class="full-image-frame stress height-1500-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-04.webp') ?>"
      alt="OVERSEER™ by OGAWA chip with glowing base"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay align-items-center">
      <div class="text-center">
        <h2 class="h2 mb-3">Release Stress, Restore Harmony</h2>
        <h3 class="h3">Deep Healing For Body And Mind</h3>
        <p>
          Backed by joint research with Universiti Sains Malaysia, our 4 exclusive massage programs
          blend advanced tech with holistic healing to melt stress, calm the mind, and restore balance.
        </p>
        <div class="row">
          <div class="col-3">
            <div class="blue-box rounded-5 justify-items-center">
              <img class="height-60-img" src="<?= $brochure('Asset 13.webp') ?>" alt="">
              <h4 class="h4">Fusion Harmonics</h4>
              <p>
                Promote deep relaxation to body and mind tension, and calm the 
                nervous system.
              </p>
            </div>
          </div>
          
          <div class="col-3">
            <div class="blue-box rounded-5 justify-items-center">
              <img class="height-60-img" src="<?= $brochure('Asset 14.webp') ?>" alt="">
              <h4 class="h4">Soul Vitality</h4>
              <p>
                Step into a space of deep restoration, inviting you to feel
                lighter, brighter, and fully alive.
              </p>
            </div>
          </div>

          <div class="col-3">
            <div class="blue-box rounded-5 justify-items-center">
              <img class="height-60-img" src="<?= $brochure('Asset 15.webp') ?>" alt="">
              <h4 class="h4">BioBalance</h4>
              <p>
                Targeted pressure meets rhythmic strokes 
                to revitalize and rebalance.
              </p>
            </div>
          </div>

          <div class="col-3">
            <div class="blue-box rounded-5 justify-items-center">
              <img class="height-60-img" src="<?= $brochure('Asset 16.webp') ?>" alt="">
              <h4 class="h4">Reflections</h4>
              <p>
                A firm massage that targets deep knots,
                relieving tension, and restoring calm.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 8 Biosensor - OK -->
  <section class="full-image-frame left-content" id="biosensor">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-05.webp') ?>"
      alt="OGAWA MEISTER – powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay justify-content-start">
      <div class="max-width-50">
        <h2 class="h3">
          Precision Health Tracking<br>
          POWERED BY OVERSEER&trade;
        </h2>
        <p>
          With revolutionary built-in BioSensor and OVERSEER&trade; AI Tech,
          it analyzes your body's fatigue levels to deliver personalized 
          therapy in real-time.
        </p>
      </div>
    </div>
  </section>

  <!-- 9 OTA Technology - OK -->
  <section class="full-image-frame left-content" id="ota-tech">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-06.webp') ?>"
      alt="OGAWA MEISTER – powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="max-width-60">
        <h2 class="h2 mb-3">OTA Technology</h2>
        <p class="mb-2">
          With OTA (Over-The-Air) technology, your chair receives seamless
          updates regularly from OGAWA server.
        </p>
        <p>
          Keeping your relaxation experience always evolving.
        </p>
      </div>
    </div>
  </section>

  <!-- 10 Five Elements -->
  <section class="full-image-frame" id="five-elements" style="--img-w: 3969; --img-h: 3006;">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-07.webp') ?>"
      alt="OGAWA MEISTER – powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 11 Liflex Track -->
  <section class="full-image-frame height-600-frame" id="liflex-track">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-08.webp') ?>"
      alt="OGAWA MEISTER – powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="text-center">
        <h2 class="h2 m-0">LiFlex&trade; Track</h2>
        <h3 class="h3">- Drift Into Deep Calm</h3>
        <p>
          LiFlex&trade; Track adapts to every unique body's contour,
          providing full-length relief from neck to legs with natural,
          human-like movement.
        </p>

        <div class="row steps">
          <div class="col-4">
            <div class="step-card">
              <span class="step-badge">1</span>
              <p>No pressure<br>point left behind</p>
            </div>
          </div>

          <div class="col-4">
            <div class="step-card">
              <span class="step-badge">2</span>
              <p>
                2 Zero-Gravity modes immerse yourself in a
                floating space-like experience
              </p>
            </div>
          </div>

          <div class="col-4">
            <div class="step-card">
              <span class="step-badge">3</span>
              <p>
                Perform Yoga stretching to
                release stress and anxiety
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 12 Whisper-Quiet - OK -->
  <section class="full-image-frame left-content" id="whisper-quiet">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-09.webp') ?>"
      alt="OGAWA MEISTER – powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="max-width-60 text-center">
        <h2 class="h3">Pure Relaxation,<br>Silent but Effective</h2>
        <p class="mb-2">
          Experience whisper-quiet relaxation with our advanced
          silent actuator and air pump technology, operating at 
          under 50dB-quieter than your house's refrigerator.
        </p>

        <div class="row">
          <div class="col-6 justify-items-center">
            <img class="height-120-img" src="<?= $brochure('Asset 20.webp') ?>" alt="">
            <h3 class="h6 m-0">Silent Air Pump</h3>
          </div>

          <div class="col-6 justify-items-center">
            <img class="height-120-img" src="<?= $brochure('Asset 21.webp') ?>" alt="">
            <h3 class="h6 m-0">Silent Actuater</h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 13 Smart Space Environment - OK -->
  <section class="full-image-frame smart-space" id="smart-space">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-10.webp') ?>"
      alt="OGAWA MEISTER – powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay align-items-center justify-content-start">
      <h2 class="h2">Smart Space Enjoyment</h2>
    </div>

    <div class="u-pos" style="--pos-top: 30%; --pos-left: 10%;">
      <h3 class="h6 d-flex">
        Smart Key
        <img class="height-35-img" src="<?= $brochure('Asset 22.webp') ?>" alt="">
      </h3>
      <p>Quick and easy control at your fingertips.</p>
    </div>

    <div class="u-pos" style="--pos-top: 30%; --pos-left: 30%;">
      <h3 class="h6 d-flex">
        AI Voice Command
        <img class="height-35-img" src="<?= $brochure('Asset 23.webp') ?>" alt="">
      </h3>
      <p>Adjust your massage hands-free with built-in armrest microphones.</p>
    </div>

    <div class="u-pos" style="--pos-top: 30%; --pos-left: 68%;">
      <h3 class="h6">Zero-Wall & Anti-Pitch</h3>
      <p>Space-saving Design fits anywhere in your home.</p>
    </div>
  </section>

  <!-- 12 AI Safeguard - OK -->
  <section class="full-image-frame left-content height-600-frame" id="ai-safeguard">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-11.webp') ?>"
      alt="OGAWA MEISTER – powered by OVERSEER™"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="max-width-60 text-center">
        <h2 class="h2 mb-3">AI Safeguard System<br>Your Safety, We Care</h2>

        <div class="row">
          <div class="col-4 justify-items-center">
            <img class="height-120-img" src="<?= $brochure('Asset 24.webp') ?>" alt="">
            <h3 class="h3">Posture Detection</h3>
            <p>Detect and correct your posture</p>
          </div>

          <div class="col-4 justify-items-center">
            <img class="height-120-img" src="<?= $brochure('Asset 25.webp') ?>" alt="">
            <h3 class="h3">Autonomous Object Detection</h3>
            <p>Detect and clear obstructions</p>
          </div>

          <div class="col-4 justify-items-center">
            <img class="height-120-img" src="<?= $brochure('Asset 26.webp') ?>" alt="">
            <h3 class="h3">Child Lock</h3>
            <p>Ensures safety for little ones</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 16 Specs - OK -->
  <section class="full-image-frame" style="--img-w: 3969px; --img-h: 3126px;">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MEISTER-12.webp') ?>"
      alt="OGAWA MEISTER – powered by OVERSEER™"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
