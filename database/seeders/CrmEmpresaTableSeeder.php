<?php

namespace Database\Seeders;

use App\Models\Crm\CrmEmpresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrmEmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $crmEmpresa = CrmEmpresa::create([
            'nombre' => 'Coca Cola',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.cocacola.com.mx',
            'logotipo' => 'logo.png',
        ]);
    }
}