<link rel="stylesheet" href="<?= asset('css/home.css') ?>">
<!-- <link rel="stylesheet" href="<?= asset('css/animate.css') ?>"> -->
<link rel="stylesheet" href="<?= asset('css/vbar.css') ?>">
<link rel="stylesheet" href="<?= asset('css/float.css') ?>">
<link rel="stylesheet" href="<?= asset('css/home-promo.css') ?>">

<!-- HERO VIDEO -->
<section class="hero" aria-label="Hero video">
  <video class="hero-video"
        autoplay muted loop playsinline
        preload="none">
    <source src="<?= asset('img/home/maestro-video.mp4') ?>" type="video/mp4">
  </video>
</section>

<!-- MEISTER HERO -->
<section class="meister-hero">
  <img 
    src="<?= asset('img/home/meastro banner.webp') ?>"
    alt=""
    class="meister-bg"
    loading="lazy"
    decoding="async">
</section>

<!-- MOTTO x PRODUCT HERO -->
<section class="motto-hero">
  <div class="motto-left">
    <div class="motto-inner vbar-track" data-reveal="slide-right">
      <div class="eyebrow-title text-white">OUR MOTTO</div>
      <div class="motto-copy text-white">
        <p>
          At Ogawa, we are dedicated to redefining relaxation and wellness through our innovative and 
          advanced massage chairs. Our mission is to revolutionize the way people think about self-care 
          and well-being, one massage chair at a time.<br><br>
          As a leading brand of premium massage chairs, we prioritize quality, comfort, and cutting-edge 
          technology to provide the best possible relaxation experience for our customers.
        </p>
      </div>
    </div>
  </div>

  <img src="<?= asset('img/home/home-motto.png') ?>" alt="Ogawa BIOVIS massage chair"
     width="1200" height="900" class="motto-right" loading="lazy" decoding="async" data-reveal="zoom-in" data-delay="120">
</section>

<!-- PROMO BANNERS -->
<?php
  $leftPanel   = $promoBanners['left'] ?? null;
  $rightTop    = $promoBanners['right_top'] ?? null;
  $rightBottom = $promoBanners['right_bottom'] ?? null;

  if ($leftPanel || $rightTop || $rightBottom):
?>

<section class="promo-banners">
    <div class="container">
      <!-- LEFT BIG -->
      <?php if ($leftPanel):
        $img  = htmlspecialchars($leftPanel['image_url'] ?? '', ENT_QUOTES);
        $head = htmlspecialchars($leftPanel['heading'] ?? '', ENT_QUOTES);
        $sub  = htmlspecialchars($leftPanel['subheading'] ?? '', ENT_QUOTES);
        $cta  = htmlspecialchars($leftPanel['cta_text'] ?? '', ENT_QUOTES);
        $url  = htmlspecialchars($leftPanel['cta_url'] ?? '#', ENT_QUOTES);
      ?>
        <div class="promo-big">
          <?php if ($img): ?>
            <img src="<?= asset('uploads/' . ltrim($img, '/')) ?>" class="promo-img" alt="">
          <?php endif; ?>

          <div class="promo-content">
            <h2><?= $head ?></h2>

            <?php if ($sub): ?>
              <p><?= $sub ?></p>
            <?php endif; ?>

            <?php if ($cta && $url): ?>
              <a href="<?= $url ?>" class="promo-cta">
                <?= $cta ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>

      <!-- RIGHT STACK -->
      <div class="promo-right">
        <!-- RIGHT TOP -->
        <?php if ($rightTop):
          $img  = htmlspecialchars($rightTop['image_url'] ?? '', ENT_QUOTES);
          $head = htmlspecialchars($rightTop['heading'] ?? '', ENT_QUOTES);
          $sub  = htmlspecialchars($rightTop['subheading'] ?? '', ENT_QUOTES);
          $cta  = htmlspecialchars($rightTop['cta_text'] ?? '', ENT_QUOTES);
          $url  = htmlspecialchars($rightTop['cta_url'] ?? '#', ENT_QUOTES);
        ?>
        <div class="promo-small">
          <?php if ($img): ?>
            <img src="<?= asset('uploads/' . ltrim($img, '/')) ?>" class="promo-img" alt="">
          <?php endif; ?>

          <div class="promo-content">
            <h3 class="m-0"><?= $head ?></h3>

            <?php if ($sub): ?>
              <p class="m-0"><?= $sub ?></p>
            <?php endif; ?>

            <?php if ($cta && $url): ?>
              <a href="<?= $url ?>" class="promo-cta">
                <?= $cta ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>

        <!-- RIGHT BOTTOM -->
        <?php if ($rightBottom):
          $img  = htmlspecialchars($rightBottom['image_url'] ?? '', ENT_QUOTES);
          $head = htmlspecialchars($rightBottom['heading'] ?? '', ENT_QUOTES);
          $sub  = htmlspecialchars($rightBottom['subheading'] ?? '', ENT_QUOTES);
          $cta  = htmlspecialchars($rightBottom['cta_text'] ?? '', ENT_QUOTES);
          $url  = htmlspecialchars($rightBottom['cta_url'] ?? '#', ENT_QUOTES);
        ?>
        <div class="promo-small">
          <?php if ($img): ?>
            <img src="<?= asset('uploads/' . ltrim($img, '/')) ?>" class="promo-img" alt="">
          <?php endif; ?>

          <div class="promo-content">
            <h3 class="m-0"><?= $head ?></h3>

            <?php if ($sub): ?>
              <p class="m-0"><?= $sub ?></p>
            <?php endif; ?>

            <?php if ($cta && $url): ?>
              <a href="<?= $url ?>" class="promo-cta">
                <?= $cta ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
