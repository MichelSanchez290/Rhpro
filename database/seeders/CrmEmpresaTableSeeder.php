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
            'nombre' => 'Pepsi',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.pepsi.com',
            'logotipo' => 'pepsi_logo.png',
            'clasificacion' => 'A+++'
        ]);

        $crmEmpresa2 = CrmEmpresa::create([
            'nombre' => 'Nestlé',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.nestle.com',
            'logotipo' => 'nestle_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa3 = CrmEmpresa::create([
            'nombre' => 'Amazon',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.amazon.com',
            'logotipo' => 'amazon_logo.png',
            'clasificacion' => 'A+++'
        ]);

        $crmEmpresa4 = CrmEmpresa::create([
            'nombre' => 'Tesla',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.tesla.com',
            'logotipo' => 'tesla_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa5 = CrmEmpresa::create([
            'nombre' => 'Starbucks',
            'tamano_empresa' => 'Mediana',
            'pagina_web' => 'www.starbucks.com',
            'logotipo' => 'starbucks_logo.png',
            'clasificacion' => 'A+'
        ]);

        $crmEmpresa6 = CrmEmpresa::create([
            'nombre' => 'Uber',
            'tamano_empresa' => 'Mediana',
            'pagina_web' => 'www.uber.com',
            'logotipo' => 'uber_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa7 = CrmEmpresa::create([
            'nombre' => 'Spotify',
            'tamano_empresa' => 'Mediana',
            'pagina_web' => 'www.spotify.com',
            'logotipo' => 'spotify_logo.png',
            'clasificacion' => 'A+'
        ]);

        $crmEmpresa8 = CrmEmpresa::create([
            'nombre' => 'Airbnb',
            'tamano_empresa' => 'Pequeña',
            'pagina_web' => 'www.airbnb.com',
            'logotipo' => 'airbnb_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa9 = CrmEmpresa::create([
            'nombre' => 'Netflix',
            'tamano_empresa' => 'Pequeña',
            'pagina_web' => 'www.netflix.com',
            'logotipo' => 'netflix_logo.png',
            'clasificacion' => 'A+'
        ]);

        $crmEmpresa10 = CrmEmpresa::create([
            'nombre' => 'SpaceX',
            'tamano_empresa' => 'Micro',
            'pagina_web' => 'www.spacex.com',
            'logotipo' => 'spacex_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa11 = CrmEmpresa::create([
            'nombre' => 'Microsoft',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.microsoft.com',
            'logotipo' => 'microsoft_logo.png',
            'clasificacion' => 'A+++'
        ]);

        $crmEmpresa12 = CrmEmpresa::create([
            'nombre' => 'Google',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.google.com',
            'logotipo' => 'google_logo.png',
            'clasificacion' => 'A+++'
        ]);

        $crmEmpresa13 = CrmEmpresa::create([
            'nombre' => 'Facebook',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.facebook.com',
            'logotipo' => 'facebook_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa14 = CrmEmpresa::create([
            'nombre' => 'Apple',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.apple.com',
            'logotipo' => 'apple_logo.png',
            'clasificacion' => 'A+++'
        ]);

        $crmEmpresa15 = CrmEmpresa::create([
            'nombre' => 'Samsung',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.samsung.com',
            'logotipo' => 'samsung_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa16 = CrmEmpresa::create([
            'nombre' => 'Intel',
            'tamano_empresa' => 'Mediana',
            'pagina_web' => 'www.intel.com',
            'logotipo' => 'intel_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa17 = CrmEmpresa::create([
            'nombre' => 'AMD',
            'tamano_empresa' => 'Mediana',
            'pagina_web' => 'www.amd.com',
            'logotipo' => 'amd_logo.png',
            'clasificacion' => 'A+'
        ]);

        $crmEmpresa18 = CrmEmpresa::create([
            'nombre' => 'Dell',
            'tamano_empresa' => 'Pequeña',
            'pagina_web' => 'www.dell.com',
            'logotipo' => 'dell_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa19 = CrmEmpresa::create([
            'nombre' => 'HP',
            'tamano_empresa' => 'Pequeña',
            'pagina_web' => 'www.hp.com',
            'logotipo' => 'hp_logo.png',
            'clasificacion' => 'A+'
        ]);

        $crmEmpresa20 = CrmEmpresa::create([
            'nombre' => 'Cisco',
            'tamano_empresa' => 'Micro',
            'pagina_web' => 'www.cisco.com',
            'logotipo' => 'cisco_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa21 = CrmEmpresa::create([
            'nombre' => 'Oracle',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.oracle.com',
            'logotipo' => 'oracle_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa22 = CrmEmpresa::create([
            'nombre' => 'IBM',
            'tamano_empresa' => 'Grande',
            'pagina_web' => 'www.ibm.com',
            'logotipo' => 'ibm_logo.png',
            'clasificacion' => 'A++'
        ]);

        $crmEmpresa23 = CrmEmpresa::create([
            'nombre' => 'Adobe',
            'tamano_empresa' => 'Mediana',
            'pagina_web' => 'www.adobe.com',
            'logotipo' => 'adobe_logo.png',
            'clasificacion' => 'A+'
        ]);

        $crmEmpresa24 = CrmEmpresa::create([
            'nombre' => 'NVIDIA',
            'tamano_empresa' => 'Mediana',
            'pagina_web' => 'www.nvidia.com',
            'logotipo' => 'nvidia_logo.png',
            'clasificacion' => 'A++'
        ]);
    }
}
