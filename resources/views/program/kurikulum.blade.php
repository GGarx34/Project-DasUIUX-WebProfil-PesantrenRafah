@extends('templete.navbar')
@section('title', 'KURIKULUM PENDIDIKAN | Pondok Pesantren Rafah')
@section('konten')
<div class="max-w-6xl mx-auto px-4 py-8 space-y-10">

    <!-- Judul -->
    <div class="text-center px-4 mb-8" data-aos="zoom-in" data-aos-duration="800">
        <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">
            KURIKULUM PENDIDIKAN
        </h2>
    </div>

    <!-- Gambar Utama -->
    <div class="mb-6" data-aos="fade-up" data-aos-duration="1000">
        <img src="{{ asset('assets/Rihlah.jpg') }}" alt="Pendidikan Pondok" class="rounded-lg shadow-md w-full">
    </div>

    <!-- Paragraf 1 -->
    <div class="text-justify text-gray-800 leading-relaxed space-y-4 mb-10" data-aos="fade-right" data-aos-duration="1000">
        <p>
            Kurikulum Pendidikan Pondok Pesantren Rafah adalah Tarbiyatul Mu'allimin Al Islamiyyah yang berafiliasi ke kurikulum KMI Pondok Modern Gontor dengan program Satuan Pendidikan Mu’adalah (SPM) dari Kementerian Agama RI dengan jenjang pendidikan 6 tahun untuk lulusan MI/SD dan 4 tahun untuk lulusan MTs/SMP. 
        </p>
        <p>
            Materi pelajaran TMI mencakup Bahasa Arab, Ushuluddin, Hadits, Bahasa Inggris, Ilmu Pengetahuan Alam, Ilmu Pengetahuan Sosial, Ilmu keorganisasian dan dilengkapi dengan program Tahfidzul Qur’an sebagai program unggulan. Juga beberapa program santri kelas enam diantaranya ; Fathu Kutub, Rihlah Ilmiyah Iqtishodiyyah, amaliyah tadris /praktik latihan mengajar, bahtsul masail, kegiatan pembekalan kelas enam seperti praktek mengurus jenazah, manasik, serta keterlibatan santri dalam kepanitiaan ujian.
        </p>
    </div>

    <!-- Gambar + Teks -->
    <div class="flex flex-col md:flex-row items-start gap-6 mb-6" data-aos="fade-up" data-aos-duration="1200">
        <!-- Gambar Kiri -->
        <div class="md:w-1/2 w-full" data-aos="fade-left" data-aos-duration="1000">
            <img src="{{ asset('assets/ngajar.jpg') }}" alt="Kegiatan Belajar" class="rounded-lg shadow-md w-full">
        </div>

        <!-- Teks Kanan -->
        <div class="md:w-1/2 w-full" data-aos="fade-right" data-aos-duration="1000">
            <div class="text-justify text-gray-800 leading-relaxed space-y-4 max-w-md">
                <p>
                    Satuan pendidikan mu’adalah adalah program pendidikan pesantren yang berada dibawah Direktorat Pendidikan Diniyah dan Pondok Pesantren Kementerian Agama RI sesuai dengan Peraturan Menteri Agama (PMA) RI No 18 tahun 2014. 
                </p>
                <p>
                    Dalam program satuan pendidikan mu’adalah ini pesantren diberikan kewenangan untuk melaksanakan Ujian Nasional (UN), Penilaian Akhir Semester, dan menentukan program pembelajaran kompetensi santrinya dengan tetap mendapat ijazah yang diakui oleh negara.
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
