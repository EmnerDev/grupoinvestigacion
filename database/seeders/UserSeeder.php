<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_admin = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('di@unheval2023'),
        ])->syncRoles(['Administrador']);
        \App\Models\Persona::factory()->create([
            'name' => "Administrador",
            'first_name' => 'Unheval',
            'last_name' => 'Di',
            'dni' => $user_admin->name,
            'email' => $user_admin->email,
            'id_tipo' => 5,
            'user_id' => $user_admin->id,
        ]);
        // if (env('APP_ENV') == 'local') {
        //     $user_coord = \App\Models\User::factory()->create([
        //         'name' => '22345678',
        //         'email' => 'user_coord@example.com',
        //         'password' => bcrypt('coordinador123'),
        //     ])->syncRoles(['Coordinador']);
        //     \App\Models\Persona::factory()->create([
        //         'name' => "Coordinador",
        //         'dni' => $user_coord->name,
        //         'email' => $user_coord->email,
        //         'id_tipo' => 1,
        //         'user_id' => $user_coord->id,
        //     ]);

        //     \App\Models\User::factory(10)->create()->each(function ($user) {
        //         $user->persona()->save(\App\Models\Persona::factory()->make());
        //     });
        // }
    }
}
