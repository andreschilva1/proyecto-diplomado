<?php

namespace App\Http\Controllers;

use App\Models\Detalleventa;
use App\Models\Notaventa;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    public function index()
    {
        $detalleventas = Detalleventa::all();
        $productos = Producto::all();
        $notaventas = Notaventa::all();
        return view('detalleventa.index', compact('detalleventas', 'productos', 'notaventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        $notaventas = Notaventa::all();
        return view('detalleventa.create', compact('productos', 'notaventas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Cantidad' => 'required',
            'ProductoID' => 'required',
            'NotaventaID' => 'required',
        ]);

        Detalleventa::create($data);

        return redirect()->route('detalleventa.index')->with('success', 'Detalle de venta creado exitosamente.');
    }

    public function show($id)
    {
        $detalleventa = Detalleventa::findOrFail($id);
        return view('detalleventa.show', compact('detalleventa'));
    }

    public function edit($id)
    {
        $detalleventa = Detalleventa::findOrFail($id);
        $productos = Producto::all();
        $notaventas = Notaventa::all();
        return view('detalleventa.edit', compact('detalleventa', 'productos', 'notaventas'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'Cantidad' => 'required',
            'ProductoID' => 'required',
            'NotaventaID' => 'required',
        ]);

        $detalleventa = Detalleventa::findOrFail($id);
        $detalleventa->update($data);

        return redirect()->route('detalleventa.index')->with('success', 'Detalle de venta actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $detalleventa = Detalleventa::findOrFail($id);
        $detalleventa->delete();

        return redirect()->route('detalleventa.index')->with('success', 'Detalle de venta eliminado exitosamente.');
    }  
}
