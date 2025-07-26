<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ekstra;
use App\Models\MuatanKurikulum;
use Illuminate\Http\Request;

class ProgramPageContrller extends Controller
{
    public function tahfidz()
    {
        return view("program.tahfidz");
    }

    function extra()
    {

        $ekstrakurikuler = Ekstra::orderBy('id_extra', 'DESC')->get();
        return view("program.extra", compact('ekstrakurikuler'));
    }


    function spm()
    {
        $data = MuatanKurikulum::latest()->get();
        return view('program.spm', compact('data'));
    }
    function kurikulum()
    {
        return view("program.kurikulum");
    }
    function jadwal()
    {

        return view("program.jadwal");
    }
    function sistem()
    {

        return view("program.sistem");
    }
}
