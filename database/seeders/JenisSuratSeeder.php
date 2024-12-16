<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenis_surat')->insert([
            ['id' => '1', 'kodeSurat' => '1a', 'keterangan' => 'Biasa'],
            ['id' => '2', 'kodeSurat' => '2a', 'keterangan' => 'Kilat'],
            ['id' => '4', 'kodeSurat' => '4a', 'keterangan' => 'Nota Dinas'],
            ['id' => '5', 'kodeSurat' => '5a', 'keterangan' => 'Surat Telegram'],
            // Add more entries as needed
        ]);
    }
}
