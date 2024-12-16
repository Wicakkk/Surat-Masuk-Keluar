<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TujuanSuratSeeder extends Seeder
{
    public function run()
    {
        DB::table('tujuan_surat')->insert([
            ['id' => '1', 'kode_tujuan' => '1', 'keterangan' => 'KASAD'],
            ['id' => '2', 'kode_tujuan' => '2', 'keterangan' => 'WAKASAD'],
        ]);
    }
}
