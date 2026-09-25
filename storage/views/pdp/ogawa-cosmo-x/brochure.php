<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-cosmo-x'), '/');

$brochure = function (string $filename) use ($base): string {
    return $base . '/' . rawurlencode($filename);
};
?>

<link
    rel="stylesheet"
    href="<?= asset('css/pdp/responsive.css') ?>"
>
<link
    rel="stylesheet"
    href="<?= asset('css/pdp/ogawa-cosmo-x/brochure.css') ?>"
>

<?php
require VIEW_PATH . 'pdp/shared/font-loader.php';

$fontManifest = require __DIR__ . '/fonts.php';

ogw_preload_product_fonts($base, $fontManifest);
ogw_print_product_font_faces($base, $fontManifest);
?>

<div class="main cosmo-brochure">

    <!-- =====================================================
         PAGE 01 — HERO AND INTRODUCTION
    ====================================================== -->
    <section class="s1" aria-label="OGAWA COSMO X introduction">

        <div class="s1-visual">
            <img
                src="<?= htmlspecialchars(
                    $brochure('01.webp'),
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>"
                alt="OGAWA COSMO X massage chairs — X-PLORE. X-CITE. X-CEED."
                class="s1-image"
                loading="eager"
                fetchpriority="high"
                decoding="async"
            >
        </div>

        <div class="s1-intro">
            <p class="s1-copy">
                Cosmo X introduces a new era of intelligent comfort.<br class="s1-desktop-break">
                Designed to understand your body, it delivers deeper, more responsive relaxation through advanced<br class="s1-desktop-break">
                sensing, precision biomechanics and modern recovery innovation.
            </p>
        </div>

    </section>

    <!-- =====================================================
     PAGE 02 — X-PLORE
====================================================== -->
<section class="s2" aria-labelledby="cosmo-s2-title">

    <img
        src="<?= htmlspecialchars(
            $brochure('02.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="COSMO X transparent massage chair showing its internal massage mechanism"
        class="s2-image"
        loading="lazy"
        decoding="async"
    >

    <div class="s2-intro">
        <h2 id="cosmo-s2-title" class="s2-title">X-PLORE</h2>

        <p class="s2-description">
            Cosmo X explores your body’s fatigue<br class="s2-desktop-break">
            patterns through Precison Technology,<br class="s2-desktop-break">
            analysing muscle tension, posture<br class="s2-desktop-break">
            pressure and recovery behaviour<br class="s2-desktop-break">
            in real time.
        </p>
    </div>

    <div class="s2-feature">
        <h3 class="s2-feature-title">
            INTELLIGENT BODY<br>
            FATIGUE MAPPING
        </h3>

        <p class="s2-description">
            Real-time sensing detects<br class="s2-desktop-break">
            tension zones for more precise<br class="s2-desktop-break">
            massage delivery.
        </p>
    </div>

</section>
<!-- =====================================================
     PAGE 03 — PRECISION TECHNOLOGY / MASSAGE PROGRAMMES
====================================================== -->
<section class="s3" aria-label="COSMO X precision technology and massage programmes">

    <div class="s3-row s3-row-top">

        <img
            src="<?= htmlspecialchars(
                $brochure('03.webp'),
                ENT_QUOTES,
                'UTF-8'
            ) ?>"
            alt="Close-up of the COSMO X precision massage roller mechanism"
            class="s3-image"
            loading="lazy"
            decoding="async"
        >

        <div class="s3-mechanism">
            <h2 class="s3-title">X PRO MECHANISM</h2>
            <p class="s3-subtitle">PRECISION TECHNOLOGY</p>

            <p class="s3-copy">
                Next-Gen Precision Engine. Advanced roller
                engineering works in synergy with intelligent
                precision control to target aching areas more
                effectively, improving massage targeting accuracy
                by up to 75%.
            </p>
        </div>

    </div>

    <div class="s3-row s3-row-bottom">

        <div class="s3-programmes">
            <h2 class="s3-programmes-title">
                WORLD'S FINEST,<br>
                IN THE COMFORT OF YOUR HOME.
            </h2>

            <p class="s3-copy">
                Indulge in a remarkable variety of massage
                experiences, brought together through the
                World Signature and Cosmopolitan Series. From
                Chinese Tui Na and Western Chiro to Japanese
                Zen and Thai Heritage, each programme is
                uniquely crafted to support recovery, restore
                balance, and elevate everyday comfort.
            </p>

            <p class="s3-copy s3-closing">
                Massage experience that's Uniquely Personal,
                Globally Inspired.
            </p>
        </div>

        <img
            src="<?= htmlspecialchars(
                $brochure('04.webp'),
                ENT_QUOTES,
                'UTF-8'
            ) ?>"
            alt="Using the COSMO X touchscreen to select a massage programme"
            class="s3-image"
            loading="lazy"
            decoding="async"
        >

    </div>

