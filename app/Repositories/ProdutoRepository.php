<?php

namespace App\Repositories;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProdutoRepository
{

    public function getAllProdutos($search = null): Collection
    {
        if($search)
            return Produto::where('nome','like',"%".$search."%")
                ->orWhere('descricao','like',"%".$search."%")
                ->with('categoria')->orderBy("created_at", "desc")->get();

        return Produto::with('categoria')->orderBy("created_at", "desc")->get();
    }

    public function getProdutoByID($produtoId): Produto
    {
        return Produto::find($produtoId);
    }

    public function deleteProduto($produtoId):void
    {
        $produto = Produto::find($produtoId);

        if($produto->imagem)
        unlink(public_path('imagens') . "/" . $produto->imagem);

        $produto->delete();
    }

    public function createProduto(ProdutoRequest $request): Produto
    {

        $produto = new Produto();
        if ($request->hasFile('imagem')) {
            $originName = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('imagem')->move(public_path('imagens'), $fileName);

            $produto->imagem = $fileName;
        }
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->validade = $request->validade;
        $produto->categoria_id = $request->categoria_id;
        $produto->save();
        return $produto;
    }

    public function updateProduto($produtoId, ProdutoRequest $request): void
    {
        $produto = Produto::find($produtoId);
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->preco = number_format($request->preco,2,'.');
        $produto->validade = $request->validade;
        $produto->categoria_id = $request->categoria_id;
        $produto->save();
    }

    public function deleteImage($produtoId) {
        $produto = Produto::find($produtoId);
        unlink(public_path('imagens') . "/" . $produto->imagem);
        $produto->imagem = null;
        $produto->save();
        return $produto;
    }

    public function imageUpdate($produtoId, Request $request)
    {
        if ($request->hasFile('imagem')) {
            $produto = Produto::find($produtoId);
            $originName = $request->file('imagem')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('imagem')->move(public_path('imagens'), $fileName);

            if($produto->imagem)
            unlink(public_path('imagens') . "/" . $produto->imagem);

            $produto->imagem = $fileName;
            $produto->save();
        }
    }
}
