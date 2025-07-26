<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ekstra', function (Blueprint $table) {
            $table->id('id_extra');
            $table->string('nama_ekstra', 100);
            $table->text('dekskripsi');
            $table->string('gambar_ekstra', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstra');
    }
};
