<?php require VIEW_PATH . 'admin/layout/header.php'; ?>
<div class="bg-white rounded-lg shadow p-6"><h2 class="text-xl font-bold mb-6"><?= $pageTitle ?></h2>
<form method="POST" action="<?= url('admin/categories/'.($item['id']?'update':'create')) ?>" enctype="multipart/form-data"><?php csrf_field(); ?>
<?php if($item['id']): ?><input type="hidden" name="id" value="<?= $item['id'] ?>"><?php endif; ?>
<input type="hidden" name="existing_image_url" value="<?= e($item['image_url']) ?>">
<div class="mb-4"><label class="block text-gray-700 text-sm font-bold mb-2">Category Name</label><input type="text" name="name" value="<?= e($item['name']) ?>" class="shadow border rounded w-full py-2 px-3" required></div>
<div class="mb-4"><label class="block text-gray-700 text-sm font-bold mb-2">Category Image</label>
<?php if ($item['image_url']): ?>
    <div class="mb-2"><img src="<?= e($item['image_url']) ?>" class="h-20 w-auto border rounded"></div>
<?php endif; ?>
<input type="file" name="image" class="shadow border rounded w-full py-2 px-3" accept="image/*">
</div>
<div class="mb-4"><label class="block text-gray-700 text-sm font-bold mb-2">Link (Optional)</label><input type="text" name="link" value="<?= e($item['link']) ?>" class="shadow border rounded w-full py-2 px-3"></div>
<div class="mb-4"><label class="block text-gray-700 text-sm font-bold mb-2">Sort Order</label><input type="number" name="sort_order" value="<?= $item['sort_order'] ?>" class="shadow border rounded w-full py-2 px-3"></div>
<div class="flex gap-2"><button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded">Save</button><a href="<?= url('admin/categories') ?>" class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Cancel</a></div>
</form></div>
<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
