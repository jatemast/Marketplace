@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>

    @if ($productos->isEmpty())
        <p>No hay productos en el carrito.</p>
    @else
        <ul>
            @foreach ($productos as $producto)
                <li>{{ $producto->nombre }} - ${{ $producto->precio }} (Cantidad: {{ $producto->pivot->cantidad }})</li>
            @endforeach
        </ul>

        <form action="{{ route('carrito.pagar') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Pagar</button>
        </form>
    @endif
</div>
@endsection
