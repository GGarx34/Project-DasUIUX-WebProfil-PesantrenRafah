{{-- 

<div class="max-w-6xl mx-auto px-4 py-10" >
    <h1 class="text-4xl font-bold mb-10 text-center">Formulir Pendaftaran</h1>

    @if ($modePreview)
        <div class="space-y-6">
            <h2 class="text-2xl font-semibold border-b pb-4">Pratinjau Data</h2>

            <div class="grid grid-cols-2 gap-6 bg-white shadow rounded-lg p-6">
                <div><span class="font-semibold">Nama Lengkap:</span> {{ $nama_lengkap }}</div>
                <div><span class="font-semibold">Jenis Kelamin:</span> {{ $jenis_kelamin }}</div>
                <div><span class="font-semibold">Tempat Lahir:</span> {{ $tempat_lahir }}</div>
                <div><span class="font-semibold">Tanggal Lahir:</span> {{ $tanggal_lahir }}</div>
                <div><span class="font-semibold">Email:</span> {{ $email }}</div>
                <div><span class="font-semibold">No HP Siswa:</span> {{ $no_hp_siswa }}</div>
                <div><span class="font-semibold">Provinsi:</span> {{ optional(collect($provinsiList)->firstWhere('id', $provinsi_id))['name'] }}</div>
                <div><span class="font-semibold">Kabupaten:</span> {{ optional(collect($kabupatenList)->firstWhere('id', $kabupaten_id))['name'] }}</div>
                <div><span class="font-semibold">Kecamatan:</span> {{ optional(collect($kecamatanList)->firstWhere('id', $kecamatan_id))['name'] }}</div>
                <div><span class="font-semibold">Kelurahan:</span> {{ optional(collect($kelurahanList)->firstWhere('id', $kelurahan_id))['name'] }}</div>
                <div><span class="font-semibold">Nama Ayah:</span> {{ $nama_ayah }}</div>
                <div><span class="font-semibold">Pendidikan Ayah:</span> {{ $pendidikan_ayah }}</div>
                <div><span class="font-semibold">Pekerjaan Ayah:</span> {{ $pekerjaan_ayah }}</div>
                <div><span class="font-semibold">No HP Ayah:</span> {{ $no_hp_ayah }}</div>
                <div><span class="font-semibold">Nama Ibu:</span> {{ $nama_ibu }}</div>
                <div><span class="font-semibold">Pendidikan Ibu:</span> {{ $pendidikan_ibu }}</div>
                <div><span class="font-semibold">Pekerjaan Ibu:</span> {{ $pekerjaan_ibu }}</div>
                <div><span class="font-semibold">No HP Ibu:</span> {{ $no_hp_ibu }}</div>
            </div>

            <div class="flex justify-between mt-8">
                <button wire:click.prevent="kembaliKeForm" class="flex items-center gap-2 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Form
                </button>
                <button wire:click.prevent="simpan" class="btn btn-primary">Kirim Pendaftaran</button>
            </div>
        </div>
    @else
        <form wire:submit.prevent="tampilkanPreview" class="grid grid-cols-2 gap-6">
            @include('livewire.form-pendaftaran-fields')
            <div class="col-span-2">
                <button type="submit" class="btn btn-primary w-full mt-2">Lihat Pratinjau</button>
            </div>
        </form>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('swal', ({ title, text, icon }) => {
                Swal.fire({
                    title: title ?? 'Kamu Berhasil Mendaftar!',
                    text: text ?? '',
                    icon: icon ?? 'success',
                    confirmButtonText: 'Oke'
                });
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('resetFormInputs', () => {
                const inputs = document.querySelectorAll('form input:not([type="hidden"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]), form textarea, form select');

                inputs.forEach(input => {
                    if (input.type === 'date' || input.type === 'text' || input.type === 'email' || input.tagName === 'TEXTAREA') {
                        input.value = '';
                    } else if (input.tagName === 'SELECT') {
                        input.selectedIndex = 0;
                    }
                });
            });
        });
    </script>
</div> --}}

