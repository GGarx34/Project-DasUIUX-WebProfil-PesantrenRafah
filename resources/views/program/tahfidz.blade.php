@extends('templete.navbar')
@section('title', 'TAHFIDZ | Pondok Pesantren Rafah')
@section('konten')
<div class="max-w-6xl mx-auto px-4 py-8 mt-3 mb-6 space-y-10">

    <!-- Judul -->
    <div class="text-center mb-8" data-aos="zoom-in" data-aos-duration="800">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">
            TAHFIDZUL QUR'AN
        </h2>
    </div>

    <!-- Konten Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        {{-- Gambar --}}
        <div data-aos="fade-right" data-aos-duration="1000">
            <img src="{{ asset('assets/Tahfidzul-Quran.jpg') }}" alt="Santri Tahfidz" class="rounded shadow w-full">
        </div>

        {{-- Deskripsi --}}
        <div class="text-gray-700 space-y-4 text-justify" data-aos="fade-left" data-aos-duration="1000">
            <p>
                Salah satu program unggulan Pondok Pesantren Rafah adalah program <strong>Tahfidzul Quran</strong>
                untuk seluruh santri yang dibimbing oleh para huffadz. Program ini dilaksanakan per kelas yang masing-masing
                kelas dibagi menjadi beberapa kelompok dan dibimbing oleh seorang Ustadz dengan sistem Talaqqi. Setiap
                pertemuan, santri menyetorkan hafalan kepada pengajar di kelompok tersebut. Setiap tahunnya santri ditargetkan
                mampu menghafal 2 juz, sehingga santri yang menamatkan jenjang pendidikannya mampu menghafal minimal 10 juz.
            </p>
            <p>
                Program ini dilaksanakan setiap pagi setelah Sholat Shubuh sampai pukul 06.30 dan sore hari setelah Sholat Ashar
                sampai pukul 16.30. Sedangkan waktu antara adzan dan iqomah setiap sholat lima waktu digunakan untuk
                <em>muroja’ah</em> bersama.
            </p>
        </div>
    </div>
</div>
@endsection
