<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
USE App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     // Puedes agregar categorías aquí
     Categoria::create(['nombre' => 'Electrónica', 'descripcion' => 'Productos electrónicos']);
     Categoria::create(['nombre' => 'Ropa', 'descripcion' => 'Ropa y accesorios']);
     Categoria::create(['nombre' => 'Hogar', 'descripcion' => 'Artículos para el hogar']);
     Categoria::create(['nombre' => 'Deportes', 'descripcion' => 'Equipos y ropa deportiva']);
     Categoria::create(['nombre' => 'Juguetes', 'descripcion' => 'Juguetes y juegos']);
    }
}
