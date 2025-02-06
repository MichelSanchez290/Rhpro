<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PortalRH\Departament;

class DepartamentosTableSeeder extends Seeder
{
    public function run()
    {
        $departamentos = [
            ['nombre_departamento' => 'Recursos Humanos', 'user_id' => 1],
            ['nombre_departamento' => 'Tecnología', 'user_id' => 1],
            ['nombre_departamento' => 'Ventas', 'user_id' => 1],
            ['nombre_departamento' => 'Marketing', 'user_id' => 1],
            ['nombre_departamento' => 'Finanzas', 'user_id' => 1],
            ['nombre_departamento' => 'Operaciones', 'user_id' => 1],
        ];

        foreach ($departamentos as $departamento) {
            Departament::create($departamento);
        }
    }
}
