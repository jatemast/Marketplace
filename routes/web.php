<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\Auth\RegisterController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

 
// Ruta para mostrar la lista de usuarios y manejar la búsqueda
Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');

// Ruta para actualizar la contraseña de un usuario
Route::post('/user-management/update/{id}', [UserManagementController::class, 'update'])->name('user-management.update');

// Ruta para actualizar los roles de un usuario
Route::post('/user-management/update-roles/{id}', [UserManagementController::class, 'updateRoles'])->name('user-management.update-roles');

// Ruta para la búsqueda de usuarios
Route::get('/user-management/search', [UserManagementController::class, 'search'])->name('user-management.search');


// productos 
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');


// Rutas para el carrito
Route::post('/carrito/agregar/{producto_id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito.mostrar');
Route::post('/carrito/pagar', [CarritoController::class, 'pagar'])->name('carrito.pagar');
Route::post('/carrito/agregar/{producto_id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
Route::get('/historial-compras', [CarritoController::class, 'historialCompras'])->name('historial.compras');

Route::get('/categorias', function () {
    return view('welcomecomponentes.categorias');
});

Route::get('/ofertas', function () {
    return view('welcomecomponentes.ofertas');
});

Route::get('/historial', function () {
    return view('welcomecomponentes.historial');
});

Route::get('/vender', function () {
    return view('welcomecomponentes.vender');

Route::post('/register', [RegisterController::class, 'register'])->name('register');
});
