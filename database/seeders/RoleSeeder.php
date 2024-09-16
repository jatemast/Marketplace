<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;  // Importar la clase Role


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       // Crear roles
       $role1 = Role::create(['name' => 'admin']);
       $role2 = Role::create(['name' => 'asistente']);
       $role3 = Role::create(['name' => 'cliente']);
       $role4 = Role::create(['name' => 'proveedor']);



    }
    
}
