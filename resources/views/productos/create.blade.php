<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Producto') }}
        </h2>
    </x-slot>

    <!-- Contenido Principal -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                
                <!-- Título de la Página -->
                <h1 class="text-4xl font-bold text-center text-blue-600 mb-8">Crear Nuevo Producto</h1>
                
                <!-- Grid Contenedor -->
                <div class="grid md:grid-cols-2 gap-8">

                    <!-- Formulario de Creación de Producto -->
                    <div class="space-y-6">
                        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            <!-- Nombre del Producto -->
                            <div>
                                <label for="nombre" class="block text-lg font-medium text-gray-700 mb-2">Nombre del Producto</label>
                                <input type="text" name="nombre" id="nombre" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-200 transition duration-200">
                            </div>

                            <!-- Precio del Producto -->
                            <div>
                                <label for="precio" class="block text-lg font-medium text-gray-700 mb-2">Precio ($)</label>
                                <input type="number" name="precio" id="precio" step="0.01" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-200 transition duration-200">
                            </div>

                            <!-- Stock Disponible -->
                            <div>
                                <label for="stock" class="block text-lg font-medium text-gray-700 mb-2">Stock Disponible</label>
                                <input type="number" name="stock" id="stock" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-200 transition duration-200">
                            </div>

                            <!-- Categoría del Producto -->
                            <div>
                                <label for="categoria_id" class="block text-lg font-medium text-gray-700 mb-2">Categoría del Producto</label>
                                <select name="categoria_id" id="categoria_id" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-200 transition duration-200">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Foto del Producto -->
                            <div>
                                <label for="imagen" class="block text-lg font-medium text-gray-700 mb-2">Foto del Producto</label>
                                <input type="file" name="imagen" id="imagen" accept="image/*" onchange="previewImage(event)" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-200 transition duration-200">
                                <img id="preview" src="#" alt="Vista previa" class="mt-4 w-full max-h-64 object-cover rounded-lg shadow-lg hidden">
                            </div>

                            <!-- Botón de Crear Producto -->
                            <button type="submit" class="w-full py-4 px-6 bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                                Crear Producto
                            </button>
                        </form>

                        <!-- Enlace para Volver -->
                        <a href="{{ route('productos.index') }}" class="inline-block mt-4 text-blue-600 hover:text-blue-800 transition duration-200">
                            &larr; Volver a la lista de productos
                        </a>
                    </div>

                    <!-- Sección Visual (Visible en pantallas grandes) -->
                    <div class="hidden md:flex items-center justify-center bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl p-8">
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
    </div>

    <!-- Función para previsualizar la imagen seleccionada -->
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    </script>
</x-app-layout>
