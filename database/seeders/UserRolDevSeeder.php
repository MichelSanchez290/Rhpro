<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ROLES
        $role1=Role::create(['name'=>'Admin']);
        $role2=Role::create(['name'=>'EmpresaAdmin']);
        $role3=Role::create(['name'=>'SusursalAdmin']);

        $role4=Role::create(['name'=>'Trabajador CRM']);
        $role5=Role::create(['name'=>'Trabajador ACTIVO FIJO']);
        $role6=Role::create(['name'=>'Trabajador ENCUESTA 360']);
        $role7=Role::create(['name'=>'Trabajador NOM035']);
        $role8=Role::create(['name'=>'Trabajador PORTAL RH']);
        $role9=Role::create(['name'=>'Trabajador PORTAL CAPACITACION']);
        //CONTEMPLA TODOS LOS MODULOS
        $role10=Role::create(['name'=>'Trabajador GLOBAL']);
        //FIN DE ROLES
    }
}