</section>

<?php endif; ?>

<!-- POWERED BY OVERSEER -->
<section class="overseer" id="overseer">
  <div class="container">

    <header class="overseer-head" data-reveal="fade-up" data-delay="0">
      <h3 class="band-title">
        <picture>
          <source srcset="<?= asset('img/home/overseer-title.avif') ?>" type="image/avif">
          <img
            src="<?= asset('img/home/overseer-title.png') ?>"
            alt="POWERED BY OVERSEER™"
            width="1200" height="140"
            loading="lazy" decoding="async"
            class="band-title-img">
        </picture>
      </h3>
      <p class="small-title" data-reveal="fade-up" data-delay="180">Fostering Wellness and Relaxation Around the World</p>
    </header>

    <?php
    $features = [
      [
        'title'=>"PREMIUM MASSAGE TECHNOLOGY",
        'body'=>"Experience the luxury of advanced massage technology designed to alleviate stress, tension, and discomfort. Our massage chairs are meticulously engineered to deliver unparalleled relaxation and rejuvenation.",
        'img'=>asset('img/home/overseer-desc1.avif'),
        'reverse'=>false,
        'cta'=>['Know More','technology/overseer']
      ],
      [
        'title'=>"PRECISION DIAGNOSTIC SYSTEM",
        'body'=>"Tailor your massage experience to your unique preferences with our customizable wellness features. From targeted massage techniques to personalized settings, our chairs are designed to meet your individual relaxation needs.",
        'img'=>asset('img/home/overseer-desc2.avif'),
        'reverse'=>true,
        'cta'=>['Explore Options','technology/overseer']
      ],
      [
        'title'=>"INNOVATIVE DESIGN",
        'body'=>"Immerse yourself in stylish and ergonomic design that complements your home while providing exceptional comfort. Our massage chairs are crafted with a focus on aesthetics, functionality, and durability.",
        'img'=>asset('img/home/overseer-desc3.avif'),
        'reverse'=>false,
        'cta'=>['Learn More','technology/overseer']
      ],
    ];
    foreach($features as $f): ?>
      <div class="feature-grid<?= $f['reverse'] ? ' reverse' : '' ?>">
        <div class="feature-text" data-reveal="fade-up" data-delay="0">
          <h3><?= htmlspecialchars($f['title'], ENT_QUOTES, 'UTF-8') ?></h3>
          <p><?= htmlspecialchars($f['body'], ENT_QUOTES, 'UTF-8') ?></p>
          <a class="btn-ghost" href="<?= url($f['cta'][1]) ?>"><?= htmlspecialchars($f['cta'][0], ENT_QUOTES, 'UTF-8') ?> <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="feature-media">
          <img class="fx-float-y" src="<?= $f['img'] ?>" alt="Overseer feature image" loading="lazy" decoding="async" data-reveal="fade-up" data-delay="120" width="800" height="600">
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- OVERLAY -->
<section class="overlay">
  <img class="overlay-bg"
       src="<?= asset('img/home/overlay-img1.avif'); ?>"
       alt="Ogawa global presence — world map collage"
       loading="lazy" decoding="async" width="1600" height="900">
    <div class="overlay-card" data-reveal="slide-left">
      <div class="vbar-track">
        <div class="eyebrow-title text-white">WHY OGAWA</div>
        <h3 class="mb-2">A Commitment to Excellence in Manufacturing</h3>
        <p class="overlay-copy">
          Driven by a passion for wellness and innovation, Ogawa Wellness takes a 
          unique approach to manufacturing massage chairs. We combine state-of-the-art 
          techniques with a dedication to craftsmanship to create unparalleled relaxation 
          solutions that enhance the lives of our customers.
        </p>
        <a class="btn-ghost btn-ghost--light" href="<?= url('about') ?>">About Us <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
