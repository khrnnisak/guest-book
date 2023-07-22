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
                'nama' => 'Aryo Kusuma',
                'jabatan' => 'Manager',
                'bidang_id' => '1'
            ],
            [
                'nama' => 'Vivi Astutik',
                'jabatan' => 'Manager',
                'bidang_id' => '2'
            ],
            [
                'nama' => 'Juna Firman',
                'jabatan' => 'Manager',
                'bidang_id' => '3'
            ],
            [
                'nama' => 'Kirana Larasati',
                'jabatan' => 'Manager',
                'bidang_id' => '4'
            ],
            [
                'nama' => 'Bagus Satria',
                'jabatan' => 'Manager',
                'bidang_id' => '5'
            ],
            [
                'nama' => 'Yuni Islami',
                'jabatan' => 'Manager',
                'bidang_id' => '6'
            ],
        ];

        foreach ($pegawai as $key => $value) {
            Pegawai::create($value);
        }
    }
}
