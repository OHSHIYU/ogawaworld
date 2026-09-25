<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<?php if ($msg = flash_get('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"><?= e($msg) ?></div>
<?php endif; ?>

<div class="mb-4">
    <a href="<?= url('admin/faq') ?>" class="text-blue-600 hover:text-blue-800">← Back to FAQ</a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-semibold mb-4">FAQ Categories</h3>
    <p class="text-gray-600 mb-4">Manage FAQ categories. Note: Categories are currently view-only. To add/edit categories, please update the database directly.</p>
    
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sort Order</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach ($categories as $cat): ?>
            <tr>
                <td class="px-6 py-4 text-sm text-gray-900"><?= e($cat['name']) ?></td>
                <td class="px-6 py-4 text-sm text-gray-500"><?= e($cat['slug']) ?></td>
                <td class="px-6 py-4 text-sm text-gray-500"><?= $cat['sort_order'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
