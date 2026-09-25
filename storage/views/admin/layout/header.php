<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?? 'Admin Dashboard' ?> | OGAWA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ogawaworld.net/ogawaworld/public/assets/ckeditor/ckeditor.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .ck-editor__editable { min-height: 300px; }
    </style>
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden">

<?php require __DIR__ . '/sidebar.php'; ?>

<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-sm z-10">
        <div class="px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800"><?= $pageTitle ?? 'Dashboard' ?></h2>
            <div class="flex items-center">
                <span class="text-gray-600 mr-4">Hi, <?= e($_SESSION['admin_name'] ?? 'Admin') ?></span>
                <a href="<?= url('admin/logout') ?>" class="text-red-600 hover:text-red-800 text-sm font-medium">Logout</a>
            </div>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
