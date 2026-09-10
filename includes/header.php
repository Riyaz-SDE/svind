<?php
  require_once __DIR__ . '/config.php';
  $pageTitle = $pageTitle ?? COMPANY_NAME . ' — Cranes & Material Handling Solutions';
  $pageDesc  = $pageDesc  ?? 'SIVIND designs, manufactures and services EOT cranes, gantry cranes, jib cranes and hoists with 24/7 preventive maintenance support.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e($pageDesc) ?>">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e($pageDesc) ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= BASE_URL; ?>/assets/style.css">
</head>
<body>
<header class="site-header" id="siteHeader">
  <div class="container header-inner">
    <a class="brand" href="<?= BASE_URL; ?>/index.php" style="display: flex; align-items: center; text-decoration: none;">
      <img src="<?= BASE_URL; ?>/assets/logo.png" alt="<?= e(COMPANY_NAME) ?>" style="height: 38px; width: auto; object-fit: contain;">
    </a>
    <nav class="nav" id="nav">
      <a href="<?= BASE_URL; ?>/index.php">Home</a>
      
      <div class="nav-dropdown" style="padding:12px 0 ;">
        <a href="<?= BASE_URL; ?>/product.php" class="dropdown-toggle">Products <span class="arrow">▾</span></a>
        <div class="dropdown-menu">
          <a href="<?= BASE_URL; ?>/product.php/industrial-cranes">Industrial Cranes</a>
          <a href="<?= BASE_URL; ?>/product.php/spare-parts">Crane Spare Parts</a>
          <a href="<?= BASE_URL; ?>/product.php/maintenance-services">Maintenance & Audits</a>
          <a href="<?= BASE_URL; ?>/product.php/scaffolding-rental">Scaffolding Rentals</a>
        </div>
      </div>

      <a href="<?= BASE_URL; ?>/clients.php">Our Clients</a>
      <a href="<?= BASE_URL; ?>/about.php">About Us</a>
      <a href="<?= BASE_URL; ?>/contact.php">Contact Us</a>
      <a class="btn btn-primary btn-sm" href="<?= BASE_URL; ?>/contact.php"
      style="color:black">Get a Quote</a>
    </nav>
    <button class="nav-toggle" id="navToggle" aria-label="Menu"><span></span><span></span><span></span></button>
  </div>
</header>