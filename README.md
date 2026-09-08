# SIVIND — Crane & Material Handling Website (PHP + MySQL, XAMPP)

## What's inside

```
sivind/
├── index.php            Home page (hero video, products, services, clients, about, enquiry form)
├── submit_enquiry.php   Form handler: CSRF check, honeypot, server-side validation, saves to MySQL
├── admin.php            Password-protected enquiry inbox
├── database.sql         Database + `enquiries` table
├── includes/
│   ├── config.php       DB credentials + company details  <-- EDIT THIS FIRST
│   ├── header.php
│   └── footer.php
└── assets/
    ├── style.css        Full design system (dark steel + amber)
    ├── script.js        Sticky header, mobile menu, scroll reveal, live validation
    ├── hero.mp4         Hero background video
    ├── hero.jpg         Hero poster / fallback image
    ├── product-1..3.jpg
    └── service.jpg
```

## Setup (5 minutes)

1. Copy the whole `sivind` folder into `C:\xampp\htdocs\`.
2. Start **Apache** and **MySQL** in the XAMPP Control Panel.
3. Open <http://localhost/phpmyadmin> → **Import** → choose `database.sql` → **Go**.
   (Or run `mysql -u root < database.sql`.)
4. Open `includes/config.php` and set your real phone, email, address.
   The DB settings already match XAMPP defaults (user `root`, empty password).
5. Visit <http://localhost/sivind/>.

## Enquiry inbox

<http://localhost/sivind/admin.php> — default password `sivind@admin`, set in `admin.php`.
**Change it before putting this on a live server.**

## Email notifications

Off by default (XAMPP has no mail server). To enable, set
`SEND_EMAIL_NOTIFICATION` to `true` in `includes/config.php` and configure
`sendmail` in `php.ini`, or swap the `mail()` call in `submit_enquiry.php`
for PHPMailer with your SMTP details.

## Things you should replace

- **Client list** — in `index.php`, the `$clients` array holds placeholder names.
  Replace with your real customers; add logo files to `assets/clients/` and use
  `['name' => 'ABC Steel', 'logo' => 'assets/clients/abc.png']`.
- **Stats in the hero** (100T, 500+, 24/7, 15+) — these are illustrative.
- **Product specs and copy** — the `$products` and `$services` arrays in `index.php`.
- **Contact details** — currently placeholders in `includes/config.php`.
- **Hero video/photos** — AI-generated stock. Swap in real plant footage when you have it.

## Security notes

- Prepared statements (PDO) everywhere — no SQL injection.
- All output escaped with `htmlspecialchars`.
- CSRF token + hidden honeypot field on the enquiry form.
- Validation runs on both the browser and the server.
