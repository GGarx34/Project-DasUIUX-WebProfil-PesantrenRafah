<p align="center">
  <img src="https://raw.githubusercontent.com/GGarx34/Project-DasUIUX-WebProfil-PesantrenRafah/main/public/assets/logotext.webp" alt="Logo Pesantren Rafah" width="350" style="border-radius: 8px;">
</p>

<h1 align="center">
  Pondok Pesantren Rafah - Website CMS
</h1>

<p align="center">
  Website resmi <strong>Pondok Pesantren Rafah</strong> berbasis <strong>Content Management System (CMS)</strong> yang dibangun untuk mengelola konten, program, dan data internal pesantren secara dinamis, modern, dan efisien.
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel 12"></a>
  <a href="#"><img src="https://img.shields.io/badge/Livewire-v3-4d52c1?style=for-the-badge&logo=livewire" alt="Livewire"></a>
  <a href="#"><img src="https://img.shields.io/badge/TailwindCSS-v3-06B6D4?style=for-the-badge&logo=tailwindcss" alt="TailwindCSS"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-blue.svg?style=for-the-badge" alt="License"></a>
</p>

---

## 🛠️ Teknologi yang Digunakan

Proyek ini dibangun menggunakan tumpukan teknologi modern untuk memastikan performa, skalabilitas, dan kemudahan pengembangan.

-   **[Laravel 12](https://laravel.com)** – Framework PHP modern yang elegan untuk membangun backend yang kuat.
-   **[Livewire](https://livewire.laravel.com)** – Framework full-stack untuk membuat antarmuka dinamis dengan PHP saja.
-   **[TailwindCSS](https://tailwindcss.com)** – Kerangka kerja CSS utility-first untuk desain antarmuka yang cepat dan kustom.
-   **MySQL** – Sistem manajemen basis data relasional yang populer dan andal.
-   **Blade** – Mesin templating Laravel yang sederhana namun kuat.
-   **CMS-style Structure** – Arsitektur yang dirancang untuk memudahkan manajemen konten oleh admin.

## ✨ Fitur Utama

Website ini dilengkapi dengan berbagai fitur untuk memenuhi kebutuhan administrasi dan informasi pesantren.

-   ✅ **Autentikasi & Manajemen Peran**: Sistem login aman dengan level akses berbeda untuk setiap pengguna (admin, staf, dll.).
-   ✅ **Manajemen Program Pesantren**: CRUD (Create, Read, Update, Delete) untuk program unggulan seperti Tahfidz, Ekstrakurikuler, dan Kurikulum.
-   ✅ **CRUD Dinamis via Livewire**: Pengelolaan data satuan pendidikan, fasilitas, dan ekstrakurikuler secara real-time tanpa refresh halaman.
-   ✅ **Halaman Informasi Publik**: Halaman dinamis untuk Visi-Misi, Berita, Agenda Kegiatan, dan Galeri Foto/Video.
-   ✅ **Upload Gambar & File**: Fitur upload media yang terintegrasi dengan Livewire untuk kemudahan pengelolaan aset.
-   ✅ **UI Responsif dan Modern**: Tampilan yang dioptimalkan untuk semua perangkat (desktop, tablet, mobile) dengan animasi halus dari AOS.
-   ✅ **Multi-layout CMS**: Tiga tata letak utama: Panel Admin, Tampilan Website Publik, dan Halaman Formulir Pendaftaran.

## 🚀 Instalasi & Setup

Untuk menjalankan proyek ini secara lokal, ikuti langkah-langkah berikut:

1.  **Clone repositori ini:**
    ```bash
    git clone https://github.com/GGarx34/Project-DasUIUX-WebProfil-PesantrenRafah.git
    cd Project-DasUIUX-WebProfil-PesantrenRafah
    ```
2.  **Install dependensi:**
    ```bash
    composer install
    npm install
    ```
3.  **Salin file `.env`:**
    ```bash
    cp [example].env .env
    ```
4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```
5.  **Konfigurasi database Anda di file `.env` lalu jalankan migrasi:**
    ```bash
    php artisan migrate --seed
    ```
6.  **Jalankan server pengembangan:**
    ```bash
    php artisan serve
    ```

## 🤝 Kontribusi

Terima kasih telah mempertimbangkan untuk berkontribusi pada proyek ini! Kami sangat terbuka untuk kolaborasi.

