<!doctype html>
<html class="h-full">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
<!-- AOS Library -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<title>@yield('title', 'Pesantren Rafah')</title>
<link rel="icon" type="image/png" href="{{ asset('assets/logo2.jpg') }}">
  </head>
  <body class="flex flex-col min-h-screen">
@php
function isActiveNav($path) {
    return request()->is($path) ? 'active' : '';
}
function isParentActive($patterns = []) {
    foreach ($patterns as $pattern) {
        if (request()->is($pattern)) {
            return 'active';
        }
    }
    return '';
}
@endphp

<style>
.nav-link {
  position: relative;
  font-weight: 700;
  padding-bottom: 12px;
  transition: all 0.3s;
}
.nav-link::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 0%;
  height: 3px;
  background-color: #A9A9A9;
  transition: width 0.3s;
}
.nav-link:hover::after,
.nav-link.active::after {
  width: 100%;
}
</style>

<div class="navbar sticky top-0 shadow-xl z-50 bg-[#F8F6F0] max-h-[80px]">
  <div class="container mx-auto px-4 flex justify-between items-center">

    <!-- Navbar Start -->
    <div class="navbar-start flex items-center">
      <!-- Hamburger (Mobile) -->
      <div class="dropdown mr-4">
        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>

        <!-- Dropdown Mobile -->
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="/home-page">Beranda</a></li>
          <li><a href="/berita-page">Berita</a></li>
          <li><a href="/galeri-page">Galeri</a></li>
          <li>
            <details>
              <summary>Program</summary>
              <ul class="p-2">
                <li><a href="/program/kurikulum">Kurikulum Pendidikan</a></li>
                <li><a href="/program/spm">Satuan Mu’adalah</a></li>
                <li><a href="/program/extra">Ekstrakurikuler</a></li>
                <li><a href="/program/tahfidz">Tahfidzul Qur'an</a></li>
                <li><a href="/program/jadwal">Jadwal Kegiatan</a></li>
                <li><a href="/program/sistem">Sistem Asrama</a></li>
              </ul>
            </details>
          </li>
          <li><a href="/tentang">Profil</a></li>
          <li><a href="/pendaftaran">Pendaftaran</a></li>
          <li><a href="/fasilitas-page">Fasilitas</a></li>
        </ul>
      </div>

      <!-- Logo -->
      <img src="{{ asset('assets/logo.png') }}" class="w-[280px] max-h-[170px]" alt="Logo">
    </div>

    <!-- Navbar End -->
    <div class="navbar-end hidden lg:flex">
      <ul class="menu menu-horizontal px-1 space-x-6">
        <li>
          <a href="/home-page" class="nav-link {{ isActiveNav('home-page') }}">Beranda</a>
        </li>
        <li>
          <a href="/tentang" class="nav-link {{ isActiveNav('tentang') }}">Profil</a>
        </li>
        <li>
          <a href="/pendaftaran" class="nav-link {{ isActiveNav('pendaftaran') }}">Pendaftaran</a>

        </li>
        <li>
          <a href="/berita-page" class="nav-link {{ isActiveNav('berita-page') }}">Berita</a>
        </li>
        <li>
          <a href="/galeri-page" class="nav-link {{ isActiveNav('galeri-page') }}">Galeri</a>
        </li>

        <!-- Dropdown Program Aktif -->
        @php $isProgramActive = request()->is('program/*'); @endphp
        <li x-data="{ open: {{ $isProgramActive ? 'true' : 'false' }} }" class="relative">
          <button @click="open = !open"
                  class="nav-link flex items-center gap-1 {{ $isProgramActive ? 'active' : '' }}">
            Program
            <svg :class="{ 'rotate-180': open }"
                 class="w-4 h-4 transform transition-transform duration-300"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <!-- Dropdown Items -->
          <ul x-show="open"
              @click.outside="open = false"
              x-transition
              class="absolute left-0 mt-3 top-full z-50 bg-white shadow-lg rounded w-56 text-sm text-gray-700"
              style="display: none;">
            <li>
              <a href="/program/kurikulum" class="block px-4 py-2 hover:bg-gray-100">Kurikulum Pendidikan</a>
            </li>
            <li>
              <a href="/program/spm" class="block px-4 py-2 hover:bg-gray-100">Satuan Mu’adalah</a>
            </li>
            <li>
              <a href="/program/extra" class="block px-4 py-2 hover:bg-gray-100">Ekstrakurikuler</a>
            </li>
            <li>
              <a href="/program/tahfidz" class="block px-4 py-2 hover:bg-gray-100">Tahfidzul Qur'an</a>
            </li>
              <li><a class="block px-4 py-2 hover:bg-gray-100" href="/program/jadwal">Jadwal Kegiatan</a></li>
              <li><a class="block px-4 py-2 hover:bg-gray-100" href="/program/sistem">Sistem Asrama</a></li>
          </ul>
        </li>

        <li>
          <a href="/fasilitas-page" class="nav-link {{ isActiveNav('fasilitas-page') }}">Fasilitas</a>
        </li>
      </ul>
    </div>

  </div>
