<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
           Lista de  Grupos de Investigación Registrados 
        </template>
        <div
            class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md"
        >
            <div class="flex w-12 items-center justify-center bg-blue-500">
                <svg
                    class="h-6 w-6 fill-current text-white"
                    viewBox="0 0 40 40"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"
                    ></path>
                </svg>
            </div>

            <div class="-mx-3 px-4 py-2">
                <div class="mx-3">
                    <span  class="font-semibold text-blue-500">{{ estadoInscripciones }}</span>
                    <p   class="text-sm text-gray-600">{{ mensaje }}</p>
                    <p class="text-sm text-gray-600" v-if="inscripcionesAbiertas">
                    Fecha de inicio: {{ fechaInicio }} - Fecha de fin: {{ fechaFin }}
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form>
                        <div class="overflow-x-auto rounded-lg shadow mt-6">
                            <div class="mb-4">
                                <div class="flex justify-between ">                                     
                                    <div class="mb-2 flex ">
                                        <input
                                                type="text"
                                                v-model="search"
                                                placeholder="Buscar..."   
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 "
                                            />                                        
                                    </div>
                                    <div class="flex mb-6" v-role="'Administrador'">
                                        <LinkPrimaryButton v-if="mostrarBoton" :href="route('grupos.create')" class="">
                                        <i class="fa-solid fa-plus-circle"></i>
                                            Crear Grupo
                                        </LinkPrimaryButton>
                                    </div>                            
                                    <div class="flex mb-6" v-role="'Coordinador'">
                                        <LinkPrimaryButton v-if="mostrarBoton && ocultarSiEstadoInactivo" :href="route('grupos.create')" class="" :hidden="(grupos?.data?.length > 0) ? true : false">
                                        <i class="fa-solid fa-plus-circle"></i>
                                            Crear Grupo
                                        </LinkPrimaryButton>
                                    </div>  
                                </div>
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                N°
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Area de Investigacion
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Linea
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Sublinea
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Nombre del grupo
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Integrantes
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Condicion
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Categoria del Grupo
                                            </th>
                                            <th v-role="'Administrador'"
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Revalidacion
                                            </th>
                                            <th v-role="'Administrador'"
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Estado
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Acciones
                                            </th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(grupo, key) in grupos.data" :key="key">
                                            <template v-for="(inte, index) in grupo.integrante" :key="index">
                                            <tr>
                                                <td v-if="index === 0" class="border-b border-gray-200 bg-white px-5 py-5 text-sm" :rowspan="grupo.integrante.length">{{ (grupos.current_page - 1) * grupos.per_page + key + 1 }}</td>
                                                <td v-if="index === 0" class="border-b border-gray-200 bg-white px-5 py-5 text-sm" :rowspan="grupo.integrante.length">
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                v-for="pivot in grupo.pivot_grupo_linea">
                                                    - {{ pivot?.area_investigacion?.name }}
                                                </p>
                                                </td>
                                                <td v-if="index === 0" class="border-b border-gray-200 bg-white px-5 py-5 text-sm" :rowspan="grupo.integrante.length">
                                                    <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                v-for="pivot in grupo.pivot_grupo_linea">
                                                    - {{ pivot?.linea?.name }}
                                                </p>
                                                </td>
                                                <td v-if="index === 0" class="border-b border-gray-200 bg-white px-5 py-5 text-sm" :rowspan="grupo.integrante.length">
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                v-for="pivot in grupo.pivot_grupo_linea">
                                                    - {{ pivot?.linea?.name }}
                                                </p>
                                                </td>
                                                <td v-if="index === 0" class="border-b border-gray-200 bg-white px-5 py-5 text-sm" :rowspan="grupo.integrante.length">{{ grupo?.name }}</td>                                            
                                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ inte.persona.name }} {{ inte.persona.first_name }} {{ inte.persona.last_name }}</td>
                                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">{{ inte.condition }}</td>
                                                <td v-if="index === 0" class="border-b border-gray-200 bg-white px-5 py-5 text-sm" :rowspan="grupo.integrante.length">                                                   
                                                    <p  class="text-gray-900 whitespace-no-wrap">
                                                        {{ grupo.evaluacion_grupos[grupo.evaluacion_grupos.length-1]?.categorias || 'SIN EVALUAR'}}
                                                    </p>                                                    
                                                </td>
                                                <td v-role="'Administrador'" v-if="index === 0" class="border-b border-gray-200 bg-white px-5 py-5 text-sm" :rowspan="grupo.integrante.length">
                                                    <p  class="text-gray-900 whitespace-no-wrap">
                                                        <!-- {{ grupo.evaluacion_grupos[grupo.evaluacion_grupos.length - 1]?.revalidar }} -->
                                                        {{ grupo.evaluacion_grupos[grupo.evaluacion_grupos.length - 1]?.revalidar || 'SIN REVALIDACION'}}

                                                    </p>                                                
                                                </td>
                                                <td v-role="'Administrador'" v-if="index === 0" class="border-b border-gray-200 bg-white px-5 py-5 text-sm" :rowspan="grupo.integrante.length">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <div :class="{'bg-green-500 text-white text-center font-bold rounded-md': grupo.status && grupo.evaluacion_grupos[grupo.evaluacion_grupos.length - 1]?.revalidar !== 'DESCALIFICACIÓN', 'bg-red-500 text-center text-white font-bold rounded-md': !grupo.status || (grupo.evaluacion_grupos[grupo.evaluacion_grupos.length - 1]?.revalidar === 'DESCALIFICACIÓN')}">                                       
                                                            {{ grupo.evaluacion_grupos[grupo.evaluacion_grupos.length - 1]?.revalidar === 'DESCALIFICACIÓN' ? 'Inactivo'  : (grupo.status == 1 ? 'Activo' : 'Inactivo' )}}
                                                        </div>
                                                    </p>                                                
                                                </td>
                                                <td v-if="index === 0" class="border-b border-gray-200 bg-white px-5 py-5 text-sm" :rowspan="grupo.integrante.length">
                                                    <a v-role="'Administrador'" :href="route('evaluar.grupo',grupo.id)" class="m-2 p-2 bg-blue-500 hover:bg-blue-700 text-white rounded flex items-center">Evaluar
                                                    <i class="fa-solid fa-plus-circle ml-2"></i>
                                                </a>
                                                <a v-role="'Administrador'" class="m-2 p-2 bg-green-500 hover:bg-green-700 text-white rounded flex items-center" :href="route('ver.grupo',grupo.id)">Ver<i class="fa-solid fa-eye ml-2"></i></a>
                                                <a v-if="ocultarSiEstadoInactivo" v-role:any="'Coordinador|Integrante'" class="m-2 p-2 bg-green-500 hover:bg-green-700 text-white rounded flex items-center" :href="route('ver.grupo',grupo.id)">Ver<i class="fa-solid fa-eye ml-2"></i></a>
                                                <a v-role="'Administrador'" class="m-2 p-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded flex items-center" :href="route('grupos.editar',grupo.id)">Editar
                                                    <i class="fa-solid fa-edit ml-2" :title="editMode ? 'Editar':'Editar Grupo'"></i>
                                                </a>
                                                <a v-if="ocultarSiEstadoInactivo" v-role="'Coordinador'" class="m-2 p-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded flex items-center" :href="route('grupos.editar',grupo.id)">Editar
                                                    <i class="fa-solid fa-edit ml-2" :title="editMode ? 'Editar':'Editar Grupo'"></i>
                                                </a>
                                                <a class="m-2 p-2 bg-red-500 hover:bg-red-700 text-white rounded flex items-center" v-role="'Administrador'" type="button" @click="deleteGrupo(grupo.id, grupo.name)">Eliminar<i class="fa-solid fa-trash ml-2"></i></a>
                                                </td>
                                            </tr>
                                            </template>
                                        </template>
                                        <!-- <template v-for="(gru, i) in grupos.data"
                                            :key="gru.id" :value="gru.id">
                                        <tr                                         
                                            
                                        >
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ i + 1 }}
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                    v-for="pivot in gru.pivot_grupo_linea" :key="pivot.id">                                                   
                                                   - {{ pivot.area_investigacion.name }}                                                    
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                    v-for="pivot in gru.pivot_grupo_linea">
                                                - {{ pivot.linea.name }}
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                    v-for="pivot in gru.pivot_grupo_linea">
                                                    - {{ pivot.sublinea.name }}
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.name }}
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                                :rowspan="gru.integrante.length+1"
                                                class=" border-b border-gray-200 bg-white px-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                {{ gru.evaluacion_grupos[gru.evaluacion_grupos.length - 1]?.categorias }}
                                                </p>
                                            </td>  
                                            <td v-if="gru.integrante && gru.integrante.length"
                                             :rowspan="gru.integrante.length+1"                                            
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                                <a v-role="'Administrador'" :href="route('evaluar.grupo',gru.id)" class="m-2 p-2 bg-blue-500 hover:bg-blue-700 text-white rounded flex items-center">Evaluar
                                                    <i class="fa-solid fa-plus-circle ml-2"></i>
                                                </a>
                                                <a class="m-2 p-2 bg-green-500 hover:bg-green-700 text-white rounded flex items-center" :href="route('ver.grupo',gru.id)">Ver<i class="fa-solid fa-eye ml-2"></i></a>
                                                <a  class="m-2 p-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded flex items-center" :href="route('grupos.editar',gru.id)">Editar
                                                    <i class="fa-solid fa-edit ml-2" :title="editMode ? 'Editar':'Editar Grupo'"></i>
                                                </a>
                                                <a class="m-2 p-2 bg-red-500 hover:bg-red-700 text-white rounded flex items-center" v-role="'Administrador'" type="button" @click="deleteGrupo(gru.id, gru.name)">Eliminar<i class="fa-solid fa-trash ml-2"></i></a>
                                            </td>                                          
                                        </tr>
                                        <tr v-for="integ in gru.integrante" :key="integ.id">
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 text-sm"
                                            >
                                                <p
                                                
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ integ.persona.name }} {{ integ.persona.first_name }} {{ integ.persona.last_name }}
                                                </p>
                                            </td>
                                            <td 
                                                class=" border-b border-gray-200 bg-white px-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ integ.condition }}
                                                </p>
                                            </td>                                                                                        
                                        </tr>
                                        </template> -->
                                    </tbody>
                                </table>
                                <div v-rol="'Administrador'"
                                    class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"
                                >
                                    <paginator class="mt-3" :paginator="grupos" />
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import LinkPrimaryButton from "@/Components/LinkPrimaryButton.vue";

