<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'superadmin'
        ]);
        User::create([
            'id' => 2,
            'name' => 'KOMANDAN',
            'email' => 'komandan@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'komandan'
        ]);
        User::create([
            'id' => 3,
            'name' => 'WAKIL KOMANDAN',
            'email' => 'wadan@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'wadan'
        ]);
        User::create([
            'id' => 4,
            'name' => 'DIRBINFUNG',
            'email' => 'dirbinfung@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'bagian_id' => '02'
        ]);
        User::create([
            'id' => 5,
            'name' => 'STAFF DIRBINFUNG',
            'email' => 'staffdirbinfung@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'staff',
            'bagian_id' => '02'
        ]);
        User::create([
            'id' => 6,
            'name' => 'DIRBINUM',
            'email' => 'dirbinum@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'bagian_id' => '03'
        ]);
        User::create([
            'id' => 7,
            'name' => 'STAFF DIRBINUM',
            'email' => 'staffdirbinum@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'staff',
            'bagian_id' => '03'
        ]);
        User::create([
            'id' => 8,
            'name' => 'DIRBINDIKLAT',
            'email' => 'dirbindiklat@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'bagian_id' => '04'
        ]);
        User::create([
            'id' => 9,
            'name' => 'STAFF DIRBINDIKLAT',
            'email' => 'staffdirbindiklat@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'staff',
            'bagian_id' => '04'
        ]);
        User::create([
            'id' => 10,
            'name' => 'DIRBINMAT',
            'email' => 'dirbinmat@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'bagian_id' => '05'
        ]);
        User::create([
            'id' => 11,
            'name' => 'STAFF DIRBINMAT',
            'email' => 'staffdirbinmatt@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'staff',
            'bagian_id' => '05'
        ]);
        User::create([
            'id' => 12,
            'name' => 'KAPOK ANALIS',
            'email' => 'kapokanalis@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'bagian_id' => '06'
        ]);
        User::create([
            'id' => 13,
            'name' => 'STAFF KAPOK ANALIS',
            'email' => 'staffkapokanalis@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'staff',
            'bagian_id' => '06'
        ]);
        User::create([
            'id' => 14,
            'name' => 'DANSATLAK TAULIH',
            'email' => 'dansatlaktaulih@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'bagian_id' => '07'
        ]);
        User::create([
            'id' => 15,
            'name' => 'STAFF DANSATLAK TAULIH',
            'email' => 'staffdansatlaktaulih@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'staff',
            'bagian_id' => '07'
        ]);
        User::create([
            'id' => 16,
            'name' => 'DANSATLAK SANDI',
            'email' => 'dansatlaksandi@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'bagian_id' => '08'
        ]);
        User::create([
            'id' => 17,
            'name' => 'STAFF DANSATLAK SANDI',
            'email' => 'staffdansatlaksandi@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'staff',
            'bagian_id' => '08'
        ]);
        User::create([
            'id' => 18,
            'name' => 'DANSATLAK OFFENSIF',
            'email' => 'dansatlakoffensif@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'bagian_id' => '09'
        ]);
        User::create([
            'id' => 19,
            'name' => 'STAFF DANSATLAK OFFENSIF',
            'email' => 'staffdansatlakoffensif@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'staff',
            'bagian_id' => '09'
        ]);
        User::create([
            'id' => 20,
            'name' => 'DANSATLAK DEFENSIF',
            'email' => 'dansatlakdefensif@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'bagian_id' => '10'
        ]);
        User::create([
            'id' => 21,
            'name' => 'STAFF DANSATLAK DEFENSIF',
            'email' => 'staffdansatlakdefensif@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'staff',
            'bagian_id' => '10'
        ]);
    }
}

