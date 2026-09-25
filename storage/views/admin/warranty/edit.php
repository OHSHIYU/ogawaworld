<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="bg-white rounded-lg shadow p-6">
    <form method="POST" action="<?= url('admin/warranty/' . ($page['id'] ? 'update' : 'create')) ?>">
        <?php csrf_field(); ?>
        <?php if ($page['id']): ?>
            <input type="hidden" name="id" value="<?= $page['id'] ?>">
        <?php endif; ?>
        
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Title *</label>
                <input type="text" name="title" value="<?= e($page['title']) ?>" class="shadow border rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Slug *</label>
                <input type="text" name="slug" value="<?= e($page['slug']) ?>" class="shadow border rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>
        
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="<?= $page['sort_order'] ?>" class="shadow border rounded w-full py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Content</label>
            <textarea name="content_html" id="editor" rows="10"><?= e($page['content_html']) ?></textarea>
        </div>

        <div class="flex flex-col gap-3 mb-6">
            <label class="inline-flex items-center">
                <input type="checkbox" id="statusCheckbox" name="status" value="1"
                    <?= !isset($page['status']) || $page['status'] ? 'checked' : '' ?>
                    class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2 font-semibold">Active</span>
            </label>

            <label class="inline-flex items-center">
                <input type="checkbox" id="hiddenCheckbox" name="is_hidden" value="1"
                    <?= !empty($page['is_hidden']) ? 'checked' : '' ?>
                    <?= isset($page['status']) && !$page['status'] ? 'disabled' : '' ?>
                    class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2 font-semibold">Hidden Link</span>
            </label>
        </div>
        
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                <?= $page['id'] ? 'Update' : 'Create' ?> Warranty Page
            </button>
            <a href="<?= url('admin/warranty') ?>" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-150">Cancel</a>
        </div>
    </form>
</div>

<script>
    CKEDITOR.replace('editor', {
        height: 400,
        resize_enabled: false,
        removePlugins: 'elementspath,notification',
        versionCheck: false
    });

    const statusCheckbox = document.getElementById('statusCheckbox');
    const hiddenCheckbox = document.getElementById('hiddenCheckbox');

    function toggleHiddenCheckbox() {
        if (!statusCheckbox.checked) {
            hiddenCheckbox.checked = false;
            hiddenCheckbox.disabled = true;
        } else {
            hiddenCheckbox.disabled = false;
        }
    }

    statusCheckbox.addEventListener('change', toggleHiddenCheckbox);
    toggleHiddenCheckbox();
</script>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
