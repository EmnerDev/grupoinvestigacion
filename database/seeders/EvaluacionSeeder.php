<?php

namespace Database\Seeders;

use App\Models\Criterio;
use App\Models\Indicador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criterio = new Criterio();
        $criterio->name = "Artículos científicos en revistas indizadas en base de datos que cumplan con un proceso de revisión de pares externos y otros estándares internacionales (Por cada artículo publicado)";
        $criterio->ptj_min_criterio = 1;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Libros en su especialidad indizados en base de datos bibliográficas o que cumplan con un proceso de revisión de pares externos y otros estándares (Por cada libro publicado)";
        $criterio->ptj_max_criterio = 10;
        $criterio->ptj_min_criterio = 0;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Capítulos de libros en su especialidad indizados en base de datos bibliográficas o que cumplan con un proceso de revisión de pares externos y otros estándares (Por cada capítulo de libro publicado)";
        $criterio->ptj_max_criterio = 10;
        $criterio->ptj_min_criterio = 0;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Registro de propiedad intelectual/industrial, concedidas y registradas en INDECOPI, SCOPUS u otras fuentes internacionales equivalentes (Por cada patente, certificado o solicitud)";
        $criterio->ptj_min_criterio = 0;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Asesoría de tesis: Haber asesorado trabajos de investigacion, tesis de pregrado y/o posgrado registrado en SUNEDU o MINEDU. (Por cada trabajo de investigacion o tesis sustentada)";
        $criterio->ptj_max_criterio = 10;
        $criterio->ptj_min_criterio = 0.5;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Dedicación a la investigacion, como responsable o Co-investigador de un proyecto de investigacion, siendo la UNHEVAL la entidad ejecutora (Por cada proyecto de investigacion)";
        $criterio->ptj_max_criterio = 10;
        $criterio->ptj_min_criterio = 1;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Investigador RENACYT (Por cada Investigador Titular)";
        $criterio->ptj_max_criterio = 10;
        $criterio->ptj_min_criterio = 0;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Investigador colaborador (Por cada investigador colaborador)";
        $criterio->ptj_max_criterio = 10;
        $criterio->ptj_min_criterio = 0;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Eventos académicos (Por cada evento)";
        $criterio->ptj_max_criterio = 10;
        $criterio->ptj_min_criterio = 0;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Premios recibidos (Por cada investigador titular)";
        $criterio->ptj_max_criterio = 10;
        $criterio->ptj_min_criterio = 0;
        $criterio->save();

        $criterio = new Criterio();
        $criterio->name = "Participación del investigador titular como evaluador (Por cada Investigador titular)";
        $criterio->ptj_max_criterio = 10;
        $criterio->ptj_min_criterio = 0;
        $criterio->save();


        //criterio1
        $indicador = new Indicador();
        $indicador->name = "Artículos científicos indizados en Scopus/ WoS (Cuartil Q1 de Scimago o JCR)";
        $indicador->ptj_por_indicador = 5;
        $indicador->id_criterio = 1;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Artículos científicos indizados en Scopus/ WoS (Cuartil Q2 de Scimago o JCR)";
        $indicador->ptj_por_indicador = 4;
        $indicador->id_criterio = 1;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Artículos científicos indizados en Scopus/ WoS (Cuartil Q3 de Scimago o JCR)";
        $indicador->ptj_por_indicador = 3;
        $indicador->id_criterio = 1;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Artículos científicos indizados en Scopus/ WoS (Cuartil Q4 de Scimago o JCR)";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 1;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Conference proceeding (Scopus o WoS) y artículos científicos indizados en SciELO y otros similares*";
        $indicador->ptj_por_indicador = 1;
        $indicador->ptj_max_indicador = 10;
        $indicador->id_criterio = 1;
        $indicador->save();

        //criterio 2

        $indicador = new Indicador();
        $indicador->name = " Libro editado por una editorial internacional que cumpla con un proceso de revisión de pares externos.";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 2;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Libro editado por una institución peruana que cuente con la revisión por pares y la normalización básica.";
        $indicador->ptj_por_indicador = 1.5;
        $indicador->id_criterio = 2;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Libro que cumpla con una normalización básica (Número ISBN, Número de registro de Depósito Legal, Tabla de contenido, Referencias bibliográficas).";
        $indicador->ptj_por_indicador = 1;
        $indicador->id_criterio = 2;
        $indicador->save();

        //criterio 3
        $indicador = new Indicador();
        $indicador->name = "Capitulo de libro editado por una editorial internacional que cumpla con un proceso de revisión de pares externos.";
        $indicador->ptj_por_indicador = 1.5;
        $indicador->id_criterio = 3;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Capitulo de libro editado por una institución peruana que cuente con la revisión por pares y la normalización básica.";
        $indicador->ptj_por_indicador = 1;
        $indicador->id_criterio = 3;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Capitulo de libro que cumpla con una normalización básica (Número ISBN, Número de registro de Depósito Legal, Tabla de contenido, Referencias bibliográficas).";
        $indicador->ptj_por_indicador = 0.5;
        $indicador->id_criterio = 3;
        $indicador->save();

        //criterio 4
        $indicador = new Indicador();
        $indicador->name = "Patente de Invención";
        $indicador->ptj_por_indicador = 3;
        $indicador->id_criterio = 4;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Certificado de Obtentor";
        $indicador->ptj_por_indicador = 3;
        $indicador->id_criterio = 4;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Patente de Modelo de utilidad";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 4;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Certificado de derecho de autor por software.";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 4;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Solicitud de patente/diseño industrial";
        $indicador->ptj_por_indicador = 1;
        $indicador->id_criterio = 4;
        $indicador->save();

        //criterio 5
        $indicador = new Indicador();
        $indicador->name = " Asesoría y sustentación de tesis de Posgrado Doctorado";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 5;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Asesoría y sustentación de tesis de Posgrado Maestría";
        $indicador->ptj_por_indicador = 1.5;
        $indicador->id_criterio = 5;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Asesoría y sustentación de tesis para Título Profesional o Segunda Especialidad";
        $indicador->ptj_por_indicador = 1;
        $indicador->id_criterio = 5;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Asesoría y sustentación de trabajo de investigacion para Bachillerato*";
        $indicador->ptj_por_indicador = 0.5;
        $indicador->id_criterio = 5;
        $indicador->save();

        //criterio 6
        $indicador = new Indicador();
        $indicador->name = " Condición de responsable de un proyecto de investigacion con fondo externo internacional";
        $indicador->ptj_por_indicador = 4;
        $indicador->id_criterio = 6;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Condición de miembro de un proyecto de investigacion con fondo externo internacional";
        $indicador->ptj_por_indicador = 3;
        $indicador->id_criterio = 6;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Condición de responsable de un proyecto de investigacion con fondo externo nacional.";
        $indicador->ptj_por_indicador = 3;
        $indicador->id_criterio = 6;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Condición de miembro de un proyecto de investigacion con fondo externo nacional.";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 6;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Condición de responsable de un proyecto de investigacion con fondo interno UNHEVAL";
        $indicador->ptj_por_indicador = 1;
        $indicador->id_criterio = 6;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "  Condición de miembro de un proyecto de investigacion con fondo interno UNHEVAL*";
        $indicador->ptj_por_indicador = 0.5;
        $indicador->id_criterio = 6;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Condición de responsable de un proyecto autofinanciado en la UNHEVAL";
        $indicador->ptj_por_indicador = 0.25;
        $indicador->id_criterio = 6;
        $indicador->save();

        //criterio 7
        $indicador = new Indicador();
        $indicador->name = " Docente investigador de la UNHEVAL";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 7;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Investigador calificado como RENACYT";
        $indicador->ptj_por_indicador = 1;
        $indicador->id_criterio = 7;
        $indicador->save();

        //criterio 8
        $indicador = new Indicador();
        $indicador->name = " Colaborador externo de una institución de prestigio Internacional";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 8;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "  Colaborador externo de una institución de prestigio Nacional";
        $indicador->ptj_por_indicador = 1;
        $indicador->id_criterio = 8;
        $indicador->save();

        //criterio 9
        $indicador = new Indicador();
        $indicador->name = " Conferencias en evento académico internacional ";
        $indicador->ptj_por_indicador = 3;
        $indicador->id_criterio = 9;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Conferencias en evento académico nacional";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 9;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Eventos académicos internacionales organizados por el grupo";
        $indicador->ptj_por_indicador = 3;
        $indicador->id_criterio = 9;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "  Eventos académicos nacionales organizados por el grupo ";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 9;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Eventos académicos organizados por el grupo dentro de la UNHEVAL";
        $indicador->ptj_por_indicador = 1;
        $indicador->id_criterio = 9;
        $indicador->save();

        //criterio 10
        $indicador = new Indicador();
        $indicador->name = "Premio de reconocimiento a la investigación otorgado por una entidad pública o privada internacional";
        $indicador->ptj_por_indicador = 3;
        $indicador->id_criterio = 10;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Premio de reconocimiento a la investigación otorgado por una entidad pública o privada nacional";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 10;
        $indicador->save();

        //criterio 11
        $indicador = new Indicador();
        $indicador->name = "Evaluador en concursos internacionales de investigación";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 11;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Evaluador en concursos nacionales de investigación";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 11;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Miembro del comité científico – académico en congresos internacionales";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 11;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = " Arbitro/evaluador de revistas indizadas";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 11;
        $indicador->save();

        $indicador = new Indicador();
        $indicador->name = "Jurado invitado en sustentaciones de grado académico";
        $indicador->ptj_por_indicador = 2;
        $indicador->id_criterio = 11;
        $indicador->save();

    }
}
