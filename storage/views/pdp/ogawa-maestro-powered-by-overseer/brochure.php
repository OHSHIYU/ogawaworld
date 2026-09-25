<?php
$seoOverride = [
    'title'       => 'OGAWA MAESTRO powered by OVERSEER™',
    'description' => 'OGAWA MAESTRO - AI-powered massage chair',
];

$GLOBALS['ogw_seo'] = array_merge($GLOBALS['ogw_seo'] ?? [], $seoOverride);

require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-maestro-powered-by-overseer'), '/');
$brochure = function(string $filename) use ($base) {
    return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-maestro-powered-by-overseer/brochure.css') ?>">

<style>
/* 只影响 MAESTRO 产品内容区域，不影响 header 和 footer */
.page-2-solid,
.page-3,
.page-4,
.page-5,
.page-6,
.page-7,
.page-8,
.page-9,
.page-10,
.page-11,
.page-12-solid,
.page-13,
.page-14,
.page-15-solid,
.page-2-solid *,
.page-3 *,
.page-4 *,
.page-5 *,
.page-6 *,
.page-7 *,
.page-8 *,
.page-9 *,
.page-10 *,
.page-11 *,
.page-12-solid *,
.page-13 *,
.page-14 *,
.page-15-solid * {
    font-family: 'Avenir Next', 'Segoe UI', 'Helvetica Neue', Arial, sans-serif !important;
}

/* 标题单独设置 */
.page-2-solid h1, .page-2-solid h2, .page-2-solid h3,
.page-3 h2, .page-3 h3,
.page-4 .grid-item span,
.page-5 h2, .page-5 h3,
.page-6 h2, .page-6 h3,
.page-7 h2, .page-7 h3, .page-7 h4,
.page-8 h2, .page-8 h3, .page-8 h4,
.page-9 h2, .page-9 h3,
.page-11 h2,
.page-12-solid h2,
.page-13 h2, .page-13 h3,
.page-14 h2,
.page-15-solid h2,
.page-2-solid .title-2-main,
.page-2-solid .title-2-sub {
    font-family: 'Montserrat', 'Trebuchet MS', 'Arial Black', sans-serif !important;
    font-weight: 700 !important;
}
</style>

<div class="main">

    <!-- 第1面：纯图片 -->
    <section class="full-image page-1">
        <img src="<?= $brochure('MAESTRO BROCHURE-01.webp') ?>" alt="MAESTRO" class="bg-img">
    </section>

 <!-- 第2面：Graphene Technology -->
<!-- 第2面：Graphene Technology（纯色背景） -->
<section id="page-2" class="page-2-solid">
    <div class="container-2">
        <div class="top-area">
            <h1 class="title-2-main">Regenerate, Recover & Renew</h1>
            <h2 class="title-2-sub">Graphene Technology</h2>
        </div>
        
        <div class="three-cols">
            <!-- 卡片1：有链接 -->
            <div class="col">
                <img src="<?= $brochure('Asset 1.webp') ?>" alt="Muscle Fatigue">
                <h3>Muscle Fatigue Recovery</h3>
                <p>Graphene-based far-infrared (FIR) heat supports faster muscle recovery by enhancing circulation, relaxing tissues, and promoting overall metabolic activity.</p>
                <div class="ref-link">
                    <a href="https://pmc.ncbi.nlm.nih.gov/articles/PMC10044709/" target="_blank">Ref: Effects of a Graphene Heating Device on Fatigue Recovery of Biceps Brachii</a>
                </div>
            </div>
            
            <!-- 卡片2：无链接 -->
            <div class="col">
                <img src="<?= $brochure('Asset 2.webp') ?>" alt="Bone Regeneration">
                <h3>Bone Regeneration</h3>
                <p>Graphene acts as a bioactive scaffold that supports bone tissue regeneration by promoting the activity of bone-forming cells, enhancing the body's natural healing process.</p>
            </div>
            
            <!-- 卡片3：有链接 -->
            <div class="col">
                <img src="<?= $brochure('Asset 3.webp') ?>" alt="Self-Regeneration">
                <h3>Self-Regeneration</h3>
                <p>Emits far-infrared radiation to improve microcirculation and support cellular repair mechanisms, helping activate the body's natural self-regeneration process for faster recovery and long-term wellness.</p>
                <div class="ref-link">
                    <a href="https://pmc.ncbi.nlm.nih.gov/articles/PMC7214535/" target="_blank">Ref: 3D Graphene Scaffolds for Skeletal Muscle Regeneration: Future Perspectives</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 第3面：OVERSEER AI -->
<section class="full-image with-text page-3">
    <img src="<?= $brochure('MAESTRO BROCHURE-03.webp') ?>" alt="OVERSEER" class="bg-img">
    <div class="text-overlay">
        <div class="content-3">
            <img src="<?= $brochure('Asset 4.webp') ?>" alt="OVERSEER" class="asset-4-3">
            <p class="desc-3">An advanced AI that studies body data, learns user patterns, and continuously adjusts massage programs to deliver smarter, more effective wellness outcomes.</p>
            <a href="https://ogawaworld.net/technology/overseer" target="_blank" class="btn-overseer-3">LEARN ABOUT OVERSEER™</a>
        </div>
    </div>
</section>
<!-- 第4面：功能标签格子 -->
<section class="page-4">
    <img class="page-4-bg" src="<?= $brochure('MAESTRO BROCHURE-04.webp') ?>" alt="Features">
    
    <div class="grid-container">
        <!-- 第一行：3个格子（Asset 5 四方形，Asset 7 长方形，Asset 10 四方形） -->
        <div class="grid-row row-top">
            <div class="grid-item square" data-target="page-5">
                <img src="<?= $brochure('Asset 5.webp') ?>" alt="AI BioSensor">
                <span>AI BioSensor</span>
            </div>
            <div class="grid-item rectangle" data-target="page-2">
                <img src="<?= $brochure('Asset 7.webp') ?>" alt="Heal pod - Graphene">
                <span>Heal pod - Graphene</span>
            </div>
            <div class="grid-item square" data-target="page-14">
                <img src="<?= $brochure('Asset 10.webp') ?>" alt="OVERSEER™ AI">
                <span>OVERSEER™ AI</span>
            </div>
        </div>

        <!-- 第二行：4个格子（Asset 6, 8, 9, 11 都是四方形） -->
        <div class="grid-row row-bottom">
            <div class="grid-item square" data-target="page-8">
                <img src="<?= $brochure('Asset 6.webp') ?>" alt="Calf & Foot Roller">
                <span>Calf & Foot Roller</span>
            </div>
            <div class="grid-item square" data-target="page-10">
                <img src="<?= $brochure('Asset 8.webp') ?>" alt="360° Multi-Sensory Wellness">
                <span>360° Multi-Sensory Wellness</span>
            </div>
            <div class="grid-item square" data-target="page-11">
                <img src="<?= $brochure('Asset 9.webp') ?>" alt="Monster Premium Sound">
                <span>Monster Premium Sound</span>
            </div>
            <div class="grid-item square" data-target="page-13">
                <img src="<?= $brochure('Asset 11.webp') ?>" alt="LiFlex Track">
                <span>LiFlex Track</span>
            </div>
        </div>
    </div>
</section>

<!-- 第5面：AI BioSensor -->
<section id="page-5" class="full-image with-text page-5">
    <img src="<?= $brochure('MAESTRO BROCHURE-05.webp') ?>" alt="AI BioSensor" class="bg-img">
    <div class="text-overlay left-align">
        <h2 class="title-5">AI BioSensor</h2>
        <h3 class="subtitle-5">Understands You, Adapts to You.</h3>
        <p class="desc-5">The MAESTRO is equipped with advanced AI BioSensor that monitor the body in real time, enabling personalized massage programs tailored to the user's condition.</p>
        <p class="desc-5">The massage chair understands your body condition and recommends the most suitable massage program — instead of relying on fixed massage settings.</p>
    </div>
</section>

<!-- 第6面：Health Report -->
<section id="page-6" class="page-6">
    <img class="bg-img" src="<?= $brochure('MAESTRO BROCHURE-06.webp') ?>" alt="Health Report">
    <div class="split-layout">
        <!-- 左边栏：只放 Track Your Wellness -->
        <div class="col-left">
            <h2>Track Your Wellness.Improve Every Day</h2>
            <h3>Intelligent Body Health Monitoring System</h3>
            <p>The system automatically records and builds a personal health data profile, allowing users to monitor their wellness progress over time.</p>
        </div>
        
        <!-- 右边栏：只放 Health Indicators 和 Health Data System -->
        <div class="col-right">
            <div class="health-indicators">
                <h3>Health Indicators Detected</h3>
                <ul>
                    <li><strong>Blood Oxygen Level</strong> – monitors oxygen circulation in the body</li>
                    <li><strong>Heart Rate Monitoring</strong> – tracks cardiovascular condition</li>
                    <li><strong>Stress Level Analysis</strong> – detects fatigue and stress levels</li>
                    <li><strong>Muscle Tension Detection</strong> – measures muscle tightness</li>
                    <li><strong>HRV (Heart Rate Variability)</strong> – evaluates nervous system balance</li>
                    <li><strong>Micro Circulation Monitoring</strong> – measures blood circulation at the microvascular level</li>
                </ul>
            </div>
            <div class="health-data-system">
                <h3>Health Data System</h3>
                <p>The system automatically records and builds a personal health data profile, allowing users to monitor their wellness progression over time.</p>
            </div>
        </div>
    </div>
</section>

<!-- 第7面：OVERSEER AI Smart Technology -->
<section id="page-7" class="full-image with-text page-7">
    <img src="<?= $brochure('MAESTRO BROCHURE-07.webp') ?>" alt="OVERSEER AI" class="bg-img">
    <div class="text-overlay left-align">
        
        <h2 class="title-7">OVERSEER™ AI Smart Technology</h2>
        <h3 class="subtitle-7">Smarter Technology. Effortless Control.</h3>
        <p class="desc-7">MAESTRO integrates advanced smart features for a seamless experience:</p>
        
        <div class="features-7">
            <div class="feature-7">
                <img src="<?= $brochure('Asset 12.webp') ?>" alt="AI Voice Control">
                <h4>AI Voice Control</h4>
                <p>Hands-free convenience</p>
            </div>
            <div class="feature-7">
                <img src="<?= $brochure('Asset 13.webp') ?>" alt="AI Body Scan">
                <h4>AI Body Scan</h4>
                <p>Detects body shape, posture & alignment</p>
            </div>
            <div class="feature-7">
                <img src="<?= $brochure('Asset 14.webp') ?>" alt="OTA Updates">
                <h4>Over-the-Air Updates (OTA)</h4>
                <p>Your chair receives seamless updates regularly from OGAWA server. Keeping your relaxation experience always evolving.</p>
            </div>
        </div>
        
    </div>
</section>

<!-- 第8面：Calf & Foot Roller -->
<section id="page-8" class="page-8">
    <img class="bg-img" src="<?= $brochure('MAESTRO BROCHURE-08.webp') ?>" alt="Calf & Foot Roller">
    <div class="split-layout">
        
        <!-- 左下角：Calf & Foot Roller -->
        <div class="bottom-left">
            <h2>Calf & Foot Roller</h2>
            <p>MAESTRO provides a calf treatment experience similar to a professional Gua Sha therapist, delivering deep relaxation for the legs.</p>
        </div>
        
        <!-- 右边内容 -->
        <div class="right-content">
            <h3>Three Key Massage Technologies:</h3>
            
            <div class="technologies">
                <div class="tech-item">
                    <img src="<?= $brochure('Asset 15.webp') ?>" alt="Foot Gua Sha Therapy">
                    <h4>Foot Gua Sha Therapy</h4>
                    <p>Stimulates pressure points, enhances circulation, and restores deep relaxation</p>
                </div>
                <div class="tech-item">
                    <img src="<?= $brochure('Asset 16.webp') ?>" alt="Kneading Rollers">
                    <h4>Kneading Rollers</h4>
                    <p>Simulates professional massage techniques for deep muscle relaxation</p>
                </div>
                <div class="tech-item">
                    <img src="<?= $brochure('Asset 17.webp') ?>" alt="Graphene Heat Therapy">
                    <h4>Graphene Heat Therapy</h4>
                    <p>Warm therapy helps relieve muscle tension and discomfort</p>
                </div>
            </div>
            
            <div class="benefits">
                <h3>Benefits</h3>
                <ul>
                    <li>Promotes blood circulation in the legs</li>
                    <li>Relieves calf fatigue and soreness</li>
                    <li>Improves discomfort from prolonged standing or walking</li>
                </ul>
            </div>
        </div>
        
    </div>
</section>

<!-- 第9面：Automatic Leg Extension -->
<section id="page-9" class="full-image with-text page-9">
    <img src="<?= $brochure('MAESTRO BROCHURE-09.webp') ?>" alt="Automatic Leg Extension" class="bg-img">
    <div class="text-overlay right-half">
        <div class="text-content">
            <h2>Automatic Leg Extension</h2>
            <h3>Automatic Extendable Footrest</h3>
            <p>The automatic leg extension adjusts to your height for proper alignment and optimal comfort, giving every user a customized fit.</p>
        </div>
    </div>
</section>

<!-- 第10面：360° Multi-Sensory Wellness（纯图片） -->
<section id="page-10" class="full-image">
    <img src="<?= $brochure('MAESTRO BROCHURE-10.webp') ?>" alt="360° Multi-Sensory Wellness" class="bg-img">
</section>

<!-- 第11面：Monster Premium Sound -->
<section id="page-11" class="full-image with-text page-11">
    <img src="<?= $brochure('MAESTRO BROCHURE-11.webp') ?>" alt="Monster Premium Sound" class="bg-img">
    <div class="text-overlay">
        <div class="text-content">
            <h2>Monster Premium Sound</h2>
            <p>The OGAWA MAESTRO AI integrated Monster® Sound System delivers rich, immersive audio through a 4 multi-chamber design with deep bass and crisp highs. Enjoy music, podcasts, or meditations in stunning clarity, transforming every massage into a sensory escape.</p>
        </div>
    </div>
</section>

<!-- 第12面：Aromatherapy & Music Therapy -->
<section id="page-12" class="page-12-solid">
    <div class="container-12">
        <h2 class="title-12">Aromatherapy & Music Therapy</h2>
        
        <div class="two-cols-12">
            <div class="col-12">
                <img src="<?= $brochure('Asset 18.webp') ?>" alt="Aromatherapy">
                <p>The massage chair releases carefully selected essential oils to fill the air with soothing scents. This helps calm the mind, reduce stress, and enhance overall relaxation during the massage. Different aromas can also energize or improve your mood depending on your preference.</p>
            </div>
            <div class="col-12">
                <img src="<?= $brochure('Asset 19.webp') ?>" alt="Music Therapy">
                <p>Integrated speakers play relaxing music or nature sounds that sync with the massage rhythm. This helps block out external distractions, lowers stress levels, and enhances the sense of comfort and well-being.</p>
            </div>
        </div>
    </div>
</section>

<!-- 第13面：LiFlex Track System -->
<section id="page-13" class="page-13">
    <img class="bg-img" src="<?= $brochure('MAESTRO BROCHURE-13.webp') ?>" alt="LiFlex Track System">
    <div class="split-layout">
        
        <!-- 左下角：LiFlex Track System -->
        <div class="bottom-left">
            <h2>LiFlex Track System</h2>
            <h3>LiFlex Track – Flexible Rail</h3>
            <p>The LiFlex flexible rail allows the massage chair to truly "follow your body."</p>
            <p>From neck to hips, it massages along one continuous line, giving a completely different level of comfort and effectiveness.</p>
        </div>
        
        <!-- 右边内容 -->
        <div class="right-content">
            <div class="feature-group">
                <h3>LiFlex Flexible Rail + Overseer AI System</h3>
                <ul>
                    <li>Automatically detects height and body type</li>
                    <li>Automatically adjusts rail alignment for a perfect fit</li>
                    <li>More precise massage pressure</li>
                    <li>Reaches deep muscles and acupressure points</li>
                </ul>
            </div>
            
            <div class="feature-group">
                <h3>LiFlex Flexible Rail + Zero Gravity Mode</h3>
                <p class="zero-desc">The body assumes a natural curved position</p>
                <ul>
                    <li>Reduces spinal pressure</li>
                    <li>Provides a more comfortable massage with no blind spots</li>
                </ul>
                <div class="neck-chain">Neck &gt;&gt; Back &gt;&gt; Waist &gt;&gt; Hips</div>
            </div>
        </div>
        
    </div>
</section>

<!-- 第14面：10 inch Pad -->
<section id="page-14" class="full-image with-text page-14">
    <img src="<?= $brochure('MAESTRO BROCHURE-14.webp') ?>" alt="10 inch Pad" class="bg-img">
    <div class="text-overlay">
        <div class="text-content">
            <h2>10 inch Pad</h2>
            <p>Navigate programs and settings effortlessly with the new intuitive HD touchscreen tablet. Available in five languages, it puts customization at your fingertips, making it easy to create or adjust your massage with precision.</p>
        </div>
    </div>
</section>

<!-- 第15面：Advanced Safety & Smart Convenience System -->
<section id="page-15" class="page-15-solid">
    <div class="container-15">
        <h2 class="title-15">Advanced Safety & Smart Convenience System</h2>
        
        <div class="features-grid-15">
            <div class="feature-item-15">
                <img src="<?= $brochure('Asset 20.webp') ?>" alt="Child Safety Lock">
                <span>Child Safety Lock Settings</span>
            </div>
            <div class="feature-item-15">
                <img src="<?= $brochure('Asset 21.webp') ?>" alt="Body Detection">
                <span>Body Detection</span>
            </div>
            <div class="feature-item-15">
                <img src="<?= $brochure('Asset 22.webp') ?>" alt="Environment Detection">
                <span>Environment Detection</span>
            </div>
            <div class="feature-item-15">
                <img src="<?= $brochure('Asset 23.webp') ?>" alt="Wireless Charging">
                <span>Wireless Charging</span>
            </div>
        </div>
    </div>
</section>

<!-- 第16面：Specifications（纯图片） -->
<section class="full-image">
    <img src="<?= $brochure('MAESTRO BROCHURE-16.webp') ?>" alt="Specifications" class="bg-img">
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.grid-item').forEach(item => {
        item.addEventListener('click', () => {
            const targetId = item.getAttribute('data-target');
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});
</script>


<?php require VIEW_PATH . 'layout/footer.php'; ?>