<?php

namespace Tests\Unit;

use App\Models\Categoria;
use App\Services\CategoriaService;
use Tests\TestCase;

class CategoriaUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_crear_una_categoria()
    {
        $service = new CategoriaService();
        $data = ['Nombre' => 'Whisky'];
        $categoria = $service->crear($data);
        $this->assertInstanceOf(Categoria::class, $categoria);
        $this->assertEquals('Whisky', $categoria->Nombre);
        $this->assertDatabaseHas('categoria', ['Nombre' => 'Whisky']);
    }
}
