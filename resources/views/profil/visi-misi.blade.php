@extends('templete.navbar')
@section('title', 'PROFIL | Pondok Pesantren Rafah')
@section('konten')

<div class="max-w-6xl mx-auto px-4 py-10 space-y-16 text-gray-800" data-aos="zoom-in" data-aos-duration="800">

    {{-- TENTANG KAMI --}}
    <div class="space-y-6" data-aos="fade-up" data-aos-duration="700">
        <div class="text-center" data-aos="fade-down">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">
                TENTANG KAMI
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start mt-8">
            {{-- Gambar --}}
            <div data-aos="zoom-in-left">
                <img src="{{ asset('assets/latar.jpg') }}" alt="Tentang Kami"
                    class="rounded shadow-md w-full h-[230px] md:h-[310px] object-cover">
            </div>

            {{-- Paragraf --}}
            <div class="text-sm md:text-base space-y-4 text-justify mt-2 md:mt-0" data-aos="zoom-in-right">
                <p data-aos="fade-up" data-aos-delay="100">
                    Penyelenggaraan pendidikan dan pengajaran merupakan tanggungjawab pemerintah, masyarakat dan kita semua untuk mencetak kader generasi muda baik sebagai individu yang sholeh maupun ummatan wasathon- yang berakidah benar, qur’ani dan berakhlak karimah sehingga bisa menjadi generasi khoiru ummah.
                </p>
                <p data-aos="fade-up" data-aos-delay="200">
                    Dalam konteks itulah Pondok Pesantren Rafah hadir di tengah-tengah masyarakat untuk berkhidmah kepada ilmu dan santri walau dengan kemampuan yang terbatas. Lembaga ini bernaung dibawah Yayasan Ar Rahmah, didirikan pada tahun 1999 dan dipimpin oleh KH. Muhammad Nasir Zein, MA dengan membawa misi melahirkan kader ulama intelek yang amilin (berkiprah nyata) dengan manhaj ahlussunnah wal jama’ah.
                </p>
            </div>
        </div>

        {{-- Sisa Paragraf --}}
        <div class="grid grid-cols-1 text-sm md:text-base space-y-4 text-justify mt-4">
            <p data-aos="fade-up" data-aos-delay="100">
                Mulai tahun ajaran 2009 – 2010 Pondok Pesantren Rafah membuka kurikulum pendidikan Tarbiyatul Mu’allimin Al Islamiyyah (TMI) program Reguler / MTs dan MA dengan jenjang pendidikan 6 tahun untuk lulusan MI/SD. Dan mulai tahun ajaran 2011 – 2012 dibuka Program Intensif / MA dengan jenjang pendidikan 4 tahun untuk untuk lulusan SMP/MTs.
            </p>
            <p data-aos="fade-up" data-aos-delay="200">
                Alhamdulillah pada bulan Sya’ban 1432 H / Agustus 2011 M Pondok Pesantren Rafah mendapatkan mu’adalah / persamaan dari Jami’ah Islamiyyah Al Madinah Al Munawwaroh. Dan pada tahun 2016 TMI Rafah mendapatkan SK Mu’adalah Mu’allimin dari Menteri Agama RI.
            </p>
            <p data-aos="fade-up" data-aos-delay="300">
                Dengan kurikulum TMI – Satuan Pendidikan Mu’adalah tersebut di atas diharapkan para santri bisa menjadi kader umat yang qur’ani, bertafaqquh fiddin, menjadi ulama da’i dan da’i ulama, orientasi kemasyarakatan dan bisa melanjutkan jenjang pendidikan baik dalam negeri maupun luar negeri dengan dasar nilai Qur’ani sehingga menjadi generasi khoiru ummah yang diharapkan.
            </p>
        </div>
    </div>

    {{-- LANDASAN PEMIKIRAN --}}
    <div class="text-center space-y-8" data-aos="fade-up">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1"
            data-aos="zoom-in">
            LANDASAN PEMIKIRAN
        </h2>

        <div class="flex flex-col items-center gap-6 md:grid md:grid-cols-6 md:items-start md:justify-center">
            {{-- Logo Kiri --}}
            <div class="md:col-span-1 flex justify-center" data-aos="flip-left">
                <img src="{{ asset('assets/logo2.jpg') }}" alt="Logo Kiri" class="w-40 md:w-[280px] h-auto">
            </div>

            {{-- Card Tengah --}}
            <div class="bg-green-50 rounded-lg shadow px-6 py-4 text-sm text-gray-700 space-y-4 text-justify md:col-span-4" data-aos="zoom-in-up">
                <p class="italic font-bold text-center">
                    "Dan hendaklah ada di antara kamu segolongan umat yang menyeru kepada kebajikan, menyuruh kepada yang ma’ruf, dan mencegah dari yang munkar."<br>
                    <span class="not-italic font-bold">(QS. Ali Imran : 104)</span>
                </p>
                <p class="italic font-bold text-center">
                    "Akan tetapi Allah SWT akan mengangkat orang-orang beriman di antara kamu dan orang-orang yang diberi ilmu beberapa derajat."<br>
                    <span class="not-italic font-bold">(QS. Al-Mujadilah : 11)</span>
                </p>
                <p class="italic font-bold text-center">
                    "Tidak menjadi suatu kewajiban bagi orang-orang mukmin untuk pergi ke medan perang semuanya..."<br>
                    <span class="not-italic font-bold">(QS. At-Taubah : 122)</span>
                </p>
            </div>

            {{-- Logo Kanan --}}
            <div class="md:col-span-1 flex justify-center" data-aos="flip-right">
                <img src="{{ asset('assets/logo2.jpg') }}" alt="Logo Kanan" class="w-40 md:w-[280px] h-auto">
            </div>
        </div>
    </div>

</div>

@endsection
