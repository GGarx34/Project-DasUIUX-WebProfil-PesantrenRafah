<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
     protected $table = 'fasilitas';

    protected $primaryKey = 'id_vasilitas';

    public $timestamps = false;

    protected $fillable = [
        'nama_fasilitas',
        'deskripsi',
        'foto',
    ];
}
