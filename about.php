<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'About Us — ' . COMPANY_NAME;
include __DIR__ . '/includes/header.php';
?>

<section style="padding-top: 130px;" class="bg-alt">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">About <?= e(COMPANY_NAME) ?></span>
      <h2>Engineered Here.<br>Answerable Here.</h2>
      <p class="lead">Design, fabrication, electricals, erection and after-sales sit under one roof — so there is one team accountable for the lift, from drawing to certification.</p>
    </div>
    <div class="about-grid">
      <article class="reveal"><h4>In-House Design</h4><p>Structural and electrical design done to your bay drawings, duty class and load chart before a single plate is cut.</p></article>
      <article class="reveal"><h4>Certified Fabrication</h4><p>Qualified welders, jig-controlled girder assembly and dimensional inspection at every stage.</p></article>
      <article class="reveal"><h4>Safety First</h4><p>Overload protection, limit switches, anti-collision and safe load indicators built in as standard, not as options.</p></article>
      <article class="reveal"><h4>Lifetime Support</h4><p>Spares availability and service contracts for the full working life of the equipment.</p></article>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>