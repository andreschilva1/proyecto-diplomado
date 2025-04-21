<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\NotaVentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    });
});
/*group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    });
});*/
Route::view('/principal', 'client.principal');
//Route::get('/productoCliente', [ProductoController::class, 'indexCliente'])->name('productos.indexCliente');
//Route::get('/compras', [NotaVentaController::class, 'index'])->name('notaventa.show');
/*Route::post('/notaventa', [NotaVentaController::class, 'store'])->name('notaventa.store');
Route::get('/notaventa', [NotaVentaController::class, 'index'])->name('notaventa.index');
Route::get('/notaventa', [NotaVentaController::class, 'show'])->name('notaventa.show');*/
Route::resource('notaventa', NotaVentaController::class)->names('notaventa');
Route::resource('productos', ProductoController::class)->names('productos');
Route::resource('categorias', CategoriaController::class)->names('categorias');
Route::resource('inventarios', InventarioController::class)->names('inventarios');
Route::resource('usuarios', UsuarioController::class)->names('usuarios');
//Route::view('/producto', 'client.producto');

