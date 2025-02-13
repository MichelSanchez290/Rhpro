<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role1=Role::create(['name'=>'GoldenAdmin']);
        $role2=Role::create(['name'=>'EmpresaAdmin']);
        $role3=Role::create(['name'=>'SusursalAdmin']);
        $role4=Role::create(['name'=>'Trabajador']);

        Permission::create(['name'=>'Administrador General'])->syncRoles([$role1]);
        Permission::create(['name'=>'Administrador Principal'])->syncRoles([$role2]);
        Permission::create(['name'=>'Administrador Secundario'])->syncRoles([$role3]);
        Permission::create(['name'=>'Usuario Principal'])->syncRoles([$role4]);


        // Permisos para activo tecnologia
        Permission::create(['name'=>'Activo tecnologia Admin'])->syncRoles([$role1]);
        Permission::create(['name'=>'Activo tecnologia Empresa'])->syncRoles([$role2]);
        Permission::create(['name'=>'Activo tecnologia Sucursal'])->syncRoles([$role3]);

        // Permisos para activo mobiliario
        Permission::create(['name'=>'Activo mobiliario Admin'])->syncRoles([$role1]);
        Permission::create(['name'=>'Activo mobiliario Empresa'])->syncRoles([$role2]);
        Permission::create(['name'=>'Activo mobiliario Sucursal'])->syncRoles([$role3]);

        // Permisos para activo oficina
        Permission::create(['name'=>'Activo oficina Admin'])->syncRoles([$role1]);
        Permission::create(['name'=>'Activo oficina Empresa'])->syncRoles([$role2]);
        Permission::create(['name'=>'Activo oficina Sucursal'])->syncRoles([$role3]);

        // Permisos para activo uniforme
        Permission::create(['name'=>'Activo uniforme Admin'])->syncRoles([$role1]);
        Permission::create(['name'=>'Activo uniforme Empresa'])->syncRoles([$role2]);
        Permission::create(['name'=>'Activo uniforme Sucursal'])->syncRoles([$role3]);

        // Permisos para activo papeleria
        Permission::create(['name'=>'Activo papeleria Admin'])->syncRoles([$role1]);
        Permission::create(['name'=>'Activo papeleria Empresa'])->syncRoles([$role2]);
        Permission::create(['name'=>'Activo papeleria Sucursal'])->syncRoles([$role3]);

        // Permisos para activo souvenir
        Permission::create(['name'=>'Activo souvenir Admin'])->syncRoles([$role1]);
        Permission::create(['name'=>'Activo souvenir Empresa'])->syncRoles([$role2]);
        Permission::create(['name'=>'Activo souvenir Sucursal'])->syncRoles([$role3]);

        //Permisos para tipo activo
        Permission::create(['name'=>'Tipo activo'])->syncRoles([$role1]);
    }
}
