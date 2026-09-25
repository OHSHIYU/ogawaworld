<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="bg-white rounded-lg shadow p-6 max-w-4xl">

<h2 class="text-xl font-bold mb-6">
    <?= $manual['id'] ? 'Edit Manual' : 'Add Manual' ?>
</h2>

<form method="POST"
      enctype="multipart/form-data"
      action="<?= url('admin/manuals/'.($manual['id']?'update':'create')) ?>">

<?php csrf_field(); ?>
<?php if($manual['id']): ?>
<input type="hidden" name="id" value="<?= $manual['id'] ?>">
<?php endif; ?>

<!-- Tabs -->
<div class="flex border-b mb-6 gap-4">
    <button type="button"
            class="tab-btn px-4 py-2 font-semibold border-b-2"
            data-tab="woo">
        WooCommerce Product
    </button>

    <button type="button"
            class="tab-btn px-4 py-2 font-semibold border-b-2"
            data-tab="legacy">
        Legacy Product
    </button>
</div>

<input type="hidden" name="source" id="sourceField" value="<?= e($manual['source']) ?>">

<!-- ===================== -->
<!-- Woo Tab -->
<!-- ===================== -->
<div id="wooTab" class="tab-content">

    <label class="block mb-2 font-semibold">
        Select Woo Product
    </label>

    <input type="hidden" name="wc_slug" id="wcSlug" value="<?= e($manual['wc_slug']) ?>">

    <select name="wc_product_id" id="wooSelect" class="w-full border rounded px-3 py-2 mb-4 select2">

        <option value="">-- Select Product --</option>

        <?php foreach ($wooProducts as $p): ?>
            <option value="<?= $p['id'] ?>"
                    data-slug="<?= e($p['slug']) ?>"
                    <?= $manual['wc_product_id']==$p['id']?'selected':'' ?>>
                <?= e($p['name']) ?> (<?= e($p['slug']) ?>)
            </option>
        <?php endforeach; ?>

    </select>
</div>

<!-- ===================== -->
<!-- Legacy Tab -->
<!-- ===================== -->
<div id="legacyTab" class="tab-content">

    <label class="block mb-2 font-semibold">
        Legacy Product Title
    </label>

    <input type="text"
           name="legacy_title"
           id="legacyTitle"
           value="<?= e($manual['legacy_title']) ?>"
           class="w-full border rounded px-3 py-2 mb-4">

    <label class="block mb-2 font-semibold">
        Legacy Slug
    </label>

    <input type="text"
           name="legacy_slug"
           id="legacySlug"
           value="<?= e($manual['legacy_slug']) ?>"
           class="w-full border rounded px-3 py-2 mb-4">
</div>

<!-- ===================== -->
<!-- Upload -->
<!-- ===================== -->
<label class="block mb-2 font-semibold">
    Upload PDF Manual
</label>

<input type="file"
       name="manual"
       accept=".pdf"
       class="mb-4">

<?php if (!empty($manual['manual_file'])): ?>
    <div class="mt-3">
        <p class="text-sm text-gray-600 mb-2">Current File:</p>

        <a href="<?= asset($manual['manual_file']) ?>"
           target="_blank"
           class="text-blue-600 underline">
           View Current PDF
        </a>

        <iframe
            src="https://mozilla.github.io/pdf.js/web/viewer.html?file=<?= urlencode(asset($manual['manual_file'])) ?>"
            style="width:100%; height:400px; margin-top:10px; border:1px solid #ddd;">
        </iframe>
    </div>
<?php endif; ?>

<!-- ===================== -->
<!-- Meta -->
<!-- ===================== -->
<div class="grid grid-cols-2 gap-4 mb-6">

    <div>
        <label class="block mb-2 font-semibold">
            Sort Order
        </label>
        <input type="number"
               name="sort_order"
               value="<?= $manual['sort_order'] ?>"
               class="w-full border rounded px-3 py-2">
    </div>

    <div class="flex items-center mt-8">
        <input type="checkbox"
               name="status"
               value="1"
               <?= $manual['status']?'checked':'' ?>
               class="mr-2">
        <span class="font-semibold">Active</span>
    </div>

</div>

<div class="flex gap-3">
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
        Save Manual
    </button>

    <a href="<?= url('admin/manuals') ?>"
       class="bg-gray-500 text-white px-6 py-2 rounded">
        Cancel
    </a>
</div>

</form>
</div>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#wooSelect').select2({
            placeholder: "-- Select Product --",
            allowClear: true,
            width: '100%',
            minimumInputLength: 2
        });
    });

    const wooTab       = document.getElementById('wooTab');
    const legacyTab    = document.getElementById('legacyTab');
    const buttons      = document.querySelectorAll('.tab-btn');
    const sourceField  = document.getElementById('sourceField');
    const wooSelect    = document.getElementById('wooSelect');
    const wcSlug       = document.getElementById('wcSlug');
    const legacyTitle  = document.getElementById('legacyTitle');
    const legacySlug   = document.getElementById('legacySlug');

    /* =========================
    Auto fill slug on change
    ========================= */
    $('#wooSelect').on('change', function () {
        const selectedOption = $(this).find(':selected');
        wcSlug.value = selectedOption.data('slug') || '';
    });

    /* =========================
    Tab Activation
    ========================= */
    function activate(tab) {

        wooTab.style.display    = (tab === 'woo') ? 'block' : 'none';
        legacyTab.style.display = (tab === 'legacy') ? 'block' : 'none';
        sourceField.value       = tab;

        if (tab === 'woo') {

            wooSelect.required   = true;
            legacyTitle.required = false;
            legacySlug.required  = false;

            // Fix width issue when tab becomes visible
            $('#wooSelect').trigger('change.select2');

        } else {

            wooSelect.required   = false;
            legacyTitle.required = true;
            legacySlug.required  = true;
        }

        // Auto fill slug
        const selectedOption = $('#wooSelect').find(':selected');
        wcSlug.value = selectedOption.data('slug') || '';

        // UI highlight
        buttons.forEach(btn => {
            btn.classList.remove('border-blue-600','text-blue-600');
            if (btn.dataset.tab === tab) {
                btn.classList.add('border-blue-600','text-blue-600');
            }
        });
    }

    /* =========================
    Tab click
    ========================= */
    buttons.forEach(btn=>{
        btn.addEventListener('click', () => {
            activate(btn.dataset.tab);
        });
    });

    /* =========================
    Init
    ========================= */
    activate("<?= $manual['source'] ?>");
</script>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
