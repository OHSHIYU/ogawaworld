<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-bold mb-6"><?= $pageTitle ?></h2>
    
    <form method="POST" action="<?= url('admin/clients/'.($item['id']?'update':'create')) ?>" enctype="multipart/form-data">
        <?php csrf_field(); ?>
        <?php if($item['id']): ?><input type="hidden" name="id" value="<?= $item['id'] ?>"><?php endif; ?>
        <input type="hidden" name="existing_image_url" value="<?= e($item['image_url']) ?>">
        
        <div class="mb-4"><label class="block text-gray-700 text-sm font-bold mb-2">Client Name</label><input type="text" name="name" value="<?= e($item['name']) ?>" class="shadow border rounded w-full py-2 px-3" required></div>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Logo Image</label>
            <?php if ($item['image_url']): ?>
                <div class="mb-2"><img src="<?= e($item['image_url']) ?>" class="h-20 w-auto border rounded"></div>
            <?php endif; ?>
            <input type="file" name="image" class="shadow border rounded w-full py-2 px-3" accept="image/*">
            <p class="text-xs text-gray-500 mt-1">Recommended size: 200x100px. Max 5MB.</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Sort Order</label>
            <input type="number" name="sort_order" value="<?= $item['sort_order'] ?>" class="shadow border rounded w-full py-2 px-3 text-gray-700">
        </div>
        
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            <a href="<?= url('admin/clients') ?>" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Cancel</a>
        </div>
    </form>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
