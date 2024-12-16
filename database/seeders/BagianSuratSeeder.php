<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BagianSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bagian_surat')->insert([
            ['id' => '02', 'nama_bagian' => 'DIRBINDFUNG'],
            ['id' => '03', 'nama_bagian' => 'DIRBINUM'],
            ['id' => '04', 'nama_bagian' => 'DIRBINDIKLAT'],
            ['id' => '05', 'nama_bagian' => 'DIRBINMAT'],
            ['id' => '06', 'nama_bagian' => 'KAPOK ANALIS'],
            ['id' => '07', 'nama_bagian' => 'DANSATLAK TAULIH'],
            ['id' => '08', 'nama_bagian' => 'DASANTLAK SANDI'],
            ['id' => '09', 'nama_bagian' => 'DASANTLAK OFFENSIF'],
            ['id' => '10', 'nama_bagian' => 'DASANTLAK DEFENSIF'],
        ]);
    }
}
