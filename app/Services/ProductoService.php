<?php
namespace App\Services;

use App\Models\Producto;

class ProductoService
{
    public function obtenerProducto(int $id): ?Producto
    {
        return Producto::find($id);
    }
    public function crear(array $data): Producto
    {
        return Producto::create($data);
    }
}
