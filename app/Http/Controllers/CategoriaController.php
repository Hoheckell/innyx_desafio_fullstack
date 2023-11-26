<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AccessControl;
use App\Http\Resources\CategoriaResource;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private CategoriaRepository $categoriaRepository;
    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->middleware(AccessControl::class);
        $this->categoriaRepository = $categoriaRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = $this->categoriaRepository->getAllCategorias();
        return response()->json(CategoriaResource::collection($categorias), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