</section>

<!-- NUMBERS -->
<section class="numbers">
  <div class="numbers-grid">
    <div class="numbers-media" data-reveal="slide-right" data-delay="0">
      <img
        src="<?= asset('img/home/number-img1.avif'); ?>"
        alt="Ogawa lifestyle — ambient setup"
        loading="lazy" decoding="async" width="1200" height="800">
    </div>
    <div class="numbers-right">
      <h2 class="section-title numbers-title" data-reveal="fade-up">Ogawa In Numbers</h2>
      <div class="nums" role="list">
        <div class="num" data-reveal="fade-up" data-delay="0" role="listitem">
          <div class="value">100+</div>
          <div class="label">PRODUCT MODELS</div>
        </div>
        <div class="num" data-reveal="fade-up" data-delay="120" role="listitem">
          <div class="value">Millions+</div>
          <div class="label">SATISFIED CUSTOMERS</div>
        </div>
        <div class="num" data-reveal="fade-up" data-delay="240" role="listitem">
          <div class="value">100+</div>
          <div class="label">PATENTED IP</div>
        </div>
        <div class="num" data-reveal="fade-up" data-delay="360" role="listitem">
          <div class="value">30+</div>
          <div class="label">COUNTRIES SERVED</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- OGAWA GROUP – GLOBAL SCALE -->
<section class="group-hero" id="ogawa-group">
  <picture>
    <source srcset="<?= asset('img/home/global-img1.avif') ?>" type="image/avif">
    <img
      class="group-hero__bg"
      src="<?= asset('img/home/global-img1.jpg') ?>"
      alt=""
      aria-hidden="true"
      loading="lazy"
      decoding="async" width="1920" height="1080">
  </picture>

  <div class="container group-hero__grid">
    <div class="group-hero__copy vbar-track vbar-dark" data-reveal="fade-up">
      <p class="eyebrow-title">OGAWA GROUP</p>
      <h2>LEADING ON A GLOBAL SCALE</h2>

      <p>
        A leading brand in the arena of health-care and wellness, 
        OGAWA has established global presence in 5 continents with 
        more than 800 outlets worldwide.
      </p>

      <a class="btn-ghost group-cta" href="<?= url('about') ?>">
        Explore Now <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- OGAWA FRIENDS -->
