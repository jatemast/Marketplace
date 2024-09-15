<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" name="precio" id="precio" step="0.01" value="{{ $producto->precio }}" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" id="stock" value="{{ $producto->stock }}" required><br><br>

        <label for="categoria_id">Categoría:</label><br>
        <select name="categoria_id" id="categoria_id" required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Actualizar Producto</button>
    </form>

    <a href="{{ route('productos.index') }}">Volver a la lista</a>
</body>
</html>
