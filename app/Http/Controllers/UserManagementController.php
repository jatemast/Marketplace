<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator; // Importa el facade Validator
use Illuminate\Support\Facades\Hash; // Importa el facade Hash
 

class UserManagementController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $users = User::all();
      
        return view('user-management.index', compact('users'));
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
}