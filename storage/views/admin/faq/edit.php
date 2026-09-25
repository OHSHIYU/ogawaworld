<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="bg-white rounded-lg shadow p-6">
    <form method="POST" action="<?= url('admin/faq/' . ($item['id'] ? 'update' : 'create')) ?>">
        <?php csrf_field(); ?>
        <?php if ($item['id']): ?>
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
        <?php endif; ?>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Question</label>
            <input type="text" name="question" value="<?= e($item['question']) ?>" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Answer</label>
            <textarea name="answer" id="editor" rows="8" class="shadow border rounded w-full py-2 px-3 text-gray-700"><?= e($item['answer']) ?></textarea>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Category</label>
            <select name="category_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Select Category --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= ($item['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                        <?= e($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Sort Order</label>
            <input type="number" name="sort_order" value="<?= $item['sort_order'] ?>" class="shadow border rounded w-full py-2 px-3 text-gray-700">
        </div>
        
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            <a href="<?= url('admin/faq') ?>" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Cancel</a>
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
</script>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
