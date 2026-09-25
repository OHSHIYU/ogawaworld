<link rel="stylesheet" href="<?= asset('css/products.css') ?>">
<link rel="stylesheet" href="<?= asset('css/animate.css') ?>">
<link rel="stylesheet" href="<?= asset('css/vbar.css') ?>">
<link rel="stylesheet" href="<?= asset('css/float.css') ?>">

<!-- HERO -->
<section class="imagine imagine--bg" style="--hero:url('<?= asset('img/product/product-bg.avif') ?>');" data-reveal="fade-up">
  <div class="imagine__inner">
    <div class="imagine__text" data-reveal="fade-up" style="--reveal-delay: 120ms">
      <h1 class="imagine__title">IMAGINE BETTER LIVING</h1>
      <p class="imagine__para">Browse by category or view all newest products.</p>
    </div>
  </div>
</section>

<!-- BRAND VIDEO -->
<section class="video-block" id="brand-video" data-reveal="zoom-in">
  <video class="video-block__video" autoplay muted loop playsinline preload="metadata"
         poster="<?= asset('img/product/product-vid-poster.avif') ?>">
    <source src="<?= asset('img/product/product.mp4') ?>" type="video/mp4" />
  </video>
</section>

<!-- CATEGORY STRIP -->
<section class="cat-strip" id="categories" data-reveal="fade-up" aria-label="Product categories">
  <div class="cat-strip__inner">
    <button class="cat-strip__nav cat-strip__nav--prev" aria-label="Scroll left" type="button"><i class="fa-solid fa-angle-left"></i></button>

    <div class="cat-strip__track" role="tablist" aria-label="Categories">
      <?php foreach ($categories as $i => $cat): ?>
        <?php $img = $cat['image_url'] ?: $catImgFallback; ?>
        <button
          class="cat-pill"
          role="tab"
          aria-selected="false"
          tabindex="<?= $i === 0 ? '0' : '-1' ?>"
          data-cat-id="<?= e($cat['id']) ?>"
          data-cat-slug="<?= e($cat['slug']) ?>"
          data-cat-url="<?= e($cat['url']) ?>"
          data-reveal="fade-up"
          style="--reveal-delay: <?= 80 + ($i % 8) * 40 ?>ms"
        >
          <span class="cat-pill__thumb">
            <img class="fx-float-y" style="--fx-float-distance: 8px; --fx-float-duration: 3s;" src="<?= e($img) ?>" alt="" loading="lazy" decoding="async">
          </span>
          <span class="cat-pill__name"><?= e($cat['name']) ?></span>
        </button>
      <?php endforeach; ?>
    </div>

    <button class="cat-strip__nav cat-strip__nav--next" aria-label="Scroll right" type="button"><i class="fa-solid fa-angle-right"></i></button>
  </div>
</section>

<!-- PLP -->
<section class="plp" id="plp" aria-live="polite">
  <div class="plp__inner">
    <header class="plp__header">
      <h2 class="plp__title"><span id="plp-title">All Products</span></h2>
      <a id="plp-view-all" href="<?= e($SHOP_URL ?? ($WP_BASE.'/shop/')) ?>" class="plp__viewall">View category</a>
    </header>

    <div id="plp-grid" class="plp-grid" data-state="loading"></div>

    <div class="plp__more">
      <button id="plp-load-more" class="btn btn-outline-dark" type="button" hidden>Load more</button>
    </div>
  </div>
</section>

