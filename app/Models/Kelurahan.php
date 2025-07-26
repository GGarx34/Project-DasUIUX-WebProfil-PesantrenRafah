<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';
    protected $fillable = ['kecamatan_id', 'nama_kelurahan'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
