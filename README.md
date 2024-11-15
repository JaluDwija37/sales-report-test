# Sales Report

## Hasil
![image](https://github.com/user-attachments/assets/59d25598-4251-482a-91b8-6491ca96c58f)

## Cara Menjalankan Laravel

1. **Persyaratan Awal**
   - Pastikan Anda telah menginstal [PHP](https://www.php.net/downloads) (versi 8.2 atau lebih tinggi), [Composer](https://getcomposer.org/download/) dan [Laravel](https://laravel.com/docs). Anda juga memerlukan database seperti MySQL.

2. **Clone Repository**
   ```bash
   git clone https://github.com/JaluDwija37/sales-report-test.git
   cd repo
   ```

3. **Install Dependensi PHP**
   Jalankan perintah berikut untuk menginstal dependensi proyek dengan Composer:
   ```bash
   composer install
   ```
   
4. **Install Dependensi JavaScripts**
   Setelah menginstal dependensi PHP, jalankan perintah berikut untuk menginstal dependensi frontend menggunakan npm:
   ```bash
   npm install
   ```

5. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database dan pengaturan lainnya sesuai kebutuhan:
   ```bash
   cp .env.example .env
   ```

6. **Generate Key Aplikasi**
   Jalankan perintah berikut untuk menghasilkan kunci aplikasi:
   ```bash
   php artisan key:generate
   ```

## Migrasi dan Seeder

1. **Migrasi Database**
   Jalankan migrasi untuk membuat struktur tabel di database:
   ```bash
   php artisan migrate
   ```

2. **Menjalankan Seeder**
   Jika Anda memiliki seeder untuk mengisi data awal, jalankan perintah berikut setelah migrasi:
   ```bash
   php artisan db:seed
   ```
   Anda juga dapat menjalankan migrasi dan seeder secara bersamaan dengan menggunakan:
   ```bash
   php artisan migrate --seed
   ```

## Penjelasan Kode Utama

### SalesController
Untuk melihat menampilkan penjualan yang terdapat di dalam `SalesController`, Anda dapat mengaksesnya di sini: [SalesController](https://github.com/JaluDwija37/sales-report-test/blob/main/app/Http/Controllers/SalesController.php).

### Halaman Sales (AJAX)
Halaman tampilan dan implementasi AJAX dapat dilihat di sini: [Halaman Sales](https://github.com/JaluDwija37/sales-report-test/blob/main/resources/views/sales.blade.php).

Dengan mengikuti langkah-langkah di atas, Anda dapat menjalankan proyek Laravel ini dengan sukses. Pastikan juga untuk mengecek direktori kode yang ditujukan untuk mendapatkan pemahaman lebih dalam terkait implementasi.
