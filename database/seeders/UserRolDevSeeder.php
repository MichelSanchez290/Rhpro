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

        // Permission::create(['name' => 'Relaciones Laborales Mostrar'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Relaciones Laborales Agregar'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Relaciones Laborales Editar'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Relaciones Laborales Eliminar'])->syncRoles([$role1, $role2, $role3, $role10]);


        // Permission::create(['name' => 'Mostrar Preguntas'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Agregar Preguntas'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Editar Preguntas'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Eliminar Preguntas'])->syncRoles([$role1, $role2, $role3, $role10]);


        // Permission::create(['name' => 'Mostrar Empresa'])->syncRoles([$role1, $role2, $role3, $role10]);

          //----------------------------------------------------------------------------------------------------------\\
          //Encuesta 

        Permission::create(['name' => 'Mostrar Encuesta ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Agregar Encuesta ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Encuesta ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Encuesta ADMIN'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Encuesta ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Agregar Encuesta ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Editar Encuesta ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Eliminar Encuesta ADMIN EMPRESA'])->syncRoles([$role2]);

        Permission::create(['name' => 'Mostrar Encuesta ADMIN SUCURSAL'])->syncRoles([$role3]);
        Permission::create(['name' => 'Agregar Encuesta ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Encuesta ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Encuesta ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);

        //------------------------------------------------------------------------------------------------------\\
        //Preguntas

        Permission::create(['name' => 'Mostrar Preguntas ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Agregar Preguntas ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Preguntas ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Preguntas ADMIN'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Preguntas ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Agregar Preguntas ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Editar Preguntas ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Eliminar Preguntas ADMIN EMPRESA'])->syncRoles([$role2]);

        Permission::create(['name' => 'Mostrar Preguntas ADMIN SUCURSAL'])->syncRoles([$role3]);
        Permission::create(['name' => 'Agregar Preguntas ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Preguntas ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Preguntas ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);

        //-------------------------------------------------------------------------------------------------------\\
        
        //Encpre
        Permission::create(['name' => 'Mostrar Encpre ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Agregar Encpre ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Encpre ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Encpre ADMIN'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Encpre ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Agregar Encpre ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Editar Encpre ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Eliminar Encpre ADMIN EMPRESA'])->syncRoles([$role2]);

        Permission::create(['name' => 'Mostrar Encpre ADMIN SUCURSAL'])->syncRoles([$role3]);
        Permission::create(['name' => 'Agregar Encpre ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Encpre ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Encpre ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);

        //-------------------------------------------------------------------------------------------------------\\
        
        //Asignaciones 
        
        Permission::create(['name' => 'Mostrar Asignaciones ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Agregar Asignaciones ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Asignaciones ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Asignaciones ADMIN'])->syncRoles([$role1]);

        
        Permission::create(['name' => 'Mostrar Asignaciones ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Agregar Asignaciones ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Editar Asignaciones ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Eliminar Asignaciones ADMIN EMPRESA'])->syncRoles([$role2]);

        Permission::create(['name' => 'Mostrar Asignaciones ADMIN SUCURSAL'])->syncRoles([$role3]);
        Permission::create(['name' => 'Agregar Asignaciones ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Asignaciones ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Asignaciones ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);

        //----------------------------------------------------------------------------------------------------------------\\

        //Empresa 

        Permission::create(['name' => 'Mostrar Empresa ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Mostrar Empresa ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Mostrar Empresa  ADMIN SUCURSAL'])->syncRoles([$role3]);

        //----------------------------------------------------------------------------------------------------------\\

        //Relaciones 
        Permission::create(['name' => 'Mostrar Relaciones Laborales ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Agregar Relaciones Laborales ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Relaciones Laborales ADMIN'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Relaciones Laborales ADMIN'])->syncRoles([$role1]);

        Permission::create(['name' => 'Mostrar Relaciones Laborales ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Agregar Relaciones Laborales ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Editar Relaciones Laborales ADMIN EMPRESA'])->syncRoles([$role2]);
        Permission::create(['name' => 'Eliminar Relaciones Laborales ADMIN EMPRESA'])->syncRoles([$role2]);

        Permission::create(['name' => 'Mostrar Relaciones Laborales ADMIN SUCURSAL'])->syncRoles([$role3]);
        Permission::create(['name' => 'Agregar Relaciones Laborales ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Editar Relaciones Laborales ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Relaciones Laborales ADMIN SUCURSAL'])->syncRoles([$role1, $role2]);

        //---------------------------------------------------------------------------------------------------------------\\


        //
        // Permission::create(['name' => 'Mostrar Asignaciones'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Agregar Asignaciones'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Editar Asignaciones'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Eliminar Asignaciones'])->syncRoles([$role1, $role2, $role3, $role10]);


        // Permission::create(['name' => 'Mostrar Encpre'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Agregar Encpre'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Editar Encpre'])->syncRoles([$role1, $role2, $role3, $role10]);
        // Permission::create(['name' => 'Eliminar Encpre'])->syncRoles([$role1, $role2, $role3, $role10]);
        //FIN 360 

        

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

        Permission::create(['name' => 'Mostrar Reg Patronales'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Agregar Reg Patronales'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Reg Patronales'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Eliminar Reg Patronales'])->syncRoles([$role1]);
        
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


        //solicitar retardos, incidencias (permisos, vacaciones), cambio salario, incapacidad
        // $role1, $role2, $role3, $role8, $role10

        // Aceptar o cancelar  retardos, incidencias (permisos, vacaciones),  cambio salario, incapacidad
        // $role1, $role2, $role3,

        // ver retardos, incidencias (permisos, vacaciones),  cambio salario, incapacidad
        // $role1, $role2, $role3, $role8, $role10

        Permission::create(['name' => 'Mostrar Incidencias'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);
        Permission::create(['name' => 'Agregar Incidencia'])->syncRoles([$role1, $role2, $role3, $role8, $role10]);
        Permission::create(['name' => 'Aceptar Incidencia'])->syncRoles([$role1, $role2, $role3]);        
        Permission::create(['name' => 'Editar Incidencia'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Incidencia'])->syncRoles([$role1, $role2, $role3]);        

         // ************** MODULO ACTIVO FIJO ***************************************
        // Permission - 
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
        
        //**********************************FIN ACTIVO FIJO****************************** */




        // ************** MODULO PORTAL DE CAPACITACIÓN ***************************************
        // role1, role2, role3, role9, role10
        //Permisos para Perfil de Puesto
        Permission::create(['name' => 'Mostrar Perfil Puesto'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Perfil Puesto'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Perfil Puesto'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Perfil Puesto'])->syncRoles([$role1, $role2, $role3]);

        //Permisos para funciones especificas
        Permission::create(['name' => 'Mostrar Funciones Especificas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Funciones Especificas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Funciones Especificas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Funciones Especificas'])->syncRoles([$role1, $role2, $role3]);

        //Permisos para relaciones externas
        Permission::create(['name' => 'Mostrar Relaciones Externas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Relaciones Externas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Relaciones Externas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Relaciones Externas'])->syncRoles([$role1, $role2, $role3]);

        //Permisos para relaciones internas
        Permission::create(['name' => 'Mostrar Relaciones Internas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Relaciones Internas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Relaciones Internas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Relaciones Internas'])->syncRoles([$role1, $role2, $role3]);

        //Permisos para responsabilidades universales
        Permission::create(['name' => 'Mostrar Responsabilidades Universales'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Responsabilidades Universales'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Responsabilidades Universales'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Responsabilidades Universales'])->syncRoles([$role1, $role2, $role3]);

        //Permisos para habilidades humanas
        Permission::create(['name' => 'Mostrar Habilidades Humanas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Habilidades Humanas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Habilidades Humanas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Habilidades Humanas'])->syncRoles([$role1, $role2, $role3]);

        //Permisos para habilidades técnicas
        Permission::create(['name' => 'Mostrar Habilidades Tecnicas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Agregar Habilidades Tecnicas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Editar Habilidades Tecnicas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Eliminar Habilidades Tecnicas'])->syncRoles([$role1, $role2, $role3]);

        //Asociar Puesto a Trabajador
        Permission::create(['name' => 'Asociar Puesto Trabajador'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Asignar Puesto Trabajador'])->syncRoles([$role1, $role2, $role3]);

        //Ver usuarios
        Permission::create(['name' => 'Mostrar Usuarios'])->syncRoles([$role1, $role2, $role3, $role9, $role10]);
        Permission::create(['name' => 'Ver Mas Usuarios'])->syncRoles([$role1, $role2, $role3, $role9, $role10]);
        Permission::create(['name' => 'Comparar Perfil Puesto'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Evaluar Trabajador'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'Ver Historial de Evaluaciones'])->syncRoles([$role1, $role2, $role3, $role9, $role10]);

        
        // ************** FIN MODULO PORTAL DE CAPACITACIÓN ***************************************
    }
}
