<?php
$uri = $_SERVER['REQUEST_URI'] ?? '';
function isActive($path) {
    global $uri;
    return strpos($uri, $path) !== false ? 'bg-blue-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
}

// Auto-open dropdown if inside corporate pages
$isCorporateActive = (
    strpos($uri, '/admin/clients') !== false ||
    strpos($uri, '/admin/partners') !== false ||
    strpos($uri, '/admin/awards') !== false ||
    strpos($uri, '/admin/categories') !== false
);
?>

<!-- Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>

<aside class="w-64 bg-gray-800 flex-shrink-0 overflow-y-auto h-screen">
    <div class="p-6 bg-gray-900">
        <a href="<?= url('admin/dashboard') ?>" class="text-white text-2xl font-bold">OGAWA Admin</a>
        <p class="text-gray-400 text-sm mt-1">Content Management</p>
    </div>
    <nav class="mt-6" x-data="{ openCorporate: <?= $isCorporateActive ? 'true' : 'false' ?> }">
        <a href="<?= url('admin/dashboard') ?>" class="flex items-center px-6 py-3 transition duration-150 <?= isActive('/admin/dashboard') ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Dashboard
        </a>
        <a href="<?= url('admin/faq') ?>" class="flex items-center px-6 py-3 transition duration-150 <?= isActive('/admin/faq') ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            FAQ
        </a>
        <a href="<?= url('admin/legal') ?>" class="flex items-center px-6 py-3 transition duration-150 <?= isActive('/admin/legal') ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Legal Pages
        </a>
        <a href="<?= url('admin/warranty') ?>" class="flex items-center px-6 py-3 transition duration-150 <?= isActive('/admin/warranty') ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            Warranty
        </a>
        <a href="<?= url('admin/registrations') ?>" class="flex items-center px-6 py-3 transition duration-150 <?= isActive('/admin/registrations') ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            Warranty Registrations
        </a>
        <a href="<?= url('admin/contact') ?>" class="flex items-center px-6 py-3 transition duration-150 <?= isActive('/admin/contact') ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            Contact Submissions
        </a>
        <a href="<?= url('admin/manuals') ?>" class="flex items-center px-6 py-3 transition duration-150 <?= isActive('/admin/manuals') ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M12 4h9M4 4h4v4H4V4zm0 12h4v4H4v-4z"/></svg>
            Manuals
        </a>
        <a href="<?= url('admin/promo-banners') ?>" class="flex items-center px-6 py-3 transition duration-150 <?= isActive('/admin/promo-banners') ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2" stroke-width="2"/><path d="M3 15l5-5 4 4 5-6 4 5" stroke-width="2"/></svg>
            Promo Banner (Home)
        </a>
        <a href="<?= url('admin/events') ?>" class="flex items-center px-6 py-3 transition duration-150 <?= isActive('/admin/events') ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Events
        </a>

        <!-- ================= Corporate Purchase ================= -->
        <button @click="openCorporate = !openCorporate" class="w-full flex items-center px-6 py-3 transition duration-150" :class="openCorporate ? 'bg-blue-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'">
            <!-- Icon -->
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" /></svg>

            <!-- Text -->
            <span class="flex-1 text-left">Corporate Purchase</span>

            <!-- Arrow -->
            <svg :class="{'rotate-180': openCorporate}" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown -->
        <div x-show="openCorporate" x-transition class="bg-gray-900">
            <a href="<?= url('admin/clients') ?>" class="flex items-center px-10 py-3 text-sm transition duration-150 <?= isActive('/admin/clients') ?>">Our Clients</a>
            <a href="<?= url('admin/partners') ?>" class="flex items-center px-10 py-3 text-sm transition duration-150 <?= isActive('/admin/partners') ?>">Partners</a>
            <a href="<?= url('admin/awards') ?>" class="flex items-center px-10 py-3 text-sm transition duration-150 <?= isActive('/admin/awards') ?>">Awards</a>
            <a href="<?= url('admin/categories') ?>" class="flex items-center px-10 py-3 text-sm transition duration-150 <?= isActive('/admin/categories') ?>">Massage Categories</a>
        </div>
    </nav>
</aside>
