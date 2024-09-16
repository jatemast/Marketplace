<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Clase personalizada para el tamaño de la imagen */
        .image-size {
            width: 5cm;
            height: 5cm;
            object-fit: cover; /* Ajusta la imagen para cubrir el contenedor sin distorsionar */
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h1 class="text-2xl font-semibold text-gray-900">Detalle del Producto</h1>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <!-- Sección de Imagen -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Imagen</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="image-size">
                            @else
                                <span class="text-gray-500">No hay imagen disponible</span>
                            @endif
                        </dd>
                    </div>
                    <!-- Sección de Nombre -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $producto->nombre }}</dd>
                    </div>
                    <!-- Sección de Precio -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Precio</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">${{ number_format($producto->precio, 2) }}</dd>
                    </div>
                    <!-- Sección de Stock -->
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Stock</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $producto->stock }}</dd>
                    </div>
                    <!-- Sección de Categoría -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Categoría</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $producto->categoria->nombre }}</dd>
                    </div>
                </dl>
            </div>
        </div>
        
        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('productos.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                Volver a la lista
            </a>
            <div class="space-x-3">
                <a href="{{ route('productos.edit', $producto->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Editar Producto
                </a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

