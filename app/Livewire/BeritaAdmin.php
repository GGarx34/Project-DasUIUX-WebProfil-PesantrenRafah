<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Berita;

class BeritaAdmin extends Component
{
    use WithFileUploads;

    public $judul_berita;
    public $gambar_berita;
    public $isi;

    public $editId = null;
    public $gambar_lama = null;
    public $katakunci;

    public function render()
    {


        $beritaList = $this->katakunci
            ? Berita::where('judul_berita', 'like', '%' . $this->katakunci . '%')->orderBy('id_berita', 'DESC')->paginate(5)
            : Berita::latest()->paginate(5);


        return view('livewire.berita-admin', ['beritaList' => $beritaList]);
    }

    public function store()
    {
        $rules = [
            'judul_berita' => 'required|string|max:100',
            'isi' => 'required|string',
        ];

        $rules['gambar_berita'] = $this->editId
            ? 'nullable|image|mimes:jpg,jpeg,png,webp'
            : 'required|image|mimes:jpg,jpeg,png,webp';

        $pesan = [
            'judul_berita.required' => 'Judul berita wajib diisi.',
            'isi.required' => 'Isi berita wajib diisi.',
            'gambar_berita.required' => 'Gambar berita wajib diunggah.',
            'gambar_berita.image' => 'File harus berupa gambar.',
            'gambar_berita.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
        ];

        $this->validate($rules, $pesan);

        $nama_file = $this->gambar_lama;

        if ($this->gambar_berita) {
            $nama_file = 'foto_berita/' . time() . '_' . $this->gambar_berita->getClientOriginalName();
            $this->gambar_berita->storeAs('foto_berita', basename($nama_file), 'public');
        }

        if ($this->editId) {
            $berita = Berita::where('id_berita', $this->editId)->firstOrFail();
            $berita->update([
                'judul_berita' => $this->judul_berita,
                'gambar_berita' => $nama_file,
                'isi' => $this->isi,
            ]);
            session()->flash('message', 'Berita berhasil diperbarui.');
            $this->cancelEdit();
        } else {
            Berita::create([
                'judul_berita' => $this->judul_berita,
                'gambar_berita' => $nama_file,
                'isi' => $this->isi,
                'publish' => now(),
            ]);
            session()->flash('message', 'Berita berhasil ditambahkan.');
            $this->resetForm();
             $this->dispatch('resetFormInputs');
        }
    }

    public function edit($id)
    {
        $berita = Berita::where('id_berita', $id)->firstOrFail();
        $this->editId = $berita->id_berita;
        $this->judul_berita = $berita->judul_berita;
        $this->isi = $berita->isi;
        $this->gambar_lama = $berita->gambar_berita;
        $this->gambar_berita = null;
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->editId = null;
        $this->judul_berita = '';
        $this->isi = '';
        $this->gambar_berita = null;
        $this->gambar_lama = null;
    }
}
