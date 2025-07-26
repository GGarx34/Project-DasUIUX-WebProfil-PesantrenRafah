<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Nama table (karena default-nya Laravel pakai jamak: 'beritas')
    protected $table = 'berita';

    // Primary Key
    protected $primaryKey = 'id_berita';

    // Field yang bisa diisi (fillable)
    protected $fillable = [
        'judul_berita',
        'gambar_berita',
        'publish',
        'isi',
    ];

    // Kalau kamu pakai field publish, bisa bikin cast ke datetime
    protected $casts = [
        'publish' => 'datetime',
    ];
}