<?php if (!empty($friendsVideos)): ?>
  <section class="friends">
    <div class="container friends-grid">
      <!-- Left: Player -->
      <div class="friends-player" data-reveal="fade-up">
        <?php
          $first = $friendsVideos[0] ?? null;
          $firstIdRaw = $first['id'] ?? '';
          $firstId    = htmlspecialchars($firstIdRaw, ENT_QUOTES, 'UTF-8');

          $firstThumbRaw = $first['thumb']
            ?? "https://img.youtube.com/vi/{$firstIdRaw}/maxresdefault.jpg";
          $firstPoster   = htmlspecialchars($firstThumbRaw, ENT_QUOTES, 'UTF-8');
        ?>
        <div class="player-shell"
            data-yt-id="<?= $firstId ?>"
            data-thumb="<?= $firstPoster ?>">
          <img class="player-poster"
              src="<?= $firstPoster ?>"
              alt="Video poster"
              loading="lazy"
              decoding="async"
              width="1280"
              height="720">
          <button class="player-play" type="button" aria-label="Play video"><span>▶</span></button>
        </div>

        <p class="mt-2">
          <a class="btn-ghost" id="friends-open-youtube"
            href="https://www.youtube.com/watch?v=<?= $firstId ?>"
            target="_blank" rel="noopener">
            Open on YouTube <span>↗</span>
          </a>
        </p>
      </div>

      <!-- Right: Text-only selector -->
      <div class="friends-side" data-reveal="slide-left">
        <p class="eyebrow-title">OGAWA FRIENDS</p>
        <h2 class="section-title">Stories & Tips from Friends</h2>

        <ul class="friends-list" role="list">
          <?php foreach ($friendsVideos as $i => $v):
            $vid   = htmlspecialchars($v['id'], ENT_QUOTES, 'UTF-8');
            $tit   = htmlspecialchars($v['title'] ?? 'Video', ENT_QUOTES, 'UTF-8');
            $thumb = htmlspecialchars($v['thumb'] ?? '', ENT_QUOTES, 'UTF-8');
            $active = $i === 0 ? ' is-active' : '';
          ?>
          <li class="friend-item<?= $active ?>">
            <button class="friend-card" type="button"
                    data-yt-id="<?= $vid ?>"
                    data-thumb="<?= $thumb ?>"
                    aria-label="Play: <?= $tit ?>"
                    aria-pressed="<?= $i===0 ? 'true' : 'false' ?>">
              <div class="friend-meta">
                <div class="friend-title"><?= $tit ?></div>
              </div>
              <span class="friend-arrow" aria-hidden="true">▶</span>
            </button>
          </li>
          <?php endforeach; ?>
        </ul>

        <noscript>
          <p>JavaScript is required to switch videos here. You can still watch them on YouTube:</p>
          <ul>
            <?php foreach ($friendsVideos as $v): ?>
              <li><a href="https://www.youtube.com/watch?v=<?= htmlspecialchars($v['id'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">
                <?= htmlspecialchars($v['title'] ?? 'Video', ENT_QUOTES, 'UTF-8') ?></a></li>
            <?php endforeach; ?>
          </ul>
        </noscript>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- TESTIMONIALS -->
<section class="testimonials">
  <div class="container">
    <h2 class="section-title text-center" data-reveal="fade-up" data-delay="0">TESTIMONIALS</h2>

    <?php if (!empty($kolHome)): // show only 4 on homepage ?>
      <div class="t-grid">
        <?php foreach ($kolHome as $idx => $t):
          $name   = htmlspecialchars($t['name'] ?? 'KOL', ENT_QUOTES, 'UTF-8');
          $plat   = htmlspecialchars($t['platform'] ?? '', ENT_QUOTES, 'UTF-8');
          $handleRaw = isset($t['handle']) ? ltrim((string)$t['handle'], '@') : '';
          $handle    = htmlspecialchars($handleRaw !== '' ? '@' . $handleRaw : '', ENT_QUOTES, 'UTF-8');
          $title = htmlspecialchars($t['title'] ?? '', ENT_QUOTES, 'UTF-8');
          $desc  = htmlspecialchars($t['description'] ?? '', ENT_QUOTES, 'UTF-8');
          $date  = htmlspecialchars($t['published_on'] ?? '', ENT_QUOTES, 'UTF-8');
          $img   = htmlspecialchars($t['photo_url'] ?? 'https://placehold.co/600x750', ENT_QUOTES, 'UTF-8');
          $srcUrl= trim((string)($t['source_url'] ?? ''));
          $delay = 120 * ($idx % 3);
        ?>
          <figure class="t-card" data-reveal="fade-up" data-delay="<?= $delay ?>" itemscope itemtype="https://schema.org/Review">
            <div class="t-photo">
              <?php if ($srcUrl !== ''): ?>
                <a href="<?= htmlspecialchars($srcUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="nofollow noopener noreferrer" aria-label="Open original review by <?= $name ?>">
                  <img src="<?= $img ?>" alt="<?= $name ?>" loading="lazy" decoding="async" width="600" height="750" itemprop="image">
                </a>
              <?php else: ?>
                <img src="<?= $img ?>" alt="<?= $name ?>" loading="lazy" decoding="async" width="600" height="750" itemprop="image">
              <?php endif; ?>
              <figcaption class="t-tag" itemprop="author" itemscope itemtype="https://schema.org/Person">
                <span itemprop="name"><?= $name ?></span>
              </figcaption>
            </div>

            <figcaption class="t-meta">
              <div class="t-eyebrow">
                <?= $plat !== '' ? $plat : '—' ?>
                <?php if ($handle !== ''): ?> · <span><?= $handle ?></span><?php endif; ?>
                <?php if ($date !== ''): ?> · <time datetime="<?= $date ?>" itemprop="datePublished"><?= $date ?></time><?php endif; ?>
              </div>

              <?php if ($title !== ''): ?>
                <p class="t-quote"><strong itemprop="name"><?= $title ?></strong></p>
              <?php endif; ?>

              <?php if ($desc !== ''): ?>
                <p class="t-quote" itemprop="reviewBody">“<?= $desc ?>”</p>
              <?php endif; ?>
            </figcaption>
          </figure>
        <?php endforeach; ?>
      </div>

      <div class="text-center">
        <a class="btn-ghost" href="<?= url('testimonials') ?>">View all reviews <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    <?php else: ?>
      <p class="text-center" style="margin:18px 0;">KOL reviews coming soon.</p>
    <?php endif; ?>
  </div>
