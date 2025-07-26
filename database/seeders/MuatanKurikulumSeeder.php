<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MuatanKurikulum;

class MuatanKurikulumSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['studi_syari' => 'Aqidah', 'bahasa_arab' => 'Durusul lughoh', 'bahasa_inggris' => 'Reading', 'studi_kauni' => 'Pendidikan kewarganegaraan'],
            ['studi_syari' => 'Fiqih', 'bahasa_arab' => 'Al Insya\'', 'bahasa_inggris' => 'Grammar', 'studi_kauni' => 'Bahasa Indonesia'],
            ['studi_syari' => 'Al-Qur\'an', 'bahasa_arab' => 'Al Muthalaah', 'bahasa_inggris' => 'Dictation', 'studi_kauni' => 'Matematika'],
            ['studi_syari' => 'Tajwid', 'bahasa_arab' => 'Nahwu', 'bahasa_inggris' => 'Composition', 'studi_kauni' => 'Ilmu Pengetahuan Alam'],
            ['studi_syari' => 'Ushul fiqh', 'bahasa_arab' => 'Shorf', 'bahasa_inggris' => null, 'studi_kauni' => 'Ilmu Pengetahuan Sosial'],
            ['studi_syari' => 'Tafsir', 'bahasa_arab' => 'Tarikh Adab', 'bahasa_inggris' => null, 'studi_kauni' => 'Fisika'],
            ['studi_syari' => 'Faroid', 'bahasa_arab' => 'Balaghah', 'bahasa_inggris' => null, 'studi_kauni' => 'Biologi'],
            ['studi_syari' => 'Hadist', 'bahasa_arab' => 'Imla\'', 'bahasa_inggris' => null, 'studi_kauni' => 'Kimia'],
            ['studi_syari' => 'Musthalah Hadist', 'bahasa_arab' => 'Khot', 'bahasa_inggris' => null, 'studi_kauni' => 'Sejarah'],
            ['studi_syari' => 'Tarikh Islam', 'bahasa_arab' => null, 'bahasa_inggris' => null, 'studi_kauni' => 'Geografi'],
            ['studi_syari' => 'Al-adyan', 'bahasa_arab' => null, 'bahasa_inggris' => null, 'studi_kauni' => 'Ekonomi'],
            ['studi_syari' => 'Tarbiyah wa ta\'lim', 'bahasa_arab' => null, 'bahasa_inggris' => null, 'studi_kauni' => 'Sosiologi'],
            ['studi_syari' => 'Mahfudhat', 'bahasa_arab' => null, 'bahasa_inggris' => null, 'studi_kauni' => 'PKN'],
        ];

        foreach ($data as $row) {
            MuatanKurikulum::create($row);
        }
    }
}
