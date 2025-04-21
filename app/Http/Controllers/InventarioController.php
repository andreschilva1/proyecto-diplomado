<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();
        return view('inventarios.index', compact('inventarios'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('inventarios.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Accion' => 'required',
            'Cantidad' => 'required',
            'idProducto' => 'required',
        ]);

        // Obtiene el ID del usuario autenticado
        $idUsuario = Auth::user()->id;

        if ($request->Accion === 'Agregar') {
            $producto = Producto::find($request->idProducto);
            $producto->Stock += $request->Cantidad;
            $producto->save();
        } else {
            $producto = Producto::find($request->idProducto);
            if ($request->Cantidad > $producto->Stock) {
                $request->Cantidad = $producto->Stock;
                $producto->Stock = 0;
                $producto->save();
            } else {
                $producto->Stock -= $request->Cantidad;
                $producto->save();
            }
        }
        
        // Crea un nuevo inventario con el usuario autenticado
        Inventario::create([
            'Accion' => $request->Accion,
            'Cantidad' => $request->Cantidad,
            'idProducto' => $request->idProducto,
            'idUsuario' => $idUsuario,
        ]);

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario creado exitosamente.');
    }

    public function destroy($id)
    {
        $inventario = Inventario::find($id);
        $producto = Producto::find($inventario->idProducto);
        $producto->Stock -= $inventario->Cantidad;
        $producto->save();
        Inventario::where('id', $id)->delete();
        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario eliminado exitosamente.');
    }
}
