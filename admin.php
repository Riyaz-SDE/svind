<?php
// ---------------------------------------------------------------
// SIVIND — simple password-protected enquiry inbox
// Change ADMIN_PASSWORD below before using this on a real server.
// ---------------------------------------------------------------
declare(strict_types=1);
session_start();
require_once __DIR__ . '/includes/config.php';

const ADMIN_PASSWORD = 'sivind@admin';

if (isset($_GET['logout'])) { session_destroy(); header('Location: admin.php'); exit; }

if (($_POST['password'] ?? null) !== null) {
    if (hash_equals(ADMIN_PASSWORD, (string) $_POST['password'])) {
        $_SESSION['admin'] = true;
    } else {
        $loginError = 'Incorrect password.';
    }
}

$rows = [];
if (!empty($_SESSION['admin'])) {
    $rows = db()->query('SELECT * FROM enquiries ORDER BY created_at DESC')->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Enquiries — <?= e(COMPANY_NAME) ?></title>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css">
<style>
  body{padding:40px 0}
  table{width:100%;border-collapse:collapse;background:var(--steel-850);border:1px solid var(--line);border-radius:14px;overflow:hidden}
  th,td{padding:14px 16px;text-align:left;font-size:.9rem;border-bottom:1px solid var(--line);vertical-align:top}
  th{font-size:.72rem;letter-spacing:.16em;text-transform:uppercase;color:var(--fg-muted);background:var(--steel-800)}
  td{color:var(--fg)}
  .topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:28px;gap:16px;flex-wrap:wrap}
</style>
</head><body>
<div class="container">
<?php if (empty($_SESSION['admin'])): ?>
  <form method="post" class="enquiry-form" style="max-width:400px;margin:60px auto">
    <h3 style="margin-bottom:20px">Enquiry Inbox</h3>
    <?php if (!empty($loginError)): ?><div class="alert alert-err"><?= e($loginError) ?></div><?php endif; ?>
    <div class="field"><label for="p">Password</label><input id="p" type="password" name="password" required></div>
    <button class="btn btn-primary" style="width:100%">Sign In</button>
  </form>
<?php else: ?>
  <div class="topbar">
    <h2>Enquiries <span style="color:var(--amber)">(<?= count($rows) ?>)</span></h2>
    <div style="display:flex;gap:10px">
      <a class="btn btn-ghost btn-sm" href="index.php">View site</a>
      <a class="btn btn-primary btn-sm" href="admin.php?logout=1">Sign out</a>
    </div>
  </div>
  <table>
    <tr><th>#</th><th>Received</th><th>Name</th><th>Email</th><th>Contact</th><th>Requirement</th></tr>
    <?php if (!$rows): ?>
      <tr><td colspan="6" style="color:var(--fg-muted)">No enquiries yet.</td></tr>
    <?php endif; ?>
    <?php foreach ($rows as $r): ?>
      <tr>
        <td><?= (int) $r['id'] ?></td>
        <td><?= e(date('d M Y, H:i', strtotime((string) $r['created_at']))) ?></td>
        <td><?= e($r['name']) ?></td>
        <td><a href="mailto:<?= e($r['email']) ?>"><?= e($r['email']) ?></a></td>
        <td><?= e($r['contact']) ?></td>
        <td style="max-width:420px"><?= nl2br(e($r['description'])) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>
</div>
</body></html>
