@extends('adminlte::page')

@section('title', 'Agregar Inventario')

@section('content_header')
    <h1>Agregar Inventario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('inventarios.store') }}">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Accion">Acción:</label>
                            <select name="Accion" id="Accion" class="form-control">
                                <option value="Agregar">Agregar</option>
                                <option value="Quitar">Quitar</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="Cantidad">Cantidad:</label>
                            <input type="number" name="Cantidad" id="Cantidad" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="idProducto">Producto:</label>
                    <select name="idProducto" id="idProducto" class="form-control">
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->Nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Agregar Inventario</button>
            </form>
        </div>
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
