@extends('templete.navbar')

@section('konten')

<!-- Banner -->
<div class="w-full bg-black">
    <img src="{{ asset('assets/Head-Foto-Website-1536x732.jpg') }}" 
         alt="Banner Ponpes Rafah"
         class="w-full h-auto object-contain mx-auto" />
</div>

<!-- Tentang Kami -->
<section id="tentang" class="py-10 md:py-14 px-4 bg-gray-50" data-aos="fade-up">
  <div class="max-w-6xl mx-auto space-y-10">
    <!-- Judul + Paragraf -->
    <div class="text-center space-y-4">
      <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">
        TENTANG KAMI
      </h2>
      <p class="text-gray-600 text-sm md:text-base leading-relaxed text-justify max-w-4xl mx-auto">
        Ponpes Rafah didirikan tahun 1999 di bawah Yayasan Ar Rahmah oleh KH. Muhammad Nasir Zein, MA. Lembaga ini berkomitmen melahirkan kader ulama intelek dan amilin. Kurikulum TMI dibuka sejak 2009 dengan jenjang 6 tahun dan program intensif 4 tahun, ditunjang program unggulan hafalan Al-Qur'an dan pembiasaan bahasa Arab-Inggris.
      </p>
      <a href="/tentang" class="inline-block mt-3 px-5 py-2 rounded font-bold text-white shadow hover:bg-[#79a2d9] transition" style="background-color: #8fb3e2;">Selengkapnya</a>
    </div>

    <!-- VISI & MISI -->
    <div class="grid md:grid-cols-2 gap-4 md:gap-6" data-aos="fade-up" data-aos-delay="200">
      <!-- VISI -->
      <div class="bg-white rounded-lg shadow p-4 md:p-6 space-y-2 border-l-4 border-green-500 h-full flex flex-col justify-start">
        <h3 class="text-base md:text-lg font-semibold text-green-700">Visi</h3>
        <p class="text-gray-700 text-sm md:text-base leading-relaxed">
          Membentuk generasi muslim berakhlak mulia, menguasai ilmu agama dan sains, serta siap berkhidmat untuk umat.
        </p>
      </div>
      <!-- MISI -->
      <div class="bg-white rounded-lg shadow p-4 md:p-6 space-y-2 border-l-4 border-blue-500 h-full flex flex-col justify-start">
        <h3 class="text-base md:text-lg font-semibold text-blue-700">Misi</h3>
        <ul class="list-disc list-inside text-gray-700 text-sm md:text-base space-y-1">
          <li>Pendidikan agama Islam mendalam.</li>
          <li>Pendidikan formal bernilai Islam.</li>
          <li>Menanamkan keikhlasan & tanggung jawab.</li>
          <li>Keterampilan hidup & kontribusi sosial.</li>
          <li>Semangat dakwah & cinta ilmu.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Berita -->
<section class="p-4 mt-16" data-aos="fade-up">
  <div class="text-center mb-5">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">BERITA</h2>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
    @foreach ($berita->take(3) as $beritaItem)
    <div class="relative overflow-hidden rounded-lg shadow-md transition transform hover:scale-[1.01]" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
      <img src="{{ asset('storage/' . $beritaItem->gambar_berita) }}" alt="{{ $beritaItem->judul_berita }}" class="w-full h-60 object-cover" />
      <div class="absolute inset-0 bg-black/20"></div>
      <div class="absolute left-2 bottom-2 z-10">
        <h3 class="text-white text-lg font-semibold drop-shadow-[0_1px_4px_rgba(0,0,0,0.8)]">{{ $beritaItem->judul_berita }}</h3>
      </div>
    </div>
    @endforeach
  </div>
  <div class="flex justify-center items-center">
    <a href="/berita-page" class="inline-block px-6 py-2 rounded font-bold text-white shadow hover:bg-[#79a2d9] transition" style="background-color: #8fb3e2;">Selengkapnya</a>
  </div>
</section>

<!-- Program -->
<section class="p-4 mt-16" data-aos="fade-up">
  <div class="text-center mb-6">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">PROGRAM</h2>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach ([
      ['img' => 'Rihlah.jpg', 'title' => 'Kurikulum Pendidikan', 'desc' => 'Kurikulum TMI berbasis Gontor.', 'link' => '/program/kurikulum'],
      ['img' => 'J.jpg', 'title' => 'Pendidikan Mu’adalah', 'desc' => 'Legalitas PMA No. 18 Tahun 2014.', 'link' => '/program/spm'],
      ['img' => 'fathul.jpg', 'title' => 'Tahfidz Qur’an', 'desc' => 'Target hafalan 5–15 juz.', 'link' => '/program/tahfidz']
    ] as $p)
    <div class="rounded-lg overflow-hidden shadow bg-white" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
      <img src="{{ asset('assets/' . $p['img']) }}" alt="{{ $p['title'] }}" class="w-full h-72 object-cover shadow-md transition transform hover:scale-[1.01]" />
      <div class="p-4 space-y-3 text-center">
        <h3 class="font-bold text-blue-800 text-lg">{{ $p['title'] }}</h3>
        <p class="text-base text-gray-700 leading-relaxed">{{ $p['desc'] }}</p>
        <a href="{{ $p['link'] }}" class="inline-block text-sm font-semibold px-4 py-2 rounded text-white shadow hover:bg-[#79a2d9] transition" style="background-color: #8fb3e2;">
          Lihat Detail ➔
        </a>
      </div>
    </div>
    @endforeach
  </div>
</section>

<!-- Fasilitas -->
<section class="p-4 mt-16 bg-gray-50 rounded-md" data-aos="fade-up">
  <div class="text-center mb-6">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">FASILITAS</h2>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
    @foreach ($fasilitas->take(4) as $f)
    <div class="overflow-hidden rounded shadow transition transform hover:scale-[1.01]" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
      <img src="{{ asset('storage/' . $f->foto) }}" alt="{{ $f->nama_fasilitas }}" class="w-full h-48 object-cover" />
    </div>
    @endforeach
  </div>
  <div class="flex justify-center">
    <a href="/fasilitas-page" class="inline-block px-6 py-2 rounded font-bold text-white shadow hover:bg-[#79a2d9] transition" style="background-color: #8fb3e2;">
      Selengkapnya
    </a>
  </div>
</section>

@endsection
