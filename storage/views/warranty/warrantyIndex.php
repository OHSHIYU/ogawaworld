<link rel="stylesheet" href="<?= asset('css/legal.css') ?>">
<link rel="stylesheet" href="<?= asset('css/warranty.css') ?>">
<script src="https://www.google.com/recaptcha/api.js?render=6LdvancsAAAAAGtDf0DNuqCdLhsMnTCo99NvM0Lq"></script>

<style>
    /* 强制允许滑动 */
    .legal-content {
        width: 100%;
        overflow-x: auto !important;
        overflow-y: visible !important;
        -webkit-overflow-scrolling: touch !important;
        display: block !important;
    }
    
    .legal-content table {
        width: auto !important;
        min-width: 700px !important;
        border-collapse: collapse;
        background: white;
        font-size: 14px;
        display: table !important;
    }
    
    .legal-content table th,
    .legal-content table td {
        padding: 8px 12px;
        border: 1px solid #ddd;
        text-align: left;
        white-space: nowrap;
    }
    
    .legal-content table th {
        background: #f5f5f5;
        font-weight: bold;
    }
</style>

<section>
  <?php if ($active): ?>
    <div class="lv-banner" style="background-image:url('<?= asset('img/hero/hero-d.webp') ?>');">
      <h1 class="lv-banner__title"><?= e($active['title']) ?></h1>
    </div>
  <?php endif; ?>

  <div class="lv-grid">
    <!-- Sidebar -->
    <aside class="lv-side">
      <ul class="lv-nav">
        <?php foreach ($entries as $e):
            $isActive = $active['slug'] === $e['slug'];
            $href = url('warranty/' . urlencode($e['slug']));
        ?>
          <li>
            <a href="<?= $href ?>"
              class="lv-nav__link <?= $isActive ? 'is-active' : '' ?>">
              <span class="lv-nav__dot"></span>
              <span class="lv-nav__text"><?= e($e['title']) ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </aside>

    <!-- Main content -->
    <main class="lv-main">
      <div class="lv-updated">Updated <?= date('M j, Y', strtotime($active['updated_at'])) ?></div>

      <?php if ($active['type'] === 'registration'): ?>
        <div class="wr-tabs">
          <?php foreach ($tabs as $t):
            $isOn = ($t['key'] === $sub);
            $href = url(
              'warranty/' . urlencode($active['slug']) . '?sub=' . urlencode($t['key'])
            );
          ?>
            <a
              class="wr-tab <?= $isOn ? 'is-active' : '' ?>"
              href="<?= $href ?>"
            >
              <?= e($t['label']) ?>
            </a>
          <?php endforeach; ?>
        </div>

        <?php foreach ($tabs as $t):
          $isOn = ($t['key'] === $sub);
        ?>
          <section class="wr-panel <?= $isOn ? 'is-active' : '' ?>">
            <div class="legal-content">
              <?= $t['content_html'] ?? '' ?>
            </div>

            <?php if ($t['key'] === 'register'): ?>
              <?php if ($success): ?>
                <div class="notice success"><?= e($success) ?></div>
              <?php elseif ($errors): ?>
                <div class="notice error">Please fix the highlighted fields.</div>
              <?php endif; ?>

              <?php if (isset($errors['recaptcha'])): ?>
                <div class="notice error"><?= e($errors['recaptcha']) ?></div>
              <?php endif; ?>

              <form class="wr-form" method="post" enctype="multipart/form-data">
                <?php csrf_field(); ?>

                <!-- Full Name -->
                <div class="wr-row">
                  <label>Full Name <span class="req">*</span></label>
                  <input type="text"
                        name="full_name"
                        placeholder="(Name as per NRIC)"
                        value="<?= e($_POST['full_name'] ?? '') ?>"
                        required>
                  <?php if (isset($errors['full_name'])): ?>
                    <div class="error"><?= $errors['full_name'] ?></div>
                  <?php endif; ?>
                </div>

                <!-- Email + Phone -->
                <div class="wr-row two">
                  <div>
                    <label>Email Address <span class="req">*</span></label>
                    <input type="email"
                          name="email"
                          placeholder="Enter Email Address"
                          value="<?= e($_POST['email'] ?? '') ?>"
                          required>
                    <?php if (isset($errors['email'])): ?>
                      <div class="error"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                  </div>

                  <div>
                    <label>Customer Phone <span class="req">*</span></label>
                    <div class="phone-group">
                      <select name="country_code" class="phone-code" required>
                        <option value="+60" <?= (($_POST['country_code'] ?? '+60') === '+60') ? 'selected' : '' ?>>🇲🇾 +60</option>
                        <option value="+673" <?= (($_POST['country_code'] ?? '') === '+673') ? 'selected' : '' ?>>🇧🇳 +673</option>
                      </select>

                      <input type="tel"
                            name="phone"
                            placeholder="12-345 6789"
                            value="<?= e($_POST['phone'] ?? '') ?>"
                            required>
                    </div>

                    <?php if (isset($errors['phone'])): ?>
                      <div class="error"><?= $errors['phone'] ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- State + Purchase Date -->
                <div class="wr-row two">
                  <div>
                    <label>State <span class="req">*</span></label>
                    <select name="state" required>
                      <option value="" disabled <?= empty($_POST['state']) ? 'selected' : '' ?>>
                        Select State
                      </option>
                      <?php
                      $states = ['Johor','Kedah','Kelantan','Melaka','Negeri Sembilan',
                                'Pahang','Penang','Perak','Perlis','Sabah','Sarawak',
                                'Selangor','Terengganu','Kuala Lumpur','Putrajaya','Labuan'];
                      foreach ($states as $state):
                      ?>
                        <option value="<?= $state ?>"
                          <?= (($_POST['state'] ?? '') === $state) ? 'selected' : '' ?>>
                          <?= $state ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div>
                    <label>Delivery Date <span class="req">*</span></label>
                    <input type="date"
                          name="purchase_date"
                          value="<?= e($_POST['purchase_date'] ?? '') ?>"
                          required>
                    <?php if (isset($errors['purchase_date'])): ?>
                      <div class="error"><?= $errors['purchase_date'] ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Product Model + Serial -->
                <div class="wr-row two">
                  <div>
                    <label>Model / Item Purchased <span class="req">*</span></label>
                    <input type="text"
                          name="product_model"
                          placeholder="Eg: (OS 8139)"
                          value="<?= e($_POST['product_model'] ?? '') ?>"
                          required>
                    <?php if (isset($errors['product_model'])): ?>
                      <div class="error"><?= $errors['product_model'] ?></div>
                    <?php endif; ?>
                  </div>

                  <div>
                    <label>Serial Number <span class="req">*</span></label>
                    <input type="text"
                          name="serial_no"
                          placeholder="Enter Serial Number"
                          value="<?= e($_POST['serial_no'] ?? '') ?>"
                          required>
                    <?php if (isset($errors['serial_no'])): ?>
                      <div class="error"><?= $errors['serial_no'] ?></div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Purchased From + Upload -->
                <div class="wr-row two">
                  <div>
                    <label>Purchased From <span class="req">*</span></label>
                    <select name="purchased_from" required>
                      <option value="" disabled <?= empty($_POST['purchased_from']) ? 'selected' : '' ?>>
                        Select Purchase From
                      </option>
                      <option value="Online" <?= (($_POST['purchased_from'] ?? '') === 'Online') ? 'selected' : '' ?>>Online</option>
                      <option value="Offline" <?= (($_POST['purchased_from'] ?? '') === 'Offline') ? 'selected' : '' ?>>Offline</option>
                      <option value="Others" <?= (($_POST['purchased_from'] ?? '') === 'Others') ? 'selected' : '' ?>>Others</option>
                    </select>
                  </div>

                  <div>
                    <label>Attachment (File to Upload)</label>
                    <input type="file"
                          name="receipt"
                          accept=".jpg,.jpeg,.png,.pdf">
                  </div>
                </div>

                <!-- Agreement -->
                <div class="wr-row chk">
                  <label>
                    <input type="checkbox"
                          name="agree"
                          <?= !empty($_POST['agree']) ? 'checked' : '' ?>
                          required>
                    I hereby confirm that I have reviewed and consented to OGAWA’s Warranty Terms and Conditions Policy.
                  </label>
                </div>

                <div class="wr-actions">
                  <button type="submit" class="btn btn-primary">
                    Submit Registration
                  </button>
                </div>
              </form>
            <?php endif; ?>
          </section>
        <?php endforeach; ?>

      <?php else: ?>
        <article class="legal-content">
          <?= $active['content_html'] ?? '' ?>
        </article>
      <?php endif; ?>
    </main>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

  const form = document.querySelector('.wr-form');
  if (!form) return;

  form.addEventListener('submit', function (e) {

    // Native validation first
    if (!form.checkValidity()) {
      return;
    }

    e.preventDefault();

    const btn = form.querySelector('button[type=submit]');

    grecaptcha.ready(function () {
      grecaptcha.execute('6LdvancsAAAAAGtDf0DNuqCdLhsMnTCo99NvM0Lq', {
        action: 'warranty_register'
      }).then(function (token) {

        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'g-recaptcha-response';
        input.value = token;
        form.appendChild(input);

        // 🔵 Loading state
        if (btn) {
          btn.disabled = true;
          btn.innerHTML = `
            Submitting
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
          `;
        }

        form.submit();
      });
    });

  });
});
</script>
