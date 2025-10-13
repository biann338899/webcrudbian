<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        DB::table('karyawan')->insert([
            [
                'nip' => 1001,
                'nama_karyawan' => 'Lionel Messi',
                'jenis_kelamin' => 'Pria',
                'gaji_karyawan' => 50000000,
                'alamat' => 'Rosario, Argentina',
                'departemen_id' => 110, // IT
            ],
            [
                'nip' => 1002,
                'nama_karyawan' => 'Andres Iniesta',
                'jenis_kelamin' => 'Pria',
                'gaji_karyawan' => 45000000,
                'alamat' => 'Fuentealbilla, Spanyol',
                'departemen_id' => 111, // Logistics
            ],
            [
                'nip' => 1003,
                'nama_karyawan' => 'Xavi Hernandez',
                'jenis_kelamin' => 'Pria',
                'gaji_karyawan' => 40000000,
                'alamat' => 'Terrassa, Spanyol',
                'departemen_id' => 112, // HR
            ],
        ]);
    }
}
