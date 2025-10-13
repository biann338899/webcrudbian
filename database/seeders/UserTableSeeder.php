<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus semua data lama di tabel users
        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345'),
            ],
            [
                'name' => 'biansatria',
                'email' => 'bian333@gmail.com',
                'password' => Hash::make('bianganteng123'),
            ],
        ]);
    }
}
