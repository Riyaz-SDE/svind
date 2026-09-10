<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/product-data.php';

$requestPath = $_SERVER['PATH_INFO'] ?? '';
$subCategory = trim($requestPath, '/');

$pageTitle = 'Industrial Cranes, Spares & Rentals — ' . COMPANY_NAME;
$pageDesc  = 'Explore SIVIND’s comprehensive range of industrial cranes, certified spare parts, maintenance packages, and scaffolding rentals.';

include __DIR__ . '/includes/header.php';
?>

<!-- ================= PREMIUM PAGE HERO ================= -->
<!-- <header class="page-hero" style="position: relative; padding: 180px 0 100px; background: linear-gradient(135deg, #0f172a var(--steel-900), #121820 100%); overflow: hidden; border-bottom: 1px solid var(--line);">
  <div style="position: absolute; top: 0; right: 0; width: 50%; height: 100%; background: radial-gradient(circle at center, rgba(245,158,11,0.06) 0%, transparent 70%); pointer-events: none;"></div>
  <div class="container" style="position: relative; z-index: 2;">
    <div class="section-head reveal" style="margin-bottom: 0; max-width: 800px;">
      <span class="eyebrow" style="color: var(--amber); letter-spacing: 0.2em; font-weight: 600;">SIVIND CATALOGUE & SERVICES</span>
      <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); color: #fff; line-height: 1.1; margin-top: 10px;">Engineering Excellence <br><span style="color: var(--amber);">Built For Heavy Industry</span></h1>
      <p class="lead" style="margin-top: 20px; color: #94a3b8; font-size: 1.15rem;">Precision-engineered lifting systems, certified high-endurance spare parts, rigorous maintenance contracts, and industrial-grade equipment rentals.</p>
    </div>
  </div>
</header> -->
<header class="page-hero" style="position: relative; padding: 180px 0 100px; background: linear-gradient(135deg, rgba(15, 23, 42, 0.85), rgba(18, 24, 32, 0.9)), url('<?= BASE_URL; ?>/assets/product-4.jpg'); background-size: cover; background-position: center; overflow: hidden; border-bottom: 1px solid var(--line);">
  <div style="position: absolute; top: 0; right: 0; width: 50%; height: 100%; background: radial-gradient(circle at center, rgba(245,158,11,0.06) 0%, transparent 70%); pointer-events: none;"></div>
  <div class="container" style="position: relative; z-index: 2;">
    <div class="section-head reveal" style="margin-bottom: 0; max-width: 800px;">
      <span class="eyebrow" style="color: var(--amber); letter-spacing: 0.2em; font-weight: 600;">SIVIND CATALOGUE & SERVICES</span>
      <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); color: #fff; line-height: 1.1; margin-top: 10px;">Engineering Excellence <br><span style="color: var(--amber);">Built For Heavy Industry</span></h1>
      <p class="lead" style="margin-top: 20px; color: #94a3b8; font-size: 1.15rem;">Precision-engineered lifting systems, certified high-endurance spare parts, rigorous maintenance contracts, and industrial-grade equipment rentals.</p>
    </div>
  </div>
</header>

<!-- ================= INTERACTIVE CATEGORY TABS ================= -->
<div style="background: #0f172a; border-bottom: 1px solid var(--line); padding: 20px 0; position: sticky; top: 70px; z-index: 90; backdrop-filter: blur(12px);">
  <div class="container" style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center;">
    <a href="<?= BASE_URL; ?>/product.php" class="cat-pill <?= empty($subCategory) ? 'active' : ''; ?>">All Portfolios</a>
    <a href="<?= BASE_URL; ?>/product.php/industrial-cranes" class="cat-pill <?= ($subCategory === 'industrial-cranes') ? 'active' : ''; ?>">Industrial Cranes</a>
    <a href="<?= BASE_URL; ?>/product.php/spare-parts" class="cat-pill <?= ($subCategory === 'spare-parts') ? 'active' : ''; ?>">Crane Spare Parts</a>
    <a href="<?= BASE_URL; ?>/product.php/maintenance-services" class="cat-pill <?= ($subCategory === 'maintenance-services') ? 'active' : ''; ?>">Maintenance & Audits</a>
    <a href="<?= BASE_URL; ?>/product.php/scaffolding-rental" class="cat-pill <?= ($subCategory === 'scaffolding-rental') ? 'active' : ''; ?>">Scaffolding Rentals</a>
  </div>
</div>

