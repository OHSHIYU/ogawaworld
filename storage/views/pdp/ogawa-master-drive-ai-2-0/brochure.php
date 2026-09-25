<?php
require VIEW_PATH . 'layout/header.php';

$base = rtrim(asset('img/pdp/ogawa-master-drive-ai-2-0'), '/');
$brochure = function(string $filename) use ($base) {
  return $base . '/' . rawurlencode($filename);
};
?>

<link rel="stylesheet" href="<?= asset('css/pdp/ogawa-master-drive-ai-2-0/brochure.css') ?>">
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
  <!-- Index Friendly -->
  <section class="index-section">
    <div class="container py-4">
      <h1 class="h1">OGAWA Master Drive AI 2.0</h1>
    </div>
  </section>

  <!-- 1 - OK -->
  <section class="hero">
    <img
      src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-01.webp') ?>"
      alt="OGAWA Master Drive AI 2.0 brochure — FA 1"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 2 - OK -->
  <section class="hero">
    <img
      src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-02.webp') ?>"
      alt="OGAWA Master Drive AI 2.0 brochure — FA 2"
      loading="eager"
      decoding="async"
    >
  </section>

  <!-- 3 - OK -->
  <section class="full-image-frame align-content-center">
    <img
      src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-03.webp') ?>"
      alt=""
      aria-hidden="true"
      class="bg-img"
      decoding="async"
      fetchpriority="high"
    >

    <div class="container position-relative py-5" style="z-index:1;">
      <div>
        <h2 class="h2 h2-lg fw-bold mb-1">AI 呵护 - 智能与生活的结合</h2>
        <h3 class="h3 h4-lg mb-3">
          AI Care - smart technology and healthy living at its best
        </h3>
        <hr class="hr-blue my-3">
        <div class="card-bg inline-block">
          <p class="mb-3">全新按摩境界来自 OGAWA Master Drive AI 2.0，他不只是普通的按摩椅，他是更聪明，更懂你的
            OGAWA AI 按摩机器人。采用人工智能，引领按摩行业进入AI智能按摩新时代；通过人脸识别、疲感侦测，
            根据身体情况定制按摩程序，将智能科技融入健康生活，是真正意义上的按摩机器人。
          </p>
          <p class="mb-0">
            The most immersive massage experience comes from the all-new OGAWA Master Drive AI 2.0. It is not  
            just a massage chair. It is your personal health assistant, OGAWA Master Drive AI 2.0 boosts advanced 
            artificial intelligence features: face recognition, Health Tracker and Scanner, and AI Powered Automated
            Analyst that give new meaninng to massage experience and health management so that you can enjoy life while 
            staying aware your state of wellbeing.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 4 - OK -->
  <section class="full-image-frame">
    <img
      src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-04.webp'); ?>"
      alt=""
      aria-hidden="true"
      class="bg-img"
      decoding="async"
    >

    <div class="container overlay bottom px-3" style="align-items: start;">
      <div class="d-flex mb-2">
          <span class="display-4 fw-semibold align-middle me-2" style="letter-spacing:1px;">AI</span>
          <div class="align-content-center text-start">
              <span class="h5 fw-semibold align-middle">科技・智能生活</span>
              <h3 class="h3 h4-lg">Technology, Intelligent Living</h3>
          </div>
      </div>

      <div class="card-bg inline-block">
        <p class="mb-3">
          OGAWA Master Drive AI 2.0 不仅高科技，更是善解人意，它是一“智慧大脑，集存储管理健康数据
          定制专属按摩程序于一体，让您真实感受为您量身定制的服务。
        </p>
        <p class="mb-0">
          It’s time to get personal. The all-new OGAWA Master Drive AI 2.0 is packed with algorithm
          solutions while an AI brain that is able to think and learn through collecting information
          from the cloud and processes to customize your very own massage.
        </p>
      </div>
    </div>
  </section>

  <!-- 5 - OK -->
  <section class="full-image-frame align-content-center height-1500-frame">
    <img
      src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-05.webp') ?>"
      alt=""
      aria-hidden="true"
      class="bg-img"
      style="object-position: center top;"
      decoding="async"
    >

    <div class="overlay">
      <div class="d-flex justify-content-end">
          <div class="card-bg inline-block">
              <div class="fw-bold">创新疲感追踪&trade; 科技</div>
              <div>Health Tracker and Scanner&trade; Technology</div>
          </div>
      </div>

      <div class="fw-semibold text-justify p-4">
        <div class="mb-5">
          <p class="mb-3">
            OGAWA 创新研发的疲感追踪&trade; 科技，是集成侦测、分析、按摩建议以及程序推送的闭环式按摩管理系统。
            通过全路径追踪，健康管理云平台、AI 算法、智能匹配个性化按摩程序，即时缓解疲劳，舒活全身。
          </p>
          <p>
            The innovative OGAWA Health Tracker and Scanner&trade; technology is a closed-loop therapeutic
            system that ties real-time detection, analysis and massage recommendation with personalized
            programme delivery through a host of smart technologies from trackers, health management
            cloud, AI-Powered Automated Analyst and massage programme personalisation based on your
            body’s unique needs. Making every massage session unique.
          </p>
        </div>
        
        <div>
          <p class="mb-3">
            AI 按摩机器人配备 GSR-SPO2 双传感疲劳检测器。GSR 皮电反应传感器通过手掌皮肤接触，准确捕捉身体
            能量信息，寻找酸痛点。SPO2 脉搏血氧传感器检测经过人体血液和组织吸收后的反射光强度，计算心率值。
            从而配合用户基本身体指标，为您匹配更为精准、有效的按摩方案。
          </p>
          <p class="mb-0">
            The AI Massage Robot is equipped with Galvanic Skin Response (GSR) sensor and Peripheral
            Capillary Oxygen Saturation (SpO2) sensor. GSR sensor accurately captures information of
            our body-load through skin contact to locate fatigue points, and SpO2 sensor assesses vital
            signs including heart rate and blood oxygen level. So that Master Drive AI 2.0 is able to
            customise the best suitable massage programme for the user by utilizing these personalised
            health profile and data.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 6 - OK -->
  <section class="full-image-frame height-1500-frame">
    <img
      src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-06.webp') ?>"
      alt=""
      aria-hidden="true"
      class="bg-img"
      style="object-position: center top;"
      decoding="async"
    >

    <div class="overlay">
      <div class="card-bg inline-block" style="align-self: start;">
        <div class="fw-bold">AI智能算法・智能匹配</div>
        <div>AI-Powered Automated Analyst</div>
      </div>

      <div class="s6-text u-pos text-justify max-width-50">
        <p class="mb-3">
          从个人基础参数到用户画像，用户模型建立到用户族群划分，并通过不断优化、升级 AI 算法；
          推荐多达 5184 种更多样化的按摩程序，真正实现千人千方；提供定制精准的健康解决方案，
          让用户享受愉悦、先进的美好生活。您再也不用选择困难，一键点击即可立刻给您最适合、最专属的程序，
          轻松享受按摩！
        </p>
        <p class="mb-3">
          The Master Drive AI 2.0 has up to 5184 massage combinations to provide health solutions.
          The brain behind is the smart AI-Powered Automated Analyst that uses algorithms to manage
          masses of data and program a list of recommended solutions that precisely target your problem,
          while you enjoy the best comfort and relaxation on your massage chair.
        </p>
        <p class="mb-0">
          The AI-Powered Automated Analyst is there to give you the best for every massage session at
          the touch of a button – it’s individual, personal and fast.
        </p>
      </div>
    </div>
  </section>

  <!-- 7 - OK -->
  <section class="full-image-frame align-content-center">
    <img
      src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-07.webp') ?>"
      alt=""
      aria-hidden="true"
      class="bg-img"
      style="object-position: center top;"
      decoding="async"
    >

    <!-- right-aligned blue panel like mock -->
    <div class="overlay d-flex align-items-center justify-content-center">
      <div class="col-12 col-xl-8 ms-auto">
        <div class="card-bg text-justify inline-block p-4 p-lg-5">
          <div class="sec7-title mb-3">
            <div class="fw-bold">AI 按摩机器人得力助手</div>
            <div>Get more done with Your AI Assistant</div>
          </div>
          <hr class="hr-white my-3">

          <p class="mb-3">
            新科技的突破，将 AI 融入生活，以 AI 按摩机器人得力助手的身份，建立家庭智能健康生态系统，
            AI 看得见、听得到、为您带来贴心、便捷、愉悦的使用体验。
          </p>
          <p class="mb-0">
            “Hey OGAWA, now we’re talking!” The OGAWA AI Personal Assistant enables direct communication
            with your massage chair. It knows you, gets better every day and manages your health needs.
            It constantly learns everything about your health profile and navigates the best massage
            solution to you.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 8 — OK -->
  <section class="full-image-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-08.webp') ?>" alt="" aria-hidden="true"
        class="bg-img" style="object-position: center top;" decoding="async">

    <div class="overlay">
      <div class="s8-item-title u-pos text-white">
        <h2 class="h4 m-0">AI人脸识别登录</h2>
        <h2 class="h4">Face Recognition</h2>
      </div>

      <div class="s8-item-chi u-pos">
        <p class="text-white text-justify m-0">快速、精准识别用户，告别复杂的帐号及密码！</p>
      </div>

      <div class="s8-item-eng u-pos bottom">
        <p class="text-white text-justify m-0">
          It recognizes people. Just scan your face, you can get 
          started and access to your personal prodile instantly.
        </p>
      </div>
    </div>
  </section>

  <!-- 9 — OK -->
  <section class="full-image-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-09.webp') ?>" alt="" aria-hidden="true"
        class="bg-img" style="object-position: center top;" decoding="async">

    <div class="overlay">
      <div class="s9-item-title u-pos text-white">
        <h2 class="h4 m-0">语音智能交互</h2>
        <h2 class="h4">Voice Command Control</h2>
      </div>

      <div class="s9-item-chi u-pos">
        <p class="text-white text-justify m-0">
          轻松操控，无“语”伦比的体验！智能语音交互能快速响应语音指令，
          无需抬手操控，畅享沉浸式按摩体验。
        </p>
      </div>

      <div class="s9-item-eng u-pos bottom">
        <p class="text-white text-justify m-0">
          Massage chair does what you tell it to! Just voice.
          You can quickly access your chair's most used settings
          without using the controller. It speaks English, Chinese
          and Cantonese.
        </p>
      </div>
    </div>
  </section>

  <!-- 10 — OK -->
  <section class="s10 full-image-frame height-1500-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-10.webp') ?>" alt="" aria-hidden="true"
        class="bg-img" style="object-position: center top;" decoding="async">

    <div class="overlay container justify-content-center py-5">
      <div class="container-fluid">
        <div class="row g-0">
          <div class="text-justify align-content-center card-bg inline-block col-12 col-md-6">
            <div class="mb-3">
              <div class="fw-bold">与时代共进，令人一见倾心</div>
              <div>Forward Thinking For A Refined Performance</div>
            </div>
            <hr class="hr-white my-3">

            <p class="mb-3 fw-medium">
              M.6 GEN 第六代机芯：处理速度更快、精确度更高，能即时响应并准确依据您的需求调整按摩，
              赋予机器多维协同运行的能力，让按摩手法如真人般灵活多变。
            </p>
            <p class="mb-0 fw-medium">
              M.6 GEN encompasses an array of key technological advancements that synergize to output
              impressively responsive and high-accuracy humanised massages.
            </p>
          </div>

          <div class="col-12 col-md-6" style="text-align: -webkit-center;">
            <div class="pos-relative">
              <img class="height-300-img" src="<?= $brochure('Asset 8.webp') ?>" alt="Indulgence">
              <span class="u-pos tile-label h3">Indulgence</span>
            </div>
            <div class="pos-relative">
              <img class="height-300-img" src="<?= $brochure('Asset 6.webp') ?>" alt="Performer">
              <span class="u-pos tile-label h3">Performer</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 11 — OK -->
  <section class="s11 full-image-frame height-2000-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-11.webp') ?>"
        alt="" aria-hidden="true"
        class="bg-img" style="object-position:center top;" decoding="async">

    <div class="overlay container py-5 justify-content-center" style="text-align: -webkit-center;">
      <div class="container-fluid">
        <div class="row g-0">
          <!-- Left -->
          <div class="col-12 col-md-6">
            <div class="pos-relative">
              <img class="height-300-img" src="<?= $brochure('Asset 7.webp') ?>" alt="Wellness">
              <span class="u-pos tile-label h3">Wellness</span>
            </div>
            <div class="pos-relative">
              <img class="height-300-img" src="<?= $brochure('Asset 5.webp') ?>" alt="Lifestyle">
              <span class="u-pos tile-label h3">Lifestyle</span>
            </div>
          </div>

          <!-- Right -->
          <div class="col-12 col-md-6">
            <div class="circle-badge">
                <img class="height-300-img" src="<?= $brochure('Asset 1.webp') ?>" alt="Microprocessor">
            </div>

            <!-- overlapping -->
            <div class="card-bg text-center fw-semibold mb-4 rounded-3" style="padding: 1rem;">
                <div>第六代四核处理器</div>
                <div>6th generation microprocessor</div>
            </div>

            <div class="text-justify">
              <p class="mb-3 fw-medium">
                凭精准及加大的计算量，可快速传达、处理和协调每一项指令，同时通过中央指令及核心启动器达到 4D 模式，
                带来流畅细腻的多维按摩体验。
              </p>
              <p class="mb-0 fw-medium">
                With control accuracy and increased computing capability, it is able to deliver, process and
                coordinate each command faster and accurately through the central command and core drive.
                Thus, the 4D mode for a multi-dimensional massage experience is achieved.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 12 — OK -->
  <section class="full-image-frame height-2000-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-12.webp') ?>" alt="" aria-hidden="true"
        class="bg-img" style="object-position: center top;" decoding="async">

    <div class="overlay container py-5 justify-content-center">
      <div class="d-flex px-3">
        <div class="w-50 me-3">
          <div class="circle-badge">
            <img src="<?= $brochure('Asset 2.webp') ?>" alt="Brushless DC Motor">
          </div>
          <div class="card-bg text-center fw-semibold mb-4 rounded-3" style="padding: 1rem;">
              <h3 class="h3">DC 无刷马达</h3>
              <h3 class="h3">Brushless DC Motor</h3>
          </div>

          <div class="text-justify">
            <p class="mb-3">
              告别传统有刷马达，升级为NIDEC无刷马达。业界率先采用高精密控制技术的无刷马达，数字变频调控，
              能够更精细的掌控反应变化，明显的感受到更灵活，细腻，到位的按摩。
            </p>
            <p>
              Say goodbye to traditional brush motors. OGAWA is the industry's first to suit brushless
              DC motor in massage chair to maximize data computing performance and analytics in fractions
              of a second. This not only elevates the massage precision to a new level, but also offers a 
              more humanlike experience.
            </p>
          </div>

          <div style="place-items: center;">
            <h4 class="h6">有刷电机 vs 无刷电机 | Brush Motor vs Brushless Motor</h4>
            <ul class="mb-0">
              <li>耐用性能提升100% | Durability increased by 100%</li>
              <li>低速扭力增强35% | Torque efficiency increased by 35%</li>
              <li>电机体积缩小60% | Motor size compacted by 60%</li>
              <li>电机重量降低58% | Motor weight is 58% lighter</li>
            </ul>
          </div>
        </div>

        <div class="w-50">
          <div class="circle-badge">
            <img src="<?= $brochure('Asset 3.webp') ?>" alt="AI Precision Sensors">
          </div>
          <div class="card-bg text-center fw-semibold mb-4 rounded-3" style="padding: 1rem;">
              <h3 class="h3">AI 精密传感器</h3>
              <h3 class="h3">AI Precision Sensors</h3>
          </div>

          <div class="text-justify">
            <p class="mb-3">
              遍布多个精密传感器，实现毫米级控制精度，让每一次按摩都精确到位。机芯的
              控制精度越小，即可实现更丰富的按摩手打，按摩速度更柔和多变。
            </p>
            <p>
              Technology to the point with eyes all around you. Like an extra set of 
              eyes, the precision sensors are dynamically integrated for the greatest 
              accuracy, richer human-touch massage experience and more speed ranges.
            </p>
          </div>

          <div class="text-start">
            <ul class="mb-0">
              <li>
                转速传感器 - 按摩定位更准确<br>
                Speed sensor - For more accurate massage positioning
              </li>
              <li>
                温度传感器 - 打造温度好按摩<br>
                Temperature sensor - For the optimum temperature for massage therapy
              </li>
              <li>
                位置传感器 - 靶向定位更准确<br>
                Position sensor - For more accurate acupressure
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 13 — OK -->
  <section class="full-image-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-13.webp') ?>" alt="" aria-hidden="true"
        class="bg-img" style="object-position: center top;" decoding="async">

    <div class="overlay container py-5 justify-content-center">
      <div class="d-flex px-3 align-items-center">
        <div>
          <div class="card-bg text-center mb-4 rounded-3" style="padding: 1rem;">
              <h3 class="h3">新一代4D 御手温感</h3>
              <h3 class="h3">The invigorating 4D Thermo Rollers</h3>
          </div>
          <div class="text-justify">
            <p class="mb-3 fw-medium">
              采用按摩轮快速加热技术&trade;，在2分半钟内可升温至约50℃，保持恒温，像按摩师的双手，揉捏出有温度的好按摩，
              深层放松背部紧绷肌肉，释放脊椎压力。
            </p>
            <p class="mb-0 fw-medium">
              The invigorating 4D Thermo Rollers are integrated with Extreme Speed Heating Massage Wheel Technology&trade;
              that can heat up to approximately 50℃ in 2.5 minutes, offer strong yet delicate touch like 
              human hands that deeply relaxes the tight muscles in the back and releases spinal pressure.
            </p>
          </div>
        </div>

        <img class="height-300-img" src="<?= $brochure('Asset 4.webp') ?>" alt="Thermo roller">
      </div>
    </div>
  </section>

  <!-- 14 — OK -->
  <section class="s16 full-image-frame height-1800-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-14.webp') ?>" alt="" aria-hidden="true"
        class="bg-img" style="object-position:center top" decoding="async">

    <div class="overlay p-0">
      <div class="container-fluid p-0 h-100">
        <div class="row g-0 h-100">
          <!-- LEFT -->
          <div class="card-bg col-12 col-md-6 align-content-center">
            <div class="text-start">
              <h3 class="h3">从头至尾的至尊享受</h3>
              <h3 class="h3">Highest degree of comfort from head-to-toe</h3>
            </div>
            <hr class="hr-white">
            <div class="text-justify">
              <p class="mb-3">
                3D包覆式膝盖 · 小腿 · 足底温感按摩，呵护周到。
              </p>
              <p>
                Immerse yourself in a true oasis of comfort with the exclusive 3D
                Calf, Knee and Foot Massage with Heat Therapy.
              </p>
            </div>
          </div>

          <!-- RIGTH -->
          <div class="col-12 col-md-6 align-content-center p-2">
            <div class="s16-right-item mb-3">
              <div class="mb-2 d-flex" style="align-items: flex-end;">
                <img class="height-300-img" src="<?= $brochure('Asset 9.webp') ?>" alt="Knee">
                <h4 class="h4 mb-1 fw-bold"><span class="me-2">膝盖</span>KNEE</h4>
              </div>

              <div class="text-justify">
                <p class="mb-1">
                  以气囊夹按 + 温感热敷双效结合，有助于通经活络，消除腹胀，
                  达到调养脾胃的效果，为膝关节提供特别呵护。
                </p>
                <p class="mb-0">
                  Combination of airbags and heat therapy targeting at knee joints,
                  effectively to help regulate blood circulation and liver function, 
                  as well as to relieve gastric and bloating function.
                </p>
              </div>
            </div>

            <div class="s16-right-item mb-3">
              <div class="mb-2 d-flex" style="align-items: flex-end;">
                <img class="height-300-img" src="<?= $brochure('Asset 10.webp') ?>" alt="Calf">
                <h4 class="h4 mb-1 fw-bold"><span class="me-2">小腿</span>CALF</h4>
              </div>

              <div class="text-justify">
                <p class="mb-1">
                  小腿是久站人群最容易疲劳的部位。采用气囊夹按捏法，对小腿肌肉循环
                  按压，促进血液循环及舒缓关节疼痛，同时达到瘦腿的效果。
                </p>
                <p class="mb-0">
                  The energising calf pressure massage with airbags delivers a soothing
                  reflexology benefit to promote blood circulation and relieve joint pain,
                  while achieving the effect of thin legs.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 15 — OK -->
  <section class="s15 full-image-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-15.webp') ?>" alt="" aria-hidden="true"
        class="bg-img" style="object-position:center top" decoding="async">

    <div class="overlay container py-5">
        <div class="u-pos max-width-50" style="--pos-left: 6%; --pos-top: 6%;">
          <div class="mb-2 d-flex" style="align-items: flex-end;">
            <img class="height-120-img" src="<?= $brochure('Asset 11.webp') ?>" alt="Feet">
            <div>
              <h4 class="h4 mb-1 fw-bold"><span class="me-2">足</span>FOOT &amp; SOLE</h4>
            </div>
          </div>

          <div class="text-justify">
            <p class="mb-1">
              全新升级脚底揉压技术，脚底滚轮结合位置检测功能，可精准感测脚底穴位，让足底按摩更细腻丰富，为双脚透彻解疲。
            </p>
            <p class="mb-0">
              Newly upgraded reflexology technology — massage rollers with positioning detector accurately target acupressure
              points, giving holistic relief to your foot and sole.
            </p>
          </div>
        </div>
    </div>
  </section>

  <!-- 16 — OK -->
  <section class="s16 full-image-frame height-1800-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-16.webp') ?>" alt="" aria-hidden="true"
        class="bg-img" style="object-position:center top" decoding="async">

    <div class="overlay p-0">
      <div class="container-fluid p-0 h-100">
        <div class="row g-0 h-100">
          <!-- LEFT -->
          <div class="card-bg align-content-center col-12 col-md-6">
            <div class="text-start">
              <h3 class="h3">AI 护有加</h3>
              <h3 class="h3">Luxury is where function meets fascination</h3>
            </div>
            <hr class="hr-white">
            <p class="text-justify">
              全新Master Drive AI 2.0每一处设计细节都经过仔细斟酌，宪章出价值，智慧与享受的融合，
              实现高水平的素质。<br>
              The all-new Master Drive AI 2.0 is available with a wealth of intriguing and useful
              features designed to enrich your life. Combining value, ingenuity and enjoyment, 
              they add up to class-leading luxury.
            </p>
          </div>

          <!-- RIGTH -->
          <div class="align-content-center col-12 col-md-6 p-3">
            <div class="s16-right-item mb-3">
              <div class="text-start">
                <h3 class="h5">1.35米加长型按摩导轨</h3>
                <h3 class="h5">1.35m Extended Coverage with Precision Scanning</h3>
              </div>
              <hr class="hr-blue">
              <div class="d-flex align-items-center">
                <img class="height-120-img" src="<?= $brochure('Asset 12.webp') ?>" alt="">
                <div class="text-justify">
                  <p class="mb-3">
                    既深度贴合背部曲线，又全面覆盖从颈部到臀部的身体疲劳部位，让不同身型，
                    都能畅想全方位按摩。
                  </p>
                  <p>
                    The Master Drive AI 2.0 features an ultra-long 1.35m massage L-track that 
                    contours from the neck all the way down to the buttocks, everyone can enjoy
                    full coverage regardless of big or small frame.
                  </p>
                </div>
              </div>
            </div>

            <div class="s16-right-item mb-3">
              <div class="text-start">
                <h3 class="h5">360&deg; 气压按摩</h3>
                <h3 class="h5">360&deg; Air Compression Massage</h3>
              </div>
              <hr class="hr-blue">
              <div class="d-flex align-items-center">
                <img class="height-120-img" src="<?= $brochure('Asset 12.webp') ?>" alt="">
                <div class="text-justify">
                  <p class="mb-3">
                    配有 360&deg; 气压设计，达到脉冲式气压按摩，有效加快人体血液循环速度，
                    减轻心脏压力，加强人体经络运行。
                  </p>
                  <p>
                    Air compression massage stimulates blood circulation and strengthens metablism
                    to achieve a better overall well-being.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 17 — OK -->
  <section class="s17 full-image-frame height-1500-frame">
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-17.webp') ?>" alt="" aria-hidden="true"
        class="bg-img" style="object-position:center top" decoding="async">

    <div class="overlay container py-5 justify-content-center">
      <div class="s17-item mb-3 d-flex">
        <img class="height-120-img" src="<?= $brochure('Asset 14.webp') ?>" alt="">

        <div class="s17-item-text text-start">
          <h3 class="h3">M Drive 一键启动</h3>
          <h3 class="h3">M Drive Navigator</h3>
          <hr class="hr-blue my-3">
          <p>你现在可操控一切。M Drive一键快捷启动，亦可快速切换按摩部位及力度。</p>
          <p>
            Now you are in control. Conveniently places on the armrest, the M Drive Navigator
            gives you complete command at your fingertips. Push start to power up, turn the dial a 
            notch to seamlessly calibrate the massage depth, intensity and the position of the massage chair.
          </p>
        </div>
      </div>

      <div class="s17-item mb-3 d-flex">
        <img class="height-120-img" src="<?= $brochure('Asset 15.webp') ?>" alt="">

        <div class="s17-item-text text-start">
          <h3 class="h3">蓝牙立体环绕音响</h3>
          <h3 class="h3">Surround Sound Speakers with Bluetooth Connectivity</h3>
          <hr class="hr-blue my-3">
          <p>蓝牙立体环绕音响，搭配LED主题舒缓灯，悠然坐享天籁之音，提升全感官按摩体验，让你身心灵全释放。</p>
          <p>
            Immerse yourself in a depper state relaxation. Connect and play your favourite
            music via mobile device.
          </p>
        </div>
      </div>

      <div class="s17-item d-flex">
        <img class="height-120-img" src="<?= $brochure('Asset 16.webp') ?>" alt="">

        <div class="text-start">
          <h3 class="h3">元气光疗</h3>
          <h3 class="h3">LED Phototherapy</h3>
          <hr class="hr-blue my-3">
          <p>7种LED主题舒缓灯，促进代谢与排毒，让您焕然一新，激活身心。</p>
          <p>
            7-theme LED lights release tiredness and activate the mind and body.
          </p>
        </div>
      </div>
  </section>

  <!-- 18 — TBD -->
  <section>
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-18.webp') ?>" alt="OGAWA back cover" loading="lazy" decoding="async">
  </section>

  <!-- 19 — TBD -->
  <section>
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-19.webp') ?>" alt="OGAWA back cover" loading="lazy" decoding="async">
  </section>

  <!-- 20 — OK -->
  <section>
    <img src="<?= $brochure('OGAWA Master Drive AI 2.0 Brochure FA-20.webp') ?>" alt="OGAWA back cover" loading="lazy" decoding="async">
  </section>
</div>

<?php include __DIR__ . '/../../../../app/services/schema-product-generic.php'; ?>
<?php require VIEW_PATH . 'layout/footer.php'; ?>
