@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
    
@stop

@section('content')
<h1>Editar Producto</h1>

<form method="POST" action="{{ route('productos.update', $producto->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $producto->Nombre }}">
    </div>

    <div class="form-group">
        <label for="Precio">Precio:</label>
        <input type="text" name="Precio" id="Precio" class="form-control" value="{{ $producto->Precio }}">
    </div>

    <div class="form-group">
        <label for="Stock">Stock:</label>
        <input type="text" name="Stock" id="Stock" class="form-control" value="{{ $producto->Stock }}">
    </div>

    <div class="form-group">
        <label for="Url">Url:</label>
        <input type="text" name="Url" id="Url" class="form-control" value="{{ $producto->Url }}">
    </div>

    <div class="form-group">
        <label for="idCategoria">Categoría:</label>
        <select name="idCategoria" id="idCategoria" class="form-control">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->idCategoria ? 'selected' : '' }}>
                    {{ $categoria->Nombre }}
                </option>
            @endforeach
        </select>
    </div>
    

    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop