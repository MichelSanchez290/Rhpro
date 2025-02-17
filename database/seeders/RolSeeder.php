<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ////ROLES
        //ROLES ADMINISTRADORES
        $role1 = Role::create(['name' => 'GoldenAdmin']);
        $role2 = Role::create(['name' => 'EmpresaAdmin']);
        $role3 = Role::create(['name' => 'SusursalAdmin']);
        //Este rol es solo para tener acceso a Modulo crm
        $role4=Role::create(['name'=>'Trabajador CRM']);
        //Este rol es solo para tener acceso a Modulo activo fijo
        $role5=Role::create(['name'=>'Trabajador ACTIVO FIJO']);
        //Este rol es solo para tener acceso a Modulo encuesta 360   
        $role6=Role::create(['name'=>'Trabajador ENCUESTA 360']);
        //Este rol es solo para tener acceso a Modulo nom035
        $role7=Role::create(['name'=>'Trabajador NOM035']);
        //Este rol es solo para tener acceso a portal rh
        $role8=Role::create(['name'=>'Trabajador PORTAL RH']);
        //Este rol es solo para tener acceso a Modulo portal capacitacion
        $role9=Role::create(['name'=>'Trabajador PORTAL CAPACITACION']);
        //Este rol es solo para tener acceso a TODOS LOS MODULOS
        $role10= Role::create(['name' => 'Trabajador GLOBAL']);

        // Modulo para ACTIVO FIJO
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
        //Fin de ACTIVO FIJO

        
    }
}
