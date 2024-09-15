<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

        User::factory(1)->create();
       // Primero se crean los roles
       $this->call(RoleSeeder::class);
        
       // Luego se crean los usuarios
       $this->call(UserSeeder::class);


    }
}
