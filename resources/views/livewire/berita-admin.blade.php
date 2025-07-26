<div class="w-full space-y-8">
    <!-- WRAPPER FORM -->
    <div class="max-w-4xl mx-auto p-6 space-y-8">
        @if (session()->has('message'))
            <div class="relative bg-green-100 text-green-700 p-3 rounded flex justify-between items-center">
                <span>{{ session('message') }}</span>
                <button type="button" class="text-green-700 text-xl leading-none ml-4" onclick="this.parentElement.remove()">×</button>
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-6 text-gray-800">Manajemen Berita</h1>
        <hr class="border-t-4 border-gray-400 my-4">

        <!-- FORM BERITA -->
            
        <form wire:submit.prevent="store" wire:key="form-berita-{{ $editId ?? 'new' }}" class="space-y-6 mb-8">
            <div class="flex flex-wrap gap-6">
                <!-- CARD GAMBAR -->
                <div class="relative flex flex-col items-center border border-gray-300 rounded shadow p-8 space-y-6 w-96 h-80 justify-center">
                    @if ($gambar_berita)
                        <button type="button" class="absolute top-2 right-2 text-red-600 text-4xl leading-none" wire:click="$set('gambar_berita', null)">×</button>
                        <div class="w-full flex justify-center">
                            <img src="{{ $gambar_berita->temporaryUrl() }}" class="h-40 w-auto object-cover rounded">
                        </div>
                    @elseif ($gambar_lama)
                        <button type="button" class="absolute top-2 right-2 text-red-600 text-4xl leading-none" wire:click="$set('gambar_lama', null)">×</button>
                        <div class="w-full flex justify-center">
                            <img src="{{ asset('storage/' . $gambar_lama) }}" class="h-40 w-auto object-cover rounded">
                        </div>
                    @else
                        <label class="inline-block bg-blue-600 text-white px-6 py-2 rounded-full cursor-pointer hover:bg-blue-700 text-center">
                            Upload Gambar
                            <input type="file" wire:model="gambar_berita" class="hidden" />
                        </label>
                    @endif
                    @error('gambar_berita') <span class="text-red-600 text-sm block mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- INPUT JUDUL -->
                <div class="flex-1 min-w-[300px] mt-[110px]">
                    <label class="block mb-1 font-semibold">Judul</label>
                <input
                    type="text"
                    wire:model="judul_berita"
                    wire:key="judul-berita-{{ $editId ?? 'new' }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2   placeholder-gray-400 text-gray-800"
                />

                    @error('judul_berita') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- INPUT ISI -->
            <div>
                <label class="block mb-1 font-semibold">Isi</label>
               <textarea
                wire:model="isi"
                wire:key="isi-berita-{{ $editId ?? 'new' }}"
                rows="6"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2  placeholder-gray-400 text-gray-800 resize-y max-h-60"
            ></textarea>

                @error('isi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- TOMBOL SIMPAN -->
            <div class="flex justify-end space-x-2">
                @if ($editId)
                    <button type="button" wire:click="cancelEdit" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">
                        Batal Edit
                    </button>
                    <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">
                        Update
                    </button>
                @else
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Simpan
                    </button>
                @endif
            </div>
        </form>
    </div>

    <!-- WRAPPER TABLE -->
    <div class="w-full p-6 space-y-4">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Daftar Berita</h2>

        <!-- Search kanan atas -->
      <!-- Search bar sejajar dengan table -->
<div class="w-full overflow-x-auto mb-4 ">
    <div class="flex justify-end mr-5">
        <input
            type="text"
            wire:model.live="katakunci"
            placeholder="Cari berita..."
            class="w-full max-w-sm px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 text-gray-800"
        />
    </div>
</div>


        <div class="overflow-x-auto">
            <table class="min-w-[1260px] border-collapse border border-gray-300 text-sm table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-center">No</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Gambar</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Judul</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Isi</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Publish</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beritaList as $index => $item)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                {{ ($beritaList->currentPage() - 1) * $beritaList->perPage() + $index + 1 }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <img src="{{ asset('storage/' . $item->gambar_berita) }}" class="h-28 w-auto object-cover mx-auto cursor-pointer hover:opacity-80 rounded transition-transform duration-200 hover:scale-105" onclick="showModal('{{ asset('storage/' . $item->gambar_berita) }}')">
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center font-semibold text-gray-800">
                                {{ $item->judul_berita }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-left text-gray-600 text-sm">
                                {{ Str::limit(strip_tags($item->isi), 120, '...') }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                @if ($item->publish)
                                    <span class="font-semibold">
                                        {{ \Carbon\Carbon::parse($item->publish)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                    </span>
                                @else
                                    <span class="text-gray-500 italic">Draft</span>
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button wire:click="edit({{ $item->id_berita }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    @if ($beritaList->isEmpty())
                        <tr>
                            <td colspan="6" class="border border-gray-300 px-4 py-4 text-center text-gray-500">
                                Tidak ada data ditemukan.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination kanan bawah -->
        <div class="flex justify-end mt-4">
            {{ $beritaList->links() }}
        </div>
    </div>

    <!-- MODAL GAMBAR -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-60 hidden flex items-center justify-center z-50" onclick="this.classList.add('hidden')">
        <img id="modalImage" src="" class="max-h-[80vh] max-w-[90vw] object-contain rounded shadow-lg">
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('resetFormInputs', () => {
            // Reset input file (wajib manual)
            const fileInput = document.querySelector('input[type="file"][wire\\:model="gambar_berita"]');
            if (fileInput) fileInput.value = '';

            // Reset judul berita (opsional jika kadang tidak bersih)
            const judulInput = document.querySelector('input[wire\\:model="judul_berita"]');
            if (judulInput) judulInput.value = '';

            // Reset isi berita (opsional jika kadang tidak bersih)
            const isiTextarea = document.querySelector('textarea[wire\\:model="isi"]');
            if (isiTextarea) isiTextarea.value = '';
        });
    });
</script>


<script>
    function showModal(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('modal').classList.remove('hidden');
    }
</script>
