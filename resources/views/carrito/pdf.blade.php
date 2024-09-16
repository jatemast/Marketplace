<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra</title>
</head>
<body>
    <h1>Resumen de Compra</h1>
    <p>Nombre del Usuario: {{ $user->name }}</p>
    <p>Fecha de Compra: {{ $historialCompra->fecha }}</p>

    <h2>Productos:</h2>
    <ul>
        @foreach ($productos as $producto)
            <li>{{ $producto->nombre }} - ${{ $producto->precio }} (Cantidad: {{ $producto->pivot->cantidad }})</li>
        @endforeach
    </ul>

    <p>Total: ${{ $historialCompra->total }}</p>
</body>
</html>