<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-4xl font-bold mb-10 text-center">Formulir Pendaftaran</h1>
@if ($generated_username && $generated_password_plain)
    <div class="max-w-2xl mx-auto bg-white border border-green-300 rounded-xl p-6 shadow-md space-y-6">
        <h2 class="text-3xl font-bold text-green-700 text-center">🎉 Pendaftaran Berhasil!</h2>

        <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-lg text-green-800 space-y-2">
            <p><strong>Username:</strong> {{ $generated_username }}</p>
            <p><strong>Password:</strong> {{ $generated_password_plain }}</p>
        </div>

        <div class="bg-gray-50 p-4 rounded-md text-lg text-gray-700 space-y-3">
            <p>✅ Data kamu telah berhasil disimpan ke sistem kami.</p>
            <p>📌 Simpan informasi akun di atas untuk login ke sistem santri.</p>
            <p>📅 Pengumuman lebih lanjut akan disampaikan oleh panitia melalui WhatsApp dan website resmi.</p>
        </div>

        <div class="bg-yellow-50 p-4 rounded-md text-lg text-yellow-800 space-y-2 border border-yellow-300">
            <p class="font-semibold">❓ Butuh bantuan atau informasi lebih lanjut?</p>
            <ul class="list-disc pl-5 space-y-1">
                <li>Hubungi panitia via WhatsApp: <strong>08 822-1727-3477</strong></li>
                <li>Email resmi: <strong>pesantrenrafah@gmail.com</strong></li>
            </ul>
        </div>

        <div class="text-center">
            <a  href="/pendaftaran" class="mt-4 btn inline-flex items-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white text-base font-semibold rounded-lg transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Formulir
            </a>
        </div>
    </div>


    @elseif ($modePreview)
        <div class="space-y-6">
            <h2 class="text-2xl font-semibold border-b pb-4">Pratinjau Data</h2>

          <div class="grid md:grid-cols-2 grid-cols-1 gap-6 bg-white shadow rounded-lg p-6 text-gray-800">
    {{-- Data Calon Siswa --}}
    <h3 class="md:col-span-2 font-bold text-lg text-blue-600 border-b pb-1">📌 Data Calon Siswa</h3>
    <div><span class="font-semibold">Nama Lengkap:</span> {{ $nama_lengkap }}</div>
    <div><span class="font-semibold">Jenis Kelamin:</span> {{ $jenis_kelamin }}</div>
    <div><span class="font-semibold">Tempat Lahir:</span> {{ $tempat_lahir }}</div>
    <div><span class="font-semibold">Tanggal Lahir:</span> {{ $tanggal_lahir }}</div>
    <div><span class="font-semibold">Email:</span> {{ $email }}</div>
    <div><span class="font-semibold">No HP Siswa:</span> {{ $no_hp_siswa }}</div>
    <div><span class="font-semibold">Provinsi:</span> {{ optional(collect($provinsiList)->firstWhere('id', $provinsi_id))['name'] }}</div>
    <div><span class="font-semibold">Kabupaten:</span> {{ optional(collect($kabupatenList)->firstWhere('id', $kabupaten_id))['name'] }}</div>
    <div><span class="font-semibold">Kecamatan:</span> {{ optional(collect($kecamatanList)->firstWhere('id', $kecamatan_id))['name'] }}</div>
    <div><span class="font-semibold">Kelurahan:</span> {{ optional(collect($kelurahanList)->firstWhere('id', $kelurahan_id))['name'] }}</div>
    <div><span class="font-semibold">Kode Pos:</span> {{ $kode_pos }}</div>
    <div><span class="font-semibold">Jenjang:</span> {{ $jenjang }}</div>

    {{-- Data Ayah --}}
    <h3 class="md:col-span-2 font-bold text-lg text-blue-600 border-b pt-4 pb-1 mt-4">👨‍👧 Data Ayah</h3>
    <div><span class="font-semibold">Nama Ayah:</span> {{ $nama_ayah }}</div>
    <div><span class="font-semibold">Pendidikan Ayah:</span> {{ $pendidikan_ayah }}</div>
    <div><span class="font-semibold">Pekerjaan Ayah:</span> {{ $pekerjaan_ayah }}</div>
    <div><span class="font-semibold">No HP Ayah:</span> {{ $no_hp_ayah }}</div>

    {{-- Data Ibu --}}
    <h3 class="md:col-span-2 font-bold text-lg text-blue-600 border-b pt-4 pb-1 mt-4">👩‍👧 Data Ibu</h3>
    <div><span class="font-semibold">Nama Ibu:</span> {{ $nama_ibu }}</div>
    <div><span class="font-semibold">Pendidikan Ibu:</span> {{ $pendidikan_ibu }}</div>
    <div><span class="font-semibold">Pekerjaan Ibu:</span> {{ $pekerjaan_ibu }}</div>
    <div><span class="font-semibold">No HP Ibu:</span> {{ $no_hp_ibu }}</div>
</div>


            <div class="flex justify-between mt-8">
                <button wire:click.prevent="kembaliKeForm" class="flex items-center gap-2 px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Form
                </button>
                <button wire:click.prevent="simpan" class="btn btn-primary">Kirim Pendaftaran</button>
            </div>
        </div>
    @else
        <form wire:submit.prevent="tampilkanPreview" class="grid grid-cols-2 gap-6">
            @include('livewire.form-pendaftaran-fields')
            <div class="col-span-2">
                <button type="submit" class="btn btn-primary w-full mt-2">Lihat Pratinjau</button>
            </div>
        </form>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('swal', ({ title, text, icon }) => {
                Swal.fire({
                    title: title ?? 'Kamu Berhasil Mendaftar!',
                    text: text ?? '',
                    icon: icon ?? 'success',
                    confirmButtonText: 'Oke'
                });
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('resetFormInputs', () => {
                const inputs = document.querySelectorAll('form input:not([type="hidden"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]), form textarea, form select');

                inputs.forEach(input => {
                    if (input.type === 'date' || input.type === 'text' || input.type === 'email' || input.tagName === 'TEXTAREA') {
                        input.value = '';
                    } else if (input.tagName === 'SELECT') {
                        input.selectedIndex = 0;
                    }
                });
            });
        });
    </script>
</div>

