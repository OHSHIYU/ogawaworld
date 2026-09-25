<link rel="stylesheet" href="<?= asset('css/corporate.css') ?>">
<link rel="stylesheet" href="<?= asset('css/btn.css') ?>">
<script src="https://www.google.com/recaptcha/api.js?render=6LffJHcsAAAAANZR95SWiL74RmdYAiOGwMk_21XO"></script>

<!-- HERO -->
<section class="corporate-hero">
    <div class="container">
        <h1>CORPORATE PURCHASE</h1>
        <p class="lead">
            OGAWA have 30 years of experience in the wellness industry corporate. Our Corporate Gifting team is 
            available to provide the best premium gift solutions and ideas for all your corporate needs.
        </p>
        <a href="#enquiry-form" class="btn-solid">Apply Now</a>
    </div>
</section>

<!-- BRAND CREDIBILITY SECTION -->
<section class="corporate-sec bg-white text-center">
    <div class="container">

        <h2>Why OGAWA?</h2>
        <p class="section-intro">
            OGAWA excels in the technology, design, and advancement of exceptional 
            massage chairs and products, with the goal of enhancing your well-being and fostering a healthy lifestyle.
        </p>

        <div class="stats-grid">
            <div class="stat-item">
                <h3><i class="fa-regular fa-handshake"></i> TRUSTWORTHY BRAND</h3>
                <p>77% of consumers consider OGAWA a reliable brand*</p>
            </div>

            <div class="stat-item">
                <h3><i class="fa-solid fa-shop"></i> 800 RETAIL OUTLETS</h3>
                <p>Wide distribution network of more than 800 retail outlets worldwide.</p>
            </div>

            <div class="stat-item">
                <h3><i class="fa-regular fa-calendar"></i> 30 YEARS</h3>
                <p>30 years of experience in the wellness industry.</p>
            </div>
        </div>

        <div class="stats-divider"></div>

        <div class="stats-disclaimer">
            <p>
                *89% out of 557 respondents are likely to choose OGAWA as their first choice or would seriously consider OGAWA for the next time they buy Massage, Fitness and Wellness Equipment - Based on sample size of 557 in December 2021, in Malaysia.
            </p>
            <p>
                *77% out of 557 respondents think that OGAWA is a trusted manufacturer/trustworthy brand - Based on sample size of 557 in December 2021, in Malaysia.
            </p>
        </div>

    </div>
</section>

<!-- WHY OGAWA -->
<section class="corporate-sec bg-dark text-center text-white" id="why-ogawa">
    <div class="container text-center">
        <p class="section-intro">
            We make business-gifting a hassle-free process for our customers, along with the best corporate DISCOUNT.
        </p>

        <!-- Process Flow -->
        <div class="process-grid">
            <div class="process-step">
                <div class="process-number">01</div>
                <p>Email / WhatsApp / Call from customer</p>
            </div>
            <div class="process-step">
                <div class="process-number">02</div>
                <p>Enquiry of budget and other details</p>
            </div>
            <div class="process-step">
                <div class="process-number">03</div>
                <p>Request Fulfilment</p>
            </div>
            <div class="process-step">
                <div class="process-number">04</div>
                <p>Delivery to desired destination</p>
            </div>
        </div>

        <div class="info-grid">
            <div>
                <h3>Delivery</h3>
                <p>
                    We can deliver all your items according to your time and place, 
                    anywhere in Malaysia. The products can be gift-wrapped upon special request as per your mutual agreement with OGAWA.
                </p>
            </div>
            <div>
                <h3>Payment</h3>
                <p>We accept credit card, cheque, PO, TT or cash to enjoy additional DISCOUNT.</p>
            </div>
            <div>
                <h3>How to Order</h3>
                <p>Kindly fill up the form below to get the conversation started.</p>
            </div>
        </div>

    </div>
</section>

