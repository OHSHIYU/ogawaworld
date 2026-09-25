<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold"><?= e($pageTitle) ?></h2>
    <a href="<?= url('admin/events/create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        + Create Event
    </a>
</div>

<?php if ($flash = flash_get('success')): ?>
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded"><?= e($flash) ?></div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    ID
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Image
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Event Details
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Date Range
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap"><?= $item['id'] ?></p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <?php if (!empty($item['image_url'])): ?>
                            <img class="w-20 h-20 rounded object-cover" src="<?= asset('uploads/' . ltrim($item['image_url'], '/')) ?>" alt="Event Image" />
                        <?php else: ?>
                            <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center text-gray-500 text-xs text-center border">No Image</div>
                        <?php endif; ?>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <p class="text-gray-900 font-bold"><?= e($item['title']) ?></p>
                        <p class="text-gray-600 text-xs mt-1"><?= e($item['subtitle']) ?></p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm text-gray-600">
                        <?= e($item['start_date']) ?> <br/> to <br/> <?= e($item['end_date']) ?>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <?php if ($item['is_active']): ?>
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">Active</span>
                            </span>
                        <?php else: ?>
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                <span class="relative">Hidden</span>
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="flex items-center gap-3">
                            <a href="<?= url('admin/events/edit/' . $item['id']) ?>" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <a href="<?= url('admin/events/delete/' . $item['id']) ?>"
                               onclick="return confirm('Are you sure you want to delete this event?');"
                               class="text-red-600 hover:text-red-900">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($items)): ?>
                <tr>
                    <td colspan="6" class="px-5 py-5 border-b border-gray-200 text-center text-gray-500">
                        No events found.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
