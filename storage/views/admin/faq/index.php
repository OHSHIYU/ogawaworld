<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<?php if ($msg = flash_get('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"><?= e($msg) ?></div>
<?php endif; ?>

<div class="mb-4 flex gap-2">
    <a href="<?= url('admin/faq/create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New FAQ
    </a>
    <a href="<?= url('admin/faq/categories') ?>" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
        Manage Categories
    </a>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">FAQ Items</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Question</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sort</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($items as $item): ?>
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-900"><?= e($item['category']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-900"><?= e($item['question']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-500"><?= $item['sort_order'] ?></td>
                    <td class="px-6 py-4 text-sm font-medium">
                        <a href="<?= url('admin/faq/edit/' . $item['id']) ?>" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                        <a href="<?= url('admin/faq/delete/' . $item['id']) ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete this FAQ?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
