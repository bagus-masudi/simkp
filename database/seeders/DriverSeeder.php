<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drivers = [
            [
                'nama' => 'Muhammad Rosyid',
                'alamat' => 'Jln Tropodo No.29 Sidoarjo',
                'no_hp' => '08139139121',
                'ktp' => '183103109019090900',
                'status_driver' => 'Bersedia'
            ],
            [
                'nama' => 'Haris Firmansyah',
                'alamat' => 'Jln Buduran No.29 Bojonegoro',
                'no_hp' => '08139231311',
                'ktp' => '1313918398198989890',
                'status_driver' => 'Bersedia'
            ],
            [
                'nama' => 'Muhammad Hilal',
                'alamat' => 'Jln Banjarkemantren No.12 Sidoarjo',
                'no_hp' => '089138738878',
                'ktp' => '1313918398198989890',
                'status_driver' => 'Bersedia'
            ],
            [
                'nama' => 'Bagaskoro',
                'alamat' => 'Jln Blitar No.65 Blitar',
                'no_hp' => '08139231521',
                'ktp' => '1313131313131313',
                'status_driver' => 'Bersedia'
            ],
            [
                'nama' => 'Dimas Fahmil',
                'alamat' => 'Jln Bangil No.12 Bojonegoro',
                'no_hp' => '09284101011',
                'ktp' => '01031930190098888',
                'status_driver' => 'Bersedia'
            ],
            [
                'nama' => 'Zaenal Abidin',
                'alamat' => 'Jln Sidoarjo No.89 Sidoarjo',
                'no_hp' => '09292839111',
                'ktp' => '010319919819181001',
                'status_driver' => 'Bersedia'
            ],
        ];

        DB::table('drivers')->insert($drivers);
    }
}
