<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="bg-white rounded-lg shadow p-6 max-w-4xl">
    <div class="flex items-center gap-3 mb-6">
        <a href="<?= url('admin/events') ?>" class="text-gray-500 hover:text-gray-700">← Back</a>
        <h2 class="text-xl font-bold"><?= e($pageTitle) ?></h2>
    </div>

    <?php if ($flash = flash_get('error')): ?>
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded"><?= e($flash) ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= url('admin/events/store') ?>" enctype="multipart/form-data">
        <?php csrf_field(); ?>

        <!-- Title & Subtitle -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Event Title *</label>
                <input type="text" name="title" id="title-input"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Event Subtitle</label>
                <input type="text" name="subtitle"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <!-- Slug -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-1">URL Slug</label>
            <div class="flex items-center gap-2">
                <span class="text-gray-400 text-sm whitespace-nowrap"><?= rtrim(url('events'), '/') ?>/</span>
                <input type="text" name="slug" id="slug-input"
                    class="shadow border rounded flex-1 py-2 px-3 text-gray-700 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="auto-generated-from-title">
            </div>
            <p class="text-xs text-gray-400 mt-1">Leave blank to auto-generate from the title. Use only letters, numbers, and hyphens.</p>
        </div>

        <!-- Date Range -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Start Date *</label>
                <input type="date" name="start_date"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">End Date *</label>
                <input type="date" name="end_date"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
        </div>

        <!-- Cover / Thumbnail Image -->
        <div class="mb-4 bg-gray-50 p-4 border rounded">
            <label class="block text-gray-700 text-sm font-bold mb-1">Event Thumbnail / Cover Image</label>
            <p class="text-xs text-gray-400 mb-2">Shown as the event card thumbnail in the listing page.</p>
            <input type="file" name="image_url" accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500
                  file:mr-4 file:py-2 file:px-4 file:rounded file:border-0
                  file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700
                  hover:file:bg-blue-100" />
        </div>

        <!-- Event Detail Content -->
        <div class="mb-4 border rounded overflow-hidden">
            <div class="bg-gray-100 px-4 py-2 text-sm font-bold text-gray-700">Event Detail Content</div>
            <div class="p-4 border-b">
                <label class="block text-gray-700 text-sm font-bold mb-1">Text Content</label>
                <p class="text-xs text-gray-400 mb-2">Optional. Leave blank if no text is needed.</p>
                <textarea name="content_text" rows="6"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter event description or details here..."></textarea>
            </div>
            <div class="p-4 bg-gray-50">
                <label class="block text-gray-700 text-sm font-bold mb-1">Detail / Body Image</label>
                <p class="text-xs text-gray-400 mb-2">Optional. Shown below the text in the event detail page.</p>
                <input type="file" name="content_image" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-500
                      file:mr-4 file:py-2 file:px-4 file:rounded file:border-0
                      file:text-sm file:font-semibold file:bg-green-50 file:text-green-700
                      hover:file:bg-green-100" />
            </div>
        </div>

        <!-- Active Toggle -->
        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" checked class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2 text-gray-700">Active (Visible on frontend)</span>
            </label>
        </div>

        <div>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                Save Event
            </button>
        </div>
    </form>
</div>

<script>
// Auto-populate slug from title (only while slug field is empty / untouched)
(function () {
    const titleEl = document.getElementById('title-input');
    const slugEl  = document.getElementById('slug-input');
    let userEdited = false;

    slugEl.addEventListener('input', function () {
        userEdited = slugEl.value.trim() !== '';
    });

    titleEl.addEventListener('input', function () {
        if (userEdited) return;
        slugEl.value = titleEl.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/[\s-]+/g, '-');
    });

    // Sanitise slug on blur
    slugEl.addEventListener('blur', function () {
        slugEl.value = slugEl.value
            .toLowerCase()
            .replace(/[^a-z0-9-]/g, '')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
        userEdited = slugEl.value !== '';
    });
})();
</script>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
