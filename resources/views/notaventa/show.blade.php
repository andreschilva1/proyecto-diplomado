@extends('adminlte::page')

@section('title', 'Producto Listado')

@section('content')
    <div class="container">
        <h1>Detalle de Nota de Venta</h1>

        <h2>Información de la Nota de Venta</h2>
        <p>Fecha: {{ $notaventa->Fecha }}</p>
        <p>Monto Total: {{ $notaventa->Montototal }} Bs</p>
        <p>Comprado: {{$notaventa->user->name}}</p>

        <h2>Productos Vendidos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del Producto</th>
                    <th>Precio (Bs)</th>
                    <th>Cantidad Vendida</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->Nombre }}</td>
                        <td>{{ $producto->Precio }}</td>
                        <td>{{ $producto->Cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
