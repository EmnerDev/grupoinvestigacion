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
                                    Agregar Evaluacion
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
            </div>
        </div>
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
const intePerson = ref([]);
const gruposIntegra = ref([]);

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
    
});

const id_grupo = ref([]);
onMounted(async() =>{
    id_grupo.value = props.grupos.id
    intePerson.value = props.integrantes;
    gruposIntegra.value = props.grupos;
    //console.log('comenta', intePerson.value);
    
})
console.log('sdsa', id_grupo)
</script>
