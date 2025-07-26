# Release Notes

## [Unreleased](https://github.com/laravel/laravel/compare/v1.0...main)

## [v1.0](https://github.com/laravel/laravel/compare/v12.0.7...v1.0) - 2025-07-26

<p align="center">
<img src="https://raw.githubusercontent.com/GGarx34/Project-DasUIUX-WebProfil-PesantrenRafah/main/public/assets/logotext.webp" alt="Logo Pesantren Rafah" width="350" style="border-radius: 8px;">
</p>
<h1 align="center">
Pondok Pesantren Rafah - Rilis Perdana
</h1>
<p align="center">
<a href="#"><img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel 12"></a>
<a href="#"><img src="https://img.shields.io/badge/Livewire-v3-4d52c1?style=for-the-badge&logo=livewire" alt="Livewire"></a>
<a href="#"><img src="https://img.shields.io/badge/TailwindCSS-v3-06B6D4?style=for-the-badge&logo=tailwindcss" alt="TailwindCSS"></a>
</p>
🧾 Ringkasan
Ini adalah rilis perdana aplikasi website unofficial Pondok Pesantren Rafah, sebuah platform manajemen internal berbasis web yang dibangun dengan Laravel, Livewire, dan TailwindCSS. Aplikasi ini dirancang untuk mempermudah pengelolaan data santri, program pendidikan, pendaftaran online, dan statistik kegiatan di lingkungan pesantren.
Rilis ini mencakup source code lengkap serta file siap deploy ke hosting (public_html), beserta database .sql dan file konfigurasi contoh (.env.example).
🎯 Fitur Utama

    🔐 Sistem Login: Dilengkapi dashboard admin yang komprehensif.
    
    📊 Statistik Siswa & Program: Meliputi Tahfidz, Ekstrakurikuler, dan Kurikulum Mu’adalah.
    
    📁 Manajemen Data Kurikulum: Mengelola Kurikulum Syar’i, Studi Kauni, dan Bahasa.
    
    📝 Pendaftaran Online: Formulir pendaftaran santri baru dengan dropdown wilayah dinamis.
    
    🎨 UI Modern & Responsif: Dibuat dengan TailwindCSS dan dipercantik dengan animasi AOS.
    
    📦 Siap Upload: Termasuk file public_html yang siap diunggah ke shared hosting.
    
⚙️ Teknologi yang Digunakan

    Laravel 12
    
    Livewire 3
    
    TailwindCSS 3
    
    AOS (Animate On Scroll)
    
    MySQL/MariaDB
    
    Composer & NPM
    
🗂️ Isi File

Berikut file yang disertakan dalam rilis ini:

    pesantren-rafah.rar – Source code lengkap + folder public_html.
    
    pesantren_rafah.sql – File database hasil ekspor (.sql).
    
    .env.example – Contoh konfigurasi environment.
    
    ⚠️ Catatan Penting:
    Jangan lupa untuk membuat file .env berdasarkan .env.example dan generate APP_KEY menggunakan php artisan key:generate. Jika tidak ingin membuat dari awal, Anda juga bisa menggunakan file [example].env, jangan lupa hapus ([example]).
    
🚀 Cara Menggunakan

    Ekstrak file pesantren-rafah.zip ke direktori proyek lokal Anda.
    
    Impor database dari pesantren_rafah.sql ke MySQL Anda.
    
    Rename file [example].env menjadi .env dan sesuaikan konfigurasi database.
    
    Jalankan perintah berikut di terminal Anda:
    
    composer install
    npm install && npm run build
    php artisan key:generate
    php artisan migrate --seed
    
    Jalankan server pengembangan:
    
    php artisan serve
    
🧑‍💻 Developer

    @Prayata27
    
    @GGarx34
    
🛠️ Status Proyek

Proyek ini masih terus dikembangkan dan terbuka untuk perbaikan atau penambahan fitur. Silakan buka tab Issues untuk melaporkan bug atau memberikan saran.

## [v12.0.7](https://github.com/laravel/laravel/compare/v12.0.6...v12.0.7) - 2025-04-15

* Add `composer run test` command by [@crynobone](https://github.com/crynobone) in https://github.com/laravel/laravel/pull/6598
* Partner Directory Changes in ReadME by [@joshcirre](https://github.com/joshcirre) in https://github.com/laravel/laravel/pull/6599

## [v12.0.6](https://github.com/laravel/laravel/compare/v12.0.5...v12.0.6) - 2025-04-08

**Full Changelog**: https://github.com/laravel/laravel/compare/v12.0.5...v12.0.6

## [v12.0.5](https://github.com/laravel/laravel/compare/v12.0.4...v12.0.5) - 2025-04-02

* [12.x] Update `config/mail.php` to match the latest core configuration by [@AhmedAlaa4611](https://github.com/AhmedAlaa4611) in https://github.com/laravel/laravel/pull/6594

## [v12.0.4](https://github.com/laravel/laravel/compare/v12.0.3...v12.0.4) - 2025-03-31

* Bump vite from 6.0.11 to 6.2.3 - Vulnerability patch by [@abdel-aouby](https://github.com/abdel-aouby) in https://github.com/laravel/laravel/pull/6586
* Bump vite from 6.2.3 to 6.2.4 by [@thinkverse](https://github.com/thinkverse) in https://github.com/laravel/laravel/pull/6590

## [v12.0.3](https://github.com/laravel/laravel/compare/v12.0.2...v12.0.3) - 2025-03-17

* Remove reverted change from CHANGELOG.md by [@AJenbo](https://github.com/AJenbo) in https://github.com/laravel/laravel/pull/6565
* Improves clarity in app.css file by [@AhmedAlaa4611](https://github.com/AhmedAlaa4611) in https://github.com/laravel/laravel/pull/6569
* [12.x] Refactor: Structural improvement for clarity by [@AhmedAlaa4611](https://github.com/AhmedAlaa4611) in https://github.com/laravel/laravel/pull/6574
* Bump axios from 1.7.9 to 1.8.2 - Vulnerability patch by [@abdel-aouby](https://github.com/abdel-aouby) in https://github.com/laravel/laravel/pull/6572
* [12.x] Remove Unnecessarily [@source](https://github.com/source) by [@AhmedAlaa4611](https://github.com/AhmedAlaa4611) in https://github.com/laravel/laravel/pull/6584

## [v12.0.2](https://github.com/laravel/laravel/compare/v12.0.1...v12.0.2) - 2025-03-04

* Make the github test action run out of the box independent of the choice of testing framework by [@ndeblauw](https://github.com/ndeblauw) in https://github.com/laravel/laravel/pull/6555

## [v12.0.1](https://github.com/laravel/laravel/compare/v12.0.0...v12.0.1) - 2025-02-24

* [12.x] prefer stable stability by [@pataar](https://github.com/pataar) in https://github.com/laravel/laravel/pull/6548

## [v12.0.0 (2025-??-??)](https://github.com/laravel/laravel/compare/v11.0.2...v12.0.0)

Laravel 12 includes a variety of changes to the application skeleton. Please consult the diff to see what's new.