import { Head, useForm, router } from "@inertiajs/vue3";

import Swal from "sweetalert2";
import "@fortawesome/fontawesome-free/css/all.css";
import { nextTick, ref, computed, onMounted  } from "vue";
import { watch } from "vue";
import Paginator from "@/Components/Paginator.vue";

const programacion = ref(props.programacions);

const estadoInscripciones = ref('');
const mensaje = ref('');
const fechaInicio = ref('');
const fechaFin = ref('');

const props = defineProps({
    grupos: {
        type: Object,
    },
    // integrantes: {
    //     type: Object,
    // },
    filters: {
        type: Object,
        default: () => ({}),
    },
    editMode: false,
    programacions: Object,
    pivotLineas:Object
});

console.log('grupos props', props.grupos.data.evaluacion_grupos);

const form = useForm({});

const mostrarBoton = computed(() => {
    const fechaActual = new Date();
    //console.log('fechaActual', fechaActual)

    for(const evento of programacion.value){
        const fechaInicio = new Date(evento.start_date);
        //console.log('fechaInicio', fechaInicio)
        const fechaFin = new Date(evento.end_date);
        const esActivo = evento.status === 1;
        const esTipo = evento.programin_type === 'INSCRIPCION';

        if(fechaActual >= fechaInicio && fechaActual <= fechaFin && esActivo && esTipo){
            return true;
        }
    }
    return false;
});

