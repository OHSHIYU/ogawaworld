<link rel="stylesheet" href="<?= asset('css/faq.css') ?>">

<div class="faq-page">

  <!-- Banner -->
  <div class="faq-banner" style="background-image:url('<?= asset('img/hero/hero-b.webp') ?>');">
    <div class="faq-banner-inner">
      <h1>Frequently Asked Questions</h1>
      <p>Shipping, warranty, product usage, and more.</p>
    </div>
  </div>

  <!-- ===== Delivery (Small Items) ===== -->
  <div class="delivery-block">
    <h2 class="delivery-title">SMALL ITEMS</h2>

    <div class="delivery-notes">
      <span class="note"><i class="fa-solid fa-circle-check"></i> All online platforms</span>
      <span class="note"><i class="fa-solid fa-circle-check"></i> Depend on courier serviceability</span>
    </div>

    <div class="delivery-concept">
      <div class="delivery-concept-title">DELIVERY CONCEPT</div>

      <div class="delivery-steps">
        <div class="step">
          <div class="step-icon"><i class="fa-solid fa-cart-shopping"></i></div>
          <div class="step-text">
            <div class="step-main">Place Order</div>
          </div>
        </div>

        <div class="connector"><i class="fa-solid fa-arrow-right"></i></div>

        <div class="step">
          <div class="step-icon"><i class="fa-solid fa-box"></i></div>
          <div class="step-text">
            <div class="step-main">Packing Order</div>
            <div class="step-sub">(1–3 business days)</div>
          </div>
        </div>

        <div class="connector"><i class="fa-solid fa-arrow-right"></i></div>

        <div class="step">
          <div class="step-icon"><i class="fa-solid fa-truck"></i></div>
          <div class="step-text">
            <div class="step-main">Pick up by Courier</div>
          </div>
        </div>

        <div class="connector"><i class="fa-solid fa-arrow-right"></i></div>

        <div class="step">
          <div class="step-icon"><i class="fa-solid fa-house"></i></div>
          <div class="step-text">
            <div class="step-main">Reach to you</div>
            <div class="step-sub">(2–5 business days)</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== Delivery (Bulky Items) ===== -->
  <div class="delivery-block">
    <h2 class="delivery-title">BULKY ITEMS :</h2>
    <h2 class="delivery-title sub">ALL ONLINE PLATFORMS</h2>

    <div class="delivery-concept">
      <div class="delivery-concept-title">DELIVERY CONCEPT</div>

      <div class="delivery-steps bulky">
        <div class="step">
          <div class="step-icon"><i class="fa-solid fa-cart-shopping"></i></div>
          <div class="step-text">
            <div class="step-main">Place Order</div>
          </div>
        </div>

        <div class="connector"><i class="fa-solid fa-arrow-right"></i></div>

        <div class="step">
          <div class="step-icon"><i class="fa-solid fa-warehouse"></i></div>
          <div class="step-text">
            <div class="step-main">Order sent to OGAWA logistics</div>
            <div class="step-sub">(1–3 working days)</div>
          </div>
        </div>

        <div class="connector"><i class="fa-solid fa-arrow-right"></i></div>

        <div class="step">
          <div class="step-icon"><i class="fa-solid fa-headset"></i></div>
          <div class="step-text">
            <div class="step-main">Appointment Call</div>
          </div>
        </div>

        <div class="connector plus"><i class="fa-solid fa-plus"></i></div>

        <div class="step">
          <div class="step-icon"><i class="fa-solid fa-truck"></i></div>
          <div class="step-text">
            <div class="step-main">Delivery</div>
            <div class="step-sub">
              (2–14 business days Klang Valley · 2–20 business days Outstation)
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Dynamic FAQs -->
  <?php if (!empty($faqs)): ?>
    <div class="faq-list">
      <?php foreach ($faqs as $category => $items): ?>
        <h3><?= htmlspecialchars($category) ?></h3>

        <div class="faq-accordion">
          <?php foreach ($items as $f): ?>
            <div class="faq-item">
              <button class="faq-question" aria-expanded="false" type="button">
                <span class="faq-q-text"><?= htmlspecialchars($f['question']) ?></span>
                <span class="faq-chevron" aria-hidden="true">
                  <i class="fa-solid fa-chevron-down"></i>
                </span>
              </button>

              <div class="faq-answer" hidden>
                <div class="faq-answer-inner">
                  <?= nl2br(htmlspecialchars($f['answer'])) ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p class="text-center">No FAQ data available.</p>
  <?php endif; ?>

</div>

<script>
(function () {
  const items = document.querySelectorAll('.faq-item');

  function closeItem(item) {
    const btn = item.querySelector('.faq-question');
    const panel = item.querySelector('.faq-answer');
    btn.setAttribute('aria-expanded', 'false');

    panel.classList.remove('is-open');
    panel.style.maxHeight = panel.scrollHeight + 'px';
    panel.offsetHeight;
    panel.style.maxHeight = '0px';
    panel.style.opacity = '0';

    window.setTimeout(() => {
      panel.hidden = true;
      panel.style.maxHeight = '';
      panel.style.opacity = '';
    }, 260);
  }

  function openItem(item) {
    const btn = item.querySelector('.faq-question');
    const panel = item.querySelector('.faq-answer');
    btn.setAttribute('aria-expanded', 'true');

    panel.hidden = false;
    panel.classList.add('is-open');

    panel.style.maxHeight = '0px';
    panel.style.opacity = '0';
    panel.offsetHeight;
    panel.style.maxHeight = panel.scrollHeight + 'px';
    panel.style.opacity = '1';

    window.setTimeout(() => {
      panel.style.maxHeight = '';
      panel.style.opacity = '';
    }, 260);
  }

  items.forEach(item => {
    const btn = item.querySelector('.faq-question');
    btn.addEventListener('click', () => {
      const isOpen = btn.getAttribute('aria-expanded') === 'true';

      items.forEach(other => {
        if (other !== item) {
          const otherBtn = other.querySelector('.faq-question');
          if (otherBtn.getAttribute('aria-expanded') === 'true') closeItem(other);
        }
      });

      if (isOpen) closeItem(item);
      else openItem(item);
    });
  });
})();
</script>
