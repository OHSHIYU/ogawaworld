<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-maestro'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-maestro/brochure.css') ?>">
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
  <section class="p-4 bg text-center">
    <h1 class="h1 m-0">OGAWA Maestro</h1>
  </section>

  <!-- 1 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MAESTRO-01.webp') ?>"
      alt="OGAWA Maestro"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 2 Features Grid - OK -->
  <section class="full-image-frame features-grid p-5 height-1500-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MAESTRO-02.webp') ?>"
      alt="OGAWA Maestro"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay features-overlay">
      <h2 class="section-title h2">MAESTRO</h2>
      <p>POWERED BY OVERSEER&trade;</p>

      <div class="features-grid-inner">
        <!-- top row -->
        <!-- AI Precision Sensors -->
        <a href="#ai-precision"
          class="pos-relative feature-card feature-card--ai-precision"
          aria-label="Jump to AI Precision Sensors section">
          <img src="<?= $brochure('Asset 1.webp') ?>" alt="AI Precision Sensors">
          <span class="left-bottom-label">AI Precision Sensors</span>
        </a>

        <!-- AI Fatigue Tracker -->
        <a href="#ai-fatigue"
          class="pos-relative feature-card feature-card--ai-fatigue"
          aria-label="Jump to AI Fatigue Tracker section">
          <img src="<?= $brochure('Asset 2.webp') ?>" alt="AI Fatigue Tracker">
          <span class="left-bottom-label">AI Fatigue Tracker</span>
        </a>

        <!-- Light Therapy -->
        <a href="#light-therapy"
          class="pos-relative feature-card feature-card--light"
          aria-label="Jump to Light Therapy section">
          <img src="<?= $brochure('Asset 3.webp') ?>" alt="Light Therapy">
          <span class="left-bottom-label">Light Therapy</span>
        </a>

        <!-- bottom row -->
        <!-- Negative IONS Therapy -->
        <a href="#negative-ions"
          class="pos-relative feature-card feature-card--negative"
          aria-label="Jump to Negative IONS Therapy section">
          <img src="<?= $brochure('Asset 4.webp') ?>" alt="Negative IONS Therapy">
          <span class="left-bottom-label">Negative IONS Therapy</span>
        </a>

        <!-- Music Therapy with Binaural Beats -->
        <a href="#music-therapy"
          class="pos-relative feature-card feature-card--music"
          aria-label="Jump to Music Therapy with Binaural Beats section">
          <img src="<?= $brochure('Asset 5.webp') ?>" alt="Music Therapy with Binaural Beats">
          <span class="left-bottom-label">Music Therapy with Binaural Beats</span>
        </a>
      </div>
    </div>
  </section>

  <!-- 3 Daily Occupational Stress - OK -->
  <section class="container-fluid">
    <div class="row g-0">
      <!-- Left content -->
      <div class="col-12 col-md-6 gradient-background">
        <div class="title-box">
          <h2 class="m-0 h2">Daily Occupational Stress</h2>
        </div>

        <div class="wrap-content">
          <!-- first row -->
          <div class="row">
            <div class="col-6 d-flex">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 8.webp') ?>" alt="">
              <p>
                Coping up with a modern lifestyle means we are busy most of the time.
                The solution is simple. Using smart technology, we can make our lives
                easier and more comfortable.
              </p>
            </div>
            <div class="col-6 d-flex">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 11.webp') ?>" alt="">
              <p>
                Imagine having a massage powered by innovative technology 
                to provide total relaxation.
              </p>
            </div>
          </div>

          <!-- second row -->
          <div class="row">
            <div class="col-6 d-flex">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 9.webp') ?>" alt="">
              <p>
                A survey showed that 51% of Malaysian employees suffer from 
                at least one dimension of work-related stress, and 53% get
                less than 7 hours of sleep.
              </p>
            </div>
            <div class="col-6 d-flex">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 12.webp') ?>" alt="">
              <p>
                Financial concerns burden 22% of employees as reported by Malaysia's 
                Healthiest Workplace survey by AIA Vitality 2019.
              </p>
            </div>
          </div>

          <!-- third row -->
          <div class="row">
            <div class="col-6 d-flex">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 10.webp') ?>" alt="">
              <p>
                Additionally, 20% of employees report that workplace bullying
                contributes to their overall stress.
              </p>
            </div>
            <div class="col-6 d-flex">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 13.webp') ?>" alt="">
              <p>
                To add that, working long hours hunched over the computer and 
                the culture of overworking are manifesting in clinical health 
                conditions and sleep deprivation according to the survey.
              </p>
            </div>
          </div>

          <!-- fourth row -->
          <div class="row">
            <div class="col-6"></div>
            <div class="col-6 d-flex">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 14.webp') ?>" alt="">
              <p>
                A major finding by HR solutions provider, Employment Hero, said
                in its Employee Wellness Report that 58% of workers agree feeling
                burnt out from their work in the last three months.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right img -->
      <div class="col-12 col-md-6">
        <img src="<?= $brochure('Asset 7.webp') ?>" alt="">
      </div>
    </div>
  </section>

  <!-- 4 Learn overseer - OK -->
  <section class="full-image-frame left-content">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MAESTRO-03.webp') ?>"
      alt="OVERSEER&trade; by OGAWA chip with glowing base"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay text-center">
      <div>
        <h2 class="learn-overseer-title m-3 h2">OVERSEER&trade;</h2>
        <p class="mb-3">
          Combine Smart AI customization, convenience and comfort to provide
          a seamless and immersive massage experience
        </p>
        <a href="/technology/overseer" class="learn-overseer-btn">
          LEARN ABOUT OVERSEER&trade;
        </a>
      </div>
    </div>
  </section>

  <!-- 5 MSS - OK -->
  <section class="container-fluid">
    <div class="row g-0">
      <!-- Left -->
      <div class="col-12 col-md-6">
          <img src="<?= $brochure('Asset 96.webp') ?>" alt="">
      </div>

      <!-- Right -->
      <div class="col-12 col-md-6 p-5 align-content-center bg-black">
        <p class="text-justify mb-2">
          The OGAWA MAESTRO powered by OVERSEER&trade;, combines Smart AI customization,
          convenience and comfort to provide a seamless and immersive massage experience.
          <br><br>
          The automated analyst offers indulgence and self-care on a whole new level. The AI
          processor detects the condition of your body before crafting an adaptive programme
          for the ultimate relaxation session.
          <br><br>
          Indulge yourself into a multi-sensory experience through vision, hearing and
          smell with OGAWA MAESTRO.
        </p>

        <div class="mss-bottom">
          <h2 class="m-0 h2">MSS</h2>
          <p>Multi-Sensory Stimulation</p>

          <div class="row">
            <div class="col-3 justify-items-center">
              <img class="mb-2 height-35-img" src="<?= $brochure('Asset 15.webp') ?>" alt="">
              <p>AI Precision Sensors</p>
            </div>
            <div class="col-2 justify-items-center">
              <img class="mb-2 height-35-img" src="<?= $brochure('Asset 16.webp') ?>" alt="">
              <p>AI Fatugue Tracker</p>
            </div>
            <div class="col-2 justify-items-center">
              <img class="mb-2 height-35-img" src="<?= $brochure('Asset 17.webp') ?>" alt="">
              <p>Light Therapy</p>
            </div>
            <div class="col-2 justify-items-center">
              <img class="mb-2 height-35-img" src="<?= $brochure('Asset 18.webp') ?>" alt="">
              <p>Negative IONs Therapy</p>
            </div>
            <div class="col-3 justify-items-center">
              <img class="mb-2 height-35-img" src="<?= $brochure('Asset 19.webp') ?>" alt="">
              <p>Music Therapy with Binaural Beats</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 6 Red Light Therapy - OK -->
  <section class="container-fluid" style="background-color: black;">
    <div class="row g-0">
      <div class="col-12 col-md-6">
        <div class="full-image-frame" style="--img-w: 3970; --img-h: 3442;">
          <img
            src="<?= $brochure('Asset 20.webp') ?>"
            alt="OVERSEER&trade;"
            class="bg-img"
            loading="eager"
            decoding="async"
          >

          <div class="overlay p-5">
            <h2 class="mb-3 h2">Take Your Sleep Seriously With Red Light Therapy</h2>
            <p>
              Red light wavelengths encourage your brain to prosuce melatonin.
              This naturally occuring hormone tells your body it's time to sleep. 
              The darker it gets, the melatonin your body releases to put you into 
              REM and circadian rhythm.
              <br><br>
              One study found that red light therapy helped improve sleep quality.
              The participants had a deeper sleep and fell asleep faster, too. If 
              you need lights in your room at night, red LEDs or bulbs are the way
              to go.
            </p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 align-content-center">
        <div class="p-5">
          <div class="mb-2">
            <h5 class="fst-italic fw-bold h5">What is REM sleep?</h5>
            <p>
              This is the phase when we dream. During this time, brain activity,
              heart rate and blood pressure increases. Our eyes move rapidly while 
              closed and the muscles in our arms and legs are temporarily inactive.
            </p>
          </div>

          <div class="mb-3">
            <h5 class="fst-italic fw-bold h5">What are circadian rhythms?</h5>
            <p>
              A circadian rhythm is a natural process that follows a 24-hour cycle 
              which responds to light and dark, affecting most living things including
              animals, plants and microbes.
            </p>
          </div>

          <div>
            <h3 class="mb-3 fst-italic fw-bold h3">Benefits Of Red Light Therapy</h3>
            <div class="row text-center">
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 21.webp') ?>" alt="">
                <p>Regulate sleep pattern and schedule</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 22.webp') ?>" alt="">
                <p>Fight ageing</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 23.webp') ?>" alt="">
                <p>Promotes blood circulation</p>
              </div>
            </div>
            <div class="row text-center">
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 24.webp') ?>" alt="">
                <p>Increases melatonin levels</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 25.webp') ?>" alt="">
                <p>Induce sleepiness and makes one fall asleep quicker (Therapeutic light)</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 26.webp') ?>" alt="">
                <p>Improves sleep quality</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 7 Binaural Beats Therapy - OK -->
  <section class="container-fluid" style="background-color: #e3f4fd; color: #1e386a;">
    <div class="row g-0">
      <div class="col-12 col-md-6">
        <div class="full-image-frame" style="--img-w: 3970; --img-h: 3442;">
          <img
            src="<?= $brochure('Asset 27.webp') ?>"
            alt="OVERSEER&trade;"
            class="bg-img"
            loading="eager"
            decoding="async"
          >

          <div class="overlay justify-content-end p-5">
            <h2 class="h2">Experience Massage On A Cerebral Level With Binaural Beats Therapy</h2>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 align-content-center">
        <div class="p-5">
          <p class="mb-2">
            A binaural beat is an illusion by the brain when you listen to two
            tones with slightly different frequencies at the same time.
          </p>

          <div class="table">
            <table class="bb-table" aria-label="Brain waves and features">
              <thead>
                <tr>
                  <th scope="col">Type of Brain Waves</th>
                  <th scope="col">Features</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>Delta - δ</td>
                  <td>Deep Sleep, Healing</td>
                </tr>
                <tr>
                  <td>Theta - θ</td>
                  <td>Deep Relaxation, Meditation</td>
                </tr>
                <tr>
                  <td>Alpha - α</td>
                  <td>Relaxed Focus, Accelerated Learning, Stress Reduction</td>
                </tr>
                <tr>
                  <td>Beta - β</td>
                  <td>Focus Attention, Analytical Thinking and Problem Solving</td>
                </tr>
              </tbody>
            </table>
          </div>

          <h5 class="fst-italic fw-bold h5">Your Brain and Bineural Beats</h5>
          <p class="mb-3">
            The two different tones align with your brain waves to produce a beat 
            with a specific frequency. This frequency is the difference in herts (Hz)
            between the frequencies of the two tones.
            <br><br>
            For example, if you are listening to a 440Hz tone with your left ear and 
            a 444 Hz tone with your right ear, you would be hearing a 4 Hz tone. This 
            induces a meditative state, helping you to stay calm and refreshed.
          </p>

          <div class="row text-center">
            <div class="col-2 justify-items-center">
              <img src="<?= $brochure('Asset 28.webp') ?>" alt="" class="mb-2 height-60-img">
              <p>Reduced anxiety</p>
            </div>
            <div class="col-3 justify-items-center">
              <img src="<?= $brochure('Asset 29.webp') ?>" alt="" class="mb-2 height-60-img">
              <p>Foster positive moods</p>
            </div>
            <div class="col-3 justify-items-center">
              <img src="<?= $brochure('Asset 30.webp') ?>" alt="" class="mb-2 height-60-img">
              <p>Helping you enter a meditative state</p>
            </div>
            <div class="col-2 justify-items-center">
              <img src="<?= $brochure('Asset 31.webp') ?>" alt="" class="mb-2 height-60-img">
              <p>Lower stress</p>
            </div>
            <div class="col-2 justify-items-center">
              <img src="<?= $brochure('Asset 32.webp') ?>" alt="" class="mb-2 height-60-img">
              <p>Improved sleeping habit</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 8 Negative IONS - OK -->
  <section class="container-fluid" style="background-color: #fff;">
    <div class="row g-0">
      <div class="col-12 col-md-6">
        <div class="full-image-frame" style="--img-w: 3970; --img-h: 3442;">
          <img
            src="<?= $brochure('Asset 33.webp') ?>"
            alt="OVERSEER&trade;"
            class="bg-img"
            loading="eager"
            decoding="async"
          >

          <div class="overlay justify-content-start p-0" style="width: 70%;">
            <div class="title-box">
              <h2 class="m-0 title-box h2">Magnetic Field Therapy Through Negative Ions</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 align-content-center" style="color: #1e386a;">
        <div class="p-5">
          <p class="mb-3">
            Negative ions have been shown to directly strengthen human immunity, reduce weariness,
            promote metabolism, show heart rate, and maintain normal blood pressure in hypertensive
            patients, among other physiological functions.
            <br><br>
            Additionally, it can boost the movement of cillia on the respiratory tract's surface, 
            increase gland secretion, enhance lung ventilation, and enhance wound healing.
          </p>

          <div>
            <h3 class="mb-3 fst-italic fw-bold h3">Benefits Of Negative Ions</h3>
            <div class="row text-center">
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 34.webp') ?>" alt="">
                <p>Get rid of static electricity</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 35.webp') ?>" alt="">
                <p>Boosts immunity</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 36.webp') ?>" alt="">
                <p>Combats fatigue</p>
              </div>
            </div>
            <div class="row text-center">
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 37.webp') ?>" alt="">
                <p>Unclogs blood vessels</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 38.webp') ?>" alt="">
                <p>Regenerates heart and lungs</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 39.webp') ?>" alt="">
                <p>Improves sleep quality</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 9 Massage Therapy - OK -->
  <section class="container-fluid" style="background-color: #e3f4fd;">
    <div class="row g-0">
      <div class="col-12 col-md-6">
        <div class="full-image-frame" style="--img-w: 3970; --img-h: 3442;">
          <img
            src="<?= $brochure('Asset 40.webp') ?>"
            alt="OVERSEER&trade;"
            class="bg-img"
            loading="eager"
            decoding="async"
          >

          <div class="overlay justify-content-end p-5">
            <h2 class="h2">Breath In, Breath Out With Air Pressure Massage Therapy</h2>
            <p>
              The MAESTRO chair guides you to breathe mindfully by syncing the air pressure's
              charging time, holding time and release time together with the movement of its 
              massage rollers. Just like the teachings of yoga.
            </p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="full-image-frame" style="--img-w: 3970; --img-h: 3442;">
          <img
            src="<?= $brochure('Asset 41.webp') ?>"
            alt="OVERSEER&trade;"
            class="bg-img"
            loading="eager"
            decoding="async"
          >

          <div class="overlay justify-content-start p-4" style="color: #1e386a;">
            <h3 class="mb-3 fst-italic fw-bold h3">The Benefits</h3>
            <div class="row text-center">
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 34.webp') ?>" alt="">
                <p>Get rid of static electricity</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 35.webp') ?>" alt="">
                <p>Boosts immunity</p>
              </div>
              <div class="col-4 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 36.webp') ?>" alt="">
                <p>Combats fatigue</p>
              </div>
            </div>
            <div class="row text-center">
              <div class="col-6 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 37.webp') ?>" alt="">
                <p>Unclogs blood vessels</p>
              </div>
              <div class="col-6 justify-items-center">
                <img class="mb-2 height-60-img" src="<?= $brochure('Asset 38.webp') ?>" alt="">
                <p>Regenerates heart and lungs</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 10 4D Thermo Rollers - Pending -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MAESTRO-05.webp') ?>"
      alt="OVERSEER&trade;"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay justify-content-start">
      <div class="title-box max-width-70">
        <h2 class="m-0 h2">The Invigorating 4D Thermo Rollers</h2>
      </div>

      <p class="ms-3 max-width-50" style="color: #1e386a;">
        The invigorating 4D Thermo Rollers are integrated with Extreme Speed Heating Massage 
        Wheel Technology&trade; that can heat up to approximately 50&deg;C in 2.5minutes, 
        offer strong yet delicate touch like human hands that deeply relaxes the tight muscles 
        in the back and releases spinal pressure.
      </p>
    </div>
  </section>

  <!-- 11 4D Gear Box - OK -->
  <section class="full-image-frame height-1500-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MAESTRO-06.webp') ?>"
      alt="OVERSEER&trade;"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

      <div class="overlay justify-content-start max-width-70">
        <div class="title-box">
          <h2 class="h2">Human-Like Massage With 4D Gear Box</h2>
        </div>
      </div>

      <div class="overlay justify-content-end p-3 text-center">
        <h3 class="fst-italic fw-bold h3">Special Features</h3>
        <div class="row">
          <div class="col-4 justify-items-center">
            <img src="<?= $brochure('Asset 47.webp') ?>" alt="" class="height-60-img mb-2">
            <h5 class="fw-bold h5">JAPANESE TECHNOLOGY: M.5 GEN&trade;</h5>
            <p>
              The 5th generation microprocessor quickly responds and accurately
              adjusts massage programmes at your command, redefining massage 
              accuracy to the next level even higher precision and optimized
              system performance.
            </p>
          </div>

          <div class="col-4 justify-items-center">
            <img src="<?= $brochure('Asset 48.webp') ?>" alt="" class="height-60-img mb-2">
            <h5 class="fw-bold h5">8 SETS OF PRECISION SENSORS</h5>
            <p>
              Integration of 8 sets of sensors: temperature, position, strength, coverage, 
              motor speed, acceleration and responsive feedback. Now with 4D mode enhancement
              to make it even more humanized while optimizing the sensor and movement control
              accuracy to target the pressure points with precision.
            </p>
          </div>

          <div class="col-4 justify-items-center">
            <img src="<?= $brochure('Asset 49.webp') ?>" alt="" class="height-60-img mb-2">
            <h5 class="fw-bold h5">AUTOMATIC ACUPOINT DETECTION TECHNOLOGY&trade;</h5>
            <p>
              With closed-loop speed detection and high-precision calibration 
              to locate acupressure points in the upper and lower body.
            </p>
          </div>
        </div>
      </div>
  </section>

  <!-- 12 4D Pro AI Tech - Pending -->
  <section class="container-fluid" style="background-color: black;">
    <div class="row g-0">
      <div class="col-12 col-md-6">
        <div class="title-box">
          <h2 class="m-0 h2">4D Pro AI Technology</h2>
        </div>

        <div class="p-5">
          <div class="row text-center">
            <div class="col-6 justify-items-center">
              <img src="<?= $brochure('Asset 28.webp') ?>" alt="" class="mb-3 height-120-img">
              <p>
                We have developed a control system in which information such as the user's body 
                shape or state of muscles is automatically reflected in the massages through AI.
                We tailor the intensity, skill and smoothness to match each individual's body.
              </p>
            </div>
            <div class="col-6 justify-items-center">
              <img src="<?= $brochure('Asset 29.webp') ?>" alt="" class="mb-3 height-120-img">
              <p>
                High torque/high accuracy basic massage movements with brushless motor and AI.
                We have upgraded all the kneading techniques to a higher level.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="p-5">
          <div class="mb-3">
            <h3 class="mb-3 fst-italic fw-bold h3">AI Fatigue Tracker</h3>
            <div class="row text-center">
              <div class="col-6 justify-items-center">
                <img src="<?= $brochure('Asset 52.webp') ?>" alt="" class="mb-2 height-60-img">
                <p>
                  Automatic detection of user's muscle stiffness and fatigue.
                </p>
              </div>
              <div class="col-6 justify-items-center">
                <img src="<?= $brochure('Asset 53.webp') ?>" alt="" class="mb-2 height-60-img">
                <p>
                  Automatic detection of strength and intensity appropriate for user's muscle.
                </p>
              </div>
            </div>
            <div class="row text-center">
              <div class="col-12 justify-items-center">
                <img src="<?= $brochure('Asset 54.webp') ?>" alt="" class="mb-2 height-60-img">
                <p>
                  Scanning and checking on user's state of muscle, followed by recommendation
                  of suitable massage program.
                </p>
              </div>
            </div>
          </div>
          
          <div>
            <h3 class="mb-3 fst-italic fw-bold h3">AI Voice Command</h3>
            <img src="<?= $brochure('Asset 55.webp') ?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 13 Foot & 3D Calves - OK -->
  <section class="container-fluid" style="background-color: black;">
    <div class="row g-0">
      <div class="col-12 col-md-6">
        <div class="full-image-frame" style="--img-w: 3970; --img-h: 3442;">
          <img
            src="<?= $brochure('Asset 56.webp') ?>"
            alt="OVERSEER&trade;"
            class="bg-img"
            loading="eager"
            decoding="async"
          >

          <div class="overlay justify-content-start">
            <div class="title-box max-width-60">
              <h2 class="m-0 h2">Foot Detox Roller</h2>
            </div>
            <p class="p-3">
              Massaging our feet can help to reduce pain and psychological symptoms such as 
              stress and anxiety in addition to enhancing relaxation and sleep. Enjoy state-of-the-art 
              foot reflexology with the MAESTRO's Foot Detox Roller which stimulates blood circulation 
              and reduces swelling while relieving minor aches and pains.
            </p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="full-image-frame" style="--img-w: 3970; --img-h: 3442;">
          <img
            src="<?= $brochure('Asset 57.webp') ?>"
            alt="OVERSEER&trade;"
            class="bg-img"
            loading="eager"
            decoding="async"
          >

          <div class="overlay justify-content-start">
            <div class="title-box max-width-60">
              <h2 class="m-0 h2">3D Calves Massage</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 14 27 Auto Programs - OK -->
  <section class="full-image-frame height-2000-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MAESTRO-07.webp') ?>"
      alt="27 Auto Programs"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay justify-content-start">
      <div class="title-box max-width-60">
        <h2 class="m-0 h2">27 Auto Programs <span class="fst-italic fs-6">(TOTAL)</span></h2>
      </div>

      <div class="row g-5 px-5" style="color:#1e386a; margin: 0;">
        <!-- LEFT: Exclusive Category -->
        <div class="col-12 col-lg-6 mt-2">
          <h3 class="fst-italic fw-bold mb-3 h3">Exclusive Category</h3>

          <div class="row">
            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 58.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Master Choice</span> - For parts of the body that 
                are often tired, mainly focuses on neck and back kneading, tapping on waist and 
                buttocks to relax and relieve fatigue.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 60.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Rhythmical Massage</span> - Massages the whole 
                body with light warmth for fast recovery.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 59.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Breath Relaxation</span> - Massages and kneads 
                  the whole body, focusing on neck and shoulders, waist and upper limbs. Uses 
                  massage/kneading/beating techniques, focusing on the shoulders, acupuncture 
                  points on the lower back, soothes the mind and body.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 61.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">AI Fatigue Tracker</span> - Scans and detects 
                your body's muscle fatigue then recommends a suitable massage program for you.
              </p>
            </div>
          </div>
        </div>

        <!-- RIGHT: 5 Elements Category -->
        <div class="col-12 col-lg-6 mt-2">
          <h3 class="fst-italic fw-bold mb-3 h3">5 Elements Category</h3>

          <div class="row">
            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 62.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Metal</span> - Stimulates tai chi 
                movements, promotes heart function, improves human muscles, and 
                enhances body balance and flexibility.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 65.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Wood</span> - Stimulates scraping and 
                detoxifies the lymphatic system.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 63.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Water</span> - Chiropractic effect, adjusts the spine.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 66.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Fire</span> - Tapping and stretching effectively 
                helps to remove clogging, to unblock the body's energy.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-4">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 64.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Earth</span> - Simulate qigong massage, 
                to adjust the body, mind, and breath.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 15 - OK -->
  <section class="full-image-frame height-2000-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MAESTRO-07.webp') ?>"
      alt="27 Auto Programs"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay justify-content-center" style="color:#1e386a;">
      <div class="row g-5 px-5" style="margin: 0;">
        <!-- LEFT: Psychotherapy Category -->
        <div class="col-12 col-lg-6 mt-2">
          <h3 class="fst-italic fw-bold mb-3 h3">Psychotherapy Category</h3>

          <div class="row">
            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 67.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Brain Massage - Soothing</span> - Massages the
                main acupuncture points on the upper body, coordinates with the rhythm of binaural 
                beat, mood tune, relieves stress and tension.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 69.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Brain Massage - Focus</span> - Upper body stress-relieving 
                massage combined with binaural beat rhythm to help blood circulation of the brain,
                improves concentration during long-term study and work.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 68.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Sweet Dreams</span> - Gentle tapping to help 
                you relax and sleep better.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 70.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Deep Tissue</span> - Deep acupressure on the 
                whole body for holistic relaxation.
              </p>
            </div>
          </div>

          <img class="max-width-60" src="<?= $brochure('Asset 71.webp') ?>" alt="Psychotherapy">
        </div>

        <!-- RIGHT: Health Care Category -->
        <div class="col-12 col-lg-6 mt-2">
          <h3 class="fst-italic fw-bold mb-3 h3">Health Care Category</h3>

          <div class="row">
            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 72.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Sensei</span> - Massage designed for sore-prone 
                areas such as neck and shoulders.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 75.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Lymphatic Detox</span> - Strengthen lymphatic 
                drainage function through massage, can promote blood circulation, 
                detoxification and improve sleep.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 73.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Spine Care</span> - Mainly on the upper back and 
                lower back, add appropriate kneading and knocking, focusing on acupoint massage 
                on the back, so that the entire spine can be fully stretched.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 76.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Joint Care</span> - Massage designed for joint care 
                such as knees and calves, to improve blood circulation and metabolism.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 74.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Yoga Stretch</span> - This program uses the protrusion
                with AI smart movement to perform kneading, massage and stretching on the waist and 
                back joints.
            </p>
          </div>

          <img class="max-width-60" src="<?= $brochure('Asset 77.webp') ?>" alt="Health Care">
        </div>
      </div>
    </div>
  </section>

  <!-- 16 - OK -->
  <section class="full-image-frame height-2000-frame">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MAESTRO-07.webp') ?>"
      alt="27 Auto Programs"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay justify-content-center" style="color:#1e386a;">
      <div class="row g-5 px-5" style="margin: 0;">
        <!-- LEFT: Lifestyle Category -->
        <div class="col-12 col-lg-6 mt-2">
          <h3 class="fst-italic fw-bold mb-3 h3">Lifestyle Category</h3>

          <div class="row">
            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 78.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Sport Recovery</span> - Promote blood circulation 
                in the body and rejuvenate muscles.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 81.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Relaxation</span> - Full body massage with thermal 
                therapy to keep you in optimum confition for the day.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 79.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Reset & Reflex</span> - Legs and feet rubbing, sole 
                scraping mainly helps to relax the calf and foot muscles.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 82.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Centripetal</span> - Light and varied massage to wake 
                up your body, charged for the day.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 80.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Centrifugal</span> - Light and soft massage, 
                prepares the body to sleep.
              </p>
            </div>
          </div>

          <img class="max-width-60" src="<?= $brochure('Asset 83.webp') ?>" alt="Lifestyle">
        </div>

        <!-- RIGHT: Well Being Category -->
        <div class="col-12 col-lg-6 mt-2">
          <h3 class="fst-italic fw-bold mb-3 h3">Well Being Category</h3>

          <div class="row">
            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 84.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Blood Circulation</span> - Boosts blood flow 
                and revitalizes tired muscles for improved energy and overall wellness.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 86.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Immunity</span> - Full-body massage that stimulates 
                exercise, relaxes muscles, and enhances natural immunity.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 85.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">For Her</span> - Gentle massage with heat therapy 
                to promote lymphatic detox, improve circulation, and ease tension. Ideal for 
                women's wellness.
              </p>
            </div>

            <div class="col-12 col-sm-6 d-flex mb-3">
              <img class="height-60-img me-2" src="<?= $brochure('Asset 87.webp') ?>" alt="">
              <p class="m-0">
                <span class="fst-italic fw-bold">Gua Sha Detox</span> - Deep, powerful massage inspired by 
                gua sha to promote detoxification and restore body balance.
              </p>
            </div>
          </div>

          <img class="max-width-60" src="<?= $brochure('Asset 88.webp') ?>" alt="Well Being">
        </div>
      </div>
    </div>
  </section>

  <!-- 17 Additional Features - OK -->
  <section class="container-fluid" style="background-color: #dcedfa;">
    <div class="row g-0">
      <div class="col-12 col-md-6">
        <div class="full-image-frame" style="--img-w: 3970; --img-h: 3442;">
          <img
            src="<?= $brochure('Asset 89.webp') ?>"
            alt="OVERSEER&trade;"
            class="bg-img"
            loading="eager"
            decoding="async"
          >

          <div class="overlay justify-content-start p-0" style="width: 70%;">
            <div class="title-box">
              <h2 class="m-0 title-box h2">Additional Features</h2>
            </div>

            <div class="ps-5" style="color: #1e386a;">
              <h3 class="fwt-italic fw-bold h3">Zero Gravity</h3>
              <p>
                Experience utmost peace and weightlessness in zero gravity mode. Release 
                yourself from any form of physical pressure in this state of perfect equilibrium.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 align-content-center" style="color: #1e386a;">
        <div class="p-5">
          <div class="row text-center mb-3">
            <div class="col-4 justify-items-center">
              <img class="mb-2 height-60-img" src="<?= $brochure('Asset 90.webp') ?>" alt="">
              <p>Wireless Charging</p>
            </div>
            <div class="col-4 justify-items-center">
              <img class="mb-2 height-60-img" src="<?= $brochure('Asset 91.webp') ?>" alt="">
              <p>7 inch pad</p>
            </div>
            <div class="col-4 justify-items-center">
              <img class="mb-2 height-60-img" src="<?= $brochure('Asset 92.webp') ?>" alt="">
              <p>
                Child lock <br>
                Notification for chold lock <br>
                (safety feature)
              </p>
            </div>
          </div>

          <div class="row text-center">
            <div class="col-12 justify-items-center">
              <img class="mb-2 height-60-img" src="<?= $brochure('Asset 93.webp') ?>" alt="">
              <p>
                Anti-pitch feature. A notification will pop up 
                before you can safely turn off the massage chair.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 18 Spec - OK -->
  <section class="full-image-frame" style="--img-w: 3969px; --img-h: 2587px;">
    <img
      src="<?= $brochure('OGAWA WEBSITE - MAESTRO-08.webp') ?>"
      alt="OGAWA Maestro"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
