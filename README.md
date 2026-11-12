# Waste Bank

A web application for managing waste bank operations. Administrators record waste deposits and manage customers, waste types, and rewards. Customers can track their points and statistics, then redeem points for rewards.

## Features

### Admin

- Dashboard with customer, transaction, waste type, point, and recent activity summaries.
- Customer management.
- Waste type management, including points per kilogram.
- Deposit recording with one or more waste types in a single batch.
- Deposit point calculation and customer rank tracking.
- Transaction receipt view and PDF download.
- Reward catalog management, including stock, point prices, and availability.
- Reward redemption history.

### Customer

- Registration, login, and profile management.
- Dashboard with point balance, rank, recent activity, and deposit and redemption summaries.
- Statistics for deposited weight and points, rank progress, and waste type summaries.
- Redeem points for one reward or multiple items at once.
- Redemption history and details.

Customer ranks are based on accumulated points: Beginner (0), Active (500), Caring (2,000), Driver (5,000), and Pioneer (10,000).

> **Achievements status:** The achievement model and relationship are present, but `resources/views/nasabah/achievement.blade.php` still displays “Coming Soon” and does not have a dedicated route.

## Tech stack

- PHP 8.2+
- Laravel 12
- SQLite by default, or MySQL/MariaDB through `.env` configuration
- Blade, Tailwind CSS, Alpine.js, and Vite
- DomPDF for PDF receipts

## Requirements

Install PHP and Composer. Node.js and npm are required for frontend assets. Required PHP extensions depend on Laravel and the selected database driver (for example, `pdo_sqlite` for SQLite or `pdo_mysql` for MySQL).

## Local setup

Run these commands from the project directory:

```bash
composer install
```

Copy `.env.example` to `.env`, then generate the application key:

```bash
# Windows PowerShell
Copy-Item .env.example .env
php artisan key:generate

# macOS/Linux
cp .env.example .env
php artisan key:generate
```

The default database is SQLite. Create the database file if it does not exist:

```bash
# Windows PowerShell
New-Item -ItemType File -Force database/database.sqlite

# macOS/Linux
touch database/database.sqlite
```

Run the migrations, create the public storage link for reward images, and build the frontend assets:

```bash
php artisan migrate --seed
php artisan storage:link
npm install
npm run build
```

Start the local development server:

```bash
php artisan serve
```

Open the URL printed by Artisan, usually `http://127.0.0.1:8000`.

### Using MySQL/MariaDB with XAMPP

1. Start MySQL in XAMPP and create an empty database, for example `banksampah`.
2. Update the database settings in `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=banksampah
DB_USERNAME=root
DB_PASSWORD=
```

3. Run the migrations and the remaining setup steps above.

Do not commit `.env` to GitHub. It contains local configuration and application secrets.

## Initial admin account

`php artisan migrate --seed` runs `AdminSeeder`, which creates or updates an admin account for initial setup. Check `database/seeders/AdminSeeder.php` for the account details, and change its password before using the application in a shared or public environment. The waste type, reward, and achievement seeders are currently empty; add data through the admin panel or complete those seeders.

## Project structure

```text
app/
  Http/Controllers/       Admin, customer, authentication, and profile logic
  Http/Middleware/        Access controls, including admin middleware
  Models/                 User, WasteTransaction, WasteType, Grocery, Redemption, Achievement
database/
  migrations/             Database schema and schema changes
  seeders/                Initial data
resources/views/          Blade pages, layouts, components, and frontend assets
routes/
  web.php                 Admin, customer, landing page, and profile routes
  auth.php                Login, registration, and authentication routes
```

## Main routes

| Area | Route | Description |
| --- | --- | --- |
| General | `/` | Landing page |
| Admin | `/admin/dashboard` | Admin dashboard |
| Admin | `/admin/nasabah` | Customer management |
| Admin | `/admin/waste-types` | Waste type management |
| Admin | `/admin/waste-transactions` | Deposits and transaction receipts |
| Admin | `/admin/groceries` | Reward catalog |
| Admin | `/admin/redemptions` | Redemption history |
| Customer | `/nasabah/dashboard` | Customer dashboard |
| Customer | `/nasabah/tukar-poin` | Reward catalog and redemption |
| Customer | `/nasabah/riwayat-penukaran` | Redemption history |
| Customer | `/nasabah/statistik` | Deposit statistics |
| Customer | `/nasabah/profil` | Customer profile |

Admin routes require authentication and the `admin` role. Customer routes require authentication.

## Development notes

- The initial database seeder only creates an admin account; waste type, reward, and achievement seeders contain no data yet.
- The achievements page is unfinished and is not connected to a route.
- The `.env.example` mailer is set to `log`; configure a mail service if email delivery is needed.
- Run `npm run dev` during development to let Vite watch CSS and JavaScript changes.
