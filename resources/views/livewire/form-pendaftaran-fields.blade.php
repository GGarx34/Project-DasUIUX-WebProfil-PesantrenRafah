<!-- Data Calon Siswa -->
<div class="col-span-2" >
    <h2 class="text-xl font-semibold border-b pb-2 mb-4">Data Calon Siswa</h2>
</div>

<div>
    <label class="font-semibold">Nama Lengkap</label>
    <input type="text" wire:model="nama_lengkap" class="input input-bordered w-full" placeholder="Nama Lengkap">
    @error('nama_lengkap') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="font-semibold">Jenis Kelamin</label>
    <select wire:model="jenis_kelamin" class="input input-bordered w-full">
        <option value="">Pilih Jenis Kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    @error('jenis_kelamin') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label class="font-semibold">Tempat Lahir</label>
    <input type="text" wire:model="tempat_lahir" class="input input-bordered w-full" placeholder="Tempat Lahir">
    @error('tempat_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="font-semibold">Tanggal Lahir</label>
    <input type="date" wire:model.live="tanggal_lahir" class="input input-bordered w-full">
    @error('tanggal_lahir') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label class="font-semibold">Email</label>
    <input type="text" wire:model.live="email" class="input input-bordered w-full" placeholder="Email">
    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="font-semibold">No HP Siswa</label>
    <input type="text" wire:model.live="no_hp_siswa" class="input input-bordered w-full" placeholder="No HP Siswa">
    @error('no_hp_siswa') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label class="font-semibold">Jenjang Pendidikan</label>
    <select wire:model="jenjang" class="input input-bordered w-full">
        <option value="">Pilih Jenjang Pendidikan</option>
        <option value="Belum Sekolah">Belum Sekolah</option>
        <option value="PAUD">PAUD</option>
        <option value="TK">TK / RA</option>
        <option value="SD">SD / MI</option>
        <option value="SMP">SMP / MTs</option>
        <option value="SMA">SMA / MA / SMK</option>
    </select>
    @error('jenjang') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>


<div>
    <label class="font-semibold">Provinsi</label>
    <select wire:model.lazy="provinsi_id" class="input input-bordered w-full">
        <option value="">Pilih Provinsi</option>
        @foreach ($provinsiList as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>
    @error('provinsi_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="font-semibold">Kabupaten</label>
    <select wire:model.lazy="kabupaten_id" class="input input-bordered w-full" @if(empty($kabupatenList)) disabled @endif>
        <option value="">Pilih Kabupaten</option>
        @foreach ($kabupatenList as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>
    @error('kabupaten_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label class="font-semibold">Kecamatan</label>
    <select wire:model.lazy="kecamatan_id" class="input input-bordered w-full" @if(empty($kecamatanList)) disabled @endif>
        <option value="">Pilih Kecamatan</option>
        @foreach ($kecamatanList as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>
    @error('kecamatan_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="font-semibold">Kelurahan</label>
    <select wire:model.lazy="kelurahan_id" class="input input-bordered w-full" @if(empty($kelurahanList)) disabled @endif>
        <option value="">Pilih Kelurahan</option>
        @foreach ($kelurahanList as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>
    @error('kelurahan_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="font-semibold">Kode Pos</label>
    <input type="text" wire:model.live="kode_pos" class="input input-bordered w-full" placeholder="kode pos">
    @error('kode_pos') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<!-- Data Ayah -->
<div class="col-span-2 pt-8">
    <h2 class="text-xl font-semibold border-b pb-2 mb-4">Data Ayah</h2>
</div>

<div>
    <label class="font-semibold">Nama Ayah</label>
    <input type="text" wire:model="nama_ayah" class="input input-bordered w-full" placeholder="Nama Ayah">
    @error('nama_ayah') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="font-semibold">Pendidikan Ayah</label>
    <select wire:model="pendidikan_ayah" class="input input-bordered w-full">
        <option value="">Pilih Pendidikan Terakhir</option>
        <option value="Tidak Sekolah">Tidak Sekolah</option>
        <option value="SD">SD / MI</option>
        <option value="SMP">SMP / MTs</option>
        <option value="SMA">SMA / MA / SMK</option>
        <option value="Diploma">D1 / D2 / D3</option>
        <option value="S1">S1 / Sarjana</option>
        <option value="S2">S2 / Magister</option>
        <option value="S3">S3 / Doktor</option>
    </select>
    @error('pendidikan_ayah') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label class="font-semibold">Pekerjaan Ayah</label>
    <input type="text" wire:model="pekerjaan_ayah" class="input input-bordered w-full" placeholder="Pekerjaan Ayah">
    @error('pekerjaan_ayah') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="font-semibold">No HP Ayah</label>
    <input type="text" wire:model.live="no_hp_ayah" class="input input-bordered w-full" placeholder="No HP Ayah">
    @error('no_hp_ayah') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<!-- Data Ibu -->
<div class="col-span-2 pt-8">
    <h2 class="text-xl font-semibold border-b pb-2 mb-4">Data Ibu</h2>
</div>

<div>
    <label class="font-semibold">Nama Ibu</label>
    <input type="text" wire:model="nama_ibu" class="input input-bordered w-full" placeholder="Nama Ibu">
    @error('nama_ibu') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label class="font-semibold">Pendidikan Ibu</label>
    <select wire:model="pendidikan_ibu" class="input input-bordered w-full">
        <option value="">Pilih Pendidikan Terakhir</option>
        <option value="Tidak Sekolah">Tidak Sekolah</option>
        <option value="SD">SD / MI</option>
        <option value="SMP">SMP / MTs</option>
        <option value="SMA">SMA / MA / SMK</option>
        <option value="Diploma">D1 / D2 / D3</option>
        <option value="S1">S1 / Sarjana</option>
        <option value="S2">S2 / Magister</option>
        <option value="S3">S3 / Doktor</option>
    </select>
    @error('pendidikan_ibu') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>


<div>
    <label class="font-semibold">Pekerjaan Ibu</label>
    <input type="text" wire:model="pekerjaan_ibu" class="input input-bordered w-full" placeholder="Pekerjaan Ibu">
    @error('pekerjaan_ibu') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
<div>
    <label class="font-semibold">No HP Ibu</label>
    <input type="text" wire:model.live="no_hp_ibu" class="input input-bordered w-full" placeholder="No HP Ibu">
    @error('no_hp_ibu') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
