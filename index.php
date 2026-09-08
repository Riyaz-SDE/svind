<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/includes/config.php';

$pageTitle = COMPANY_NAME . ' — Crane Manufacturing, Material Handling & Service';
$pageDesc  = 'SIVIND builds and services EOT cranes, gantry cranes, jib cranes and hoists.';
include __DIR__ . '/includes/header.php';
?>

<!-- ================= HERO VIDEO CAROUSEL ================= -->
<!-- <section class="hero hero-carousel" id="home">
  <div class="carousel-slide active">
    <video autoplay muted loop playsinline poster="assets/hero.jpg">
      <source src="assets/hero.mp4" type="video/mp4">
    </video>
    <div class="container hero-inner">
      <span class="eyebrow">Cranes &amp; Material Handling</span>
      <h1>Lifting Built<br><span>To Never Stop</span></h1>
      <p>SIVIND designs, manufactures, installs and services heavy-duty cranes and handling systems.</p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="contact.php">Request a Quotation</a>
        <a class="btn btn-ghost" href="products.php">Explore Products</a>
      </div>
    </div>
  </div>

  <div class="carousel-slide">
    <video muted loop playsinline poster="assets/service.jpg">
      <source src="assets/hero.mp4" type="video/mp4">
    </video>
    <div class="container hero-inner">
      <span class="eyebrow">24/7 Service Desk</span>
      <h1>Uptime Is The<br><span>Real Product</span></h1>
      <p>Preventive maintenance contracts, statutory load testing, and emergency breakdown support.</p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="contact.php">Contact Service Team</a>
      </div>
    </div>
  </div>

  <button class="carousel-prev" aria-label="Previous">❮</button>
  <button class="carousel-next" aria-label="Next">❯</button>
  
  <div class="carousel-dots">
    <span class="dot active"></span>
    <span class="dot"></span>
  </div>
</section> -->
<!--  -->
<!-- <section class="hero hero-carousel" id="home">
  Slide 1
  <div class="carousel-slide active">
    <video autoplay muted loop playsinline>
      <source src="assets/hero1.mp4" type="video/mp4">
    </video>
    <div class="container hero-inner">
      <span class="eyebrow">Cranes & Material Handling</span>
      <h1>Lifting Built<br><span>To Never Stop</span></h1>
      <a class="btn btn-primary" href="contact.php">Request Quote</a>
    </div>
  </div>

  Slide 2
  <div class="carousel-slide">
    <video muted loop playsinline>
      <source src="assets/hero2.mp4" type="video/mp4">
    </video>
    <div class="container hero-inner">
      <span class="eyebrow">24/7 Support</span>
      <h1>Precision Engineering<br><span>Maximum Uptime</span></h1>
      <a class="btn btn-primary" href="contact.php">Schedule Service</a>
    </div>
  </div>

  Navigation Controls
  <button class="carousel-prev" aria-label="Previous Slide">❮</button>
  <button class="carousel-next" aria-label="Next Slide">❯</button>
  <div class="carousel-dots">
    <span class="dot active"></span>
    <span class="dot"></span>
  </div>
</section> -->
<section class="hero hero-carousel" id="home">
  <!-- The Sliding Track -->
  <div class="carousel-track" id="carouselTrack">
    
    <!-- Slide 1 -->
    <div class="carousel-slide">
      <video autoplay muted loop playsinline preload="auto" >
        <source src="assets/hero1.mp4" type="video/mp4">
      </video>
      <div class="container hero-inner">
        <span class="eyebrow">Cranes & Material Handling</span>
        <h1>Lifting Built<br><span>To Never Stop</span></h1>
        <a class="btn btn-primary" href="contact.php">Request Quote</a>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-slide">
      <video  muted loop playsinline>
        <source src="assets/hero2.mp4" type="video/mp4">
      </video>
      <div class="container hero-inner">
        <span class="eyebrow">24/7 Support</span>
        <h1>Precision Engineering<br><span>Maximum Uptime</span></h1>
        <a class="btn btn-primary" href="contact.php">Schedule Service</a>
      </div>
    </div>

  </div>

  <!-- Navigation Controls -->
  <button class="carousel-prev" aria-label="Previous Slide">❮</button>
  <button class="carousel-next" aria-label="Next Slide">❯</button>
  <div class="carousel-dots">
    <span class="dot active"></span>
    <span class="dot"></span>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>