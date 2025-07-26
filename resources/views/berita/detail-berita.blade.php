@extends('templete.navbar')
@section('title', 'DETAIL BERITA | Pondok Pesantren Rafah')
@section('konten')
<section class="w-full pb-10">

    <!-- Konten Atas -->
    <div class="max-w-5xl mx-auto px-6 mt-8 space-y-4">
        <!-- Judul -->
        <div data-aos="fade-down" >
           
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
                {{ $berita->judul_berita }}
            </h1>
             <p class="text-sm font-semibold text-gray-600 uppercase mb-1 mt-3">
                {{ $berita->publish->translatedFormat('M d, Y') }} | BERITA
            </p>
        </div>
    </div>

    <!-- Gambar Tidak Full, Tapi Besar & Rapi -->
    @if($berita->gambar_berita)
    <div class="max-w-5xl mx-auto px-6 mt-4" data-aos="zoom-in" data-aos-delay="100" >
        <img 
            src="{{ asset('storage/' . $berita->gambar_berita) }}" 
            alt="Gambar Berita" 
            class="w-full max-h-[480px] rounded-lg object-cover object-center shadow" />
    </div>
    @endif

    <!-- Isi Berita -->
    <div class="max-w-5xl mx-auto px-6 mt-6">
        <div class="text-justify text-gray-800 leading-relaxed text-[17px]" data-aos="fade-up" data-aos-delay="200">
            {!! nl2br(e($berita->isi)) !!}
        </div>
    </div>
</section>
@endsection
