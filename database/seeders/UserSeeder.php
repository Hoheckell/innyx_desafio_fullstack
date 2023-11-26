<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'id' =>1,
                'name' => "Hoheckell",
                'email' => "hoheckell@yahoo.com.br",
                "password" => Hash::make('secret'),
            ],
            [
                'id' =>2,
                'name' => fake()->name,
                'email' => fake()->email,
                "password" => Hash::make('secret'),
            ],
            [
                'id' =>3,
                'name' => fake()->name,
                'email' => fake()->email,
                "password" => Hash::make('secret'),
            ],
        ]);
    }
}
