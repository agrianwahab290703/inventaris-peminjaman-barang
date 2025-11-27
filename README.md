# Sistem Inventaris Peminjaman Barang

Sistem Inventaris Peminjaman Barang adalah aplikasi web berbasis Laravel yang dirancang untuk mengelola peminjaman barang di institusi pendidikan atau organisasi. Aplikasi ini memiliki desain yang terinspirasi dari logo Tutwuri Handayani dengan warna biru dan putih yang profesional.

## Fitur Utama

### 1. Dashboard
- Statistik real-time peminjaman barang
- Grafik peminjaman bulanan
- Notifikasi barang stok menipis
- Daftar peminjaman terbaru
- Monitoring barang habis

### 2. Manajemen Kategori
- Tambah, edit, dan hapus kategori barang
- Lihat detail kategori beserta barang-barangnya
- Tracking jumlah barang per kategori

### 3. Manajemen Barang
- CRUD (Create, Read, Update, Delete) barang
- Upload gambar barang
- Filter berdasarkan kategori dan kondisi
- Pencarian barang
- Tracking stok tersedia dan dipinjam
- Monitoring kondisi barang (baik, rusak ringan, rusak berat)

### 4. Manajemen Peminjaman
- Catat peminjaman baru
- Edit data peminjaman aktif
- Proses pengembalian barang
- Tracking kondisi barang saat dipinjam dan dikembalikan
- Status peminjaman (dipinjam, dikembalikan, terlambat)
- Automatic overdue detection

### 5. Laporan
- Laporan peminjaman berdasarkan periode
- Laporan inventaris barang
- Statistik dan analisis peminjaman
- Grafik peminjaman bulanan
- Top 10 barang paling sering dipinjam
- Peminjaman per kategori
- Fitur cetak laporan

## Teknologi yang Digunakan

- **Backend:** Laravel 10.x
- **Frontend:** HTML5, CSS3, JavaScript
- **Database:** MySQL
- **Chart:** Chart.js
- **Icons:** Font Awesome 6.4.0
- **Fonts:** Google Fonts (Poppins)

## Instalasi

### Persyaratan Sistem
- PHP 8.1 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Composer (untuk instalasi Laravel)
- XAMPP (untuk development)

### Cara Instalasi

#### Metode 1: Instalasi Manual (Tanpa Composer)

1. **Clone atau Download Repository**
   ```bash
   git clone [repository-url]
   cd inventaris-peminjaman-barang
   ```

2. **Buat Database**
   - Buka phpMyAdmin (http://localhost/phpmyadmin)
   - Buat database baru dengan nama `inventaris_peminjaman`
   - Import file `database.sql` yang sudah disediakan

3. **Konfigurasi .env**
   - File `.env` sudah dikonfigurasi dengan default:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=inventaris_peminjaman
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Akses Aplikasi**
   - Pindahkan folder project ke `htdocs/inventaris-peminjaman-barang`
   - Akses melalui browser: `http://localhost/inventaris-peminjaman-barang/public`

#### Metode 2: Instalasi dengan Composer

1. **Install Dependencies**
   ```bash
   composer install
   ```

2. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

3. **Jalankan Migrasi**
   ```bash
   php artisan migrate
   ```

4. **Jalankan Seeder**
   ```bash
   php artisan db:seed
   ```

5. **Jalankan Server**
   ```bash
   php artisan serve
   ```

6. **Akses Aplikasi**
   - Buka browser dan akses: `http://localhost:8000`

## Data Login Default

### Admin
- Email: `admin@admin.com`
- Password: `admin123`

### User
- Email: `budi@example.com`
- Password: `password`

## Struktur Database

### Tabel Users
- Menyimpan data pengguna (admin dan peminjam)
- Fields: id, name, email, phone, role, password

### Tabel Categories
- Menyimpan data kategori barang
- Fields: id, name, description

### Tabel Items
- Menyimpan data barang
- Fields: id, code, name, category_id, description, quantity, available_quantity, condition, location, image

### Tabel Borrowings
- Menyimpan data peminjaman
- Fields: id, borrowing_code, user_id, item_id, quantity, borrow_date, due_date, return_date, status, purpose, notes, item_condition_borrow, item_condition_return

## Desain

Aplikasi ini menggunakan desain yang terinspirasi dari logo Tutwuri Handayani dengan:
- **Warna Primer:** Biru (#1e40af, #3b82f6)
- **Warna Sekunder:** Putih (#ffffff, #f8fafc)
- **Accent:** Green (#10b981), Orange (#f59e0b), Red (#ef4444)
- **Typography:** Poppins (Google Fonts)
- **Style:** Modern, clean, professional dengan nuansa akademis

## Fitur Keamanan

- Password Hashing menggunakan bcrypt
- CSRF Protection
- SQL Injection Prevention (Eloquent ORM)
- Input Validation
- Role-based Access (Admin & User)

## Maintenance dan Pengembangan

### Backup Database
```bash
php artisan db:backup
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Troubleshooting

### Error: SQLSTATE[HY000] [1045] Access denied
- Pastikan username dan password database di `.env` sudah benar
- Cek apakah MySQL service sudah running

### Error: 404 Not Found
- Pastikan akses melalui `/public` atau gunakan `php artisan serve`
- Cek file `.htaccess` di folder public

### Error: Storage link not found
```bash
php artisan storage:link
```

## Kontribusi

Untuk berkontribusi pada project ini:
1. Fork repository
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## Lisensi

Project ini dilisensikan under MIT License.

## Support

Untuk pertanyaan dan dukungan, silakan buka issue di repository ini.

## Screenshots

### Dashboard
![Dashboard](screenshots/dashboard.png)

### Manajemen Barang
![Items](screenshots/items.png)

### Peminjaman
![Borrowings](screenshots/borrowings.png)

### Laporan
![Reports](screenshots/reports.png)

---

Dikembangkan dengan ❤️ untuk pendidikan Indonesia