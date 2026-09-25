<?php
$seoOverride = [
    'title'       => 'OGAWA VIVACÉ - Smart Massage Chair for Modern Living',
    'description' => 'OGAWA VIVACÉ - Smart, stylish, and designed for real working lives.',
];

$GLOBALS['ogw_seo'] = array_merge($GLOBALS['ogw_seo'] ?? [], $seoOverride);

require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-vivace'), '/');
$brochure = function(string $filename) use ($base) {
    return $base . '/' . rawurlencode($filename);
};

// 字体加载
require VIEW_PATH . 'pdp/shared/font-loader.php';
$fontManifest = @include __DIR__ . '/fonts.php';

if (is_array($fontManifest)) {
    ogw_preload_product_fonts($base, $fontManifest);
    ogw_print_product_font_faces($base, $fontManifest);
}
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-vivace/brochure.css') ?>">

<div class="main">

    <!-- 第1面：封面（纯图片） -->
    <section class="full-image page-1">
        <img src="<?= $brochure('BROCHURE-01.webp') ?>" alt="VIVACÉ" class="bg-img">
    </section>

    <!-- 第2面 -->
    <section class="full-image with-text page-2">
        <img src="<?= $brochure('BROCHURE-02.webp') ?>" alt="MEET VIVACÉ" class="bg-img">
        <div class="text-overlay left-center">
            <h2 class="title-2">MEET VIVACÉ</h2>
            <h3 class="subtitle-2">SMART, STYLISH, AND DESIGNED FOR<br>REAL WORKING LIVES</h3>
            <p class="desc-2">Long hours. Daily stress. Limited time. VIVACÉ fits right into your routine, bringing professional-grade recovery home, without the premium barrier.</p>
        </div>
    </section>

    <!-- 第3面 -->
    <section class="full-image with-text page-3">
        <img src="<?= $brochure('BROCHURE-03.webp') ?>" alt="BIOSENSOR" class="bg-img">
        <div class="text-overlay right-60">
            <div class="right-content">
                <h2 class="title-3">BIOSENSOR</h2>
                <h3 class="subtitle-3">WELLNESS TAILORED TO YOUR BODY</h3>
                <p class="desc-3">With its integrated Bio Sensor technology, VIVACÉ reads your body's blood pressure and pulse data, then intelligently calibrates the ideal massage program to release your tension.</p>
                <p class="desc-3">This system scans the body using a soft magnetic field to map pressure points with high accuracy without physical contact. This data allows the system to automatically adjust pressure, intensity, and focus, delivering a fully personalized massage experience exactly when your body needs it most.</p>
            </div>
        </div>
    </section>

    <!-- 第4面 -->
    <section class="full-image with-text page-4">
        <img src="<?= $brochure('BROCHURE-04.webp') ?>" alt="AI INTELLIGENCE SENSOR" class="bg-img">
        <div class="text-overlay left-center">
            <h2 class="title-4">AI INTELLIGENCE SENSOR</h2>
            <h3 class="subtitle-4">COMFORT, ELELVATED BY INTELLIGENCE</h3>
            <p class="desc-4">The VIVACÉ AI Intelligence Sensor automatically adapts to your height and posture the moment you sit. Its smart detection system ensures every massage begins with perfect alignment, and pauses instantly when you're away. Safety, comfort, and intelligence, refined into one seamless experience.</p>
        </div>
    </section>

    <!-- 第5面 -->
    <section class="full-image with-text page-5">
        <img src="<?= $brochure('BROCHURE-05.webp') ?>" alt="AI VOICE RECOGNITION" class="bg-img">
        <div class="text-overlay left-align">
            <h2 class="title-5">AI VOICE RECOGNITION</h2>
            <h3 class="subtitle-5">JUST SAY IT, VIVACÉ RESPONDS</h3>
            <p class="desc-5">No need to lift a finger. VIVACÉ supports intuitive voice command control, allowing you to start, stop, or switch programs effortlessly, perfect for young, busy lifestyles.</p>
            
        </div>
    </section>

    <!-- 第6面 -->
    <section class="full-image with-text page-6">
        <img src="<?= $brochure('BROCHURE-06.webp') ?>" alt="360° AIR NERGY" class="bg-img">
        <div class="text-overlay right-60">
            <div class="right-content">
                <h2 class="title-6">360° AIR NERGY</h2>
                <h3 class="subtitle-6">ALL-ROUND FULL-BODY COVERAGE</h3>
                <p class="desc-6">Airbags wrap your body from shoulders to feet, giving full 360° compression massage. Even your feet enjoy complete airbag coverage.</p>
            </div>
        </div>
    </section>

 <!-- 第7面：XD ROLLER -->
