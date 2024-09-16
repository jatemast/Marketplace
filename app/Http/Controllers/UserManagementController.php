<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator; // Importa el facade Validator
use Illuminate\Support\Facades\Hash; // Importa el facade Hash
use Spatie\Permission\Models\Role; // Importar la clase Role
 

class UserManagementController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $users = User::all();
        $roles = Role::all(); // Obtener todos los roles disponibles
        
        return view('user-management.index', compact('users', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validar datos de entrada
        $validator = Validator::make($request->all(), [
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Actualizar contraseña si se proporciona
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('user-management.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function updateRoles(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validar datos de entrada
        $validator = Validator::make($request->all(), [
            'role' => 'required|exists:roles,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Asignar nuevo rol
        $role = Role::where('name', $request->role)->first();
        $user->syncRoles($role);

        return redirect()->route('user-management.index')->with('success', 'Rol actualizado correctamente');
    }

    public function search(Request $request)
    {
        // Obtener parámetros de búsqueda
        $search = $request->input('search');

        // Construir la consulta
        $query = User::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Obtener los usuarios filtrados
        $users = $query->get();
        $roles = Role::all(); // Obtener todos los roles disponibles
        
        return view('user-management.index', compact('users', 'roles'));
    }
}