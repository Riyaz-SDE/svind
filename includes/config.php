<?php
// ---------------------------------------------------------------
// SIVIND — database configuration (XAMPP defaults)
// ---------------------------------------------------------------
declare(strict_types=1);

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'sivind');
define('DB_USER', 'root');
define('DB_PASS', '');          // XAMPP MySQL root has no password by default
define('DB_CHARSET', 'utf8mb4');

// Where enquiry notifications should be sent (optional, needs mail configured)
define('ENQUIRY_NOTIFY_EMAIL', 'sales@sivind.com');
define('SEND_EMAIL_NOTIFICATION', false);

// Company details shown across the site
define('COMPANY_NAME', 'SIVIND');
define('COMPANY_TAGLINE', 'Cranes. Material Handling. Service.');
define('COMPANY_PHONE', '+91 00000 00000');
define('COMPANY_EMAIL', 'sales@sivind.com');
define('COMPANY_ADDRESS', 'Industrial Estate, Coimbatore, Tamil Nadu, India');

function db(): PDO
{
    static $pdo = null;
    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    }
    return $pdo;
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
