<?php
// Sticky Buy Bar (Apple-like pill) — no image
$__buy_name = $p['name'] ?? 'Product';
$__buy_link = $p['permalink'] ?? '#';
?>
<style>
  /* ===== Sticky pill config (tweak here) ===== */
  :root {
    --pill-bg: rgba(12, 12, 12, 0.62);
    --pill-stroke: rgba(255,255,255,.14);
    --pill-shadow: 0 12px 30px rgba(0,0,0,.35);
  }

  #buybar {
    position: fixed; left: 0; right: 0; bottom: 0;
    z-index: 9999;
    padding: 10px env(safe-area-inset-right) calc(10px + env(safe-area-inset-bottom)) env(safe-area-inset-left);
    background: transparent;
    transform: translateY(120%); opacity: 0;
    transition: transform .35s ease, opacity .35s ease;
    pointer-events: none; /* so hidden state doesn't catch clicks */
  }
  #buybar.show { transform: translateY(0); opacity: 1; pointer-events: auto; }

  #buybar .inner {
    width: min(1240px, 100% - 2 * 8%);
    margin-inline: auto;
  }

  /* The pill */
  #buybar .pill {
    display: grid; grid-template-columns: 1fr auto auto; gap: 12px;
    align-items: center;
    background: var(--pill-bg);
    color: #fff;
    border: 1px solid var(--pill-stroke);
    box-shadow: var(--pill-shadow);
    border-radius: 10px;
    padding: 10px;
    backdrop-filter: saturate(1.2) blur(12px);
  }

  .buy-title {
    font-size: 1.1rem; font-weight: 700; letter-spacing: .2px; padding-inline: 10px; min-width: 0;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
  }

  @media (max-width: 720px) {
    #buybar .pill { grid-template-columns: 1fr auto; gap: 10px; }
    .btn-outline { display: none; } /* keep mobile clean */
    .buy-title { font-size: 1.1rem; font-weight: 600; }
  }
</style>

<div id="buybar" role="region" aria-label="Quick purchase bar">
  <div class="inner">
    <div class="pill">
      <div class="buy-title"><?= e($__buy_name) ?></div>

      <a class="btn-ghost btn-ghost--light" href="<?= e($__buy_link) ?>" target="_blank" rel="noopener"
         aria-label="Buy <?= e($__buy_name) ?>">Buy Now <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
    </div>
  </div>
</div>

<script>
  (function () {
    const bar  = document.getElementById('buybar');
    if (!bar) return;

    const hero = document.querySelector('.hero');
    const foot = document.querySelector('footer');

    function inFooterZone() {
      if (!foot) return false;
      return (window.scrollY + window.innerHeight) > (foot.offsetTop - 120);
    }
    function showAfter() {
      const trigger = hero ? (hero.offsetTop + hero.offsetHeight * 0.6) : 320;
      if (window.scrollY > trigger && !inFooterZone()) {
        bar.classList.add('show');
      } else {
        bar.classList.remove('show');
      }
    }
    window.addEventListener('scroll', showAfter, { passive: true });
    window.addEventListener('load',   showAfter);
  })();
</script>
