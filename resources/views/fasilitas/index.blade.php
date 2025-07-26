@extends('templete.navbar')
@section('title', 'FASILITAS | Pondok Pesantren Rafah')
@section('konten')
<section id="fasilitas" class="p-6 my-4">
  <div class="text-center mb-7">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">
      FASILITAS
    </h2>
  </div>

  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
    @foreach ($fasilitas as $item)
      <div 
        class="bg-gray-100 rounded-lg shadow p-2 flex flex-col  transition transform hover:scale-[1.01] items-center text-center cursor-pointer hover:shadow-lg transition"
        data-aos="fade-up" 
        data-aos-duration="1000" 
        data-aos-delay="{{ $loop->index * 100 }}"
        onclick="openFasilitasModal('{{ $item->nama_fasilitas }}', `{{ $item->deskripsi }}`, '{{ asset('storage/' . $item->foto) }}')"
      >
        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_fasilitas }}"
             class="rounded mb-2 w-full h-[180px] object-cover">
        <h3 class="font-bold text-sm mb-1">{{ $item->nama_fasilitas }}</h3>
        <p class="text-xs text-gray-600 line-clamp-2">{{ Str::limit($item->deskripsi, 40) }}</p>
      </div>
    @endforeach
  </div>
</section>

<!-- Modal Gaya Galeri -->
<dialog id="modalFasilitas" class="modal">
  <div class="modal-box p-0 bg-transparent shadow-none relative">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-50 text-white bg-black/40 hover:bg-black/60">
        ✕
      </button>
    </form>
    <div class="bg-white rounded-lg shadow max-w-xl mx-auto overflow-hidden">
      <img id="fasilitasModalImg" src="" alt="Fasilitas Image" class="w-full h-52 md:h-64 object-cover" />
      <div class="p-4">
        <h2 id="fasilitasModalTitle" class="text-lg md:text-xl font-bold text-gray-800 mb-2"></h2>
        <p id="fasilitasModalDesc" class="text-sm text-gray-700 text-justify"></p>
      </div>
    </div>
  </div>
</dialog>

<!-- Script Modal -->
<script>
  function openFasilitasModal(title, description, imageUrl) {
    document.getElementById('fasilitasModalTitle').innerText = title;
    document.getElementById('fasilitasModalDesc').innerText = description;
    document.getElementById('fasilitasModalImg').src = imageUrl;
    document.getElementById('modalFasilitas').showModal();
  }
</script>
@endsection
