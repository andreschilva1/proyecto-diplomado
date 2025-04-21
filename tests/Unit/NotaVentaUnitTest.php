<?php

namespace Tests\Unit;

use App\Models\Producto;
use App\Models\User;
use App\Services\NotaVentaService;
use Tests\TestCase;

class NotaVentaUnitTest extends TestCase
{
    public function test_crear_nota_venta()
    {
        $user = User::factory()->create();

        $cartItems = [
            ['id' => 101,'cantidad' => 2],
            ['id' => 102, 'cantidad' => 1],
        ];

        Producto::whereIn('id', [101, 102])->delete();

        $producto1 = Producto::factory()->create(['id' => 101, 'Stock' => 10]);
        $producto2 = Producto::factory()->create(['id' => 102, 'Stock' => 5]);

        $notaVentaService = new NotaVentaService();
        $notaVenta = $notaVentaService->crearNotaVenta($cartItems, 300, $user->id);

        $this->assertDatabaseHas('notaventa', [
            'id' => $notaVenta->id,
            'Montototal' => 300,
            'idUsuario' => $user->id,
        ]);

        $this->assertDatabaseHas('detalleventa', [
            'idProducto' => 101,
            'Cantidad' => 2,
        ]);

        $this->assertEquals(8, $producto1->fresh()->Stock);
        $this->assertEquals(4, $producto2->fresh()->Stock);
    }
}
