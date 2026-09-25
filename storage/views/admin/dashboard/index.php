<?php
$pageTitle = 'Dashboard';
require VIEW_PATH . 'admin/layout/header.php';
?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Quick Stats or Links could go here -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Welcome</h3>
        <p class="mt-2 text-3xl font-bold text-gray-900">Hello, <?= e($_SESSION['admin_name']) ?></p>
        <p class="mt-2 text-gray-600">Use the sidebar to manage content.</p>
    </div>
</div>

<?php require VIEW_PATH . 'admin/layout/footer.php'; ?>
