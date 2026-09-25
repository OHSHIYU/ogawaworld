<?php 
require_once dirname(__DIR__, 3) . '/app/helpers.php'; 
require_once dirname(__DIR__, 3) . '/app/services/seo.php';

$seoData = $GLOBALS['ogw_seo'] ?? [];
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">

  <?php
    ogw_seo_meta($seoData);
    include dirname(__DIR__, 3) . '/app/services/schema-organization.php';
  ?>

  <!-- Google Tag Manager -->
  <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PMFGT6F9');
    // GTM-T4M7VDDC - Staging || GTM-PMFGT6F9 - Live
  </script>
  <!-- End Google Tag Manager -->

  <!-- Favicon -->
  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <!-- Quicksand font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

  <!-- Font Awesome & Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= asset('css/header.css') ?>?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= asset('css/btn.css') ?>">
</head>

<body class="bg-white">

<!-- Google Tag Manager (noscript) -->
<noscript>
  <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMFGT6F9"
  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="ogw-nav" role="banner">
  <div class="ogw-nav__inner">
    <a href="<?= url() ?>" class="ogw-logo-link" aria-label="Ogawa home">
      <img src="<?= asset('img/logo/ogawa-logo.png') ?>" alt="OGAWA" width="118" height="32" decoding="async" fetchpriority="high" class="ogw-logo">
    </a>

    <button class="ogw-burger" id="navToggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="navMenu">
      <span></span><span></span><span></span>
    </button>

    <nav class="ogw-menu" id="navMenu" aria-label="Primary">
      <ul class="ogw-links" role="list">
        <li><a href="<?= url() ?>" data-path="/">Home</a></li>
        <li><a href="<?= url('about') ?>" data-path="/about">About Us</a></li>
        <li class="has-sub">
          <button class="has-sub__link sub-toggle" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="sub-tech">
            Technology <i class="fa-solid fa-angle-down"></i>
          </button>
          <ul class="sub" id="sub-tech" hidden>
            <li><a href="<?= url('technology/overseer') ?>" data-path="/technology/overseer">Overseer</a></li>
            <li class="has-sub">
  <button class="sub-toggle sub-toggle-level2" type="button" aria-expanded="false" aria-controls="sub-research">
    Research and Publication <i class="fa-solid fa-angle-right"></i>
  </button>
  <ul class="sub sub-level2" id="sub-research" hidden>
    <li><a href="<?= url('technology/um-research') ?>">University Malaya (UM)</a></li>
    <li><a href="<?= url('technology/usm-research') ?>">University Sains Malaysia (USM)</a></li>
    <li><a href="<?= url('technology/segi-research') ?>">SEGi University</a></li>
  </ul>
