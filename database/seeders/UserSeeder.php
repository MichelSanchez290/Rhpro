<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'name'=>'ADMINISTRADOR',
            'email'=> 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'empresa_id' => 1,
            'sucursal_id' => 1,
            'tipo_user' => 'Trabajador'
        ])->assignRole('GoldenAdmin');

        $user=User::create([
            'name'=>'ADMINISTRADOR EMPRESA',
            'email'=>'empresaadmin@gmail.com',
            'password' => Hash::make('123456789$$$'),
            'empresa_id' => 1,
            'sucursal_id' => 1,
            'tipo_user' => 'Trabajador'
        ])->assignRole('EmpresaAdmin');

        $user=User::create([
            'name'=>'ADMINISTRADOR SUCURSAL',
            'email'=>'sucursal@gmail.com',
            'password' => Hash::make('123sucursal$$$'),
            'empresa_id' => 1,
            'sucursal_id' => 1,
            'tipo_user' => 'Trabajador'
        ])->assignRole('SusursalAdmin');

        $user=User::create([
            'name'=>'Trabajador ENCUESTA 360',
            'email'=>'becartio@gmail.com',
            'password' => Hash::make('123encuesta360$$$'),
            'empresa_id' => 1,
            'sucursal_id' => 1,
            'tipo_user' => 'Becario'
        ])->assignRole('Trabajador ENCUESTA 360');

        $user=User::create([
            'name'=>'Trabajador Global',
            'email'=>'practicante@gmail.com',
            'password' => Hash::make('prodiangelo$$$'),
            'empresa_id' => 1,
            'sucursal_id' => 1,
            'tipo_user' => 'Practicante'
        ])->assignRole('Trabajador GLOBAL');
        
        $user=User::create([
            'name'=>'Carmela Vazquez',
            'email'=>'carme@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 1,
            'sucursal_id' => 1,
            'tipo_user' => 'Practicante'
        ])->assignRole('GoldenAdmin','Trabajador ACTIVO FIJO');

        $user=User::create([
            'name'=>'Carlos Jimenez',
            'email'=>'carlos@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 1,
            'sucursal_id' => 1,
            'tipo_user' => 'Practicante'
        ])->assignRole('EmpresaAdmin','Trabajador ACTIVO FIJO');

        $user=User::create([
            'name'=>'Ruben Perez',
            'email'=>'ruben@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 1,
            'sucursal_id' => 1,
            'tipo_user' => 'Practicante'
        ])->assignRole('SusursalAdmin','Trabajador ACTIVO FIJO');

        $user=User::create([
            'name'=>'Karen Rodriguez',
            'email'=>'karen@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 1,
            'sucursal_id' => 1,
            'tipo_user' => 'Practicante'
        ])->assignRole('Trabajador GLOBAL','Trabajador ACTIVO FIJO');

        //Empresa 2
        $user=User::create([
            'name'=>'Mariana Lopez',
            'email'=>'mari@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 2,
            'sucursal_id' => 3,
            'tipo_user' => 'Practicante'
        ])->assignRole('GoldenAdmin','Trabajador ACTIVO FIJO');

        $user=User::create([
            'name'=>'Javier Solis',
            'email'=>'javi@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 2,
            'sucursal_id' => 3,
            'tipo_user' => 'Practicante'
        ])->assignRole('EmpresaAdmin','Trabajador ACTIVO FIJO');

        $user=User::create([
            'name'=>'Ricardo Gonzalez',
            'email'=>'ricar@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 2,
            'sucursal_id' => 3,
            'tipo_user' => 'Practicante'
        ])->assignRole('SusursalAdmin','Trabajador ACTIVO FIJO');

        $user=User::create([
            'name'=>'Paulina Reyes',
            'email'=>'pau@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 2,
            'sucursal_id' => 3,
            'tipo_user' => 'Practicante'
        ])->assignRole('Trabajador GLOBAL','Trabajador ACTIVO FIJO');

        //Empresa 3
        $user=User::create([
            'name'=>'Veronica Flores',
            'email'=>'vero@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 3,
            'sucursal_id' => 5,
            'tipo_user' => 'Practicante'
        ])->assignRole('GoldenAdmin','Trabajador ACTIVO FIJO');

        $user=User::create([
            'name'=>'Ismael Gutierrez',
            'email'=>'isma@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 3,
            'sucursal_id' => 5,
            'tipo_user' => 'Practicante'
        ])->assignRole('EmpresaAdmin','Trabajador ACTIVO FIJO');

        $user=User::create([
            'name'=>'Aldo Gutierrez',
            'email'=>'aldo@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 3,
            'sucursal_id' => 5,
            'tipo_user' => 'Practicante'
        ])->assignRole('SusursalAdmin','Trabajador ACTIVO FIJO');

        $user=User::create([
            'name'=>'Karla Velazco',
            'email'=>'karla@gmail.com',
            'password' => Hash::make('12345678'),
            'empresa_id' => 3,
            'sucursal_id' => 5,
            'tipo_user' => 'Practicante'
        ])->assignRole('Trabajador GLOBAL','Trabajador ACTIVO FIJO');
    }
}
