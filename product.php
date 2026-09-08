<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$cat = $_GET['cat'] ?? 'all';

$products = [
    [
        'category' => 'eot',
        'title'    => 'EOT / Bridge Cranes',
        'img'      => 'assets/product-1.jpg',
        'text'     => 'Single and double girder electric overhead travelling cranes engineered for continuous duty in fabrication bays, foundries and warehouses.',
        'specs'    => ['1 – 100 Ton', 'Up to 30 m span', 'Class M3 – M7'],
    ],
    [
        'category' => 'jib',
        'title'    => 'Jib &amp; Pillar Cranes',
        'img'      => 'assets/product-2.jpg',
        'text'     => 'Wall-mounted and floor-mounted slewing jibs for machine-side lifting, with smooth 180° or 360° rotation and low headroom options.',
        'specs'    => ['0.25 – 5 Ton', '360° slew', 'Low headroom'],
    ],
    [
        'category' => 'hoists',
        'title'    => 'Hoists &amp; Trolleys',
        'img'      => 'assets/product-3.jpg',
        'text'     => 'Electric wire rope and chain hoists with dual braking, overload protection and variable frequency travel for precise load placement.',
        'specs'    => ['0.5 – 50 Ton', 'VFD control', 'Overload cut-off'],
    ],
];

if ($cat !== 'all') {
    $products = array_filter($products, fn($p) => $p['category'] === $cat);
}

$pageTitle = 'Products — ' . COMPANY_NAME;
include __DIR__ . '/includes/header.php';
?>

<section style="padding-top: 130px;">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Product Range</span>
      <h2>Machinery That Carries The Whole Plant</h2>
      <p class="lead">Every crane is designed to IS 3177 / IS 807 duty classes, fabricated in-house and load tested before dispatch.</p>
    </div>
    <div class="product-grid">
      <?php foreach ($products as $p): ?>
      <article class="card reveal">
        <figure><img src="<?= e($p['img']) ?>" alt="<?= e(strip_tags($p['title'])) ?>" loading="lazy"></figure>
        <div class="card-body">
          <h3><?= $p['title'] ?></h3>
          <p><?= e($p['text']) ?></p>
          <div class="spec">
            <?php foreach ($p['specs'] as $s): ?><span><?= e($s) ?></span><?php endforeach; ?>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>