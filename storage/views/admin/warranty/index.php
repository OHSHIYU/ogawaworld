<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<?php if ($msg = flash_get('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"><?= e($msg) ?></div>
<?php endif; ?>

<div class="mb-4">
    <a href="<?= url('admin/warranty/create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New Warranty Page
    </a>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b">
        <h3 class="text-lg font-semibold">Warranty Pages</h3>
    </div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sort</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hidden</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach ($pages as $page): ?>
            <tr>
                <td class="px-6 py-4 text-sm"><?= e($page['title']) ?></td>
                <td class="px-6 py-4 text-sm text-gray-500"><?= e($page['slug']) ?></td>
                <td class="px-6 py-4 text-sm"><?= $page['sort_order'] ?></td>
                <td>
                    <span class="px-2 inline-flex text-xs font-semibold rounded-full 
                        <?= $page['status'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                        <?= $page['status'] ? 'Active' : 'Inactive' ?>
                    </span>
                </td>
                <td>
                    <?php if ($page['status']): ?>
                        <span class="px-2 inline-flex text-xs font-semibold rounded-full 
                            <?= $page['is_hidden'] ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-600' ?>">
                            <?= $page['is_hidden'] ? 'Hidden' : 'Visible' ?>
                        </span>
                    <?php else: ?>
                        <span class="text-gray-400 text-xs">—</span>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4 text-sm">
                    <a href="<?= url('admin/warranty/edit/' . $page['id']) ?>" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                    <a href="<?= url('admin/warranty/delete/' . $page['id']) ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete this warranty page?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
