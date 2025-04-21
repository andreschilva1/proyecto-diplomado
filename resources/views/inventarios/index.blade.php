@extends('adminlte::page')

@section('title', 'Inventario Listado')

@section('content_header')
    <h1>Listado De Inventario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Gestión de Inventarios</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Acción</th>
                        <th>Cantidad</th>
                        <th>Producto</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventarios as $inventario)
                        <tr>
                            <td>{{ $inventario->id }}</td>
                            <td>{{ $inventario->Accion }}</td>
                            <td>{{ $inventario->Cantidad }}</td>
                            <td>{{ $inventario->producto->Nombre }}</td>
                            <td>{{ $inventario->usuario->name }}</td>
                            <td>
                                {{-- <a href="{{ route('inventarios.edit', $inventario->id) }}" class="btn btn-sm btn-primary">Editar</a> --}}
                                <form action="{{ route('inventarios.destroy', $inventario->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
