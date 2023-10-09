<template>
    <Head title="Evaluacion de Grupos de Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Evaluacion de Grupos de Investigacion -{{ gruposIntegra.name }}
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="overflow-x-auto rounded-lg shadow mt-6">
                        <div class="mb-4">
                            <div class="flex justify-center gap-5">
                                <div class="flex justify-center mb-6">
                                <PrimaryButton @click="openModal(1)" class="" :disabled="btnDeshabilitado">
                                    <i class="fa-solid fa-plus-circle"></i>
                                    Categorizar Grupo
                                </PrimaryButton>
                                </div>
                                <div class="flex justify-center mb-6">
                                        <a :href="route('grupos.index')" class="rounded-md bg-blue-700 px-4 py-2 text-center text-sm text-white hover:bg-blue-500">
                                            <i class="fa-solid fa-right-from-bracket rotate-180"></i>
                                            Regresar
                                        </a>
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
                                            C1
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C2
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C3
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C4
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C5
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C6
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C7
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C8
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C9
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C10
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            C11
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            Total
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(inte, i) in intePerson"
                                        :key="inte.id" :value="inte.id"
                                    >
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ i + 1 }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ inte.persona.name }} {{ inte.persona.first_name }}
                                                {{ inte.persona.last_name }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                            {{ inte.condition }}
                                            </p>
                                        </td>
                                        <td v-for="evaluacion in inte.evaluacion_criterio" :key="evaluacion.id"
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >

                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ Number(evaluacion.ptj_total_indicador) % 1 === 0 ? Number(evaluacion.ptj_total_indicador).toFixed(0) : Number(evaluacion.ptj_total_indicador).toFixed(1) }}
                                            </p>
                                        </td>
                                        <td v-for="eva in inte.evaluacion_total" :key="eva.id"
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >

                                            <p 
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                            {{ Number(eva.ptj_total_integrante) % 1 === 0 ? Number(eva.ptj_total_integrante).toFixed(0) : Number(eva.ptj_total_integrante).toFixed(1) }}
                                            </p>
                                        </td>
                                        <td 
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            
                                            <LinkEvaluarButton :href="route('evaluacion.integrante', {grupo_id:inte.id_grupo, id:inte.id})"
                                                class="mr-1"
                                            >
                                            <i class="fa-solid fa-list-check"></i> Evaluar
                                            </LinkEvaluarButton>
                                            <LinkWarningButton :href="route('evaluacion.editar', {grupo_id:inte.id_grupo, id:inte.id})">
                                                <i class="fa-solid fa fa-edit"></i>Editar
                                            </LinkWarningButton>
                                            <!-- <DangerButton
                                                ><i
                                                    class="fa-solid fa-trash"
                                                ></i
                                            ></DangerButton> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="mt-6 text-center text-xl">
                        <InputLabel>Puntaje Total Obtenido por grupo: {{ calcularPuntajeTotalGeneral() }}</InputLabel>

                    </div>
                    <div class="overflow-x-auto rounded-lg shadow mt-6 ml-5 mr-5">
                        <div class="mb-4">
                            <table class="w-full table-auto border-separate">
                                <caption class="text-slate-600 dark:text-slate-400 font-semibold pb-4 text-lg caption-top bg-blue-100">
                                    La categoria Obtenida por el grupo segun la puntuacion y los criterios minimos.
                                </caption>
                                <thead>
                                    <tr class="bg-blue-700 text-center">
                                        <th class="w-1/8 min-w-[160px] border-l border-transparent py-1 px-1 text-lg font-semibold text-white lg:py-1 lg:px-1">Grupo</th>
                                        <th class="w-1/8 min-w-[160px] py-1 px-1 text-lg font-semibold text-white lg:py-1 lg:px-1">Categoria</th>
                                        <th class="w-1/8 min-w-[160px] py-1 px-1 text-lg font-semibold text-white lg:py-1 lg:px-1">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="gru in gruposIntegra.evaluacion_grupos" :key="gru.id" >
                                        <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-1 px-1 text-center text-sm font-medium">{{ gruposIntegra.name }}</td>
                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-1 px-1 text-center text-sm font-medium"> {{ gru.categorias }}</td>
                                        <td class="text-dark border-b border-[#E8E8E8] bg-white py-1 px-1 text-center text-sm font-medium">
                                            <WarningButton
                                                class="mr-1"
                                                @click="
                                                    openModal(
                                                        2,
                                                        gru.ptj_total_grupo,
                                                        gru.categorias,
                                                        gru.id_evaluacion_total,
                                                        gru.id_grupo,
                                                        gru.id
                                                    )
                                                "
                                            >
                                                <i class="fa-solid fa-edit"></i>
                                            </WarningButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
        <Modal :show="modal" @close="closeModal()">
            <h2 class="p-3 text-lg font-medium text-gray-900">{{ title }}</h2>
            <TextInput
                type="hidden"
                name="id_grupo"
                v-model="form.id_grupo"
            ></TextInput>
            <TextInput
                type="hidden"
                name="id_evaluacion_total"
                v-model="form.id_evaluacion_total"
            ></TextInput>
            <div class="mt-6 text-center text-xl">
            <InputLabel v-model="form.ptj_total_grupo" id="ptj_total_grupo">Puntaje Total Obtenido por grupo: {{ calcularPuntajeTotalGeneral() }}</InputLabel>
            </div>
            <div class="overflow-x-auto rounded-lg shadow mt-6 ml-5 mr-5">
                <div class="mb-4">
                    <table class="w-full table-auto">
                    <caption class="text-slate-500 dark:text-slate-400 font-semibold pb-4 text-lg caption-top bg-teal-100">
                        Categorizacion de los grupos de Investigacion, segun el puntaje de evaluacion
                    </caption>
                    <thead>
                        <tr class="bg-teal-600 text-center">
                            <th class="w-1/8 min-w-[160px] border-l border-transparent py-1 px-1 text-lg font-semibold text-white lg:py-1 lg:px-1">Categoria</th>
                            <th class="w-1/8 min-w-[160px] py-1 px-1 text-lg font-semibold text-white lg:py-1 lg:px-1">Rango de puntaje requerido por cada evaluación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-1 px-1 text-center text-sm font-medium">Consolidado</td>
                            <td class="text-dark border-b border-[#E8E8E8] bg-white py-1 px-1 text-center text-sm font-medium"> 70 a más</td>
                        </tr>
                        <tr>
                            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-1 px-1 text-center text-sm font-medium">Por Consolidar</td>
                            <td class="text-dark border-b border-[#E8E8E8] bg-white py-1 px-1 text-center text-sm font-medium">51-69</td>
                        </tr>
                        <tr>
                            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-1 px-1 text-center text-sm font-medium">Emergente</td>
                            <td class="text-dark border-b border-[#E8E8E8] bg-white py-1 px-1 text-center text-sm font-medium">10-50</td>
                        </tr>
                        <tr>
                            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-1 px-1 text-center text-sm font-medium">Sin Categoria</td>
                            <td class="text-dark border-b border-[#E8E8E8] bg-white py-1 px-1 text-center text-sm font-medium">Menores a 10, no alcanzaron puntaje</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="mt-5 text-center ml-5 mr-5">
                <LinkEvaluarButton @click="togleInfo" style="cursor: pointer;">Ver Criterios minimos para Categorizar</LinkEvaluarButton>
                <div v-if="mostrarInfo">
                    <div class="overflow-x-auto rounded-lg shadow mt-5 text-center">
                        <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                            <thead>
                                <tr class="border-b dark:bg-gray-700 dark:border-gray-700">
                                    <th class="p-3">Criterios para Categorización</th>
                                </tr>
                            </thead>
                            <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                                <tr>
                                    <th class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-1 px-1">A. Consolidado</th>
                                </tr>
                                <tr>
                                    <td class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                        <p>Tiene al menos una línea de investigacion consolidada.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                        <p>El Coordinador y sus miembros titulares son investigadores científicos registrados en el RENACYT.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                        <p>Tiene colaboradores externos de instituciones de prestigio internacional.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                        <p>Desarrolla proyectos de investigación financiados por fondos concursables Externos.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b border-l border-[#E8E8E8] py-1 px-1 Class whitespace-normal">
                                        <p>Tiene una producción científica anual en revistas indizadas en web of Science, Scopus u otras similares en los últimos 5 años y estén registradas en Scimago Journal Ranking (SJR)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                        <p>Tiene derechos de propiedad intelectual y patentes.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                        <p>Demuestra acciones formativas relacionadas a la actividad científica del grupo (tesis de bachiller, título, maestría y doctorado)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-1 px-1">B. Por Consolidar</th>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Tiene al menos una línea de investigación por consolidar.</td>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Tiene al menos un investigador titular registrado en el RENACYT.</td>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Tiene colaboradores externos de instituciones de prestigio nacional.</td>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Desarrolla al menos un proyecto de investigación financiado por fondos concursables Externos. </td>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Tienen al menos una producción científica anual de artículos científicos en revistas indizados en Web of Science, Scopus u otras similares 6.0 en los últimos tres (3) años</td>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Demuestra acciones formativas relacionadas a la actividad científica del grupo (tesis de bachiller, título y maestría).</td>
                                </tr>
                                <tr>
                                    <th class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-1 px-1">B. Emergente</th>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Todas sus investigaciones están dentro de las Líneas de investigación emergente.</td>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Participación en proyectos financiados principalmente con fondos propios de la UNHEVAL.</td>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Tienen al menos un artículo científico en revistas indizada en Scielo o similares en los últimos 2 años</td>
                                </tr>
                                <tr class="border-b border-l border-[#E8E8E8] py-1 px-1 whitespace-normal">
                                    <td>Demuestra al menos una acción formativa relacionada a la actividad científica del grupo (tesis de bachiller o título).</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="p-3">
                    <InputLabel for="categorias" value="Categoria del grupo: " />
                    <select
                        name="categorias"
                        id="categorias"
                        class="mt-1 block w-full"
                        v-model="form.categorias"
                    >
                        <option
                            v-for="(label, value) in categoria"
                            :key="value"
                            :value="value"
                        >
                            {{ label }}
                        </option>
                    </select>
            </div>
            <div class="flex justify-center">
                <div class="p-3 mt-6">
                    <PrimaryButton @click="submit">
                        <i class="fa-solid fa save"></i>Guardar
                    </PrimaryButton>
                </div>
                <div class="p-3 mt-6">
                    <SecondaryButton
                        class="ml-3"
                        @click="closeModal"
                    >
                        Cancelar
                    </SecondaryButton>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
import LinkWarningButton from "@/Components/LinkWarningButton.vue";
import LinkEvaluarButton from "@/Components/LinkEvaluarButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Modal from "@/Components/Modal.vue";
import { Head, useForm, router } from "@inertiajs/vue3";

import Swal from "sweetalert2";
import "@fortawesome/fontawesome-free/css/all.css";
import { nextTick, ref } from "vue";
import axios from "axios";
import { onMounted } from "vue";
import { computed } from "vue";

const intePerson = ref([]);
const gruposIntegra = ref([]);
const evaluacionGeneral = ref([]);
const gruposevaluar = ref([]);
const calcularTotal = ref(0);


const mostrarInfo = ref(false);

const nameInput=ref(null);
const modal = ref(false);
const title = ref("");
const operation = ref(1);
const id = ref("");
const btnDeshabilitado = ref(false);

const props = defineProps({
    grupos: {
        type: Object,
        default: () => ({}),
    },
    integrantes: {
        type: Object,
        default: () => ({}),
    },
    personas: Object,
    evaluacion_grupos: Object,
    evaluacion_totals:Object,
    categoria: {
        'CONSOLIDADO': 'CONSOLIDADO',
        'POR CONSOLIDAR': 'POR CONSOLIDAR',
        'EMERGENTE': 'EMERGENTE',
        'SIN EVALUAR': 'SIN EVALUAR',
    },

});
const form = useForm({
    ptj_total_grupo: '',
    categorias: 'SIN EVALUAR',
    id_evaluacion_total: intePerson.value[0]?.evaluacion_total[0]?.id,
    id_grupo: props.grupos.id,
});

const id_grupo = ref([]);


onMounted(async() =>{
    id_grupo.value = props.grupos.id
    intePerson.value = props.integrantes;
    gruposIntegra.value = props.grupos;
    gruposevaluar.value = props.evaluacion_grupos;
    evaluacionGeneral.value = props.evaluacion_totals;
    //console.log('comenta', intePerson.value);

})



console.log('integrantes', evaluacionGeneral)
// console.log('grupo', props.grupos)

const calcularPuntajeTotalGeneral = () => {

    let puntajeTotalgeneral = 0;
    props.integrantes.forEach(integrante => {
        integrante.evaluacion_total.forEach(ele =>{
            const valor = parseFloat(ele.ptj_total_integrante);
            if(!isNaN(valor)){

                puntajeTotalgeneral += valor;
            }

        });
    });
    console.log('puntaje total', puntajeTotalgeneral);
    return calcularTotal.value = puntajeTotalgeneral;
};


const openModal = (
    op,
    ptj_total_grupo,
    categorias,
    id_evaluacion_total,
    id_grupo,
    categ
) => {
    form.id_evaluacion_total = intePerson.value[0]?.evaluacion_total[0]?.id;
    modal.value = true;
    nextTick(() => nameInput.value.focus());
    operation.value = op;
    id.value = categ;
    if (op == 1) {
        title.value = "Categorizar Grupos";
    } else {
        title.value = "Editar Categorizar Grupos";
        form.ptj_total_grupo = ptj_total_grupo;
        form.categorias = categorias;
        form.id_evaluacion_total = id_evaluacion_total;
        form.id_grupo = id_grupo

    }
};

const closeModal = () => {
    modal.value = false;
};

const togleInfo = () => {
    mostrarInfo.value = !mostrarInfo.value;
}

const submit = () => {
        // Para una solicitud POST
        const datosEnviar = {
            totales: form,
            calcularTotal:calcularTotal.value
        }
        axios
            .post(route("guardar.total"), datosEnviar)
            .then((res) => {
                // Manejar la respuesta exitosa aquí
                console.log('llegaa',res.data.datosEvaluacion);
                if(res.data.code == 200){
                    //gruposIntegra.value = res.data.datosEvaluacion;
                    //gruposevaluar.value = res.data.data;
                    //form.reset();
                    setTimeout(()=>{
                        closeModal();

                        window.location.reload();
                    }, 1000);
                    // router.reload();
                    ok(res.data);
                }
                btnDeshabilitado.value = true;
                
            })
            .catch((error) => {
                // Manejar el error aquí
                console.error(error);
            });
};
const ok = (obj) => {
    form.reset();
    closeModal()   
    Swal.fire({ position: 'top-end',title: obj.msj, icon: "success", showConfirmButton: false,
  timer: 1500 });
};
</script>
