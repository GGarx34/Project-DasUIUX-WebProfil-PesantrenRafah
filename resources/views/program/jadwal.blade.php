@extends('templete.navbar')
@section('title', 'JADWAL KEGIATAN | Pondok Pesantren Rafah')
@section('konten')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet">

<section class="max-w-7xl mx-auto px-4 py-10">
  <div class="text-center mb-7">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1" data-aos="zoom-in">
      KEGIATAN HARIAN SANTRI
    </h2>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
    <!-- Kolom Kiri -->
    <div class="space-y-4">
      <img src="{{ asset('assets/fathul.jpg') }}" alt="Kegiatan Santri"
           class="rounded-lg shadow-lg"
           data-aos="fade-right">

      <div class="bg-green-100 p-4 rounded-md text-sm md:text-base leading-relaxed text-green-900 font-semibold"
           data-aos="fade-up" data-aos-delay="100">
        <p class="mb-2">Adapun kegiatan pekanan sebagai berikut :</p>
        <ul class="list-disc list-inside space-y-1">
          <li>Senin Pagi : Apel Pagi</li>
          <li>Selasa Malam : Latihan Pidato Bahasa Inggris</li>
          <li>Rabu Pagi : Latihan Upacara</li>
          <li>Kamis Malam : Pembacaan Surah Yasin berjamaah</li>
          <li>Jum'at Pagi : Pembacaan Surah Al-Kahfi (Sebelum Sholat Jum'at)</li>
          <li>Sabtu Menjelang Siang : Latihan Pidato Bahasa Arab</li>
          <li>Sabtu Siang : Latihan Kepemudaan (Setelah Sholat Dzuhur)</li>
          <li>Sabtu Malam : Latihan Pidato Bahasa Indonesia</li>
          <li>Ahad Pagi : Lari Pagi dan Kerja Bakti Umum</li>
        </ul>
      </div>
    </div>

    <!-- Kolom Kanan -->
    <div class="flex flex-col space-y-4" x-data="{ open: false }">
      <!-- Accordion Jadwal Kegiatan -->
      <div class="w-full bg-[#F8F6F0] border border-green-500 rounded shadow overflow-hidden"
           data-aos="zoom-in-up" data-aos-delay="150">
      <button 
    @click="open = !open"
    class="w-full relative px-4 py-3 font-semibold text-green-800 flex items-center justify-center"
>
    <span class="text-center w-full">JADWAL KEGIATAN SANTRI</span>
    <svg :class="{ 'rotate-90': open }" 
         class="absolute right-4 w-5 h-5 transition-transform duration-300 text-green-600" 
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
    </svg>
</button>


        <!-- Accordion Body -->
        <div
          x-show="open"
          x-transition:enter="transition-all duration-1000 ease-in-out"
          x-transition:enter-start="max-h-0 opacity-0"
          x-transition:enter-end="max-h-[1000px] opacity-100"
          x-transition:leave="transition-all duration-800 ease-in-out"
          x-transition:leave-start="max-h-[1000px] opacity-100"
          x-transition:leave-end="max-h-0 opacity-0"
          class="overflow-hidden px-4 pt-1 pb-4 text-sm md:text-base text-gray-700"
        >
          <ul class="space-y-2 font-medium">
            <li><strong>03.30 – 05.00:</strong> Qiyamul Lail dan Sholat Shubuh</li>
            <li><strong>05.00 – 06.00:</strong> Kegiatan Tahfidzul Qur’an</li>
            <li><strong>06.00 – 07.30:</strong> Sarapan dan persiapan sekolah</li>
            <li><strong>07.30 – 11.45:</strong> Kegiatan Belajar Mengajar di kelas</li>
            <li><strong>11.45 – 13.45:</strong> Sholat Dzuhur dan makan siang</li>
            <li><strong>13.45 – 15.00:</strong> Belajar Mengajar di kelas</li>
            <li><strong>15.00 – 15.45:</strong> Sholat Ashar</li>
            <li><strong>15.45 – 16.30:</strong> Halaqoh Tahfidzul Qur’an</li>
            <li><strong>16.30 – 17.45:</strong> Olahraga dan Ekstrakurikuler</li>
            <li><strong>17.45 – 18.15:</strong> Persiapan ke masjid, Sholat Maghrib</li>
            <li><strong>18.15 – 18.35:</strong> Sholat Maghrib</li>
            <li><strong>18.35 – 19.00:</strong> Tilawah Al-Qur’an dan penyampaian kalimah jadidah</li>
            <li><strong>19.00 – 19.30:</strong> Makan malam</li>
            <li><strong>19.30 – 20.00:</strong> Sholat Isya</li>
            <li><strong>20.00 – 21.30:</strong> Belajar Muwajjah</li>
            <li><strong>21.30 – 03.30:</strong> Istirahat</li>
          </ul>
          <p class="mt-4 text-xs text-gray-500 italic">
            NB: Antara waktu adzan dan iqomah, kegiatan muroja’ah hafalan Al-Qur’an dilakukan secara berjama’ah.
          </p>
        </div>
      </div>

      <!-- Gambar Bawah -->
      <div data-aos="fade-left" data-aos-delay="200">
        <img src="{{ asset('assets/paskib.jpg') }}" alt="Upacara Santri" class="rounded-lg shadow-lg">
      </div>
    </div>
  </div>
</section>

<!-- SCRIPT ALPINEJS + AOS -->
<script src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://unpkg.com/alpinejs" defer></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true
  });
</script>
@endsection
