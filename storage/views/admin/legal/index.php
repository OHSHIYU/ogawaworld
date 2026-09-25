<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<?php if ($msg = flash_get('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"><?= e($msg) ?></div>
<?php endif; ?>

<div class="mb-4">
    <a href="<?= url('admin/legal/create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New Legal Page
    </a>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Legal Pages</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sort</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hidden</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($pages as $page): ?>
                <tr class="<?= !$page['status'] ? 'bg-gray-50 opacity-60' : '' ?>">
                    
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <?= e($page['category']) ?>
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">
                        <?= e($page['title']) ?>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?= e($page['slug']) ?>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?= (int)$page['sort_order'] ?>
                    </td>

                    <!-- STATUS -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?= $page['status'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                            <?= $page['status'] ? 'Active' : 'Inactive' ?>
                        </span>
                    </td>

                    <!-- HIDDEN -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?php if ($page['status']): ?>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                <?= $page['is_hidden'] ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-600' ?>">
                                <?= $page['is_hidden'] ? 'Hidden' : 'Visible' ?>
                            </span>
                        <?php else: ?>
                            <span class="text-xs text-gray-400">—</span>
                        <?php endif; ?>
                    </td>

                    <!-- UPDATED -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?= date('M j, Y', strtotime($page['updated_at'])) ?>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="<?= url('admin/legal/edit/' . $page['id']) ?>" 
                        class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>

                        <a href="<?= url('admin/legal/delete/' . $page['id']) ?>" 
                        class="text-red-600 hover:text-red-900"
                        onclick="return confirm('Delete this legal page?')">Delete</a>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
