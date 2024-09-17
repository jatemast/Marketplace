<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Jv',
            'email' => 'admin2@gmail.com',
             'password' => bcrypt('123456789'),  
       
        ])->assignRole('admin');

        User::create([
            'name' => 'Admin Cl',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('123456789'), 
        ])->assignRole('admin');
       

        User::create([
            'name' => 'Admin Jc',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),  
            
        ])->assignRole('admin');;
    
        //
    }
}
