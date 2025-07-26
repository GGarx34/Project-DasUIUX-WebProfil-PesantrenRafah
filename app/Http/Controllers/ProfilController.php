<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    function visiMisi()
    {
        return view('profil.visi-misi');
    }
}
