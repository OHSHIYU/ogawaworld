<?php
// ========== SEO 标签设置 ==========
$seoOverride = [
    'title'       => 'OGAWA Pulse Plus - Body Vibration Platform for Wellness & Recovery',
    'description' => 'Experience Effortless Wellness with OGAWA Pulse Plus. Body vibration platform with 99 speed levels, 5 auto modes, full-body training, quiet motor, and convenient features for daily recovery.',
    'keywords'    => 'OGAWA, Pulse Plus, body vibration platform, vibration therapy, full-body training, wellness, recovery',
    'og_image'    => asset('img/pdp/ogawa-by-ogawa-pulse-plus/BROCHURE-01.webp'),
];

$GLOBALS['ogw_seo'] = array_merge($GLOBALS['ogw_seo'] ?? [], $seoOverride);

require VIEW_PATH . 'layout/header.php';
?>

<?php
$base = rtrim(asset('img/pdp/ogawa-by-ogawa-pulse-plus'), '/');
$img = function($file) use ($base) {
    return $base . '/' . rawurlencode($file);
};
?>

<link rel="canonical" href="https://ogawaworld.net/ogawa-by-ogawa-pulse-plus/">
<meta property="og:url" content="https://ogawaworld.net/ogawa-by-ogawa-pulse-plus/">
<meta property="og:type" content="product">
<meta property="og:title" content="<?= htmlspecialchars($seoOverride['title']) ?>">
<meta property="og:description" content="<?= htmlspecialchars($seoOverride['description']) ?>">
<meta property="og:image" content="<?= $seoOverride['og_image'] ?>">
<meta name="twitter:card" content="summary_large_image">

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-by-ogawa-pulse-plus/brochure.css') ?>">

<div class="main">

<!-- 1. 封面 -->
<section class="full-image with-text">
    <img src="<?= $img('BROCHURE-01.webp') ?>" alt="Pulse Plus" class="bg-img">
    <div class="text-overlay brochure-1">
        <div class="pulse-icon">
            <img src="<?= $img('Asset 1.webp') ?>" alt="pulse">
        </div>
        <h1 class="main-title">Effortless Wellness, Every Day</h1>
        <p class="main-desc">Experience a new way to relax and recharge with our body vibration platform.</p>
        <p class="sub-desc">Designed to gently stimulate muscles and support blood circulation, it helps relieve daily fatigue and restore comfort to your body.</p>
    </div>
</section>

<!-- 2. 第二面 -->
<section class="full-image with-text">
    <img src="<?= $img('BROCHURE-02.webp') ?>" alt="Pulse Plus" class="bg-img">
    <div class="text-overlay brochure-2">
        <div class="top-text">
            <h2 class="title-2">Train Like Real Sports</h2>
            <p class="subtitle-2">Choose from 99 adjustable speed levels to match your fitness goal</p>
        </div>
        <div class="pulse-icon-2">
            <img src="<?= $img('Asset 2.webp') ?>" alt="pulse icon">
        </div>
    </div>
</section>

<!-- 3. 第三面（单色背景） -->
<section class="pulse-section-3">
    <div class="section-content-3">
        <h2 class="title-3">Train Like Real Sports</h2>
        <p class="subtitle-3">5 Automatic Fitness Modes. Experience vibration patterns that simulate real exercises</p>
        
        <div class="modes-grid">
            <div class="mode-item">
                <img src="<?= $img('Asset 3.webp') ?>" alt="Relax">
                <span>Relax</span>
            </div>
            <div class="mode-item">
                <img src="<?= $img('Asset 4.webp') ?>" alt="Walking">
                <span>Walking</span>
            </div>
            <div class="mode-item">
                <img src="<?= $img('Asset 5.webp') ?>" alt="Gymnastics">
                <span>Gymnastics</span>
            </div>
            <div class="mode-item">
                <img src="<?= $img('Asset 6.webp') ?>" alt="Jump Rope">
                <span>Jump Rope</span>
            </div>
            <div class="mode-item">
                <img src="<?= $img('Asset 7.webp') ?>" alt="Jogging">
                <span>Jogging</span>
            </div>
        </div>
    </div>
</section>

<!-- 4. 第四面 -->
<section class="full-image with-text">
    <img src="<?= $img('BROCHURE-04.webp') ?>" alt="Pulse Plus" class="bg-img">
    <div class="text-overlay brochure-4">
        <div class="right-content">
            <h2 class="title-4">Control Your Workout Naturally</h2>
            <p class="desc-4">Adjust intensity simply by changing your body position. No complicated settings, just move and feel the difference.</p>
        </div>
    </div>
</section>

<!-- 5. 第五面 -->
<section class="full-image with-text">
    <img src="<?= $img('BROCHURE-05.webp') ?>" alt="Pulse Plus" class="bg-img">
    <div class="text-overlay brochure-5">
        <div class="left-content">
            <h2 class="title-5">Full-Body Training on One Platform</h2>
            <p class="desc-5">Pulse Plus allows you to perform a variety of exercises using just one device.</p>
            <p class="desc-5">From stretching to core workouts, you can easily switch positions to target different muscle groups for a complete full-body workout.</p>
        </div>
    </div>
</section>

<!-- 6. 第六面 -->
<section class="full-image with-text">
    <img src="<?= $img('BROCHURE-06.webp') ?>" alt="Pulse Plus" class="bg-img">
    <div class="text-overlay brochure-6">
        <div class="left-content">
            <h2 class="title-6">Quiet Workout, Zero Disturbance</h2>
            <p class="desc-6">Designed with a quiet motor system, Pulse Plus creates a peaceful exercise environment, and you can work out anytime without disturbing your family.</p>
        </div>
    </div>
</section>

<!-- 7. 第七面 -->
<section class="pulse-section-7">
    <div class="section-content-7">
        <h2 class="title-7">Built for Everyday Convenience</h2>
        
        <div class="features-grid-7">
            <div class="feature-item-7">
                <img src="<?= $img('Asset 8.webp') ?>" alt="Wireless controller">
                <span>Wireless controller</span>
            </div>
            <div class="feature-item-7">
                <img src="<?= $img('Asset 9.webp') ?>" alt="Multi-function touch smart LED display">
                <span>Multi-function touch smart LED display</span>
            </div>
            <div class="feature-item-7">
                <img src="<?= $img('Asset 10.webp') ?>" alt="Rubber suction base">
                <span>Rubber suction base</span>
            </div>
            <div class="feature-item-7">
                <img src="<?= $img('Asset 11.webp') ?>" alt="Stable operation">
                <span>Stable operation, no damage to the floor</span>
            </div>
        </div>
    </div>
</section>

<!-- 8. 规格参数（纯图片） -->
<section class="full-image">
    <img src="<?= $img('BROCHURE-08.webp') ?>" alt="Specifications" class="bg-img">
</section>

</div>

<?php require VIEW_PATH . 'layout/footer.php'; ?>