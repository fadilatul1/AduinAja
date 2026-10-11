# 🌿 AduinAja — Sistem Pengaduan Fasilitas Kampus

**AduinAja** adalah aplikasi berbasis web yang dirancang untuk memudahkan mahasiswa melaporkan kerusakan atau permasalahan fasilitas kampus secara terstruktur. Laporan dapat dikelola oleh administrator sehingga proses penanganan lebih terorganisasi dan transparan.

## 🎯 Latar Belakang

Permasalahan fasilitas kampus seperti kerusakan kursi, ruang kelas, dan fasilitas umum perlu disampaikan melalui mekanisme yang mudah diakses. AduinAja dikembangkan sebagai solusi digital untuk membantu mahasiswa menyampaikan pengaduan dan memudahkan administrator memantau tindak lanjut laporan.

## ✨ Fitur Utama

### 👩‍🎓 Mahasiswa

* Registrasi dan login akun.
* Membuat laporan kerusakan fasilitas kampus.
* Mengisi kategori, lokasi, deskripsi, dan foto pendukung.
* Melihat daftar dan status laporan milik sendiri.
* Menerima notifikasi perubahan status laporan.
* Mengelola laporan sesuai hak akses pengguna.

### 🛠️ Administrator

* Melihat ringkasan statistik pengaduan.
* Melihat dan mencari laporan yang masuk.
* Memfilter laporan berdasarkan status dan prioritas.
* Mengubah status dan prioritas laporan.
* Memberikan alasan penolakan laporan bila diperlukan.

### ⚙️ Fitur Sistem

* Autentikasi pengguna.
* Pembagian hak akses mahasiswa dan administrator.
* Penentuan prioritas laporan berdasarkan kata kunci.
* Penyimpanan data laporan menggunakan database.
* Antarmuka responsif dengan desain ramah pengguna.

## 🧰 Teknologi

* **Backend:** PHP dan Laravel 12
* **Frontend:** Blade, Tailwind CSS, JavaScript
* **Database:** MySQL
* **Build tools:** Vite dan npm
* **Version control:** Git dan GitHub

## 🚀 Instalasi dan Menjalankan Aplikasi

### Prasyarat

Pastikan PHP, Composer, Node.js, npm, dan MySQL sudah terpasang.

### 1. Clone repository

```bash
git clone https://github.com/fadilatul1/AduinAja.git
cd AduinAja
```

### 2. Instal dependensi

```bash
composer install
npm install
```

### 3. Siapkan konfigurasi

```bash
copy .env.example .env
php artisan key:generate
```

Buka file `.env`, lalu sesuaikan konfigurasi database MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aduinaja_db
DB_USERNAME=root
DB_PASSWORD=
```

Buat database `aduinaja_db` melalui phpMyAdmin atau MySQL. Sesuaikan username dan password dengan konfigurasi lokal masing-masing.

### 4. Jalankan migrasi database

```bash
php artisan migrate
```

### 5. Jalankan aplikasi

Buka dua terminal pada folder proyek.

Terminal pertama:

```bash
php artisan serve
```

Terminal kedua:

```bash
npm run dev
```

Buka alamat aplikasi lokal yang ditampilkan oleh Laravel, biasanya `http://127.0.0.1:8000`.

## 🔐 Catatan Keamanan

* Jangan mengunggah file `.env` ke repository publik.
* Gunakan konfigurasi database sendiri pada lingkungan lokal.
* Akun administrator harus diberikan hak akses melalui mekanisme yang aman.
* Jangan menggunakan konfigurasi pengembangan sebagai konfigurasi produksi tanpa penyesuaian.

## 📌 Status Proyek

AduinAja dikembangkan sebagai proyek pembelajaran berbasis Project-Based Learning (PjBL), dengan fokus pada pengembangan aplikasi web, pengelolaan database, autentikasi, dan manajemen pengaduan fasilitas kampus.

## 👩‍💻 Repository

[GitHub — fadilatul1/AduinAja](https://github.com/fadilatul1/AduinAja)
