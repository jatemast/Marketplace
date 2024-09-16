<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamb Ecommerce - Categorías</title>
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
                        <input type="text" placeholder="Buscar en todas las categorías..." class="w-full px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-300">
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
                <a href="/" class="hover:text-yellow-400 transition duration-300">Inicio</a>
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
        <h1 class="text-3xl font-bold text-gray-800 mb-6 animate-slideInLeft">Explora Nuestras Categorías</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-fadeIn" style="animation-delay: 0.4s;">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn" style="animation-delay: 0.2s;">
                <img src="/imagenes/Smartphones, laptops, tablets.webp" alt="Electrónicos" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Electrónicos</h2>
                    <p class="text-gray-600 mb-4">Smartphones, laptops, tablets y más</p>
                    <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Explorar <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn" style="animation-delay: 0.4s;">
                <img src="/imagenes/moda  ropa.jpg" alt="Moda" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Moda</h2>
                    <p class="text-gray-600 mb-4">Ropa, calzado y accesorios para todos</p>
                    <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Explorar <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn" style="animation-delay: 0.6s;">
                <img src="/imagenes/muebles patio.jpg" alt="Hogar y Jardín" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Hogar y Jardín</h2>
                    <p class="text-gray-600 mb-4">Muebles, decoración y herramientas</p>
                    <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Explorar <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn" style="animation-delay: 0.8s;">
                <img src="/imagenes/deporte.webp" alt="Deportes" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Deportes</h2>
                    <p class="text-gray-600 mb-4">Equipamiento, ropa y accesorios deportivos</p>
                    <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Explorar <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn" style="animation-delay: 1s;">
                <img src="/imagenes/juguetes para niños.avif" alt="Juguetes" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Juguetes</h2>
                    <p class="text-gray-600 mb-4">Juguetes para todas las edades</p>
                    <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Explorar <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover-shadow animate-scaleIn" style="animation-delay: 1.2s;">
                <img src="/imagenes/libros.png" alt="Libros" class="w-full h-48 object-cover transform hover:scale-105 transition duration-500">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Libros</h2>
                    <p class="text-gray-600 mb-4">Libros, eBooks y audiolibros</p>
                    <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Explorar <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-8 animate-fadeIn" style="animation-delay: 1.4s;">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Acerca de Jamb Ecommerce</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Quiénes somos</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Términos y condiciones</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Privacidad</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Comprar</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Cómo comprar</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Métodos de pago</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Garantías</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Vender</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Cómo vender</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Comisiones</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Reglas de publicación</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Ayuda</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Preguntas frecuentes</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Contacto</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition duration-300">Reportar un problema</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p>&copy; 2024 Jamb Ecommerce. Todos los derechos reservados.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-2xl hover:text-yellow-400 transition duration-300"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400 transition duration-300"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400 transition duration-300"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400 transition duration-300"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>