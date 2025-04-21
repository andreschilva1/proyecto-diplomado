<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function getProductos()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    public function putProducto(Request $request, $id)
    {
        //return response()->json($request);
        $producto = Producto::find($id);
        //return response()->json($producto);
        if ($producto == null) {
            return response()->json(['message' => 'No se encontro el producto'], 404);
        } else {
            $producto->Nombre = $request->Nombre;            
            $producto->Precio = $request->Precio;
            $producto->Stock = $request->Stock;
            $producto->save();
            return response()->json($producto);
        }
    }

    public function postProducto(Request $request){
        $producto = new Producto();
        $producto->Nombre = $request->Nombre;            
        $producto->Precio = $request->Precio;
        $producto->Stock = $request->Stock;
        $producto->save();
        return response()->json($producto);
    }

    public function deleteProducto($id){
        $producto = Producto::find($id);
        if ($producto == null) {
            return response()->json(['message' => 'No se encontro el producto'], 404);
        } else {
            $producto->delete();
            return response()->json(['message' => 'Producto eliminado'], 200);
        }
    }
}
