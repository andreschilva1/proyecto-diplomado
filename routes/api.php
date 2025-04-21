<?php

use App\Http\Controllers\Api\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("getProductos", [ProductoController::class, "getProductos"]);
Route::post("postProducto", [ProductoController::class, "postProducto"]);
Route::put("putProducto/{id}", [ProductoController::class, "putProducto"]);
Route::delete("deleteProducto/{id}", [ProductoController::class, "deleteProducto"]);