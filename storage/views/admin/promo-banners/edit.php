<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="bg-white rounded-lg shadow p-6">

    <div class="flex items-center gap-3 mb-6">
        <a href="<?= url('admin/promo-banners') ?>" class="text-gray-500 hover:text-gray-700">←</a>
        <h2 class="text-xl font-bold"><?= e($pageTitle) ?></h2>
    </div>

    <?php if ($flash = flash_get('error')): ?>
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded"><?= e($flash) ?></div>
    <?php endif; ?>

    <p class="text-sm text-gray-500 mb-4">
        Editing: <strong><?= e(ucwords(str_replace('_', ' ', $item['panel']))) ?></strong>
    </p>

    <form method="POST" action="<?= url('admin/promo-banners/update') ?>" enctype="multipart/form-data">
        <?php csrf_field(); ?>

        <input type="hidden" name="id" value="<?= (int)$item['id'] ?>">
        <input type="hidden" name="existing_image_url" value="<?= e($item['image_url'] ?? '') ?>">

        <!-- Image -->
        <?php if (!empty($item['image_url'])): ?>
            <div class="mb-4">
                <img src="<?= asset('uploads/' . ltrim($item['image_url'], '/')) ?>" class="h-40 rounded border">
            </div>
        <?php endif; ?>

        <input type="file" name="image" class="mb-4">

        <!-- Heading -->
        <input type="text" name="heading"
               value="<?= e($item['heading']) ?>"
               class="w-full mb-4 border p-2"
               placeholder="Heading"
               required>

        <!-- Subheading -->
        <input type="text" name="subheading"
               value="<?= e($item['subheading']) ?>"
               class="w-full mb-4 border p-2"
               placeholder="Subheading">

        <!-- CTA -->
        <input type="text" name="cta_text"
               value="<?= e($item['cta_text']) ?>"
               class="w-full mb-4 border p-2"
               placeholder="CTA text">

        <input type="text" name="cta_url"
               value="<?= e($item['cta_url']) ?>"
               class="w-full mb-4 border p-2"
               placeholder="/store or https://...">

        <!-- Active -->
        <label class="block mb-4">
            <input type="checkbox" name="is_active" value="1"
                <?= !empty($item['is_active']) ? 'checked' : '' ?>>
            Active
        </label>

        <button class="bg-blue-600 text-white px-6 py-2 rounded">
            Save
        </button>
    </form>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
