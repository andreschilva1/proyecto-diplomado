@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Nombre">Nombre:</label>
                            <input type="text" name="Nombre" id="Nombre" class="form-control">
                            @error('Nombre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="Precio">Precio:</label>
                            <input type="text" name="Precio" id="Precio" class="form-control">
                            @error('Precio')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="Stock">Stock:</label>
                            <input type="text" name="Stock" id="Stock" class="form-control">
                            @error('Stock')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="Url">Subir Imagen:</label>
                            <input type="file" name="Url" id="Url" class="form-control">
                            @error('Url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="idCategoria">Categoría:</label>
                    <select name="idCategoria" id="idCategoria" class="form-control">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->Nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Crear Producto</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('¡Hola!');
    </script>
@stop
