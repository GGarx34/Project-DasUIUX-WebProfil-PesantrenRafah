@extends('templete.navbar')
@section('title', 'BERITA | Pondok Pesantren Rafah')
@section('konten')
<!-- SECTION BERITA -->
<section class="p-4 my-5">
  <div class="text-center mb-6">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1 mb-3">
      BERITA
    </h2>

    <!-- FORM FILTER BULAN & TAHUN -->
   <form method="GET" action="{{ route('berita.index') }}" class="mt-4 flex flex-wrap justify-center items-center gap-2">

    <!-- PILIH BULAN -->
    <select name="bulan" class="border rounded px-4 py-2 text-sm">
        <option value="">Pilih Bulan</option>
        @foreach ([ 
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember' 
        ] as $key => $bulan)
            <option value="{{ $key }}" {{ request('bulan') == $key ? 'selected' : '' }}>{{ $bulan }}</option>
        @endforeach
    </select>

    <!-- PILIH TAHUN -->
    <select name="tahun" class="border rounded px-4 py-2 text-sm">
        <option value="">Pilih Tahun</option>
        @for ($y = now()->year; $y >= 2020; $y--)
            <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>{{ $y }}</option>
        @endfor
    </select>

    <!-- TOMBOL FILTER -->
    <button type="submit" class="bg-green-600 text-white px-3 py-2 rounded text-sm hover:bg-green-700 flex items-center gap-1">
        <!-- Icon Filter -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-6.414 6.414A1 1 0 0014 13v5a1 1 0 01-1.447.894l-2-1A1 1 0 0110 17v-4a1 1 0 00-.293-.707L3.293 6.707A1 1 0 013 6V4z" />
        </svg>
    </button>

    <!-- TOMBOL RESET -->
    <a href="{{ route('berita.index') }}" class="bg-gray-300 text-gray-800 px-3 py-2 rounded text-sm hover:bg-gray-400 flex items-center gap-1">
        <!-- Icon Reset -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582M20 20v-5h-.581m-.873-3A8.003 8.003 0 004.582 9M4 9v.01M20 15v-.01m-4.418 4.418A8.003 8.003 0 0020 15" />
        </svg>
    </a>
</form>

  </div>

<!-- GRID BERITA -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
  @forelse($beritaList as $index => $berita)
    <div 
      class="relative bg-white rounded shadow hover:shadow-lg transition transform hover:scale-[1.01] overflow-hidden flex flex-col h-full"
      data-aos="fade-up" 
      data-aos-delay="{{ $index * 100 }}" 
      data-aos-duration="800"
    >
      <!-- Gambar -->
      <div class="h-56 w-full overflow-hidden">
        <img src="{{ asset('storage/' . $berita->gambar_berita) }}" class="w-full h-full object-cover" />
      </div>

      <!-- Konten -->
      <div class="p-4 flex flex-col flex-grow text-sm">
        <p class="text-xs text-gray-500 mb-2">{{ $berita->publish->translatedFormat('d M Y') }}</p>

        <!-- Judul -->
        <h3 class="text-lg font-bold text-gray-800 mb-2 leading-snug">
          {{ $berita->judul_berita }}
        </h3>

        <!-- Deskripsi dengan Tooltip -->
        <div class="group relative w-fit">
          <a href="{{ route('berita.detail', $berita->id_berita) }}"
             class="text-sm text-gray-700 no-underline block line-clamp-2">
            {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100, '...') }}
          </a>

          <!-- Tooltip muncul di atas -->
          <div class="absolute z-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500
                      bg-gray-500 text-white font-bold text-xs rounded px-3 py-2 bottom-full mb-2
                      left-1/2 -translate-x-1/2 pointer-events-none max-w-[220px] break-words text-center">
            Baca Selengkapnya
            <!-- Panah -->
            <div class="absolute w-3 h-3 bg-gray-700 rotate-45 left-1/2 -bottom-1.5 -translate-x-1/2"></div>
          </div>
        </div>
      </div>
    </div>
  @empty
    <div class="col-span-3 text-center text-gray-500">
      Berita tidak ditemukan.
    </div>
  @endforelse
</div>


  <!-- PAGINATION -->
  <div class="mt-8 flex justify-center">
    {{ $beritaList->links() }}
  </div>
</section>
@endsection
