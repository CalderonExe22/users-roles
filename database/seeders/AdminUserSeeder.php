<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el rol 'admin' si no existe
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
        ], [
            'name' => 'admin',
        ]);

        // Crear el usuario admin si no existe
        $adminUser = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Contraseña por defecto
        ]);

        // Asignar el rol 'admin' al usuario
        if (!$adminUser->roles->contains($adminRole->id)) {
            $adminUser->roles()->attach($adminRole->id);
        }
    }
}
