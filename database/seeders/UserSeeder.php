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
            'name' => 'Javier Teheran Magallanez',
            'email' => 'Programador14@tecnologicocomfenalco.edu.co',
             'password' => bcrypt('123456789'),  
       
        ])->assignRole('admin');

        User::create([
            'name' => 'CARLOS ESCOBAR',
            'email' => 'Programador4@tecnologicocomfenalco.edu.co',
            'password' => bcrypt('12345678'), 
        ])->assignRole('admin');
       

        User::create([
            'name' => 'JCamargo',
            'email' => 'Programador10@tecnologicocomfenalco.edu.co',
            'password' => bcrypt('123456789'),  
            
        ])->assignRole('admin');;
    
        //
    }
}
