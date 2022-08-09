<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Emanuel",
            'teléfono' => '3317009646',
            'password' => bcrypt('asd123'),
            'curp' => 'EACE',
            'rol' => '0'
        ]);

        User::create([
            'name' => "Andres",
            'teléfono' => '3310622967',
            'password' => bcrypt('asd123'),
            'curp' => 'EACE',
            'rol' => '0'
        ]);
    }
}
