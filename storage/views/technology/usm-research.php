<!-- /app/views/technology/usm-research.php -->
<?php
ogw_set_seo([
    'title' => 'USM Research Collaboration | OGAWA Malaysia',
    'description' => 'Universiti Sains Malaysia and OGAWA joint research on massage chair therapy effects on stress, blood pressure, and bone health.',
]);
?>

<style>
/* ========== 页面专属样式 ========== */
.uni-hero {
    position: relative;
    min-height: 65vh;
    background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.65)), 
                url('<?= asset('img/technology/usm-picture.jpeg') ?>');
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

/* ========== 研究课题专属样式 ========== */
.research-topics {
    margin: 20px 0 30px;
}

.topics-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 20px;
}

.topics-row-center {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.topic-card {
    background: #f0f4f8;
    padding: 20px;
    border-radius: 16px;
    border-left: 4px solid #d4af37;
    flex: 1;
    min-width: 200px;
    
}

.topics-row-center .topic-card {
    width: calc(33.333% - 14px);
    max-width: calc(33.333% - 14px);
}

.topic-title {
    font-weight: 700;
    margin-bottom: 8px;
}

.topic-desc {
    font-size: 13px;
    color: #6c7a89;
}

.status {
    color: #d4af37;
    font-style: italic;
}

/* ========== 会议亮点样式 ========== */
.highlight-card {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: center;
    background: #f8fafd;
    border-radius: 24px;
    padding: 25px;
    margin: 20px 0;
}

.highlight-card.reverse {
    flex-direction: row-reverse;
}

.highlight-image {
    flex: 1;
    min-width: 200px;
    text-align: center;
}

.highlight-image img {
    width: 100%;
    max-width: 280px;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.highlight-content {
    flex: 2;
}

.highlight-badge {
    display: inline-block;
    background: #d4af37;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 12px;
}

.highlight-title {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 8px;
}

.highlight-meta {
    color: #5a6e7c;
    margin-bottom: 12px;
}

.highlight-quote {
    font-style: italic;
    margin-bottom: 15px;
    line-height: 1.6;
}

.bone-health-row {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: center;
    background: #f8fafd;
    border-radius: 20px;
    padding: 20px;
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
    
    .topics-row {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    .topics-row-center {
        flex-direction: column;
        align-items: stretch;
    }
    .topics-row-center .topic-card {
        width: 100%;
        max-width: 100%;
    }
    .topic-card {
        min-width: auto;
    }
    
    .highlight-card, .highlight-card.reverse {
        flex-direction: column;
    }
    .highlight-image img {
        max-width: 100%;
    }
    
    .bone-health-row {
        flex-direction: column !important;
        text-align: center;
    }
    .bone-health-row img {
        max-width: 80%;
        margin: 0 auto;
    }
}
</style>

<!-- Hero 区域 -->
<div class="uni-hero">
    <div class="uni-logo-corner">
        <img src="<?= asset('img/technology/usm-logo.png') ?>" alt="Universiti Sains Malaysia Logo">
    </div>
    <div class="uni-hero-content">
        <h1>Universiti Sains Malaysia</h1>
        <div class="qs-rank">QS World University Ranking #134</div>
        <div class="uni-tagline">Malaysia APEX University | Focused on Health Sciences & Technology Research</div>
    </div>
</div>

<div class="research-container">
    
    <!-- 合作简介 -->
    <div class="intro-text">
        <p>OGAWA has established multiple research collaborations with <strong>Universiti Sains Malaysia (USM)</strong>, Malaysia's APEX University. These partnerships focus on investigating the effects of OGAWA massage chair technology on stress management, blood pressure regulation, bone health, and overall well-being.</p>
        <p style="margin-top: 12px;">Through the <strong>OVERSEER™ AI Control System</strong>, OGAWA massage chairs have demonstrated significant positive impacts on physiological and psychological health indicators.</p>
    </div>

    <!-- ========== 1. Research Topics ========== -->
    <h2 class="section-title">Research Topics</h2>
    
    <div class="publication-card">
        <div class="publication-title">A Randomized Controlled Trial on the Impact of Automated Massage Chairs on Depression, Anxiety, Stress, Musculoskeletal Pain, and Biochemical Markers</div>
        <div class="publication-journal">Wiley Health Science Reports</div>
        <a href="https://doi.org/10.1002/hsr2.71226" class="btn-gold" target="_blank">View Publication →</a>
    </div>
    
    <div class="publication-card">
        <div class="publication-title">Effectiveness of OGAWA Massage Chair on Bone Mineral Density in Post-Menopausal Women</div>
        <div class="publication-journal">45th SICOT Orthopaedic World Congress, Madrid, Spain (September 2025)</div>
        <a href="<?= asset('uploads/university/USM-Research-Effectiveness-of-OGAWA-Massage-Chair-on-Bone-Mineral-Density.pdf') ?>" class="btn-gold" target="_blank">Download PDF →</a>
    </div>
    <!-- ========== 2. Key Research Findings ========== -->
    <h2 class="section-title">Key Research Findings</h2>
    <div class="stats-grid">
        <div class="stat-item">
            <div class="stat-number">60%</div>
            <div class="stat-label">Stress Reduction</div>
            <div class="stat-desc">Stress level decreased significantly</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">7.6%</div>
            <div class="stat-label">Anxiety Reduction</div>
            <div class="stat-desc">Anxiety symptom score decreased</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">10%</div>
            <div class="stat-label">Systolic BP Reduction</div>
            <div class="stat-desc">Improved blood pressure in hypertensive patients</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">8.69%</div>
            <div class="stat-label">Bone Formation Increase</div>
            <div class="stat-desc">Improved bone density biomarkers</div>
        </div>
    </div>
<!-- ========== 4. Bone Health Research ========== -->
    <h2 class="section-title">Bone Health Research</h2>
    
    <div style="margin: 20px 0;">
        
        <!-- asset-4 -->
        <div class="bone-health-row" style="margin-bottom: 30px;">
            <div style="flex: 1; min-width: 200px; text-align: center;">
                <img src="<?= asset('img/technology/usm-asset-4.jpg') ?>" alt="Healthy Bone vs Osteoporosis" style="max-width: 100%; border-radius: 12px;">
            </div>
            <div style="flex: 1.5;">
                <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 10px;">Healthy Bone vs Osteoporosis</h3>
                <p style="font-size: 14px; color: #2c3e50; line-height: 1.6;">Osteoporosis is a medical condition characterized by weakened bones and increased risk of fractures, caused by loss of bone density due to aging, hormonal changes, or nutritional deficiencies. More than 200 million people are suffering from osteoporosis worldwide.</p>
            </div>
        </div>
        
        <!-- asset-5 -->
        <div class="bone-health-row" style="margin-bottom: 30px; flex-direction: row-reverse;">
            <div style="flex: 1; min-width: 200px; text-align: center;">
                <img src="<?= asset('img/technology/usm-asset-5.jpg') ?>" alt="Osteoporosis Facts" style="max-width: 100%; border-radius: 12px;">
            </div>
            <div style="flex: 1.5;">
                <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 10px;">Osteoporosis Facts</h3>
                <p style="font-size: 14px; color: #2c3e50; line-height: 1.6;">1 in 3 women and 1 in 5 men over the age of 50 will experience osteoporotic fractures. The condition affects bone strength and quality, leading to increased fracture risk even from minor falls or bumps.</p>
            </div>
        </div>
        
        <!-- asset-6 -->
        <div class="bone-health-row">
            <div style="flex: 1; min-width: 200px; text-align: center;">
                <img src="<?= asset('img/technology/usm-asset-6.jpg') ?>" alt="Normal vs Osteoporotic Vertebrae" style="max-width: 100%; border-radius: 12px;">
            </div>
            <div style="flex: 1.5;">
                <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 10px;">Normal vs Osteoporotic Vertebrae</h3>
                <p style="font-size: 14px; color: #2c3e50; line-height: 1.6;">Osteoporosis causes vertebral compression fractures, turning normal compact bone into weakened spongy bone. This leads to spinal deformity, height loss, and increased fracture risk in the spine.</p>
            </div>
        </div>
        
    </div>

    <!-- ========== 3. International Conference Highlight ========== -->
    <h2 class="section-title">International Conference Highlight</h2>
    
    <div class="highlight-card">
        <div class="highlight-image">
            <img src="<?= asset('img/technology/usm-asset-1.jpg') ?>" alt="SICOT Conference">
        </div>
        <div class="highlight-content">
            <div class="highlight-badge">45th SICOT Orthopaedic World Congress</div>
            <div class="highlight-title">Muhammad Rajaei Ahmad Mohd Zain</div>
            <div class="highlight-meta">📍 Madrid, Spain | September 3-5, 2025</div>
            <div class="highlight-quote">"Regular use of the OGAWA massage chair showed a favorable impact on bone turnover markers, supporting its role as a complementary non-pharmacologic strategy in post-menopausal bone health management."</div>
        </div>
    </div>

    

    <!-- ========== 5. Research Team Highlight ========== -->
    <h2 class="section-title">Research Team Highlight</h2>
    
    <div class="highlight-card reverse">
        <div class="highlight-image">
            <img src="<?= asset('img/technology/usm-asset-2.jpg') ?>" alt="Dr. Marilyn Ong">
        </div>
        <div class="highlight-content">
            <div class="highlight-badge">Sub-Project Lead</div>
            <div class="highlight-title">Dr. Marilyn Li Yin Ong</div>
            <div class="highlight-meta">Exercise and Sports Science Programme | Universiti Sains Malaysia</div>
            <div class="highlight-quote">"Automated Electric Massage Chair (AEMC) facilitated short-term autonomic recovery, with greater responsiveness in physically active participants. AEMC represents a practical tool to support ongoing engagement in physical activity and maximize health benefits."</div>
        </div>
    </div>

    <!-- ========== 6. Research Team ========== -->
    <h2 class="section-title">Research Team</h2>
    <div class="stats-grid" style="margin-bottom: 20px;">
        <div class="stat-item" style="min-width: 150px;">
            <div class="stat-label" style="font-size: 15px;">Prof. Hairul Anuar Hashim</div>
            <div class="stat-desc">Principal Investigator | Exercise & Sports Science</div>
        </div>
        <div class="stat-item" style="min-width: 150px;">
            <div class="stat-label" style="font-size: 15px;">Dr. Marilyn Li Yin Ong</div>
            <div class="stat-desc">Sub-Project Lead | Autonomic Recovery Study</div>
        </div>
        <div class="stat-item" style="min-width: 150px;">
            <div class="stat-label" style="font-size: 15px;">Muhammad Rajaei Ahmad Mohd Zain</div>
            <div class="stat-desc">Bone Health Research | Orthopaedics</div>
        </div>
        <div class="stat-item" style="min-width: 150px;">
            <div class="stat-label" style="font-size: 15px;">Dr. Norhasmah Mohd Zain</div>
            <div class="stat-desc">Healthcare Professionals Study</div>
        </div>
    </div>

<!-- ========== 7. Research Equipment ========== -->
    <h2 class="section-title">Research Equipment</h2>

    <style>
    @media (max-width: 768px) {
        .usm-equipment-mobile {
            flex-direction: column !important;
        }
        .usm-equipment-mobile img {
            margin-bottom: 20px;
        }
    }
    </style>

    <div class="usm-equipment-mobile" style="display: flex; flex-wrap: wrap; gap: 30px; align-items: center; background: #f0f4f8; border-radius: 20px; padding: 25px;">
        <div style="flex: 1; text-align: center;">
            <img src="<?= asset('img/technology/overseer-ai.jpeg') ?>" alt="OVERSEER AI System" style="max-width: 100%; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        </div>
        <div style="flex: 1.5;">
            <div class="publication-title" style="margin-bottom: 8px;">Automated massage chair with OVERSEER AI system</div>
            <div class="publication-journal" style="margin-bottom: 12px;">Automated Massage Chair with OVERSEER™ AI System</div>
            <ul class="info-list">
                <li>64 air compression chambers for full-body massage</li>
                <li>Multiple pre-programmed modes: Deep tissue, Master Choice, Spinal release</li>
                <li>Integrated biosensors for physiological monitoring</li>
                <li>Blood pressure and heart rate measurement devices (Omron)</li>
                <li>Biochemical marker analysis (ELISA) for cortisol, BDNF, eNOS, MPO</li>
                <li>Questionnaires: DASS-21, VAS for psychological assessment</li>
            </ul>
        </div>
    </div>

    <!-- ========== 8. Research Impact ========== -->
    <h2 class="section-title">Research Impact</h2>
    <div class="info-card" style="background: #e8f4f8;">
        <p style="margin: 0; font-style: italic; font-size: 16px;">"Automated massage chair therapy offers several advantages as a complementary healthcare approach. Its ease of use, lack of required commitment, and suitability for older adults or individuals with mobility issues make it a practical and inclusive option. Widespread implementation in public spaces including universities and hospitals could contribute to improved health equity."</p>
        <p style="margin-top: 15px; font-weight: 600;">— Prof. Hairul Anuar Hashim</p>
    </div>


    <!-- 合作信息 -->
    <div style="margin-top: 50px; padding: 20px 0; border-top: 1px solid #eef2f6; text-align: center;">
        <p style="color: #5a6e7c; font-size: 14px; margin-bottom: 5px;">OGAWA MALAYSIA Research & Innovation Series</p>
        <p style="color: #5a6e7c; font-size: 13px;">Curated by Datuk Lim Mee Ling, Ogawa Malaysia & Ogawa International</p>
        <p style="color: #5a6e7c; font-size: 12px; margin-top: 10px;">Joint Research Grant: Universiti Sains Malaysia - OGAWA Malaysia</p>
    </div>
</div>