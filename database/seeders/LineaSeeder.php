<?php

namespace Database\Seeders;

use App\Models\AreaInvestigacion;
use App\Models\Linea;
use App\Models\SubLinea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = new AreaInvestigacion();
        $area->name = "CIENCIAS SOCIALES";
        $area->save();

        $area = new AreaInvestigacion();
        $area->name = "CIENCIAS NATURALES";
        $area->save();

        $area = new AreaInvestigacion();
        $area->name = "CIENCIAS AGRÍCOLAS";
        $area->save();

        $area = new AreaInvestigacion();
        $area->name = "CIENCIAS MÉDICAS Y DE LA SALUD";
        $area->save();

        $area = new AreaInvestigacion();
        $area->name = "INGENIERÍA Y TECNOLOGÍA";
        $area->save();

        $area = new AreaInvestigacion();
        $area->name = "HUMANIDADES";
        $area->save();

        
        $linea = new Linea();
        $linea->name = "Ciencias de la Educación";
        $linea->id_area = 1;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ciencias de la tierra y ciencias ambientales";
        $linea->id_area = 2;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Agricultura, silvicultura, pesquería";
        $linea->id_area = 3;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Medicina básica";
        $linea->id_area = 4;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ciencias de la salud";
        $linea->id_area = 4;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Medicina clínica";
        $linea->id_area = 4;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Psicología";
        $linea->id_area = 1;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Economía y Negocios";
        $linea->id_area = 1;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ingenieria ambiental";
        $linea->id_area = 5;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ingeniería agroindustrial";
        $linea->id_area = 3;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ciencia animal, ciencia de productos lácteos";
        $linea->id_area = 3;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Biotecnología";
        $linea->id_area = 5;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Geografía social, geografía económica";
        $linea->id_area = 1;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ciencias veterinarias";
        $linea->id_area = 3;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ingeniería civil";
        $linea->id_area = 5;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ciencias políticas";
        $linea->id_area = 1;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Arquitectura";
        $linea->id_area = 6;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Derecho";
        $linea->id_area = 1;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Comunicación, medios de comunicació";
        $linea->id_area = 1;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Historia, arqueología";
        $linea->id_area = 6;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ingeniería industrial";
        $linea->id_area = 5;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Ingeniería de sistemas";
        $linea->id_area = 5;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Tecnologías y biotecnologías medicas";
        $linea->id_area = 4;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Biología";
        $linea->id_area = 2;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Tecnología Ingeniería química";
        $linea->id_area = 5;
        $linea->save();

        $linea = new Linea();
        $linea->name = "Sociología";
        $linea->id_area = 1;
        $linea->save();

        //datos de las sublineas

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión curricular";
        $sublinea->id_area =1;
        $sublinea->id_linea = 1;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Formación docente";
        $sublinea->id_area =1;
        $sublinea->id_linea = 1;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión administrativa y pedagógica ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 1;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Políticas educativas ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 1;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión de contenidos disciplinares ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 1;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Educación, cultura, valores y comunidad";
        $sublinea->id_area =1;
        $sublinea->id_linea = 1;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Desarrollo infantil temprano ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 1;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Oportunidades y resultados educativos de igual calidad";
        $sublinea->id_area =1;
        $sublinea->id_linea = 1;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Epistemología educativa";
        $sublinea->id_area =1;
        $sublinea->id_linea = 1;
        $sublinea->save();

        //
        /*
Gestión ambiental y desarrollo sostenible
Investigación climática y meteorológica
Ciencias del medio ambiente 
Impacto ambiental de las actividades económicas
Recursos naturales renovables y no renovables
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Gestión ambiental y desarrollo sostenible";
        $sublinea->id_area =2;
        $sublinea->id_linea = 2;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Investigación climática y meteorológica";
        $sublinea->id_area =2;
        $sublinea->id_linea = 2;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ciencias del medio ambiente";
        $sublinea->id_area =2;
        $sublinea->id_linea = 2;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Impacto ambiental de las actividades económicas";
        $sublinea->id_area =2;
        $sublinea->id_linea = 2;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Recursos naturales renovables y no renovables";
        $sublinea->id_area =2;
        $sublinea->id_linea = 2;
        $sublinea->save();

        //
        /*
Sistemas agrosilvopastoriles
Producción y manejo agronómico
Colección y conservación de germoplasma
Sistemas hidropónicos y acuapónicos
Manejo de plagas y enfermedades
Manejo Post cosecha
Ciencias del suelo
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Sistemas agrosilvopastoriles";
        $sublinea->id_area =3;
        $sublinea->id_linea = 3;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Producción y manejo agronómico";
        $sublinea->id_area =3;
        $sublinea->id_linea = 3;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Colección y conservación de germoplasma";
        $sublinea->id_area =3;
        $sublinea->id_linea = 3;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Sistemas hidropónicos y acuapónicos";
        $sublinea->id_area =3;
        $sublinea->id_linea = 3;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Manejo de plagas y enfermedades";
        $sublinea->id_area =3;
        $sublinea->id_linea = 3;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Manejo Post cosecha";
        $sublinea->id_area =3;
        $sublinea->id_linea = 3;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ciencias del suelo";
        $sublinea->id_area =3;
        $sublinea->id_linea = 3;
        $sublinea->save();

        //
        /*

         */
        $sublinea = new SubLinea();
        $sublinea->name = "Patología";
        $sublinea->id_area =4;
        $sublinea->id_linea = 4;
        $sublinea->save();

        //
        /*
Ciencias del cuidado de la salud y servicios(administración de hospitales y fianciamiento 
Gestión y administración de los servicios de salud 
Políticas de salud, Servicios de salud
Salud pública 
Gestión Sanitaria 
Epidemiología
Ciencias socio biomédicas (planificación familiar, salud sexual, efectos políticos y sociales de la investigación biomédica)
Salud sexual y reproductiva
Ciencias del deporte y la aptitud física
Ética
Estudio de los daños a la salud regional y nacional
Mejoramiento de los sistemas de salud y la educación médica
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Ciencias del cuidado de la salud y servicios(administración de hospitales y fianciamiento";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión y administración de los servicios de salud";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Políticas de salud, Servicios de salud";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Salud pública";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión Sanitaria";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Epidemiología";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ciencias socio biomédicas (planificación familiar, salud sexual, efectos políticos y sociales de la investigación biomédica)";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Salud sexual y reproductiva";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ciencias del deporte y la aptitud física";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ética";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Estudio de los daños a la salud regional y nacional";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Mejoramiento de los sistemas de salud y la educación médica";
        $sublinea->id_area =4;
        $sublinea->id_linea = 5;
        $sublinea->save();

        //
        /*
Obstetricia y ginecología
Odontología especializada
        */

        $sublinea = new SubLinea();
        $sublinea->name = "Obstetricia y ginecología";
        $sublinea->id_area =4;
        $sublinea->id_linea = 6;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Odontología especializada";
        $sublinea->id_area =4;
        $sublinea->id_linea = 6;
        $sublinea->save();

        //
        /*
Aprendizaje y convivencia democrática 
Desarrollo humano y salud psicológica
Promoción de rol psicológico y gestión del talento humano
Comportamiento de riesgo y violencia 
Familia y poblaciones vulnerables
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Aprendizaje y convivencia democrática";
        $sublinea->id_area =1;
        $sublinea->id_linea = 7;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Desarrollo humano y salud psicológica";
        $sublinea->id_area =1;
        $sublinea->id_linea = 7;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Promoción de rol psicológico y gestión del talento humano";
        $sublinea->id_area =1;
        $sublinea->id_linea = 7;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Comportamiento de riesgo y violencia";
        $sublinea->id_area =1;
        $sublinea->id_linea = 7;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Familia y poblaciones vulnerables";
        $sublinea->id_area =1;
        $sublinea->id_linea = 7;
        $sublinea->save();

        //
        /*
Contabilidad
Auditoría y control interno
Micro y pequeñas empresas
Costos evolutivos
Contabilidad y sus aplicaciones 
Oferta-demanda de bienes y servicios regionales 
Crecimiento y desarrollo económico local y regional 
Potencialidades de exportación e importación de la economía regional 
Gestión empresarial: gerencia estratégica, finanzas, operaciones y marketing
Gestión pública: planteamiento estratégico y administración pública 
Gestión pública y privada del turismo 
Análisis y planificación financiera 
Mercados financieros 
Auditoria contable y financiera y responsabilidad social 
Gestión en nuevas tecnologías y riesgos empresariales
Gestión empresarial y gobierno corporativo 
Planificación operativa 
Organización, legislación y práctica tributaria 
Gestión organizacional
Ciencias económicas y sociales
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Contabilidad";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Auditoría y control interno";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Micro y pequeñas empresas";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Costos evolutivos";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Contabilidad y sus aplicaciones";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Oferta-demanda de bienes y servicios regionales";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Crecimiento y desarrollo económico local y regional";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Potencialidades de exportación e importación de la economía regional";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión empresarial: gerencia estratégica, finanzas, operaciones y marketing";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión pública: planteamiento estratégico y administración pública";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión pública y privada del turismo ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Análisis y planificación financiera";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Mercados financieros";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Auditoria contable y financiera y responsabilidad social";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión en nuevas tecnologías y riesgos empresariales";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión empresarial y gobierno corporativo";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Planificación operativa ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Organización, legislación y práctica tributaria";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión organizacional";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ciencias económicas y sociales";
        $sublinea->id_area =1;
        $sublinea->id_linea = 8;
        $sublinea->save();

        //
        /*
Sensores remotos y agricultura de precisión
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Sensores remotos y agricultura de precisión";
        $sublinea->id_area =5;
        $sublinea->id_linea = 9;
        $sublinea->save();

        //
        /*
Diseño de prototipos, automatización, sensores 
Gestión agroindustrial, desarrollo de mercados, gestión de residuos, innovación 
Ciencia y tecnología agroindustrial de los procesos alimentarios 
Ciencia y tecnología agroindustrial de los procesos no alimentarios
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Diseño de prototipos, automatización, sensores";
        $sublinea->id_area =3;
        $sublinea->id_linea = 10;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión agroindustrial, desarrollo de mercados, gestión de residuos, innovación ";
        $sublinea->id_area =3;
        $sublinea->id_linea = 10;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ciencia y tecnología agroindustrial de los procesos alimentarios";
        $sublinea->id_area =3;
        $sublinea->id_linea = 10;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ciencia y tecnología agroindustrial de los procesos no alimentarios";
        $sublinea->id_area =3;
        $sublinea->id_linea = 10;
        $sublinea->save();

        //
        /*
Sistemas de crianza, nutrición y alimentación animal
Salud pública, control de calidad de los alimentos e inocuidad alimentaria 
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Sistemas de crianza, nutrición y alimentación animal";
        $sublinea->id_area =3;
        $sublinea->id_linea = 11;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Salud pública, control de calidad de los alimentos e inocuidad alimentaria ";
        $sublinea->id_area =3;
        $sublinea->id_linea = 11;
        $sublinea->save();

        //
        /*
Biorremediación y biotecnologías de diagnóstico en la gestión ambiental
Biotecnología industrial y agroindustrial 
Biomateriales, polímeros, bioplásticos, hidrogeles 
Biotecnología agrícola
Fitomejoramiento
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Biorremediación y biotecnologías de diagnóstico en la gestión ambiental";
        $sublinea->id_area =5;
        $sublinea->id_linea = 12;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Biotecnología industrial y agroindustrial";
        $sublinea->id_area =5;
        $sublinea->id_linea = 12;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Biomateriales, polímeros, bioplásticos, hidrogeles";
        $sublinea->id_area =5;
        $sublinea->id_linea = 12;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Biotecnología agrícola";
        $sublinea->id_area =5;
        $sublinea->id_linea = 12;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Fitomejoramiento";
        $sublinea->id_area =5;
        $sublinea->id_linea = 12;
        $sublinea->save();

        //
        /*
Patrimonio cultural y natural
Alimentos, bebidas y gastronomía
Turismo y comunidades 
Interculturalidad
Planificación y ordenamiento del espacio turístico
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Patrimonio cultural y natural";
        $sublinea->id_area =1;
        $sublinea->id_linea = 13;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Alimentos, bebidas y gastronomía";
        $sublinea->id_area =1;
        $sublinea->id_linea = 13;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Turismo y comunidades";
        $sublinea->id_area =1;
        $sublinea->id_linea = 13;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Interculturalidad";
        $sublinea->id_area =1;
        $sublinea->id_linea = 13;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Planificación y ordenamiento del espacio turístico";
        $sublinea->id_area =1;
        $sublinea->id_linea = 13;
        $sublinea->save();

        //
        /*
 Diagnóstico, epidemiologia, tratamiento y control de las enfermedades de los animales 
Fisiología, biotecnología reproductiva y mejoramiento genético 
Medicina veterinaria
Inmunología y sanidad animal        
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Diagnóstico, epidemiologia, tratamiento y control de las enfermedades de los animales";
        $sublinea->id_area = 3;
        $sublinea->id_linea = 14;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Fisiología, biotecnología reproductiva y mejoramiento genético";
        $sublinea->id_area = 3;
        $sublinea->id_linea = 14;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Medicina veterinaria";
        $sublinea->id_area = 3;
        $sublinea->id_linea = 14;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Inmunología y sanidad animal";
        $sublinea->id_area =3;
        $sublinea->id_linea = 14;
        $sublinea->save();

        //
        /*
Ingeniería civil e hidráulica 
Ingeniería y tecnología de la construcción
Ingeniería estructural y municipal 
Ingeniería vial y del transporte
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Ingeniería civil e hidráulica ";
        $sublinea->id_area =5;
        $sublinea->id_linea = 15;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ingeniería y tecnología de la construcción";
        $sublinea->id_area =5;
        $sublinea->id_linea = 15;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ingeniería estructural y municipal";
        $sublinea->id_area =5;
        $sublinea->id_linea = 15;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ingeniería vial y del transporte";
        $sublinea->id_area =5;
        $sublinea->id_linea = 15;
        $sublinea->save();

        //
        /*
Ciencia política y relaciones globales
Gestión y administración pública
Gestión estratégica 
Financiera 
Educación comercial 
Teoría organizacional
Gobernabilidad y democracia      
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Ciencia política y relaciones globales";
        $sublinea->id_area =1;
        $sublinea->id_linea = 16;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión y administración pública";
        $sublinea->id_area =1;
        $sublinea->id_linea = 16;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gestión estratégica ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 16;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Financiera ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 16;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Educación comercial";
        $sublinea->id_area =1;
        $sublinea->id_linea = 16;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Teoría organizacional";
        $sublinea->id_area =1;
        $sublinea->id_linea = 16;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Gobernabilidad y democracia";
        $sublinea->id_area =1;
        $sublinea->id_linea = 16;
        $sublinea->save();

        //
        /*
Diseño arquitectónico 
Arquitectura y urbanismo 
Tecnología de materiales 
Patrimonio arquitectónico       
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Diseño arquitectónico";
        $sublinea->id_area =6;
        $sublinea->id_linea = 17;
        $sublinea->save();
        
        $sublinea = new SubLinea();
        $sublinea->name = "Arquitectura y urbanismo";
        $sublinea->id_area =6;
        $sublinea->id_linea = 17;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Tecnología de materiales";
        $sublinea->id_area =6;
        $sublinea->id_linea = 17;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Patrimonio arquitectónico";
        $sublinea->id_area =6;
        $sublinea->id_linea = 17;
        $sublinea->save();

        //
        /*
Derecho privado 
Derecho público 
Derecho, Estado y sociedad 
Ciencias jurídicas, políticas y sociales 
Derecho y Economía 
Criminología  
Derecho comercial 
Derecho penal 
Protección de los derechos del niño, niña y adolescente 
Factores de riesgo y de protección
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Derecho privado";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Derecho público";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Derecho, Estado y sociedad";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ciencias jurídicas, políticas y sociales ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Derecho y Economía";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Criminología";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Derecho comercial";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Derecho penal";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Protección de los derechos del niño, niña y adolescente";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Factores de riesgo y de protección";
        $sublinea->id_area =1;
        $sublinea->id_linea = 18;
        $sublinea->save();

        //
        /*
Comunicología 
Comunicación para el desarrollo 
Comunicación periodística 
Comunicación corporativa 
Comunicación multimedial 
Ciencias sociales  
Educación ambiental
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Comunicología";
        $sublinea->id_area =1;
        $sublinea->id_linea = 19;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Comunicación para el desarrollo";
        $sublinea->id_area =1;
        $sublinea->id_linea = 19;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Comunicación periodística ";
        $sublinea->id_area =1;
        $sublinea->id_linea = 19;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Comunicación corporativa";
        $sublinea->id_area =1;
        $sublinea->id_linea = 19;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Comunicación multimedial";
        $sublinea->id_area =1;
        $sublinea->id_linea = 19;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ciencias sociales";
        $sublinea->id_area =1;
        $sublinea->id_linea = 19;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Educación ambiental";
        $sublinea->id_area =1;
        $sublinea->id_linea = 19;
        $sublinea->save();

        //
        /*
Historia
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Historia";
        $sublinea->id_area =6;
        $sublinea->id_linea = 20;
        $sublinea->save();

        //
        /*
Ingeniería de operaciones 
Procesos de manufactura 
Sistema integrado de la calidad, seguridad y medio ambiente 
Innovación y Gestión estratégica de organizaciones 
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Ingeniería de operaciones";
        $sublinea->id_area =5;
        $sublinea->id_linea = 21;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Procesos de manufactura";
        $sublinea->id_area =5;
        $sublinea->id_linea = 21;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Sistema integrado de la calidad, seguridad y medio ambiente";
        $sublinea->id_area =5;
        $sublinea->id_linea = 21;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Innovación y Gestión estratégica de organizaciones";
        $sublinea->id_area =5;
        $sublinea->id_linea = 21;
        $sublinea->save();

        //
        /*
Sistemas de automatización y de control de procesos 
Ingeniería de sistemas y comunicaciones 
Telecomunicaciones
Hardware y arquitectura de computadoras
Desarrollo, aplicación y gestión de Tics 
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Sistemas de automatización y de control de procesos";
        $sublinea->id_area =5;
        $sublinea->id_linea = 22;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ingeniería de sistemas y comunicaciones ";
        $sublinea->id_area =5;
        $sublinea->id_linea = 22;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Telecomunicaciones";
        $sublinea->id_area =5;
        $sublinea->id_linea = 22;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Hardware y arquitectura de computadoras";
        $sublinea->id_area =5;
        $sublinea->id_linea = 22;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Desarrollo, aplicación y gestión de Tics";
        $sublinea->id_area =5;
        $sublinea->id_linea = 22;
        $sublinea->save();

        //
        /*
Recursos tecnológicos para el cuidado de la salud 
Biomateriales, bioprocesos y tecnologías relacionadas con la salud 
Investigación en Medicina natural
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Recursos tecnológicos para el cuidado de la salud";
        $sublinea->id_area =4;
        $sublinea->id_linea = 23;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Biomateriales, bioprocesos y tecnologías relacionadas con la salud";
        $sublinea->id_area =4;
        $sublinea->id_linea = 23;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Investigación en Medicina natural";
        $sublinea->id_area =4;
        $sublinea->id_linea = 23;
        $sublinea->save();

        //
        /*
Biología y microbiología 
Ecología
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Biología y microbiología ";
        $sublinea->id_area =2;
        $sublinea->id_linea = 24;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Ecología";
        $sublinea->id_area =2;
        $sublinea->id_linea = 24;
        $sublinea->save();

        //
        /*
Ingeniería de procesos
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Ingeniería de procesos";
        $sublinea->id_area =5;
        $sublinea->id_linea = 25;
        $sublinea->save();

        //
        /*
Gerencia social y responsabilidad social empresarial
Políticas Públicas y gerencia social
Resolución de conflictos sociales y relaciones comunitarias Pobreza, desigualdad y equidad social
        */
        $sublinea = new SubLinea();
        $sublinea->name = "Gerencia social y responsabilidad social empresarial";
        $sublinea->id_area =1;
        $sublinea->id_linea = 26;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Políticas Públicas y gerencia social";
        $sublinea->id_area =1;
        $sublinea->id_linea = 26;
        $sublinea->save();

        $sublinea = new SubLinea();
        $sublinea->name = "Resolución de conflictos sociales y relaciones comunitarias Pobreza, desigualdad y equidad social";
        $sublinea->id_area =1;
        $sublinea->id_linea = 26;
        $sublinea->save();
    }
}
