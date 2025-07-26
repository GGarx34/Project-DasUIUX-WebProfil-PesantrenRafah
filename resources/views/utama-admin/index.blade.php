@extends('dashbord.templete')

@section('isi')
<div class="bg-white rounded-xl shadow-md p-6 space-y-8">

    {{-- ALERT --}}
    @if (session()->has('message'))
        <div class="relative bg-green-100 text-green-700 p-3 rounded flex justify-between items-center">
            <span>{{ session('message') }}</span>
            <button type="button" class="text-green-700 text-xl leading-none ml-4" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    {{-- JUDUL --}}
    <div>
        <h1 class="text-2xl font-semibold text-gray-700">Dashboard Admin</h1>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-100 text-blue-800 p-6 rounded-lg shadow">
            <h2 class="text-sm font-semibold">Total Berita</h2>
            <p class="text-3xl font-bold mt-1">{{ $berita }}</p>
        </div>
        <div class="bg-green-100 text-green-800 p-6 rounded-lg shadow">
            <h2 class="text-sm font-semibold">Total Fasilitas</h2>
            <p class="text-3xl font-bold mt-1">{{ $fasilitas }}</p>
        </div>
        <div class="bg-purple-100 text-purple-800 p-6 rounded-lg shadow">
            <h2 class="text-sm font-semibold">Siswa yang Mendaftar</h2>
            <p class="text-3xl font-bold mt-1">{{ $siswa }}</p> {{-- Dummy --}}
        </div>
    </div>

    {{-- PROGRAM PESANTREN --}}
    <div>
        <h2 class="text-lg font-bold text-gray-700 border-b pb-2">Program Pesantren</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">

            {{-- Ekstrakurikuler --}}
            <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400">
                <h3 class="font-semibold text-blue-700 mb-2">Ekstrakurikuler</h3>
                <ul class="text-sm text-gray-700 list-disc pl-5 space-y-1">
                    <li>Pramuka</li>
                    <li>Futsal</li>
                    <li>Hadroh</li>
                </ul>
            </div>

            {{-- Kurikulum Mu’adalah --}}
            <div class="bg-green-50 p-4 rounded-lg border-l-4 border-green-400">
                <h3 class="font-semibold text-green-700 mb-2">Kurikulum Mu’adalah</h3>
                <ul class="text-sm text-gray-700 list-disc pl-5 space-y-1">
                    <li>Studi Syar’i</li>
                    <li>Studi Bahasa (Arab & Inggris)</li>
                    <li>Studi Kauni (IPTEK)</li>
                </ul>
            </div>

            {{-- Tahfidzul Qur’an --}}
            <div class="bg-purple-50 p-4 rounded-lg border-l-4 border-purple-400">
                <h3 class="font-semibold text-purple-700 mb-2">Tahfidzul Qur’an</h3>
                <ul class="text-sm text-gray-700 list-disc pl-5 space-y-1">
                    <li>Target 2 juz/tahun (min. 10 juz saat lulus)</li>
                    <li>Setoran harian dengan talaqqi musyrif</li>
                    <li>Muroja’ah pagi dan sore setiap hari</li>
                </ul>
            </div>

            {{-- Kegiatan Harian --}}
            <div class="bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-400">
                <h3 class="font-semibold text-yellow-700 mb-2">Kegiatan Harian</h3>
                <ul class="text-sm text-gray-700 list-disc pl-5 space-y-1">
                    <li>Qiyamul Lail – Shubuh – Tahfidz</li>
                    <li>KBM pagi & siang – Sholat berjamaah</li>
                    <li>Tilawah, belajar malam, istirahat</li>
                </ul>
            </div>

            {{-- Sistem Asrama --}}
            <div class="bg-red-50 p-4 rounded-lg border-l-4 border-red-400">
                <h3 class="font-semibold text-red-700 mb-2">Sistem Asrama</h3>
                <ul class="text-sm text-gray-700 list-disc pl-5 space-y-1">
                    <li>Pembinaan 24 jam</li>
                    <li>Lingkungan Islami & disiplin</li>
                    <li>Penguasaan ilmu agama & umum</li>
                    <li>Bahasa Arab & Inggris aktif</li>
                </ul>
            </div>

        </div>
    </div>

</div>
@endsection
