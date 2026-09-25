<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="mb-4">
    <a href="<?= url('admin/contact') ?>" class="text-blue-600 hover:text-blue-800">← Back to Enquiries</a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-start mb-6">
        <h3 class="text-xl font-semibold">Contact Enquiry</h3>
    </div>
    
    <div class="grid grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Name</label>
            <p class="text-gray-900"><?= e(($enquiry['title'] ? $enquiry['title'] . ' ' : '') . $enquiry['full_name']) ?></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
            <p class="text-gray-900"><a href="mailto:<?= e($enquiry['email']) ?>" class="text-blue-600 hover:underline"><?= e($enquiry['email']) ?></a></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Phone</label>
            <p class="text-gray-900"><?= e($enquiry['contact_number'] ?: 'Not provided') ?></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">State / Postcode</label>
            <p class="text-gray-900"><?= e(trim(($enquiry['state'] ?? '') . ' ' . ($enquiry['postcode'] ?? ''))) ?: 'Not provided' ?></p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Submitted</label>
            <p class="text-gray-900"><?= date('F j, Y \a\t g:i A', strtotime($enquiry['updated_at'])) ?></p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-500 mb-1">Interested Further Service</label>
            <p class="text-gray-900"><?= !empty($enquiry['interested_service']) ? 'Yes' : 'No' ?></p>
        </div>
    </div>
    
    <?php if (!empty($enquiry['inquiry_type'])): ?>
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-500 mb-2">Subject / Topic</label>
        <p class="text-gray-900 font-semibold"><?= e($enquiry['inquiry_type']) ?></p>
    </div>
    <?php endif; ?>
    
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-500 mb-2">Description</label>
        <div class="bg-gray-50 p-4 rounded border">
            <p class="text-gray-900 whitespace-pre-wrap"><?= e($enquiry['description']) ?></p>
        </div>
    </div>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
