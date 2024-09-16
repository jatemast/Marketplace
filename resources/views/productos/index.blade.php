<x-app-layout>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head><BR><BR></BR></BR>
<body class="bg-gray-100 min-h-screen p-8">
    <!-- Icono del carrito -->
    <div class="fixed top-4 right-4 z-50">
        <a href="{{ route('carrito.mostrar') }}" class="text-2xl text-gray-800 hover:text-gray-600">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>

    <!-- Modal del carrito -->
    <div id="carrito-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3">
            <h2 class="text-2xl font-semibold mb-4">Tu Carrito</h2>
            <!-- Aquí se mostrarán los productos del carrito -->
            <div id="carrito-contenido">
                <!-- Los productos se cargarán aquí mediante JavaScript -->
            </div>
            <button id="carrito-close" class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Cerrar</button>
        </div>
    </div>

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
                                <!-- Botón agregar al carrito -->
                                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Agregar al carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>   
                @endforeach
            </div>
        </div>
    </div>

    <!-- Scripts para manejar el modal -->
    <script>
        document.getElementById('carrito-btn').addEventListener('click', function() {
            document.getElementById('carrito-modal').classList.remove('hidden');
            fetch('/carrito') // Ajusta la URL según cómo obtengas los productos del carrito
                .then(response => response.json())
                .then(data => {
                    const carritoContenido = document.getElementById('carrito-contenido');
                    carritoContenido.innerHTML = '';
                    data.forEach(producto => {
                        carritoContenido.innerHTML += `
                            <div class="border-b border-gray-200 py-2">
                                <p class="text-lg font-semibold">${producto.nombre}</p>
                                <p class="text-gray-700">${producto.precio}</p>
                            </div>
                        `;
                    });
                });
        });

        document.getElementById('carrito-close').addEventListener('click', function() {
            document.getElementById('carrito-modal').classList.add('hidden');
        });
    </script>
</body>
</html>
</x-app-layout>