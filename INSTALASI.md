# Panduan Instalasi Sistem Inventaris Peminjaman Barang

## Untuk XAMPP (Windows)

### Langkah 1: Persiapan
1. Pastikan XAMPP sudah terinstall di komputer Anda
2. Jalankan Apache dan MySQL dari XAMPP Control Panel

### Langkah 2: Setup Project
1. Download atau clone project ini
2. Extract/Copy folder project ke `C:\xampp\htdocs\inventaris-peminjaman-barang`

### Langkah 3: Setup Database
1. Buka browser dan akses `http://localhost/phpmyadmin`
2. Klik "New" untuk membuat database baru
3. Nama database: `inventaris_peminjaman`
4. Collation: `utf8mb4_unicode_ci`
5. Klik "Create"
6. Pilih database yang baru dibuat
7. Klik tab "Import"
8. Pilih file `database.sql` dari folder project
9. Klik "Go" untuk import

### Langkah 4: Konfigurasi
1. File `.env` sudah dikonfigurasi dengan default XAMPP:
   ```
   DB_HOST=127.0.0.1
   DB_DATABASE=inventaris_peminjaman
   DB_USERNAME=root
   DB_PASSWORD=
   ```
2. Jika setting MySQL Anda berbeda, edit file `.env` sesuai kebutuhan

### Langkah 5: Akses Aplikasi
1. Buka browser
2. Akses: `http://localhost/inventaris-peminjaman-barang/public`
3. Login dengan:
   - Email: `admin@admin.com`
   - Password: `admin123`

## Untuk Production Server

### Langkah 1: Upload Files
1. Upload semua file project ke server hosting Anda
2. Pastikan folder `storage` dan `bootstrap/cache` memiliki permission 775

### Langkah 2: Setup Database
1. Buat database baru melalui cPanel atau hosting panel
2. Import file `database.sql`
3. Update file `.env` dengan kredensial database Anda

### Langkah 3: Konfigurasi
1. Edit `.env`:
   ```
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   
   DB_HOST=your_host
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

### Langkah 4: Set Document Root
1. Set document root ke folder `/public`
2. Atau copy file `.htaccess` dari root ke public

## Troubleshooting

### Problem: Halaman tidak tampil dengan benar
**Solusi:**
1. Pastikan mengakses melalui folder `/public`
2. Cek file `.htaccess` ada di folder public
3. Pastikan mod_rewrite Apache aktif

### Problem: Error database connection
**Solusi:**
1. Cek kredensial database di `.env`
2. Pastikan MySQL service running
3. Test koneksi database di phpMyAdmin

### Problem: Error 500
**Solusi:**
1. Cek permission folder `storage` dan `bootstrap/cache`
2. Jalankan: `chmod -R 775 storage bootstrap/cache`
3. Cek error log di `storage/logs/laravel.log`

### Problem: CSS/JS tidak load
**Solusi:**
1. Cek path di `.env`: `ASSET_URL=`
2. Pastikan file ada di folder `public/css` dan `public/js`
3. Clear browser cache

## Fitur-fitur Tambahan

### Upload Gambar Barang
- Gambar disimpan di folder `storage/app/public/items`
- Format yang didukung: JPG, PNG, GIF
- Maksimal ukuran: 2MB

### Automatic Overdue Detection
- Sistem otomatis mendeteksi peminjaman yang terlambat
- Status berubah dari "dipinjam" ke "terlambat" saat melewati due date

### Export/Print Laporan
- Gunakan tombol "Cetak Laporan" pada halaman laporan
- Browser akan membuka print dialog
- Pilih "Save as PDF" untuk export PDF

## Tips Penggunaan

### Untuk Admin:
1. **Manajemen Barang:** Pastikan kode barang unik untuk setiap item
2. **Stok Barang:** Monitor dashboard untuk barang stok menipis
3. **Peminjaman:** Selalu cek ketersediaan sebelum mencatat peminjaman
4. **Laporan:** Generate laporan secara berkala untuk tracking

### Untuk User:
1. **Peminjaman:** Catat tujuan peminjaman dengan jelas
2. **Kondisi Barang:** Periksa kondisi barang sebelum dan sesudah peminjam
3. **Pengembalian:** Kembalikan barang sebelum due date

## Maintenance Rutin

### Harian:
- Cek peminjaman yang jatuh tempo hari ini
- Monitor barang yang terlambat dikembalikan

### Mingguan:
- Backup database
- Cek stok barang
- Review laporan peminjaman

### Bulanan:
- Generate laporan statistik
- Evaluasi barang paling sering dipinjam
- Update data barang jika ada perubahan

## Contact Support

Jika mengalami kesulitan dalam instalasi atau penggunaan sistem:
1. Baca dokumentasi di README.md
2. Cek troubleshooting guide di atas
3. Buka issue di repository GitHub

---

Selamat menggunakan Sistem Inventaris Peminjaman Barang! 🎉
