<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$clients = [
    ['name' => 'Client One'],
    ['name' => 'Client Two'],
    ['name' => 'Client Three'],
    ['name' => 'Client Four'],
    ['name' => 'Client Five'],
    ['name' => 'Client Six'],
    ['name' => 'Client Seven'],
    ['name' => 'Client Eight'],
];

$pageTitle = 'Our Clients — ' . COMPANY_NAME;
include __DIR__ . '/includes/header.php';
?>

<section style="padding-top: 130px;">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Our Customers</span>
      <h2>Trusted On The Shop Floor</h2>
      <p class="lead">Steel, automotive, cement, paper, power and general engineering plants rely on SIVIND equipment every shift.</p>
    </div>
    <div class="client-grid reveal">
      <?php foreach ($clients as $c): ?>
        <div>
          <?php if (!empty($c['logo'])): ?>
            <img src="<?= e($c['logo']) ?>" alt="<?= e($c['name']) ?>" loading="lazy">
          <?php else: ?>
            <?= e($c['name']) ?>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>