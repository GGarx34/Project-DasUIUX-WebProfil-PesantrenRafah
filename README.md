<p align="center">
  <img src="https://raw.githubusercontent.com/GGarx34/Project-DasUIUX-WebProfil-PesantrenRafah/main/public/assets/logotext.webp" alt="Logo Pesantren Rafah" width="350" style="border-radius: 8px;">
</p>

<h1 align="center">
  Pondok Pesantren Rafah - Website CMS
</h1>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel 12"></a>
  <a href="#"><img src="https://img.shields.io/badge/Livewire-v3-4d52c1?style=for-the-badge&logo=livewire" alt="Livewire"></a>
  <a href="#"><img src="https://img.shields.io/badge/TailwindCSS-v3-06B6D4?style=for-the-badge&logo=tailwindcss" alt="TailwindCSS"></a>
</p>

---

### 🧾 Ringkasan

Ini adalah aplikasi website *unofficial* **Pondok Pesantren Rafah**, sebuah platform manajemen internal berbasis **Content Management System (CMS)**. Dibangun dengan Laravel, Livewire, dan TailwindCSS, aplikasi ini dirancang untuk mempermudah pengelolaan data santri, program pendidikan, pendaftaran online, dan statistik kegiatan di lingkungan pesantren.

### ✨ Fitur Utama

-   ✅ **Autentikasi & Manajemen Peran**: Sistem login aman dengan level akses berbeda untuk setiap pengguna.
-   ✅ **Manajemen Program Pesantren**: CRUD untuk program unggulan seperti Tahfidz, Ekstrakurikuler, dan Kurikulum.
-   ✅ **CRUD Dinamis via Livewire**: Pengelolaan data internal secara *real-time* tanpa *refresh* halaman.
-   ✅ **Halaman Informasi Publik**: Halaman dinamis untuk Visi-Misi, Berita, Agenda, dan Galeri.
-   ✅ **Upload Gambar & File**: Fitur upload media yang terintegrasi dengan Livewire.
-   ✅ **UI Responsif dan Modern**: Tampilan yang dioptimalkan untuk semua perangkat dengan animasi dari AOS.
-   ✅ **Multi-layout CMS**: Tiga tata letak utama: Panel Admin, Website Publik, dan Form Pendaftaran.

### ⚙️ Teknologi yang Digunakan

-   [**Laravel 12**](https://laravel.com) – Framework PHP modern yang elegan untuk membangun backend yang kuat.
-   [**Livewire 3**](https://livewire.laravel.com) – Framework full-stack untuk membuat antarmuka dinamis dengan PHP saja.
-   [**TailwindCSS 3**](https://tailwindcss.com) – Kerangka kerja CSS utility-first untuk desain antarmuka yang cepat.
-   **AOS (Animate On Scroll)** – Library untuk animasi saat scroll.
-   **MySQL/MariaDB** – Sistem manajemen basis data relasional.
-   **Composer & NPM** – Manajer dependensi untuk PHP dan JavaScript.

### 🚀 Instalasi & Setup

Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

1.  **Clone repositori ini:**
    ```bash
    git clone [https://github.com/GGarx34/Project-DasUIUX-WebProfil-PesantrenRafah.git](https://github.com/GGarx34/Project-DasUIUX-WebProfil-PesantrenRafah.git)
    cd Project-DasUIUX-WebProfil-PesantrenRafah
    ```

2.  **Install dependensi:**
    ```bash
    composer install
    npm install
    ```

3.  **Siapkan file `.env`:**
    Ganti nama file `[example].env` menjadi `.env` lalu sesuaikan konfigurasi database Anda.

4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Jalankan migrasi dan seeder database:**
    ```bash
    php artisan migrate --seed
    ```

6.  **Jalankan server pengembangan:**
    ```bash
    php artisan serve
    ```

### 🤝 Kontribusi

Terima kasih telah mempertimbangkan untuk berkontribusi pada proyek ini! Kami sangat terbuka untuk kolaborasi.

### 🧑‍💻 Developer

-   [**@Prayata27**](https://github.com/Prayata27)
-   [**@GGarx34**](https://github.com/GGarx34)

### 🛠️ Status Proyek

Proyek ini masih terus dikembangkan dan terbuka untuk perbaikan atau penambahan fitur. Silakan buka tab **Issues** untuk melaporkan *bug* atau memberikan saran.
