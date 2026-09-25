<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b">
        <h3 class="text-lg font-semibold">eWarranty Registrations</h3>
        <p class="text-sm text-gray-600 mt-1">View all warranty registrations submitted by customers</p>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Serial Number</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Registered</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (empty($registrations)): ?>
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">No registrations yet</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($registrations as $reg): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <?= e($reg['full_name']) ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= e($reg['email']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= e(trim(($reg['phone_cc'] ?? '') . ' ' . ($reg['phone_number'] ?? ''))) ?: '-' ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= e($reg['product_model'] ?? '-') ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-mono"><?= e($reg['serial_no'] ?? '-') ?></td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?= date('Y-m-d H:i', strtotime($reg['created_at'])) ?></td>
                        <td class="px-6 py-4 text-sm">
                            <a href="<?= url('admin/registrations/view/' . $reg['id']) ?>" class="text-blue-600 hover:text-blue-900">View Details</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
