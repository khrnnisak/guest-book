<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bidang;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bidang = [
            [
                'name' => 'HRD',
            ],
            [
                'name' => 'Keuangan',
            ],
            [
                'name' => 'Pemasaran',
            ],
            [
                'name' => 'Produksi',
            ],
            [
                'name' => 'Umum',
            ],
            [
                'name' => 'IT',
            ],
        ];

        foreach ($bidang as $key => $value) {
            Bidang::create($value);
        }
    }
}
