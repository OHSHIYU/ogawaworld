<link rel="stylesheet" href="<?= asset('css/contact.css') ?>">
<script src="https://www.google.com/recaptcha/api.js?render=6LcAl3csAAAAAAAGU8FM9_JTEBHas1J88LWkJz9G"></script>

<section aria-labelledby="contact-title">
  <div class="lv-banner" style="background-image:url('<?= asset('img/hero/hero-a.webp') ?>');">
    <h1 id="contact-title" class="lv-banner__title">Contact Us</h1>
  </div>

  <div class="lv-grid">
    <aside class="lv-side">
      <div class="card lv-contact">
        <h3>MALAYSIA HQ</h3>

        <div class="lv-company">
          <strong>Healthy World Lifestyle Sdn. Bhd.</strong>
          <span>(550497-K)</span>
        </div>

        <ul class="lv-contact-list">
          <li>
            <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
            <span>
              No. 22, Jalan Anggerik Mokara 31/47,<br>
              Kota Kemuning, 40460 Shah Alam, Selangor.
            </span>
          </li>

          <li>
            <span class="icon"><i class="fa-solid fa-map"></i></span>
            <a target="_blank"
              href="https://maps.app.goo.gl/ZZVTdjcDAD8QjPj36">
              Google Maps
            </a>
          </li>

          <li>
            <span class="icon"><i class="fa-solid fa-phone"></i></span>
            <span>+603-5125 1600</span>
          </li>

          <li>
            <span class="icon"><i class="fa-solid fa-headphones"></i></span>
            <span>1800-88-4688</span>
          </li>

          <li>
            <span class="icon"><i class="fa-solid fa-envelope"></i></span>
            <a href="mailto:customercare@ogawaworld.net">
              customercare@ogawaworld.net
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <main class="lv-main">
      <?php if ($success): ?>
        <div class="alert alert-success" role="alert"><?= $success ?></div>
      <?php elseif ($errors): ?>
        <div class="alert alert-danger" role="alert">Please fix the highlighted fields below.</div>
      <?php endif; ?>

      <?php if (isset($errors['recaptcha'])): ?>
        <div class="alert alert-danger"><?= e($errors['recaptcha']) ?></div>
      <?php endif; ?>

      <form class="og-form" method="post" action="">
        <?php csrf_field(); ?>
        <div class="og-grid">
          <div>
            <label for="title">Title</label>
            <select id="title" name="title" class="<?= isset($errors['title'])?'is-invalid':'' ?>">
              <?php foreach (['Mr','Ms','Mrs','Dr','Other'] as $opt): ?>
                <option value="<?= $opt ?>" <?= $old['title']===$opt?'selected':'' ?>><?= $opt ?></option>
              <?php endforeach; ?>
            </select>
            <?php if (isset($errors['title'])): ?><div class="error"><?= $errors['title'] ?></div><?php endif; ?>
          </div>

          <div>
            <label for="full_name">Full Name*</label>
            <input id="full_name" type="text" name="full_name" value="<?= e($old['full_name']) ?>" required class="<?= isset($errors['full_name'])?'is-invalid':'' ?>">
            <?php if (isset($errors['full_name'])): ?><div class="error"><?= $errors['full_name'] ?></div><?php endif; ?>
          </div>

          <div>
            <label for="contact_number">Contact Number</label>
            <input id="contact_number" type="text" name="contact_number" value="<?= e($old['contact_number']) ?>">
          </div>

          <div>
            <label for="email">Email Address*</label>
            <input id="email" type="email" name="email" value="<?= e($old['email']) ?>" required class="<?= isset($errors['email'])?'is-invalid':'' ?>">
            <?php if (isset($errors['email'])): ?><div class="error"><?= $errors['email'] ?></div><?php endif; ?>
          </div>

          <div>
            <label for="state">State</label>
            <select id="state"
                    name="state"
                    class="<?= isset($errors['state']) ? 'is-invalid' : '' ?>">
              <option value="">Select State</option>
              <?php
                $states = [
                  'Johor','Kedah','Kelantan','Melaka','Negeri Sembilan',
                  'Pahang','Penang','Perak','Perlis','Sabah','Sarawak',
                  'Selangor','Terengganu','Kuala Lumpur','Putrajaya','Labuan'
                ];
                foreach ($states as $s):
              ?>
                <option value="<?= $s ?>" <?= ($old['state'] ?? '') === $s ? 'selected' : '' ?>>
                  <?= $s ?>
                </option>
              <?php endforeach; ?>
            </select>

            <?php if (isset($errors['state'])): ?>
              <div class="error"><?= $errors['state'] ?></div>
            <?php endif; ?>
          </div>

          <div>
            <label for="postcode">Postcode</label>
            <input id="postcode" type="text" name="postcode" value="<?= e($old['postcode']) ?>">
          </div>

          <div>
            <label for="inquiry_type">Type of Inquiry*</label>
            <select id="inquiry_type" name="inquiry_type" required class="<?= isset($errors['inquiry_type'])?'is-invalid':'' ?>">
              <option value="">Select…</option>
              <?php foreach (['Massage Chair','Treadmill','Others'] as $opt): ?>
                <option value="<?= $opt ?>" <?= $old['inquiry_type']===$opt?'selected':'' ?>><?= $opt ?></option>
              <?php endforeach; ?>
            </select>
            <?php if (isset($errors['inquiry_type'])): ?><div class="error"><?= $errors['inquiry_type'] ?></div><?php endif; ?>
          </div>

          <div class="og-col-2">
            <label for="description">Description*</label>
            <textarea id="description" name="description" rows="5" required class="<?= isset($errors['description'])?'is-invalid':'' ?>"><?= e($old['description']) ?></textarea>
            <?php if (isset($errors['description'])): ?><div class="error"><?= $errors['description'] ?></div><?php endif; ?>
          </div>
        </div>

        <label class="og-check">
          <input type="checkbox" name="interested_service" value="1" <?= $old['interested_service']? 'checked':'' ?>>
          I am interested in Service Maintenance Package
        </label>

        <label class="og-check <?= isset($errors['agreed_terms'])?'is-invalid':'' ?>">
          <input type="checkbox" name="agreed_terms" value="1" <?= $old['agreed_terms']? 'checked':'' ?> required>
          I have read and understood the <a href="<?= url('privacy-policy') ?>" target="_blank">terms and conditions of the Policy Notice</a> and hereby agree to the same.
        </label>
        <?php if (isset($errors['agreed_terms'])): ?><div class="error"><?= $errors['agreed_terms'] ?></div><?php endif; ?>

        <button class="btn btn-primary" type="submit">Submit</button>
      </form>

      <p class="note">
        IMPORTANT NOTE: This form is for general, sales, product and complaint enquiries about OGAWA.
        For business proposals or sponsorship, email <a href="mailto:ogawa-marketing@ogawaworld.net">ogawa-marketing@ogawaworld.net</a>.
      </p>
    </main>
  </div>
</section>

<script>
(() => {
  window.addEventListener('load', () => document.body.classList.add('is-ready'));

  const form = document.querySelector('.og-form');
  if (!form) return;

  form.addEventListener('submit', function (e) {

    // Native validation first
    if (!form.checkValidity()) {
      e.preventDefault();

      form.classList.remove('form-shake');
      void form.offsetWidth;
      form.classList.add('form-shake');

      const firstInvalid = form.querySelector(':invalid');
      if (firstInvalid) {
        firstInvalid.focus({ preventScroll: true });
        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }

      return;
    }

    e.preventDefault();

    // Execute reCAPTCHA
    grecaptcha.ready(function () {
      grecaptcha.execute('6LcAl3csAAAAAAAGU8FM9_JTEBHas1J88LWkJz9G', {
        action: 'contact_form'
      }).then(function (token) {

        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'g-recaptcha-response';
        input.value = token;

        form.appendChild(input);

        // Loading state
        const btn = form.querySelector('button[type=submit]');
        if (btn) {
          btn.disabled = true;
          btn.innerHTML = `Submitting <span class="dot"></span><span class="dot"></span><span class="dot"></span>`;
        }

        form.submit();
      });
    });
  });
})();
</script>