<section class="full-image with-text page-7">
    <img src="<?= $brochure('BROCHURE-07.webp') ?>" alt="XD ROLLER" class="bg-img">
    <div class="text-overlay">
        <h2 class="title-7">XD ROLLER</h2>
        <h3 class="subtitle-7">PRECISION MASSAGE, HUMAN FEEL</h3>
        
        <div class="features-grid-7">
            <div class="feature-item-7">
                <img src="<?= $brochure('Asset 1.webp') ?>" alt="Accuracy">
                <h4>Accuracy</h4>
                <p>Precisely targets tension areas.</p>
            </div>
            <div class="feature-item-7">
                <img src="<?= $brochure('Asset 2.webp') ?>" alt="Controlled Intensity">
                <h4>Controlled Intensity</h4>
                <p>Smooth, adjustable strength for every preference.</p>
            </div>
            <div class="feature-item-7">
                <img src="<?= $brochure('Asset 3.webp') ?>" alt="Stability">
                <h4>Stability</h4>
                <p>Consistent and reliable movement for every stroke.</p>
            </div>
            <div class="feature-item-7">
                <img src="<?= $brochure('Asset 4.webp') ?>" alt="Human Feel">
                <h4>Human Feel</h4>
                <p>Designed to replicate real therapist techniques. Ensures every massage feels naturally comforting and deeply effective.</p>
            </div>
        </div>
    </div>
</section>
    <!-- 第8面 -->
    <section class="full-image with-text page-8">
        <img src="<?= $brochure('BROCHURE-08.webp') ?>" alt="TRACK THAT KNOWS YOU" class="bg-img">
        <div class="text-overlay left-align">
            <h2 class="title-8">TRACK THAT KNOWS YOU</h2>
            <p class="desc-8">No two bodies are the same. VIVACÉ gets it. The Smart SL Track Pro follows your spine's natural curve from neck to hamstring, for relief that's perfectly precise. The glider structure allows extreme stretching and 170° lying flat to help you sleep.</p>
        </div>
    </section>

<!-- 第9面：COMFORT ESSENTIAL -->
<section class="full-image with-text page-9">
    <img src="<?= $brochure('BROCHURE-09.webp') ?>" alt="COMFORT ESSENTIAL" class="bg-img">
    <div class="text-overlay">
        <h2 class="title-9">COMFORT ESSENTIAL</h2>
        <h3 class="subtitle-9">VIVACÉ also includes a full set of essential massage<br>features that enhance your daily relaxation.</h3>
        
        <div class="features-grid-9">
            <div class="feature-item-9">
                <img src="<?= $brochure('Asset 5.webp') ?>" alt="Heating Massage">
                <h4>Heating Massage</h4>
                <p>Gentle warmth that improves blood circulation and relaxes tight muscles.</p>
            </div>
            <div class="feature-item-9">
                <img src="<?= $brochure('Asset 6.webp') ?>" alt="Foot Extension + Guasa Roller">
                <h4>Foot Extension + Guasa Roller</h4>
                <p>Fits different heights and provides deep foot stimulation.</p>
            </div>
            <div class="feature-item-9">
                <img src="<?= $brochure('Asset 7.webp') ?>" alt="Zero Gravity + Zero Wall">
                <h4>Zero Gravity + Zero Wall</h4>
                <p>Weightless comfort with a space-saving reclining design.</p>
            </div>
            <div class="feature-item-9">
                <img src="<?= $brochure('Asset 8.webp') ?>" alt="Bluetooth Speaker">
                <h4>Bluetooth Speaker</h4>
                <p>Enjoy your favourite music while you unwind.</p>
            </div>
        </div>
    </div>
</section>

    <!-- 第10面 -->
    <section class="full-image page-10">
        <img src="<?= $brochure('BROCHURE-10.webp') ?>" alt="Specifications" class="bg-img">
    </section>

</div>

<?php require VIEW_PATH . 'layout/footer.php'; ?>