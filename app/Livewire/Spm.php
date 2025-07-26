<?php

namespace App\Livewire;

use App\Models\MuatanKurikulum;
use Livewire\Component;

class Spm extends Component
{
    public $studi_syari, $bahasa_arab, $bahasa_inggris, $studi_kauni;

    public function simpan()
    {
        if (
            empty($this->studi_syari) &&
            empty($this->bahasa_arab) &&
            empty($this->bahasa_inggris) &&
            empty($this->studi_kauni)
        ) {
            session()->flash('message', 'Minimal isi salah satu bidang.');
            return;
        }

        MuatanKurikulum::create([
            'studi_syari' => $this->studi_syari,
            'bahasa_arab' => $this->bahasa_arab,
            'bahasa_inggris' => $this->bahasa_inggris,
            'studi_kauni' => $this->studi_kauni,
        ]);

        $this->resetForm();
        $this->dispatch('resetFormInputs');
    }

    public function resetForm()
    {
        $this->reset(['studi_syari', 'bahasa_arab', 'bahasa_inggris', 'studi_kauni']);
    }

    public function hapusKolom($id_spm, $field)
    {
        $item = MuatanKurikulum::find($id_spm);
        if ($item && in_array($field, ['studi_syari', 'bahasa_arab', 'bahasa_inggris', 'studi_kauni'])) {
            $item->$field = null;
            $item->save();
        }
    }

    public function render()
    {
        $data = MuatanKurikulum::latest()->get();
        return view('livewire.spm', compact('data'));
    }
}