<script>
  window.__STORE_API    = '<?= e($STORE_BASE) ?>';
  window.__WP_BASE      = '<?= e($WP_BASE) ?>';
  window.__SHOP_URL     = '<?= e($SHOP_URL ?? ($WP_BASE."/shop/")) ?>';
  window.__FALLBACK_IMG = '<?= e($productThumbFallback) ?>';
  window.__REST_BASE    = '<?= e(rtrim($WP_BASE, '/') . '/wp-json') ?>';

  (() => {
    /* Video play/pause */
    const vid = document.querySelector('.video-block__video');
    if (vid) {
      const io = new IntersectionObserver(es => es.forEach(e => (
        e.isIntersecting && e.intersectionRatio > .5 ? vid.play().catch(()=>{}) : vid.pause()
      )), {threshold:[0,.5,1]});
      io.observe(vid);
    }

    /* Reveal (reusable for dynamically-added elements) */
    const prefersReduced = matchMedia('(prefers-reduced-motion: reduce)').matches;
    let revealObserver = null;

    function observeReveals(root = document) {
      // If root is an element, use it; if it's document, just use document
      const scope = root.querySelectorAll ? root : document;

      if (prefersReduced) {
        scope.querySelectorAll('[data-reveal]').forEach(el =>
          el.classList.add('is-visible')
        );
        return;
      }

      if (!revealObserver) {
        revealObserver = new IntersectionObserver((entries, obs) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
              obs.unobserve(entry.target);
            }
          });
        }, {
          threshold: 0.15,
          rootMargin: '0px 0px -10% 0px'
        });
      }

      scope.querySelectorAll('[data-reveal]').forEach(el =>
        revealObserver.observe(el)
      );
    }

    // Initial call for all existing elements (hero, video, cat-strip, etc.)
    observeReveals(document);

    /* Slider controls */
    const track = document.querySelector('.cat-strip__track');
    const prevB = document.querySelector('.cat-strip__nav--prev');
    const nextB = document.querySelector('.cat-strip__nav--next');
    const scrollBy = d => track.scrollBy({left:d, behavior:'smooth'});

    prevB?.addEventListener('click', () =>
      scrollBy(-Math.max(320, track.clientWidth * 0.8))
    );
    nextB?.addEventListener('click', () =>
      scrollBy(+Math.max(320, track.clientWidth * 0.8))
    );

    /* PLP state */
    const pills    = [...document.querySelectorAll('.cat-pill')];
    const grid     = document.getElementById('plp-grid');
    const title    = document.getElementById('plp-title');
    const viewAll  = document.getElementById('plp-view-all');
    const loadMore = document.getElementById('plp-load-more');
    const plpSection = document.getElementById('plp');

    const cache = new Map();
    let controller = null;

    let state = { catId:'all', catName:'All Products', catUrl:window.__SHOP_URL, page:1, perPage:100, loading:false, done:false };

    /* Utils */
    const qsParam    = k => (new URL(location.href)).searchParams.get(k);
    const pdp = slug => `/${encodeURIComponent(String(slug||'').toLowerCase())}/`;
    const productURL = p => pdp(p.slug || '');
    const buyURL     = p => p.permalink;
    const priceHTML  = p => p.price_html || '';

    function scrollToPLP() {
      if (!plpSection) return;

      const rect   = plpSection.getBoundingClientRect();
      const offset = window.scrollY + rect.top - 80; // adjust 80 to your header height

      window.scrollTo({
        top: offset,
        behavior: 'smooth'
      });
    }

    function setActivePill(btn){
      pills.forEach(p=>{
        const a = (p===btn);
        p.classList.toggle('is-active', a);
        p.setAttribute('aria-selected', a ? 'true' : 'false');
        p.tabIndex = a ? 0 : -1;
      });
    }

    // Show "New" for items created within N days
    function isNew(p, days = 30) {
      const iso = p.date_created_gmt || p.date_created;
      if (!iso) return false;
      const created = new Date(iso);
      return ((Date.now() - created) / 86400000) <= days;
    }

    // Detect "Online Exclusive" from ACF "Channel" field exposed as og_channel
    function isOnlineExclusive(p) {
      let raw = p.og_channel || (p.acf && p.acf.og_channel);
      if (!raw) return false;
      if (Array.isArray(raw)) raw = raw.join(', ');
      const val = String(raw).toLowerCase().trim();
      return val.includes('online exclusive');
    }

    // Build badges HTML ("Online Exclusive" and "New")
    function badgesHTML(p) {
      const badges = [];
      if (isOnlineExclusive(p)) {
        badges.push('<span class="plp-badge plp-badge--online">Online Exclusive</span>');
      }
      if (isNew(p)) {
        badges.push('<span class="plp-badge plp-badge--new">New</span>');
      }
      if (!badges.length) return '';
      return `<div class="plp-badges">${badges.join('')}</div>`;
    }

    function renderSkeleton(n=8){
      grid.dataset.state='loading';
      grid.innerHTML = Array.from({length:n}).map(()=>`
        <article class="plp-card plp-card--skeleton" aria-hidden="true">
          <div class="plp-card__media"></div>
          <div class="plp-card__body">
            <div class="sk sk--title"></div>
            <div class="sk sk--price"></div>
          </div>
        </article>
      `).join('');
      loadMore.hidden = true;
    }

    function cardHTML(p, index = 0) {
      const img    = (p.images && p.images[0] && p.images[0].src) ? p.images[0].src : window.__FALLBACK_IMG;
      const name   = p.name ?? '';
      const badges = badgesHTML(p);

      // nice soft stagger, reset every 12 cards
      const delay = 80 + (index % 12) * 40;

      return `
          <article class="plp-card" data-reveal="fade-up" style="--reveal-delay:${delay}ms">
            <a class="plp-card__media" href="${productURL(p)}" aria-label="${name}">
              ${badges}
              <img src="${img}" alt="${name.replace(/"/g,'&quot;')}" loading="lazy" decoding="async">
            </a>
            <div class="plp-card__body">
              <h3 class="plp-card__name"><a href="${productURL(p)}">${name}</a></h3>
              <div class="plp-card__price">${priceHTML(p)}</div>
              <div class="plp-card__cta">
                <a class="btn-ghost" href="${productURL(p)}">Learn more</a>
                <a class="btn-solid" href="${buyURL(p)}" target="_blank">Buy&nbsp;<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
            </div>
          </article>`;
    }

    const inner = document.querySelector('.plp__inner');
    let emptyEl = null;

    function showEmpty() {
      grid.dataset.state = 'ready';
      loadMore.hidden = true;
      grid.hidden = true;

      if (emptyEl) emptyEl.remove();
      emptyEl = document.createElement('section');
      emptyEl.className = 'plp-empty';
      emptyEl.setAttribute('role','status');
      emptyEl.setAttribute('aria-live','polite');
      emptyEl.innerHTML = `
        <h3 class="plp-empty__title">No products in ${state.catName} yet</h3>
        <p class="plp-empty__text">We’re curating items for this category. In the meantime, you can browse all products.</p>
      `;
      inner.appendChild(emptyEl); // place after the grid & “Load more”
    }

    function clearEmpty() {
      grid.hidden = false;
      if (emptyEl) { emptyEl.remove(); emptyEl = null; }
    }

    function renderProducts(items, append=false){
      if (!Array.isArray(items)) items = [];

      if (items.length === 0 && state.page === 1){
        showEmpty();
        return;
      } else {
        clearEmpty();
      }

      const html = items.map((p, i) => cardHTML(p, i)).join('');
      grid.dataset.state = 'ready';

      if (!append) {
        grid.innerHTML = html;
        observeReveals(grid);      // animate initial batch
      } else {
        grid.insertAdjacentHTML('beforeend', html);
        observeReveals(grid);      // animate "Load more" / infinite scroll batch
      }

      loadMore.hidden = state.done;
    }

    // Fetch ACF "og_channel" via custom REST endpoint and attach to products
    async function hydrateAssets(items) {
      if (!items || !items.length) return items;

      const ids = items.map(p => p.id).filter(Boolean);
      if (!ids.length) return items;

      const url = new URL(window.__REST_BASE + '/ogw/v1/product-assets');
      url.searchParams.set('ids', ids.join(','));

      try {
        const resp = await fetch(url.toString(), { headers: { 'Accept': 'application/json' } });
        if (!resp.ok) throw new Error('assets fetch failed');

        const map = await resp.json(); // { "6318": { channel, video, manual }, ... }

        items.forEach(p => {
          const a = map[String(p.id)] || map[p.id]; // handle string keys
          if (!a) return;

          if (a.channel) p.og_channel = a.channel;
          if (a.visibility) p.visibility = a.visibility;
          if (a.video)  p.og_video  = a.video;   
          if (a.manual) p.og_manual = a.manual; 
        });

      } catch (e) {
        console.warn('Product assets endpoint error', e);
      }

      return items;
    }

    async function fetchPage(page=1){
      if (state.loading || state.done) return;
      state.loading = true;
      grid.setAttribute('aria-busy','true');
      if (page === 1) renderSkeleton(state.perPage);

      if (controller) controller.abort();
      controller = new AbortController();

      try{
        const cacheKey = `${state.catId}:${page}:${state.perPage}`;
        if (cache.has(cacheKey)){
          const items = cache.get(cacheKey);
          state.page = page; state.done = items.length < state.perPage;
          page === 1 ? renderProducts(items,false) : renderProducts(items,true);
        } else {
          const url = new URL(__STORE_API + '/products');
          if (String(state.catId) !== 'all') url.searchParams.set('category', String(state.catId));
          url.searchParams.set('per_page', String(state.perPage));
          url.searchParams.set('page', String(page));
          
          // Always use Woo menu order (All + category)
          url.searchParams.set('orderby', 'menu_order');
          url.searchParams.set('order', 'asc');

          const resp = await fetch(url.toString(), { headers:{'Accept':'application/json'}, signal: controller.signal });
          if (!resp.ok) throw new Error('Network error');

          let items = await resp.json(); 
          items = await hydrateAssets(items);

          // console.log('RAW:', items.length);

          // Remove hidden products
          items = items.filter(p => p.visibility !== 'hidden');
          // console.log('AFTER VISIBILITY:', items.length);
                 
          // Exclude Corporate channel products
          const ALLOWED_CHANNELS = ['online', 'retail', 'affiliate'];
          items = items.filter(p => {
              const ch = String(p.og_channel || '').toLowerCase().trim();
              // Allow products with no channel set OR explicitly allowed channels only
              return ch === '' || ALLOWED_CHANNELS.includes(ch);
          });
          // console.log('AFTER CHANNEL:', items.length);

          cache.set(cacheKey, items);

          state.page = page; state.done = items.length < state.perPage;
          page === 1 ? renderProducts(items,false) : renderProducts(items,true);
        }
      } catch(err){
        if (err.name !== 'AbortError'){
          grid.dataset.state='error';
          grid.innerHTML = `<div class="plp-error">Couldn’t load products. Please try again.</div>`;
          loadMore.hidden = true;
        }
      } finally {
        state.loading = false;
        grid.removeAttribute('aria-busy');
      }
    }

    function selectCategory(btn, opts = {}) {
      const { scroll = false } = opts;
      if (!btn) return;

      const id   = btn.dataset.catId ?? 'all';
      const slug = btn.dataset.catSlug || '';
      const name = btn.querySelector('.cat-pill__name')?.textContent?.trim() || 'Products';
      const url  = btn.dataset.catUrl || window.__SHOP_URL;

      state = { ...state, catId:id, catName:name, catUrl:url, page:1, done:false };
      title.textContent = name;
      viewAll.href = url;

      const u = new URL(location.href);
      if (String(id) === 'all') { 
        u.searchParams.delete('cat'); 
        u.searchParams.delete('cat_id'); 
      } else { 
        u.searchParams.set('cat', slug); 
        u.searchParams.set('cat_id', String(id)); 
      }
      history.replaceState({}, '', u.toString());

      setActivePill(btn);
      fetchPage(1);

      // Scroll down to PLP only on user interaction
      if (scroll) {
        scrollToPLP();
      }
    }

    // interactions
    pills.forEach(btn => btn.addEventListener('click', ()=>selectCategory(btn, { scroll: true })));
    track?.addEventListener('keydown', (e)=>{
      const cur = document.activeElement; if(!cur.classList.contains('cat-pill')) return;
      const i = pills.indexOf(cur);
      if (e.key==='ArrowRight' && pills[i+1]) { e.preventDefault(); pills[i+1].focus(); }
      if (e.key==='ArrowLeft'  && pills[i-1]) { e.preventDefault(); pills[i-1].focus(); }
      if (e.key==='Enter' || e.key===' ') { e.preventDefault(); cur.click(); }
    });

    loadMore.addEventListener('click', ()=>fetchPage(state.page+1));

    // Auto-load more near bottom
    const sentinel = document.createElement('div'); sentinel.style.height='1px';
    document.querySelector('.plp__more').prepend(sentinel);
    const moreIO = new IntersectionObserver(es => es.forEach(e => {
      if (e.isIntersecting && !loadMore.hidden) fetchPage(state.page+1);
    }), {rootMargin:'400px 0px'});
    moreIO.observe(sentinel);

    // Deep link (?cat / ?cat_id). Default = All.
    const wantSlug = qsParam('cat'); const wantId = qsParam('cat_id');
    let startBtn = null;
    if (wantId) startBtn = pills.find(b => b.dataset.catId === wantId);
    if (!startBtn && wantSlug) startBtn = pills.find(b => b.dataset.catSlug === wantSlug);
    if (!startBtn) startBtn = pills[0]; // "All Products"
    selectCategory(startBtn, { scroll: false });
  })();
</script>
