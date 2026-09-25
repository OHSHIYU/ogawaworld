<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-v-accento'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-v-accento/brochure.css') ?>">
<link rel="stylesheet" href="<?= asset('css/pdp/responsive.css') ?>">

<?php
  require VIEW_PATH . 'pdp/shared/font-loader.php';
  $fontManifest = @include __DIR__ . '/fonts.php';

  if (is_array($fontManifest)) {
    ogw_preload_product_fonts($base, $fontManifest);
    ogw_print_product_font_faces($base, $fontManifest);
  }
?>

<div class="main">
  <!-- Index Friendly -->
  <section class="index-section">
    <div class="container py-4">
      <h1 class="h1">OGAWA V-Accento</h1>
    </div>
  </section>

  <!-- 1 - OK -->
  <section class="full-image-frame">
    <img src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 1.webp') ?>" alt="OGAWA Master Drive AI 2.0 brochure — FA 1" loading="eager" decoding="async">
  </section>

  <!-- 2 — OK -->
  <section class="full-image-frame">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 2.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">

    <div class="overlay">
      <header class="mb-2">
        <h2 class="h2 fw-bold mb-2 text-white">One Touch Wellness</h2>
        <p class="mb-0 text-white">
          A convenient AI-powered palm sensor that scans your body for real time stress analysis combines
          body composition, health data and AI algorithms to provide personalized 
          solutions then refines them into easy Low & MEdium & High options for your 
          ease of use. Also provides exact recommendations for precision care.
        </p>
      </header>

      <div class="otw-panel card">
        <div class="card-body p-2">
          <div class="d-flex align-items-center gap-3 mb-2" style="justify-self:center;">
            <img class="height-60-img" src="<?= $brochure('Asset 4.webp') ?>" alt="" loading="lazy">
            <div>
              <h4 class="h6 text-white">IntelliSense</h4>
              <p>Relieves fatigue and<br>improves sleep quality</p>
            </div>
          </div>

          <div class="row">
            <div class="col-4 text-center justify-items-center">
              <img class="height-35-img mb-3" src="<?= $brochure('Asset 1.webp') ?>" alt="" loading="lazy">
              <div style="line-height: 1.3rem;">
                <h4 class="h6 text-white">AI Stress Analysis:</h4>
                <p class="mb-0">
                  The OGAWA massage chair uses AI to analyze your stress and 
                  muscle tension, customizing massages for relaxation.
                </p>
              </div>
            </div>

            <div class="col-4 text-center justify-items-center">
              <img class="height-35-img mb-3" src="<?= $brochure('Asset 2.webp') ?>" width="44" height="44" alt="" loading="lazy">
              <div style="line-height: 1.3rem;">
                <h4 class="h6 text-white">AI Voice Command:</h4>
                <p class="mb-0">
                  Control the chair using voice commands for easy
                  adjustments and personalized massages.
                </p>
              </div>
            </div>

            <div class="col-4 text-center justify-items-center">
              <img class="height-35-img mb-3" src="<?= $brochure('Asset 3.webp') ?>" width="44" height="44" alt="" loading="lazy">
              <div style="line-height: 1.3rem;">
                <h4 class="h4 text-white">AI Body Scan:</h4>
                <p class="mb-0">
                  Body Shape Scanning, Neck and Shoulder Positioning Detection:
                  The chair scans your body shape and neck/shoulder positions
                  for a tailored massage experience.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>  

      <div class="max-width-60 u-pos pos-precision">
        <h3 class="h6 m-0 otw-title">Step 01</h3>
          
        <div class="p-3 bg-dark">
          <h3 class="h6 fw-bold mb-2">Precision Shoulder Detection</h3>
          <p class="mb-0">
            Utilizing body shape scanning and nack-shoulder positioning,
            we craft a personalized massage experience just for you.
          </p>
        </div>
      </div>

      <div class="max-width-60 u-pos pos-seamless">
        <h3 class="h6 m-0 otw-title">Step 02</h3>
          
        <div class="p-3 bg-dark">
          <h3 class="h6 fw-bold mb-2">Seamless Sensor Integration</h3>
          <p class="mb-0">
            Place your palm on the sensor plate, and watch as it intuitively
              interprets your body's dynamics, focusing on key massage areas.
          </p>
        </div>
      </div>
      </div>
  </section>

  <!-- 3 — OK -->
  <section class="full-image-frame">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 3.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">

    <div class="overlay">
      <div class="p-2 p-md-4">
        <header class="mb-3">
          <h2 id="ai-stress-h" class="h2 fw-bold text-white mb-2">AI Stress Analysis</h2>
          <p id="ai-stress-d" class="mb-0 text-white">Indicator shows the level of stress after body scanning.</p>
        </header>

        <div class="row g-4 align-items-center">
          <div class="col-12 col-md-4">
            <ul class="ai-stress__legend list-unstyled d-flex gap-3 mb-0">
              <li><span class="pill pill--low"></span> <span>Low</span></li>
              <li><span class="pill pill--med"></span> <span>Medium</span></li>
              <li><span class="pill pill--high"></span> <span>High</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="overlay bottom">
      <div class="ai-voice mx-auto" aria-labelledby="ai-voice-h">
        <header class="text-center">
          <h2 id="ai-voice-h" class="h2 mb-2">AI Voice Command</h2>
        </header>

        <div class="row g-4 align-items-start text-center ai-voice__row">
          <div class="col-4 ai-voice__col ai-voice__col--step1">
            <div class="ai-voice__heading text-uppercase">Step 1</div>
            <img src="<?= $brochure('Asset 6.webp') ?>" width="64" height="64" alt="Microphone" loading="lazy">
          </div>

          <div class="col-4 ai-voice__col ai-voice__col--commands">
            <div class="ai-voice__heading text-uppercase">Step 2</div>
            <ul class="ai-voice__list" role="list">
              <li><i class="fa-solid fa-microphone"></i> VOICE COMMAND</li>
              <li>Hey OGAWA</li>
              <li>Power off</li>
              <li>Pause massage</li>
              <li>Continue massage</li>
              <li>Raise my back</li>
              <li>Lower my back</li>
              <li>I need a massage</li>
              <li>Change massage</li>
              <li>Switch on heater</li>
              <li>Switch off heater</li>
              <li>Louder</li>
              <li>Increase the volume</li>
              <li>Too loud</li>
              <li>Decrease the volume</li>
              <li>Switch on foot roller</li>
              <li>Switch off foot roller</li>
            </ul>
          </div>

          <div class="col-4 ai-voice__col ai-voice__col--responses">
            <div class="ai-voice__heading text-uppercase">Response</div>
            <ul class="ai-voice__list" role="list">
              <li>I am here</li>
              <li>Sure, I hope you enjoyed your massage</li>
              <li>Your session is on hold</li>
              <li>Resuming your session</li>
              <li>All right, right away / I have reached the maximum angle</li>
              <li>Sure, I recommend the suitable massage for you</li>
              <li>Ok, switch on heater</li>
              <li>Ok, switch off heater</li>
              <li>Ok, increase the volume / Sorry, I can’t go any louder</li>
              <li>Ok, decreasing the volume / I am at my lowest volume</li>
              <li>Ok, switching on foot roller</li>
              <li>Ok, switching off foot roller</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4 - OK -->
  <section class="full-image-frame">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 4.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">
    <div class="overlay">
      <div class="u-pos" style="--pos-left: 10%; --pos-top: 8%; max-width: 35%;">
        <h2 class="h2 mb-4">AI Body Scan</h2>
        <p class="mb-0">Body shape scanning, neck and shoulder positioning detection to create a unique personal massage experience.</p>
      </div>
    </div>
  </section>

  <!-- 5 — OK -->
  <section class="full-image-frame">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 5.webp') ?>" alt="OGAWA V-Accento — Air pressure system and waist & footrest heat zones" loading="lazy" decoding="async">
    
    <div class="overlay">
      <div class="s5-title u-pos">
        <h2 class="h2 text-center m-0">
          INJECT NEW<br>
          <span>[AIR-NERGY]</span> FOR YOU
        </h2>
      </div>

      <div class="u-pos s5-card s5-card--air">
        <div class="d-flex gap-3 align-items-center">
          <img class="height-120-img" src="<?= $brochure('Asset 7.webp') ?>" alt="" loading="lazy">
          <div>
            <h3 class="h3 mb-1">Air Pressure Massage</h3>
            <p class="s5-sub mb-2">Full-body air pressure massage system</p>
          </div>
        </div>
        <p class="mb-0">Revitalize with <strong>[AIR-NERGY]</strong> — a total-body air compression system. Unlike traditional kneading or rolling, inflatable chambers rhythmically compress to deliver a holistic body massage.</p>
      </div>

      <div class="u-pos s5-card s5-card--heat">
        <div class="d-flex gap-3 align-items-center">
          <img class="height-120-img" src="<?= $brochure('Asset 8.webp') ?>" alt="" loading="lazy">
          <div>
            <h3 class="h3 mb-1">Waist &amp; footrest Heat Massage</h3>
            <p class="s5-sub mb-2">Soothing warmth for circulation &amp; relaxation</p>
          </div>
        </div>
        <p class="mb-0">Enjoy gentle heat at the waist and footrest to ease tightness from long sitting. Enhances circulation for comforting warmth and deeper relaxation.</p>
      </div>
    </div>
  </section>

  <!-- 6 - OK -->
  <section class="full-image-frame s6">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 6.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">
    <div class="overlay">
      <h2 class="h2">Magnetic Field Therapy<br>Through Negative Ions</h2>

      <div class="u-pos max-width-40 s6-middle">
        <div class="text-center mb-2">
          <img class="height-60-img mb-3 " src="<?= $brochure('Asset 9.webp') ?>" alt="" loading="lazy">
          <p class="m-0 text-justify">
            Negative ions can harness the power of magnetic field therapy to 
            offer several health benefits. These ions are known to enhance 
            immunity, reduce fatigue, promote metabolism, regulate heart rate, 
            and support healthy blood pressure in hypertensive individuals.
            <br><br>
            Furthermore, they can stimulate cilia movement in the respiratory 
            tract, increase gland secretions, improve lung ventilation, and 
            accelerate wound healing.
          </p>
        </div>

        <div class="text-white">
          <h3 class="h3 s6-content__title">Benefits of<br>Negative Ions:</h3>
          <ul class="s6-benefits__grid" role="list">
            <li><img class="height-35-img" src="<?= $brochure('Asset 10.webp') ?>" alt="" loading="lazy"><p>Eliminate static<br>electricity</p></li>
            <li><img class="height-35-img" src="<?= $brochure('Asset 11.webp') ?>" alt="" loading="lazy"><p>Strengthen the<br>immune system</p></li>
            <li><img class="height-35-img" src="<?= $brochure('Asset 12.webp') ?>" alt="" loading="lazy"><p>Alleviate<br>fatigue</p></li>
            <li><img class="height-35-img" src="<?= $brochure('Asset 13.webp') ?>" alt="" loading="lazy"><p>Enhance cardiovascular<br>health</p></li>
            <li><img class="height-35-img" src="<?= $brochure('Asset 14.webp') ?>" alt="" loading="lazy"><p>Promote lung &amp; heart<br>regeneration</p></li>
            <li><img class="height-35-img" src="<?= $brochure('Asset 15.webp') ?>" alt="" loading="lazy"><p>Improve the quality<br>of sleep</p></li>
          </ul>
        </div>
      </div>

      <div class="overlay bottom">
        <h3 class="h3 mb-1 s6-content__title">Japanese Technology:<br><strong>V.3 Gen Microprocessor</strong></h3>
        <div class="d-flex gap-4">
          <img class="height-35-img" src="<?= $brochure('Asset 16.webp') ?>" alt="V3 Gen Microprocessor" loading="lazy">
          <p>The 3<sup>rd</sup> generation microprocessor offers swift responsiveness and precise adjustments to massage programs, elevating massage accuracy to an even higher level of precision and optimized system performance, all at your command.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 7 — OK -->
  <section class="full-image-frame s7">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 7.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">

    <div class="overlay bottom">
      <div class="d-flex ">
        <div class="s7-item">
          <div class="d-flex gap-2 align-items-center">
            <img class="height-120-img" src="<?= $brochure('Asset 17.webp') ?>" alt="Leg comfort icon" loading="lazy">
            <h3 class="h3">Leg Comfort<br>in Every Inch</h3>
          </div>
          <p class="mb-0">
            Experience full leg coverage with air pressure technology:
            Enjoy complete envelopment, releasing tension and restoring positive energy.
          </p>
        </div>

        <div class="s7-item">
          <div class="d-flex gap-2 align-items-center">
            <img class="height-120-img" src="<?= $brochure('Asset 18.webp') ?>" alt="3D Foot Gua Sha icon" loading="lazy">
            <h3 class="h3">Indulge in 3D<br>Foot Gua Sha</h3>
          </div>
          <p class="mb-0">
            Tailored rollers with varying bumps provide effective stimulation to reflex
              areas for ultimate foot relief.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 8 — OK -->
  <section class="full-image-frame">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 8.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true" />

    <div class="overlay">
      <h2 class="h2">Hybrid Pro Mechanism</h2>

      <div class="u-pos s8-subtitle">
        <p class="text-center">
          Best of both worlds, undeniable performance identical to a massage chair, in a charmingly smaller size
        </p>
      </div>

      <div class="u-pos s8-item-dur">
        <h3 class="h6">DURABILITY &amp; STABILITY</h3>
        <p class="m-0">Steel Structural Mechanism</p>
      </div>

      <div class="u-pos s8-item-mas">
        <h3 class="h6">MASSAGE SATISFACTION</h3>
        <p class="m-0">Massage Chair Performance</p>
      </div>
    </div>
  </section>

  <!-- 9 — OK -->
  <section class="full-image-frame">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 9.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">
    
    <div class="overlay">
      <h2 class="h2 mb-3">Revolutionary<br>Massage Techniques</h2>

      <div class="row mb-3">
        <div class="col-6 s9-item">
          <div class="d-flex align-items-center">
            <img class="height-300-img" src="<?= $brochure('Asset 21.webp') ?>" alt="" loading="lazy">
            <h3 class="h3">Dynamic Leg<br>Stretches</h3>
          </div>
          <p class="m-0">
            Experience ultimate comfort with a high-elastic stretch structure spring,
            allowing for customizable leg extension.
          </p>
        </div>
        <div class="col-6 s9-item">
          <div class="d-flex align-items-center">
            <img class="height-300-img" src="<?= $brochure('Asset 22.webp') ?>" alt="" loading="lazy">
            <h3 class="h3">Weightless Zero<br>Gravity Seating</h3>
          </div>
          <p class="m-0">
            Ease lumbar and spinal pressure as you enter a realm of pure 
            relaxation in our floating zero-gravity position.
          </p>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-6 s9-item">
          <div class="d-flex align-items-center">
            <img class="height-300-img" src="<?= $brochure('Asset 20.webp') ?>" alt="Extended Butt Massage Pathway" loading="lazy">
            <h3 class="h3">Extended Butt<br>Massage Pathway</h3>
          </div>
          <p class="m-0">
            From shoulders to hips, our full-body stretch 
            reinvigorates and revitalizes.
          </p>
        </div>
        <div class="col-6 s9-item">
          <div class="d-flex align-items-center">
            <img class="height-300-img" src="<?= $brochure('Asset 23.webp') ?>" alt="Space-Saving Design" loading="lazy">
            <h3 class="h3">Space-Saving<br>Design</h3>
          </div>
          <p class="m-0">
            Our massage chair employs slide rail technology when reclining, 
            minimizing space occupancy for your convenience.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 10 — OK -->
  <section class="full-image-frame">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 10.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">
    
    <div class="overlay bottom">
      <div class="mb-3">
        <h2 class="h2">Indulge in our<br>3D Massage System</h2>
        <p>Invigorate and unwind with a diverse range of techniques that mimic real human touch.</p>
      </div>

      <div class="row mb-3">
        <div class="col-4 text-center justify-items-center">
          <img class="height-120-img mb-2" src="<?= $brochure('Asset 24.webp') ?>" alt="Swedish massage illustration">
          <h3 class="h3">Discover Swedish Mastery</h3>
          <p class="mb-0">Experience the soothing embrace of rolling, kneading, and tapping.</p>
        </div>

        <div class="col-4 text-center justify-items-center">
          <img class="height-120-img mb-2" src="<?= $brochure('Asset 25.webp') ?>" alt="Kneading massage illustration">
          <h3 class="h3">Enjoy Kneading Bliss</h3>
          <p class="mb-0">Revolving kneading provides deep relaxation.</p>
        </div>

        <div class="col-4 text-center justify-items-center">
          <img class="height-120-img mb-2" src="<?= $brochure('Asset 26.webp') ?>" alt="Clapping massage illustration">
          <h3 class="h3">Feel the Light Clap</h3>
          <p class="mb-0">A gentle clapping sensation revitalizes your energy.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-4 text-center justify-items-center">
          <img class="height-120-img mb-2" src="<?= $brochure('Asset 27.webp') ?>" alt="Shiatsu massage illustration">
          <h3 class="h3">Experience Shiatsu Relief</h3>
          <p class="mb-0">Pressure techniques relieve tension effectively.</p>
        </div>

        <div class="col-4 text-center justify-items-center">
          <img class="height-120-img mb-2" src="<?= $brochure('Asset 28.webp') ?>" alt="Rolling massage illustration">
          <h3 class="h3">Savor the Rolling Technique</h3>
          <p class="mb-0">Push-back and deep soothing through rolling.</p>
        </div>

        <div class="col-4 text-center justify-items-center">
          <img class="height-120-img mb-2" src="<?= $brochure('Asset 29.webp') ?>" alt="Rhythmic tapping massage illustration">
          <h3 class="h3">Embrace Rhythmic Tapping</h3>
          <p class="mb-0">Let rhythmic strength rejuvenate your senses.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 11 — OK -->
  <section class="full-image-frame s11">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 11.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">
    
    <div class="overlay" aria-label="Tailored Massage Programs Just for You">
      <h2 class="h2 mb-3">Tailored Massage<br>Programs Just for You</h2>

      <!-- Top -->
      <div class="row">
        <div class="col-6 text-center justify-items-center">
          <img class="height-120-img" src="<?= $brochure('Asset 30.webp') ?>" alt="">
          <h3 class="h3">15 Exclusive Auto Programs</h3>
          <p>Experience meticulously designed massage programs crafted for your enjoyment, making selection quick and easy.</p>
        </div>
        
        <div class="col-6 text-center justify-items-center">
          <img class="height-120-img" src="<?= $brochure('Asset 31.webp') ?>" alt="">
          <h3 class="h3">6 Manual Options for Personalized Bliss</h3>
          <p>Tailor your massage experience to your preferences with our manual settings, ensuring an exclusive and adjustable session.</p>
        </div>
      </div>

      <!-- Bottom -->
      <div class="u-pos s11-intuitive max-width-40 text-center justify-items-center">
        <img class="height-120-img" src="<?= $brochure('Asset 33.png') ?>" alt="">
        <h4 class="h6">Intuitive Graphics for<br>Simple Operation</h4>
        <p>A graphical interface ensures straightforward and user-friendly control.</p>
      </div>

      <div class="u-pos s11-seamless max-width-40 text-center justify-items-center">
        <img class="height-120-img" src="<?= $brochure('Asset 34.png') ?>" alt="">
        <h4 class="h6">Seamless Bluetooth<br>Speaker Integration</h4>
        <p>Indulge in uninterrupted music or audio while you relax.</p>
      </div>

      <div class="u-pos s11-premium max-width-40 text-center justify-items-center">
        <img class="height-120-img" src="<?= $brochure('Asset 35.png') ?>" alt="">
        <h4 class="h6">Premium Anti-Scratch<br>Leather</h4>
        <p>Our chair boasts top-quality leather to protect against scratches.</p>
      </div>

      <div class="u-pos s11-convenient max-width-40 text-center justify-items-center">
        <img class="height-120-img" src="<?= $brochure('Asset 32.png') ?>" alt="">
        <h4 class="h6">Convenient USB<br>Charging for Devices</h4>
        <p>Keep your phone and tablet charged with built-in USB ports.</p>
      </div>
    </div>
  </section>

  <!-- 12 — OK -->
  <section class="full-image-frame">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 12.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">

    <div class="overlay">
      <h2 class="h2 mb-3">Features</h2>

      <!-- BODY RELIEF CATEGORY -->
      <div class="d-flex gap-3 align-items-center wrap-s12-items">
        <h3 class="h5">BODY RELIEF<br>CATEGORY</h3>

        <div class="row w-100">
          <div class="col-4 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 36.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Neck &amp; Shoulder</h4>
            <p>Targets strain in neck from prolonged</p>
          </div>

          <div class="col-4 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 37.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Waist &amp; Hip</h4>
            <p>Soothes away fatigue and soreness in lower back and waist</p>
          </div>

          <div class="col-4 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 38.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Spine Care</h4>
            <p>Relieve pressure in spine and joints</p>
          </div>
        </div>
      </div>

      <!-- Lifestyle Category -->
      <div class="d-flex gap-3 align-items-center wrap-s12-items">
        <h3 class="h5">LIFESTYLE<br>CATEGORY</h3>

        <div class="row w-100">
          <div class="col-3 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 39.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Work Relief</h4>
            <p>Targets strain in neck from prolonged</p>
          </div>

          <div class="col-3 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 40.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Recovery</h4>
            <p>Soothes away fatigue and soreness in lower back and waist</p>
          </div>

          <div class="col-3 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 41.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Thai Stretch</h4>
            <p>Full body massage that focuses on stretching and massaging the back</p>
          </div>

          <div class="col-3 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 42.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Fitness</h4>
            <p>After workout massage accompany with cool down stretches</p>
          </div>
        </div>
      </div>

      <!-- Family Category -->
      <div class="d-flex gap-3 align-items-center wrap-s12-items">
        <h3 class="h5">FAMILY<br>CATEGORY</h3>

        <div class="row w-100">
          <div class="col-4 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 43.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Gentle</h4>
            <p>Soothing and gentle massage</p>
          </div>

          <div class="col-4 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 44.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">For Him</h4>
            <p>Full body massage combination of mid to strong massage techniques</p>
          </div>

          <div class="col-4 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 45.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">For Her</h4>
            <p>Targets legs, arms and thighs to breakdown stubborn fatty cells</p>
          </div>
        </div>
      </div>

      <!-- Therapy Category -->
      <div class="d-flex gap-3 align-items-center wrap-s12-items">
        <h3 class="h5">THERAPY<br>CATEGORY</h3>

        <div class="row w-100">
          <div class="col-4 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 46.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Deep Tissue</h4>
            <p>Significant change in skin blood flow up to<br><span>81.32%</span></p>
          </div>

          <div class="col-4 text-center s12-item">
            <div class="s12-bubble height-120">
              <img class="height-60" src="<?= $brochure('Asset 47.webp') ?>" alt="" loading="lazy">
            </div>
            <h4 class="h6">Sweet Dream</h4>
            <p>Improve sleep quality and sleeping efficiency up to<br><span>88.73%</span></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 13 — OK -->
  <section class="full-image-frame s13">
    <img class="bg-img" src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 13.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">
    
    <div class="overlay">
      <div class="mb-3">
        <h2 class="h2">Smart Safety System</h2>
        <p class="m-0">Extra Safety</p>
      </div>

      <div class="row">
        <div class="col-6 text-center justify-items-center">
          <img class="height-120-img" src="<?= $brochure('Asset 48.webp') ?>" alt="">
          <h3 class="h3">Child Lock for Added Security</h3>
          <p>Ensure a secure environment with our child lock feature.</p>
        </div>
        
        <div class="col-6 text-center justify-items-center">
          <img class="height-120-img" src="<?= $brochure('Asset 49.webp') ?>" alt="">
          <h3 class="h3">Load Detection for Safety</h3>
          <p>
            Our chair is equipped with load detection technology, 
            automatically pausing if no load is detected for added safety.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 14 — OK -->
  <section class="full-image-frame">
    <img src="<?= $brochure('Ogawa V-Accent massage chair R3_Artboard 14.webp') ?>" alt="" loading="lazy" decoding="async" aria-hidden="true">
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
