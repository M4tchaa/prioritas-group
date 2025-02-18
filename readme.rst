# Prioritas - Manajemen Produk

Aplikasi ini adalah sistem manajemen produk yang dibangun menggunakan framework **CodeIgniter 3 (CI3)**. Aplikasi ini memungkinkan pengguna untuk menambah, mengedit, dan menghapus produk, serta mengelola informasi terkait produk seperti harga dan stok.

## **Fitur Aplikasi**
- Menampilkan daftar produk dengan opsi pencarian dan pengurutan.
- Menambahkan produk baru dengan validasi harga dan stok.
- Mengedit produk dengan pembaruan harga, stok, dan status.
- Menghapus produk dari daftar.
- Menggunakan **SweetAlert** untuk menampilkan notifikasi sukses dan error.
- Validasi untuk memastikan stok dan harga lebih besar dari 0.

## **Framework/Dependency** 
- **CodeIgniter 3**
- **MySQL** (menggunakan PDO)
- **Bootstrap 5**
- **FontAwesome**
- **SweetAlert**

## **Server Requirements**
- PHP versi 5.6 atau lebih baru sangat disarankan. Aplikasi ini juga seharusnya dapat berjalan pada PHP 5.3.7, namun kami sangat menyarankan untuk tidak menggunakan versi PHP lama karena potensi masalah keamanan dan kinerja.

## **Installation**

1. **Clone atau Download Repository**:
   - Anda dapat meng-clone repository ini atau mengunduhnya dalam format ZIP.
   - Jika meng-clone, jalankan perintah berikut di terminal Anda:
     ```bash
     git clone https://github.com/M4tchaa/prioritas-group.git
     ```
   
2. **Instalasi Dependency**:
   - Pastikan Anda telah menginstal PHP dan database seperti MySQL atau MariaDB di sistem Anda.
   - Atur file konfigurasi database Anda di `application/config/database.php`.

3. **Mengonfigurasi Aplikasi**:
   - Sesuaikan pengaturan di file `application/config/config.php` sesuai dengan kebutuhan aplikasi Anda.

4. **Buka Aplikasi di Browser**:
   - Jalankan aplikasi di server lokal Anda (misalnya menggunakan **XAMPP**, **WAMP**, atau **Laragon**).
   - Akses aplikasi melalui browser di `http://localhost/nama-aplikasi`.

## **License**

Aplikasi ini menggunakan lisensi yang sesuai dengan lisensi **CodeIgniter 3**. Anda dapat membaca perjanjian lisensinya [di sini](https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst).

## **Resources**

- [User Guide CodeIgniter](https://codeigniter.com/docs)
- [Guide Contributing](https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md)
- [Forum Komunitas CodeIgniter](http://forum.codeigniter.com/)
- [Wiki Komunitas CodeIgniter](https://github.com/bcit-ci/CodeIgniter/wiki)

Untuk melaporkan masalah keamanan, kirimkan ke **security@codeigniter.com** atau melalui [HackerOne](https://hackerone.com/codeigniter).
