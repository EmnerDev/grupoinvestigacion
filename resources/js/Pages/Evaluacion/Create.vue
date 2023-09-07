<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Evaluacion para la Categorización del Grupo de Investigación
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="submit">
                    <div class="overflow-x-auto rounded-lg shadow mt-6">
                        <div>
                            <table class="w-full table-auto">
                                    <thead>
                                        <tr>
                                            <th
                                            class="w-full border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            :colspan="5"
                                            >Rubro I: Produccion Cientìfica, tecnològica y/o industrial orientada a la linea de investigacion</th>
                                        </tr>
                                        <tr>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Criterio
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Indicador
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Cantidad
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Puntaje individual
                                            </th>  
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Puntaje Total
                                            </th>                                                                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="5"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Artículos científicos en revistas indizadas en base de datos que cumplan con un proceso de revisión de pares externos y otros estándares internacionales (Por cada artículo publicado)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A. Artículos científicos indizados en Scopus/ WoS (Cuartil Q1 de Scimago o JCR)
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>                                                                                                                                   
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B. Artículos científicos indizados en Scopus/ WoS (Cuartil Q2 de Scimago o JCR)
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                C. Artículos científicos indizados en Scopus/ WoS (Cuartil Q3 de Scimago o JCR)
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                D. Artículos científicos indizados en Scopus/ WoS (Cuartil Q4 de Scimago o JCR)
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                E. Conference proceeding (Scopus o WoS) y artículos científicos indizados en SciELO y otros similares*
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="3"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Libros en su especialidad indizados en base de datos bibliográficas o que cumplan con un proceso de revisión de pares externos y otros estándares (Por cada libro publicado)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A. Libro editado por una editorial internacional que cumpla con un proceso de revisión de pares externos. 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>                                              
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B. Libro editado por una institución peruana que cuente con la revisión por pares y la normalización básica.
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>                                             
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                C. Libro que cumpla con una normalización básica (Número ISBN, Número de registro de Depósito Legal, Tabla de contenido, Referencias bibliográficas).
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="3"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Capítulos de libros en su especialidad indizados en base de datos bibliográficas o que cumplan con un proceso de revisión de pares externos y otros estándares (Por cada capítulo de libro publicado)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A. Capitulo de libro editado por una editorial internacional que cumpla con un proceso de revisión de pares externos. 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>                                              
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B. Capitulo de libro editado por una institución peruana que cuente con la revisión por pares y la normalización básica.
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                C. Capitulo de libro que cumpla con una normalización básica (Número ISBN, Número de registro de Depósito Legal, Tabla de contenido, Referencias bibliográficas). 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="5"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Registro de propiedad intelectual/industrial, concedidas y registradas en INDECOPI, SCOPUS u otras fuentes internacionales equivalentes  (Por cada patente, certificado o solicitud)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A. Patente de Invención
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B. Certificado de Obtentor  
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                C. Patente de Modelo de utilidad 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                D. Certificado de derecho de autor por software.
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                E. Solicitud de patente/diseño industrial 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w-full border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            :colspan="5"
                                            >Rubro II: Formacón de Recursos Humanos</th>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="4"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Asesoría de tesis: Haber asesorado trabajos de investigacion, tesis de pregrado y/o posgrado registrado en SUNEDU o MINEDU. (Por cada trabajo de investigacion o tesis sustentada)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A. Asesoría y sustentación de tesis de Posgrado Doctorado
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B. Asesoría y sustentación de tesis de Posgrado Maestría
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                C. Asesoría y sustentación de tesis para Título Profesional o Segunda Especialidad 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                D. Asesoría y sustentación de trabajo de investigacion para Bachillerato*
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w-full border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            :colspan="5"
                                            >Rubro III: Reconocimiento de méritos por las competencias y la Gestión de proyectos I+D+i</th>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="7"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Dedicación a la investigacion, como responsable o Co-investigador de un proyecto de investigacion, siendo la UNHEVAL la entidad ejecutora (Por cada proyecto de investigacion)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A. Condición de responsable de un proyecto de investigacion con fondo externo internacional
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B. Condición de miembro de un proyecto de investigacion con fondo externo internacional
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                C. Condición de responsable de un proyecto de investigacion con fondo externo nacional.
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                D. Condición de miembro de un proyecto de investigacion con fondo externo nacional.
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                E. Condición de responsable de un proyecto de investigacion con fondo interno UNHEVAL 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                F. Condición de miembro de un proyecto de investigacion con fondo interno UNHEVAL*
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                G. Condición de responsable de un proyecto autofinanciado en la UNHEVAL
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="2"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Investigador RENACYT (Por cada Investigador Titular)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A. Docente investigador de la UNHEVAL
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B. Investigador calificado como RENACYT 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="2"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Investigador colaborador (Por cada investigador colaborador)

                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A.	Colaborador externo de una institución de prestigio Internacional 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A.	Colaborador externo de una institución de prestigio Nacional 
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="5"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Eventos académicos (Por cada evento)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A.	Conferencias en evento académico internacional
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>    
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B.	Conferencias en evento académico nacional
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>    
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                C.	Eventos académicos internacionales organizados por el grupo
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>  
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                D.	Eventos académicos nacionales organizados por el grupo
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                E. Eventos académicos organizados por el grupo dentro de la UNHEVAL
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="2"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Premios recibidos (Por cada investigador titular)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A. Premio de reconocimiento a la investigación otorgado por una entidad pública o privada internacional
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B. Premio de reconocimiento a la investigación otorgado por una entidad pública o privada nacional
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="w-full border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            :colspan="5"
                                            >Rubro IV: Contribución individual a la investigacion (Opcional)</th>
                                        </tr>  
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                :rowspan="5"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                Participación del investigador titular como evaluador (Por cada Investigador titular)
                                                </p>
                                            </td>                                                      
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                A. Evaluador en concursos internacionales de investigación
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                B. Evaluador en concursos nacionales de investigación
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                C. Miembro del comité científico – académico en congresos internacionales
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>     
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                D. Arbitro/evaluador de revistas indizadas
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                E. Jurado invitado en sustentaciones de grado académico
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                <TextInput></TextInput>
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td> 
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>                   
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from '@/Components/Pagination.vue'
import SelectInput from "@/Components/SelectInput.vue";
import Modal from "@/Components/Modal.vue";
import { Head, useForm, router } from "@inertiajs/vue3";

import Swal from "sweetalert2";
import '@fortawesome/fontawesome-free/css/all.css';
import { nextTick, ref } from "vue";
import { watch, reactive } from "vue";
import Paginator from "@/Components/Paginator.vue";


const props = defineProps({
    facultades: Array,
    escuelas: Array,
    areas: Object,
    lineas: Object,
    sublineas: Object,
    personas: Object,
    tipos: Object,
});

const form = useForm({
    name:"",
    space_inves:"",
    pre_group_inv:"",
    objective:"",
    obj_desa_soste_l_i:"",
    services:"",
    laboratory:"",
    phisical_environment:"",
    labora_equip:"",
    pagina:"",
    office:"",
    annexed:"",
    phone:"",
    id_area:0,
    id_linea:0,
    id_sublinea:0,
    id_facultad:0,
    id_escuela:0,
    id_persona:0
});


const submit = () => {
        form.post(route("registrar.grupo"),{
            onSuccess: () => {ok('Registro creado Correctamente')},
        });    
};
const ok = (msj) => {
    form.reset();
    Swal.fire({title:msj, icon:'success'});
}
</script>