<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Administrative; 
use App\Models\Teacher; //[cite: 1]
use App\Models\Apprentice; //[cite: 1]
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // 1. Administrador
        $userAdmin = User::create([
            'name' => 'Admin Principal',
            'username' => 'Admin',
            'email' => 'admin@sistema.com',
            'password' => Hash::make('Admin2026'),
            'rol' => 'admin',
        ]);
        
        Administrative::create([
            'user_id' => $userAdmin->id,
            'document_type' => 'CC',
            'document_number' => '100200300',
            'names' => 'Admin',
            'last_names' => 'Principal',
            'position' => 'Coordinador',
        ]);

        // 2. Instructor
        $userInstructor = User::create([
            'name' => 'Instructor Prueba',
            'username' => 'Instructor',
            'email' => 'instructor@sistema.com',
            'password' => Hash::make('Admin2026'), 
            'rol' => 'instructor',
        ]);
        
        Teacher::create([ 
            'user_id' => $userInstructor->id,
            'name' => 'Instructor Prueba',
            'email' => 'instructor@sistema.com',
        ]);

        // 3. Aprendiz (Con los campos obligatorios que exige su migración)
        $userAprendiz = User::create([
            'name' => 'Aprendiz Prueba',
            'username' => 'Aprendiz',
            'email' => 'aprendiz@sistema.com',
            'password' => Hash::make('Admin2026'), 
            'rol' => 'aprendiz',
        ]);
        
        Apprentice::create([ 
            'user_id' => $userAprendiz->id,
            'name' => 'Aprendiz Prueba',
            'email' => 'aprendiz@sistema.com',
            'cell_number' => '3001234567',
        ]);
        
        }
}
