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
        Schema::create('pendaftaran_siswa', function (Blueprint $table) {
            $table->id('id_ps');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('email')->nullable();
            $table->string('no_hp_siswa')->nullable();
            $table->string('nama_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('no_hp_ayah');
            $table->string('nama_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('no_hp_ibu');
        

            // Relasi wilayah
            $table->foreignId('provinsi_id')->constrained('provinsi');
            $table->foreignId('kabupaten_id')->constrained('kabupaten');
            $table->foreignId('kecamatan_id')->constrained('kecamatan');
            $table->foreignId('kelurahan_id')->constrained('kelurahan');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_santris');
    }
};
