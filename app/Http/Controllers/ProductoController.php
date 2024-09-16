<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;



class ProductoController extends Controller
{
    public function index(Request $request) 
    {
        $categorias = Categoria::all();
        $categoria_id = $request->input('categoria_id');
        $search_name = $request->input('search_name');

        // Construye la consulta
        $query = Producto::query()->with('categoria');

        // Aplica filtros si se proporcionan
        if ($categoria_id) {
            $query->where('categoria_id', $categoria_id);
        }

        if ($search_name) {
            $query->where('nombre', 'like', '%' . $search_name . '%');
        }

        $productos = $query->get();

        return view('productos.index', compact('productos', 'categorias', 'categoria_id', 'search_name'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create(array_merge($validatedData, ['imagen' => $imagenPath]));

        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagenPath = $producto->imagen;
        if ($request->hasFile('imagen')) {
            // Elimina la imagen antigua si existe
            if ($imagenPath && Storage::exists('public/' . $imagenPath)) {
                Storage::delete('public/' . $imagenPath);
            }
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update(array_merge($validatedData, ['imagen' => $imagenPath]));

        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->imagen && Storage::exists('public/' . $producto->imagen)) {
            Storage::delete('public/' . $producto->imagen);
        }
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
