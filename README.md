# 📚 Management Perpustakaan

Sistem Management Perpustakaan Sekolah berbasis Laravel yang digunakan untuk membantu pengelolaan data perpustakaan secara sederhana, terstruktur, dan mudah digunakan.

## ✨ Tentang Project

Management Perpustakaan merupakan aplikasi web untuk mengelola data perpustakaan sekolah.

Aplikasi ini dibuat menggunakan Laravel dengan konsep MVC (Model, View, Controller) serta database MySQL.

Sistem menyediakan halaman login dan dashboard sebagai pusat pengelolaan data perpustakaan.

## 🎯 Tujuan

Project ini dibuat untuk:

- Mempermudah pengelolaan data perpustakaan sekolah.
- Mengelola data buku secara terstruktur.
- Mengelola data siswa.
- Mengelola data kelas.
- Mengelola data author.
- Mengelola data kategori buku.
- Menerapkan konsep CRUD pada Laravel.
- Menerapkan konsep MVC dalam pengembangan aplikasi web.

## 🚀 Fitur

### 🔐 Authentication

- Login
- Register
- Logout
- Session authentication

### 📊 Dashboard

Dashboard menampilkan informasi:

- Total Buku
- Total Siswa
- Total Author
- Total Kategori
- Total Kelas
- Daftar buku terbaru
- Menu akses cepat untuk menambahkan data

### 👨‍🎓 Siswa

Pengelolaan data siswa dengan fitur:

- Menampilkan data siswa
- Menambahkan siswa
- Mengedit siswa
- Menghapus siswa

Data siswa terdiri dari:

- Nama
- NIS
- Kelas

### 🏫 Kelas

Pengelolaan data kelas dengan fitur:

- Menampilkan data kelas
- Menambahkan kelas
- Mengedit kelas
- Menghapus kelas

Data kelas terdiri dari:

- Nama Kelas
- Tingkat

### ✍️ Author

Pengelolaan data author dengan fitur:

- Menampilkan data author
- Menambahkan author
- Mengedit author
- Menghapus author

### 🏷️ Kategori

Pengelolaan kategori buku dengan fitur:

- Menampilkan data kategori
- Menambahkan kategori
- Mengedit kategori
- Menghapus kategori

### 📖 Buku

Pengelolaan data buku dengan fitur:

- Menampilkan data buku
- Menambahkan buku
- Mengedit buku
- Menghapus buku

Data buku terdiri dari:

- Judul Buku
- Author
- Kategori
- Stock

## 🛠️ Teknologi yang Digunakan

- **Laravel**
- **PHP**
- **MySQL**
- **Blade Template**
- **HTML**
- **CSS**
- **JavaScript**
- **Font Awesome**

## 🗂️ Struktur Data

Aplikasi memiliki beberapa tabel utama:

```text
users
kelas
siswas
authors
kategoris
bukus