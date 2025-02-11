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

        User::create([
            'name' => 'Karen Ramirez',
            'email' => 'karen@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'1', 
            'sucursal_id'=>'1',
        ])->assignRole('EmpresaAdmin');

        User::create([
            'name' => 'Carlos Torres',
            'email' => 'carlos@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id'=>'1', 
            'sucursal_id'=>'1',
        ])->assignRole('GoldenAdmin');
    }
}
