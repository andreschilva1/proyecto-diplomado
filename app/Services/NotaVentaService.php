<?php

namespace App\Services;

use App\Models\Detalleventa;
use App\Models\Notaventa;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class NotaVentaService
{
    public function crearNotaVenta(array $cartItems, float $montoTotal, int $idUsuario): Notaventa
    {
        return DB::transaction(function () use ($cartItems, $montoTotal, $idUsuario) {
            $notaventa = Notaventa::create([
                'Fecha' => date('Y-m-d'),
                'Montototal' => $montoTotal,
                'idUsuario' => $idUsuario,
            ]);

            foreach ($cartItems as $item) {
                Detalleventa::create([
                    'Cantidad' => $item['cantidad'],
                    'idProducto' => $item['id'],
                    'idNotaventa' => $notaventa->id,
                ]);

                $producto = Producto::find($item['id']);
                if ($producto) {
                    $producto->Stock -= $item['cantidad'];
                    $producto->save();
                }
            }

            return $notaventa;
        });
    }
}
