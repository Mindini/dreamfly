# Dreamfly Campus - Vulnerable CTF Web App

This is a small intentionally vulnerable PHP web app for CTF practice. It includes examples of:

- IDOR (Broken Access Control) in invoice viewing
- SQL Injection in admin login
- Stored XSS in feedback reviewed by admin

WARNING: This code is intentionally insecure. Run only in an isolated, local environment.

Setup (Windows / WAMP/XAMPP):

1. Place the `dreamfly_ctf` folder inside your webroot (for example `C:\xampp\htdocs\`).
2. Import the SQL schema: `mysql -u root -p < dreamfly_ctf/db/dreamfly.sql`
3. Ensure PHP has mysqli enabled. Start Apache + MySQL.
4. Visit `http://localhost/dreamfly_ctf/` in your browser.

Default credentials:
- Student: `john_doe` / `user123`
- Admin: `admin` / `adminpass` (vulnerable to SQLi)

Flags:
- IDOR: FLAG{ID0R_1NS3CUR3_0BJ3CT_R3F3R3NC3} (in `invoices/invoice_1000.txt`)
- SQLi: FLAG{SQL1_4DM1N_T0K3N_3XTR4CT10N`} (in `db.admin_tokens.secret_token`)
- XSS: FLAG{XSS_CR0SS_S1T3_SCR1PT1NG} (in `admin/flag.txt`)
