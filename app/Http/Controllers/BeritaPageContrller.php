<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaPageContrller extends Controller
{
    public function index()
    {
        $query = Berita::orderBy('id_berita', 'DESC');

    // Filter jika ada bulan & tahun
    if (request('bulan') && request('tahun')) {
        $query->whereMonth('publish', request('bulan'))
              ->whereYear('publish', request('tahun'));
    } elseif (request('bulan')) {
        $query->whereMonth('publish', request('bulan'));
    } elseif (request('tahun')) {
        $query->whereYear('publish', request('tahun'));
    }

    $beritaList = $query->paginate(9);

    return view('berita.index', compact('beritaList'));
    }

    function detailBerita($id)
    {
        $berita= Berita::findOrFail($id);

        return view('berita.detail-berita', compact('berita'));
       
    }
}
