<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaFeatureTest extends TestCase
{
    public function test_usuario_puede_crear_categoria_desde_formulario()
    {
        $response = $this->post('/categorias', [
            'Nombre' => 'Whisky'
        ]);
        $response->assertRedirect('/categorias');
        $this->assertDatabaseHas('Categoria', ['Nombre' => 'Whisky']);
    }

    public function test_no_puede_guardar_categoria_vacia()
    {
        $response = $this->post('/categorias', [
            'Nombre' => ''
        ]);
        $response->assertSessionHasErrors('Nombre');
    }
}
