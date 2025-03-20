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
        $role3 = Role::create(['name' => 'SucursalAdmin']);

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

        

        //Permission 
        /*
        Permission::create(['name' => 'Administrador General'])->syncRoles([$role1]);
        Permission::create(['name' => 'Administrador Principal'])->syncRoles([$role2]);
        Permission::create(['name' => 'Administrador Secundario'])->syncRoles([$role3]);
        Permission::create(['name' => 'Usuario Principal'])->syncRoles([$role8, $role10]);
        */


        // ************** MODULO RH ***************************************
        // Permission - 
        // role1, role2, role3, role8, role10

        Permission::create(['name' => 'Mostrar Rol'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Ver Permisos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Agregar Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Rol'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Usuario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Agregar Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Usuario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Reg Patronal'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Agregar Reg Patronal'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Reg Patronal'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Reg Patronal'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'Mostrar Empresas'])->syncRoles([$role1, $role8, $role10]);
        Permission::create(['name' => 'Agregar Empresa'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Empresa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Empresa'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Sucursales'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);
        Permission::create(['name' => 'Agregar Sucursal'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Sucursal'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Sucursal'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'Mostrar Departamentos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Departamento'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Departamento'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Departamento'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Mostrar Puestos'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);
        Permission::create(['name' => 'Agregar Puesto'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Puesto'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Puesto'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Mostrar Trabajadores'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Mostrar Card Trabajador'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Trabajador'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Trabajador'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Trabajador'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Mostrar Instructores'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Mostrar Card Instructor'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Instructor'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Instructor'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Instructor'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Mostrar Becarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Mostrar Card Becario'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Becario'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Becario'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Becario'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Mostrar Practicantes'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Mostrar Card Practicante'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Practicante'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Practicante'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Practicante'])->syncRoles([$role1, $role2, $role3]);

        //Relaciones
        /*
        Permission::create(['name' => 'Mostrar Relaciones'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Mostrar asignación Sucursal a Empresa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Agregar asignación Sucursal a Empresa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar asignación Sucursal a Empresa'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar asignación Sucursal a Empresa'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'Mostrar asignación Departamento a Sucursal'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar asignación Departamento a Sucursal'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar asignación Departamento a Sucursal'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar asignación Departamento a Sucursal'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Mostrar asignación Puesto a Departamento'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar asignación Puesto a Departamento'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar asignación Puesto a Departamento'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar asignación Puesto a Departamento'])->syncRoles([$role1, $role2, $role3]);
        */

        //solicitar retardos, incidencias (permisos, vacaciones), cambio salario, incapacidad
        // $role1, $role2, $role3, $role8, $role10

        // Aceptar o cancelar  retardos, incidencias (permisos, vacaciones),  cambio salario, incapacidad
        // $role1, $role2, $role3,

        // ver retardos, incidencias (permisos, vacaciones),  cambio salario, incapacidad
        // $role1, $role2, $role3, $role8, $role10 Ver Cumpleaños

        Permission::create(['name' => 'Mostrar Incidencias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Incidencia'])->syncRoles([$role1, $role2, $role3]);     
        Permission::create(['name' => 'Editar Incidencia'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Incidencia'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Ver Incidencias'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);   
        
        
        Permission::create(['name' => 'Mostrar Incapacidad'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);
        Permission::create(['name' => 'Agregar Incapacidad'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);
        Permission::create(['name' => 'Aceptar Incapacidad'])->syncRoles([$role1, $role2, $role3]);        
        Permission::create(['name' => 'Editar Incapacidad'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Incapacidad'])->syncRoles([$role1, $role2, $role3]);   

        Permission::create(['name' => 'Mostrar Baja'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Baja'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Baja'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Baja'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Ver Cumpleaños'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Mostrar Retardos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Retardo'])->syncRoles([$role1, $role2, $role3]);     
        Permission::create(['name' => 'Editar Retardo'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Retardo'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Ver Retardos'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);

        Permission::create(['name' => 'Mostrar Cambio Salario'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Cambio Salario'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Cambio Salario'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Cambio Salario'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Mostrar Documento'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);
        Permission::create(['name' => 'Agregar Documento'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);
        Permission::create(['name' => 'Editar Documento'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Documento'])->syncRoles([$role1, $role2, $role3]);

    }
}
