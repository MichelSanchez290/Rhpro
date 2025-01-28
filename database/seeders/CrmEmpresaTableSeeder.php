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
            'id' => 1,
            'nombre' => 'Coca Cola',
            'tamano_empresa' => 'Grande',
            'logotipo' => 'logo.png',
            'pagina_web' => 'www.cocacola.com.mx'
        ]);

        $crmEmpresa2 = CrmEmpresa::create([
            'id' => 2,
            'nombre' => 'superpapelerias',
            'tamano_empresa' => 'pequeña',
            'logotipo' => 'logo.png',
            'pagina_web' => 'www.google.com.mx'
        ]);
        $crmEmpresa3 = CrmEmpresa::create([
            'id' => 3,
            'nombre' => 'Cerati',
            'tamano_empresa' => 'Grande',
            'logotipo' => 'logo.png',
            'pagina_web' => 'www.google.com.mx'
        ]);
        $crmEmpresa = CrmEmpresa::create([
            'id' => 4,
            'nombre' => 'Pikachu',
            'tamano_empresa' => 'Mediana',
            'logotipo' => 'logo.png',
            'pagina_web' => 'www.youtube.com'
        ]);
        $crmEmpresa5 = CrmEmpresa::create([
            'id' => 5,
            'nombre' => 'Apple Inc.',
            'tamano_empresa' => 'Grande',
            'logotipo' => 'apple_logo.png',
            'pagina_web' => 'www.apple.com'
        ]);
        
        $crmEmpresa6 = CrmEmpresa::create([
            'id' => 6,
            'nombre' => 'Samsung',
            'tamano_empresa' => 'Grande',
            'logotipo' => 'samsung_logo.png',
            'pagina_web' => 'www.samsung.com'
        ]);
        
        $crmEmpresa7 = CrmEmpresa::create([
            'id' => 7,
            'nombre' => 'El Buen Café',
            'tamano_empresa' => 'Pequeña',
            'logotipo' => 'cafe_logo.png',
            'pagina_web' => 'www.elbuencafe.com'
        ]);
        
        $crmEmpresa8 = CrmEmpresa::create([
            'id' => 8,
            'nombre' => 'Gimnasio FitLife',
            'tamano_empresa' => 'Mediana',
            'logotipo' => 'fitlife_logo.png',
            'pagina_web' => 'www.fitlife.com'
        ]);
        
        $crmEmpresa9 = CrmEmpresa::create([
            'id' => 9,
            'nombre' => 'Tech Solutions',
            'tamano_empresa' => 'Mediana',
            'logotipo' => 'techsolutions_logo.png',
            'pagina_web' => 'www.techsolutions.com'
        ]);
        
        $crmEmpresa10 = CrmEmpresa::create([
            'id' => 10,
            'nombre' => 'Planet Green',
            'tamano_empresa' => 'Grande',
            'logotipo' => 'planetgreen_logo.png',
            'pagina_web' => 'www.planetgreen.com'
        ]);        
    }
}
