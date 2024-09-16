<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamb Ecommerce - Tu marketplace online</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideInFromLeft {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideInFromRight {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes scaleIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .animate-fadeIn { animation: fadeIn 0.5s ease-out; }
        .animate-slideInLeft { animation: slideInFromLeft 0.5s ease-out; }
        .animate-slideInRight { animation: slideInFromRight 0.5s ease-out; }
        .animate-scaleIn { animation: scaleIn 0.5s ease-out; }
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
                <div class="text-2xl font-bold text-gray-800 animate-slideInLeft">Jamb Ecommerce</div>
                <div class="flex-1 mx-4">
                    <form class="flex">
                        <input type="text" placeholder="Buscar productos, marcas y más..." class="w-full px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-300">
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

    <nav class="bg-gray-800 text-white py-2 animate-fadeIn" style="animation-delay: 0.2s;">
    <div class="container mx-auto px-6 flex justify-between">
        <div class="flex space-x-4">
            <a href="{{ url('/categorias') }}" class="hover:text-yellow-400 transition duration-300">Categorías</a>
            <a href="{{ url('/ofertas') }}" class="hover:text-yellow-400 transition duration-300">Ofertas</a>
            <a href="{{ url('/historial') }}" class="hover:text-yellow-400 transition duration-300">Historial</a>
            <a href="{{ url('/vender') }}" class="hover:text-yellow-400 transition duration-300">Vender</a>
        </div>
        <div>
            <a href="#" class="hover:text-yellow-400 transition duration-300">Ayuda</a>
        </div>
    </div>
</nav>



    <main class="container mx-auto px-6 py-8">
        <section class="mb-12 animate-fadeIn" style="animation-delay: 0.4s;">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow">
                <img src="/imagenes/banerpromocional.png" alt="Banner promocional" class="w-full h-64 object-cover transform hover:scale-105 transition duration-500">
            </div>
        </section>

        <section class="mb-12 animate-fadeIn" style="animation-delay: 0.6s;">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Categorías populares</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <a href="#" class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <i class="fas fa-tshirt text-4xl text-blue-500 mb-2"></i>
                    <p>Ropa</p>
                </a>
                <a href="#" class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <i class="fas fa-shoe-prints text-4xl text-green-500 mb-2"></i>
                    <p>Zapatos</p>
                </a>
                <a href="#" class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <i class="fas fa-tools text-4xl text-red-500 mb-2"></i>
                    <p>Herramientas</p>
                </a>
                <a href="#" class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <i class="fas fa-mobile-alt text-4xl text-purple-500 mb-2"></i>
                    <p>Electrónicos</p>
                </a>
                <a href="#" class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <i class="fas fa-couch text-4xl text-yellow-500 mb-2"></i>
                    <p>Hogar</p>
                </a>
                <a href="#" class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <i class="fas fa-futbol text-4xl text-indigo-500 mb-2"></i>
                    <p>Deportes</p>
                </a>
            </div>
        </section>

        <section class="mb-12 animate-fadeIn" style="animation-delay: 0.8s;">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Ofertas del día</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn">
                    <img src="/imagenes/Smartphone XYZ.jpg" alt="Producto 1" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">Smartphone XYZ</h3>
                        <p class="text-gray-600 mb-2">Último modelo, 128GB</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-green-600">$599.99</span>
                            <span class="text-sm text-gray-500 line-through">$799.99</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn" style="animation-delay: 0.2s;">
                    <img src="/imagenes/Laptop Ultradelgada.webp" alt="Producto 2" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">Laptop Ultradelgada</h3>
                        <p class="text-gray-600 mb-2">Core i7, 16GB RAM, SSD 512GB</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-green-600">$1099.99</span>
                            <span class="text-sm text-gray-500 line-through">$1399.99</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn" style="animation-delay: 0.4s;">
                    <img src="/imagenes/Set de Herramientas.webp" alt="Producto 3" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">Set de Herramientas</h3>
                        <p class="text-gray-600 mb-2">200 piezas, maleta incluida</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-green-600">$149.99</span>
                            <span class="text-sm text-gray-500 line-through">$249.99</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn" style="animation-delay: 0.6s;">
                    <img src="/imagenes/Zapatillas Running.avif" alt="Producto 4" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">Zapatillas Running</h3>
                        <p class="text-gray-600 mb-2">Ultra ligeras, todas las tallas</p>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-green-600">$79.99</span>
                            <span class="text-sm text-gray-500 line-through">$129.99</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-12 animate-fadeIn" style="animation-delay: 1s;">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Lo más vendido</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <img src="/imagenes/Auriculares Bluetooth.webp" alt="Producto popular 1" class="w-full h-32 object-cover mb-2 rounded transform hover:scale-105 transition duration-500">
                    <p class="font-bold">Auriculares Bluetooth</p>
                    <p class="text-green-600">$49.99</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <img src="/imagenes/Smartwatch.webp" alt="Producto popular 2" class="w-full h-32 object-cover mb-2 rounded transform hover:scale-105 transition duration-500">
                    <p class="font-bold">Smartwatch</p>
                    <p class="text-green-600">$89.99</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <img src="/imagenes/Cámara Action.webp" alt="Producto popular 3" class="w-full h-32 object-cover mb-2 rounded transform hover:scale-105 transition duration-500">
                    <p class="font-bold">Cámara Action</p>
                    <p class="text-green-600">$129.99</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <img src="/imagenes/Teclado Gaming.webp" alt="Producto popular 4" class="w-full h-32 object-cover mb-2 rounded transform hover:scale-105 transition duration-500">
                    <p class="font-bold">Teclado Gaming</p>
                    <p class="text-green-600">$69.99</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <img src="/imagenes/Drone con Cámara.webp" alt="Producto popular 5" class="w-full h-32 object-cover mb-2 rounded transform hover:scale-105 transition duration-500">
                    <p class="font-bold">Drone con Cámara</p>
                    <p class="text-green-600">$199.99</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center hover-grow hover-shadow transition duration-300">
                    <img src="/imagenes/Altavoz Portátil.png" alt="Producto popular 6" class="w-full h-32 object-cover mb-2 rounded transform hover:scale-105 transition duration-500">
                    <p class="font-bold">Altavoz Portátil</p>
                    <p class="text-green-600">$39.99</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-8 animate-fadeIn" style="animation-delay: 1.2s;">
        <div class="container mx-auto px-6">

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Acerca de Jamb Ecommerce</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400">Quiénes somos</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Términos y condiciones</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Privacidad</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Comprar</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400">Cómo comprar</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Métodos de pago</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Garantías</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Vender</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400">Cómo vender</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Comisiones</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Reglas de publicación</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Ayuda</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400">Preguntas frecuentes</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Contacto</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Reportar un problema</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p>&copy; 2024 Jamb Ecommerce. Todos los derechos reservados.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-youtube"></i></a>
                </div>
            </div>