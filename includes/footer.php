<footer class="site-footer">
  <div class="container footer-grid">
    <div>
      <div class="brand brand-footer">
        <span class="brand-mark"></span>
        <span class="brand-text"><?= e(COMPANY_NAME) ?><em><?= e(COMPANY_TAGLINE) ?></em></span>
      </div>
      <p class="footer-note">Engineering safe, reliable lifting since day one. Design, manufacture, installation, load testing and lifetime service support.</p>
    </div>
    <div>
      <h4>Products</h4>
      <ul>
        <li>EOT / Bridge Cranes</li>
        <li>Goliath &amp; Gantry Cranes</li>
        <li>Jib &amp; Pillar Cranes</li>
        <li>Electric Hoists &amp; Trolleys</li>
      </ul>
    </div>
    <div>
      <h4>Services</h4>
      <ul>
        <li>Preventive Maintenance</li>
        <li>Breakdown Support</li>
        <li>Load Testing &amp; Certification</li>
        <li>Modernisation &amp; Retrofits</li>
      </ul>
    </div>
    <div>
      <h4>Contact</h4>
      <ul>
        <li><a href="tel:<?= e(preg_replace('/\s+/', '', COMPANY_PHONE)) ?>"><?= e(COMPANY_PHONE) ?></a></li>
        <li><a href="mailto:<?= e(COMPANY_EMAIL) ?>"><?= e(COMPANY_EMAIL) ?></a></li>
        <li><?= e(COMPANY_ADDRESS) ?></li>
      </ul>
    </div>
  </div>
  <div class="container footer-bottom">
    <span>&copy; <?= date('Y') ?> <?= e(COMPANY_NAME) ?>. All rights reserved.</span>
    <span>ISO-grade manufacturing &middot; 24/7 service desk</span>
  </div>
</footer>
<script src="<?= BASE_URL; ?>/assets/script.js"></script>
</body>
</html>
