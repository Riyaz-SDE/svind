<?php
// ---------------------------------------------------------------
// SIVIND — enquiry form handler (server-side validation + storage)
// ---------------------------------------------------------------
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// --- CSRF check -------------------------------------------------
$token = $_POST['csrf_token'] ?? '';
if (!isset($_SESSION['csrf_token']) || !is_string($token) || !hash_equals($_SESSION['csrf_token'], $token)) {
    $_SESSION['flash'] = ['type' => 'err', 'text' => 'Your session expired. Please try again.'];
    header('Location: index.php#enquiry');
    exit;
}

// --- Honeypot (silent bot trap) ---------------------------------
if (trim((string) ($_POST['company_website'] ?? '')) !== '') {
    $_SESSION['flash'] = ['type' => 'ok', 'text' => 'Thank you — your enquiry has been received.'];
    header('Location: index.php#enquiry');
    exit;
}

// --- Collect + validate ----------------------------------------
$name        = trim((string) ($_POST['name'] ?? ''));
$email       = trim((string) ($_POST['email'] ?? ''));
$contact     = trim((string) ($_POST['contact'] ?? ''));
$description = trim((string) ($_POST['description'] ?? ''));

$errors = [];

if ($name === '' || mb_strlen($name) < 2 || mb_strlen($name) > 100) {
    $errors['name'] = 'Name must be between 2 and 100 characters.';
}
if ($email === '' || mb_strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Enter a valid email address.';
}
if (!preg_match('/^[0-9+()\-\s]{7,20}$/', $contact)) {
    $errors['contact'] = 'Enter a valid contact number.';
}
if ($description === '' || mb_strlen($description) < 10 || mb_strlen($description) > 1000) {
    $errors['description'] = 'Description must be between 10 and 1000 characters.';
}

if ($errors) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old']    = compact('name', 'email', 'contact', 'description');
    $_SESSION['flash']  = ['type' => 'err', 'text' => 'Please correct the highlighted fields.'];
    header('Location: index.php#enquiry');
    exit;
}

// --- Store ------------------------------------------------------
try {
    $stmt = db()->prepare(
        'INSERT INTO enquiries (name, email, contact, description, ip_address)
         VALUES (:name, :email, :contact, :description, :ip)'
    );
    $stmt->execute([
        ':name'        => $name,
        ':email'       => $email,
        ':contact'     => $contact,
        ':description' => $description,
        ':ip'          => $_SERVER['REMOTE_ADDR'] ?? null,
    ]);
} catch (Throwable $ex) {
    error_log('SIVIND enquiry insert failed: ' . $ex->getMessage());
    $_SESSION['old']   = compact('name', 'email', 'contact', 'description');
    $_SESSION['flash'] = ['type' => 'err', 'text' => 'We could not save your enquiry. Please call us instead.'];
    header('Location: index.php#enquiry');
    exit;
}

// --- Optional email notification --------------------------------
if (SEND_EMAIL_NOTIFICATION) {
    $subject = 'New website enquiry from ' . $name;
    $body    = "Name: {$name}\nEmail: {$email}\nContact: {$contact}\n\nRequirement:\n{$description}\n";
    @mail(ENQUIRY_NOTIFY_EMAIL, $subject, $body, 'From: no-reply@sivind.com');
}

// Rotate the token so a refresh cannot resubmit
unset($_SESSION['csrf_token']);
$_SESSION['flash'] = ['type' => 'ok', 'text' => 'Thank you, ' . $name . '. Our team will contact you within one business day.'];
header('Location: index.php#enquiry');
exit;