<!-- ================= STYLING FOR CARDS & GRIDS ================= -->
<style>
  .cat-pill {
    padding: 10px 22px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    border-radius: 4px;
    border: 1px solid var(--line);
    background: rgba(255, 255, 255, 0.03);
    color: #cbd5e1;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    text-decoration: none;
  }
  .cat-pill:hover, .cat-pill.active {
    background: var(--amber);
    color: #000;
    border-color: var(--amber);
    box-shadow: 0 4px 20px rgba(245, 158, 11, 0.25);
    transform: translateY(-2px);
  }

  /* FIXED GRID: Caps card width nicely on ultra-wide screens */
  /* BALANCED GRID: Fluid columns that prevent awkward gaps and wide stretching */
  .premium-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 32px;
    margin-top: 40px;
    max-width: 1300px;
    margin-left: auto;
    margin-right: auto;
  }

  .p-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 400px; /* Caps the card width perfectly on ultra-wide monitors */
    justify-self: center; /* Keeps cards centered if a row has an odd number of items */
  }

  .p-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
    border-color: var(--amber);
  }

  .p-card figure {
    position: relative;
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: #0f172a;
    margin: 0;
  }

  .p-card figure img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .p-card:hover figure img {
    transform: scale(1.06);
  }

  .p-card-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(6px);
    color: var(--amber);
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    padding: 6px 12px;
    border-radius: 4px;
    border: 1px solid rgba(245, 158, 11, 0.3);
  }

  .p-card-body {
    padding: 28px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .p-card-body h3 {
    font-size: 1.35rem;
    color: #0f172a;
    margin-bottom: 12px;
    font-weight: 700;
  }

  .p-card-body p {
    color: #475569;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 24px;
    flex-grow: 1;
  }

  .p-features-list {
    list-style: none;
    padding: 0;
    margin: 0 0 24px 0;
    border-top: 1px solid #f1f5f9;
    padding-top: 16px;
  }

  .p-features-list li {
    font-size: 0.85rem;
    color: #334155;
    padding: 6px 0;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 500;
  }

  .p-features-list li::before {
    content: "■";
    color: var(--amber);
    font-size: 0.65rem;
  }

  .p-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 16px;
    border-top: 1px solid #f1f5f9;
  }

  .spec-tag {
    font-size: 0.75rem;
    font-weight: 600;
    color: #64748b;
    background: #f8fafc;
    padding: 4px 10px;
    border-radius: 4px;
    border: 1px solid #e2e8f0;
  }

  .inquire-btn {
    font-size: 0.85rem;
    font-weight: 600;
    color: #0f172a;
    background: var(--amber);
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    transition: background 0.2s;
  }
  .inquire-btn:hover {
    background: #e09206;
  }
</style>  

<!-- ================= DYNAMIC PRODUCT LOOPS ================= -->
<?php foreach ($productCatalog as $catKey => $category): ?>
    <?php if (!$subCategory || $subCategory === $catKey): ?>
    <section style="padding: 90px 0;">
      <div class="container">
        <div class="section-head reveal">
          <span class="eyebrow"><?= $category['eyebrow']; ?></span>
          <h2><?= $category['title']; ?></h2>
          <p class="lead"><?= $category['desc']; ?></p>
        </div>

        <div class="premium-grid">
          <?php foreach ($category['items'] as $item): ?>
            <article class="p-card reveal">
              <figure>
                <!-- <img src="<?= $item['image']; ?>" alt="<?= $item['title']; ?>" loading="lazy"> -->
                <img src="<?= BASE_URL . '/' . ltrim($item['image'], '/'); ?>" alt="<?= e($item['title']); ?>" loading="lazy">
                <span class="p-card-badge"><?= $item['badge']; ?></span>
              </figure>
              <div class="p-card-body">
                <h3><?= $item['title']; ?></h3>
                <p><?= $item['desc']; ?></p>
                <ul class="p-features-list">
                  <?php foreach ($item['features'] as $feat): ?>
                    <li><?= $feat; ?></li>
                  <?php endforeach; ?>
                </ul>
                <div class="p-card-footer">
                  <span class="spec-tag"><?= $item['spec']; ?></span>
                  <a href="contact.php" class="inquire-btn">Request Quote</a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <div class="rule"></div>
    <?php endif; ?>
<?php endforeach; ?>

<!-- ================= CALL TO ACTION BANNER ================= -->
<section style="background: var(--steel-900); padding: 90px 0; text-align: center; border-top: 1px solid var(--line);">
  <div class="container reveal">
    <span class="eyebrow" style="justify-content: center; color: var(--amber);">START YOUR PROJECT</span>
    <h2 style="color: #fff; margin-bottom: 20px; font-size: clamp(2rem, 3vw, 2.75rem);">Need a Custom Engineering Quote or Equipment Rental?</h2>
    <p class="lead" style="margin: 0 auto 36px; text-align: center; color: #94a3b8; max-width: 650px;">Our technical engineering team is ready to analyze your drawings or facility requirements to provide a competitive proposal within 24 hours.</p>
    <a class="btn btn-primary" href="contact.php" style="padding: 14px 32px; font-size: 1rem;">Speak With Our Engineers</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>