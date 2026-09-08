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
<link rel="stylesheet" href="assets/style.css">
 <!-- <link rel="stylesheet" href="assets/style.css"> -->
  <!-- <link rel="stylesheet" href="assets/style.css"> -->
</head>
<body>
<header class="site-header" id="siteHeader">
  <div class="container header-inner">
    <a class="brand" href="index.php">
      <span class="brand-mark"></span>
      <span class="brand-text"><?= e(COMPANY_NAME) ?><em><?= e(COMPANY_TAGLINE) ?></em></span>
    </a>
    <nav class="nav" id="nav">
      <a href="index.php">Home</a>
      
      <div class="nav-dropdown">
        <a href="products.php" class="dropdown-toggle">Products <span class="arrow">▾</span></a>
        <div class="dropdown-menu">
          <a href="products.php?cat=eot">EOT / Bridge Cranes</a>
          <a href="products.php?cat=jib">Jib &amp; Pillar Cranes</a>
          <a href="products.php?cat=hoists">Hoists &amp; Trolleys</a>
        </div>
      </div>

      <a href="clients.php">Our Clients</a>
      <a href="about.php">About Us</a>
      <a href="contact.php">Contact Us</a>
      <a class="btn btn-primary btn-sm" href="contact.php">Get a Quote</a>
    </nav>
    <button class="nav-toggle" id="navToggle" aria-label="Menu"><span></span><span></span><span></span></button>
  </div>
</header>