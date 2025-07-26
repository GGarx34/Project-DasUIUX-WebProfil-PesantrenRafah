<div class="max-w-6xl mx-auto p-6 space-y-6">
    <h2 class="text-2xl font-bold text-center mb-4">MUATAN KURIKULUM Satuan Mu'adalah</h2>

    {{-- ALERT --}}
    @if (session()->has('message'))
        <div x-data="{ open: true }" x-show="open"
            class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded relative">
            <button @click="open = false"
                class="absolute top-2 right-2 text-xl font-bold text-yellow-600 hover:text-yellow-800">&times;</button>
            {{ session('message') }}
        </div>
    @endif

    {{-- FORM --}}
    <div class="bg-white shadow-md rounded p-4 border">
        <h3 class="font-semibold text-lg mb-3">Tambah Muatan Kurikulum</h3>
        <form wire:submit.prevent="simpan" wire:key="form-kurikulum">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium">Studi Syar'i</label>
                    <input type="text" wire:model.defer="studi_syari" class="w-full border rounded p-2" placeholder="Aqidah">
                </div>
                <div>
                    <label class="block text-sm font-medium">Bahasa Arab</label>
                    <input type="text" wire:model.defer="bahasa_arab" class="w-full border rounded p-2" placeholder="Durusul Lughoh">
                </div>
                <div>
                    <label class="block text-sm font-medium">Bahasa Inggris</label>
                    <input type="text" wire:model.defer="bahasa_inggris" class="w-full border rounded p-2" placeholder="Reading">
                </div>
                <div>
                    <label class="block text-sm font-medium">Studi Kauni</label>
                    <input type="text" wire:model.defer="studi_kauni" class="w-full border rounded p-2" placeholder="Matematika">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>

    {{-- TABEL --}}
    <div class="overflow-x-auto border rounded shadow bg-white">
        <table class="min-w-full text-sm text-gray-700 table-auto">
            <thead class="bg-gray-100 border-b text-center">
                <tr>
                    <th rowspan="2" class="p-3">STUDI SYAR'I</th>
                    <th colspan="2" class="p-3">STUDI BAHASA</th>
                    <th rowspan="2" class="p-3">STUDI KAUNI</th>
                </tr>
                <tr class="bg-gray-50">
                    <th class="p-3">Bahasa Arab</th>
                    <th class="p-3">Bahasa Inggris</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $columns = [
                        'studi_syari' => [],
                        'bahasa_arab' => [],
                        'bahasa_inggris' => [],
                        'studi_kauni' => [],
                    ];

                    foreach ($data as $item) {
                        if ($item->studi_syari) {
                            $columns['studi_syari'][] = ['id_spm' => $item->id_spm, 'value' => $item->studi_syari];
                        }
                        if ($item->bahasa_arab) {
                            $columns['bahasa_arab'][] = ['id_spm' => $item->id_spm, 'value' => $item->bahasa_arab];
                        }
                        if ($item->bahasa_inggris) {
                            $columns['bahasa_inggris'][] = ['id_spm' => $item->id_spm, 'value' => $item->bahasa_inggris];
                        }
                        if ($item->studi_kauni) {
                            $columns['studi_kauni'][] = ['id_spm' => $item->id_spm, 'value' => $item->studi_kauni];
                        }
                    }

                    $totalBaris = max(array_map('count', $columns));
                @endphp

                @for ($i = 0; $i < $totalBaris; $i++)
                    <tr class="border-b hover:bg-gray-50 text-center" wire:key="row-{{ $i }}">
                        <td class="p-3">
                            {{ $columns['studi_syari'][$i]['value'] ?? '' }}
                            @isset($columns['studi_syari'][$i])
                                <button wire:click="hapusKolom({{ $columns['studi_syari'][$i]['id_spm'] }}, 'studi_syari')" class="ml-2 text-red-500 hover:text-red-700 text-xs">&times;</button>
                            @endisset
                        </td>
                        <td class="p-3">
                            {{ $columns['bahasa_arab'][$i]['value'] ?? '' }}
                            @isset($columns['bahasa_arab'][$i])
                                <button wire:click="hapusKolom({{ $columns['bahasa_arab'][$i]['id_spm'] }}, 'bahasa_arab')" class="ml-2 text-red-500 hover:text-red-700 text-xs">&times;</button>
                            @endisset
                        </td>
                        <td class="p-3">
                            {{ $columns['bahasa_inggris'][$i]['value'] ?? '' }}
                            @isset($columns['bahasa_inggris'][$i])
                                <button wire:click="hapusKolom({{ $columns['bahasa_inggris'][$i]['id_spm'] }}, 'bahasa_inggris')" class="ml-2 text-red-500 hover:text-red-700 text-xs">&times;</button>
                            @endisset
                        </td>
                        <td class="p-3">
                            {{ $columns['studi_kauni'][$i]['value'] ?? '' }}
                            @isset($columns['studi_kauni'][$i])
                                <button wire:click="hapusKolom({{ $columns['studi_kauni'][$i]['id_spm'] }}, 'studi_kauni')" class="ml-2 text-red-500 hover:text-red-700 text-xs">&times;</button>
                            @endisset
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('resetFormInputs', () => {
            const fields = [
                'studi_syari',
                'bahasa_arab',
                'bahasa_inggris',
                'studi_kauni'
            ];

            fields.forEach(field => {
                const input = document.querySelector(`[wire\\:model\\.defer="${field}"]`);
                if (input) input.value = '';
            });
        });
    });
</script>
