<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuatanKurikulumsTable extends Migration
{
    public function up(): void
    {
        Schema::create('muatan_kurikulum', function (Blueprint $table) {
            $table->id('id_spm');
            $table->text('studi_syari')->nullable();
            $table->text('bahasa_arab')->nullable();
            $table->text('bahasa_inggris')->nullable();
            $table->text('studi_kauni')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('muatan_kurikulum');
    }
}
