<?php
namespace App\Services;

use App\Models\Categoria;

class CategoriaService
{
    public function crear(array $data): Categoria
    {
        return Categoria::create($data);
    }
}
