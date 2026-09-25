<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<?php if ($msg = flash_get('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"><?= e($msg) ?></div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b">
        <h3 class="text-lg font-semibold">Contact Enquiries</h3>
        <p class="text-sm text-gray-600 mt-1">View all contact form submissions</p>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Submitted</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if (empty($enquiries)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">No enquiries yet</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($enquiries as $enq): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900"><?= e(($enq['title'] ? $enq['title'] . ' ' : '') . $enq['full_name']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= e($enq['email']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= e($enq['inquiry_type'] ?: 'No subject') ?></td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?= date('Y-m-d H:i', strtotime($enq['updated_at'])) ?></td>
                        <td class="px-6 py-4 text-sm">
                            <a href="<?= url('admin/contact/view/' . $enq['id']) ?>" class="text-blue-600 hover:text-blue-900">View Details</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
