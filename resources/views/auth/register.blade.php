<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Jamb Ecommerce</title>
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

        .register-container {
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
            margin-bottom: 1.5rem;
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

        .social-register-btn {
            transition: all 0.3s ease;
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }

        .social-register-btn:hover {
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

        .progress-bar {
            width: 100%;
            height: 4px;
            background-color: #e0e0e0;
            border-radius: 2px;
            margin-bottom: 2rem;
        }

        .progress {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <canvas id="background-canvas"></canvas>
    <div class="floating-shapes"></div>

    <div class="register-container max-w-md w-full space-y-8 p-10 relative z-10">
        <div class="text-center">
            <h1 class="brand-logo text-5xl mb-2">Jamb</h1>
            <p class="text-gray-600 text-sm">Tu marketplace de confianza</p>
        </div>
        
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
            Crea tu cuenta
        </h2>
        
        <div class="progress-bar">
            <div class="progress" style="width: 33%;"></div>
        </div>

        <form id="register-form" class="mt-8 space-y-6">
            @csrf
            <div class="step active" data-step="1">
                <div class="input-group">
                    <input id="name" name="name" type="text" required placeholder=" ">
                    <label for="name">Nombre completo</label>
                </div>
                <div class="input-group">
                    <input id="email" name="email" type="email" autocomplete="email" required placeholder=" ">
                    <label for="email">Correo electrónico</label>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="btn-primary next-step" data-next="2">
                        Siguiente <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <div class="step" data-step="2">
                <div class="input-group">
                    <input id="password" name="password" type="password" required placeholder=" ">
                    <label for="password">Contraseña</label>
                </div>
                <div class="password-strength"></div>
                <div class="input-group">
                    <input id="password_confirmation" name="password_confirmation" type="password" required placeholder=" ">
                    <label for="password_confirmation">Confirmar contraseña</label>
                </div>
                <div class="flex justify-between">
                    <button type="button" class="btn-primary prev-step" data-prev="1">
                        <i class="fas fa-arrow-left mr-2"></i> Anterior
                    </button>
                    <button type="button" class="btn-primary next-step" data-next="3">
                        Siguiente <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <div class="step" data-step="3">
                <div class="input-group">
                    <input id="phone" name="phone" type="tel" required placeholder=" ">
                    <label for="phone">Número de teléfono</label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        Acepto los <a href="#" class="text-yellow-500 hover:text-yellow-400">términos y condiciones</a>
                    </label>
                </div>
                <div class="flex justify-between">
                    <button type="button" class="btn-primary prev-step" data-prev="2">
                        <i class="fas fa-arrow-left mr-2"></i> Anterior
                    </button>
                    <button type="submit" class="btn-primary">
                        Registrarse <i class="fas fa-user-plus ml-2"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">
                        O regístrate con
                    </span>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-3 gap-3">
                <button class="social-register-btn w-full flex justify-center py-2 px-4 rounded-md shadow-sm text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fab fa-facebook-f text-blue-600"></i>
                </button>
                <button class="social-register-btn w-full flex justify-center py-2 px-4 rounded-md shadow-sm text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fab fa-google text-red-600"></i>
                </button>
                <button class="social-register-btn w-full flex justify-center py-2 px-4 rounded-md shadow-sm text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <i class="fab fa-twitter text-blue-400"></i>
                </button>
            </div>
        </div>

        <p class="mt-8 text-center text-sm text-gray-600">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}" class="font-medium text-yellow-500 hover:text-yellow-400 transition duration-150 ease-in-out">
                Inicia sesión aquí
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
        gsap.from('.register-container', { duration: 1, opacity: 0, y: 50, ease: 'power3.out' });
        gsap.from('.brand-logo', { duration: 1, opacity: 0, y: -50, ease: 'power3.out', delay: 0.5 });
        gsap.from('form', { duration: 1, opacity: 0, x: -50, ease: 'power3.out', delay: 0.7 });
        gsap.from('.social-register-btn', { 
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

        // Manejo de pasos del formulario
        const form = document.getElementById('register-form');
        const steps = form.querySelectorAll('.step');
        const progressBar = document.querySelector('.progress');
        const nextButtons = form.querySelectorAll('.next-step');
        const prevButtons = form.querySelectorAll('.prev-step');

        let currentStep = 1;

        nextButtons.forEach(button => {
            button.addEventListener('click', () => {
                const nextStep = parseInt(button.dataset.next);
                if (validateStep(currentStep)) {
                    showStep(nextStep);
                }
            });
        });

        prevButtons.forEach(button => {
            button.addEventListener('click', () => {
                const prevStep = parseInt(button.dataset.prev);
                showStep(prevStep);
            });
        });

        function showStep(step) {
            steps.forEach(s => s.classList.remove('active'));
            const activeStep = form.querySelector(`[data-step="${step}"]`);
            activeStep.classList.add('active');
            currentStep = step;
            updateProgressBar();
        }

        function updateProgressBar() {
            const progress = ((currentStep - 1) / (steps.length - 1)) * 100;
            progressBar.style.width = `${progress}%`;
        }

        function validateStep(step) {
            const activeStep = form.querySelector(`[data-step="${step}"]`);
            const inputs = activeStep.querySelectorAll('input[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-500');
                } else {
                    input.classList.remove('border-red-500');
                }
            });

            if (step === 2) {
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('password_confirmation');
                if (password.value !== confirmPassword.value) {
                    isValid = false;
                    confirmPassword.classList.add('border-red-500');
                    alert('Las contraseñas no coinciden');
                } else {
                    confirmPassword.classList.remove('border-red-500');
                }
            }

            return isValid;
        }

        // Validación de fuerza de contraseña
        const passwordInput = document.getElementById('password');
        const passwordStrength = document.querySelector('.password-strength');

        passwordInput.addEventListener('input', updatePasswordStrength);

        function updatePasswordStrength() {
            const password = passwordInput.value;
            const strength = calculatePasswordStrength(password);
            
            passwordStrength.style.width = `${strength}%`;
            
            if (strength < 33) {
                passwordStrength.style.backgroundColor = '#ff4d4d';
            } else if (strength < 66) {
                passwordStrength.style.backgroundColor = '#ffa64d';
            } else {
                passwordStrength.style.backgroundColor = '#4CAF50';
            }
        }

        function calculatePasswordStrength(password) {
            let strength = 0;
            if (password.length > 6) strength += 20;
            if (password.length > 10) strength += 20;
            if (/[A-Z]/.test(password)) strength += 20;
            if (/[0-9]/.test(password)) strength += 20;
            if (/[^A-Za-z0-9]/.test(password)) strength += 20;
            return strength;
        }

        // Envío del formulario
form.addEventListener('submit', async (e) => {
    e.preventDefault();
    if (validateStep(currentStep)) {
        const formData = new FormData(form);
        try {
            const response = await fetch('{{ route("register") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            });

            if (response.ok) {
                // Registro exitoso
                alert('¡Registro exitoso! Serás redirigido a la página de inicio de sesión.');
                setTimeout(() => {
                    window.location.href = '{{ route("login") }}';
                }, 1000); // Espera 1 segundo antes de redirigir
            } else {
                const errorData = await response.json();
                alert('Error en el registro: ' + errorData.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Ocurrió un error durante el registro. Por favor, inténtelo de nuevo.');
        }
    }
});
    </script>
</body>
</html>