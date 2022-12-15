<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentVehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rent_vehicles = [
            [
                'no_plat' => 'AE 3569 GS',
                'merek' => 'Toyota',
                'jenis' => 'Truk CDD',
                'tahun' => '2018',
                'tgl_berakhir' => '2023-08-20',
                'tarif' => '2000000',
                'tempat_sewa' => 'Rental Surabaya', 
                'status_vehicle' => 'Bersedia',
                'angkutan' => 'barang'
            ],
            [
                'no_plat' => 'N 4597 BAA',
                'merek' => 'Adiputro',
                'jenis' => 'Jetbus',
                'tahun' => '2018',
                'tgl_berakhir' => '2023-08-20',
                'tarif' => '2000000',
                'tempat_sewa' => 'Rental Surabaya', 
                'status_vehicle' => 'Bersedia',
                'angkutan' => 'umum'
            ],
        ];
        DB::table('rent_vehicles')->insert($rent_vehicles);
    }
}
