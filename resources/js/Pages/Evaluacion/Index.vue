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
                            <div class="flex justify-center mb-6">
                                <PrimaryButton @click="openModal(1)" class="">
                                    <i class="fa-solid fa-plus-circle"></i>
                                    Categorizar Grupo
                                </PrimaryButton>
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
                        <InputLabel>Puntaje Total Obtenido por grupo: </InputLabel>
                        <span>{{ calcularPuntajeTotalGeneral() }}</span>
                    </div>
            </div>
        </div>
        <Modal :show="modal" @close="closeModal()">
            <h2 class="p-3 text-lg font-medium text-gray-900">{{ title }}</h2>
            <div class="mt-6 text-center text-xl">
            <InputLabel>Puntaje Total Obtenido por grupo: </InputLabel>
            <span>{{ calcularPuntajeTotalGeneral() }}</span>
            </div>
            <div class="overflow-x-auto rounded-lg shadow mt-6">
                <div class="mb-4">
                    <table class="w-full table-auto">
                    <caption class="text-slate-500 dark:text-slate-400 font-semibold pb-4 text-lg caption-top bg-teal-100">
                        Categorizacion de los grupos de Investigacion, segun el puntaje de evaluacion
                    </caption>
                    <thead>
                        <tr class="bg-teal-600 text-center">
                            <th class="w-1/6 min-w-[160px] border-l border-transparent py-1 px-1 text-lg font-semibold text-white lg:py-3 lg:px-1">Categoria</th>
                            <th class="w-1/6 min-w-[160px] py-1 px-1 text-lg font-semibold text-white lg:py-3 lg:px-1">Rango de puntaje requerido por cada evaluaciòn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-2 px-2 text-center text-base font-medium">Consolidado</td>
                            <td class="text-dark border-b border-[#E8E8E8] bg-white py-2 px-2 text-center text-base font-medium"> 70 a más</td>
                        </tr>
                        <tr>
                            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-2 px-2 text-center text-base font-medium">Por Consolidar</td>
                            <td class="text-dark border-b border-[#E8E8E8] bg-white py-2 px-2 text-center text-base font-medium">51-69</td>
                        </tr>
                        <tr>
                            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-2 px-2 text-center text-base font-medium">Emergente</td>
                            <td class="text-dark border-b border-[#E8E8E8] bg-white py-2 px-2 text-center text-base font-medium">10-50</td>
                        </tr>
                        <tr>
                            <td class="text-dark border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-2 px-2 text-center text-base font-medium">Sin Categoria</td>
                            <td class="text-dark border-b border-[#E8E8E8] bg-white py-2 px-2 text-center text-base font-medium">Menores a 10, no alcanzaron puntaje</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="mt-5 text-center">
                <LinkEvaluarButton @click="togleInfo" style="cursor: pointer;">Ver Criterios minimos para Categorizar</LinkEvaluarButton>
                <div v-if="mostrarInfo">
                    <div class="overflow-x-auto">
                        <table class="w-full p-6 text-xs text-left whitespace-nowrap">                            
                            <thead>
                                <tr class="dark:bg-gray-700 ">
                                    <th class="p-3">Criterios para Categorización</th>
                                </tr>
                            </thead>
                            <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                                <tr>
                                    <th class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] py-2 px-2">A. Consolidado</th>
                                </tr>
                                <tr>                                    
                                    <td class="border-b border-l border-[#E8E8E8] py-2 px-2">
                                        <p>Tiene al menos una línea de investigacion consolidada.</p>
                                    </td>
                                </tr>
                                <tr>                                    
                                    <td class="border-b border-l border-[#E8E8E8] py-2 px-2">
                                        <p>El Coordinador y sus miembros titulares son investigadores científicos registrados en el RENACYT.</p>
                                    </td>
                                </tr>
                                <tr>                                    
                                    <td class="border-b border-l border-[#E8E8E8] py-2 px-2">
                                        <p>Tiene colaboradores externos de instituciones de prestigio internacional.</p>
                                    </td>
                                </tr>
                                <tr>                                    
                                    <td class="border-b border-l border-[#E8E8E8] py-2 px-2">
                                        <p>Desarrolla proyectos de investigación financiados por fondos concursables Externos.</p>
                                    </td>
                                </tr>
                                <tr>                                    
                                    <td class="border-b border-l border-[#E8E8E8] py-2 px-2">
                                        <p>Tiene una producción científica anual en revistas indizadas en web of Science, Scopus u otras similares en los últimos 5 años y estén registradas en Scimago Journal Ranking (SJR)</p>
                                    </td>
                                </tr>
                                <tr>                                    
                                    <td class="border-b border-l border-[#E8E8E8] py-2 px-2">
                                        <p>Tiene derechos de propiedad intelectual y patentes.</p>
                                    </td>
                                </tr>
                                <tr>                                    
                                    <td class="border-b border-l border-[#E8E8E8] py-2 px-2">
                                        <p>Demuestra acciones formativas relacionadas a la actividad científica del grupo (tesis de bachiller, título, maestría y doctorado)</p>
                                    </td>
                                </tr>
                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="p-3 mt-6">
                    <PrimaryButton>
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
import { Head, useForm } from "@inertiajs/vue3";

import Swal from "sweetalert2";
import "@fortawesome/fontawesome-free/css/all.css";
import { nextTick, ref } from "vue";
import axios from "axios";
import { onMounted } from "vue";
import { computed } from "vue";
const intePerson = ref([]);
const gruposIntegra = ref([]);
const evaluacionIntegrante = ref([]);
const criterioIntegra = ref()

const mostrarInfo = ref(false);

const nameInput=ref(null);
const modal = ref(false);
const title = ref("");
const operation = ref(1);
const id = ref("");


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
    criterios: Object,
    evaluacion_criterios:Object

});

const id_grupo = ref([]);
onMounted(async() =>{
    id_grupo.value = props.grupos.id
    intePerson.value = props.integrantes;
    gruposIntegra.value = props.grupos;
    evaluacionIntegrante.value = props.evaluacion_criterios;
    criterioIntegra.value = props.criterios;
    //console.log('comenta', intePerson.value);

})
console.log('integrantes', intePerson)
// console.log('grupo', props.grupos)

const calcularPuntajeTotalGeneral = () => {

    let puntajeTotalgeneral = 0;
    props.integrantes.forEach(integrante => {
        integrante.evaluacion_total.forEach(ele =>{
            puntajeTotalgeneral += parseFloat(ele.ptj_total_integrante);

        });
    });
    console.log('puntaje total', puntajeTotalgeneral);
    return puntajeTotalgeneral;
};


const openModal = (
    op
) => {
    modal.value = true;
    nextTick(() => nameInput.value.focus());
    operation.value = op;
    id.value = gruposIntegra;
    if (op == 1) {
        title.value = "Categorizar Grupos";
    } else {
        title.value = "Editar Categorizar Grupos";
    }
};

const closeModal = () => {
    modal.value = false;
};

const togleInfo = () => {
    mostrarInfo.value = !mostrarInfo.value;
}
</script>
