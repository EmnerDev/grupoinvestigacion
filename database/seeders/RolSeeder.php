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
        $role1 = Role::create(['name' =>'Administrador']);
        $role2 = Role::create(['name' =>'Coordinador']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);

        Permission::create(['name' => 'profile.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'profile.update'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'profile.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'personas.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar.persona'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver.persona'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'actualizar.persona'])->syncRoles([$role1,]);
        Permission::create(['name' => 'eliminar.persona'])->syncRoles([$role1]);

        Permission::create(['name' => 'grupos.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'grupos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'grupos.editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'registrar.grupo'])->syncRoles([$role1]);
        Permission::create(['name' => 'ver.grupo'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'actualizar.grupo'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar.grupo'])->syncRoles([$role1]);

        Permission::create(['name' => 'grupo.registrar.integrante'])->syncRoles([$role1]);
        Permission::create(['name' => 'grupo.actualizar.integrante'])->syncRoles([$role1]);
        Permission::create(['name' => 'grupo.eliminar.integrante'])->syncRoles([$role1]);

        ///evaluacion
        Permission::create(['name' => 'evaluacion.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'evaluacion.integrante'])->syncRoles([$role1]);
        Permission::create(['name' => 'evaluar.grupo'])->syncRoles([$role1]);
        Permission::create(['name' => 'guardar.evaluacion'])->syncRoles([$role1]);
        Permission::create(['name' => 'guardar.total'])->syncRoles([$role1]);
        Permission::create(['name' => 'evaluacion.editar'])->syncRoles([$role1,]);
        Permission::create(['name' => 'actualizar.evaluacion'])->syncRoles([$role1,]);
        Permission::create(['name' => 'actualizar.total'])->syncRoles([$role1]);

        //reportes
        Permission::create(['name' => 'ver.reporte'])->syncRoles([$role1]);
        Permission::create(['name' => 'grupos.reporte'])->syncRoles([$role1,$role2]);
    }
}
