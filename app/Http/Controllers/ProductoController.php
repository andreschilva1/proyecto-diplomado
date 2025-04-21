<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Services\ProductoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    protected $productoService;

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        if (Auth::user()->rol === 'cliente') {
            $categorias = Categoria::all();
            $productos = Producto::where('Stock', '>', 0)->get();
            return view('client.producto', compact('productos', 'categorias'));
        } else {
            $productos = Producto::all();
            return view('productos.index', compact('productos'));
        }
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Precio' => 'required',
            //'Url' => 'required',
            'Url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Stock' => 'required',
            'idCategoria' => 'required',
        ]);

        $filePath = null;

        if ($request->hasFile('Url')) {
            $file = $request->file('Url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets'), $filename);
            $filePath = '../assets/' . $filename;
        }

        $data = [
            'Nombre' => $request->Nombre,
            'Precio' => $request->Precio,
            'Stock' => $request->Stock,
            'idCategoria' => $request->idCategoria,
            //'Url' => $request->Url,
            'Url' => $filePath,
        ];

        $this->productoService->crear($data);

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }


    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required',
            'Precio' => 'required',
            'Stock' => 'required',
            //'Url' => 'required',
            'idCategoria' => 'required',
        ]);

        Producto::find($id)->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        Producto::where('id', $id)->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}
