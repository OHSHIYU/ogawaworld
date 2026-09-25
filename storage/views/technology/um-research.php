<!-- /app/views/technology/um-research.php -->
<?php
ogw_set_seo([
    'title' => 'UM Research Collaboration | OGAWA Malaysia',
    'description' => 'Universiti Malaya and OGAWA joint research on massage chair therapy effects on blood circulation and sleep quality.',
]);
?>

<style>
/* ========== 页面专属样式 ========== */
.uni-hero {
    position: relative;
    min-height: 65vh;
    background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.65)), 
                url('<?= asset('img/technology/um-picture.webp') ?>');
    background-size: cover;
    background-position: center 30%;
    display: flex;
    align-items: flex-end;
    padding: 40px 40px 70px;
    margin-bottom: 50px;
}

.uni-logo-corner {
    position: absolute;
    top: 25px;
    left: 30px;
    max-width: 130px;
    background: rgba(255,255,255,0.92);
    padding: 8px 18px;
    border-radius: 14px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.uni-logo-corner img {
    width: 100%;
    height: auto;
    display: block;
}

.uni-hero-content {
    max-width: 750px;
    color: white;
    text-shadow: 0 1px 3px rgba(0,0,0,0.3);
}

.uni-hero-content h1 {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 12px;
}

.uni-hero-content .qs-rank {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 8px;
}

.uni-hero-content .uni-tagline {
    font-size: 15px;
    opacity: 0.85;
}

.research-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px 80px;
}

.intro-text {
    font-size: 17px;
    line-height: 1.7;
    color: #2c3e50;
    margin-bottom: 45px;
    padding: 20px 0;
    border-bottom: 1px solid #eee;
}

.section-title {
    font-size: 28px;
    font-weight: 650;
    margin: 50px 0 20px 0;
    padding-bottom: 10px;
    border-bottom: 3px solid #d4af37;
    display: inline-block;
}

.topic-card {
    background: #f0f4f8;
    padding: 25px;
    border-radius: 20px;
    border-left: 4px solid #d4af37;
    height: 100%;
}

.topic-card p {
    margin: 0;
    font-size: 16px;
    font-weight: 500;
    color: #1a2a3a;
    line-height: 1.5;
}

.topic-label {
    font-weight: 700;
    margin-bottom: 8px;
    color: #d4af37;
    font-size: 14px;
}

/* 两个课题并列 */
.topics-two-column {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    margin: 20px 0 30px;
}

.stats-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    margin: 30px 0 20px;
}

.stat-item {
    flex: 1;
    min-width: 170px;
    background: #ffffff;
    border-radius: 24px;
    padding: 28px 16px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    border: 1px solid #eef2f6;
    transition: all 0.25s ease;
}

.stat-item:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 30px rgba(0,0,0,0.1);
    border-color: #d4af37;
}

.stat-number {
    font-size: 48px;
    font-weight: 800;
    color: #d4af37;
    line-height: 1.1;
    margin-bottom: 12px;
}

.stat-label {
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 6px;
    color: #1e2f3e;
}

.stat-desc {
    font-size: 13px;
    color: #6c7a89;
    line-height: 1.4;
}

.publication-card {
    background: #f8fafd;
    border-radius: 24px;
    padding: 28px 32px;
    margin: 20px 0 30px;
    border: 1px solid #e6edf4;
    transition: all 0.2s;
}

.publication-card:hover {
    border-color: #d4af37;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

.publication-title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #1a2a3a;
}

.publication-journal {
    font-size: 14px;
    color: #5a6e7c;
    margin-bottom: 18px;
    font-style: italic;
}

.info-card {
    background: #f0f4f8;
    border-radius: 20px;
    padding: 24px 28px;
    margin: 20px 0;
}

.info-list {
    padding-left: 20px;
    margin: 12px 0 0;
    color: #2c3e50;
    line-height: 1.7;
}

.info-list li {
    margin-bottom: 8px;
}

.gallery-slider {
    overflow-x: auto;
    overflow-y: hidden;
    white-space: nowrap;
    padding: 20px 0;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: thin;
}

.gallery-track {
    display: flex;
    gap: 20px;
    width: fit-content;
}

.gallery-item {
    flex: 0 0 auto;
    width: 260px;
    white-space: normal;
    background: #ffffff;
    border-radius: 16px;
    padding: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    border: 1px solid #eef2f6;
}

