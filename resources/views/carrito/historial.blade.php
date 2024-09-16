<x-app-layout>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        @if ($historialCompras->isEmpty())
            <p class="text-gray-600">No tienes compras en el historial.</p>
        @else
            @foreach ($historialCompras as $historialCompra)
                <div class="bg-white shadow-md rounded-lg mb-6 p-4">
                    <div class="flex justify-between items-center border-b pb-2 mb-2">
                        <h2 class="text-xl font-semibold text-gray-800">Compra ID: {{ $historialCompra->id }}</h2>
                        <!-- Convierte la fecha desde formato Y-m-d a d/m/Y en la vista -->
                        <span class="text-gray-600">Fecha: {{ date('d/m/Y', strtotime($historialCompra->fecha)) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <h3 class="text-lg font-medium text-gray-800">Total: ${{ number_format($historialCompra->total, 2) }}</h3>
                    </div>
                    <ul class="list-disc pl-5">
                        @foreach ($historialCompra->productos as $producto)
                            <li class="mb-2">
                                <span class="font-semibold text-gray-700">{{ $producto->producto->nombre }}</span> - Cantidad: {{ $producto->cantidad }} - Precio: ${{ number_format($producto->precio, 2) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
</x-app-layout>