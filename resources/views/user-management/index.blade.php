<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6 mt-10">
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-4xl font-bold mb-6 text-gray-800">Gestión de Usuarios</h1>

            <!-- Botón de refrescar página -->
            <button onclick="location.reload();" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 transition mb-6">
                Refrescar Página
            </button>
            
            <!-- Formulario de búsqueda -->
            <form action="{{ route('user-management.search') }}" method="GET" class="mb-6 flex space-x-4">
                <input type="text" name="search" placeholder="Buscar por nombre o correo" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:ring-blue-500 focus:border-blue-500" value="{{ request('search') }}">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    Buscar
                </button>
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-blue-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $user->getRoleNames()->first() ?? 'Sin rol' }}</td>
                                <td class="px-6 py-4 text-sm font-medium">
                                    <!-- Formulario para actualizar contraseña -->
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" onclick="toggleForm({{ $user->id }})">
                                        Recuperar contraseña
                                    </button>
                                    
                                    <form id="update-form-{{ $user->id }}" action="{{ route('user-management.update', $user->id) }}" method="POST" class="hidden mt-4">
                                        @csrf
                                        <div class="space-y-4">
                                            <div>
                                                <label for="password-{{ $user->id }}" class="block text-sm font-medium text-gray-700">Nueva Contraseña</label>
                                                <input id="password-{{ $user->id }}" name="password" type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @error('password')
                                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="password_confirmation-{{ $user->id }}" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                                                <input id="password_confirmation-{{ $user->id }}" name="password_confirmation" type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            </div>

                                            <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 transition">
                                                Actualizar Contraseña
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Formulario para actualizar rol -->
                                    <button class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition mt-4" onclick="toggleRoleForm({{ $user->id }})">
                                        Actualizar rol
                                    </button>

                                    <form id="role-form-{{ $user->id }}" action="{{ route('user-management.update-roles', $user->id) }}" method="POST" class="hidden mt-4">
                                        @csrf
                                        <div class="space-y-4">
                                            <div>
                                                <label for="role-{{ $user->id }}" class="block text-sm font-medium text-gray-700">Rol</label>
                                                <select id="role-{{ $user->id }}" name="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <button type="submit" class="w-full bg-orange-600 text-white px-4 py-2 rounded-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-400 transition">
                                                Actualizar Rol
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleForm(userId) {
            document.getElementById('update-form-' + userId).classList.toggle('hidden');
        }

        function toggleRoleForm(userId) {
            document.getElementById('role-form-' + userId).classList.toggle('hidden');
        }
    </script>
</body>
</html>
