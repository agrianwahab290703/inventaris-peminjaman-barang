# Panduan Pengguna Sistem Inventaris Peminjaman Barang

## 📖 Daftar Isi
1. [Memulai](#memulai)
2. [Dashboard](#dashboard)
3. [Manajemen Kategori](#manajemen-kategori)
4. [Manajemen Barang](#manajemen-barang)
5. [Manajemen Peminjaman](#manajemen-peminjaman)
6. [Laporan](#laporan)
7. [Tips & Trik](#tips--trik)

---

## Memulai

### Login ke Sistem
1. Buka browser dan akses URL sistem
2. Masukkan email dan password Anda
3. Klik tombol "Login"

**Akun Default:**
- Admin: admin@admin.com / admin123
- User: budi@example.com / password

### Navigasi Sistem
- **Sidebar Kiri:** Menu utama untuk navigasi
- **Header Atas:** Judul halaman dan informasi user
- **Content Area:** Konten utama halaman

---

## Dashboard

### Tampilan Utama
Dashboard menampilkan informasi penting:

1. **Kartu Statistik (4 kartu)**
   - Total Barang: Jumlah keseluruhan barang
   - Barang Tersedia: Barang yang bisa dipinjam
   - Sedang Dipinjam: Peminjaman aktif
   - Terlambat: Peminjaman yang melewati jatuh tempo

2. **Grafik Peminjaman Bulanan**
   - Visualisasi tren peminjaman per bulan
   - Interaktif dengan Chart.js

3. **Peminjaman Terbaru**
   - 10 transaksi peminjaman terakhir
   - Status: Dipinjam, Dikembalikan, Terlambat

4. **Alert Stok**
   - Barang Stok Menipis (≤5 item)
   - Barang Habis (0 item)

### Aksi Cepat dari Dashboard
- Klik "Lihat Semua" untuk ke halaman peminjaman lengkap
- Klik nama barang untuk melihat detail

---

## Manajemen Kategori

### Melihat Daftar Kategori
1. Klik menu "Kategori" di sidebar
2. Lihat tabel daftar kategori
3. Informasi: Nama, Deskripsi, Jumlah Barang

### Menambah Kategori Baru
1. Klik tombol "Tambah Kategori"
2. Isi formulir:
   - **Nama Kategori*** (wajib)
   - **Deskripsi** (opsional)
3. Klik "Simpan"

### Mengedit Kategori
1. Klik icon edit (pensil) pada kategori yang ingin diedit
2. Ubah informasi yang diperlukan
3. Klik "Simpan Perubahan"

### Melihat Detail Kategori
1. Klik icon view (mata) pada kategori
2. Lihat detail lengkap dan daftar barang dalam kategori

### Menghapus Kategori
1. Klik icon delete (tempat sampah)
2. Konfirmasi penghapusan
3. **Perhatian:** Kategori yang memiliki barang tidak dapat dihapus

---

## Manajemen Barang

### Melihat Daftar Barang
1. Klik menu "Barang" di sidebar
2. Lihat tabel daftar barang
3. Informasi: Kode, Nama, Kategori, Jumlah, Tersedia, Kondisi, Lokasi

### Filter dan Pencarian
**Pencarian:**
- Ketik nama atau kode barang di kolom "Cari"
- Klik "Filter"

**Filter Kategori:**
- Pilih kategori dari dropdown
- Klik "Filter"

**Filter Kondisi:**
- Pilih: Baik, Rusak Ringan, atau Rusak Berat
- Klik "Filter"

### Menambah Barang Baru
1. Klik tombol "Tambah Barang"
2. Isi formulir:
   - **Kode Barang*** (unik, contoh: ELK-001)
   - **Nama Barang*** (nama lengkap)
   - **Kategori*** (pilih dari dropdown)
   - **Jumlah*** (stok total)
   - **Kondisi*** (Baik/Rusak Ringan/Rusak Berat)
   - **Lokasi** (tempat penyimpanan)
   - **Deskripsi** (detail barang)
   - **Gambar** (foto barang, max 2MB)
3. Klik "Simpan"

**Tips Kode Barang:**
- ELK-001 untuk Elektronik
- OLR-001 untuk Olahraga
- ALT-001 untuk Alat Tulis
- LAB-001 untuk Laboratorium
- MUL-001 untuk Multimedia

### Mengedit Barang
1. Klik icon edit pada barang
2. Ubah informasi yang diperlukan
3. **Catatan:** Perubahan jumlah akan menyesuaikan stok tersedia
4. Klik "Simpan Perubahan"

### Melihat Detail Barang
1. Klik icon view pada barang
2. Lihat informasi lengkap:
   - Foto barang (jika ada)
   - Semua informasi barang
   - Riwayat peminjaman

### Menghapus Barang
1. Klik icon delete
2. Konfirmasi penghapusan
3. **Perhatian:** Barang yang sedang dipinjam sebaiknya tidak dihapus

---

## Manajemen Peminjaman

### Melihat Daftar Peminjaman
1. Klik menu "Peminjaman" di sidebar
2. Lihat tabel daftar peminjaman
3. Informasi: Kode, Peminjam, Barang, Jumlah, Tanggal, Status

### Filter dan Pencarian
**Pencarian:**
- Ketik kode peminjaman, nama peminjam, atau barang
- Klik "Filter"

**Filter Status:**
- Pilih: Dipinjam, Dikembalikan, atau Terlambat
- Klik "Filter"

### Mencatat Peminjaman Baru
1. Klik tombol "Catat Peminjaman"
2. Isi formulir:
   - **Peminjam*** (pilih dari dropdown)
   - **Barang*** (pilih barang yang tersedia)
   - **Jumlah*** (max = stok tersedia)
   - **Kondisi Barang Saat Dipinjam*** (Baik/Rusak Ringan/Rusak Berat)
   - **Tanggal Pinjam*** (default hari ini)
   - **Tanggal Jatuh Tempo*** (harus setelah tanggal pinjam)
   - **Tujuan Peminjaman** (untuk apa barang dipinjam)
   - **Catatan** (informasi tambahan)
3. Klik "Simpan"

**Sistem Otomatis:**
- Kode peminjaman dibuat otomatis (BRW-YYYYMMDD-XXXX)
- Stok barang dikurangi otomatis
- Status: "Dipinjam"

### Mengedit Peminjaman
1. Klik icon edit pada peminjaman (hanya yang belum dikembalikan)
2. Ubah informasi yang diperlukan
3. Klik "Simpan Perubahan"

**Perhatian:** Peminjaman yang sudah dikembalikan tidak dapat diedit

### Mengembalikan Barang
1. Buka detail peminjaman atau klik di daftar peminjaman
2. Klik tombol "Kembalikan Barang" (hijau)
3. Modal pengembalian akan muncul:
   - **Tanggal Kembali*** (default hari ini)
   - **Kondisi Barang Saat Dikembalikan*** (Baik/Rusak Ringan/Rusak Berat)
   - **Catatan** (informasi pengembalian)
4. Klik "Konfirmasi Pengembalian"

**Sistem Otomatis:**
- Stok barang bertambah otomatis
- Status berubah jadi "Dikembalikan"
- Kondisi barang diupdate jika rusak

### Melihat Detail Peminjaman
1. Klik icon view pada peminjaman
2. Lihat informasi lengkap:
   - Data peminjam
   - Data barang
   - Tanggal-tanggal penting
   - Kondisi barang
   - Status
   - Catatan

### Status Peminjaman
- 🔵 **Dipinjam:** Barang sedang dipinjam, belum jatuh tempo
- 🔴 **Terlambat:** Sudah melewati tanggal jatuh tempo
- 🟢 **Dikembalikan:** Barang sudah dikembalikan

**Sistem Otomatis:**
- Status otomatis berubah ke "Terlambat" jika melewati due date

---

## Laporan

### Menu Laporan
Klik menu "Laporan" untuk melihat 3 jenis laporan:
1. Laporan Peminjaman
2. Laporan Barang
3. Statistik

### Laporan Peminjaman
**Cara Menggunakan:**
1. Pilih "Laporan Peminjaman"
2. Filter laporan:
   - **Tanggal Mulai:** Awal periode
   - **Tanggal Akhir:** Akhir periode
   - **Status:** Semua/Dipinjam/Dikembalikan/Terlambat
3. Klik "Filter"
4. Klik "Cetak Laporan" untuk print/PDF

**Informasi yang Ditampilkan:**
- Kode peminjaman
- Nama peminjam
- Nama barang
- Jumlah
- Tanggal pinjam, jatuh tempo, kembali
- Status
- Total peminjaman dan jumlah barang

### Laporan Barang
**Cara Menggunakan:**
1. Pilih "Laporan Barang"
2. Filter laporan:
   - **Kategori:** Semua atau kategori tertentu
   - **Kondisi:** Semua atau kondisi tertentu
3. Klik "Filter"
4. Klik "Cetak Laporan" untuk print/PDF

**Informasi yang Ditampilkan:**
- Kode barang
- Nama barang
- Kategori
- Jumlah total, tersedia, dipinjam
- Kondisi
- Lokasi
- Total stok keseluruhan

### Statistik dan Analisis
**Informasi yang Ditampilkan:**
1. **Kartu Statistik:**
   - Total peminjaman all-time
   - Peminjaman aktif
   - Sudah dikembalikan
   - Terlambat

2. **Grafik Peminjaman Bulanan:**
   - Bar chart peminjaman per bulan
   - Tahun berjalan

3. **Barang Paling Sering Dipinjam:**
   - Top 10 barang populer
   - Jumlah peminjaman per barang

4. **Peminjaman per Kategori:**
   - Breakdown berdasarkan kategori
   - Total peminjaman per kategori

---

## Tips & Trik

### Tips untuk Admin

**Manajemen Barang:**
1. Gunakan kode yang konsisten dan mudah diingat
2. Selalu upload foto barang untuk identifikasi
3. Update lokasi barang jika dipindahkan
4. Review stok secara berkala

**Manajemen Peminjaman:**
1. Cek ketersediaan barang sebelum mencatat peminjaman
2. Catat tujuan peminjaman dengan jelas
3. Set due date yang realistis
4. Follow up peminjaman terlambat

**Monitoring:**
1. Cek dashboard setiap hari
2. Perhatikan notifikasi stok menipis
3. Review barang yang sering dipinjam
4. Generate laporan bulanan

### Tips untuk Peminjam

**Sebelum Meminjam:**
1. Pastikan barang yang dibutuhkan tersedia
2. Tentukan berapa lama akan meminjam
3. Cek kondisi barang sebelum dipinjam

**Saat Meminjam:**
1. Catat tujuan peminjaman dengan jelas
2. Perhatikan tanggal jatuh tempo
3. Foto kondisi barang (opsional tapi direkomendasikan)

**Saat Mengembalikan:**
1. Kembalikan sebelum tanggal jatuh tempo
2. Pastikan barang dalam kondisi yang sama
3. Laporkan jika ada kerusakan
4. Bersihkan barang sebelum dikembalikan

### Keyboard Shortcuts
- **Ctrl + F:** Quick search di browser
- **Ctrl + P:** Print laporan
- **Tab:** Navigasi antar form field
- **Enter:** Submit form

### Best Practices

**Keamanan:**
1. Logout setelah selesai menggunakan sistem
2. Jangan share password
3. Ubah password secara berkala

**Data Entry:**
1. Isi data dengan lengkap dan akurat
2. Double check sebelum save
3. Gunakan format yang konsisten
4. Validasi data yang diinput

**Maintenance:**
1. Backup data secara berkala
2. Clear browser cache jika sistem lambat
3. Report bug atau error ke admin
4. Update browser untuk performa optimal

---

## Troubleshooting Umum

### Tidak Bisa Login
- Cek username/password
- Pastikan Caps Lock off
- Hubungi admin untuk reset password

### Tidak Bisa Upload Gambar
- Cek ukuran file (max 2MB)
- Format: JPG, PNG, GIF
- Compress gambar jika terlalu besar

### Data Tidak Muncul
- Refresh halaman (F5)
- Clear filter
- Cek koneksi internet

### Error Saat Save
- Cek field yang wajib diisi (*)
- Pastikan format data benar
- Screenshot error dan report ke admin

---

## FAQ (Pertanyaan Umum)

**Q: Bagaimana cara mengubah password?**
A: Hubungi administrator untuk reset password.

**Q: Bisa meminjam lebih dari 1 barang sekaligus?**
A: Ya, tapi satu transaksi untuk satu jenis barang. Untuk beberapa jenis barang, buat transaksi terpisah.

**Q: Bagaimana jika terlambat mengembalikan?**
A: Status akan otomatis berubah menjadi "Terlambat". Segera kembalikan dan bisa ada konsekuensi sesuai kebijakan institusi.

**Q: Bisa edit peminjaman yang sudah dikembalikan?**
A: Tidak, untuk integritas data. Hubungi admin jika ada kesalahan.

**Q: Bagaimana cara cetak laporan?**
A: Klik tombol "Cetak Laporan", lalu pilih "Save as PDF" di print dialog.

---

## Kontak Support

Jika mengalami kesulitan:
1. Baca panduan ini terlebih dahulu
2. Tanya administrator sistem
3. Report bug melalui sistem ticketing (jika ada)

---

**Selamat menggunakan Sistem Inventaris Peminjaman Barang!** 🎉
