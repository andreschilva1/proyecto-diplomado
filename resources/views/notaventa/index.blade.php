@extends('adminlte::page')

@section('title', 'Producto Listado')

@section('content_header')
    <h1>notaventa</h1>
@stop

@section('content')
    <h1>Notas de Venta</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Monto Total</th>
                <th>Comprador</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notaventas as $notaventa)
                <tr>
                    <td>{{ $notaventa->id }}</td>
                    <td>{{ $notaventa->Fecha }}</td>
                    <td>{{ $notaventa->Montototal }}</td>
                    <td>{{$notaventa->user->name}}</td>
                    <td>
                        <a href="{{ route('notaventa.show', $notaventa) }}" class="btn btn-primary">Mostrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
