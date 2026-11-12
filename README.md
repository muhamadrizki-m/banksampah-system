# Bank Sampah

Aplikasi web untuk mengelola operasional bank sampah. Admin mencatat setoran dan mengelola data nasabah, jenis sampah, serta hadiah. Nasabah dapat memantau poin dan statistik, lalu menukarkan poin dengan hadiah.

## Fitur

### Admin

- Dashboard ringkasan nasabah, transaksi, jenis sampah, poin, dan aktivitas terbaru.
- Pengelolaan data nasabah.
- Pengelolaan jenis sampah dan nilai poin per kilogram.
- Pencatatan setoran yang berisi satu atau beberapa jenis sampah dalam satu batch.
- Perhitungan poin setoran dan level nasabah.
- Tampilan dan unduhan struk transaksi dalam PDF.
- Pengelolaan katalog hadiah, stok, harga poin, dan status ketersediaan.
- Riwayat penukaran hadiah.

### Nasabah

- Registrasi, login, dan pengelolaan profil.
- Dashboard berisi saldo poin, level, aktivitas terbaru, serta ringkasan setoran dan penukaran.
- Statistik berat dan poin setoran, progres level, dan ringkasan jenis sampah.
- Penukaran poin dengan satu hadiah atau beberapa item sekaligus.
- Riwayat dan detail penukaran.

Level nasabah dihitung dari poin terkumpul: Pemula (0), Aktif (500), Peduli (2.000), Penggerak (5.000), dan Pelopor (10.000).

> **Status halaman pencapaian:** model dan relasi pencapaian tersedia, tetapi `resources/views/nasabah/achievement.blade.php` masih menampilkan “Coming Soon” dan belum memiliki route khusus.

## Teknologi

- PHP 8.2+
- Laravel 12
- SQLite secara default, atau MySQL/MariaDB melalui konfigurasi `.env`
- Blade, Tailwind CSS, Alpine.js, dan Vite
- DomPDF untuk membuat struk PDF

## Persiapan

Pastikan PHP dan Composer terpasang. Untuk aset frontend, pasang Node.js dan npm. Ekstensi PHP yang diperlukan mengikuti persyaratan Laravel dan driver database yang dipilih (misalnya `pdo_sqlite` untuk SQLite atau `pdo_mysql` untuk MySQL).

## Instalasi lokal

Jalankan dari direktori proyek:

```bash
composer install
```

Salin `.env.example` menjadi `.env`, lalu buat kunci aplikasi:

```bash
# Windows PowerShell
Copy-Item .env.example .env
php artisan key:generate

# macOS/Linux
cp .env.example .env
php artisan key:generate
```

Konfigurasi bawaan menggunakan SQLite. Buat file database jika belum ada:

```bash
# Windows PowerShell
New-Item -ItemType File -Force database/database.sqlite

# macOS/Linux
touch database/database.sqlite
```

Lalu jalankan migrasi, buat tautan penyimpanan untuk gambar hadiah, dan siapkan aset frontend:

```bash
php artisan migrate --seed
php artisan storage:link
npm install
npm run build
```

Untuk menjalankan aplikasi dalam mode pengembangan:

```bash
php artisan serve
```

Buka alamat yang ditampilkan oleh Artisan, biasanya `http://127.0.0.1:8000`.

### Menggunakan MySQL/MariaDB dari XAMPP

1. Jalankan layanan MySQL di XAMPP dan buat database kosong, misalnya `banksampah`.
2. Ubah konfigurasi database pada `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=banksampah
DB_USERNAME=root
DB_PASSWORD=
```

3. Jalankan migrasi dan langkah persiapan lain dari bagian instalasi lokal.

Jangan unggah `.env` ke GitHub. File ini berisi konfigurasi lokal dan rahasia aplikasi.

## Akun awal

`php artisan migrate --seed` menjalankan `AdminSeeder`, yang membuat atau memperbarui akun admin untuk keperluan awal. Periksa `database/seeders/AdminSeeder.php` untuk detail akun, lalu ganti kata sandinya sebelum aplikasi digunakan di lingkungan bersama atau publik. Seeder jenis sampah, hadiah, dan pencapaian saat ini masih kosong; tambahkan data melalui panel admin atau lengkapi seedernya.

## Struktur proyek

```text
app/
  Http/Controllers/       Logika untuk admin, nasabah, autentikasi, dan profil
  Http/Middleware/        Pembatas akses, termasuk middleware admin
  Models/                 User, WasteTransaction, WasteType, Grocery, Redemption, Achievement
 database/
  migrations/             Struktur tabel dan perubahan skema
  seeders/                Data awal aplikasi
 resources/views/         Halaman Blade, layout, komponen, dan aset frontend
 routes/
  web.php                 Route aplikasi admin, nasabah, landing page, dan profil
  auth.php                Route login, registrasi, dan autentikasi
```

## Route utama

| Area | Route | Keterangan |
| --- | --- | --- |
| Umum | `/` | Landing page |
| Admin | `/admin/dashboard` | Dashboard admin |
| Admin | `/admin/nasabah` | Pengelolaan nasabah |
| Admin | `/admin/waste-types` | Pengelolaan jenis sampah |
| Admin | `/admin/waste-transactions` | Setoran dan struk transaksi |
| Admin | `/admin/groceries` | Katalog hadiah |
| Admin | `/admin/redemptions` | Riwayat penukaran |
| Nasabah | `/nasabah/dashboard` | Dashboard nasabah |
| Nasabah | `/nasabah/tukar-poin` | Katalog dan penukaran hadiah |
| Nasabah | `/nasabah/riwayat-penukaran` | Riwayat penukaran |
| Nasabah | `/nasabah/statistik` | Statistik setoran |
| Nasabah | `/nasabah/profil` | Profil nasabah |

Route admin memerlukan autentikasi dan role `admin`. Route nasabah memerlukan autentikasi.

## Catatan pengembangan

- Seeder awal hanya mengisi akun admin; seeders jenis sampah, hadiah, dan pencapaian belum berisi data.
- Halaman pencapaian belum selesai dan belum terhubung ke route.
- Pengaturan email pada `.env.example` menggunakan mailer `log`; sesuaikan konfigurasi mail jika fitur email akan dipakai.
- Jalankan `npm run dev` saat mengembangkan CSS/JavaScript agar Vite memantau perubahan.
