<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/includes/config.php';

$requestPath = $_SERVER['PATH_INFO'] ?? '';
$subCategory = trim($requestPath, '/');

$pageTitle = 'Industrial Cranes, Spares & Rentals — ' . COMPANY_NAME;
$pageDesc  = 'Explore SIVIND’s comprehensive range of industrial cranes, certified spare parts, maintenance packages, and scaffolding rentals.';

include __DIR__ . '/includes/header.php';
?>

<!-- ================= PREMIUM PAGE HERO ================= -->
<header class="page-hero" style="position: relative; padding: 180px 0 100px; background: linear-gradient(135deg, var(--steel-900) 0%, #121820 100%); overflow: hidden; border-bottom: 1px solid var(--line);">
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
    <a href="products.php" class="cat-pill <?= empty($subCategory) ? 'active' : ''; ?>">All Portfolios</a>
    <a href="products.php/industrial-cranes" class="cat-pill <?= ($subCategory === 'industrial-cranes') ? 'active' : ''; ?>">Industrial Cranes</a>
    <a href="products.php/spare-parts" class="cat-pill <?= ($subCategory === 'spare-parts') ? 'active' : ''; ?>">Crane Spare Parts</a>
    <a href="products.php/maintenance-services" class="cat-pill <?= ($subCategory === 'maintenance-services') ? 'active' : ''; ?>">Maintenance & Audits</a>
    <a href="products.php/scaffolding-rental" class="cat-pill <?= ($subCategory === 'scaffolding-rental') ? 'active' : ''; ?>">Scaffolding Rentals</a>
  </div>
</div>

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

  /* Premium Glassmorphism Hover Cards */
  .premium-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    gap: 32px;
    margin-top: 40px;
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
  }

  .p-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
    border-color: var(--amber);
  }

  .p-card figure {
    position: relative;
    width: 100%;
    height: 240px;
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

<!-- ================= SECTION 1: INDUSTRIAL CRANES ================= -->
<?php if (!$subCategory || $subCategory === 'industrial-cranes'): ?>
<section style="padding: 90px 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Primary Manufacturing</span>
      <h2>Industrial Cranes & Hoists</h2>
      <p class="lead">Heavy-duty overhead and outdoor crane systems built to stringent international safety and performance standards.</p>
    </div>

    <div class="premium-grid">
      <!-- Card 1 -->
      <article class="p-card reveal">
        <figure>
          <img src="assets/images1.jpg" alt="EOT / Bridge Cranes" loading="lazy">
          <span class="p-card-badge">FLAGSHIP SYSTEM</span>
        </figure>
        <div class="p-card-body">
          <h3>EOT / Bridge Cranes</h3>
          <p>Single and double girder overhead travelling cranes optimized for heavy industrial manufacturing plants, assembly bays, and heavy logistics yards.</p>
          <ul class="p-features-list">
            <li>Capacity up to 250 Tons with micro-speed control</li>
            <li>Designed strictly per IS: 3177 & IS: 4137 codes</li>
            <li>Zero-backlash gearbox and shockless braking</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">IS / FEM Compliant</span>
            <a href="contact.php" class="inquire-btn">Request Quote</a>
          </div>
        </div>
      </article>

      <!-- Card 2 -->
      <article class="p-card reveal" style="transition-delay: 0.1s;">
        <figure>
          <img src="assets/images2.jpg" alt="Goliath & Gantry Cranes" loading="lazy">
          <span class="p-card-badge">OUTDOOR RATED</span>
        </figure>
        <div class="p-card-body">
          <h3>Goliath & Gantry Cranes</h3>
          <p>Robust rail-mounted outdoor yard cranes engineered to withstand heavy environmental exposure, high wind shears, and continuous yard duty cycles.</p>
          <ul class="p-features-list">
            <li>Custom structural spans matching yard dimensions</li>
            <li>Storm-locking anchor pins and anti-skid drives</li>
            <li>Dual-leg rigid or semi-portal configurations</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">Weatherproof IP55</span>
            <a href="contact.php" class="inquire-btn">Request Quote</a>
          </div>
        </div>
      </article>

      <!-- Card 3 -->
      <article class="p-card reveal" style="transition-delay: 0.2s;">
        <figure>
          <img src="assets/images3.jpg" alt="Jib & Pillar Cranes" loading="lazy">
          <span class="p-card-badge">LOCALIZED LIFTING</span>
        </figure>
        <div class="p-card-body">
          <h3>Jib & Pillar Cranes</h3>
          <p>Precision floor-mounted or wall-bracketed swing cranes designed for fast, repetitive material handling around heavy machine tools.</p>
          <ul class="p-features-list">
            <li>Full 360-degree manual or motorized rotation</li>
            <li>Capacities ranging from 500kg up to 5 Tons</li>
            <li>Compact footprint for congested workshop bays</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">360° Swing Radius</span>
            <a href="contact.php" class="inquire-btn">Request Quote</a>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!$subCategory): ?><div class="rule"></div><?php endif; ?>

