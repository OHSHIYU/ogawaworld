<?php require VIEW_PATH . 'layout/header.php'; ?>

<?php
$base = rtrim(asset('img/pdp/ogawa-omknee-3-0'), '/');
$img = function($file) use ($base) {
    return $base . '/' . $file;
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-omknee-3-0/brochure.css') ?>">

<div class="omknee-brochure">

    <!-- 1. 纯图片 Asset-1 -->
    <section class="full-image">
        <img src="<?= $img('Asset-1.webp') ?>" alt="">
    </section>

<!-- 2. Asset-2 + 文字 -->
<section class="full-image with-text">
    <img src="<?= $img('Asset-2.webp') ?>" alt="">
    <div class="text-overlay brochure-2">
        
        <div class="top-spacer"></div>  <!-- 上面空 1/5 -->
        
        <div class="top-text-group">
            <p class="line-1">Step into a new chapter with the Omknee 3.0</p>
            <div class="spacer-1"></div>
            <p class="line-from">from the</p>
            <p class="line-first">World's First</p>
            <p class="line-to">to the</p>
            <p class="line-finest">World's Finest</p>
        </div>
        
        <div class="middle-spacer"></div>  <!-- 中间空 2/5 -->
        
        <div class="bottom-text-group">
            <p class="line-allnew">ALL NEW</p>
            <p class="line-nodes">Acupressure Massage Nodes</p>
        </div>
        
        <div class="bottom-spacer"></div>  <!-- 底部留白 1/5 -->
        
    </div>
</section>

<!-- 3. Asset-3 + 文字 -->
<section class="full-image with-text">
    <img src="<?= $img('Asset-3.webp') ?>" alt="">
    <div class="text-overlay brochure-3">
        
        <div class="gray-bar">
            <p class="gray-title">Acupressure Release Technology</p>
            <p class="gray-tags">
                <span class="blue-arrow">↑</span> Tension Relief 
                <span class="blue-arrow">↑</span> Swell Reduction 
                <span class="blue-arrow">↑</span> Blood Circulation
            </p>
        </div>
        
        <div class="middle-content">
            <p class="next-gen">NEXT-GEN</p>
            <p class="reflexology">Reflexology Movement</p>
        </div>
        
        <div class="bottom-desc">
            <p>Upgraded & Smarter, every reflexology and movements are now more<br>
            precised through adaptive strength and accuracy control.</p>
        </div>
        
    </div>
    </section>
<!-- 4. Asset-4 + 文字 -->
<section class="full-image with-text">
    <img src="<?= $img('Asset-4.webp') ?>" alt="">
    <div class="text-overlay brochure-4">
        <div class="text-wrapper">
            <h2 class="explore-title">ready for your next exploration</h2>
            <p class="explore-desc">
                Building and improving on its predecessors Omknee 3 is the latest evolution that redefines what comfort and care for your legs can mean. It represents a new step forward, giving you the freedom to enjoy life with confidence and the spirit to explore more possibilities ahead.
            </p>
        </div>
    </div>
</section>

<!-- 5. Asset-5 + 文字 -->
<section class="full-image with-text">
    <img src="<?= $img('Asset-5.webp') ?>" alt="">
    <div class="text-overlay brochure-5">
        <div class="text-wrapper">
            <h2 class="detachable-title">DETACHABLE</h2>
            <p class="detachable-sub">One Device, Multiple Ways to Recover</p>
        </div>
    </div>
</section>

<!-- 6. 四个部位（黑底 + 标题 + 小图标 Asset-6 到 Asset-9） -->
<section class="areas-section">
    <div class="areas-container">
        <!-- 顶部标题区域 -->
        <div class="areas-header">
            <h2 class="areas-main-title">Advanced Detachable Versatility</h2>
            <p class="areas-sub-title">One device, multiple ways to recover.</p>
        </div>
        
        <!-- 四个部位网格 -->
        <div class="areas-grid">
            <div class="area-card">
                <img src="<?= $img('Asset-6.webp') ?>" alt="Knee & Thighs">
                <h3>Knee/Thighs</h3>
                <p>Ease post-workout soreness and heavy legs.</p>
            </div>
            <div class="area-card">
                <img src="<?= $img('Asset-7.webp') ?>" alt="Calves">
                <h3>Calves</h3>
                <p>Restore circulation and comfort where you need it most.</p>
            </div>
            <div class="area-card">
                <img src="<?= $img('Asset-8.webp') ?>" alt="Feet">
                <h3>Feet</h3>
                <p>Relieve built-up pressure & tension from standing or walking throughout the day.</p>
            </div>
            <div class="area-card">
                <img src="<?= $img('Asset-9.webp') ?>" alt="Arms">
                <h3>Arms</h3>
                <p>Soothe overworked muscles from daily strain.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. ThermaFlow 背景 Asset-12 + 文字 + 图标 -->
<section class="full-image with-text">
    <img src="<?= $img('Asset-12.webp') ?>" alt="ThermaFlow">
    <div class="text-overlay brochure-7">
        <div class="therma-content">
            <h2 class="therma-title">ThermaFlow<br>Comfort</h2>  <!-- 分成两行 -->
            <p class="therma-desc">
                The new ThermaFlow heating system delivers fast, even warmth that melts stiffness and revitalizes circulation<br>
                - comfort you can feel in moments.
            </p>
            <div class="therma-icons">
                <img src="<?= $img('Asset-10.webp') ?>" alt="Icon 1">
                <img src="<?= $img('Asset-11.webp') ?>" alt="Icon 2">
            </div>
        </div>
    </div>
</section>

    <!-- 8. 纯图片 Asset-12 -->
    <section class="full-image">
        <img src="<?= $img('Asset-13.webp') ?>" alt="">
    </section>

</div>

<?php require VIEW_PATH . 'layout/footer.php'; ?>