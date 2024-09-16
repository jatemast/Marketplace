<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <h1 class="text-2xl font-semibold mb-6 text-gray-800">Editar Producto</h1>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                <input type="number" name="precio" id="precio" step="0.01" value="{{ $producto->precio }}" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ $producto->stock }}" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div>
                <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
                <select name="categoria_id" id="categoria_id" required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
                @if ($producto->imagen)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="w-32 h-32 object-cover">
                    </div>
                @endif
                <input type="file" name="imagen" id="imagen" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                <p class="text-sm text-gray-500 mt-1">Opcional. Formatos aceptados: jpg, jpeg, png, gif. Tamaño máximo: 2MB.</p>
            </div>

            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('productos.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">
                    Volver a la lista
                </a>
                <button type="submit" 
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Actualizar Producto
                </button>
            </div>
        </form>
    </div>
</body>
</html>
