<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email'=> 'admin@mail.com',
            'password' => bcrypt('admin123'),
        ]);

        
        $tipo = new Tipo();
        $tipo->name = "Docente Nombrado";
        $tipo->save();

        $tipo = new Tipo();
        $tipo->name = "Docente Contratado";
        $tipo->save();

        $tipo = new Tipo();
        $tipo->name = "Estudiante Unheval";
        $tipo->save();

        $tipo = new Tipo();
        $tipo->name = "Externo";
        $tipo->save();

    }
}
