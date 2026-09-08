<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/includes/config.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf   = $_SESSION['csrf_token'];
$flash  = $_SESSION['flash']  ?? null;
$errors = $_SESSION['errors'] ?? [];
$old    = $_SESSION['old']    ?? [];
unset($_SESSION['flash'], $_SESSION['errors'], $_SESSION['old']);

$pageTitle = 'Contact Us — ' . COMPANY_NAME;
include __DIR__ . '/includes/header.php';
?>

<section class="enquiry" style="padding-top: 130px;">
  <div class="container enquiry-grid">
    <div class="reveal">
      <span class="eyebrow">Enquiry</span>
      <h2>Tell Us What<br>You Need To Lift</h2>
      <p class="lead">Share your capacity, span and bay height — we will revert with a technical proposal and budgetary quote.</p>
      <div class="contact-block">
        <div><strong>Call</strong><a href="tel:<?= e(preg_replace('/\s+/', '', COMPANY_PHONE)) ?>"><?= e(COMPANY_PHONE) ?></a></div>
        <div><strong>Email</strong><a href="mailto:<?= e(COMPANY_EMAIL) ?>"><?= e(COMPANY_EMAIL) ?></a></div>
        <div><strong>Works</strong><span><?= e(COMPANY_ADDRESS) ?></span></div>
      </div>
    </div>

    <form class="enquiry-form reveal" id="enquiryForm" method="post" action="submit_enquiry.php" novalidate>
      <?php if ($flash): ?>
        <div class="alert <?= $flash['type'] === 'ok' ? 'alert-ok' : 'alert-err' ?>"><?= e($flash['text']) ?></div>
      <?php endif; ?>

      <input type="hidden" name="csrf_token" value="<?= e($csrf) ?>">
      <div style="position:absolute;left:-9999px" aria-hidden="true">
        <label>Company website<input type="text" name="company_website" tabindex="-1" autocomplete="off"></label>
      </div>

      <div class="form-grid">
        <div class="field <?= isset($errors['name']) ? 'invalid' : '' ?>">
          <label for="f-name">Name</label>
          <input id="f-name" name="name" type="text" maxlength="100" value="<?= e($old['name'] ?? '') ?>" required>
          <span class="err"><?= e($errors['name'] ?? '') ?></span>
        </div>
        <div class="field <?= isset($errors['email']) ? 'invalid' : '' ?>">
          <label for="f-email">Email</label>
          <input id="f-email" name="email" type="email" maxlength="255" value="<?= e($old['email'] ?? '') ?>" required>
          <span class="err"><?= e($errors['email'] ?? '') ?></span>
        </div>
      </div>

      <div class="field <?= isset($errors['contact']) ? 'invalid' : '' ?>">
        <label for="f-contact">Contact Number</label>
        <input id="f-contact" name="contact" type="tel" maxlength="20" value="<?= e($old['contact'] ?? '') ?>" required>
        <span class="err"><?= e($errors['contact'] ?? '') ?></span>
      </div>

      <div class="field <?= isset($errors['description']) ? 'invalid' : '' ?>">
        <label for="f-description">Requirement Description</label>
        <textarea id="f-description" name="description" maxlength="1000" required><?= e($old['description'] ?? '') ?></textarea>
        <span class="err"><?= e($errors['description'] ?? '') ?></span>
      </div>

      <button class="btn btn-primary" type="submit" style="width:100%">Send Enquiry</button>
    </form>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>