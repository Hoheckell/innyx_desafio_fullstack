<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            [
                'id' =>1,
                'name' => "ADMIN",
                'is_enabled' => true,
            ],
            [
                'id' =>2,
                'name' => "USER",
                'is_enabled' => true,
            ],
            [
                'id' =>3,
                'name' => "GUEST",
                'is_enabled' => true,
            ],
        ]);
    }
}
