<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    </script>
</head>
<body class="bg-gradient-to-r from-blue-100 to-blue-200 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-4xl">
        <h1 class="text-4xl font-bold mb-8 text-center text-blue-600">Crear Nuevo Producto</h1>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label for="nombre" class="block text-lg font-medium text-gray-700 mb-2">Nombre del Producto</label>
                        <input type="text" name="nombre" id="nombre" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                    </div>
                    
                    <div>
                        <label for="precio" class="block text-lg font-medium text-gray-700 mb-2">Precio ($)</label>
                        <input type="number" name="precio" id="precio" step="0.01" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                    </div>
                    
                    <div>
                        <label for="stock" class="block text-lg font-medium text-gray-700 mb-2">Stock Disponible</label>
                        <input type="number" name="stock" id="stock" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                    </div>
                    
                    <div>
                        <label for="categoria_id" class="block text-lg font-medium text-gray-700 mb-2">Categoría del Producto</label>
                        <select name="categoria_id" id="categoria_id" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="imagen" class="block text-lg font-medium text-gray-700 mb-2">Foto del Producto</label>
                        <input type="file" name="imagen" id="imagen" accept="image/*" onchange="previewImage(event)" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                        <img id="preview" src="#" alt="Vista previa" style="display: none; margin-top: 10px; max-width: 100%; max-height: 300px;">
                    </div>
                    
                    <button type="submit" class="w-full py-4 px-6 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-lg font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                        Crear Producto
                    </button>
                </form>
                
                <a href="{{ route('productos.index') }}" class="inline-block mt-4 text-blue-600 hover:text-blue-800 transition duration-200">
                    &larr; Volver a la lista de productos
                </a>
            </div>
            <div class="hidden md:block">
                <div class="bg-gradient-to-br from-blue-400 to-indigo-500 h-full rounded-xl flex items-center justify-center p-8">
                    <div class="text-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mb-4 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <h2 class="text-2xl font-bold mb-2">¡Añade un Nuevo Producto!</h2>
                        <p class="text-lg">Completa el formulario para agregar un nuevo producto a tu inventario.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
