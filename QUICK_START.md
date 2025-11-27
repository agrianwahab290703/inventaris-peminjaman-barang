# 🚀 Quick Start Guide

## Instalasi Cepat untuk XAMPP

### 1️⃣ Persiapan (5 menit)
```bash
# Jalankan XAMPP
- Start Apache
- Start MySQL
```

### 2️⃣ Setup Project (2 menit)
```bash
# Copy folder project ke:
C:\xampp\htdocs\inventaris-peminjaman-barang
```

### 3️⃣ Setup Database (3 menit)
1. Buka http://localhost/phpmyadmin
2. Buat database: `inventaris_peminjaman`
3. Import file: `database.sql`
4. Done! ✅

### 4️⃣ Akses Aplikasi
```
URL: http://localhost/inventaris-peminjaman-barang/public

Login Admin:
Email: admin@admin.com
Password: admin123

Login User:
Email: budi@example.com
Password: password
```

## 📋 Checklist

- [ ] XAMPP terinstall
- [ ] Apache & MySQL running
- [ ] Project di folder htdocs
- [ ] Database dibuat
- [ ] File database.sql diimport
- [ ] Buka browser dan akses URL
- [ ] Login berhasil

## 🎯 Fitur Utama yang Bisa Dicoba

### Sebagai Admin:
1. **Dashboard** - Lihat statistik real-time
2. **Kategori** - Tambah/Edit/Hapus kategori
3. **Barang** - Kelola inventaris dengan foto
4. **Peminjaman** - Catat dan kelola peminjaman
5. **Laporan** - Generate berbagai laporan

### Fitur Unggulan:
- ✨ Automatic stock management
- 🔔 Overdue detection otomatis
- 📊 Grafik interaktif
- 🖼️ Upload gambar barang
- 🔍 Search & filter advanced
- 📈 Laporan lengkap
- 🖨️ Print/Export PDF

## 🎨 Preview

### Dashboard
- 4 kartu statistik berwarna
- Grafik peminjaman bulanan
- Daftar peminjaman terbaru
- Alert stok menipis

### Design
- 🔵 Warna biru & putih (Tutwuri Handayani)
- 🎨 Modern & profesional
- 📱 Responsive
- ✨ Animasi smooth

## 🆘 Troubleshooting

### Error: Database connection failed
```
Solusi:
1. Cek MySQL sudah running
2. Cek nama database: inventaris_peminjaman
3. Username: root, Password: kosong
```

### Error: 404 Not Found
```
Solusi:
Akses via: /public
Contoh: http://localhost/inventaris-peminjaman-barang/public
```

### Error: Blank page
```
Solusi:
1. Cek error_log di XAMPP
2. Pastikan PHP 8.1+
3. Clear browser cache
```

## 📚 Dokumentasi Lengkap

1. **README.md** - Overview sistem
2. **INSTALASI.md** - Panduan instalasi detail
3. **PANDUAN_PENGGUNA.md** - Manual pengguna lengkap
4. **FITUR.md** - Daftar fitur lengkap
5. **CHANGELOG.md** - Riwayat versi

## 💡 Tips

### Untuk Testing:
1. Login sebagai admin
2. Tambah beberapa kategori (sudah ada 5 default)
3. Tambah beberapa barang (sudah ada 8 default)
4. Catat peminjaman
5. Lihat dashboard berubah real-time
6. Generate laporan

### Sample Data:
- 3 User (1 admin, 2 user)
- 5 Kategori (Elektronik, Olahraga, dll)
- 8 Barang (Laptop, Proyektor, dll)

### Test Scenario:
1. ✅ Login
2. ✅ Lihat dashboard
3. ✅ Tambah barang baru
4. ✅ Upload foto barang
5. ✅ Catat peminjaman
6. ✅ Kembalikan barang
7. ✅ Generate laporan
8. ✅ Print laporan

## 🎯 Next Steps

Setelah instalasi berhasil:

1. **Customize Data**
   - Update kategori sesuai kebutuhan
   - Tambah barang milik institusi
   - Tambah user peminjam

2. **Konfigurasi**
   - Ubah password default
   - Set lokasi barang
   - Tentukan due date policy

3. **Training**
   - Baca PANDUAN_PENGGUNA.md
   - Training admin & user
   - Test semua fitur

4. **Production**
   - Backup database
   - Set maintenance schedule
   - Monitor penggunaan

## 🔐 Keamanan

⚠️ **Penting untuk Production:**
1. Ubah password default admin
2. Set APP_DEBUG=false di .env
3. Backup database berkala
4. Restrict folder permissions

## 📞 Support

Butuh bantuan?
1. Baca dokumentasi lengkap
2. Cek troubleshooting guide
3. Contact administrator

---

## ⏱️ Total Time: ~10 menit

✅ Setup database: 3 menit
✅ Copy files: 2 menit
✅ Test akses: 1 menit
✅ Explore fitur: 5 menit

**Total: 10-15 menit dari 0 sampai running!**

---

**Selamat mencoba! 🎉**

Jika berhasil, Anda akan melihat:
- Dashboard yang indah dengan warna biru-putih
- Grafik peminjaman
- Semua menu berfungsi
- Data sample sudah ada

**Happy Managing! 📦✨**
