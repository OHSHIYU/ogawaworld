<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="bg-white rounded-lg shadow p-6">

<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold">Product Manuals</h2>
    <a href="<?= url('admin/manuals/create') ?>"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Add Manual
    </a>
</div>

<table class="min-w-full border">
<thead class="bg-gray-100">
<tr>
<th class="p-3 text-left">Source</th>
<th class="p-3 text-left">Product</th>
<th class="p-3 text-left">Status</th>
<th class="p-3 text-left">Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($manuals as $m): ?>
<tr class="border-t">
<td class="p-3"><?= e($m['source']) ?></td>
<td class="p-3">
<?= $m['source']=='woo' ? e($m['wc_slug']) : e($m['legacy_title']) ?>
</td>
<td class="p-3"><?= $m['status'] ? 'Active' : 'Inactive' ?></td>
<td class="p-3">
<a class="text-blue-600 mr-3" href="<?= url('admin/manuals/edit/'.$m['id']) ?>">Edit</a>
<a class="text-red-600" href="<?= url('admin/manuals/delete/'.$m['id']) ?>">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>

<?php if(!empty($missingWoo)): ?>
<div class="bg-white rounded-lg shadow p-6 mt-6">
<h3 class="font-semibold text-lg mb-3">Woo Products Missing Manuals</h3>
<ul class="text-sm space-y-1">
<?php foreach($missingWoo as $p): ?>
<li><?= e($p['name']) ?> (<?= e($p['slug']) ?>)</li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
