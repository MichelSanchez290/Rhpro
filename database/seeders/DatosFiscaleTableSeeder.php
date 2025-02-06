<?php

namespace Database\Seeders;

use App\Models\Crm\DatosFiscale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatosFiscaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datofiscal1 = DatosFiscale::create([
            'razonSocial' => 'Empresa Chida S. de RL',
            'rfc' => 'ECH220315XYZ ',
            'calle' => 'Ficticia ',
            'numeroExterior' => '123',
            'numeroInterior' => '',
            'colonia' => 'Inventada',
            'municipio' => 'Alcaldía Azcapotzalco',
            'localidad' => 'San Pedro Xalpa',
            'estado' => 'CDMX',
            'pais' => 'México',
            'codigoPostal' => '02250',
            'crmEmpresas_id' => '1'
        ]);
        $datofiscal2 = DatosFiscale::create([
            'razonSocial' => 'Empresa MAS Chida S. de RL',
            'rfc' => 'EMC230528 ',
            'calle' => 'Avenida México 2000',
            'numeroExterior' => '456',
            'numeroInterior' => '5A',
            'colonia' => 'Las Fuentes',
            'municipio' => 'Guadalajara',
            'localidad' => 'Guadalajara',
            'estado' => 'Jalisco',
            'pais' => 'México',
            'codigoPostal' => '44440',
            'crmEmpresas_id' => '22'
        ]);
        $datofiscal3 = DatosFiscale::create([
            'razonSocial' => 'Taquerías Los Carnales',
            'rfc' => 'TLC250206HDFRNS02 ',
            'calle' => 'Calle 5 de Febrero',
            'numeroExterior' => '45',
            'numeroInterior' => '2',
            'colonia' => 'Anzures',
            'municipio' => 'Puebla',
            'localidad' => 'Puebla',
            'estado' => 'Puebla',
            'pais' => 'México',
            'codigoPostal' => '72530',
            'crmEmpresas_id' => '10'
        ]);
        $datofiscal4 = DatosFiscale::create([
            'razonSocial' => 'Tiendas Don Baraton',
            'rfc' => 'TDB230206A22 ',
            'calle' => 'Avenida Principal 101',
            'numeroExterior' => '200',
            'numeroInterior' => '10',
            'colonia' => 'Centro',
            'municipio' => 'Puebla',
            'localidad' => 'Puebla',
            'estado' => 'Puebla',
            'pais' => 'México',
            'codigoPostal' => '72000',
            'crmEmpresas_id' => '8'
        ]);
        $datofiscal5 = DatosFiscale::create([
            'razonSocial' => 'Patito S.A. de C.V.',
            'rfc' => 'PAT230315X9A ',
            'calle' => 'Reforma ',
            'numeroExterior' => 'S/N',
            'numeroInterior' => '101-A',
            'colonia' => 'La Paz',
            'municipio' => 'Puebla',
            'localidad' => 'Puebla',
            'estado' => 'Puebla',
            'pais' => 'México',
            'codigoPostal' => '72160',
            'crmEmpresas_id' => '1'
        ]);
    }
}