</section>

<!-- =====================================================
     PAGE 04 — X-CITE
====================================================== -->
<section class="s4" aria-label="COSMO X Flex Technology">
    <img
        src="<?= htmlspecialchars(
            $brochure('COSMOX BROCHURE-4.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="COSMO X X-CITE — 540° All Motion FlexStretch with 360° rotational stretch, 180° vertical stretch and thermotherapy"
        class="s4-image"
        loading="lazy"
        decoding="async"
    >
</section>

<!-- =====================================================
     PAGE 05 — X-CITE / FLEX TECHNOLOGY
====================================================== -->
<section class="s5" aria-labelledby="cosmo-s5-title">

    <img
        src="<?= htmlspecialchars(
            $brochure('05-01.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="COSMO X footrest with 360° rotational flex and 180° vertical stretch"
        class="s5-image s5-image-top"
        loading="lazy"
        decoding="async"
    >

    <div class="s5-intro">
        <h2 id="cosmo-s5-title" class="s5-title">X-CITE</h2>

        <p class="s5-intro-copy">
            Cosmo X excites the senses with
            new-generation comfort innovations
            designed to activate circulation, improve
            flexibility and deliver a more uplifting,
            revitalising relaxation experience.
        </p>
    </div>

    <img
        src="<?= htmlspecialchars(
            $brochure('05-02.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="Footrest showing rotary flex motion and vertical stretch movement"
        class="s5-image s5-image-bottom"
        loading="lazy"
        decoding="async"
    >

    <div class="s5-details">
        <div class="s5-flex">
            <h3 class="s5-heading">FLEX TECHNOLOGY</h3>

            <p class="s5-subheading">
                540° ALL MOTION FLEXSTRETCH
            </p>

            <p class="s5-copy">
                Powered by 360° Rotational Stretch and 180° Vertical
                Stretch, Flex Technology Signature Reflexology creates a
                dynamic FlexStretch experience inspired by Thai stretch
                therapy and traditional reflexology techniques, delivering
                optimal benefits that enhance flexibility and circulation.
            </p>
        </div>

        <div class="s5-thermo">
            <h3 class="s5-heading">THERMOTHERAPY</h3>

            <p class="s5-copy">
                Delivers targeted warmth to key tension areas, helping to
                loosen muscles, improve circulation and deepen overall
                relaxation for a more soothing therapeutic experience.
            </p>
        </div>
    </div>

</section>
<!-- =====================================================
     PAGE 06 — FULL BROCHURE IMAGE
====================================================== -->
<section class="s6" aria-label="COSMO X brochure page 6">
    <img
        src="<?= htmlspecialchars(
            $brochure('COSMOX BROCHURE-6.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="OGAWA COSMO X — brochure page 6"
        class="s6-image"
        loading="lazy"
        decoding="async"
    >
</section>


<!-- =====================================================
     PAGE 07 — X-CEED
====================================================== -->
<section class="s7" aria-labelledby="cosmo-s7-title">

    <img
        src="<?= htmlspecialchars(
            $brochure('06.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="Two OGAWA COSMO X massage chairs viewed from above"
        class="s7-image"
        loading="lazy"
        decoding="async"
    >

    <div class="s7-content">
        <h2 id="cosmo-s7-title" class="s7-title">X-CEED</h2>

        <p class="s7-copy">
            Cosmo X exceeds conventional massage performance<br class="s7-desktop-break">
            through precision biomechanics and enhanced<br class="s7-desktop-break">
            comfort engineering designed to deliver lighter,<br class="s7-desktop-break">
            deeper and more effortless relaxation.
        </p>
    </div>

</section>

<!-- =====================================================
     PAGE 08 — PERSONALISED MASSAGE CUSTOMISATION
====================================================== -->
<section class="s8" aria-labelledby="cosmo-s8-title">

    <div class="s8-content">
        <h2 id="cosmo-s8-title" class="s8-title">
            PERSONALISED<br>
            MASSAGE<br>
            CUSTOMISATION
        </h2>

        <p class="s8-copy">
            Experience up to 99% enhanced<br class="s8-desktop-break">
            customisation freedom, allowing you to<br class="s8-desktop-break">
            dynamically adjust massage<br class="s8-desktop-break">
            techniques, intensity and focus zones in<br class="s8-desktop-break">
            real time for a therapy experience<br class="s8-desktop-break">
            precisely tailored to your comfort needs.
        </p>
    </div>

    <img
        src="<?= htmlspecialchars(
            $brochure('07.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="OGAWA COSMO X massage chair with touchscreen controller"
        class="s8-image"
        loading="lazy"
        decoding="async"
    >

</section>

<!-- =====================================================
     PAGE 09 — ENHANCED ZERO-GRAVITY ELEVATION+
====================================================== -->
<section class="s9" aria-labelledby="cosmo-s9-title">

    <div class="s9-content">
        <h2 id="cosmo-s9-title" class="s9-title">
            ENHANCED<br>
            ZERO-GRAVITY<br>
            ELEVATION+
        </h2>

        <p class="s9-copy">
            A deeper weightless<br class="s9-desktop-break">
            recline redistributes<br class="s9-desktop-break">
            spinal pressure and<br class="s9-desktop-break">
            supports full-body<br class="s9-desktop-break">
            relaxation in a more<br class="s9-desktop-break">
            natural floating posture.
        </p>
    </div>

    <img
        src="<?= htmlspecialchars(
            $brochure('08.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="OGAWA COSMO X in a reclined position, illustrated floating among stones"
        class="s9-image"
        loading="lazy"
        decoding="async"
    >

</section>

<!-- =====================================================
     PAGE 10 — REFINED LIVING
====================================================== -->
<section class="s10" aria-label="COSMO X design and comfort">

    <div class="s10-content">
        <p class="s10-copy">
            A serene sanctuary crafted to<br class="s10-desktop-break">
            elevate everyday comfort, where a<br class="s10-desktop-break">
            lounge-inspired presence meets<br class="s10-desktop-break">
            the essence of refined living.
        </p>
    </div>

    <img
        src="<?= htmlspecialchars(
            $brochure('09.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="OGAWA COSMO X with a model, and close-ups of the upholstery, speaker and headrest"
        class="s10-image"
        loading="lazy"
        decoding="async"
    >

</section>
<!-- =====================================================
     PAGE 11 — FULL BROCHURE IMAGE
====================================================== -->
<section class="s11" aria-label="COSMO X brochure page 11">
    <img
        src="<?= htmlspecialchars(
            $brochure('COSMOX BROCHURE-11.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="OGAWA COSMO X — brochure page 11"
        class="s11-image"
        loading="lazy"
        decoding="async"
    >
</section>

<!-- =====================================================
     PAGE 12 — FULL BROCHURE IMAGE
====================================================== -->
<section class="s12" aria-label="COSMO X brochure page 12">
    <img
        src="<?= htmlspecialchars(
            $brochure('COSMOX BROCHURE-12.webp'),
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
        alt="OGAWA COSMO X — brochure page 12"
        class="s12-image"
        loading="lazy"
        decoding="async"
    >
</section>
</div>

<?php
include __DIR__ . '/../../../../app/services/schema-product-generic.php';
require VIEW_PATH . 'layout/footer.php';
?>