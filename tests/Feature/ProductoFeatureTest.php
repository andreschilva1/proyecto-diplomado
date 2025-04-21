<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoFeatureTest extends TestCase
{
    public function test_usuario_puede_crear_producto_desde_formulario()
    {
        $response = $this->post('/productos', [
            'Nombre' => 'Blue Label',
            'Precio' => 100,
            'Stock' => 10,
            'Url' => '../assets/empty-image.png',
            'idCategoria' => 4,
        ]);        
        $response->assertRedirect('/productos');
        $this->assertDatabaseHas('Producto', [
            'Nombre' => 'Blue Label',
            'Precio' => 100,
            'Stock' => 10,
            'Url' => '../assets/empty-image.png',
            'idCategoria' => 4,
        ]);
    }

    public function test_no_puede_guardar_producto_vacia()
    {
        $response = $this->post('/productos', [
            'Nombre' => '',
            'Precio' => '',
            'Stock' => '',
            'Url' => '',
            'idCategoria' => 4,
        ]);
        $response->assertSessionHasErrors('Nombre');
        $response->assertSessionHasErrors('Precio');
        $response->assertSessionHasErrors('Stock');
        $response->assertSessionHasErrors('Url');                
    }
}
