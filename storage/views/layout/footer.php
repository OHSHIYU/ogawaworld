<footer class="site-footer" role="contentinfo">
  <link rel="stylesheet" href="<?= asset('css/footer.css') ?>">

  <section class="footer-contact" id="subscribe" aria-labelledby="footer-contact-title">
    <div class="container f-grid">
      
      <!-- Contact Info -->
      <div>
        <h3 id="footer-contact-title">OGAWA</h3>
        <address>
          <div class="f-row">
            <span>Enquiry</span>
            <span>
              Hotline: <a href="tel:1800884688">1800-88-4688</a><br>
              HQ: <a href="tel:0351251600">03-51251600</a>
            </span>
          </div>
          <div class="f-row"><span>Email</span><span><a href="mailto:customercare@ogawaworld.net">customercare@ogawaworld.net</a></span></div>
          <div class="f-row"><span>Address</span>
            <span>No. 22, Jalan Anggerik Mokara 31/47,<br>Kota Kemuning, 40460 Shah Alam, Selangor.</span>
          </div>
        </address>
      </div>

      <!-- Information Links -->
      <div>
        <h3>Information</h3>
        <ul class="f-list" role="list">
          <li><a href="<?= url('return-policy') ?>">Policy</a></li>
          <li><a href="<?= url('contact') ?>">Contact Us</a></li>
          <li><a href="<?= url('corporate-purchase') ?>">Corporate Purchase</a></li>
          <li><a href="<?= url('faq') ?>">FAQ</a></li>
          <li><a href="<?= url('warranty/general-warranty') ?>">Warranty</a></li>
          <li><a href="<?= url('user-manual') ?>">Manuals and Downloads</a></li>
        </ul>
      </div>

      <!-- Subscribe -->
      <!-- <div>
        <h3>Subscribe</h3>
        <p class="f-muted">Sign up to receive news and updates.</p>

        <form class="subscribe" id="subscribe-form" novalidate>
          <label for="subscribe-email" class="visually-hidden">Email address</label>
          <input type="email" id="subscribe-email" name="email" placeholder="Email *" required aria-required="true">
          <button class="btn-sub" type="submit">Subscribe</button>
          <label class="chk">
            <input type="checkbox" id="subscribe-optin" name="optin">
            <span>Yes, subscribe me to your newsletter.</span>
          </label>
        </form>
      </div> -->
    </div>
  </section>

  <div class="f-bottom text-center small text-muted py-3">
    &copy; <?= date('Y') ?> OGAWA Malaysia. All rights reserved.
  </div>
</footer>

<!-- Start of Omnichat code -->
  <script>var a=document.createElement('a');a.setAttribute('href','javascript:;');a.setAttribute('id','easychat-floating-button');
    var span=document.createElement('span');span.setAttribute('id', 'easychat-unread-badge');span.setAttribute('style','display: none');var d1=document.createElement('div');d1.setAttribute('id','easychat-close-btn');d1.setAttribute('class','easychat-close-btn-close');var d2=document.createElement('div');d2.setAttribute('id','easychat-chat-dialog');d2.setAttribute('class','easychat-chat-dialog-close');var ifrm=document.createElement('iframe');ifrm.setAttribute('id','easychat-chat-dialog-iframe');
    ifrm.setAttribute('src','https://client-chat.easychat.co/?appkey=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0ZWFtTmFtZSI6IjQ2NzQzZjFkLTgxZjgtNGI0My1iYjhhLTc4MThiNjdkOGEyNCJ9.5JkyjW6YBLR0Sn7t5joHhl5n1D-TxT7zYoF_OsLOPQ4&lang=en');
    ifrm.style.width='100%';ifrm.style.height='100%';ifrm.style.frameborder='0';ifrm.style.scrolling='on';d2.appendChild(ifrm);
    if(!document.getElementById("easychat-floating-button")){
      document.body.appendChild(a);document.body.appendChild(span);document.body.appendChild(d1);document.body.appendChild(d2);
    }

    var scriptURL = 'https://chat-plugin.easychat.co/easychat.js';
    if(!document.getElementById("omnichat-plugin")) {
      var scriptTag = document.createElement('script');
      scriptTag.src = scriptURL;
      scriptTag.id = 'omnichat-plugin';
      document.body.appendChild(scriptTag);
    }
  </script>
<!-- End of Omnichat code -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="<?= asset('js/main.js') ?>" defer></script>
<script src="<?= asset('js/scroll-animate.js') ?>" defer></script>
<script src="<?= asset('js/vbar.js') ?>" defer></script>

<script>
document.getElementById('subscribe-form')?.addEventListener('submit', e => {
  e.preventDefault();
  const email = e.target.email.value.trim();
  if (email) alert(`Subscribed: ${email}`);
});
</script>
</body>
</html>
