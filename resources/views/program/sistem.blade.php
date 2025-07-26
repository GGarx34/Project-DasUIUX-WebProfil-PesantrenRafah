@extends('templete.navbar')
@section('title', 'SISTEM ASRAMA | Pondok Pesantren Rafah')

@section('konten')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet">

<section class="py-16 px-6 bg-white">
    <div class="max-w-6xl mx-auto">
        <!-- Judul -->
       <div class="text-center mb-7 " data-aos="zoom-in">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">
      Sistem Asrama
    </h2>
  </div>
        <!-- Grid Konten -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start mt-6 ">
            <!-- Gambar -->
            <div class="flex flex-col items-center mt-3" data-aos="fade-right" data-aos-duration="1000">
                <img src="{{ asset('assets/haha.jpg') }}" alt="Asrama Darul Ihsan" class="rounded-lg shadow-2xl w-full max-w-md">
                <p class="mt-3 text-center text-base font-semibold text-gray-700 uppercase tracking-wide">
                    Asrama Darul Ihsan
                </p>
            </div>

            <!-- List Keunggulan -->
            <ol class="list-decimal list-inside space-y-4 text-gray-800 text-base leading-relaxed mt-3" data-aos="fade-left" data-aos-duration="1000">
                <li>
                    Dengan sistem asrama, santri dididik dan dibimbing 24 jam dengan disiplin dan kemandirian, menjadi generasi muda yang berdisiplin tinggi, tanggung jawab, dan militan.
                </li>
                <li>
                    Penguasaan terhadap ulum syar’iyyah (agama) secara optimal untuk <em>tafaqquh fiddin</em> tanpa meninggalkan <em>ulum kauniyyah</em> (umum).
                </li>
                <li>
                    Santri dipersiapkan untuk menjadi kader pemimpin umat, ulama, dan da’i dengan pondasi akidah yang shahih serta manhaj Ahlussunnah wal Jama’ah.
                </li>
                <li>
                    Santri menguasai bahasa Arab dan Inggris secara aktif sebagai alat untuk mempelajari ilmu agama dan ilmu pengetahuan umum.
                </li>
                <li>
                    Dengan program Tahfidzul Qur’an akan lahir kader generasi muda dan pemimpin umat yang rabbani.
                </li>
                <li>
                    Penguasaan terhadap ilmu syar’i secara menyeluruh dan seimbang dengan ilmu umum.
                </li>
                <li>
                    Santri dibina dalam lingkungan yang mendukung pembentukan akhlak dan karakter Islami sepanjang hari.
                </li>
            </ol>
        </div>
    </div>
</section>

<!-- AOS Script -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection
