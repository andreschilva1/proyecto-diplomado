@extends('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalle de la Nota de Compra</div>
                    <div class="card-body">
                        <div class="info-section">
                            <h2>Información de la Nota de Compra</h2>
                            <p><strong>Fecha:</strong> {{ $notaventa->Fecha }}</p>
                            <p><strong>Monto Total:</strong> {{ $notaventa->Montototal }} Bs</p>
                        </div>

                        <div class="products-section">
                            <h2>Productos</h2>
                            <ul class="product-list">
                                @foreach ($productos as $producto)
                                    <li class="product-item">
                                        <div class="product-info">
                                            <h3>{{ $producto->Nombre }}</h3>
                                            <p><strong>Precio:</strong> {{ $producto->Precio }} Bs</p>
                                            <p><strong>Cantidad:</strong> {{ $producto->Cantidad }}</p>
                                            <p><strong>Subtotal:</strong> {{ $producto->Precio * $producto->Cantidad }} Bs</p>
                                        </div>
                                        <div class="product-image">
                                            <img src="{{ $producto->Url }}" alt="{{ $producto->Nombre }}"
                                                style="max-width: 200px; max-height: 200px;">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .info-section,
        .products-section {
            margin-bottom: 20px;
        }

        .product-list {
            list-style: none;
            padding: 0;
        }

        .product-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .product-image img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
@endsection

@section('css')
    <link rel="stylesheet" href="..\css\compras.css">
@endsection
