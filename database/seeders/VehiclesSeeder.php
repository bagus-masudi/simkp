<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [
            [
                'no_plat' => 'B 3039 EWP',
                'merek' => 'Toyota',
                'jenis' => 'Truk CDD',
                'tahun' => '2018',
                'status_vehicle' => 'Bersedia',
                'angkutan' => 'barang'
            ],
            [
                'no_plat' => 'F 5123 XJ',
                'merek' => 'Toyota',
                'jenis' => 'Truk CDD',
                'tahun' => '2018',
                'status_vehicle' => 'Bersedia',
                'angkutan' => 'barang'
            ],
            [
                'no_plat' => 'F 5368 NZ',
                'merek' => 'Toyota',
                'jenis' => 'Truk CDD',
                'tahun' => '2018',
                'status_vehicle' => 'Bersedia',
                'angkutan' => 'barang'
            ],
            [
                'no_plat' => 'AE 3569 GS',
                'merek' => 'Toyota',
                'jenis' => 'Truk CDD',
                'tahun' => '2018',
                'status_vehicle' => 'Bersedia',
                'angkutan' => 'barang'
            ],
            [
                'no_plat' => 'N 4597 BAA',
                'merek' => 'Adiputro',
                'jenis' => 'Jetbus',
                'tahun' => '2018',
                'status_vehicle' => 'Bersedia',
                'angkutan' => 'umum'
            ],
            [
                'no_plat' => 'F 3219 KC',
                'merek' => 'Toyota',
                'jenis' => 'Truk CDD',
                'tahun' => '2018',
                'status_vehicle' => 'Service',
                'angkutan' => 'barang'
            ],
        ];
        DB::table('vehicles')->insert($vehicles);
    }
}
