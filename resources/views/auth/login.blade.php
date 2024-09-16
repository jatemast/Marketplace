<x-guest-layout>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Jamb Ecommerce</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap');

        :root {
            --primary-color: #FFA000;
            --secondary-color: #2C3E50;
            --accent-color: #E74C3C;
            --background-color: #ECF0F1;
            --text-color: #34495E;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            overflow-x: hidden;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
        }

        .brand-logo {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .input-group {
            position: relative;
            margin-bottom: 2rem;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            background-color: rgba(236, 240, 241, 0.5);
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .input-group input:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--primary-color);
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #7f8c8d;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: 0;
            font-size: 0.75rem;
            color: var(--primary-color);
            background-color: white;
            padding: 0 5px;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(45deg);
            transition: all 0.3s ease;
        }

        .btn-primary:hover::after {
            top: -100%;
            left: -100%;
        }

        .social-login-btn {
            transition: all 0.3s ease;
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }

        .social-login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #background-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background-color: rgba(255, 160, 0, 0.1);
            border-radius: 50%;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <canvas id="background-canvas"></canvas>
    <div class="floating-shapes"></div>

    <div class="login-container max-w-md w-full space-y-8 p-10 relative z-10">
        <div class="text-center">
            <h1 class="brand-logo text-5xl mb-2">Jamb</h1>
            <p class="text-gray-600 text-sm">Tu marketplace de confianza</p>
        </div>
        
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
            Bienvenido de vuelta
        </h2>
        
        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-group">
                <input id="email" name="email" type="email" autocomplete="email" required placeholder=" ">
                <label for="email">Correo electrónico</label>
            </div>
            <div class="input-group">
                <input id="password" name="password" type="password" autocomplete="current-password" required placeholder=" ">
                <label for="password">Contraseña</label>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        Recuérdame
                    </label>
                </div>

                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-yellow-500 hover:text-yellow-400 transition duration-150 ease-in-out">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit" class="btn-primary group relative w-full flex justify-center py-3 px-4 text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-sign-in-alt"></i>
                    </span>
                    Iniciar sesión
                </button>
            </div>
        </form>

        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">
                        O continúa con
                    </span>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-3 gap-3">
                <button class="social-login-btn w-full flex justify-center py-2 px-4 rounded-md shadow-sm text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fab fa-facebook-f text-blue-600"></i>
                </button>
                <button class="social-login-btn w-full flex justify-center py-2 px-4 rounded-md shadow-sm text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fab fa-google text-red-600"></i>
                </button>
                <button class="social-login-btn w-full flex justify-center py-2 px-4 rounded-md shadow-sm text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fab fa-twitter text-blue-400"></i>
                </button>
            </div>
        </div>

        <p class="mt-8 text-center text-sm text-gray-600">
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}" class="font-medium text-yellow-500 hover:text-yellow-400 transition duration-150 ease-in-out">
                Regístrate ahora
            </a>
        </p>
    </div>

    <script>
        // Inicialización de Three.js
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas: document.getElementById('background-canvas'), alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        // Crear partículas
        const particlesGeometry = new THREE.BufferGeometry();
        const particlesCount = 5000;
        const posArray = new Float32Array(particlesCount * 3);

        for (let i = 0; i < particlesCount * 3; i++) {
            posArray[i] = (Math.random() - 0.5) * 5;
        }

        particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));

        const particlesMaterial = new THREE.PointsMaterial({
            size: 0.005,
            color: 0xFFA000
        });

        const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
        scene.add(particlesMesh);

        camera.position.z = 3;

        const animate = () => {
            requestAnimationFrame(animate);
            particlesMesh.rotation.y += 0.001;
            renderer.render(scene, camera);
        };

        animate();

        // Responsive
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });

        // Animaciones con GSAP
        gsap.from('.login-container', { duration: 1, opacity: 0, y: 50, ease: 'power3.out' });
        gsap.from('.brand-logo', { duration: 1, opacity: 0, y: -50, ease: 'power3.out', delay: 0.5 });
        gsap.from('form', { duration: 1, opacity: 0, x: -50, ease: 'power3.out', delay: 0.7 });
        gsap.from('.social-login-btn', { 
            duration: 0.5, 
            opacity: 0, 
            y: 20, 
            ease: 'power3.out',
            stagger: 0.1,
            delay: 1
        });

        // Floating shapes animation
        const shapesContainer = document.querySelector('.floating-shapes');
        const shapesCount = 20;

        for (let i = 0; i < shapesCount; i++) {
            const shape = document.createElement('div');
            shape.classList.add('shape');
            shape.style.width = `${Math.random() * 50 + 10}px`;
            shape.style.height = shape.style.width;
            shape.style.left = `${Math.random() * 100}%`;
            shape.style.top = `${Math.random() * 100}%`;
            shapesContainer.appendChild(shape);

            gsap.to(shape, {
                x: `random(-100, 100)`,
                y: `random(-100, 100)`,
                duration: `random(10, 20)`,
                repeat: -1,
                yoyo: true,
                ease: 'sine.inOut'
            });
        }
    </script>
</body>
</html>
</x-guest-layout>