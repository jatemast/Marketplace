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
        <nav class="container px-6 py-3 mx-auto">
            <div class="flex items-center justify-between">
                <div class="text-2xl font-bold text-gray-800 animate-slideInLeft">Jamb Ecommerce</div>
                <div class="flex-1 mx-4">
                    <form class="flex">
                        <input type="text" placeholder="Buscar productos, marcas y más..." class="w-full px-2 py-1 transition duration-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <button type="submit" class="px-2 py-2 text-white transition duration-300 bg-gray-800 rounded-r-lg hover:bg-gray-700">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="flex items-center space-x-4 animate-slideInRight">
                    <a href="{{ route('login') }}" class="text-gray-800 transition duration-300 hover:text-gray-600"><i class="fas fa-shopping-cart"></i></a>
                    <a href="{{ route('login') }}" class="text-gray-800 transition duration-300 hover:text-gray-600"><i class="fas fa-bell"></i></a>
                    <a href="{{ route('login') }}" class="text-gray-800 transition duration-300 hover:text-gray-600"><i class="fas fa-user"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <nav class="py-2 text-white bg-gray-800 animate-fadeIn" style="animation-delay: 0.2s;">
    <div class="container flex justify-between px-6 mx-auto">
        <div class="flex space-x-4">
            <a href="{{ url('/categorias') }}" class="transition duration-300 hover:text-yellow-400">Categorías</a>
            <a href="{{ url('/ofertas') }}" class="transition duration-300 hover:text-yellow-400">Ofertas</a>
            <a href="{{ url('/historial') }}" class="transition duration-300 hover:text-yellow-400">Historial</a>
            <a href="{{ url('/vender') }}" class="transition duration-300 hover:text-yellow-400">Vender</a>
        </div>
        <div>
            <a href="#" class="transition duration-300 hover:text-yellow-400">Ayuda</a>
        </div>
    </div>
