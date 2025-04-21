@extends('layouts.navbar')

@section('content')
    <div class="container"> {{-- Ajusta el contenedor según tu diseño --}}
        <div class="row">
            @foreach ($notaventas as $notaventa)
                <div class="col-md-4"> {{-- Define el diseño de la tarjeta según tus necesidades --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nota de Compra #{{ $notaventa->id }}</h5>
                            <p class="card-text">Fecha: {{ $notaventa->Fecha }}</p>
                            <p class="card-text">Monto Total: {{ $notaventa->Montototal }}</p>
                            <a href="{{ route('notaventa.show', $notaventa) }}"
                                >Ver Detalle</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="..\css\compras.css">
@endsection
