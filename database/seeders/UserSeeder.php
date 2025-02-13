<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empresa 1
        User::create([
            'name' => 'Carlos Torres',
            'email' => 'carlos@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'1', 
            'sucursal_id'=>'1',
        ])->assignRole('GoldenAdmin');

        User::create([
            'name' => 'Karen Ramirez',
            'email' => 'karen@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'1', 
            'sucursal_id'=>'1',
        ])->assignRole('EmpresaAdmin');

        User::create([
            'name' => 'Aldo Gutierrez',
            'email' => 'auge@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'1', 
            'sucursal_id'=>'1',
        ])->assignRole('SusursalAdmin');

        User::create([
            'name' => 'Fernando Gomez',
            'email' => 'fer@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'1', 
            'sucursal_id'=>'1',
        ])->assignRole('Trabajador');

        // Empresa 2
        User::create([
            'name' => 'Emilio Martinez',
            'email' => 'emilio@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'2', 
            'sucursal_id'=>'3',
        ])->assignRole('GoldenAdmin');

        User::create([
            'name' => 'Jose Marquez',
            'email' => 'jose@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'2', 
            'sucursal_id'=>'3',
        ])->assignRole('EmpresaAdmin');

        User::create([
            'name' => 'Maria Fernandez',
            'email' => 'maria@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'2', 
            'sucursal_id'=>'3',
        ])->assignRole('SusursalAdmin');

        User::create([
            'name' => 'Pedro Perez',
            'email' => 'pedro@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'2', 
            'sucursal_id'=>'3',
        ])->assignRole('Trabajador');

        // Empresa 3
        User::create([
            'name' => 'Isabella Sandoval',
            'email' => 'isabel@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'3', 
            'sucursal_id'=>'5',
        ])->assignRole('GoldenAdmin');

        User::create([
            'name' => 'Juan Martinez',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'3', 
            'sucursal_id'=>'5',
        ])->assignRole('EmpresaAdmin');

        User::create([
            'name' => 'Luisa Garcia',
            'email' => 'luisa@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'3', 
            'sucursal_id'=>'5',
        ])->assignRole('SusursalAdmin');

        User::create([
            'name' => 'Ana Rodriguez',
            'email' => 'ana@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'3', 
            'sucursal_id'=>'5',
        ])->assignRole('Trabajador');
    }
}