</li>
          </ul>
        </li>
        <li><a href="<?= url('products') ?>" data-path="/products">Products</a></li>
        <li><a href="<?= url('events') ?>" data-path="/events">Events</a></li>
        <li><a href="<?= url('reviews') ?>" data-path="/reviews">Reviews</a></li>
        <li><a href="<?= url('store-locator') ?>" data-path="/store-locator">Store Locator</a></li>
        <li class="ogw-menu__cta">
          <a class="btn-ghost ogw-menu__shop" href="https://ogawaworld.net/store/" rel="noopener">
            Shop Now
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="ogw-backdrop" id="navBackdrop" hidden></div>
</header>

  <main id="main-content" tabindex="-1">
    <?php if ($msg = flash_get('ok')): ?>
      <div class="alert alert-success" role="status"><?= $msg ?></div>
    <?php endif; ?>
    <?php if ($msg = flash_get('err')): ?>
      <div class="alert alert-danger" role="status"><?= $msg ?></div>
    <?php endif; ?>

    <script>
      (function () {
        const nav      = document.querySelector('.ogw-nav');
        const toggle   = document.getElementById('navToggle');
        const body     = document.body;
        const backdrop = document.getElementById('navBackdrop');
        let lastScrollY = window.scrollY;

        // Tablets behave like mobile: use a larger breakpoint
        const MENU_BREAK = 1200; // px

        // Helper: detect coarse pointer (touch devices)
        const isTouch = () => window.matchMedia('(pointer: coarse)').matches;

        // Helper: get menu element
        const getMenu = () => document.getElementById('navMenu');

        // A) Set CSS var --nav-h to the real header height (so body padding is exact)
        const setNavH = () => {
          if (!nav) return;
          const h = nav.offsetHeight;
          document.documentElement.style.setProperty('--nav-h', h + 'px');
        };
        window.addEventListener('load', setNavH, { once: true });
        window.addEventListener('resize', setNavH);

        // B) Scroll shadow
        const onScroll = () => {
          if (!nav) return;

          const currentY = window.scrollY;
          const menu = getMenu();
          const menuOpen = !!menu && menu.classList.contains('open');

          // 1) Existing shadow behavior
          if (currentY > 2) nav.classList.add('is-scrolled');
          else nav.classList.remove('is-scrolled');

          // 2) New: hide on scroll down, show on scroll up
          const goingDown = currentY > lastScrollY + 4;
          const goingUp   = currentY < lastScrollY - 4;

          // Don't hide when:
          // - menu is open
          // - or near the very top of the page
          if (menuOpen || currentY < 80) {
            nav.classList.remove('ogw-nav--hidden');
          } else if (goingDown) {
            nav.classList.add('ogw-nav--hidden');
          } else if (goingUp) {
            nav.classList.remove('ogw-nav--hidden');
          }

          lastScrollY = currentY;
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        // Helpers to normalize/compare paths for active link logic
        const logo = document.querySelector('.ogw-logo-link');
        const basePath = logo
          ? new URL(logo.href, window.location.origin).pathname.replace(/\/+$/,'')
          : '';
        const normalize = (p) => {
          if (!p) return '/';
          p = p.replace(/\/index\.php$/i, '').replace(/\/+$/,'');
          return p === '' ? '/' : p;
        };
        const relPath = (absPath) => {
          const nBase = normalize(basePath);
          const nAbs  = normalize(absPath);
          if (nBase === '/' ) return nAbs;
          return nAbs.startsWith(nBase) ? normalize(nAbs.slice(nBase.length) || '/') : nAbs;
        };

        // C) Active link (pathname OR hash targets)
        const setActive = () => {
          const menu = getMenu();
          const links = menu?.querySelectorAll('a') || [];
          const currentAbs  = window.location.pathname;
          const currentRel  = relPath(currentAbs);
          const currentHash = window.location.hash || '';

          links.forEach(a => {
            a.classList.remove('active');
            a.removeAttribute('aria-current');

            const linkAbs  = new URL(a.href, window.location.origin).pathname;
            const linkRel  = relPath(linkAbs);
            const linkHash = a.hash || '';

            const isHomeLink   = (linkRel === '/');
            const isOnHomePage = (currentRel === '/');

            const pathMatch =
              (isHomeLink && isOnHomePage) ||
              (!isHomeLink && (currentRel === linkRel || currentRel.startsWith(linkRel + '/')));

            const hashMatch = (linkHash && currentHash && linkHash === currentHash);

            if (pathMatch || hashMatch) {
              a.classList.add('active');
              a.setAttribute('aria-current', 'page');
            }
          });

          // Also highlight the parent "Technology" button if a child is active
          const parentBtn = document.querySelector('.has-sub .has-sub__link.sub-toggle');
          const childActive = document.querySelector('.has-sub .sub a.active');
          if (parentBtn) {
            if (childActive) parentBtn.classList.add('active');
            else parentBtn.classList.remove('active');
          }
        };
        setActive();
        window.addEventListener('hashchange', setActive);
        window.addEventListener('popstate', setActive);

        // RESPONSIVE a11y: manage inert/aria-hidden only for mobile/tablet
        const isMobileViewport = () => window.innerWidth <= MENU_BREAK || isTouch();
        const updateInertState = () => {
          const menu = getMenu();
          if (!menu) return;
          if (isMobileViewport() && !menu.classList.contains('open')) {
            menu.setAttribute('aria-hidden', 'true');
            try { menu.setAttribute('inert', ''); } catch (e) { /* ignore */ }
          } else {
            menu.removeAttribute('aria-hidden');
            try { menu.removeAttribute('inert'); } catch (e) { /* ignore */ }
          }
        };
        window.addEventListener('load', updateInertState);
        window.addEventListener('resize', updateInertState);

        // Utility for ESC/backdrop/nav-close flows
        const closeMenu = () => {
          const menu = getMenu();
          if (menu) {
            menu.classList.remove('open');
            if (isMobileViewport()) {
              menu.setAttribute('aria-hidden', 'true');
              try { menu.setAttribute('inert', ''); } catch (e) {}
            } else {
              menu.removeAttribute('aria-hidden');
              try { menu.removeAttribute('inert'); } catch (e) {}
            }
          }
          toggle?.setAttribute('aria-expanded', 'false');
          body.classList.remove('nav-locked');
          if (backdrop) { backdrop.classList.remove('show'); backdrop.hidden = true; }
        };
        const isOpen = () => getMenu()?.classList.contains('open');

        // E) Close on ESC
        document.addEventListener('keydown', (e) => {
          if (e.key === 'Escape' && isOpen()) closeMenu();
        });

        // F) Close when clicking outside / on backdrop
        document.addEventListener('click', (e) => {
          if (!isOpen()) return;
          const menu = getMenu();
          const t = e.target;
          if (menu.contains(t) || toggle.contains(t)) return;
          closeMenu();
        });
        backdrop?.addEventListener('click', closeMenu);

        // G) Close after navigating (mobile)
        document.addEventListener('click', (e) => {
          const a = e.target.closest('#navMenu a');
          if (a && isOpen()) closeMenu();
        });

        // H) Smooth scroll with offset for hash links (including Subscribe)
        document.addEventListener('click', (e) => {
          const a = e.target.closest('a[href^="#"]:not([href="#subscribe"]), a[href*="#"]:not([href$="#subscribe"])');
          if (!a) return;

          const url = new URL(a.href, window.location.origin);
          if (url.pathname !== window.location.pathname) return; // ignore cross-page links

          const hash = url.hash;
          if (!hash) return;

          const target = document.querySelector(hash);
          if (!target) return;

          e.preventDefault();

          const headerH = nav ? nav.offsetHeight : 0;
          const y = target.getBoundingClientRect().top + window.scrollY - headerH;

          window.history.pushState(null, '', hash);
          window.scrollTo({ top: y, behavior: 'smooth' });
          setActive();
        });

        // Submenu: mobile/tablet toggle (desktop uses CSS hover/focus)
        // Submenu: 支持多级菜单（包括三级 Research and Publication）
        // 桌面端：hover 展开；移动端：点击展开，三级菜单向下而不是向右
        (() => {
          // 判断是否是移动端视口
          const isMobileViewport = () => {
            return window.innerWidth <= 1200 || window.matchMedia('(pointer: coarse)').matches;
          };
          
          // 递归处理所有层级的子菜单
          const initAllSubmenus = (container) => {
            const items = container.querySelectorAll(':scope > .has-sub');
            
            items.forEach((item, idx) => {
              const btn = item.querySelector(':scope > .sub-toggle');
              const panel = item.querySelector(':scope > .sub');
              if (!btn || !panel) return;

              if (!panel.id) panel.id = 'sub-' + Date.now() + '-' + idx;
              btn.setAttribute('aria-controls', panel.id);

              const setOpen = (open) => {
                btn.setAttribute('aria-expanded', open ? 'true' : 'false');
                panel.hidden = !open;
              };

              const syncViewport = () => {
                if (isMobileViewport()) {
                  setOpen(false);
                } else {
                  btn.setAttribute('aria-expanded', 'false');
                  panel.hidden = true;
                }
              };
              
              syncViewport();

              // 点击事件（主要用于移动端）
              btn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                if (!isMobileViewport()) return; // 桌面端依赖 CSS hover
                const currentOpen = btn.getAttribute('aria-expanded') === 'true';
                setOpen(!currentOpen);
              });

              // 点击其他地方关闭
              document.addEventListener('click', (e) => {
                if (!isMobileViewport()) return;
                if (!item.contains(e.target)) setOpen(false);
              });

              item.addEventListener('keydown', (e) => {
                if (isMobileViewport() && e.key === 'Escape') setOpen(false);
              });

              window.addEventListener('resize', syncViewport);
              
              // 递归处理当前菜单项里面的子菜单
              if (panel) {
                initAllSubmenus(panel);
              }
            });
          };
          
          // 开始初始化所有顶级菜单
          const topLevelContainer = document.querySelector('.ogw-links');
          if (topLevelContainer) {
            initAllSubmenus(topLevelContainer);
          }
        })();

        // Ensure inert state is correct on initial render
        updateInertState();
      })();
    </script>

    <!-- Hardened hamburger wiring (capture phase, stops conflicts) -->
    <script>
      (() => {
        const btn   = document.getElementById('navToggle');
        const menu  = document.getElementById('navMenu');
        const bd    = document.getElementById('navBackdrop');
        const body  = document.body;
        const nav   = document.querySelector('.ogw-nav');

        if (!btn || !menu) return;

        const setOpen = (open) => {
          menu.classList.toggle('open', open);
          btn.setAttribute('aria-expanded', open ? 'true' : 'false');
          if (open) {
            menu.removeAttribute('aria-hidden');
            try { menu.removeAttribute('inert'); } catch (e) {}
            body.classList.add('nav-locked');
            if (bd) { bd.hidden = false; bd.classList.add('show'); }
            if (nav) nav.classList.remove('ogw-nav--hidden'); // keep header visible while menu open
          } else {
            if (window.matchMedia('(pointer: coarse)').matches || window.innerWidth <= 1200) {
              menu.setAttribute('aria-hidden', 'true');
              try { menu.setAttribute('inert', ''); } catch (e) {}
            } else {
              menu.removeAttribute('aria-hidden');
              try { menu.removeAttribute('inert'); } catch (e) {}
            }
            body.classList.remove('nav-locked');
            if (bd) { bd.classList.remove('show'); bd.hidden = true; }
          }
        };

        // One authoritative click handler (capture) to avoid conflicts
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();
          setOpen(!menu.classList.contains('open'));
        }, { capture: true });

        bd?.addEventListener('click', (e) => {
          e.stopPropagation();
          setOpen(false);
        }, { capture: true });

        // Keep menu inert state in sync on resize (useful if user rotates device / resizes window)
        window.addEventListener('resize', () => {
          if (!menu.classList.contains('open')) {
            if (window.matchMedia('(pointer: coarse)').matches || window.innerWidth <= 1200) {
              menu.setAttribute('aria-hidden', 'true');
              try { menu.setAttribute('inert', ''); } catch (e) {}
            } else {
              menu.removeAttribute('aria-hidden');
              try { menu.removeAttribute('inert'); } catch (e) {}
            }
          }
        });
      })();
    </script>
