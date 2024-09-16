<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas - Jamb Ecommerce</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fadeIn { animation: fadeIn 0.5s ease-out; }
        .hover-grow { transition: transform 0.3s ease; }
        .hover-grow:hover { transform: scale(1.05); }
        .hover-shadow { transition: box-shadow 0.3s ease; }
        .hover-shadow:hover { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-yellow-400 shadow-lg animate-fadeIn">
        <nav class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-gray-800">Jamb Ecommerce</div>
                <div class="flex-1 mx-4">
                    <form class="flex">
                        <input type="text" placeholder="Buscar ofertas..." class="w-full px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-300">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-r-lg hover:bg-gray-700 transition duration-300">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="flex items-center space-x-4 animate-slideInRight">
                    <a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-600 transition duration-300"><i class="fas fa-shopping-cart"></i></a>
                    <a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-600 transition duration-300"><i class="fas fa-bell"></i></a>
                    <a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-600 transition duration-300"><i class="fas fa-user"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <nav class="bg-gray-800 text-white py-2 animate-fadeIn">
        <div class="container mx-auto px-6 flex justify-between">
            <div class="flex space-x-4">
                <a href="{{ url('/') }}" class="hover:text-yellow-400 transition duration-300">Inicio</a>
                <a href="{{ url('/categorias') }}" class="hover:text-yellow-400 transition duration-300">Categorías</a>
                <a href="{{ url('/historial') }}" class="hover:text-yellow-400 transition duration-300">Historial</a>
                <a href="{{ url('/vender') }}" class="hover:text-yellow-400 transition duration-300">Vender</a>
            </div>
            <div>
                <a href="#" class="hover:text-yellow-400 transition duration-300">Ayuda</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 animate-slideInLeft">Vender un Producto</h1>
        
        <div class="bg-white rounded-lg shadow-lg overflow-hidden animate-fadeIn" style="animation-delay: 0.4s;">
            <form class="p-6">
                <div class="mb-4">
                    <label for="product-name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
                    <input type="text" id="product-name" name="product-name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="product-description" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                    <textarea id="product-description" name="product-description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="product-price" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                    <input type="number" id="product-price" name="product-price" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text