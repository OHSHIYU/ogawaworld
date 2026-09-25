<link rel="stylesheet" href="<?= asset('css/technology.css') ?>">
<link rel="stylesheet" href="<?= asset('css/vbar.css') ?>">
<link rel="stylesheet" href="<?= asset('css/float.css') ?>">

<!-- =========================
     1) Powered Section
========================== -->
<section class="powered">
  <div class="powered__bg" aria-hidden="true"></div>

  <!-- Left hero image -->
  <picture class="powered__left-media fx-float-y" aria-hidden="true">
    <source srcset="<?= asset('img/technology/tech-img1.avif') ?>" type="image/avif">
    <img
      src="<?= asset('img/technology/tech-img1.avif') ?>"
      alt="Ogawa massage chair demonstration"
      loading="eager"
      decoding="async"
      fetchpriority="high"
    />
  </picture>

  <!-- Right content -->
  <div class="powered__rail container">

    <img
      class="powered__badge"
      src="<?= asset('img/technology/overseer-logo.avif') ?>"
      alt="Powered by Overseer™"
      width="820"
      height="120"
    />

    <div class="powered__text">
      <h2>IMAGINE BETTER LIVING<br>WITH OGAWA</h2>
      <p>
        Explore our range of innovative massage chairs designed to elevate your relaxation
        experience. This is the perfect place to expand on our mission and the unique features
        of our massage chairs.
      </p>
    </div>
  </div>
</section>

<!-- =========================
     2) Art & Science Section
========================== -->
<section class="artscience">
  <div class="artscience__bg" aria-hidden="true"></div>

  <div class="artscience__inner container">

    <!-- Copy -->
    <div class="artscience__copy vbar-track">
      <p class="artscience__eyebrow">
        ART &amp; SCIENCE OF OGAWA CHAIRS
      </p>

      <p class="artscience__lead">
        Experience the epitome of relaxation with our Ogawa Massage Chair.
        Utilizing advanced perception-enabled technology, this massage
        chair offers a fully customizable experience tailored to your
        individual needs. It's massage reimagined.
      </p>
    </div>

    <!-- Image -->
    <picture class="artscience__media fx-float-y" aria-hidden="true">
      <source srcset="<?= asset('img/technology/tech-img2.avif') ?>" type="image/avif">
      <source srcset="<?= asset('img/technology/tech-img2.webp') ?>" type="image/webp">
      <img
        src="<?= asset('img/technology/tech-img2.png') ?>"
        alt="Advanced massage technology illustration"
        loading="lazy"
        decoding="async"
      />
    </picture>

  </div>
</section>

<!-- =========================
     3) Overseer Section
========================== -->
<section class="overseer">
  <div class="overseer__bg" aria-hidden="true"></div>

  <div class="overseer__inner container">

    <!-- Left -->
    <div class="overseer__left">

      <picture>
        <source srcset="<?= asset('img/technology/overseer-logo2.avif') ?>" type="image/avif">
        <img
          class="overseer__logo"
          src="<?= asset('img/technology/overseer-logo2.avif') ?>"
          alt="OVERSEER™ by OGAWA"
          loading="lazy"
          decoding="async"
        />
      </picture>

      <div class="overseer__text">
        <p>
          Customise massage programmes that are tailored to the body’s specific needs.
        </p>
      </div>

    </div>

    <!-- Right image -->
    <picture class="overseer__media fx-float-y" aria-hidden="true">
      <source srcset="<?= asset('img/technology/tech-img3.avif') ?>" type="image/avif">
      <img
        src="<?= asset('img/technology/tech-img3.avif') ?>"
        alt="Overseer technology benefits graphic"
        loading="lazy"
        decoding="async"
      />
    </picture>

  </div>
</section>

<!-- =========================
     4) Core Tech Section
========================== -->
<section class="coretech">
  <div class="coretech__bg" aria-hidden="true"></div>

  <div class="coretech__inner container">

    <!-- Copy -->
    <div class="coretech__copy vbar-track vbar-dark">

      <p class="coretech__eyebrow">
        OGAWA CORE Technology
      </p>

      <p class="coretech__lead">
        Take control of your relaxation with the Ogawa Wellness mobile app.
        Seamlessly control your massage chair, personalize your massage programs,
        and access real-time wellness insights for a truly immersive experience.
      </p>

    </div>

    <!-- Image -->
    <picture class="coretech__media fx-float-y" aria-hidden="true">
      <source srcset="<?= asset('img/technology/tech-img4.avif') ?>" type="image/avif">
      <img
        src="<?= asset('img/technology/tech-img3.avif') ?>"
        alt="Exploded view of Ogawa CORE drive components"
        loading="lazy"
        decoding="async"
      />
    </picture>

  </div>
</section>