</div>

<!-- MAIN CONTENT -->
<main class="flex-grow">
  @yield('konten')
</main>

<!-- FOOTER -->
<footer class="w-full relative py-6 bg-[#333] text-white">
  <!-- Tombol Direct WA pojok kanan atas -->
  <div class="absolute top-0 right-4 z-10">
    <div class="bg-green-300 px-6 py-1 rounded flex items-center gap-2 shadow">
      <span class="text-xs font-bold text-black">DIRECT BY:</span>
      <img src="{{ asset('assets/VION.png') }}" alt="WA" class="w-10 h-10" />
    </div>
  </div>

  <!-- Konten Footer -->
  <div class="w-full mt-10 px-4">
    <div class="flex flex-wrap gap-12 items-start pl-4 md:pl-8">

      <!-- Alamat + Google Maps -->
      <div class="flex-1 min-w-[280px]">
        <h3 class="font-bold text-base md:text-lg mb-2">ALAMAT</h3>
        <p class="text-sm md:text-base font-semibold mb-1">Kampung Sukajadi</p>
        <p class="text-sm md:text-base font-semibold mb-1">Desa Mekarsari, Kec. Rancabungur</p>
        <p class="text-sm md:text-base font-semibold mb-1">Kab. Bogor, 16310, Jawa Barat</p>

        <!-- Google Maps Responsive -->
        <div class="mt-4 w-full max-w-md rounded-lg overflow-hidden">
          <div class="relative pb-[56.25%] h-0">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3964.075033065533!2d106.693711!3d-6.512187!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69dce158d02c81%3A0x65006f380e33cdcc!2sPondok%20Pesantren%20Rafah!5e0!3m2!1sen!2sus!4v1751214860593!5m2!1sen!2sus"
              class="absolute top-0 left-0 w-full h-full border-0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>

      <!-- Kontak + Tautan Cepat -->
      <div class="flex-1 min-w-[220px] space-y-8">

        <!-- Kontak -->
        <div>
          <h3 class="font-bold text-base md:text-lg mb-2">KONTAK</h3>
          <div class="flex gap-3 flex-wrap">
            <a href="https://www.instagram.com/pesantrenrafah/?hl=en" title="Instagram">
              <img src="https://img.icons8.com/?size=100&id=Xy10Jcu1L2Su&format=png&color=000000" class="hover:translate-y-[-5px] w-12 h-12 bg-white p-1 rounded" alt="IG" />
            </a>
            <a href="https://web.facebook.com/pondokpesantren.rafah/?_rdc=1&_rdr#" title="Facebook">
              <img src="https://img.icons8.com/?size=100&id=13912&format=png&color=000000" class="hover:translate-y-[-5px] w-12 h-12 bg-white p-1 rounded" alt="FB" />
            </a>
            <a href="https://www.youtube.com/@rafahtv5759" title="YouTube">
              <img src="https://img.icons8.com/?size=100&id=19318&format=png&color=000000" class="hover:translate-y-[-5px] w-12 h-12 bg-white p-1 rounded" alt="YT" />
            </a>
            <a href="https://mail.google.com/mail/?view=cm&to=pesantrenrafah@gmail.com" title="Email">
              <img src="https://img.icons8.com/?size=100&id=X0mEIh0RyDdL&format=png&color=000000" class="hover:translate-y-[-5px] w-12 h-12 bg-white p-1 rounded" alt="Email" />
            </a>
            <a href="https://wa.me/+6282217273477" title="WhatsApp">
              <img src="https://img.icons8.com/?size=100&id=16713&format=png&color=000000" class="hover:translate-y-[-5px] w-12 h-12 bg-white p-1 rounded" alt="WA" />
            </a>
          </div>
        </div>

        <!-- Tautan Cepat -->
        <div>
          <h3 class="font-bold text-base md:text-lg mb-2 mt-0 md:mt-[100px]">TAUTAN CEPAT</h3>
          <ul class="space-y-1">
            <li><a href="/tentang" class="hover:underline text-sm md:text-base font-semibold">Tentang Kami</a></li>
            <li><a href="/pendaftaran" class="hover:underline text-sm md:text-base font-semibold">Pendaftaran</a></li>
            <li><a href="/galeri-page" class="hover:underline text-sm md:text-base font-semibold">Galeri</a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <!-- Copyright -->
  <div class="mt-8 border-t border-gray-600 pt-4">
    <p class="text-center text-xs md:text-sm font-semibold text-gray-300">
      © 2025 Pondok Pesantren Rafah. All rights reserved.
    </p>
  </div>
</footer>



<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1100,      // durasi animasi (ms)
    once: false,        // false = animasi bisa muncul berulang
    mirror: true        // true = animasi juga aktif saat scroll ke atas
  });
</script>



</body>

</html>
