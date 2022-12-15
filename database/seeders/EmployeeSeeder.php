<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'nama' => 'Feri Kurniawan',
                'alamat' => 'Jln Buduran No.76 Sidoarjo',
                'no_hp' => '09839193912',
                'pekerjaan' => 'Penambangan',
                'departemen' => 'Operasi'
            ],
            [
                'nama' => 'Aldi Saputra',
                'alamat' => 'Jln Magersari No.23 Sidoarjo',
                'no_hp' => '02288492929',
                'pekerjaan' => 'Staff Lingkungan',
                'departemen' => 'pengolahan'
            ],
            [
                'nama' => 'Muhammad Andra',
                'alamat' => 'Jln Gayungan No.16 Surabaya',
                'no_hp' => '09484811928',
                'pekerjaan' => 'Staff Mekanik',
                'departemen' => 'Pengolahan'
            ],
            [
                'nama' => 'Lukman Hakim',
                'alamat' => 'Jln Tebel No.98 Sidoarjo',
                'no_hp' => '0292492934',
                'pekerjaan' => 'Eksplorasi',
                'departemen' => 'Operasi'
            ],
        ];
        DB::table('employees')->insert($employees);
    }
}
