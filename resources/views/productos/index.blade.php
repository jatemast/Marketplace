<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-800 text-white">
            <h1 class="text-2xl font-semibold">Lista de Productos</h1>
        </div>
        <div class="p-6">
            <!-- Formulario de búsqueda por categoría y nombre -->
            <form method="GET" action="{{ route('productos.index') }}" class="mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
                    <select name="categoria_id" class="px-4 py-2 border border-gray-300 rounded-md mb-2 md:mb-0">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" name="search_name" value="{{ $search_name }}" placeholder="Buscar por nombre" class="px-4 py-2 border border-gray-300 rounded-md mb-2 md:mb-0 flex-1">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-medium rounded hover:bg-indigo-700 transition duration-300 ease-in-out mb-2 md:mb-0">
                        Buscar
                    </button>
                    <!-- Botón para refrescar la página -->
                    <a href="{{ route('productos.index') }}" class="px-4 py-2 bg-gray-600 text-white font-medium rounded hover:bg-gray-700 transition duration-300 ease-in-out">
                        Refrescar
                    </a>
                </div>
            </form>

            <a href="{{ route('productos.create') }}" class="inline-block mb-6 px-4 py-2 bg-indigo-600 text-white font-medium rounded hover:bg-indigo-700 transition duration-300 ease-in-out">
                Crear Producto
            </a>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($productos as $producto)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                        @if ($producto->imagen)
                            <img src="{{ Storage::url($producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Sin imagen</span>
                            </div>
                        @endif
                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-gray-900">{{ $producto->nombre }}</h2>
                            <p class="text-gray-700">${{ number_format($producto->precio, 2) }}</p>
                            <p class="text-gray-500">Stock: {{ $producto->stock }}</p>
                            <p class="text-gray-500">Categoría: {{ $producto->categoria->nombre }}</p>
                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('productos.show', $producto->id) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                <a href="{{ route('productos.edit', $producto->id) }}" class="text-gray-600 hover:text-gray-900">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
