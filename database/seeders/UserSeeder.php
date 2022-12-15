<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nama' => 'admin',
                'alamat' => '',
                'jabatan' => '',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => 'Wira Bakti',
                'alamat' => 'jln Krembung No.62 Sidoarjo',
                'jabatan' => 'Pelaksana',
                'email' => 'wirabakti@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => 'Satria',
                'alamat' => 'jln Krembung No.82 Surabaya',
                'jabatan' => 'Pelaksana',
                'email' => 'satria@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => 'Irfan Hakim',
                'alamat' => 'jln Tebel No.82 Surabaya',
                'jabatan' => 'Penanggung Jawab',
                'email' => 'irfanhakim@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'nama' => 'Muhammad Amirul',
                'alamat' => 'jln Kragan No.82 Gresik',
                'jabatan' => 'Penanggung Jawab',
                'email' => 'a@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        DB::table('users')->insert($users);
    }
}
