<!-- /app/views/technology/segi-research.php -->
<?php
ogw_set_seo([
    'title' => 'SEGi Research Collaboration | OGAWA Malaysia',
    'description' => 'SEGi University and OGAWA joint research on EM-X Eye Massager effects on computer vision syndrome and dry eye patients.',
]);
?>

<style>
/* ========== 页面专属样式 ========== */
.uni-hero {
    position: relative;
    min-height: 65vh;
    background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.65)), 
                url('<?= asset('img/technology/segi-picture.png') ?>');
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
    padding: 28px 32px;
    border-radius: 24px;
    margin: 20px 0 30px;
    border-left: 5px solid #d4af37;
}

.topic-card p {
    margin: 0;
    font-size: 19px;
    font-weight: 500;
    color: #1a2a3a;
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

.info-card {
    background: #f0f4f8;
    border-radius: 20px;
    padding: 24px 28px;
    margin: 20px 0;
}

.publication-journal {
    font-size: 14px;
    color: #5a6e7c;
    margin-bottom: 8px;
    font-style: italic;
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

/* Gallery 样式 - 横向滑动 */
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
    width: 300px;
    white-space: normal;
    background: #ffffff;
    border-radius: 16px;
    padding: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    border: 1px solid #eef2f6;
}

.gallery-item img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 10px;
}

.gallery-caption {
    font-size: 12px;
    color: #6c7a89;
    line-height: 1.4;
}

/* 响应式 */
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
    .gallery-item {
        width: 260px;
    }
    .gallery-item img {
        height: 150px;
    }
}
</style>

<!-- Hero 区域 -->
<div class="uni-hero">
    <div class="uni-logo-corner">
        <img src="<?= asset('img/technology/segi-logo.png') ?>" alt="SEGi University Logo">
    </div>
    <div class="uni-hero-content">
        <h1>SEGi University</h1>
        <div class="qs-rank">QS World University Ranking #731-740</div>
        <div class="uni-tagline">Top #1 Vision Science School in Malaysia</div>
    </div>
</div>