.gallery-item img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 10px;
}

.gallery-caption {
    font-size: 12px;
    color: #6c7a89;
    line-height: 1.4;
    text-align: center;
}

.btn-gold {
    display: inline-block;
    background: #d4af37;
    color: #1e2f3e;
    padding: 10px 24px;
    border-radius: 40px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.2s ease;
    font-size: 14px;
}

.btn-gold:hover {
    background: #c4a02a;
    color: #111;
    transform: scale(1.02);
}

/* 排名卡片样式 */
.ranking-card {
    background: linear-gradient(135deg, #0d2b3e 0%, #1a4a6e 100%);
    border-radius: 28px;
    padding: 35px 30px;
    margin: 40px auto 30px;
    text-align: center;
    color: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    max-width: 1200px;
}

/* ========== 响应式：手机端 ========== */
@media (max-width: 768px) {
    .uni-hero {
        padding: 80px 20px 45px;
        min-height: 55vh;
    }
    .uni-logo-corner {
        top: 15px;
        left: 16px;
        max-width: 80px;
        padding: 5px 12px;
    }
    .uni-hero-content h1 {
        font-size: 28px;
    }
    .uni-hero-content .qs-rank {
        font-size: 16px;
    }
    .research-container {
        padding: 0 16px 60px;
    }
    .section-title {
        font-size: 24px;
    }
    .stat-item {
        min-width: calc(50% - 16px);
        padding: 20px 12px;
    }
    .stat-number {
        font-size: 36px;
    }
    .publication-card {
        padding: 20px;
    }
    .publication-title {
        font-size: 16px;
    }
    .gallery-item {
        width: 220px;
    }
    .gallery-item img {
        height: 130px;
    }
    
    /* 手机端：两个课题变一列 */
    .topics-two-column {
        grid-template-columns: 1fr !important;
        gap: 16px;
    }
}

@media (min-width: 769px) and (max-width: 1024px) {
    .stat-item {
        min-width: calc(25% - 18px);
    }
}
</style>

<!-- Hero 区域 -->
<div class="uni-hero">
    <div class="uni-logo-corner">
        <img src="<?= asset('img/technology/um-logo.png') ?>" alt="Universiti Malaya Logo">
    </div>
    <div class="uni-hero-content">
        <h1>Universiti Malaya</h1>
        <div class="qs-rank">QS World University Ranking #58</div>
        <div class="uni-tagline">Top #1 Biomedical Engineering School in Malaysia | Top #1 Medical School in Malaysia</div>
    </div>
</div>

<div class="research-container">

<!-- 排名亮点模块 -->
<div class="ranking-card">
    <div style="display: inline-block; background: #d4af37; color: #0d2b3e; padding: 6px 20px; border-radius: 40px; font-weight: 700; font-size: 14px; letter-spacing: 1px; margin-bottom: 20px;">
        QS WORLD UNIVERSITY RANKINGS 2026
    </div>
    
    <div style="display: flex; align-items: center; justify-content: center; gap: 40px; flex-wrap: wrap;">
        <div>
            <span style="font-size: 80px; font-weight: 800; color: #d4af37; line-height: 1;">#58</span>
            <p style="margin: 8px 0 0; font-size: 14px; opacity: 0.9;">Highest-ever Position in History</p>
        </div>
        <div style="text-align: left; border-left: 2px solid rgba(255,255,255,0.3); padding-left: 30px;">
            <p style="margin: 0; font-size: 13px; opacity: 0.9;">out of 8,467 evaluated institutions</p>
            <p style="margin: 0; font-size: 13px; opacity: 0.9;">out of 1,501 published institutions</p>
        </div>
    </div>
    
    <div style="margin-top: 30px; padding-top: 25px; border-top: 1px solid rgba(255,255,255,0.15);">
        <p style="margin-bottom: 18px; font-weight: 600; font-size: 16px;">Top #1 in Malaysia for 5 out of 9 indicators</p>
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 12px;">
            <span style="background: rgba(255,255,255,0.12); padding: 8px 20px; border-radius: 40px; font-size: 13px;">Academic Reputation</span>
            <span style="background: rgba(255,255,255,0.12); padding: 8px 20px; border-radius: 40px; font-size: 13px;">Employer Reputation</span>
            <span style="background: rgba(255,255,255,0.12); padding: 8px 20px; border-radius: 40px; font-size: 13px;">Employment Outcomes</span>
            <span style="background: rgba(255,255,255,0.12); padding: 8px 20px; border-radius: 40px; font-size: 13px;">International Research Network</span>
            <span style="background: rgba(255,255,255,0.12); padding: 8px 20px; border-radius: 40px; font-size: 13px;">Sustainability</span>
        </div>
    </div>
</div>


<div class="research-container">    

    <!-- 合作简介 -->
    <div class="intro-text">
        <p>OGAWA has established a joint research collaboration with <strong>Universiti Malaya (UM)</strong>, Malaysia's leading university. This partnership leverages UM's expertise in biomedical engineering and medicine to scientifically validate the health benefits of OGAWA's automated massage chair technology.</p>
        <p style="margin-top: 12px;">Through specific massage programs powered by the <strong>OVERSEER™ AI Control System</strong>, OGAWA massage chairs can effectively help improve blood circulation, enhance sleep quality, and reduce muscle discomfort.</p>
    </div>

    <!-- 研究课题（两个左右并排，手机上下） -->
    <h2 class="section-title">Research Topics</h2>
    
<div class="publication-card">
        <div class="publication-title">Investigating the Effects of Ogawa Master Drive AI Automated Massage on Blood Circulation and Sleep Quality</div>
        <div class="publication-journal">Journal of Medical Imaging and Health Informatics, Vol. 11, 2021</div>
        <a href="<?= asset('uploads/university/UM-Research-Investigating-the-Effects-of-Ogawa-Master-Drive-AI.pdf') ?>" class="btn-gold" target="_blank">View PDF →</a>
    </div>
    
    <div class="publication-card">
        <div class="publication-title">Effects of Automated Massage Chair Therapy on Mental Health and Physical Health: A Comprehensive Study</div>
        <div class="publication-journal">Complementary Therapies in Medicine (Manuscript CTIM-D-25-01985), 2025</div>
        <a href="<?= asset('uploads/university/UM-Reaserch-Effects-Of-Automated-Massage-Chair-Therapy-on-Mental-and-Physical-Health.pdf') ?>" class="btn-gold" target="_blank">View PDF →</a>
    </div>

    <!-- 研究结果 -->
    <h2 class="section-title">Key Findings</h2>
    <div class="stats-grid">
        <div class="stat-item">
            <div class="stat-number">88%</div>
            <div class="stat-label">Improved Sleep Quality</div>
            <div class="stat-desc">Longer deep sleep, fewer night awakenings</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">81%</div>
            <div class="stat-label">Improved Blood Circulation</div>
            <div class="stat-desc">Increased peripheral blood flow & muscle oxygenation</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">39.3%</div>
            <div class="stat-label">Improved Muscle Function</div>
            <div class="stat-desc">Enhanced recovery & muscle performance</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">22.5%</div>
            <div class="stat-label">Reduced Back Pain</div>
            <div class="stat-desc">Significant relief from lower back discomfort</div>
        </div>
    </div>

    <!-- 研究图片 Gallery -->
    <h2 class="section-title">Research Gallery</h2>
    
    <div class="gallery-slider">
        <div class="gallery-track">
            <div class="gallery-item">
                <img src="<?= asset('img/technology/um-asset-3.jpg') ?>" alt="Acupressure points">
                <div class="gallery-caption">OVERSEER’s LAB in OGAWA x Universiti Malaya</div>
            </div>
            <div class="gallery-item">
                <img src="<?= asset('img/technology/um-asset-2.jpg') ?>" alt="Laser Doppler">
                <div class="gallery-caption">Participant Undergoing Automated Massage Assessment</div>
            </div>
            <div class="gallery-item">
                <img src="<?= asset('img/technology/um-asset-1.jpg') ?>" alt="Research image 3">
                <div class="gallery-caption">Immersive Wellness Technology Experience</div>
            </div>
            <div class="gallery-item">
                <img src="<?= asset('img/technology/um-asset-4.jpg') ?>" alt="Research image 4">
                <div class="gallery-caption">Researcher Conducting Health Data Analysis</div>
            </div>
            <div class="gallery-item">
                <img src="<?= asset('img/technology/um-asset-5.jpg') ?>" alt="Research image 5">
                <div class="gallery-caption">Research & Sample Collection Station</div>
            </div>
            <div class="gallery-item">
                <img src="<?= asset('img/technology/um-asset-6.jpg') ?>" alt="Research image 6">
                <div class="gallery-caption">Therapeutic Massage Evaluation Room</div>
            </div>
            <div class="gallery-item">
                <img src="<?= asset('img/technology/um-asset-7.jpg') ?>" alt="Research image 7">
                <div class="gallery-caption">AI Health Monitoring & Analysis System</div>
            </div>
        </div>
    </div>
    
    <h2 class="section-title">Research Equipment</h2>

<style>
@media (max-width: 768px) {
    .research-equipment-mobile {
        flex-direction: column !important;
    }
    .research-equipment-mobile img {
        margin-bottom: 20px;
    }
}
</style>

<div class="research-equipment-mobile" style="display: flex; flex-wrap: wrap; gap: 30px; align-items: center; background: #f0f4f8; border-radius: 20px; padding: 25px;">
    <div style="flex: 1; text-align: center;">
        <img src="<?= asset('img/technology/overseer-ai.jpeg') ?>" alt="OVERSEER AI System" style="max-width: 100%; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
    </div>
    <div style="flex: 1.5;">
        <div class="publication-title" style="margin-bottom: 8px;">Automated massage chair with OVERSEER AI system</div>
        <div class="publication-journal" style="margin-bottom: 12px;">64 air compression chambers | AI-driven massage programs</div>
        <ul class="info-list">
            <li>Real-time body scan with posture adjustment</li>
            <li>Multiple massage modes: Deep tissue, Blood circulation, Sweet dreams</li>
            <li>Integrated biosensors for heart rate & stress monitoring</li>
            <li>Laser Doppler flowmeter for skin blood flow measurement</li>
            <li>Wrist actigraphy (Actigraph GT9X Link) for sleep quality tracking</li>
        </ul>
    </div>
</div>

    <!-- 研究团队 -->
    <h2 class="section-title">Research Team</h2>
    <div class="stats-grid" style="margin-bottom: 20px;">
        <div class="stat-item" style="min-width: 150px;">
            <div class="stat-label" style="font-size: 15px;">Prof. Dr. Khin Wee Lai</div>
            <div class="stat-desc">Biomedical Engineering</div>
        </div>
        <div class="stat-item" style="min-width: 150px;">
            <div class="stat-label" style="font-size: 15px;">Dr. Juliana Usman</div>
            <div class="stat-desc">Rehabilitation Medicine</div>
        </div>
        <div class="stat-item" style="min-width: 150px;">
            <div class="stat-label" style="font-size: 15px;">Prof. Dr. Xiang Wu</div>
            <div class="stat-desc">Funding & Supervision</div>
        </div>
        <div class="stat-item" style="min-width: 150px;">
            <div class="stat-label" style="font-size: 15px;">Ayan Paul / Xin Lee</div>
            <div class="stat-desc">Lead Researchers</div>
        </div>
    </div>

    <!-- 研究意义 -->
    <h2 class="section-title">Research Impact</h2>
    <div class="info-card" style="background: #e8f4f8;">
        <p style="margin: 0; font-style: italic; font-size: 16px;">"Automated massage chair therapy represents a practical, accessible modality that can support both mental and physical well-being, particularly for individuals who may find traditional exercise challenging. Widespread implementation in public spaces including universities and hospitals could contribute to improved health equity."</p>
        <p style="margin-top: 15px; font-weight: 600;">— Prof. Dr. Khin Wee Lai</p>
    </div>


    <!-- 合作信息 -->
    <div style="margin-top: 50px; padding: 20px 0; border-top: 1px solid #eef2f6; text-align: center;">
        <p style="color: #5a6e7c; font-size: 14px; margin-bottom: 5px;">OGAWA MALAYSIA Research & Innovation Series</p>
        <p style="color: #5a6e7c; font-size: 13px;">Curated by Datuk Lim Mee Ling, Ogawa Malaysia & Ogawa International</p>
        <p style="color: #5a6e7c; font-size: 12px; margin-top: 10px;">Joint Research Grant: Universiti Malaya - Ogawa Malaysia (PV051-2019, PV052-2019, MG007-2023, PV006-2023)</p>
    </div>
</div>