<?php
// app/Models/MuatanKurikulum.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MuatanKurikulum extends Model
{

      protected $table = 'muatan_kurikulum';

    
     protected $primaryKey = 'id_spm';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'studi_syari',
        'bahasa_arab',
        'bahasa_inggris',
        'studi_kauni',
    ];
}