<div class="research-container">
    
    <!-- 合作简介 -->
    <div class="intro-text">
        <p>OGAWA has established a research collaboration with <strong>SEGi University</strong>, home to Malaysia's top-ranked Vision Science School. This partnership focuses on evaluating the effectiveness of the <strong>OGAWA EM-X Eye Massager</strong> in relieving digital eye strain, dry eye symptoms, and improving overall visual comfort.</p>
    </div>

    <!-- ========== 1. Research Topic ========== -->
    <h2 class="section-title">Research Topic</h2>
    <div class="topic-card">
        <p>Effect of Ogawa EMX Eye Massager on Computer Vision Syndrome and Dry Eye Patients</p>
    </div>

    <!-- ========== 2. Key Findings ========== -->
    <h2 class="section-title">Key Findings</h2>
    <div class="stats-grid">
        <div class="stat-item">
            <div class="stat-number">52.7%</div>
            <div class="stat-label">Eye Fatigue Reduction</div>
            <div class="stat-desc">Significant decrease in eye discomfort</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">91%</div>
            <div class="stat-label">Dry Eye Improvement</div>
            <div class="stat-desc">Noticeable relief from dry eye symptoms</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">85%</div>
            <div class="stat-label">Headache Relief</div>
            <div class="stat-desc">Reduced digital eye strain-related headaches</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">45.7%</div>
            <div class="stat-label">Increased Tear Stability</div>
            <div class="stat-desc">Improved ocular surface health</div>
        </div>
    </div>

 <!-- EM-X 产品图 - 左图右文 -->
    <div style="display: flex; flex-wrap: wrap; gap: 30px; align-items: center; margin: 40px 0; background: #f8fafd; border-radius: 24px; padding: 25px;">
        <div style="flex: 1; min-width: 250px;">
            <img src="<?= asset('img/technology/segi-asset-1.jpg') ?>" alt="EM-X Eye Massager" style="width: 100%; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        </div>
        <div style="flex: 1.5;">
            <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #1a2a3a;">OGAWA EM-X Smart Eye Massager</h3>
            <p style="margin-bottom: 12px; line-height: 1.6;">The EM-X Eye Massager was found to be effective in improving tear film status among individuals with dry eyes.</p>
            <p style="margin-bottom: 12px; line-height: 1.6;">It increased tear stability, boosted tear volume, and enhanced the lipid layer of the tear film.</p>
            <p style="margin-bottom: 12px; line-height: 1.6;">These results proved that EM-X Eye Massager can provide quick and measurable improvement for dry eye patients. While this study focused on short-term effects, regular use will lead to further improvement over time.</p>
        </div>
    </div>
    
       <!-- 研究结果图 - 右图左文 -->
    <div style="display: flex; flex-wrap: wrap; gap: 30px; align-items: center; margin: 40px 0; background: #f8fafd; border-radius: 24px; padding: 25px; flex-direction: row-reverse;">
        <div style="flex: 1; min-width: 250px;">
            <img src="<?= asset('img/technology/segi-asset-3.jpg') ?>" alt="Research Results" style="width: 100%; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        </div>
        <div style="flex: 1.5;">
            <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #1a2a3a;">Results from 55 Subjects</h3>
            <p style="margin-bottom: 15px; line-height: 1.6;"><strong>Tear stability increased by 45.7% (+2.83%)</strong> and remained stable after another 10 minutes.</p>
            <p style="margin-bottom: 10px; line-height: 1.6;">Assessed tear break-up time using corneal topographer.</p>
            <p style="font-style: italic; color: #5a6e7c;">Example of topographer's before & after readings from a real subject shown in the image.</p>
        </div>
    </div>


    <!-- 研究流程图 - 左图右文 -->
    <div style="display: flex; flex-wrap: wrap; gap: 30px; align-items: center; margin: 40px 0; background: #f8fafd; border-radius: 24px; padding: 25px;">
        <div style="flex: 1; min-width: 250px;">
            <img src="<?= asset('img/technology/segi-asset-2.jpg') ?>" alt="Study Procedure" style="width: 100%; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        </div>
        <div style="flex: 1.5;">
            <h3 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #1a2a3a;">Procedure of the Study</h3>
            <ol style="padding-left: 20px; margin: 0; color: #2c3e50; line-height: 1.8;">
                <li>55 subjects who were diagnosed with dry eyes were recruited</li>
                <li>Tear stability, tear volume and tear lipid layer were assessed before using EM-X Eye Massager</li>
                <li>They used the EM-X Eye Massager for one session (10 minutes)</li>
                <li>Their tear condition was assessed twice again (immediately after and 10 minutes after) to see if there were any improvements</li>
            </ol>
        </div>
    </div>

    <!-- ========== 4. Expert Evaluation ========== -->
    <h2 class="section-title">Expert Evaluation</h2>
    <div class="info-card" style="background: #e8f4f8;">
        <p style="margin: 0; font-style: italic; font-size: 16px;">"Regular use of the OGAWA EMX Eye Massager can effectively relieve visual fatigue caused by the digital age, providing users with a healthier eye care experience."</p>
        <p style="margin-top: 15px; font-weight: 600;">— SEGi University Vision Science School</p>
    </div>

    <!-- ========== 5. Publication Status ========== -->
    <?php /*
    <h2 class="section-title">Publication Status</h2>
    
    <div class="info-card">
        <div class="publication-title" style="margin-bottom: 8px; font-weight: 700;">Effect of Ogawa EMX Eye Massager on Computer Vision Syndrome</div>
        <div class="publication-journal">Preparing for Publication Submission</div>
    </div>
    
    <div class="info-card">
        <div class="publication-title" style="margin-bottom: 8px; font-weight: 700;">Effect of Ogawa EMX Eye Massager on Dry Eye Patients</div>
        <div class="publication-journal">Preparing for Publication Submission</div>
    </div>
    */ ?>

    <!-- 合作信息 -->
    <div style="margin-top: 50px; padding: 20px 0; border-top: 1px solid #eef2f6; text-align: center;">
        <p style="color: #5a6e7c; font-size: 14px; margin-bottom: 5px;">OGAWA MALAYSIA Research & Innovation Series</p>
        <p style="color: #5a6e7c; font-size: 13px;">Curated by Datuk Lim Mee Ling, Ogawa Malaysia & Ogawa International</p>
    </div>
</div>