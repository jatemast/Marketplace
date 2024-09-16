<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\CarritoProducto;
use App\Models\HistorialCompra;
use App\Models\HistorialProducto;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; // Para generar el PDF

class CarritoController extends Controller
{
    // Añadir un producto al carrito
    public function agregar(Request $request, $productoId)
    {
        $user = Auth::user();
        $producto = Producto::findOrFail($productoId);

        // Obtén o crea un carrito para el usuario
        $carrito = $user->carrito()->firstOrCreate();

        // Añade el producto al carrito
        $carrito->productos()->attach($productoId, ['cantidad' => 1]);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function mostrarCarrito()
    {
        // Obtén el carrito del usuario
        $carrito = auth()->user()->carrito()->first();
    
        // Verifica si el carrito existe antes de intentar acceder a productos
        if (!$carrito) {
            return view('carrito.mostrar', ['productos' => collect(), 'total' => 0]);
        }
    
        // Obtén los productos del carrito
        $productos = $carrito->productos;
    
        // Calcula el total de los precios
        $total = $productos->sum(function ($producto) {
            return $producto->precio * $producto->pivot->cantidad;
        });
    
        return view('carrito.mostrar', compact('productos', 'total'));
    }
    
    

    // Pagar y generar el PDF
    public function pagar()
    {
        $user = Auth::user();
        $carrito = Carrito::where('user_id', $user->id)->first();
        $productos = $carrito ? $carrito->productos : [];

        // Generar el historial de compra
        $historialCompra = HistorialCompra::create([
            'user_id' => $user->id,
            'total' => $productos->sum(fn($p) => $p->precio),
            'fecha' => now(),
        ]);

        // Guardar los productos en el historial de compra
        foreach ($productos as $producto) {
            HistorialProducto::create([
                'historial_compra_id' => $historialCompra->id,
                'producto_id' => $producto->id,
                'cantidad' => 1,
                'precio' => $producto->precio,
            ]);
        }

        // Generar el PDF
        $pdf = Pdf::loadView('carrito.pdf', compact('user', 'productos', 'historialCompra'));

        // Vaciar el carrito después de la compra
        $carrito->productos()->detach();

        // Descargar el PDF
        return $pdf->download('compra_' . $historialCompra->id . '.pdf');
    }


    // funcion de pruebas agregar carrito 
    public function agregarAlCarrito(Request $request, $productoId)
    {
        $user = Auth::user();
        $producto = Producto::findOrFail($productoId);

        // Obtén o crea un carrito para el usuario
        $carrito = $user->carrito()->firstOrCreate();

        // Añade el producto al carrito
        $carrito->productos()->attach($productoId, ['cantidad' => 1]);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    // Mostrar historial de compras del usuario
 
// Añadir esta función al CarritoController
public function historialCompras()
{
    $user = Auth::user();

    // Obtener el historial de compras del usuario
    $historialCompras = HistorialCompra::where('user_id', $user->id)->get();

    // Obtener los detalles de cada compra
    foreach ($historialCompras as $historialCompra) {
        $historialCompra->productos = HistorialProducto::where('historial_compra_id', $historialCompra->id)->get();
    }

    return view('carrito.historial', compact('historialCompras'));
}

 
    

}
