<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produtos')->truncate();
        DB::table('produtos')->insert([
            [
                'nome' => "Jhonny Walker Red Label",
                'descricao' => "Whisky",
                "preco" => 99.50,
                "imagem" => "produto_1.png",
                "validade" => "2026-05-21",
                "categoria_id" => 1
            ],
            [
                'nome' => "Chivas Regal",
                'descricao' => "Whisky",
                "preco" => 150.50,
                "imagem" => "produto_2.png",
                "validade" => "2026-05-21",
                "categoria_id" => 1
            ],
            [
                'nome' => "Cacildis",
                'descricao' => "Cerveja",
                "preco" => 10.50,
                "imagem" => "produto_3.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
            [
                'nome' => "Colorado",
                'descricao' => "Cerveja",
                "preco" => 12.99,
                "imagem" => "produto_4.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
            [
                'nome' => "Heineken",
                'descricao' => "Cerveja",
                "preco" => 6.65,
                "imagem" => "produto_5.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
            [
                'nome' => "Original",
                'descricao' => "Cerveja",
                "preco" => 4.99,
                "imagem" => "produto_6.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
            [
                'nome' => "Amstel",
                'descricao' => "Cerveja",
                "preco" => 5.99,
                "imagem" => "produto_7.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
            [
                'nome' => "Brahma Chopp",
                'descricao' => "Cerveja",
                "preco" => 3.99,
                "imagem" => "produto_8.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
            [
                'nome' => "Itaipava",
                'descricao' => "Cerveja",
                "preco" => 2.99,
                "imagem" => "produto_9.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
            [
                'nome' => "Crystal",
                'descricao' => "Cerveja",
                "preco" => 1.99,
                "imagem" => "produto_10.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
            [
                'nome' => "Schin",
                'descricao' => "Cerveja",
                "preco" => 2.99,
                "imagem" => "produto_11.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
            [
                'nome' => "Local",
                'descricao' => "Cerveja",
                "preco" => 0.99,
                "imagem" => "produto_12.png",
                "validade" => "2026-05-21",
                "categoria_id" => 2
            ],
        ]);
    }
}
