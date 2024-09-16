<x-app-layout>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head><BR><BR></BR></BR>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Carrito de Compras</h1>
    
        @if ($productos->isEmpty())
            <p class="text-gray-500">No hay productos en el carrito.</p>
        @else
            <ul class="list-disc pl-5 mb-6">
                @foreach ($productos as $producto)
                    <li class="flex justify-between items-center mb-4">
                        <span class="font-semibold text-gray-700">{{ $producto->nombre }}</span>
                        <span class="text-gray-600">${{ number_format($producto->precio, 2) }}</span>
                        <span class="text-gray-600">Cantidad: {{ $producto->pivot->cantidad }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="flex justify-between items-center mb-6">
                <span class="font-bold text-gray-800 text-lg">Total:</span>
                <span class="text-xl font-bold text-gray-900">${{ number_format($total, 2) }}</span>
            </div>

            <form action="{{ route('carrito.pagar') }}" method="POST">
                @csrf
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">
                    Pagar
                </button>
            </form>
        @endif
    </div>
</body>
</html>
</x-app-layout>