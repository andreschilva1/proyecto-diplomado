<?php

namespace Tests\Unit;

use App\Models\Producto;
use App\Services\ProductoService;
use Tests\TestCase;

class ProductoUnitTest extends TestCase
{
    public function test_crear_un_producto()
    {
        $service = new ProductoService();
        $data = ['Nombre' => 'Blue Label', 'Precio' => 100, 'Stock' => 10, 'Url' => '../assets/empty-image.png', 'idCategoria' => 4];        
        $producto = $service->crear($data);
        $this->assertInstanceOf(Producto::class, $producto);
        $this->assertEquals('Blue Label', $producto->Nombre);
        $this->assertEquals(100, $producto->Precio);
        $this->assertEquals(10, $producto->Stock);
        $this->assertEquals('../assets/empty-image.png', $producto->Url);
        $this->assertEquals(4, $producto->idCategoria);
        $this->assertDatabaseHas('Producto', [
            'Nombre' => 'Blue Label',
            'Precio' => 100,
            'Stock' => 10,
            'Url' => '../assets/empty-image.png',
            'idCategoria' => 4,
        ]);
    }
}
