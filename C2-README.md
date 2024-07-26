## Readme - Sistem Informasi Inventaris Laboratorium (SIIL) - Universitas Udayana
# Deskripsi
Sistem Informasi Inventaris Laboratorium (SIIL) adalah sebuah aplikasi web yang dirancang untuk membantu dalam pengelolaan inventaris peralatan dan barang di laboratorium Universitas Udayana. SIIL berfungsi sebagai sistem terpusat untuk mencatat, melacak, dan mengelola seluruh peralatan dan barang yang dimiliki oleh laboratorium. Terintegrasi dengan sistem manajemen laboratorium yang sudah ada, SIIL memungkinkan data inventaris dapat diakses dan diperbarui secara real-time oleh pengguna yang berwenang.

## Fitur Utama
1. **Halaman Login (Masuk)**
Fungsi: Memungkinkan pengguna mengakses sistem dengan memasukkan username atau email dan password.
Elemen Utama:
Formulir login dengan kolom “Username or Email” dan “Password”.
Tombol “Masuk” untuk mengirimkan data dan memverifikasi identitas pengguna.
Pesan kesalahan jika kredensial salah.

2. **Halaman Sign Up (Daftar)**
Fungsi: Memungkinkan pengguna baru membuat akun dengan memasukkan informasi pribadi.
Elemen Utama:
Kolom input untuk “Nama”, “Username”, “Email”, “Telepon”, “Password”, dan “Konfirmasi Password”.
Tombol “Daftar” untuk mengirimkan data dan menyelesaikan proses pendaftaran.

3. **Halaman Beranda**
Fungsi: Menyambut pengguna setelah login dan memberikan akses ke berbagai fitur pengelolaan laboratorium.
Elemen Utama:
Informasi tentang keunggulan laboratorium.
Fitur untuk melihat dan mengelola daftar peralatan yang akan dipinjam.
Navigasi mudah ke berbagai bagian penting dari sistem.

4. **Fitur Rekomendasi AI**
Fungsi: Memberikan rekomendasi alat dan bahan yang diperlukan berdasarkan jenis praktikum yang dimasukkan oleh pengguna.
Elemen Utama:
Kolom input untuk informasi praktikum.
Rekomendasi alat dan bahan berdasarkan analisis machine learning.
Integrasi dengan fitur pengelolaan laboratorium lainnya untuk menambah peralatan ke dalam cart.

5. **Halaman Fakultas**
Fungsi: Menampilkan informasi rinci tentang fasilitas laboratorium di setiap fakultas.
Elemen Utama:
Deskripsi fasilitas laboratorium di setiap fakultas.
Tombol “Selengkapnya” untuk melihat daftar peralatan dan bahan yang tersedia.
Cart untuk memantau dan mengelola item yang akan dipinjam.

6. **Halaman Barang**
Fungsi: Memungkinkan pengguna melihat dan meminjam peralatan serta bahan yang tersedia di laboratorium.
Elemen Utama:
Informasi tentang jumlah dan jenis alat serta bahan yang dapat dipinjam.
Daftar alat dengan tombol “Pinjam” untuk memudahkan proses peminjaman.
Cart untuk melihat dan mengelola alat yang dipinjam.

7. **Halaman Peminjaman**
Fungsi: Memfasilitasi proses peminjaman alat dan bahan.
Elemen Utama:
Formulir untuk mengisi detail peminjam dan daftar alat yang akan dipinjam.
Kolom untuk tanggal peminjaman dan tanggal rencana pengembalian.
Tombol "Simpan" untuk memproses dan menyimpan data peminjaman.

8. **Hasil Keluaran**
Fungsi: Menyajikan laporan peminjaman dan daftar bahan serta alat yang tersedia.
Elemen Utama:
Laporan “Daftar Bahan” dan “Daftar Alat” dengan informasi lengkap tentang stok dan kondisi.
Struktur laporan yang rapi dan informatif untuk manajemen dan pemantauan inventaris laboratorium.

## Clone repository:

bash
Copy code
git clone https://github.com/GustuRyan/Sistem-Inventaris-Lab.git
'cd Sistem-Inventaris-Lab'

## Install dependencies:
# Backend:

bash
Copy code
'composer install'

# Frontend:

bash
Copy code
'npm install'

## Setup environment:
Salin file .env.example menjadi .env dan sesuaikan konfigurasi database dan lainnya.

## Migrasi database:
bash
Copy code
'php artisan migrate'

## Seeding database:
bash
Copy code
'php artisan db:seed'

## Jalankan server:
bash
Copy code
'php artisan serve'
'npm run dev'

## Penggunaan

**Login:** Pengguna yang berwenang dapat masuk ke dalam sistem menggunakan kredensial yang telah diberikan.

**Navigasi Beranda:** Akses fitur-fitur pengelolaan laboratorium.

**Rekomendasi AI:** Dapatkan rekomendasi alat dan bahan untuk praktikum.

**Manajemen Inventaris:**
Tambah peralatan atau barang baru ke dalam inventaris.
Ubah informasi inventaris yang ada.
Hapus data inventaris yang tidak diperlukan lagi.

**Pelacakan:** Lacak status dan lokasi peralatan dan barang inventaris.
Sistem Rekomendasi: Masukkan jenis penelitian dan dapatkan rekomendasi alat dan bahan yang diperlukan.

--------------------------------------------------------------------------------

Tujuan dari README adalah memudahkan instalasi dan penggunaan sistem informasi inventaris laboratorium ini. Jika ada yang ingin ditanyakan dapat menghubungi kontak person berikut melalui email: gusturyan03@gmail.com