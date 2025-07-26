<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pendaftaran_santri;

class PendaftaranSiswa extends Component
{
    public $nama_lengkap, $jenis_kelamin, $tanggal_lahir, $tempat_lahir;
    public $email, $no_hp_siswa;
    public $nama_ayah, $pendidikan_ayah, $pekerjaan_ayah, $no_hp_ayah;
    public $nama_ibu, $pendidikan_ibu, $pekerjaan_ibu, $no_hp_ibu;

    public $kode_pos,$jenjang;


    public $provinsiList = [], $kabupatenList = [], $kecamatanList = [], $kelurahanList = [];
    public $provinsi_id, $kabupaten_id, $kecamatan_id, $kelurahan_id;
    public $modePreview = false;

    public $generated_username, $generated_password_plain;

    public function tampilkanPreview()
    {
        $this->validate();
        $this->modePreview = true;
    }

    public function kembaliKeForm()
    {
        $this->modePreview = false;
    }

    public function mount()
    {
        $this->provinsiList = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json')->json();
    }

    public function updatedProvinsiId($value)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$value}.json");
        $this->kabupatenList = $response->successful() ? $response->json() : [];
        $this->kabupaten_id = null;
        $this->kecamatanList = [];
        $this->kelurahanList = [];
    }

    public function updatedKabupatenId($value)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/districts/{$value}.json");
        $this->kecamatanList = $response->successful() ? $response->json() : [];
        $this->kecamatan_id = null;
        $this->kelurahanList = [];
    }

    public function updatedKecamatanId($value)
    {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/villages/{$value}.json");
        $this->kelurahanList = $response->successful() ? $response->json() : [];
        $this->kelurahan_id = null;
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['email', 'no_hp_siswa', 'no_hp_ayah', 'no_hp_ibu', 'tanggal_lahir','kode_pos'])) {
            $this->validateOnly($propertyName);
        }
    }

    public function rules()
{
    return [
        'nama_lengkap' => 'required|string|min:3|max:100',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tempat_lahir' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date|before:today',
        'email' => 'required|email:rfc,dns|max:100',
        'no_hp_siswa' => 'required|digits_between:10,15|regex:/^[0-9]+$/',
        'nama_ayah' => 'required|string|max:100',
        'pendidikan_ayah' => 'required|string|max:100',
        'pekerjaan_ayah' => 'required|string|max:100',
        'no_hp_ayah' => 'required|digits_between:10,15|regex:/^[0-9]+$/',
        'nama_ibu' => 'required|string|max:100',
        'pendidikan_ibu' => 'required|string|max:100',
        'pekerjaan_ibu' => 'required|string|max:100',
        'no_hp_ibu' => 'required|digits_between:10,15|regex:/^[0-9]+$/',
        'provinsi_id' => 'required|numeric',
        'kabupaten_id' => 'required|numeric',
        'kecamatan_id' => 'required|numeric',
        'kelurahan_id' => 'required|numeric',
        'kode_pos' => 'required|digits:5',
        'jenjang' => 'required|string|max:50',
    ];
}

public function messages()
{
    return [
        'required' => ':attribute wajib diisi.',
        'string' => ':attribute harus berupa teks.',
        'numeric' => ':attribute harus berupa angka.',
        'email' => 'Format email tidak valid, harus mengandung @ dan domain.',
        'regex' => ':attribute hanya boleh berupa angka.',
        'min' => ':attribute minimal :min karakter.',
        'max' => ':attribute maksimal :max karakter.',
        'digits_between' => ':attribute harus terdiri dari :min sampai :max digit.',
        'digits' => ':attribute harus terdiri dari :digits digit.',
        'in' => ':attribute tidak valid.',
        'date' => ':attribute harus berupa tanggal.',
        'before' => ':attribute harus sebelum hari ini.',
    ];
}

