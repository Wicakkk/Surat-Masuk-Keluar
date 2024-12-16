<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiSuratSeeder extends Seeder
{
    public function run()
    {
        DB::table('klasifikasi_surat')->insert([
            ['id' => '1', 'kode_klasifikasi' => '1a', 'nama_klasifikasi' => 'Sangat Rahasia'],
            ['id' => '2', 'kode_klasifikasi' => '2a', 'nama_klasifikasi' => 'Rahasia'],
            ['id' => '4', 'kode_klasifikasi' => '4a', 'nama_klasifikasi' => 'Konfidensial'],
            ['id' => '5', 'kode_klasifikasi' => '5a', 'nama_klasifikasi' => 'Biasa'],
        ]);
    }
}
