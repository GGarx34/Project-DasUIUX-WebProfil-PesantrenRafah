<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ekstra;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::orderBy('id_vasilitas', 'DESC')->get();
        return view("fasilitas.index", compact('fasilitas'));
    }

    public function galeri(Request $request)
    {
        // Ambil gambar dari tabel Ekstra, beri label asal
        $extra = Ekstra::select('gambar_ekstra as gambar')
            ->get()
            ->map(function ($item) {
                return [
                    'gambar' => $item->gambar,
                    'tipe' => 'ekstra',
                ];
            });

        // Ambil gambar dari tabel Fasilitas, beri label asal
        $fasilitas = Fasilitas::select('foto as gambar')
            ->get()
            ->map(function ($item) {
                return [
                    'gambar' => $item->gambar,
                    'tipe' => 'fasilitas',
                ];
            });

        // Gabungkan, urutan: Ekstra dulu baru Fasilitas
        $gabungan = $extra->concat($fasilitas);

        // Pagination manual
        $perPage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $pagedData = $gabungan->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $galeri = new LengthAwarePaginator(
            $pagedData,
            $gabungan->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('galeri.index', compact('galeri'));
    }
}