</nav>



    <main class="container px-6 py-8 mx-auto">
        <section class="mb-12 animate-fadeIn" style="animation-delay: 0.4s;">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg hover-shadow">
                <img src="/imagenes/banerpromocional.png" alt="Banner promocional" class="object-cover w-full h-64 transition duration-500 transform hover:scale-105">
            </div>
        </section>

        <section class="mb-12 animate-fadeIn" style="animation-delay: 0.6s;">
            <h2 class="mb-6 text-2xl font-bold text-gray-800">Categorías populares</h2>
            <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-6">
                <a href="#" class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <i class="mb-2 text-4xl text-blue-500 fas fa-tshirt"></i>
                    <p>Ropa</p>
                </a>
                <a href="#" class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <i class="mb-2 text-4xl text-green-500 fas fa-shoe-prints"></i>
                    <p>Zapatos</p>
                </a>
                <a href="#" class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <i class="mb-2 text-4xl text-red-500 fas fa-tools"></i>
                    <p>Herramientas</p>
                </a>
                <a href="#" class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <i class="mb-2 text-4xl text-purple-500 fas fa-mobile-alt"></i>
                    <p>Electrónicos</p>
                </a>
                <a href="#" class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <i class="mb-2 text-4xl text-yellow-500 fas fa-couch"></i>
                    <p>Hogar</p>
                </a>
                <a href="#" class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <i class="mb-2 text-4xl text-indigo-500 fas fa-futbol"></i>
                    <p>Deportes</p>
                </a>
            </div>
        </section>

        <section class="mb-12 animate-fadeIn" style="animation-delay: 0.8s;">
            <h2 class="mb-6 text-2xl font-bold text-gray-800">Ofertas del día</h2>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="overflow-hidden bg-white rounded-lg shadow-lg hover-shadow animate-scaleIn">
                    <img src="/imagenes/Smartphone XYZ.jpg" alt="Producto 1" class="object-cover w-full h-48 transition duration-500 transform hover:scale-105">
                    <div class="p-4">
                        <h3 class="mb-2 text-lg font-bold">Smartphone XYZ</h3>
                        <p class="mb-2 text-gray-600">Último modelo, 128GB</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-green-600">$599.99</span>
                            <span class="text-sm text-gray-500 line-through">$799.99</span>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden bg-white rounded-lg shadow-lg hover-shadow animate-scaleIn" style="animation-delay: 0.2s;">
                    <img src="/imagenes/Laptop Ultradelgada.webp" alt="Producto 2" class="object-cover w-full h-48 transition duration-500 transform hover:scale-105">
                    <div class="p-4">
                        <h3 class="mb-2 text-lg font-bold">Laptop Ultradelgada</h3>
                        <p class="mb-2 text-gray-600">Core i7, 16GB RAM, SSD 512GB</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-green-600">$1099.99</span>
                            <span class="text-sm text-gray-500 line-through">$1399.99</span>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden bg-white rounded-lg shadow-lg hover-shadow animate-scaleIn" style="animation-delay: 0.4s;">
                    <img src="/imagenes/Set de Herramientas.webp" alt="Producto 3" class="object-cover w-full h-48 transition duration-500 transform hover:scale-105">
                    <div class="p-4">
                        <h3 class="mb-2 text-lg font-bold">Set de Herramientas</h3>
                        <p class="mb-2 text-gray-600">200 piezas, maleta incluida</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-green-600">$149.99</span>
                            <span class="text-sm text-gray-500 line-through">$249.99</span>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden bg-white rounded-lg shadow-lg hover-shadow animate-scaleIn" style="animation-delay: 0.6s;">
                    <img src="/imagenes/Zapatillas Running.avif" alt="Producto 4" class="object-cover w-full h-48 transition duration-500 transform hover:scale-105">
                    <div class="p-4">
                        <h3 class="mb-2 text-lg font-bold">Zapatillas Running</h3>
                        <p class="mb-2 text-gray-600">Ultra ligeras, todas las tallas</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-green-600">$79.99</span>
                            <span class="text-sm text-gray-500 line-through">$129.99</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-12 animate-fadeIn" style="animation-delay: 1s;">
            <h2 class="mb-6 text-2xl font-bold text-gray-800">Lo más vendido</h2>
            <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-6">
                <div class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <img src="/imagenes/Auriculares Bluetooth.webp" alt="Producto popular 1" class="object-cover w-full h-32 mb-2 transition duration-500 transform rounded hover:scale-105">
                    <p class="font-bold">Auriculares Bluetooth</p>
                    <p class="text-green-600">$49.99</p>
                </div>
                <div class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <img src="/imagenes/Smartwatch.webp" alt="Producto popular 2" class="object-cover w-full h-32 mb-2 transition duration-500 transform rounded hover:scale-105">
                    <p class="font-bold">Smartwatch</p>
                    <p class="text-green-600">$89.99</p>
                </div>
                <div class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <img src="/imagenes/Cámara Action.webp" alt="Producto popular 3" class="object-cover w-full h-32 mb-2 transition duration-500 transform rounded hover:scale-105">
                    <p class="font-bold">Cámara Action</p>
                    <p class="text-green-600">$129.99</p>
                </div>
                <div class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <img src="/imagenes/Teclado Gaming.webp" alt="Producto popular 4" class="object-cover w-full h-32 mb-2 transition duration-500 transform rounded hover:scale-105">
                    <p class="font-bold">Teclado Gaming</p>
                    <p class="text-green-600">$69.99</p>
                </div>
                <div class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <img src="/imagenes/Drone con Cámara.webp" alt="Producto popular 5" class="object-cover w-full h-32 mb-2 transition duration-500 transform rounded hover:scale-105">
                    <p class="font-bold">Drone con Cámara</p>
                    <p class="text-green-600">$199.99</p>
                </div>
                <div class="p-4 text-center transition duration-300 bg-white rounded-lg shadow hover-grow hover-shadow">
                    <img src="/imagenes/Altavoz Portátil.png" alt="Producto popular 6" class="object-cover w-full h-32 mb-2 transition duration-500 transform rounded hover:scale-105">
                    <p class="font-bold">Altavoz Portátil</p>
                    <p class="text-green-600">$39.99</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-8 text-white bg-gray-800 animate-fadeIn" style="animation-delay: 1.2s;">
        <div class="container px-6 mx-auto">

    <footer class="py-8 text-white bg-gray-800">
        <div class="container px-6 mx-auto">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                <div>
                    <h3 class="mb-4 text-lg font-bold">Acerca de Jamb Ecommerce</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400">Quiénes somos</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Términos y condiciones</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Privacidad</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-bold">Comprar</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400">Cómo comprar</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Métodos de pago</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Garantías</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-bold">Vender</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400">Cómo vender</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Comisiones</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Reglas de publicación</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-bold">Ayuda</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400">Preguntas frecuentes</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Contacto</a></li>
                        <li><a href="#" class="hover:text-yellow-400">Reportar un problema</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center justify-between pt-8 mt-8 border-t border-gray-700 md:flex-row">
                <p>&copy; 2024 Jamb Ecommerce. Todos los derechos reservados.</p>
                <div class="flex mt-4 space-x-4 md:mt-0">
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
