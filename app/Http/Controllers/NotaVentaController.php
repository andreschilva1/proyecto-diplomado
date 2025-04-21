<?php

namespace App\Http\Controllers;

use App\Models\Notaventa;
use App\Models\Usuario;
use App\Services\NotaVentaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotaVentaController extends Controller
{
    protected $notaVentaService;

    public function __construct(NotaVentaService $notaVentaService)
    {
        $this->notaVentaService = $notaVentaService;
    }
    public function index()
    {
        if (Auth::user()->rol === 'cliente') {
            $idUsuario = Auth::user()->id;
            $notaventas = Notaventa::where('idUsuario', $idUsuario)->get();
            return view('client.compras', compact('notaventas'));
        } else {
            $notaventas = Notaventa::all();
            return view('notaventa.index', compact('notaventas'));
        }
    }

    public function create()
    {
        $usuarios = Usuario::all();

        return view('notaventa.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $cartItems = json_decode($request->input('cartList'), true);

        if (is_array($cartItems) && !empty($cartItems)) {
            $idUsuario = Auth::id();
            
            $notaventa = $this->notaVentaService->crearNotaVenta($cartItems, $request->input('total'), $idUsuario);

            return redirect()
                ->route('notaventa.show', $notaventa)
                ->with('success', 'Nota de venta creada exitosamente.');
        }

        return back()->withErrors(['cartList' => 'Carrito vacío o inválido']);
    }


    public function show($id)
    {
        $notaventa = Notaventa::findOrFail($id); // Obtener la nota de venta por su ID

        $productos = DB::table('Producto')
            ->join('Detalleventa', 'Producto.id', '=', 'Detalleventa.idProducto')
            ->where('Detalleventa.idNotaventa', $notaventa->id)
            ->select('Producto.Nombre', 'Producto.Precio', 'Producto.Url', 'Detalleventa.Cantidad')
            ->get();

        if (Auth::user()->rol === 'cliente') {
            return view('client.detalleCompra', compact('notaventa', 'productos'));
        } else {
            return view('notaventa.show', compact('notaventa', 'productos'));
        }
    }

    public function edit($id)
    {
        $notaventa = Notaventa::findOrFail($id);
        $usuarios = Usuario::all();
        return view('notaventa.edit', compact('notaventa', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'Fecha' => 'required',
            'Id' => 'required',
            'Montototal' => 'required',
            'UsuarioID' => 'required',
        ]);

        $notaventa = Notaventa::findOrFail($id);
        $notaventa->update($data);

        return redirect()->route('notaventa.index')->with('success', 'Nota de venta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $notaventa = Notaventa::findOrFail($id);
        $notaventa->delete();

        return redirect()->route('notaventa.index')->with('success', 'Nota de venta eliminada exitosamente.');
    }
}
