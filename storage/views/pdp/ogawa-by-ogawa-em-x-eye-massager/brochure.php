<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-by-ogawa-em-x-eye-massager'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-by-ogawa-em-x-eye-massager/brochure.css') ?>">
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
  <section class="p-4 bg text-center">
    <h1 class="h1 fw-bold">ogawa By Ogawa EM-X Eye Massager</h1>
  </section>

  <!-- 1 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('EMX Brochure w SEGI-01.webp') ?>"
      alt="ogawa by Ogawa EM-X Eye Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 2 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('EMX Brochure w SEGI-02.webp') ?>"
      alt="ogawa by Ogawa EM-X Eye Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <h2 class="section-heading h2">
        MALAYSIA'S FIRST RESEARCH-BACKED<br>EYE MASSAGER
      </h2>

      <div class="s2-bottom">
        <p class="s2-intro">
          In collaboration with SEGi University &amp; Colleges, OGAWA EM-X Eye Massager<br>
          massage programs help to reduce Dry Eye by 91%, Headache by 85%,<br>
          Difficulty focusing at near vision by 83% and Itchy Eyes by 44%.
        </p>

        <div class="s2-bottom__grid">
          <div class="s2-bottom__card d-flex">
            <img src="<?= $brochure('Asset 1.webp') ?>" alt="Dry Eyes">
            <div class="s2-bottom__grid-text">
              <span>91%</span>
              <h3 class="h6">Improvement in<br>Dry Eyes</h3>
            </div>
          </div>

          <div class="s2-bottom__card d-flex">
            <img src="<?= $brochure('Asset 2.webp') ?>" alt="Headache">
            <div class="s2-bottom__grid-text">
              <span>85%</span>
              <h3 class="h6">Improvement in<br>Headache</h3>
            </div>
          </div>

          <div class="s2-bottom__card d-flex">
            <img src="<?= $brochure('Asset 3.webp') ?>" alt="Difficulty Focusing">
            <div class="s2-bottom__grid-text">
              <span>83%</span>
              <h3 class="h6">Improvement in<br>Difficulty Focusing<br>(Near Vision)</h3>
            </div>
          </div>

          <div class="s2-bottom__card d-flex">
            <img src="<?= $brochure('Asset 4.webp') ?>" alt="Itchy Eyes">
            <div class="s2-bottom__grid-text">
              <span>44%</span>
              <h3 class="h6">Improvement in<br>Itchy Eyes</h3>
            </div>
          </div>
        </div>

        <div class="s2-partner">
          <img
          class="height-120-img"
            src="<?= $brochure('Asset 5.webp') ?>"
            alt="SEGi University & Colleges Logo"
          >
          <div class="ver-line bg-black"></div>
          <p>
            Vision System Dysfunction Research Unit<br>
            Clinical Contact Lens &amp; Anterior Eye Research Unit
          </p>
        </div>

        <p class="s2-caption">
          Results gathered from 5 days of using EM-X Eye Massager in Revitalized Mode.
        </p>
      </div>
    </div>
  </section>

  <!-- 3 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('EMX Brochure w SEGI-03.webp') ?>"
      alt="ogawa by Ogawa EM-X Eye Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay s3-overlay">
      <h2 class="section-heading section-heading-left h2">1. TARGET GROUP</h2>

      <div class="u-pos pos-office">
        <p class="font-white-smoke text-start">
          For office workers with moderate eye use,<br>
          experiencing fatigue, soreness, and headaches.
        </p>
      </div>
      
      <div class="u-pos pos-people">
        <p class="text-start">
          People with cold and rhinities allergies<br>
          Stuffy nose, sneezing, runny nose
        </p>
      </div>

      <div class="u-pos pos-girls">
        <p class="text-start">
          Girls who are concerned about eye care<br>
          Dark circles, puffiness, dull eyes
        </p>
      </div>

      <div class="u-pos vertical pos-heavy">
        <p class="text-start">
          Heavy eye use for e-sport player<br>
          Dryness, tearing, blurred vision
        </p>
      </div>
    </div>
  </section>

  <!-- 4 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('EMX Brochure w SEGI-04.webp') ?>"
      alt="ogawa by Ogawa EM-X Eye Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay s4_5-overlay">
      <h2 class="section-heading section-heading-left h2">2. UNIQUE SELLING POINT</h2>
      <div class="u-pos s4_5-item s4_5-item-unique">
        <div class="d-flex" style="align-items: center;">
          <img src="<?= $brochure('Asset 6.webp') ?>" alt="">
          <h3 class="h6">Eye and nose care in one step</h3>
        </div>
        <p>
          Unique eye and nose care! It can be used for both the eyes and nose.
          Acupuncture points around the eyes can be massaged and combined with
          heat compress massage to help relieve symptoms of cold and rhinitis.
        </p>
      </div>

      <div class="u-pos s4_5-item s4_5-item-warm">
        <div class="d-flex" style="align-items: center;">
          <img src="<?= $brochure('Asset 7.webp') ?>" alt="">
          <h3 class="h6">Warm heat compress cover a<br>large area of the face</h3>
        </div>
        <p>
          A large area of gentle heat compress around the lower eye area and nose,
          like enjoying an eye spa.
        </p>
      </div>

      <div class="u-pos s4_5-item s4_5-item-see">
        <div class="d-flex" style="align-items: center;">
          <img src="<?= $brochure('Asset 8.webp') ?>" alt="">
          <h3 class="h6">See through from internal</h3>
        </div>
        <p>
          With PVD plating process, you can see the outside environment through
          the window while massaging.
        </p>
      </div>

      <div class="u-pos s4_5-item s4_5-item-various">
        <div class="d-flex" style="align-items: center;">
          <img src="<?= $brochure('Asset 9.webp') ?>" alt="">
          <h3 class="h6">Various massage technique combinations</h3>
        </div>
        <p>
          Multiple sets of flexible massage contacts simulate 116 kinds of massage
          movements, imitating professional eye massage techniques.
        </p>
      </div>
    </div>
  </section>

  <!-- 5 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('EMX Brochure w SEGI-05.webp') ?>"
      alt="ogawa by Ogawa EM-X Eye Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay s4_5-overlay">
      <div class="u-pos s4_5-item s4_5-item-temples">
        <div class="d-flex" style="align-items: center;">
          <img src="<?= $brochure('Asset 10.webp') ?>" alt="">
          <h3 class="h6">Temples massage to refresh<br>the brain and relieve fatigue</h3>
        </div>
        <p>
          After using the brain continuously for a long time, massaging the temples
          with vibration techniques can give the brain a benign
          stimulation, relieve fatigue, relieve pain and refresh the mind.
        </p>
      </div>

      <div class="u-pos s4_5-item s4_5-item-contactless">
        <div class="d-flex" style="align-items: center;">
          <img src="<?= $brochure('Asset 11.webp') ?>" alt="">
          <h3 class="h6">Contactless Eye Exercise</h3>
        </div>
        <p>
          True restoration of eye exercises and massage 
          techniques, from breathing guidance to
          massaging the corresponding acupoints of the 
          eyes, massage and voice synchronization
        </p>
      </div>

      <div class="u-pos s4_5-item s4_5-item-breathing">
        <div class="d-flex" style="align-items: center;">
          <img src="<?= $brochure('Asset 12.webp') ?>" alt="">
          <h3 class="h6">Unique breathing program to help you sleep</h3>
        </div>
        <p>
          Use the casual method/approach to adjust your breathing,
          soothe your mind, and help you fall asleep as soon as possible.
        </p>
      </div>

      <div class="u-pos s4_5-item s4_5-item-movement">
        <div class="d-flex" style="align-items: center;">
          <img src="<?= $brochure('Asset 13.webp') ?>" alt="">
          <h3 class="h6">Unique eye movement exercises</h3>
        </div>
        <p>
          Through vibration and voice guidance, the user is guided to do eye movements:
          open-close eye movement, cross movement, eye circling, alternate distances
          and so on. Achieve eye muscle relaxation and relieve eye fatigue.
        </p>
      </div>
    </div>
  </section>

  <!-- 6 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('EMX Brochure w SEGI-06.webp') ?>"
      alt="ogawa by Ogawa EM-X Eye Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay s6-overlay">
      <div class="max-width-60">
        <h2 class="section-heading section-heading-left h2">3. ZONED MASSAGE</h2>
        <div class="s6-top">
          <p>6 smart touch points &ndash; massage the upper eye area</p>

          <div class="s6-content">
            <div class="s6-legend">
              <div class="s6-legend-item align-items-center">
                <span class="s6-dot s6-dot--green"></span>
                <p>6 smart touch points &ndash; massage the upper eye area</p>
              </div>
              <div class="s6-legend-item align-items-center">
                <span class="s6-dot s6-dot--blue"></span>
                <p>2 smart touch points &ndash; massage the temples</p>
              </div>
              <div class="s6-legend-item align-items-center">
                <span class="s6-dot s6-dot--purple"></span>
                <p>Lower eye area &ndash; enhance eye beauty</p>
              </div>
            </div>
            <ul class="s6-list">
              <li>Vibration massage</li>
              <li>Large area of gentle heat compresses</li>
            </ul>
            <div class="s6-industry">
              <div class="s6-legend-item">
                <span class="s6-dot s6-dot--yellow"></span>
                <div>
                  <span class="s6-star">★ Industry&rsquo;s first</span>
                  <p class="m-0">Double care for the nose</p>
                </div>
              </div>

              <ul>
                <li>Vibration massage</li>
                <li>Large area of gentle heat compresses</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <!-- left side -->
      <div class="u-pos s6-bottom s6-bottom-nose" style="--pos-bottom: 12%; --pos-left: 2%;">
        <h2 class="section-heading h2">4. NOSE MASSAGE</h2>

        <img src="<?= $brochure('Asset 22.png') ?>" alt="">

        <p class="s6-bottom-meta">
          <strong>Massage Location: Nose</strong><br>
          <strong>Massage Techniques: Vibration and Heat Compress</strong>
        </p>

        <ul class="s6-bottom-list">
          <li>
            Rhinitis and sinusitis are common conditions that trigger symptoms
            such as nasal congestion, runny nose and sneezing fits.
          </li>
          <li>
            By applying a heat compress, blood circulation around the nose can
            be improved. This will relieve runny nose, nasal congestion,
            sneezing and other similar symptoms.
          </li>
        </ul>
      </div>

      <!-- right side -->
      <div class="u-pos s6-bottom s6-bottom-temples" style="--pos-bottom: 12%; --pos-right: 2%;">
        <h2 class="section-heading h2">5. TEMPLES MASSAGE</h2>

        <img src="<?= $brochure('Asset 21.png') ?>" alt="">

        <p class="s6-bottom-meta">
          <strong>Massage Location: Temple Massage</strong><br>
          <strong>Massage Technique: Vibration</strong>
        </p>

        <ul class="s6-bottom-list">
          <li>
            After a long and continuous use of brain energy, the temples can
            often feel swollen and heavy &ndash; a sign of brain fatigue.
          </li>
          <li>
            Massaging the temples with vibration techniques can give the brain
            gentle stimulation that refreshes the brain and relieves fatigue,
            pain and tension.
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 7 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('EMX Brochure w SEGI-07.webp') ?>"
      alt="ogawa by Ogawa EM-X Eye Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay s7-overlay">
      <!-- Top: 6. 4 MODES -->
      <div class="s7-top">
        <h2 class="section-heading section-heading-left h2">6. 4 MODES</h2>

        <div class="s7-mode-list max-width-80">
          <!-- Beauty Mode -->
          <div class="s7-mode">
            <img class="height-80-img" src="<?= $brochure('Asset 14.webp') ?>" alt="Beauty Mode icon" class="s7-mode-icon">
            <div class="s7-mode-text">
              <h3 class="s7-mode-title h6">Beauty Mode</h3>
              <p class="s7-mode-desc">
                Concentrated massage for the lower eye area (eye bags, dark circles).
              </p>
              <ul class="s7-mode-meta">
                <li>Soft intensity, soothing rhythm</li>
              </ul>
            </div>
          </div>

          <!-- Revitalise Mode -->
          <div class="s7-mode">
            <img class="height-80-img" src="<?= $brochure('Asset 15.webp') ?>" alt="Revitalise Mode icon" class="s7-mode-icon">
            <div class="s7-mode-text">
              <h3 class="s7-mode-title h6">Revitalise Mode</h3>
              <p class="s7-mode-desc">
                Massages around the eyes and temples to relieve eye fatigue.
              </p>
              <ul class="s7-mode-meta">
                <li>Stronger intensity, faster rhythm</li>
              </ul>
            </div>
          </div>

          <!-- Eye Care Mode -->
          <div class="s7-mode">
            <img class="height-80-img" src="<?= $brochure('Asset 16.webp') ?>" alt="Eye Care Mode icon" class="s7-mode-icon">
            <div class="s7-mode-text">
              <h3 class="s7-mode-title h6">Eye Care Mode</h3>
              <p class="s7-mode-desc">
                Uses acupressure massage techniques to exercise the eyes.
              </p>
              <ul class="s7-mode-meta">
                <li>Medium intensity</li>
              </ul>
            </div>
          </div>

          <!-- Sweet Dreams Mode -->
          <div class="s7-mode">
            <img class="height-80-img" src="<?= $brochure('Asset 17.webp') ?>" alt="Sweet Dreams Mode icon" class="s7-mode-icon">
            <div class="s7-mode-text">
              <h3 class="s7-mode-title h6">Sweet Dreams Mode</h3>
              <p class="s7-mode-desc">
                Guides breathing through unique vibration method to calm the mind and improve sleep.
              </p>
              <ul class="s7-mode-meta">
                <li>Gradual intensity</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom: 7. THE DESIGN -->
      <div class="u-pos s7-design" style="text-align: left; --pos-bottom: 33%; --pos-left: 6%;">
        <h2 class="section-heading h2">7. THE DESIGN</h2>
        <p class="s7-design-copy">
          Transparent design so your visibility won&rsquo;t be completely blocked while using the device.
        </p>
      </div>
    </div>
  </section>

  <!-- 8 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('EMX Brochure w SEGI-08.webp') ?>"
      alt="ogawa by Ogawa EM-X Eye Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <h2 class="section-heading h2">8. WARM SENSOR HEAT COMPRESS</h2>
      
      <ul class="text-start">
        <li>The heating plate is made of 304 stainless steel which conducts heat quickly.</li>
        <li>The eye area of the device generates heat in 5 seconds.</li>
        <li>304 stainless steel has good corrosion resistance and can sustain long-term usage.</li>
        <li>
          Each heating piece has a NTC temperature sensor which monitors the temperature of the device.
          This avoids the risk of burning the delicate skin around the eyes.
        </li>
      </ul>
      
      <div class="u-pos max-width-50 text-start" style="--pos-top: 34%; --pos-left: 7%;">
        <p>Heat compress on the nose to improve blood circulation of nasal tissue:</p>
        <ul>
          <li>Applying heat compresses when you have a cold can delay the symptoms of nasal congestion</li>
          <li>Frequent application of heat compresses for rhinitis can relief symptoms of rhinitis</li>
        </ul>
      </div>

      <div class="u-pos max-width-40 text-start" style="--pos-top: 35%; --pos-right: -2%;">
        <p>Warm compresses for the eyes to improve blood microcirculation:</p>
        <ul>
          <li>Quickly relieve eye fatigue</li>
          <li>Improve dark circles</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 9 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('EMX Brochure w SEGI-09.webp') ?>"
      alt="ogawa by Ogawa EM-X Eye Massager"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
