<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="mb-4">
    <a href="<?= url('admin/registrations') ?>" class="text-blue-600 hover:text-blue-800">← Back to Registrations</a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-xl font-semibold mb-6">eWarranty Registration Details</h3>
    
    <div class="grid grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Customer Name</label>
            <p class="text-gray-900"><?= e($registration['full_name']) ?></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
            <p class="text-gray-900"><a href="mailto:<?= e($registration['email']) ?>" class="text-blue-600 hover:underline"><?= e($registration['email']) ?></a></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Phone</label>
            <p class="text-gray-900"><?= e(trim(($registration['phone_cc'] ?? '') . ' ' . ($registration['phone_number'] ?? ''))) ?: 'Not provided' ?></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">State</label>
            <p class="text-gray-900"><?= e($registration['state'] ?? 'Not provided') ?></p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Product Model</label>
            <p class="text-gray-900"><?= e($registration['product_model'] ?? 'Not provided') ?></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Serial Number</label>
            <p class="text-gray-900 font-mono"><?= e($registration['serial_no'] ?? 'Not provided') ?></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Purchased From</label>
            <p class="text-gray-900"><?= e($registration['purchased_from'] ?? 'Not provided') ?></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Purchase Date</label>
            <p class="text-gray-900"><?= !empty($registration['purchase_date']) && $registration['purchase_date'] !== '0000-00-00' ? date('F j, Y', strtotime($registration['purchase_date'])) : 'Not provided' ?></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Receipt Attachment</label>
            <p class="text-gray-900">
                <?php if (!empty($registration['receipt_path'])): ?>
                    <a href="<?= asset($registration['receipt_path']) ?>" target="_blank" class="text-blue-600 hover:underline">View Receipt</a>
                <?php else: ?>
                    <span class="text-gray-500 italic">No receipt uploaded</span>
                <?php endif; ?>
            </p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Registered At</label>
            <p class="text-gray-900"><?= date('F j, Y \a\t g:i A', strtotime($registration['created_at'])) ?></p>
        </div>
    </div>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
