<?php require VIEW_PATH . 'admin/layout/header.php'; ?>
<div class="mb-4"><a href="<?= url('admin/categories/create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">Add New Category</a></div>
<div class="bg-white rounded-lg shadow"><div class="px-6 py-4 border-b border-gray-200"><h3 class="text-lg font-semibold text-gray-800">Massage Categories</h3></div>
<div class="overflow-x-auto"><table class="min-w-full divide-y divide-gray-200"><thead><tr class="bg-gray-50"><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sort</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th></tr></thead>
<tbody class="bg-white divide-y divide-gray-200"><?php foreach ($items as $item): ?>
<tr><td class="px-6 py-4"><?php if ($item['image_url']): ?><img src="<?= e($item['image_url']) ?>" class="h-10 w-auto"><?php endif; ?></td>
<td class="px-6 py-4 text-sm font-medium text-gray-900"><?= e($item['name']) ?></td><td class="px-6 py-4 text-sm text-gray-500"><?= e($item['link']) ?></td><td class="px-6 py-4 text-sm text-gray-500"><?= $item['sort_order'] ?></td>
<td class="px-6 py-4 text-sm font-medium"><a href="<?= url('admin/categories/edit/'.$item['id']) ?>" class="text-blue-600 mr-3">Edit</a><a href="<?= url('admin/categories/delete/'.$item['id']) ?>" class="text-red-600" onclick="return confirm('Delete?')">Delete</a></td></tr>
<?php endforeach; ?></tbody></table></div></div>
<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