const ocultarSiEstadoInactivo = computed(() => {
    for (const event of props.grupos.data) {
        console.log('event', event.evaluacion_grupos[event.evaluacion_grupos.length - 1])
        if (event.evaluacion_grupos.length > 0 && event.evaluacion_grupos[event.evaluacion_grupos.length - 1]?.revalidar === 'DESCALIFICACIÓN') {
            return false; // Si hay al menos un evento en descalificación, oculta el botón
        }
    }

    return true;
});

const actualizarEstadoInscripciones = () => {
  const fechaActual = new Date();
  // Supongamos que programacion es un array de objetos con fechaInicio y fechaFin
  const eventoActivo = programacion.value.find(
    evento => fechaActual >= new Date(evento.start_date) && fechaActual <= new Date(evento.end_date) && evento.programin_type === 'INSCRIPCION'
    &&  evento.status === 1
  );

  if (eventoActivo) {
    estadoInscripciones.value = 'Inscripciones abiertas';
    mensaje.value = 'Inscripciones de Grupos de Investigación';
    fechaInicio.value = eventoActivo.start_date;
    fechaFin.value = eventoActivo.end_date;
  } else {
    estadoInscripciones.value = 'Inscripciones cerradas';
    mensaje.value = 'Las inscripciones se habilitaran de acuerdo a la fecha establecida';
  }
};

const inscripcionesAbiertas = computed(() => estadoInscripciones.value === 'Inscripciones abiertas');

onMounted(() => {
  // Actualizar el estado al cargar el componente
  actualizarEstadoInscripciones();
});

const submit = () => {
    form.post(route("registrar.grupo"), {
        onSuccess: () => {
            ok("Registro creado Correctamente");
        },
    });
};
const ok = (msj) => {
    form.reset();
    Swal.fire({ title: msj, icon: "success" });
};

let search = ref(props.filters.search);
watch(search, (value) => {
    router.get(
        "/grupos",
        { search: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});

const deleteGrupo = (id, name) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title:'Estas seguro de eliminar a este grupo ' +name+'. se eliminaran integrantes, evaluacion y la categorizacion, desea continuar?',
        icon: 'question', showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Si, eliminar',
        cancelButtonText:'<i class="fa-solid fa-ban"></i> Cancelar'
    }).then((result) => {
        if(result.isConfirmed) {
            form.delete(route('eliminar.grupo', id),{
                onSuccess: () => {ok('Registro Eliminado Correctamente')}
            });
        }
    });
}

</script>
