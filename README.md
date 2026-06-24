# Cafe Rank — Decision Support System (TOPSIS)

Sistem pendukung keputusan berbasis web untuk menentukan rekomendasi cafe terbaik menggunakan metode **TOPSIS (Technique for Order Preference by Similarity to Ideal Solution)**.

Sistem ini membantu proses penilaian beberapa cafe berdasarkan kriteria tertentu sehingga menghasilkan ranking yang objektif dan terukur.

---

## Fitur Aplikasi

- Login multi role (Admin, Mahasiswa, Owner)
- Manajemen data cafe (CRUD)
- Manajemen kriteria penilaian
- Perhitungan TOPSIS otomatis
- Ranking cafe berdasarkan hasil perhitungan
- Export hasil ranking ke PDF
- Dashboard berbeda sesuai role
- UI responsive (Bootstrap 5)

---

## 👥 Role Pengguna

### 👨‍💼 Admin
- Mengelola data cafe
- Mengelola kriteria
- Menjalankan perhitungan TOPSIS
- Melihat hasil ranking

### 🎓 Mahasiswa
- Melihat daftar cafe
- Melihat detail cafe
- Melihat ranking hasil TOPSIS

### 🧑‍💼 Owner
- Monitoring hasil ranking cafe
- Melihat posisi cafe

---

## 🖼️ Tampilan Aplikasi

### 🔐 Login
![Login](public/screenshots/login.png)

### 📊 Dashboard Admin
![Dashboard Admin](public/screenshots/admin-dashboard.png)

### ☕ Data Cafe
![Data Cafe](public/screenshots/admin-datacafe.png)

### ➕ Tambah Cafe
![Tambah Cafe](public/screenshots/admin-tambahcafe.png)

### 📌 Data Kriteria
![Data Kriteria](public/screenshots/admin-datakriteria.png)

### ➕ Tambah Kriteria
![Tambah Kriteria](public/screenshots/admin-tambahkriteria.png)

### 🧠 Proses TOPSIS
![Hitung TOPSIS](public/screenshots/admin-hitungtopsis.png)

### 🏆 Hasil Ranking
![Ranking](public/screenshots/admin-ranking.png)

### 📄 Export PDF
![Export PDF](public/screenshots/admin-exportpdf.png)

### 📈 Hasil Perhitungan
![Hasil Perhitungan](public/screenshots/admin-cafeberhasil.png)

### 🧾 Hasil Kriteria (Berhasil)
![Kriteria Hasil](public/screenshots/admin-kriteriaberhasil.png)

---

### 🎓 Dashboard Mahasiswa
![Mahasiswa Dashboard](public/screenshots/mahasiswa-dashboard.png)

### ☕ Detail Cafe
![Detail Cafe](public/screenshots/mahasiswa-detailcafe.png)

### 🏆 Ranking Mahasiswa
![Ranking Mahasiswa](public/screenshots/mahasiswa-ranking.png)

---

### 🧑‍💼 Dashboard Owner
![Owner Dashboard](public/screenshots/owner-dashboard.png)

### 📊 Owner Ranking
![Owner Ranking](public/screenshots/owner-ranking.png)

---

## 🛠️ Teknologi

- Laravel 10
- MySQL
- Bootstrap 5
- DataTables
- SweetAlert2
- DomPDF

---

## 🧠 Metode TOPSIS

Langkah perhitungan:

1. Normalisasi matriks keputusan
2. Pembobotan kriteria
3. Menentukan solusi ideal positif & negatif
4. Menghitung jarak setiap alternatif
5. Menghitung nilai preferensi
6. Menentukan ranking terbaik

---
