<?php

namespace App\Livewire;

use App\Models\Fasilitas as ModelsFasilitas;
use Livewire\Component;
use Livewire\WithFileUploads;

class Fasilitas extends Component
{
    use WithFileUploads;

    public $nama_fasilitas;
    public $foto_fasilitas;
    public $deskripsi;
    public $editId = null;
    public $foto_lama = null;
    public $katakunci;

    public function render()
    {
        $query = ModelsFasilitas::query();

        if ($this->katakunci) {
            $query->where('nama_fasilitas', 'like', '%' . $this->katakunci . '%');
        }

        $fasilitasList = $query->orderBy('id_vasilitas', 'desc')->paginate(5);

        return view('livewire.fasilitas', [
            'fasilitasList' => $fasilitasList,
        ]);
    }

    public function store()
    {
        $rules = [
            'nama_fasilitas' => 'required|string|max:100',
            'deskripsi' => 'required|string',
        ];

        if (!$this->editId) {
            $rules['foto_fasilitas'] = 'required|image|mimes:jpg,jpeg,png';
        } else {
            $rules['foto_fasilitas'] = 'nullable|image|mimes:jpg,jpeg,png';
        }

        $messages = [
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto_fasilitas.required' => 'Gambar wajib diunggah.',
            'foto_fasilitas.image' => 'File harus berupa gambar.',
            'foto_fasilitas.mimes' => 'Format gambar harus jpg, jpeg, atau png.',
        ];

        $this->validate($rules, $messages);

        $nama_file = $this->foto_lama;

        if ($this->foto_fasilitas) {
            $nama_file = 'foto_fasilitas/' . time() . '_' . $this->foto_fasilitas->getClientOriginalName();
            $this->foto_fasilitas->storeAs('foto_fasilitas', basename($nama_file), 'public');
        }

        if ($this->editId) {
            ModelsFasilitas::where('id_vasilitas', $this->editId)->update([
                'nama_fasilitas' => $this->nama_fasilitas,
                'deskripsi' => $this->deskripsi,
                'foto' => $nama_file,
            ]);

            session()->flash('message', 'Fasilitas berhasil diperbarui.');
        } else {
            ModelsFasilitas::create([
                'nama_fasilitas' => $this->nama_fasilitas,
                'deskripsi' => $this->deskripsi,
                'foto' => $nama_file,
            ]);

            session()->flash('message', 'Fasilitas berhasil ditambahkan.');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $fasilitas = ModelsFasilitas::findOrFail($id);

        $this->editId = $fasilitas->id_vasilitas;
        $this->nama_fasilitas = $fasilitas->nama_fasilitas;
        $this->deskripsi = $fasilitas->deskripsi;
        $this->foto_lama = $fasilitas->foto;
        $this->foto_fasilitas = null;
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['editId', 'nama_fasilitas', 'foto_fasilitas', 'deskripsi', 'foto_lama']);
        $this->resetValidation();
        $this->dispatch('resetFormInputs');
    }
}