public function attributes()
{
    return [
        'nama_lengkap' => 'Nama Lengkap',
        'jenis_kelamin' => 'Jenis Kelamin',
        'tempat_lahir' => 'Tempat Lahir',
        'tanggal_lahir' => 'Tanggal Lahir',
        'email' => 'Email',
        'no_hp_siswa' => 'Nomor HP Siswa',
        'nama_ayah' => 'Nama Ayah',
        'pendidikan_ayah' => 'Pendidikan Ayah',
        'pekerjaan_ayah' => 'Pekerjaan Ayah',
        'no_hp_ayah' => 'Nomor HP Ayah',
        'nama_ibu' => 'Nama Ibu',
        'pendidikan_ibu' => 'Pendidikan Ibu',
        'pekerjaan_ibu' => 'Pekerjaan Ibu',
        'no_hp_ibu' => 'Nomor HP Ibu',
        'provinsi_id' => 'Provinsi',
        'kabupaten_id' => 'Kabupaten',
        'kecamatan_id' => 'Kecamatan',
        'kelurahan_id' => 'Kelurahan',
        'kode_pos' => 'Kode Pos',
        'jenjang' => 'Jenjang Pendidikan',
    ];
}


    public function simpan()
    {
        $this->validate();

        $provinsi = Provinsi::firstOrCreate(
            ['id' => $this->provinsi_id],
            ['nama_provinsi' => collect($this->provinsiList)->firstWhere('id', $this->provinsi_id)['name'] ?? '-']
        );

        $kabupaten = Kabupaten::firstOrCreate(
            ['id' => $this->kabupaten_id],
            [
                'provinsi_id' => $provinsi->id,
                'nama_kabupaten' => collect($this->kabupatenList)->firstWhere('id', $this->kabupaten_id)['name'] ?? '-'
            ]
        );

        $kecamatan = Kecamatan::firstOrCreate(
            ['id' => $this->kecamatan_id],
            [
                'kabupaten_id' => $kabupaten->id,
                'nama_kecamatan' => collect($this->kecamatanList)->firstWhere('id', $this->kecamatan_id)['name'] ?? '-'
            ]
        );

        $kelurahan = Kelurahan::firstOrCreate(
            ['id' => $this->kelurahan_id],
            [
                'kecamatan_id' => $kecamatan->id,
                'nama_kelurahan' => collect($this->kelurahanList)->firstWhere('id', $this->kelurahan_id)['name'] ?? '-'
            ]
        );

        // Username & Password
        $username = Str::slug($this->nama_lengkap) . rand(100, 999);
        $password_plain = Str::random(8);
        $password_hashed = Hash::make($password_plain);

        Pendaftaran_santri::create([
            'nama_lengkap' => $this->nama_lengkap,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'email' => $this->email,
            'no_hp_siswa' => $this->no_hp_siswa,
            'nama_ayah' => $this->nama_ayah,
            'pendidikan_ayah' => $this->pendidikan_ayah,
            'pekerjaan_ayah' => $this->pekerjaan_ayah,
            'no_hp_ayah' => $this->no_hp_ayah,
            'nama_ibu' => $this->nama_ibu,
            'pendidikan_ibu' => $this->pendidikan_ibu,
            'pekerjaan_ibu' => $this->pekerjaan_ibu,
            'no_hp_ibu' => $this->no_hp_ibu,
            'kode_pos' => $this->kode_pos,
            'jenjang' => $this->jenjang,
            'provinsi_id' => $provinsi->id,
            'kabupaten_id' => $kabupaten->id,
            'kecamatan_id' => $kecamatan->id,
            'kelurahan_id' => $kelurahan->id,


            // tambahan username dan password
            'username' => $username,
            'password' => $password_hashed,
        ]);

        $this->generated_username = $username;
        $this->generated_password_plain = $password_plain;

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text' => 'Pendaftaran siswa berhasil disimpan.',
            'icon' => 'success',
        ]);

        $this->dispatch('resetFormInputs');
        $this->reset([
            'nama_lengkap', 'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir',
            'email', 'no_hp_siswa', 'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'no_hp_ayah',
            'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'no_hp_ibu',
            'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'kelurahan_id','kode_pos','jenjang',
        ]);
    }

    public function render()
    {
        return view('livewire.pendaftaran-siswa');
    }
}
