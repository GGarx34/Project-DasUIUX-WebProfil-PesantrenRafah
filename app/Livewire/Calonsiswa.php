<?php

namespace App\Livewire;

use App\Models\Pendaftaran_santri;
use Livewire\Component;
use Livewire\WithPagination;

class Calonsiswa extends Component
{
    use WithPagination;

    public $detailSantri = null;
    public $showModal = false;
    public $search = '';
    protected $paginationTheme = 'tailwind';

    public function lihatDetail($id)
    {
        $this->detailSantri = Pendaftaran_santri::with(['provinsi', 'kabupaten', 'kecamatan', 'kelurahan'])
            ->findOrFail($id);
        $this->showModal = true;
    }

    public function tutupModal()
    {
        $this->showModal = false;
        $this->detailSantri = null;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $santri = Pendaftaran_santri::with(['provinsi', 'kabupaten', 'kecamatan', 'kelurahan'])
            ->where(function ($query) {
                $query->where('nama_lengkap', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('no_hp_siswa', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nama_lengkap')
            ->paginate(15);

        return view('livewire.calonsiswa', compact('santri'));
    }
}
