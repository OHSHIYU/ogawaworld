<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-vista'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-vista/brochure.css') ?>">
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
      <h1 class="h1">OGAWA Vista</h1>
    </div>
  </section>

  <!-- 1 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('VISTA-E BROCHURE-01.webp') ?>"
      alt="OGAWA Vista"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 2 — OK -->
  <section class="full-image-frame">
    <img
      class="bg-img"
      src="<?= $brochure('VISTA-E BROCHURE-02.webp') ?>"
      alt="OGAWA Vista"
      loading="lazy"
      decoding="async"
      aria-hidden="true"
    >

    <div class="overlay">
      <div class="s2-title">
        <h2 class="h2">
          Modern life comes with its fair share of stress,
          and Vista is designed for everyone who needs
          a moment of relief:
        </h2>
      </div>

      <div class="u-pos max-width-20 s2-item s2-item-busy">
        <h3 class="h3">Busy Professionals</h3>
        <p>
          Ease work-related tension and long hours of sitting 
          with deep relaxation massage.
        </p>
      </div>

      <div class="u-pos max-width-20 s2-item s2-item-active">
        <h3 class="h3">Active Individuals &amp; Athletes</h3>
        <p>
          Support muscle recovery and improve flexibility post-workout.
        </p>
      </div>

      <div class="u-pos max-width-20 s2-item s2-item-parents">
        <h3 class="h3">Parents &amp; Caregivers</h3>
        <p>
          Relieve everyday stress and improve sleep with gentle, soothing therapy.
        </p>
      </div>

      <div class="u-pos max-width-20 s2-item s2-item-elderly">
        <h3 class="h3">Elderly &amp; Wellness Seekers</h3>
        <p>
          Enhance circulation, reduce stiffness, and improve 
          mobility with tailored programs.
        </p>
      </div>

      <div class="u-pos max-width-20 s2-item s2-item-sleep">
        <h3 class="h3">Sleep-Deprived Individuals</h3>
        <p>
          Unwind with sleep-enhancing modes designed 
          to calm the body and mind.
        </p>
      </div>
    </div>
  </section>

  <!-- 3 - TBC -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('VISTA-E BROCHURE-03.webp') ?>"
      alt="OGAWA Vista"
      aria-hidden="true"
      class="bg-img"
      decoding="async"
    >

    <div class="overlay" style="justify-self: center;">
      <h2 class="h2 section-heading mb-4 text-center">AI-Powered<br>Intelligent Technology</h2>

      <div class="mb-2">
        <h3 class="h3">Attentive Body Scan &amp; Auto Shoulder Detection</h3>
        <ul>
            <li>Uses precision AI technology to analyze body structure and adjust massage points accordingly.</li>
            <li>Automatically detects shoulder position for a customized experience.</li>
        </ul>
      </div>

      <div class="mb-2">
        <h3 class="h3">AI Voice Command Control</h3>
        <ul>
            <li>Enjoy hands-free control with intuitive voice commands.</li>
            <li>Simply say, “Start Deep Tissue Mode,” and let Vista do the rest.</li>
        </ul>
      </div>

      <div>
        <h3 class="h3">Personalized AI Recommendations</h3>
        <ul>
            <li>The <em>Today’s Recommendation</em> program scans muscle conditions for 5 minutes and suggests the best massage mode for you.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 4 — OK -->
  <section class="full-image-frame s4-wellness">
    <img
      class="bg-img"
      src="<?= $brochure('VISTA-E BROCHURE-04.webp') ?>"
      alt="OGAWA Vista"
      loading="lazy"
      decoding="async"
      aria-hidden="true"
    >

    <div class="overlay">
      <h2 class="h2 text-center mb-2 section-heading">Designed for Malaysians—<br>Exclusive Wellness Programs</h2>
      <p>
        Vista understands that every individual has unique needs. 
        That’s why it features three exclusive wellness programs,
        carefully designed to cater to Malaysians’ lifestyle and 
        health concerns:
      </p>

      <!-- Top left figure -->
      <figure class="u-pos s4-polaroid s4-polaroid--ladies">
        <div class="s4-4_5-photo" style="--photo:url('<?= $brochure('Asset 1.webp') ?>');"></div>
        <figcaption class="s4-caption">Ladies Mode</figcaption>
      </figure>

      <!-- Top right bullets -->
      <div class="u-pos max-width-40 s4-text s4-text-top">
        <ul>
          <li>Targets shoulder and lower back stiffness.</li>
          <li>Eases muscle fatigue and boosts flexibility.</li>
          <li>Promotes better posture.</li>
        </ul>
      </div>

      <!-- Middle right figure -->
      <figure class="u-pos max-width-40 s4-polaroid s4-polaroid--gents">
        <div class="s4-4_5-photo" style="--photo:url('<?= $brochure('Asset 2.webp') ?>');"></div>
        <figcaption class="s4-caption">Gentlemen Mode</figcaption>
      </figure>

      <!-- Middle left bullets -->
      <div class="u-pos max-width-40 s4-text s4-text-middle">
        <ul>
          <li>Focuses on the lower back and legs.</li>
          <li>Improves circulation and eases tension.</li>
          <li>Supports hormonal balance and stress relief.</li>
        </ul>
      </div>

      <!-- Bottom left figure -->
      <figure class="u-pos s4-polaroid s4-polaroid--swing">
        <div class="s4-4_3-photo" style="--photo:url('<?= $brochure('Asset 3.webp') ?>');"></div>
        <figcaption class="s4-caption">Swing Mode</figcaption>
      </figure>

      <!-- Bottom right bullets -->
       <div class="u-pos s4-text s4-text-bottom">
        <ul>
          <li>Gentle rocking motion for better sleep.</li>
          <li>Calms the nervous system.</li>
          <li>Ideal for relaxing and unwinding.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 5 - TBC -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('VISTA-E BROCHURE-05.webp') ?>"
      alt="OGAWA Vista"
      aria-hidden="true"
      class="bg-img"
      decoding="async"
    >

    <div class="overlay" style="justify-self: center;">
      <div class="mb-5">
        <h2 class="h2 section-heading text-center">Smart Safety for<br>Peace of Mind</h2>
        <p>
          We believe in well-being for the whole family, and safety is a priority.
        </p>
      </div>

      <div>
        <h3 class="h3">Child Lock Protection</h3>
        <ul>
            <li>Prevents accidental activation—simply press and hold for 5 seconds to unlock.</li>
            <li>Ensures a worry-free environment, even with little ones around.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 6 - OK -->
  <section class="full-image-frame" style="justify-items:center;">
    <img
      src="<?= $brochure('VISTA-E BROCHURE-06.webp') ?>"
      alt=""
      aria-hidden="true"
      class="bg-img"
      decoding="async"
    >

    <div class="overlay">
      <div class="container py-5">
          <div class="text-white text-center mb-5">
              <h2 class="h2 s5-title">Smart Safety for<br>Peace of Mind</h2>
          </div>

          <article class="s5-card mb-4">
              <h3 class="h3">Zero Wall Technology</h3>
              <ul class="s5-list">
                  <li>Designed for ocmpact spaces, requiring minimal wall clearance.</li>
                  <li>Perfect for modern Malaysian homes, offering maximum relaxation with minimal space consumption.</li>
              </ul>
          </article>

          <article class="s5-card mb-4">
              <h3 class="h3">Wireless Convenience</h3>
              <ul class="s5-list">
                  <li>Integrated wireless charging keeps your devices powered while you relax.</li>
              </ul>
          </article>

          <article class="s5-card mb-3">
              <h3 class="h3">Immersive Entertainment</h3>
              <ul class="s5-list">
                  <li>Built-in Bluetooth Speaker</li>
              </ul>
          </article>

          <article class="">
              <p class="text-white">
                  Discover the next level of massage technology with Vista.<br>
                  Experience relaxation,<br>
                  rejuvenation, and smart convenience all in one chair.
              </p>
          </article>
      </div>
    </div>
  </section>

  <section class="full-image-frame">
    <img
      src="<?= $brochure('VISTA-E BROCHURE-06.webp') ?>"
      alt="OGAWA Vista"
      aria-hidden="true"
      class="bg-img"
      decoding="async"
    >

    <div class="overlay" style="justify-self: center;">
      <h2 class="h2 section-heading mb-5 text-center">
        Smart Safety for<br>Peace of Mind
      </h2>

      <div class="mb-3">
        <div class="mb-3">
          <h3 class="h3">Zero Wall Technology</h3>
          <ul>
            <li>Designed for ocmpact spaces, requiring minimal wall clearance.</li>
            <li>Perfect for modern Malaysian homes, offering maximum relaxation with minimal space consumption.</li>
          </ul>
        </div>

        <div class="mb-3">
          <h3 class="h3">Wireless Convenience</h3>
          <ul>
              <li>Integrated wireless charging keeps your devices powered while you relax.</li>
          </ul>
        </div>

        <div class="mb-3">
          <h3 class="h3">Immersive Entertainment</h3>
          <ul>
              <li>Built-in Bluetooth Speaker</li>
          </ul>
        </div>
      </div>

      <div class="text-end">
        <p>
          Discover the next level of massage technology with Vista.<br>
          Experience relaxation, rejuvenation, and smart convenience all in one chair.
        </p>
      </div>
    </div>
  </section>

  <!-- 7 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('VISTA-E BROCHURE-07.webp') ?>"
      alt="OGAWA Vista"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
