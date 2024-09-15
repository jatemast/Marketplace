<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>
<body>
    <h1>Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" name="precio" id="precio" step="0.01" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" id="stock" required><br><br>

        <label for="categoria_id">Categoría:</label><br>
        <select name="categoria_id" id="categoria_id" required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Crear Producto</button>
    </form>

    <a href="{{ route('productos.index') }}">Volver a la lista</a>
</body>
</html>
