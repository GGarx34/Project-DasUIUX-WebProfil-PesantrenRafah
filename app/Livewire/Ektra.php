<?php

namespace App\Livewire;

use App\Models\Ekstra as ModelsEkstra;
use Livewire\Component;
use Livewire\WithFileUploads;

class Ektra extends Component
{
    use WithFileUploads;

    public $nama_ekstra;
    public $gambar_ekstra;
    public $dekskripsi;

    public $editId = null;
    public $gambar_lama = null;
    public $katakunci;

    public function render()
    {
        $ekstraList = $this->katakunci
            ? ModelsEkstra::where('nama_ekstra', 'like', '%' . $this->katakunci . '%')
                ->orderBy('id_extra', 'DESC')->paginate(5)
            : ModelsEkstra::orderBy('id_extra', 'DESC')->paginate(5);

        return view('livewire.ektra', ['ekstraList' => $ekstraList]);
    }
public function store()
{
    $rules = [
        'nama_ekstra' => 'required|string|max:100',
        'dekskripsi' => 'required|string',
    ];

    if (!$this->editId) {
        $rules['gambar_ekstra'] = 'required|image|mimes:jpg,jpeg,png';
    } else {
        $rules['gambar_ekstra'] = 'nullable|image|mimes:jpg,jpeg,png';
    }

    $pesan = [
        'nama_ekstra.required' => 'Nama ekstra wajib diisi.',
        'nama_ekstra.string' => 'Nama ekstra harus berupa teks.',
        'nama_ekstra.max' => 'Nama ekstra maksimal 100 karakter.',
        'dekskripsi.required' => 'Deskripsi wajib diisi.',
        'dekskripsi.string' => 'Deskripsi harus berupa teks.',
        'gambar_ekstra.required' => 'Gambar wajib diunggah.',
        'gambar_ekstra.image' => 'File harus berupa gambar.',
        'gambar_ekstra.mimes' => 'Format gambar harus berupa jpg, jpeg, atau png.',
    ];

    $this->validate($rules, $pesan);

    $nama_file = $this->gambar_lama;

    if ($this->gambar_ekstra) {
        $nama_file = 'foto_ekstra/' . time() . '_' . $this->gambar_ekstra->getClientOriginalName();
        $this->gambar_ekstra->storeAs('foto_ekstra', basename($nama_file), 'public');
    }

    if ($this->editId) {
        $ekstra = ModelsEkstra::where('id_extra', $this->editId)->firstOrFail();

        $ekstra->update([
            'nama_ekstra' => $this->nama_ekstra,
            'gambar_ekstra' => $nama_file,
            'dekskripsi' => $this->dekskripsi,
        ]);

        session()->flash('message', 'Ekstra berhasil diperbarui.');
        $this->cancelEdit();
    } else {
        ModelsEkstra::create([
            'nama_ekstra' => $this->nama_ekstra,
            'gambar_ekstra' => $nama_file,
            'dekskripsi' => $this->dekskripsi,
        ]);

        session()->flash('message', 'Ekstra berhasil ditambahkan.');
        $this->resetForm();
           $this->dispatch('resetFormInputs');
    }
}


    public function edit($id)
    {
        $ekstra = ModelsEkstra::where('id_extra', $id)->firstOrFail();

        $this->editId = $ekstra->id_extra;
        $this->nama_ekstra = $ekstra->nama_ekstra;
        $this->dekskripsi = $ekstra->dekskripsi;
        $this->gambar_lama = $ekstra->gambar_ekstra;
        $this->gambar_ekstra = null;
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

   public function resetForm()
{
    $this->editId = null;
    $this->nama_ekstra = '';
    $this->dekskripsi = '';
    $this->gambar_ekstra = null;
    $this->gambar_lama = null;

    
}

}
