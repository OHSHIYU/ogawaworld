<?php
// app/controllers/SitemapController.php
require_once dirname(__DIR__) . '/services/sitemap-corporate.php';

ogw_output_corporate_sitemap_xml();
exit;
