<div class="w-full space-y-8">
    <div class="max-w-4xl mx-auto p-6 space-y-8">
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 p-3 rounded flex justify-between items-center">
                <span>{{ session('message') }}</span>
                <button type="button" class="text-green-700 text-xl leading-none ml-4" onclick="this.parentElement.remove()">×</button>
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-6 text-gray-800">Manajemen Ekstrakurikuler</h1>
        <hr class="border-t-4 border-gray-400 my-4">

        <form wire:submit.prevent="store" wire:key="form-ekstra-{{ $editId ?? 'new' }}" class="space-y-6 mb-8">
            <div class="flex flex-wrap gap-6">
                <div class="relative flex flex-col items-center border border-gray-300 rounded shadow p-8 space-y-6 w-96 h-80 justify-center">
                    @if ($gambar_ekstra)
                        <button type="button" class="absolute top-2 right-2 text-red-600 text-4xl" wire:click="$set('gambar_ekstra', null)">×</button>
                        <img src="{{ $gambar_ekstra->temporaryUrl() }}" class="h-40 w-auto object-cover rounded">
                    @elseif ($gambar_lama)
                        <button type="button" class="absolute top-2 right-2 text-red-600 text-4xl" wire:click="$set('gambar_lama', null)">×</button>
                        <img src="{{ asset('storage/' . $gambar_lama) }}" class="h-40 w-auto object-cover rounded">
                    @else
                        <label class="bg-blue-600 text-white px-6 py-2 rounded-full cursor-pointer hover:bg-blue-700">
                            Upload Gambar
                            <input type="file" wire:model="gambar_ekstra" class="hidden">
                        </label>
                    @endif
                    @error('gambar_ekstra') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex-1 min-w-[300px] mt-[110px]">
                    <label class="block mb-1 font-semibold">Nama Ekstra</label>
                    <input type="text" wire:model="nama_ekstra" wire:key="nama-ekstra-{{ $editId ?? 'new' }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 placeholder-gray-400 text-gray-800">
                    @error('nama_ekstra') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Deskripsi</label>
                <textarea wire:model="dekskripsi" wire:key="deskripsi-ekstra-{{ $editId ?? 'new' }}" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 placeholder-gray-400 text-gray-800 resize-y max-h-60"></textarea>
                @error('dekskripsi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-2">
                @if ($editId)
                    <button type="button" wire:click="cancelEdit" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Batal</button>
                    <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">Update</button>
                @else
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
                @endif
            </div>
        </form>
    </div>

    <div class="w-full p-6 space-y-4">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Daftar Ekstrakurikuler</h2>

        <div class="w-full overflow-x-auto mb-4">
            <div class="flex justify-end mr-5">
                <input type="text" wire:model.live="katakunci" placeholder="Cari ekstra..." class="w-full max-w-sm px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 text-gray-800">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-[1260px] border-collapse border border-gray-300 text-sm table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-center">No</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Gambar</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Nama</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Deskripsi</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekstraList as $index => $item)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                {{ ($ekstraList->currentPage() - 1) * $ekstraList->perPage() + $index + 1 }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <img src="{{ asset('storage/' . $item->gambar_ekstra) }}" class="h-20 w-auto object-cover mx-auto rounded cursor-pointer hover:scale-105" onclick="showModal('{{ asset('storage/' . $item->gambar_ekstra) }}')">
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center font-semibold text-gray-800">{{ $item->nama_ekstra }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-600">{{ Str::limit(strip_tags($item->dekskripsi), 120, '...') }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button wire:click="edit({{ $item->id_extra }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                            </td>
                        </tr>
                    @endforeach

                    @if ($ekstraList->isEmpty())
                        <tr>
                            <td colspan="5" class="border border-gray-300 px-4 py-4 text-center text-gray-500">Tidak ada data ditemukan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-4">
            {{ $ekstraList->links() }}
        </div>
    </div>

    <div id="modal" class="fixed inset-0 bg-black bg-opacity-60 hidden flex items-center justify-center z-50" onclick="this.classList.add('hidden')">
        <img id="modalImage" src="" class="max-h-[80vh] max-w-[90vw] object-contain rounded shadow-lg">
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('resetFormInputs', () => {
            const fileInput = document.querySelector('input[type="file"][wire\\:model="gambar_ekstra"]');
            if (fileInput) fileInput.value = '';

            const namaInput = document.querySelector('input[wire\\:model="nama_ekstra"]');
            if (namaInput) namaInput.value = '';

            const deskripsiTextarea = document.querySelector('textarea[wire\\:model="dekskripsi"]');
            if (deskripsiTextarea) deskripsiTextarea.value = '';
        });
    });
</script>

<script>
    function showModal(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('modal').classList.remove('hidden');
        
    }

   

</script>
