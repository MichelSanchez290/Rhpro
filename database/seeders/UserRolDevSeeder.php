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


        //CONTEMPLA MODULO 360
        //Permission 
        Permission::create(['name' => 'Administrador General'])->syncRoles([$role1]);
        Permission::create(['name' => 'Administrador Principal'])->syncRoles([$role2]);
        Permission::create(['name' => 'Administrador Secundario'])->syncRoles([$role3]);
        Permission::create(['name' => 'Usuario Principal'])->syncRoles([$role6, $role10]);

        Permission::create(['name' => 'Relaciones Laborales Mostrar'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Relaciones Laborales Agregar'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Relaciones Laborales Editar'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Relaciones Laborales Eliminar'])->syncRoles([$role1, $role2, $role3, $role10]);


        Permission::create(['name' => 'Mostrar Preguntas'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Agregar Preguntas'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Editar Preguntas'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Eliminar Preguntas'])->syncRoles([$role1, $role2, $role3, $role10]);


        // Permission::create(['name' => 'Mostrar Empresa'])->syncRoles([$role1, $role2, $role3, $role10]);

          //----------------------------------------------------------------------------------------------------------\\

        Permission::create(['name' => 'Mostrar Encuesta ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Agregar Encuesta ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Encuesta ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Encuesta ADMIN'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Encuesta ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Agregar Encuesta ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Editar Encuesta ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Eliminar Encuesta ADMIN EMPRESA'])->syncRoles([$role2]);

        Permission::create(['name' => 'Mostrar Encuesta ADMIN SUCURSAL'])->syncRoles([$role3]);

        Permission::create(['name' => 'Mostrar Preguntas ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Agregar Preguntas ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Preguntas ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Preguntas ADMIN'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Preguntas ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Agregar Preguntas ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Editar Preguntas ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Eliminar Preguntas ADMIN EMPRESA'])->syncRoles([$role2]);

        Permission::create(['name' => 'Mostrar Preguntas ADMIN SUCURSAL'])->syncRoles([$role3]);

        Permission::create(['name' => 'Mostrar Encpre ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Agregar Encpre ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Encpre ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Encpre ADMIN'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Encpre ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Agregar Encpre ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Editar Encpre ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Eliminar Encpre ADMIN EMPRESA'])->syncRoles([$role2]);

        Permission::create(['name' => 'Mostrar Encpre ADMIN SUCURSAL'])->syncRoles([$role3]);

        
        Permission::create(['name' => 'Mostrar Asignaciones ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Agregar Asignaciones ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Asignaciones ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Asignaciones ADMIN'])->syncRoles([$role1]);

        
        Permission::create(['name' => 'Mostrar Asignaciones ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Agregar Asignaciones ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Editar Asignaciones ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Eliminar Asignaciones ADMIN EMPRESA'])->syncRoles([$role2]);

        Permission::create(['name' => 'Mostrar Asignaciones ADMIN SUCURSAL'])->syncRoles([$role3]);

        Permission::create(['name' => 'Mostrar Empresa ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Mostrar Empresa ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Mostrar Empresa  ADMIN SUCURSAL'])->syncRoles([$role3]);

        //----------------------------------------------------------------------------------------------------------\\

        Permission::create(['name' => 'Mostrar Asignaciones'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Agregar Asignaciones'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Editar Asignaciones'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Eliminar Asignaciones'])->syncRoles([$role1, $role2, $role3, $role10]);


        Permission::create(['name' => 'Mostrar Encpre'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Agregar Encpre'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Editar Encpre'])->syncRoles([$role1, $role2, $role3, $role10]);
        Permission::create(['name' => 'Eliminar Encpre'])->syncRoles([$role1, $role2, $role3, $role10]);
        //FIN 360 
    }
}
