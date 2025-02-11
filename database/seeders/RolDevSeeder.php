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


        // Permisos para activos
        Permission::create(['name'=>'Activo tecnologia Admin'])->syncRoles([$role1]);
        Permission::create(['name'=>'Activo tecnologia Empresa'])->syncRoles([$role2]);
        Permission::create(['name'=>'Activo tecnologia Sucursal'])->syncRoles([$role3]);
    }
}
