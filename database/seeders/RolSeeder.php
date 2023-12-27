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

        Permission::create(['name' => 'dashboard'])->syncRoles([$role_admin,$role_coord,$role_integ]);

        Permission::create(['name' => 'users.index'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'users.store'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'actualizar.usuario'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'eliminar.usuario'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'profile.edit'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'profile.update'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'profile.destroy'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'personas.index'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'personas.create'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'personas.show'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'personas.store'])->syncRoles([$role_admin,]);
        Permission::create(['name' => 'personas.update'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'personas.destroy'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'grupos.index'])->syncRoles([$role_admin,$role_coord,$role_integ]);
        Permission::create(['name' => 'grupos.create'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'grupos.edit'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'grupos.store'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'grupos.verGrupo'])->syncRoles([$role_admin,$role_coord,$role_integ]);
        Permission::create(['name' => 'grupos.update'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'grupos.destroy'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'integrantes.store'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'integrantes.update'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'integrantes.destroy'])->syncRoles([$role_admin]);

        Permission::create(['name' => 'registrar.pivot'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'actualizar.pivot'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'eliminar.pivot'])->syncRoles([$role_admin]);

        ///evaluacion
        Permission::create(['name' => 'evaluacion.index'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'evaluacion.evaluarintegrante'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'evaluacion.evaluarGrupo'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'evaluacion.store'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'evaluacion.guardarEvaluacion'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'evaluacion.editarEvaluacion'])->syncRoles([$role_admin,]);
        Permission::create(['name' => 'evaluacion.editUpdate'])->syncRoles([$role_admin,]);
        Permission::create(['name' => 'evaluacion.totalUpdate'])->syncRoles([$role_admin]);

        //reportes
        Permission::create(['name' => 'reportes.index'])->syncRoles([$role_admin,$role_coord]);
        Permission::create(['name' => 'reportes.pdfGrupo'])->syncRoles([$role_admin,$role_coord]);
    }
}
