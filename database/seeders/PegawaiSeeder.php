<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;


class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pegawai = [
            [
                'nama' => 'Aina',
                'jabatan' => 'Manager',
                'bidang_id' => '1'
            ],
            [
                'nama' => 'Joe',
                'jabatan' => 'Manager',
                'bidang_id' => '2'
            ],
            [
                'nama' => 'Rue',
                'jabatan' => 'Manager',
                'bidang_id' => '3'
            ],
            [
                'nama' => 'Nou',
                'jabatan' => 'Manager',
                'bidang_id' => '4'
            ],
            [
                'nama' => 'Ran',
                'jabatan' => 'Manager',
                'bidang_id' => '5'
            ],
            [
                'nama' => 'Khai',
                'jabatan' => 'Manager',
                'bidang_id' => '6'
            ],
        ];

        foreach ($pegawai as $key => $value) {
            Pegawai::create($value);
        }
    }
}
