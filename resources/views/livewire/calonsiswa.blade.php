@php
    use Carbon\Carbon;
@endphp

<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Manajemen Calon Siswa Baru</h1>

    {{-- Search Input --}}
  <div class="flex justify-end mb-6">
    <div class="relative w-full max-w-xs">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 5a6 6 0 104.472 10.472l4.528 4.528a1 1 0 001.415-1.414l-4.528-4.528A6 6 0 0011 5z" />
            </svg>
        </div>
        <input
            type="text"
            wire:model.live="search"
            placeholder="Cari nama/telepon..."
            class="w-full pl-10 pr-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400 text-sm"
        >
    </div>
</div>


    {{-- Tabel --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Jenis Kelamin</th>
                    <th class="px-4 py-3">Tanggal Lahir</th>
                    <th class="px-4 py-3">Nomor Telpon</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($santri as $index => $siswa)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ ($santri->currentPage() - 1) * $santri->perPage() + $index + 1 }}</td>
                        <td class="px-4 py-3 font-semibold">{{ $siswa->nama_lengkap }}</td>
                        <td class="px-4 py-3">{{ $siswa->jenis_kelamin }}</td>
                        <td class="px-4 py-3">{{ Carbon::parse($siswa->tanggal_lahir)->locale('id')->isoFormat('D MMMM Y') }}</td>
                        <td class="px-4 py-3">{{ $siswa->no_hp_siswa }}</td>
                        <td class="px-4 py-3">
                            <button wire:click="lihatDetail({{ $siswa->id_ps }})" class="px-3 py-1 text-white bg-blue-600 hover:bg-blue-700 rounded text-xs font-medium">Lihat Detail</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $santri->links() }}
        </div>
    </div>

    {{-- Modal --}}
    @if ($showModal && $detailSantri)
        <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl p-6 relative overflow-y-auto max-h-[90vh]">
                <button wire:click="tutupModal" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-xl font-bold">×</button>

                <h2 class="text-2xl font-bold mb-4 text-center text-blue-700">Detail Pendaftaran Santri</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div><strong>Nama Lengkap:</strong> {{ $detailSantri->nama_lengkap }}</div>
                    <div><strong>Jenis Kelamin:</strong> {{ $detailSantri->jenis_kelamin }}</div>
                    <div><strong>Tempat Lahir:</strong> {{ $detailSantri->tempat_lahir }}</div>
                    <div><strong>Tanggal Lahir:</strong> {{ Carbon::parse($detailSantri->tanggal_lahir)->locale('id')->isoFormat('D MMMM Y') }}</div>
                    <div><strong>Email:</strong> {{ $detailSantri->email ?? '-' }}</div>
                    <div><strong>No HP Siswa:</strong> {{ $detailSantri->no_hp_siswa ?? '-' }}</div>
                    <div><strong>Provinsi:</strong> {{ $detailSantri->provinsi->nama_provinsi ?? '-' }}</div>
                    <div><strong>Kabupaten:</strong> {{ $detailSantri->kabupaten->nama_kabupaten ?? '-' }}</div>
                    <div><strong>Kecamatan:</strong> {{ $detailSantri->kecamatan->nama_kecamatan ?? '-' }}</div>
                    <div><strong>Kelurahan:</strong> {{ $detailSantri->kelurahan->nama_kelurahan ?? '-' }}</div>
                    <div><strong>Kode Pos:</strong> {{ $detailSantri->kode_pos }}</div>
                    <div><strong>Jenjang:</strong> {{ $detailSantri->jenjang }}</div>

                    <hr class="col-span-2 border-t mt-4 mb-2">

                    <div><strong>Nama Ayah:</strong> {{ $detailSantri->nama_ayah }}</div>
                    <div><strong>Pendidikan Ayah:</strong> {{ $detailSantri->pendidikan_ayah }}</div>
                    <div><strong>Pekerjaan Ayah:</strong> {{ $detailSantri->pekerjaan_ayah }}</div>
                    <div><strong>No HP Ayah:</strong> {{ $detailSantri->no_hp_ayah }}</div>
                    <div><strong>Nama Ibu:</strong> {{ $detailSantri->nama_ibu }}</div>
                    <div><strong>Pendidikan Ibu:</strong> {{ $detailSantri->pendidikan_ibu }}</div>
                    <div><strong>Pekerjaan Ibu:</strong> {{ $detailSantri->pekerjaan_ibu }}</div>
                    <div><strong>No HP Ibu:</strong> {{ $detailSantri->no_hp_ibu }}</div>
                </div>

                <div class="mt-6 text-center">
                    <button wire:click="tutupModal" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded">Tutup</button>
                </div>
            </div>
        </div>
    @endif
</div>