</section>

<script>
  // 1) Reveal-on-scroll (CSS-driven, slower + more obvious)
  (() => {
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReduced) return; // CSS handles reduced motion case

    const els = document.querySelectorAll('[data-reveal]');
    if (!els.length) return;

    // Pass data-delay (in ms) into a CSS custom property
    els.forEach(el => {
      const delayAttr = el.getAttribute('data-delay');
      if (delayAttr) {
        const delayMs = parseInt(delayAttr, 10);
        if (!Number.isNaN(delayMs)) {
          el.style.setProperty('--reveal-delay', `${delayMs}ms`);
        }
      }
    });

    const io = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach(entry => {
          if (!entry.isIntersecting) return;
          const el = entry.target;
          el.classList.add('is-visible');
          obs.unobserve(el);
        });
      },
      {
        rootMargin: '0px 0px -15% 0px',
        threshold: 0.2
      }
    );

    els.forEach(el => io.observe(el));
  })();

  // 2) Friends player controller (always runs)
  (() => {
    const shell = document.querySelector('.friends .player-shell');
    if (!shell) return;

    const makeSrc = (id) =>
      `https://www.youtube-nocookie.com/embed/${id}?autoplay=1&rel=0&modestbranding=1&playsinline=1`;

    const loadVideo = (id) => {
      if (!id) return;
      shell.innerHTML = '';
      shell.dataset.ytId = id;
      shell.classList.add('is-playing');
      const ifr = document.createElement('iframe');
      ifr.setAttribute('allowfullscreen', '');
      ifr.setAttribute('title', 'Ogawa Friends video');
      ifr.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
      ifr.src = makeSrc(id);
      ifr.style.border = '0';
      shell.appendChild(ifr);
    };

    const openBtn = document.getElementById('friends-open-youtube');
    const updateOpenLink = (id) => { if (openBtn) openBtn.href = `https://www.youtube.com/watch?v=${id}`; };

    const playBtn = document.querySelector('.friends .player-play');
    if (playBtn) playBtn.addEventListener('click', () => {
      loadVideo(shell.dataset.ytId);
      updateOpenLink(shell.dataset.ytId);
    });

    const items = document.querySelectorAll('.friends .friend-card');
    // init external link
    updateOpenLink(shell.dataset.ytId);

    items.forEach(btn => {
      btn.addEventListener('click', () => {
        const id     = btn.getAttribute('data-yt-id');
        const poster = btn.getAttribute('data-thumb')
                      || `https://img.youtube.com/vi/${id}/maxresdefault.jpg`;

        document.querySelectorAll('.friends .friend-item')
          .forEach(li => li.classList.remove('is-active'));
        btn.closest('.friend-item')?.classList.add('is-active');

        items.forEach(b => b.setAttribute('aria-pressed', 'false'));
        btn.setAttribute('aria-pressed', 'true');

        if (!shell.classList.contains('is-playing')) {
          shell.dataset.ytId = id;
          shell.dataset.thumb = poster;

          const img = document.createElement('img');
          img.className = 'player-poster';
          img.alt = 'Video poster';
          img.loading = 'lazy';
          img.decoding = 'async';
          img.width = 1280;
          img.height = 720;
          img.src = poster;

          shell.querySelector('.player-poster')?.replaceWith(img);
        } else {
          loadVideo(id);
        }

        updateOpenLink(id);
      });
    });
  })();

  // 3) Scroll-driven color blend for motto-left (bg + text)
  (() => {
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReduced) return;

    const section = document.querySelector('.motto-hero');
    const panel   = document.querySelector('.motto-left');
    if (!section || !panel) return;

    // Hex → {r,g,b}
    const hexToRgb = (hex) => {
      const m = String(hex || '').replace('#','').match(/^([0-9a-f]{3}|[0-9a-f]{6})$/i);
      if (!m) return {r:0,g:0,b:0};
      let h = m[1];
      if (h.length === 3) h = h.split('').map(x => x+x).join('');
      const n = parseInt(h, 16);
      return { r: (n>>16)&255, g: (n>>8)&255, b: n&255 };
    };
    const mix = (a,b,t) => Math.round(a + (b - a) * t);
    const clamp01 = (v) => Math.max(0, Math.min(1, v));
    const getCssVar = (name, fallback) => {
      const v = getComputedStyle(document.documentElement).getPropertyValue(name).trim();
      return v || fallback;
    };

    // Read endpoints
    let navyTrue  = getCssVar('--navy-true',  '#0b1854');
    let navyLight = getCssVar('--navy-light', '#949ccc');
    let c1 = hexToRgb(navyLight);   // bg start
    let c2 = hexToRgb(navyTrue);    // bg end

    let fgLight = getCssVar('--motto-fg-light', '#1e2a55'); // text start (for light bg)
    let fgTrue  = getCssVar('--motto-fg-true',  '#e9eeff'); // text end (for dark bg)
    let f1 = hexToRgb(fgLight);
    let f2 = hexToRgb(fgTrue);

    const refreshColors = () => {
      navyTrue  = getCssVar('--navy-true',  '#0b1854');
      navyLight = getCssVar('--navy-light', '#949ccc');
      c1 = hexToRgb(navyLight);
      c2 = hexToRgb(navyTrue);

      fgLight = getCssVar('--motto-fg-light', '#1e2a55');
      fgTrue  = getCssVar('--motto-fg-true',  '#e9eeff');
      f1 = hexToRgb(fgLight);
      f2 = hexToRgb(fgTrue);

      tick();
    };

    let ticking = false;
    const onScroll = () => {
      if (!ticking) {
        requestAnimationFrame(tick);
        ticking = true;
      }
    };

    const progressThrough = () => {
      const r = section.getBoundingClientRect();
      const vh = window.innerHeight || 1;
      const mid = vh * 0.5;        // viewport midline
      const start = r.top - vh;    // begin a bit before enter
      const end   = r.bottom;      // finish by exit
      const t = (mid - start) / (end - start);
      return clamp01(t);
    };

    const tick = () => {
      ticking = false;
      const t = progressThrough(); // 0..1

      // background mix
      const rb = mix(c1.r, c2.r, t), gb = mix(c1.g, c2.g, t), bb = mix(c1.b, c2.b, t);
      panel.style.setProperty('--motto-bg', `rgb(${rb}, ${gb}, ${bb})`);

      // foreground/text mix
      const rf = mix(f1.r, f2.r, t), gf = mix(f1.g, f2.g, t), bf = mix(f1.b, f2.b, t);
      panel.style.setProperty('--motto-fg', `rgb(${rf}, ${gf}, ${bf})`);
    };

    // Init and listeners
    tick();
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', () => { tick(); }, { passive: true });
    new ResizeObserver(() => tick()).observe(section);

    // If theme/classes inline-change variables
    const cssVarObserver = new MutationObserver(refreshColors);
    cssVarObserver.observe(document.documentElement, { attributes: true, attributeFilter: ['style','class'] });
  })();
</script>
