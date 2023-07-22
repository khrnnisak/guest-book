<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('qwertyuiop'),
                'role' => '1',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
