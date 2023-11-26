<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_permissions')->truncate();
        DB::table('role_permissions')->insert([
            [
                'role_id' => 1,
                'model' => Categoria::class,
                'operation' =>'CREATE'
            ],
            [
                'role_id' => 1,
                'model' => Categoria::class,
                'operation' =>'READ'
            ],
            [
                'role_id' => 1,
                'model' => Categoria::class,
                'operation' =>'UPDATE'
            ],
            [
                'role_id' => 1,
                'model' => Categoria::class,
                'operation' =>'DELETE'
            ],
            [
                'role_id' => 1,
                'model' => Role::class,
                'operation' =>'CREATE'
            ],
            [
                'role_id' => 1,
                'model' => Role::class,
                'operation' =>'READ'
            ],
            [
                'role_id' => 1,
                'model' => Role::class,
                'operation' =>'UPDATE'
            ],
            [
                'role_id' => 1,
                'model' => Role::class,
                'operation' =>'DELETE'
            ],
            [
                'role_id' => 1,
                'model' => User::class,
                'operation' =>'CREATE'
            ],
            [
                'role_id' => 1,
                'model' => User::class,
                'operation' =>'READ'
            ],
            [
                'role_id' => 1,
                'model' => User::class,
                'operation' =>'UPDATE'
            ],
            [
                'role_id' => 1,
                'model' => User::class,
                'operation' =>'DELETE'
            ],
            [
                'role_id' => 1,
                'model' => Produto::class,
                'operation' =>'CREATE'
            ],
            [
                'role_id' => 1,
                'model' => Produto::class,
                'operation' =>'READ'
            ],
            [
                'role_id' => 1,
                'model' => Produto::class,
                'operation' =>'UPDATE'
            ],
            [
                'role_id' => 1,
                'model' => Produto::class,
                'operation' =>'DELETE'
            ],
            [
                'role_id' => 2,
                'model' => Produto::class,
                'operation' =>'DELETE'
            ],
            [
                'role_id' => 2,
                'model' => Produto::class,
                'operation' =>'CREATE'
            ],
            [
                'role_id' => 2,
                'model' => Produto::class,
                'operation' =>'READ'
            ],
            [
                'role_id' => 3,
                'model' => Produto::class,
                'operation' =>'READ'
            ],
        ]);
    }
}
