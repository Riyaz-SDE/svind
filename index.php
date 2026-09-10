<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/includes/config.php';

$pageTitle = COMPANY_NAME . ' — Crane Manufacturing, Material Handling & Service';
$pageDesc  = 'SIVIND builds and services EOT cranes, gantry cranes, jib cranes and hoists.';
include __DIR__ . '/includes/header.php';
?>

<!-- ================= HERO VIDEO CAROUSEL ================= -->
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

<!-- ================= CORE PRODUCTS ================= -->
<section id="products" class="bg-alt">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Engineering Excellence</span>
      <h2>Heavy-Duty Lifting Solutions</h2>
      <p class="lead">Engineered to international standards for safety, durability, and seamless load handling across heavy industrial environments.</p>
    </div>

    <div class="product-grid">
      <!-- Product 1 -->
      <article class="card reveal">
        <figure>
          <img src="assets/images1.jpg" alt="EOT Cranes" loading="lazy">
        </figure>
        <div class="card-body">
          <h3>EOT / Bridge Cranes</h3>
          <p>Single and double girder overhead travelling cranes built for precision control in heavy manufacturing plants.</p>
          <div class="spec">
            <span>Up to 250 Tons</span>
            <span>IS: 3177 / 807</span>
          </div>
        </div>
      </article>

      <!-- Product 2 -->
      <article class="card reveal" style="transition-delay: 0.1s;">
        <figure>
          <img src="assets/images2.jpg" alt="Gantry Cranes" loading="lazy">
        </figure>
        <div class="card-body">
          <h3>Goliath & Gantry Cranes</h3>
          <p>Robust outdoor and yard material handling systems designed to withstand harsh weather and high duty cycles.</p>
          <div class="spec">
            <span>Custom Spans</span>
            <span>Dual Drive</span>
          </div>
        </div>
      </article>

      <!-- Product 3 -->
      <article class="card reveal" style="transition-delay: 0.2s;">
        <figure>
          <img src="assets/images3.jpg" alt="Jib Cranes" loading="lazy">
        </figure>
        <div class="card-body">
          <h3>Jib & Pillar Cranes</h3>
          <p>Compact floor or wall-mounted pivoting swing cranes ideal for localized workstation material transfers.</p>
          <div class="spec">
            <span>360° Rotation</span>
            <span>Up to 5 Tons</span>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ================= METRICS & STATS BAR ================= -->
<!-- ================= METRICS & STATS BAR ================= -->
<div class="hero-stats reveal">
  <div class="stats-track">
    <div>
      <strong>25+</strong>
      <span>Years of Expertise</span>
    </div>
    <div>
      <strong>1,200+</strong>
      <span>Cranes Commissioned</span>
    </div>
    <div>
      <strong>24/7</strong>
      <span>Emergency Support</span>
    </div>
    <div>
      <strong>100%</strong>
      <span>Load Test Compliance</span>
    </div>
  </div>
</div>

<!-- ================= LIFECYCLE SERVICES ================= -->
<section id="services">
  <div class="container">
    <div class="service-layout">
      
      <!-- Left Column: Content info -->
      <div class="reveal">
        <span class="eyebrow">Uninterrupted Operations</span>
        <h2>Comprehensive Crane Life-Cycle Services</h2>
        <p class="lead" style="margin-bottom: 30px;">We don't just manufacture cranes; we protect your investment through rigorous safety audits, rapid-response breakdown teams, and certified modernization packages.</p>
        <a class="btn btn-primary" href="contact.php">Book Maintenance Audit</a>
      </div>

      <!-- Right Column: Interactive Styled Service List -->
      <ul class="service-list reveal" style="transition-delay: 0.15s;">
        <li>
          <div class="num">01</div>
          <div>
            <h4>Preventive Maintenance</h4>
            <p>Scheduled lubrication, structural alignment checks, and electrical diagnostic sweeps to prevent costly downtime.</p>
          </div>
        </li>
        <li>
          <div class="num">02</div>
          <div>
            <h4>Emergency Breakdown Support</h4>
            <p>Rapid deployment engineering squads available around the clock to restore critical material handling lines.</p>
          </div>
        </li>
        <li>
          <div class="num">03</div>
          <div>
            <h4>Statutory Load Testing & Certification</h4>
            <p>Proof load testing with authorized water bags/dead weights and statutory safety compliance certification.</p>
          </div>
        </li>
        <li>
          <div class="num">04</div>
          <div>
            <h4>Modernisation & Retrofits</h4>
            <p>Upgrading legacy relay panels to VVVF drives for jerk-free material handling and extended operational life.</p>
          </div>
        </li>
      </ul>

    </div>
  </div>
</section>

<div class="rule"></div>

<div class="rule"></div>
<?php include __DIR__ . '/includes/footer.php'; ?>