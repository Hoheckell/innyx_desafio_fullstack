<?php

namespace App\Repositories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Collection;

class CategoriaRepository
{

    public function getAllCategorias($search = null): Collection
    {
        return Categoria::orderBy("created_at", "desc")->get();
    }
}
