<x-sider>
</x-sider>
<div x-data="{ showModal: false }" class="min-h-screen bg-gray-100">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-600">
        <div class="mx-auto max-w-7xl">
            <div class="relative z-10 pb-16 sm:pb-24 lg:pb-32 xl:pb-48">
                <main class="px-4 mx-auto mt-10 max-w-7xl sm:mt-12 sm:px-6 lg:mt-20 xl:mt-28">
                    <div class="text-center lg:text-left">
                        <h1 class="text-5xl font-extrabold tracking-tight text-white sm:text-6xl md:text-7xl animate-fade-in-down">
                            <span class="block xl:inline">Bienvenido, {{ Auth::user()->name }}</span>
                            <span class="block text-yellow-300 xl:inline">Tu Marketplace Premium</span>
                        </h1>
                        <p class="mt-5 text-lg text-gray-200 sm:mt-6 sm:max-w-xl sm:mx-auto md:text-xl lg:mx-0 animate-fade-in-up">
                            Explora productos de alta calidad y vende lo que desees. Haz crecer tu negocio con nosotros.
                        </p>
                        <div class="mt-8 space-y-4 sm:flex sm:justify-center lg:justify-start sm:space-y-0 sm:space-x-4 animate-bounce">
                            <a href="{{ route('productos.index') }}" class="inline-flex items-center justify-center w-full px-8 py-3 text-lg font-medium text-white transition-all duration-300 ease-in-out transform bg-blue-500 rounded-lg shadow-lg sm:w-auto hover:bg-blue-600 hover:scale-105">
                                Explorar Productos
                            </a>
                            <a href="{{ route('productos.create') }}" class="inline-flex items-center justify-center w-full px-8 py-3 text-lg font-medium text-white transition-all duration-300 ease-in-out transform bg-yellow-400 rounded-lg shadow-lg sm:w-auto hover:bg-yellow-500 hover:scale-105">
                                Vender Artículo
                            </a>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="object-cover w-full h-64 transition-all duration-300 rounded-tl-lg shadow-lg sm:h-72 md:h-96 lg:w-full lg:h-full hover:scale-105" src="{{ asset('images/marketplace-hero.jpg') }}" alt="Marketplace Shopping">
        </div>
    </div>

    <!-- Feature Section -->
    <div class="py-20 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold tracking-wide text-blue-600 uppercase">Características Exclusivas</h2>
                <p class="mt-2 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                    Diseñado para el éxito comercial
                </p>
                <p class="max-w-2xl mx-auto mt-5 text-lg text-gray-500">
                    Aprovecha nuestras herramientas avanzadas para optimizar tus ventas y compras.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-10 mt-16 md:grid-cols-2">
                @foreach([
                    ['icon' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Compra Segura', 'description' => 'Transacciones seguras con garantía de satisfacción.'],
                    ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2-3 .895-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Venta Ágil', 'description' => 'Sube tus productos con herramientas fáciles y eficaces.'],
                    ['icon' => 'M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z', 'title' => 'Comunicación Fluida', 'description' => 'Chatea con clientes en tiempo real para mejorar tus ventas.'],
                    ['icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01', 'title' => 'Reputación Verificada', 'description' => 'Sistema de reseñas que garantiza la calidad y confianza en la plataforma.'],
                ] as $feature)
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-12 h-12 text-white bg-blue-600 rounded-full animate-spin-slow">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $feature['title'] }}</h3>
                            <p class="mt-2 text-base text-gray-500">{{ $feature['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600">
        <div class="max-w-2xl px-4 py-20 mx-auto text-center sm:px-6 lg:px-8">
            <h2 class="text-4xl font-extrabold text-white sm:text-5xl">
                <span class="block">¿Estás listo para avanzar?</span>
                <span class="block">Comienza a explorar hoy mismo.</span>
            </h2>
            <p class="mt-5 text-lg leading-6 text-indigo-200">
                Encuentra lo que necesitas o vende lo que ya no usas. ¡Empieza ahora!
            </p>
            <a href="{{ route('productos.index') }}" class="inline-flex items-center justify-center px-5 py-3 mt-8 text-lg font-medium text-blue-600 transition-all duration-300 ease-in-out transform bg-white rounded-lg shadow-lg hover:bg-gray-100 hover:scale-105">
                Explorar Productos
            </a>
        </div>
    </div>
</div>