<!-- ================= SECTION 2: CRANE SPARE PARTS ================= -->
<?php if (!$subCategory || $subCategory === 'spare-parts'): ?>
<section style="padding: 90px 0;" class="bg-alt">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Component Reliability</span>
      <h2>Genuine Crane Spare Parts</h2>
      <p class="lead">Eliminate operational bottlenecks with precision-machined OEM parts engineered for high mechanical endurance.</p>
    </div>

    <div class="premium-grid">
      <!-- Card 1 -->
      <article class="p-card reveal">
        <figure>
          <img src="assets/images1.jpg" alt="Wire Ropes & Hoist Drums" loading="lazy">
          <span class="p-card-badge">OEM CERTIFIED</span>
        </figure>
        <div class="p-card-body">
          <h3>Wire Ropes & Hoist Drums</h3>
          <p>High-tensile anti-twist steel wire ropes paired with multi-grooved precision drums designed to maximize vertical lift safety and rope longevity.</p>
          <ul class="p-features-list">
            <li>Grade 1960 / 2160 high tensile core construction</li>
            <li>Precision machine-grooved steel rope drums</li>
            <li>Hardened forged steel sheaves and pulleys</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">Anti-Twist Core</span>
            <a href="contact.php" class="inquire-btn">Inquire Spares</a>
          </div>
        </div>
      </article>

      <!-- Card 2 -->
      <article class="p-card reveal" style="transition-delay: 0.1s;">
        <figure>
          <img src="assets/images2.jpg" alt="Industrial Brakes" loading="lazy">
          <span class="p-card-badge">FAIL-SAFE</span>
        </figure>
        <div class="p-card-body">
          <h3>Electro-Hydraulic & Disc Brakes</h3>
          <p>Fail-safe industrial braking systems engineered for instantaneous load lockup and maximum thermal dissipation during unexpected power outages.</p>
          <ul class="p-features-list">
            <li>Automatic engagement upon power failure</li>
            <li>High-torque friction lining with easy adjustment</li>
            <li>Corrosion-resistant linkage assemblies</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">Instantaneous Lock</span>
            <a href="contact.php" class="inquire-btn">Inquire Spares</a>
          </div>
        </div>
      </article>

      <!-- Card 3 -->
      <article class="p-card reveal" style="transition-delay: 0.2s;">
        <figure>
          <img src="assets/images3.jpg" alt="VVVF Drives & Panels" loading="lazy">
          <span class="p-card-badge">SMART CONTROL</span>
        </figure>
        <div class="p-card-body">
          <h3>VVVF Drives & Control Panels</h3>
          <p>Microprocessor-based variable frequency drive panels that eliminate mechanical jerk, providing smooth acceleration and precise load spotting.</p>
          <ul class="p-features-list">
            <li>IP55 dust and moisture-proof enclosure rating</li>
            <li>Integrated PLC safety interlocks and overload protection</li>
            <li>Programmable ramp-up and ramp-down curves</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">PLC Integrated</span>
            <a href="contact.php" class="inquire-btn">Inquire Spares</a>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!$subCategory): ?><div class="rule"></div><?php endif; ?>

