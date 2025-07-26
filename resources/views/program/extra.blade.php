@extends('templete.navbar')
@section('title', 'EKSTRA | Pondok Pesantren Rafah')
@section('konten')
<section id="ekstra" class="p-4 space-y-6">
    <div class="text-center mt-4 mb-8">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800 border-b-2 border-green-600 inline-block pb-1">
            EXTRAKURIKULER
        </h2>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @foreach ($ekstrakurikuler as $item)
        <div 
            class="bg-gray-100 rounded-lg shadow p-2 flex flex-col items-center transition transform hover:scale-[1.01] text-center cursor-pointer"
            data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-aos-duration="1000"
            onclick="showEkstraModal('{{ asset('storage/' . $item->gambar_ekstra) }}', '{{ $item->nama_ekstra }}', '{{ $item->dekskripsi }}')"
        >
            <img 
                src="{{ asset('storage/' . $item->gambar_ekstra) }}" 
                alt="{{ $item->nama_ekstra }}" 
                class="rounded mb-2 w-full h-[180px] object-cover transition-transform duration-300 "
            >
            <h3 class="font-bold text-sm mb-1">{{ $item->nama_ekstra }}</h3>
            <p class="text-xs text-gray-600">{{ \Illuminate\Support\Str::limit($item->dekskripsi, 60) }}</p>
        </div>
        @endforeach
    </div>

    <!-- Modal Ekstrakurikuler -->
    <dialog id="ekstraModal" class="modal">
        <div class="modal-box p-0 bg-white shadow-lg relative max-w-lg">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-600 hover:text-red-500">
                    ✕
                </button>
            </form>
            <img id="ekstraImage" src="" alt="Preview" class="w-full h-[250px] object-cover rounded-t">
            <div class="p-4 text-sm text-gray-700 space-y-2">
                <h3 id="ekstraTitle" class="font-bold text-lg text-gray-800"></h3>
                <p id="ekstraDesc" class="text-sm"></p>
            </div>
        </div>
    </dialog>

    <!-- Script -->
    <script>
        function showEkstraModal(src, title, desc) {
            document.getElementById('ekstraImage').src = src;
            document.getElementById('ekstraTitle').textContent = title;
            document.getElementById('ekstraDesc').textContent = desc;
            document.getElementById('ekstraModal').showModal();
        }
    </script>
</section>
@endsection
