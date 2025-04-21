@extends('layouts.navbar')
@section('content')
    <h1>Lista de Productos</h1>
    <select id="categoriaSelect" class="custom-select">
        <option value="todas">Todas las categorías</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->Nombre }}</option>
        @endforeach
    </select>


    <ul class="product-list" id="productList">
        @foreach ($productos as $producto)
            <li class="product" data-categoria="{{ $producto->idCategoria }}">
                <div class="product-image">
                    <img src="{{ asset($producto->Url) }}" alt="{{ $producto->Nombre }}">
                </div>
                <h2 class="product-title">{{ $producto->Nombre }}</h2>
                <div class="product-info">
                    <p class="product-price">{{ $producto->Precio }} Bs</p>
                    <p class="product-stock">Stock: {{ $producto->Stock }}</p>
                    <input type="number" class="quantity-input" min="1" max="{{ $producto->Stock }}">
                    <button class="add-to-cart" data-producto="{{ $producto }}">Agregar al Carrito</button>
                </div>
            </li>
        @endforeach
    </ul>


    <div class="cart">
        <h1>Carrito de Compras</h1>
        <form method="POST" action="{{ route('notaventa.store') }}" id="form-venta">
            @csrf
            <ul class="cart-list" id="cartList" >                
            </ul>
            <input type="hidden" id="cartListField" name="cartList">
            <div class="cart-total">
                {{-- <p>Total: <span id="cartTotal" name="total">0.00</span> Bs</p> --}}
                <label for="">Total:</label>
                <input type="text" id="cartTotal" name="total" value="0" readonly>
                <button id="checkoutButton" class="btn" type="submit">Realizar Compra</button>
            </div>
        </form>
    </div>
    <script src="..\js\producto.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="..\css\producto.css">
@endsection