<!-- ENQUIRY FORM -->
<section class="corporate-sec">
    <div class="container">

        <div class="form-wrapper">
            <h2 id="enquiry-form" class="text-center">Corporate Enquiry</h2>
            <p class="text-center mb-4">
                Kindly complete the form below and our team will get in touch shortly.
            </p>

            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php elseif ($errors): ?>
                <div class="alert alert-danger">
                    <strong>Please fix the following errors:</strong>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= e($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="og-form">
                <?php csrf_field(); ?>

                <div class="og-grid">

                    <input type="text" name="full_name" placeholder="Full Name*" value="<?= e($old['full_name']) ?>" required>
                    <input type="text" name="company_name" placeholder="Company Name*" value="<?= e($old['company_name']) ?>" required>

                    <input type="text" name="contact_number" placeholder="Contact Number*" value="<?= e($old['contact_number']) ?>" required>
                    <input type="email" name="email" placeholder="Email Address*" value="<?= e($old['email']) ?>" required>

                    <input type="text" name="address_line1" placeholder="Address (Line 1)*" value="<?= e($old['address_line1']) ?>" required>
                    <input type="text" name="address_line2" placeholder="Address (Line 2)" value="<?= e($old['address_line2']) ?>">

                    <input type="text" name="city" placeholder="City*" value="<?= e($old['city']) ?>" required>

                    <select name="state" required>
                        <option value="">State/Province*</option>
                        <?php
                        $states = [
                            'Johor','Kedah','Kelantan','Melaka','Negeri Sembilan',
                            'Pahang','Penang','Perak','Perlis','Sabah','Sarawak',
                            'Selangor','Terengganu','Kuala Lumpur','Putrajaya','Labuan'
                        ];
                        foreach ($states as $state):
                        ?>
                            <option value="<?= $state ?>" <?= $old['state'] === $state ? 'selected' : '' ?>>
                                <?= $state ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input type="text" name="postcode" placeholder="Postcode*" value="<?= e($old['postcode']) ?>" required>
                    <input type="text" name="country" placeholder="Country*" value="<?= e($old['country']) ?>" required>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-3">
                    <h4>Product</h4>
                    <button type="button" id="add-product" class="btn btn-outline-dark">+ Add Product</button>
                </div>

                <div id="product-wrapper">
                    <div class="product-row">
                        <input type="text" name="products[]" placeholder="Product Name" required>
                        <input type="number" name="qty[]" placeholder="Qty" min="1" value="1" required>
                        <button type="button" class="remove-product">×</button>
                    </div>
                </div>

                <textarea name="description" placeholder="Additional Notes" rows="4"><?= e($old['description']) ?></textarea>

                <label class="og-check">
                    <input type="checkbox" name="agreed_terms" value="1" required>
                    I have read and understood the privacy policy.
                </label>

                <br><br>

                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>

    </div>
</section>

<!-- MASSAGE CATEGORIES -->
<?php if (!empty($categories)): ?>
<section class="corporate-sec bg-light">
    <div class="container text-center">
        <h2>Massage Categories</h2>

        <div class="category-grid">
            <?php foreach ($categories as $cat): ?>
                <div class="category-item">
                    <?php if ($cat['image_url']): ?>
                        <img src="<?= e($cat['image_url']) ?>" alt="<?= e($cat['name']) ?>">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CLIENTS -->
<?php if (!empty($clients)): ?>
<section class="corporate-sec bg-white">
    <div class="container text-center">
        <h2>Our Clients</h2>

        <div class="marquee-scroller" data-marquee>
            <div class="marquee-track">
                <?php foreach ($clients as $client): ?>
                    <div class="marquee-item">
                        <img src="<?= e($client['image_url']) ?>" alt="<?= e($client['name']) ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- BUSINESS PARTNERS -->
<?php if (!empty($partners)): ?>
<section class="corporate-sec bg-light">
    <div class="container text-center">
        <h2>Our Business Partners</h2>

        <div class="marquee-scroller" data-marquee>
            <div class="marquee-track">
                <?php foreach ($partners as $partner): ?>
                    <div class="marquee-item">
                        <img src="<?= e($partner['image_url']) ?>" alt="<?= e($partner['name']) ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- AWARDS -->
<?php if (!empty($awards)): ?>
<section class="corporate-sec bg-white">
    <div class="container text-center">
        <h2>Awards & Achievements</h2>

        <div class="marquee-scroller" data-marquee>
            <div class="marquee-track">
                <?php foreach ($awards as $award): ?>
                    <div class="marquee-item marquee-item--award">
                        <img src="<?= e($award['image_url']) ?>" alt="<?= e($award['title']) ?>">
                        <h4><?= e($award['title']) ?></h4>
                        <p><?= e($award['year']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<script>
document.getElementById('add-product').addEventListener('click', function() {
    const wrapper = document.getElementById('product-wrapper');

    const row = document.createElement('div');
    row.classList.add('product-row');

    row.innerHTML = `
        <input type="text" name="products[]" placeholder="Product Name" required>
        <input type="number" name="qty[]" placeholder="Qty" min="1" value="1" required>
        <button type="button" class="remove-product">×</button>
    `;

    wrapper.appendChild(row);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-product')) {
        e.target.parentElement.remove();
    }
});

document.querySelector('.og-form').addEventListener('submit', function(e) {

    const form = this;

    // Native browser validation first
    if (!form.checkValidity()) {
        return;
    }

    e.preventDefault();

    const btn = form.querySelector('button[type=submit]');

    grecaptcha.ready(function() {
        grecaptcha.execute('6LffJHcsAAAAANZR95SWiL74RmdYAiOGwMk_21XO', {
            action: 'corporate_form'
        }).then(function(token) {

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
</script>

<script src="<?= asset('js/corporate-marquee.js') ?>" defer></script>
