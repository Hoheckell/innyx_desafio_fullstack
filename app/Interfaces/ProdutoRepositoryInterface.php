<?php

namespace App\Interfaces;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;

interface ProdutoRepositoryInterface
{
    public function getAllProdutos();
    public function getProdutoByID($produtoId);
    public function deleteProduto($produtoId);
    public function createProduto(ProdutoRequest $request);
    public function updateProduto($produtoId, ProdutoRequest $request);
    public function deleteImage($produtoId);
}
