@extends('templete.navbar')
@section('title', 'GALERI | Pondok Pesantren Rafah')
@section('konten')
<section class="px-4 py-8 md:py-14 max-w-7xl mx-auto">
    <div class="text-center mb-6">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">
            DOKUMENTASI KEGIATAN & FASILITAS
        </h2>
        <p class="mt-4 text-sm md:text-base text-gray-600 max-w-xl mx-auto mb-3">
            Berikut ini merupakan dokumentasi dari kegiatan Ekstrakurikuler dan juga fasilitas yang ada di Pondok Pesantren Rafah.
        </p>
    </div>

    <!-- Galeri -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mt-10">
    @foreach ($galeri as $item)
        <div 
            class="rounded-lg overflow-hidden shadow hover:shadow-lg transition cursor-pointer"
            data-aos="zoom-in"
            onclick="showImageModal('{{ asset('storage/' . $item['gambar']) }}')"
        >
            <img src="{{ asset('storage/' . $item['gambar']) }}" 
                 alt="Galeri"
                 class="w-full h-40 md:h-48 object-cover hover:scale-105 transition-transform duration-300" />
            {{-- Label tipe, opsional --}}
            {{-- <div class="bg-white text-center py-1 text-xs text-gray-600 border-t">
                {{ ucfirst($item['tipe']) }}
            </div> --}}
        </div>
    @endforeach
</div>


    <!-- Modal DaisyUI (Full Gambar) -->
    <dialog id="imageModal" class="modal">
        <div class="modal-box p-0 bg-transparent shadow-none relative">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-50 text-white bg-black/40 hover:bg-black/60">
                    ✕
                </button>
            </form>
            <img id="modalImage" src="" alt="Preview" 
                 class="w-full h-auto max-h-[90vh] object-contain rounded-lg z-10" />
        </div>
    </dialog>

    <!-- Pagination -->
    <div class="mt-10">
        {{ $galeri->links() }}
    </div>
</section>

<!-- Script -->
<script>
    function showImageModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').showModal();
    }
</script>
@endsection
