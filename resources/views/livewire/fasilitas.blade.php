<div class="w-full space-y-10">
    <div class="max-w-4xl mx-auto p-6   space-y-8">
        @if (session()->has('message'))
            <div class="relative bg-green-100 text-green-700 p-3 rounded flex justify-between items-center">
                <span>{{ session('message') }}</span>
                <button type="button" class="text-green-700 text-xl ml-4" onclick="this.parentElement.remove()">&times;</button>
            </div>
        @endif

        <h1 class="text-2xl font-bold text-gray-800">Manajemen Fasilitas</h1>
        <hr class="border-t-4 border-gray-300 my-4">

      <form wire:submit.prevent="store" class="space-y-6" wire:key="form-fasilitas-{{ $editId ?? 'new' }}">

    <div class="flex flex-wrap gap-6">
        <!-- Gambar -->
        <div wire:key="form-gambar" class="relative flex flex-col items-center border border-gray-300 rounded shadow p-6 space-y-4 w-96 h-80 justify-center">
            @if ($foto_fasilitas)
                <button type="button" class="absolute top-2 right-2 text-red-600 text-3xl" wire:click="$set('foto_fasilitas', null)">&times;</button>
                <img src="{{ $foto_fasilitas->temporaryUrl() }}" class="h-40 object-cover rounded" wire:key="preview-baru">
            @elseif ($foto_lama)
                <button type="button" class="absolute top-2 right-2 text-red-600 text-3xl" wire:click="$set('foto_lama', null)">&times;</button>
                <img src="{{ asset('storage/' . $foto_lama) }}" class="h-40 object-cover rounded" wire:key="preview-lama">
            @else
                <label class="bg-blue-600 text-white px-6 py-2 rounded-full cursor-pointer hover:bg-blue-700" wire:key="upload-label">
                    Upload Gambar
                    <input type="file" wire:model="foto_fasilitas" class="hidden">
                </label>
            @endif
            @error('foto_fasilitas') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Nama -->
        <div class="flex-1 min-w-[300px] mt-[110px]" wire:key="form-nama">
            <label class="block mb-1 font-semibold text-gray-700">Nama Fasilitas</label>
                <input
                type="text"
                wire:model="nama_fasilitas"
                wire:key="nama-fasilitas-{{ $editId ?? 'new' }}"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:ring-blue-200">

            @error('nama_fasilitas') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Deskripsi -->
    <div wire:key="form-deskripsi">
        <label class="block mb-1 font-semibold text-gray-700">Deskripsi</label>
        <textarea
            wire:model="deskripsi"
            wire:key="deskripsi-{{ $editId ?? 'new' }}"
            rows="6"
            class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:ring-blue-200"></textarea>

        @error('deskripsi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="flex justify-end space-x-2" wire:key="form-button">
        @if ($editId)
            <button type="button" wire:click="cancelEdit" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Batal</button>
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">Update</button>
        @else
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
        @endif
    </div>
</form>

    </div>

    <div class="w-full p-6 space-y-6 ">
         <div class="w-full overflow-x-auto mb-4">
            <div class="flex justify-end mr-5">
                <input type="text" wire:model.live="katakunci" placeholder="Cari ekstra..." class="w-full max-w-sm px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 text-gray-800">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-[1260px] border-collapse border border-gray-300 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Gambar</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Deskripsi</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fasilitasList as $index => $item)
                        <tr wire:key="fasilitas-row-{{ $item->id_vasilitas }}">
                            <td class="border px-4 py-2 text-center">
                                {{ ($fasilitasList->currentPage() - 1) * $fasilitasList->perPage() + $index + 1 }}
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <img 
                                    src="{{ asset('storage/' . $item->foto) }}" 
                                    class="h-20 w-auto object-cover mx-auto rounded cursor-pointer hover:opacity-80 hover:scale-105 transition"
                                    onclick="showModal('{{ asset('storage/' . $item->foto) }}')"
                                >
                            </td>
                            <td class="border px-4 py-2 text-center font-semibold">{{ $item->nama_fasilitas }}</td>
                            <td class="border px-4 py-2 text-sm">{{ Str::limit(strip_tags($item->deskripsi), 120, '...') }}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="edit({{ $item->id_vasilitas }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border px-4 py-4 text-center text-gray-500">Tidak ada data ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex justify-end">
            {{ $fasilitasList->links() }}
        </div>
    </div>

    <!-- MODAL GAMBAR -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-60 hidden flex items-center justify-center z-50" onclick="this.classList.add('hidden')">
        <img id="modalImage" src="" class="max-h-[80vh] max-w-[90vw] object-contain rounded shadow-lg">
    </div>
</div>

<!-- JS: Modal & Reset Form -->
<script>
    function showModal(imageUrl) {
        const modal = document.getElementById('modal');
        const img = document.getElementById('modalImage');
        img.src = imageUrl;
        modal.classList.remove('hidden');
    }

    document.addEventListener('livewire:init', () => {
        Livewire.on('resetFormInputs', () => {
            const fileInput = document.querySelector('input[type="file"][wire\\:model="foto_fasilitas"]');
            if (fileInput) fileInput.value = '';

            const namaInput = document.querySelector('input[wire\\:model="nama_fasilitas"]');
            if (namaInput) namaInput.value = '';

            const deskripsiTextarea = document.querySelector('textarea[wire\\:model="deskripsi"]');
            if (deskripsiTextarea) deskripsiTextarea.value = '';
        });
    });
</script>
