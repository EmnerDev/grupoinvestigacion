<?php

namespace Database\Seeders;

use App\Models\AreaInvestigacion;
use App\Models\Escuela;
use App\Models\Facultad;
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
            'dni' => 'admin',
            'name' => 'admin',
            'first_name' => 'admin',
            'last_name' => 'admin',
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

        $facultad = new Facultad();
        $facultad->name = "Facultad de Ciencias Agrarias";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Medicina";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Psicología";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Enfermería";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Obstetricia";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Ciencias Administrativas y Turismo";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Ciencias Contables y Financieras";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Economía";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Ciencias Sociales";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Ciencias de la Educación";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Derecho y Ciencias Políticas";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Ingeniería Civil y Arquitectura";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Ingeniería Industrial y de Sistemas";
        $facultad->save();

        $facultad = new Facultad();
        $facultad->name = "Facultad de Medicina Veterinaria y Zootecnia";
        $facultad->save();

        $escuela = new Escuela();
        $escuela->name = "Ingeniería Agronómica";
        $escuela->id_facultad =1;
        $escuela->save();  

        $escuela = new Escuela();
        $escuela->name = "Ingeniería Agroindustrial";
        $escuela->id_facultad =1;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Medicina Humana";
        $escuela->id_facultad =2;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Odontología";
        $escuela->id_facultad =2;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Obstetricia";
        $escuela->id_facultad =5;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Enfermeria";
        $escuela->id_facultad =4;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Psicología";
        $escuela->id_facultad =3;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Ciencias Contables y Financieras";
        $escuela->id_facultad =7;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Economìa";
        $escuela->id_facultad =8;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Sociología";
        $escuela->id_facultad =9;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Ciencias de la Comunicación";
        $escuela->id_facultad =9;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Educacion Fisica";
        $escuela->id_facultad =10;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Lengua y literatura";
        $escuela->id_facultad =10;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Matematica y Fisica";
        $escuela->id_facultad =10;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Biologia, Quimica y Ciencia del Ambiente";
        $escuela->id_facultad =10;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Educación Secundaria";
        $escuela->id_facultad =10;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Educacion Inicial";
        $escuela->id_facultad =10;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Ciencias Histórico Sociales y Geográficas";
        $escuela->id_facultad =10;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Filosofía, Psicologia y Ciencias Sociales";
        $escuela->id_facultad =10;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Educación Primaria";
        $escuela->id_facultad =10;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Derecho Y Ciencias Políticas";
        $escuela->id_facultad =11;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Ciencias Administrativas";
        $escuela->id_facultad =6;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Turismo y hoteleria";
        $escuela->id_facultad =6;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Arquitectura";
        $escuela->id_facultad =12;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Ingeniería Civil";
        $escuela->id_facultad =12;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Ingeniería Industrial";
        $escuela->id_facultad =13;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Ingeniería de Sistemas";
        $escuela->id_facultad =13;
        $escuela->save();

        $escuela = new Escuela();
        $escuela->name = "Medicina Veterinaria";
        $escuela->id_facultad =14;
        $escuela->save();

    }
}
