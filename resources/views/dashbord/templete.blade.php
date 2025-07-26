<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin - Responsive</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite('resources/css/app.css')
  <!-- DataTables CSS -->


  <script src="//unpkg.com/alpinejs" defer></script>


</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">

    <!-- Sidebar -->
 <aside class="hidden md:flex flex-col   bg-gray-800 text-white">

      <div class="px-6 py-4 text-lg font-bold border-b border-gray-700">
        ADMINISTRATOR
      </div>
      <nav class="flex-1 px-4 py-4 space-y-2">
    <a href="/admin-page" class="block px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
    <a href="/admin-siswa" class="block px-4 py-2 rounded hover:bg-gray-700">Manajemen Calon Siswa</a>
    <a href="/berita-admin" class="block px-4 py-2 rounded hover:bg-gray-700">Manajemen Berita</a>
    <a href="/fasilitas-admin" class="block px-4 py-2 rounded hover:bg-gray-700">Manajemen Fasilitas</a>

    <!-- Dropdown Manajemen Program -->
    <div x-data="{ open: false }" class="space-y-1">
        <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-2 rounded hover:bg-gray-700 text-left">
            <span>Manajemen Program</span>
            <svg :class="{ 'rotate-90': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        <div x-show="open" class="pl-4 space-y-1" x-cloak>
            <a href="/program/spm-admin" class="block px-4 py-2 rounded hover:bg-gray-700 text-sm">Satuan Mu’adalah</a>
            <a href="/program/extra-admin" class="block px-4 py-2 rounded hover:bg-gray-700 text-sm">Extrakurikuler</a>
        </div>
    </div>

    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Manajemen Profil Produk</a>
</nav>

    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Topbar -->
      <header class="bg-gray-200 flex items-center justify-between px-6 py-4 border-b border-gray-300">
        <div class="flex items-center space-x-4">
          <!-- Hamburger button -->
          <button class="md:hidden text-gray-700" id="menuButton">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
  
        </div>

     <label for="my_modal_6" class="btn text-white bg-red-500">Keluar</label>

<input type="checkbox" id="my_modal_6" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box">
     <p class="py-4">Apakah anda yakin ingin keluar?</p>
    <div class="modal-action">
      <label for="my_modal_6" class="btn">Tutup</label>
     <a href="#" onclick="event.preventDefault(); window.location='/login-admin';" class="btn bg-neutral text-white">Keluar</a>

    </div>
  </div>
</div>
      </header>

      <!-- Mobile sidebar -->
      <div id="mobileMenu" class="md:hidden hidden bg-gray-800 text-white px-6 py-4 space-y-2">
        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Manajemen Konten</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Galeri dan Siswa</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Manajemen Registrasi</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Manajemen Profil Produk</a>
      </div>

      <!-- Page Content -->
      <main class="flex-1 p-6">
        @yield('isi')
      </main>
    </div>
  </div>

  <!-- Toggle mobile menu -->
  <script>
    const btn = document.getElementById('menuButton');
    const menu = document.getElementById('mobileMenu');
    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>


</body>

</html>
