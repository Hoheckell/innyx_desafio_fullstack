<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AccessControl;
use App\Http\Requests\ProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Interfaces\ProdutoRepositoryInterface;
use App\Models\Produto;
use App\Repositories\ProdutoRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProdutoController extends Controller
{
    private ProdutoRepository $produtoRepository;
    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->middleware(AccessControl::class);
        $this->produtoRepository = $produtoRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $produtos = $this->produtoRepository->getAllProdutos($request->search);
        return response()->json(ProdutoResource::collection($produtos), 200);
    }


    public function show(int $id): JsonResponse
    {
        $produto = $this->produtoRepository->getProdutoByID($id);
        return response()->json(ProdutoResource::make($produto), 200);
    }

    public function store(ProdutoRequest $request): JsonResponse
    {
        $produto = $this->produtoRepository->createProduto($request);
        return response()->json(ProdutoResource::make($produto), 201);
    }

    public function update(ProdutoRequest $request, $id)
    {
        $this->produtoRepository->updateProduto($id,$request);
        return response()->noContent();
    }

    public function destroy($id)
    {
        $this->produtoRepository->deleteProduto($id);
        return response()->noContent();
    }

    public function deleteImage($id) {
        $produto = $this->produtoRepository->deleteImage($id);
        return response()->json(ProdutoResource::make($produto));
    }

    public function imageUpdate($id, Request $request) {
        $this->produtoRepository->imageUpdate($id, $request);
    }
}
