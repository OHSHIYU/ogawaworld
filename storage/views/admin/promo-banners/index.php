<?php require VIEW_PATH . 'admin/layout/header.php'; ?>

<?php if ($flash = flash_get('success')): ?>
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded"><?= e($flash) ?></div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<?php foreach ($items as $item): ?>
    <?php
        $panelMap = [
            'left' => 'Left Panel',
            'right_top' => 'Right Top Panel',
            'right_bottom' => 'Right Bottom Panel'
        ];
        $panelLabel = $panelMap[$item['panel']] ?? ucfirst($item['panel']);
        $badgeColor = match ($item['panel']) {
            'left' => 'bg-blue-100 text-blue-800',
            'right_top' => 'bg-purple-100 text-purple-800',
            'right_bottom' => 'bg-pink-100 text-pink-800',
            default => 'bg-gray-100 text-gray-800'
        };
    ?>

    <div class="border rounded-lg overflow-hidden flex flex-col">

        <!-- Image preview -->
        <?php if (!empty($item['image_url'])): ?>
            <div class="relative h-48 bg-gray-100 overflow-hidden">
                <img src="<?= asset('uploads/' . ltrim($item['image_url'], '/')) ?>"
                     alt="<?= e($panelLabel) ?> background"
                     class="w-full h-full object-cover">

                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-4">
                    <div>
                        <p class="text-white font-bold text-lg">
                            <?= e($item['heading']) ?>
                        </p>
                        <?php if (!empty($item['subheading'])): ?>
                            <p class="text-white text-sm opacity-80">
                                <?= e($item['subheading']) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                <div class="text-center">
                    <span class="text-sm">No image uploaded</span>
                    <p class="font-bold text-gray-600 mt-1"><?= e($item['heading']) ?></p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Info -->
        <div class="p-4 flex-1 flex flex-col gap-2">

            <div class="flex items-center gap-2">
                <span class="text-xs font-semibold px-2 py-0.5 rounded <?= $badgeColor ?>">
                    <?= $panelLabel ?>
                </span>

                <?php if ($item['is_active']): ?>
                    <span class="text-xs px-2 py-0.5 rounded bg-green-100 text-green-800">Active</span>
                <?php else: ?>
                    <span class="text-xs px-2 py-0.5 rounded bg-red-100 text-red-800">Hidden</span>
                <?php endif; ?>
            </div>

            <div class="text-sm text-gray-600">
                <span class="font-semibold">CTA:</span>
                <?= e($item['cta_text']) ?>

                <?php if (!empty($item['cta_url'])): ?>
                    →
                    <a href="<?= e($item['cta_url']) ?>"
                       target="_blank"
                       rel="noopener"
                       class="text-blue-600 underline">
                        <?= e($item['cta_url']) ?>
                    </a>
                <?php endif; ?>
            </div>

        </div>

        <!-- Action -->
        <div class="px-4 pb-4">
            <a href="<?= url('admin/promo-banners/edit/' . $item['id']) ?>"
               class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit <?= $panelLabel ?>
            </a>
        </div>

    </div>
<?php endforeach; ?>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
