<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstra extends Model
{
     protected $table = 'ekstra'; // Nama tabel (opsional kalau nama model = nama tabel)

    protected $primaryKey = 'id_extra'; // Kolom primary key

    protected $fillable = [
        'nama_ekstra',
        'dekskripsi',
        'gambar_ekstra',
    ];
}
