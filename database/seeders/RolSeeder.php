<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' =>'Administrador']);
        $role_coord = Role::create(['name' =>'Coordinador']);
        $role_integ = Role::create(['name' =>'Integrante']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role_admin,$role_coord]);

        Permission::create(['name' => 'users.index'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'profile.edit'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'profile.update'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'profile.destroy'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'personas.index'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'registrar.persona'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'ver.persona'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'actualizar.persona'])->syncRoles([$role_admin,]);
        Permission::create(['name' => 'eliminar.persona'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'grupos.index'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'grupos.create'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'grupos.editar'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'registrar.grupo'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'ver.grupo'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'actualizar.grupo'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'eliminar.grupo'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'grupo.registrar.integrante'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'grupo.actualizar.integrante'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'grupo.eliminar.integrante'])->syncRoles([$role_admin]);

        ///evaluacion
        Permission::create(['name' => 'evaluacion.index'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'evaluacion.integrante'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'evaluar.grupo'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'guardar.evaluacion'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'guardar.total'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'evaluacion.editar'])->syncRoles([$role_admin,]);
        Permission::create(['name' => 'actualizar.evaluacion'])->syncRoles([$role_admin,]);
        Permission::create(['name' => 'actualizar.total'])->syncRoles([$role_admin]);

        //reportes
        Permission::create(['name' => 'ver.reporte'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'grupos.reporte'])->syncRoles([$role_admin,$role_coord]);
    }
}