<!-- ================= SECTION 3: MAINTENANCE SERVICES ================= -->
<?php if (!$subCategory || $subCategory === 'maintenance-services'): ?>
<section style="padding: 90px 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Preventative Engineering</span>
      <h2>Maintenance & Statutory Certification</h2>
      <p class="lead">Protect operational assets and ensure absolute statutory compliance through certified audits and maintenance agreements.</p>
    </div>

    <div class="premium-grid">
      <!-- Card 1 -->
      <article class="p-card reveal">
        <figure>
          <img src="assets/images1.jpg" alt="Preventative AMC" loading="lazy">
          <span class="p-card-badge">LIFECYCLE CARE</span>
        </figure>
        <div class="p-card-body">
          <h3>Preventive AMC Packages</h3>
          <p>Scheduled monthly and quarterly comprehensive maintenance checks including gear alignment, lubrication analysis, and electrical megger testing.</p>
          <ul class="p-features-list">
            <li>Scheduled routine calibration and wear inspections</li>
            <li>Priority emergency technician dispatch guarantees</li>
            <li>Detailed digital asset health reports</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">Quarterly Audits</span>
            <a href="contact.php" class="inquire-btn">Book AMC</a>
          </div>
        </div>
      </article>

      <!-- Card 2 -->
      <article class="p-card reveal" style="transition-delay: 0.1s;">
        <figure>
          <img src="assets/images2.jpg" alt="Statutory Load Testing" loading="lazy">
          <span class="p-card-badge">LEGAL COMPLIANCE</span>
        </figure>
        <div class="p-card-body">
          <h3>Statutory Load Testing</h3>
          <p>Certified proof load testing utilizing water weight bags and calibrated load cells, complete with government-approved safety certification.</p>
          <ul class="p-features-list">
            <li>Proof testing up to 125% of safe working load (SWL)</li>
            <li>NDT crack detection on hooks and critical welds</li>
            <li>Authorized statutory documentation issuance</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">Govt Approved</span>
            <a href="contact.php" class="inquire-btn">Book AMC</a>
          </div>
        </div>
      </article>

      <!-- Card 3 -->
      <article class="p-card reveal" style="transition-delay: 0.2s;">
        <figure>
          <img src="assets/images3.jpg" alt="Emergency Breakdown Team" loading="lazy">
          <span class="p-card-badge">24/7 RAPID RESPONSE</span>
        </figure>
        <div class="p-card-body">
          <h3>Emergency Breakdown Support</h3>
          <p>Dedicated rapid-response field technicians equipped with mobile welding rigs, diagnostic scanners, and vital spare replacement units.</p>
          <ul class="p-features-list">
            <li>24/7 hotline dispatch for critical plant halts</li>
            <li>On-site mechanical and electrical troubleshooting</li>
            <li>Rapid turnaround component replacement</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">24/7 Availability</span>
            <a href="contact.php" class="inquire-btn">Book AMC</a>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!$subCategory): ?><div class="rule"></div><?php endif; ?>

<!-- ================= SECTION 4: SCAFFOLDING RENTALS ================= -->
<?php if (!$subCategory || $subCategory === 'scaffolding-rental'): ?>
<section style="padding: 90px 0;" class="bg-alt">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Site Equipment Rental</span>
      <h2>Scaffolding Pipes & Formwork Solutions</h2>
      <p class="lead">Certified heavy-duty tubular scaffolding networks and site props available for flexible short and long-term industrial project rentals.</p>
    </div>

    <div class="premium-grid">
      <!-- Card 1 -->
      <article class="p-card reveal">
        <figure>
          <img src="assets/images1.jpg" alt="Scaffolding Steel Pipes" loading="lazy">
          <span class="p-card-badge">IS 1161 CERTIFIED</span>
        </figure>
        <div class="p-card-body">
          <h3>Galvanized Scaffolding Tubes</h3>
          <p>High-yield structural steel tubes treated for corrosion resistance, engineered to safely carry massive construction loads and high-elevation workers.</p>
          <ul class="p-features-list">
            <li>High tensile strength structural steel grade</li>
            <li>Hot-dip galvanized coating for rust prevention</li>
            <li>Strict dimensional thickness tolerance</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">High Tensile</span>
            <a href="contact.php" class="inquire-btn">Rent Equipment</a>
          </div>
        </div>
      </article>

      <!-- Card 2 -->
      <article class="p-card reveal" style="transition-delay: 0.1s;">
        <figure>
          <img src="assets/images2.jpg" alt="Forged Clamps and Couplers" loading="lazy">
          <span class="p-card-badge">BS 1139 COMPLIANT</span>
        </figure>
        <div class="p-card-body">
          <h3>Forged Clamps & Couplers</h3>
          <p>Rigid and swivel drop-forged steel couplers designed for secure tube-to-tube interconnectivity under heavy vibrational structural forces.</p>
          <ul class="p-features-list">
            <li>Drop-forged high-strength steel structure</li>
            <li>Anti-slip serrated jaw gripping performance</li>
            <li>Secure T-bolt tightening mechanism</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">Drop Forged</span>
            <a href="contact.php" class="inquire-btn">Rent Equipment</a>
          </div>
        </div>
      </article>

      <!-- Card 3 -->
      <article class="p-card reveal" style="transition-delay: 0.2s;">
        <figure>
          <img src="assets/images3.jpg" alt="Adjustable Base Jacks & Props" loading="lazy">
          <span class="p-card-badge">HEAVY LOAD BASE</span>
        </figure>
        <div class="p-card-body">
          <h3>Adjustable Base Jacks & Props</h3>
          <p>Heavy-duty load-bearing screw jacks and telescopic steel props built for exact leveling across uneven industrial floors and formwork shoring.</p>
          <ul class="p-features-list">
            <li>Precision rolled threads for smooth height adjustment</li>
            <li>Solid or hollow stem options available</li>
            <li>High safe working load per individual prop</li>
          </ul>
          <div class="p-card-footer">
            <span class="spec-tag">Precision Thread</span>
            <a href="contact.php" class="inquire-btn">Rent Equipment</a>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>
<?php endif; ?>

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