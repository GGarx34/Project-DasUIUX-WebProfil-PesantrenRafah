<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Fasilitas;
use App\Models\Pendaftaran_santri;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class adminDashbord extends Controller
{
    public function index()
    {
        $berita = Berita::count();
        $fasilitas = Fasilitas::count();
        $siswa =    Pendaftaran_santri::count();

return view('utama-admin.index', [
    'berita' => $berita,
    'fasilitas' => $fasilitas,
    'siswa' => $siswa
    ]
);

    }
}
