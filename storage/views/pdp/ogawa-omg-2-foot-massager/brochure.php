<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-omg-2-foot-massager'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-omg-2-foot-massager/brochure.css') ?>">
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
  <section class="p-4 bg">
    <h1 class="h1 fw-bold text-white text-center">OgawaOMG 2 Foot Massager Silver Grey</h1>
  </section>

  <!-- 1 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OMG 2.0 E-BROCHURE——ORI-01.webp') ?>"
      alt="OGAWA O.M.G 2 Foot Massager"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 2 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OMG 2.0 E-BROCHURE——ORI-02.webp') ?>"
      alt="OGAWA O.M.G 2 Foot Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <h2 class="section-heading h2">WELL-SUITED FOR</h2>

      <div class="s2-item u-pos" style="--pos-top: 21%; --pos-right: 8%;">
        <h3 class="h3">The Workaholic</h3>
        <ul>
          <li>
            For busy professionals, acupressure on the forefoot and arch boosts
            circulation, reduces fatigue, and enhances well-being.
          </li>
        </ul>
      </div>

      <div class="s2-item u-pos" style="--pos-top: 42%; --pos-left: 8%;">
        <h3 class="h3">The Fitness Fanatic</h3>
        <ul>
          <li>
            Thermal massage therapy and airbag compression provide
            instant relief by reducing muscle swelling.
          </li>
        </ul>
      </div>

      <div class="s2-item u-pos" style="--pos-bottom: 28%; --pos-right: 8%;">
        <h3 class="h3">The Shoppers</h3>
        <ul>
          <li>
            Instantly relieves forefoot and ankle pain,
            keeping shoppers comfortable on the go.
          </li>
        </ul>
      </div>

      <div class="s2-item u-pos" style="--pos-bottom: 5%; --pos-left: 8%;">
        <h3 class="h3">Insomia</h3>
        <ul>
          <li>
            A powerful therapeutic massager promotes relaxation and better
            sleep, helping ease insomia.
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 3 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OMG 2.0 E-BROCHURE——ORI-03.webp') ?>"
      alt="OGAWA O.M.G 2 Foot Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay">
      <div class="d-flex s3_4-item mb-3" style="align-items: center;">
        <img class="me-2 height-120-img" src="<?= $brochure('Asset 1.webp') ?>" alt="Ionizer">

        <div>
          <h3 class="h3 font-brown">Ionizer</h3>
          <p class="font-light-brown">
            Experience the ultimate in foot care with the OGAWA O.M.G 2, now enhanced with advanced Ionizer
            technology. Designed to help neutralize odors and keep your feet feeling fresh, this innovative
            feature pairs perfectly with soothing massage functions to relieve tension and rejuvenate 
            tired feet. Enjoy a cleaner, more refreshing foot therapy every day.
          </p>
        </div>
      </div>

      <div class="d-flex s3_4-item mb-3" style="align-items: center;">
        <img class="me-2 height-120-img" src="<?= $brochure('Asset 2.webp') ?>" alt="Thermotherapy">

        <div>
          <h3 class="h3 font-brown">Thermotherapy - 45 Degrees Comforting Heat</h3>
          <p class="font-light-brown">
            Heat therapy from the base of the feet for a complete muscle
            rejuvenation. Say goodbye to cold feet, promotes relaxation 
            for a night of sweet dreams.
          </p>
        </div>
      </div>

      <div class="d-flex s3_4-item mb-3" style="align-items: center;">
        <img class="me-2 height-120-img" src="<?= $brochure('Asset 3.webp') ?>" alt="Airbag Compression Massage">

        <div>
          <h3 class="h3 font-brown">Airbag Compression Massage</h3>
          <p class="font-light-brown">
            The compression further provides a deep layer of massage and 
            locks the feet in position for a more effective feet
            kneading for total relaxation experience.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 4 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OMG 2.0 E-BROCHURE——ORI-04.webp') ?>"
      alt="OGAWA O.M.G 2 Foot Massager"
      class="bg-img"
      loading="eager"
      decoding="async"
    >

    <div class="overlay s4-overlay">
      <h2 class="section-heading h2 mb-4">MASSAGE PROGRAMS & BENEFITS</h2>

      <div class="d-flex s3_4-item mb-3" style="align-items: center;">
        <img class="me-2 height-120-img" src="<?= $brochure('Asset 4.webp') ?>" alt="Scrapping Motion">

        <div class="font-white">
          <h3 class="h3">Scrapping Motion</h3>
          <p>2 frontal rollers help improves circulation and speed up relaxation.</p>
        </div>
      </div>

      <div class="d-flex s3_4-item mb-3" style="align-items: center;">
        <img class="me-2 height-120-img" src="<?= $brochure('Asset 5.webp') ?>" alt="Gua Sha Foot Reflexology">

        <div class="font-white">
          <h3 class="h3">Gua Sha Foot Reflexology</h3>
          <p>
            Focus on blood circulation, reduce stress, enhance overall
            relaxation and well-being.
          </p>
        </div>
      </div>

      <div class="d-flex s3_4-item mb-3" style="align-items: center;">
        <img class="me-2 height-120-img" src="<?= $brochure('Asset 6.webp') ?>" alt="Precise Rollers">

        <div class="font-white">
          <h3 class="h3">Precise Rollers</h3>
          <p>Build-in humanlike sensation rollers which precisely pinpoint the acupoint.</p>
        </div>
      </div>

      <div class="d-flex s3_4-item mb-3" style="align-items: center;">
        <img class="me-2 height-120-img" src="<?= $brochure('Asset 7.webp') ?>" alt="Light and Easy">

        <div class="font-white">
          <h3 class="h3">Light and Easy</h3>
          <p>Lightweight and easy to use, featuring six automatic programs for effortless operation.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 5 -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OMG 2.0 E-BROCHURE——ORI-05.webp') ?>"
      alt="OGAWA O.M.G 2 Foot Massager"
      loading="eager"
      decoding="async"
    >
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
